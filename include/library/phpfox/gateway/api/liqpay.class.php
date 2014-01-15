<?php 

defined('PHPFOX') or exit('NO DICE!');

/**
 * LiqPay Payment Gateway API
 * 
 * @copyright		[]
 * @author			Anton Ko
 */
class Phpfox_Gateway_Api_Liqpay implements Phpfox_Gateway_Interface {
    /**
	 * Holds an ARRAY of settings to pass to the form
	 *
	 * @var array
	 */
	private $_aParam = array();
	
	/**
	 * Holds an ARRAY of supported currencies for this payment gateway
	 *
	 * @var array
	 */
	private $_aCurrency = array('USD', 'EUR', 'UAH');
	
	/**
	 * Class constructor
	 *
	 */
	public function __construct()
	{
		
	}
        
        /**
	 * Set the settings to be used with this class and prepare them so they are in an array
	 *
	 * @param array $aSetting ARRAY of settings to prepare
	 */
	public function set($aSetting)
	{
		$this->_aParam = $aSetting;
		
		if (Phpfox::getLib('parse.format')->isSerialized($aSetting['setting']))
		{
			$this->_aParam['setting'] = unserialize($aSetting['setting']);
		}
	}
        
        /**
	 * Each gateway has a unique list of params that must be passed with the HTML form when posting it
	 * to their site. This method creates that set of custom fields.
	 *
	 * @return array ARRAY of all the custom params
	 */
	public function getEditForm()
	{		
		return array(
			'paypal_email' => array(
				'phrase' => Phpfox::getPhrase('core.paypal_email'),
				'phrase_info' => Phpfox::getPhrase('core.the_email_that_represents_your_paypal_account'),
				'value' => (isset($this->_aParam['setting']['paypal_email']) ? $this->_aParam['setting']['paypal_email'] : '')
			)
		);
	}
        
        /**
	 * Returns the actual HTML <form> used to post information to the 3rd party gateway when purchasing
	 * an item using this specific payment gateway
	 *
	 * @return bool FALSE if we can't use this payment gateway to purchase this item or ARRAY if we have successfully created a form
	 */
	public function getForm()
	{		
		if (!in_array($this->_aParam['currency_code'], $this->_aCurrency))
		{
			if (isset($this->_aParam['alternative_cost']))
			{
				$aCosts = unserialize($this->_aParam['alternative_cost']);
				$bPassed = false;
				foreach ($aCosts as $sCode => $iPrice)
				{
					if (in_array($sCode, $this->_aCurrency))
					{
						$this->_aParam['amount'] = $iPrice;
						$this->_aParam['currency_code'] = $sCode;	
						$bPassed = true;
						break;
					}
				}
				
				if ($bPassed === false)
				{
					return false;
				}
			}
			else 
			{
				return false;
			}
		}
		
		$aForm = array(
			'url' => ($this->_aParam['is_test'] ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr'),
			'param' => array(
				'business' => $this->_aParam['setting']['paypal_email'],
				'item_name' => $this->_aParam['item_name'],
				'item_number' => $this->_aParam['item_number'],
				'currency_code' => $this->_aParam['currency_code'],
				'notify_url' => Phpfox::getLib('gateway')->url('paypal'),
				'return' => $this->_aParam['return'],
				'no_shipping' => '1',
				'no_note' => '1'
			)
		);
		
		if ($this->_aParam['recurring'] > 0)
		{
	        switch ($this->_aParam['recurring'])
	        {
	            case '1':
	                $t3 = 'M'; 
	                $p3 = 1;
	                break;
	            case '2':
	                $t3 = 'M'; 
	                $p3 = 3;
	                break;
	            case '3':
	                $t3 = 'M'; 
	                $p3 = 6;
	                break;
	            case '4':
	                $t3 = 'Y'; 
	                $p3 = 1;
	                break;              
	        }			
			
	        $aCosts = unserialize($this->_aParam['alternative_recurring_cost']);	
			
			$aForm['param']['cmd'] = '_xclick-subscriptions';
			$aForm['param']['a1'] = $this->_aParam['amount'];
			$aForm['param']['a3'] = $aCosts[Phpfox::getService('core.currency')->getDefault()];
			$aForm['param']['t1'] = $t3;
			$aForm['param']['p1'] = $p3;
			$aForm['param']['t3'] = $t3;
			$aForm['param']['p3'] = $p3;			
			$aForm['param']['src'] = '1';
			$aForm['param']['sra'] = '1';				
		}
		else 
		{
			$aForm['param']['cmd'] = '_xclick';
			$aForm['param']['amount'] = $this->_aParam['amount'];
		}
		
		return $aForm;
	}
        
        public function callback(){}
}

?>