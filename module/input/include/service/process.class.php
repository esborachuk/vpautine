<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox_Service
 * @version 		$Id: process.class.php 4546 2012-07-20 10:51:18Z Miguel_Espinoza $
 */
class Input_Service_Process extends Phpfox_Service 
{	
	private $_aOptions = array();
	
	/**
	 * Used to control when to add another feed
	 * @var array of boolean 
	 */
	private $_aFeedsAdded = array();
	/**
	 * Class constructor
	 */	
	public function __construct()
	{	
		$this->_sTable = Phpfox::getT('custom_field');
	}
	
	/**
	 * Adds a new Input
	 
	 * @param type $aVals
	 * @return type 
	 */
	public function add($aVals)
	{			
		Phpfox::getUserParam('custom.can_add_custom_fields', true);
		$oInput = Phpfox::getLib('parse.input');
		$oPhrase = Phpfox::getService('language.phrase.process');
		list($aVals['module'], $aVals['action']) = explode('.', $aVals['module']);		
		$aCallback = Phpfox::callback($aVals['module'] . '.getEnabledInputField');		
		$bValidModule = false;
		
		
		foreach ($aCallback as $aAction)
		{
			if (isset($aAction['action']) && $aAction['action'] == $aVals['action'])
			{
				$bValidModule = true;
				break;
			}
		}
		
		if ($bValidModule != true)
		{
			return Phpfox_Error::set('Not a valid module');
		}
		
		$aInsert = array(
			'module_id' => $aAction['module_id'], // we get the module from the action, we get the action from the user.
			'type_id' => $oInput->clean($aVals['type_id']),
			'is_required' => ((isset($aVals['required']) && $aVals['required'] == 1) ? '1' : '2'), // 1: Required, 2: Not required
			'action' => $aAction['action'], // `action` is a unique identifier within this Input
			'phrase_var' => 'not-set'
		);
		
		if (isset($aVals['field_id']))
		{
			unset($aInsert['phrase_var']);
			
			$this->database()->update(Phpfox::getT('input_field'), $aInsert, 'field_id = ' . (int)$aVals['field_id']);
			$iFieldId = (int)$aVals['field_id'];
		}
		else
		{		
			$iFieldId = $this->database()->insert(Phpfox::getT('input_field'), $aInsert);
		}
		
		$bEmptyName = true;
		foreach ($aVals['name'] as $sLangId => $sName)
		{			
			if (isset($aVals['field_id']) && is_array($sName))
			{	
				// Updating
				$iPhraseId = implode('', array_keys($sName));
				$sText = implode('', array_values($sName));				
				if (empty($sText))
				{
					continue;
				}
				$bEmptyName = false;
				$oPhrase->update($iPhraseId, $sText);
			}
			else
			{
				if (empty($sName))
				{
					continue;
				}
				$bEmptyName = false;
				// Adding
				$sNameVar = $oPhrase->add(array(
					'module' => 'input|input',
					'var_name' => 'input_name_' . $iFieldId . '_' . rand(1,999),
					'product_id' => $aAction['product_id'],
					'text' => array($sLangId => $sName)
				));
				$this->database()->update(Phpfox::getT('input_field'), array('phrase_var' => $sNameVar), 'field_id='.$iFieldId);
			}			
		}
		
		if ($bEmptyName)
		{
			$this->database()->delete(Phpfox::getT('input_field'), 'field_id = ' . $iFieldId);
			return Phpfox_Error::set('The name cannot be empty');
		}
		
		// Add the options to this Input
		if (strpos($aVals['type_id'], 'text') === false)
		{			
			// Lets add these options
			if (!isset($aVals['option']) || empty($aVals['option']))
			{
				return Phpfox_Error::set('No options for a type that requires them.');
			}
			
			foreach ($aVals['option'] as $sLangId => $aOptions)
			{
				
				if ($sLangId == 'edit')
				{					
					if (!is_array($aOptions))
					{
						return Phpfox_Error::display('Error when editing values. Please reload the page and try again.');
					}
					foreach ($aOptions as $sLang => $aEdit)
					{
						foreach ($aEdit as $iPhraseId => $sValue)
						{
							$oPhrase->update($iPhraseId, $sValue);
						}
					}
					continue;
				}
				else if ($sLangId == 'delete')
				{
					if (!is_array($aOptions))
					{
						return Phpfox_Error::display('Error when deleting values. Please reload the page and try again.');
					}
					foreach ($aOptions as $sLang => $aEdit)
					{
						foreach ($aEdit as $iPhraseId => $sValue)
						{
							// Get phrase var
							$sVar = $this->database()->select('var_name')
								->from(Phpfox::getT('language_phrase'))
								->where('phrase_id = ' . (int)$iPhraseId)
								->execute('getSlaveField');
							if (!empty($sVar))
							{
								$this->database()->delete(Phpfox::getT('input_option'), 'phrase_var = "input.'. $sVar .'" AND field_id = ' . $iFieldId);
								$oPhrase->delete($iPhraseId);
							}							
						}
					}
					continue;
				}
				foreach ($aOptions as $iOptionOrdering => $sOption)
				{
					$iOptionId = $this->database()->insert(Phpfox::getT('input_option'), array(
						'field_id' => $iFieldId,
						'phrase_var' => '',
						'ordering' => $iOptionOrdering
					));
					$aPhrase = array('module' => 'input|input', 'text' => array(), 'var_name' => 'input_option_' . $iFieldId.'_'.$iOptionId, 'product_id' => $aAction['product_id']);
					$aPhrase['text'][$sLangId] = $sOption;
					$sPhraseVar = $oPhrase->add($aPhrase);
					$this->database()->update(Phpfox::getT('input_option'), array('phrase_var' => $sPhraseVar), 'option_id = ' . $iOptionId);
				}				
			}			
		}
		
		// Add the Conditions. Conditions are restrictions for which user can enter information like "must be in user group 2", or "must be gender 1"
		if (isset($aVals['condition']) && is_array($aVals['condition']) && !empty($aVals['condition']))
		{
			foreach ($aVals['condition'] as $sType => $aCondition)
			{
				if ($sType == 'usergroup')
				{
					$sIn = implode(',',$aCondition);
					$this->database()->insert(Phpfox::getT('input_field_condition'), array(
						'field_id' => $iFieldId,
						'table_name' => 'user', // this could be different in special cases.
						'column_name' => 'user_group_id',
						'operand' => 'has',
						'full_value' => $sIn
					));
				}
			}
		}
		
		return true;
	}	

	public function update($aVals)
	{		
		Phpfox::getUserParam('custom.can_manage_custom_fields', true);
		$this->add($aVals);
		
		$this->cache()->remove();
		
		return true;
	}
	
	/*
	* This function is called by process services when creating or updating items  like a new marketplace listing
	* @aParams array must have an input array whose keys are the field_id and the value is text (for shorttext or longtext) or array (for select, multiselect, checkbox, radio)
	* @example
		$aParams = array(
			22 => "Value 1",  // This can be a shorttext or longtext type_id			
			83 => array(13, 14) // this can be a checkbox or a multiselect input
			11 => array(11) // this can be a radio or a select input
		@return bool true on success, false on failure
	*/
	public function addValue($aParams)
	{
		// Little mechanism to check if there is an Input to be added in this round
		$bReturn = true;
		foreach ($aParams['aVals'] as $sName => $mVal)
		{
			if (substr($sName,0,6) == 'input_')
			{
				$bReturn = false; break;
			}
		}
		if ($bReturn)
		{			
			return true; // There are no inputs here so this function has nothing to do
		}
		
		// Now that we know there is in fact an input we get all the inputs for this location
		$aAllInputs = Phpfox::getService('input')->get(array('action' => $aParams['action'], 'module' => $aParams['module']));
		
		$oInput = Phpfox::getLib('parse.input');
		
		foreach ($aParams['aVals'] as $sFieldName => $aVals)
		{
			$iInputId = str_replace('input_', '', $sFieldName);
			if (substr($sFieldName, 0, 6) != 'input_' || !isset($aAllInputs[$iInputId]))
			{
				continue;
			}
			
			// We need to check the conditions here
			if (isset($aAllInputs[$iInputId]['condition']) && is_array($aAllInputs[$iInputId]['condition']))
			{
				foreach ($aAllInputs[$iInputId]['condition'] as $aCondition)
				{
					if (Phpfox::getService('input')->canEnterInfo($aCondition) == false)
					{
						// Check if this field is required
						if ($aAllInputs[$iInputId]['is_required'] == 1)
						{
							$aParams['item_id'] = false;
							return false;
						}
						continue;
					}
				}
			}			
			
			if ($aAllInputs[$iInputId]['type_id'] == 'shorttext')
			{
				// or another select to see if a value already exists
				$this->database()->delete(Phpfox::getT('input_value_shorttext'), 'field_id = ' . (int)$iInputId .' AND item_id = ' . (int)$aParams['item_id']);
				$this->database()->insert(Phpfox::getT('input_value_shorttext'), array(
					'field_id' => (int)$iInputId, 
					'item_id' => (int)$aParams['item_id'], 
					'full_value' => $oInput->clean($aParams['aVals'][$sFieldName])
				));				
			}
			else if ($aAllInputs[$iInputId]['type_id'] == 'longtext')
			{
				$this->database()->delete(Phpfox::getT('input_value_longtext'), 'field_id = ' . (int)$iInputId .' AND item_id = ' . (int)$aParams['item_id']);
				$this->database()->insert(Phpfox::getT('input_value_longtext'), array(
					'field_id' => (int)$iInputId, 
					'item_id' => (int)$aParams['item_id'], 
					'long_value' => $oInput->clean($aParams['aVals'][$sFieldName])
				));	
			}
			else if ($aAllInputs[$iInputId]['type_id'] == 'select' || $aAllInputs[$iInputId]['type_id'] == 'radio')
			{
				$this->database()->delete(Phpfox::getT('input_value_option'), 'field_id = ' . (int)$iInputId . ' AND item_id = ' . (int)$aParams['item_id']);
				$this->database()->insert(Phpfox::getT('input_value_option'), array(
					'field_id' => (int)$iInputId,
					'item_id' => (int)$aParams['item_id'],
					'option_id' => (int)$aParams['aVals'][$sFieldName]
				));
			}
			else if ($aAllInputs[$iInputId]['type_id'] == 'multiselect' || $aAllInputs[$iInputId]['type_id'] == 'checkbox')
			{
				$this->database()->delete(Phpfox::getT('input_value_option'), 'field_id = ' . (int)$iInputId . ' AND item_id = ' . (int)$aParams['item_id']);
				
				foreach ($aParams['aVals'][$sFieldName] as $iOptionId)
				{
					$this->database()->insert(Phpfox::getT('input_value_option'), array(
						'field_id' => (int)$iInputId,
						'item_id' => (int)$aParams['item_id'],
						'option_id' => (int)$iOptionId
					));
				}
			}
		}
		return true;
	}
	
	public function updateOrder($aVals)
	{
		// maybe check a user group setting here
		foreach ($aVals as $iId => $iValue)
		{
			$this->database()->update(Phpfox::getT('input_field'), array('ordering' => (int)$iValue), 'field_id = ' . (int) $iId);	
		}
		return true;
	}

	public function updateOptionsOrder($aVals)
	{
		// maybe check a user group setting here
		foreach ($aVals as $iId => $iValue)
		{
			$this->database()->update(Phpfox::getT('input_option'), array('ordering' => (int)$iValue), 'option_id = ' . (int) $iId);			
		}
		return true;
	}
	
	
	/**/
	public function deleteField($iId)
	{
		// We have to delete the phrases from this field
		$aPhrases = $this->database()->select('i.phrase_var as field_phrase_var, io.phrase_var as option_phrase_var')
			->from(Phpfox::getT('input_field'), 'i')
			->leftjoin(Phpfox::getT('input_option'), 'io', 'io.field_id = i.field_id')
			->where('i.field_id = ' . (int)$iId)
			->execute('getSlaveRows');
			
		$oPhrase = Phpfox::getService('language.phrase.process');
		foreach ($aPhrases as $aPhrase)
		{
			if (isset($aPhrase['option_phrase_var']) && !empty($aPhrase['option_phrase_var']))
			{
				$oPhrase->delete($aPhrase['option_phrase_var'], true);
			}
		}
		$aPhrase = array_pop($aPhrases);
		$oPhrase->delete($aPhrase['field_phrase_var'], true);
		
		$this->database()->delete(Phpfox::getT('input_field'),'field_id = ' . (int)$iId);
		$this->database()->delete(Phpfox::getT('input_field_condition'),'field_id = ' . (int)$iId);
		$this->database()->delete(Phpfox::getT('input_option'),'field_id = ' . (int)$iId);
		$this->database()->delete(Phpfox::getT('input_value_longtext'),'field_id = ' . (int)$iId);
		$this->database()->delete(Phpfox::getT('input_value_shorttext'),'field_id = ' . (int)$iId);
		$this->database()->delete(Phpfox::getT('input_value_option'),'field_id = ' . (int)$iId);
		return true;
	}
		
}

?>
