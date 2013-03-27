<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox_Component
 * @version 		$Id: pending.class.php 1581 2010-05-07 10:16:40Z Miguel_Espinoza $
 */
class Registration_Component_Controller_Pending extends Phpfox_Component
{
    private $hash;
    private $userId;
    private $hashFromDb;

    public function __construct()
    {
        $this->_sTable = Phpfox::getT('registration');
    }

	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
        $url = $this->url()->getFullUrl();

        if ($aVals = $this->request()->getArray('val')) {
            if ($aVals['submit'] == 'submit' && isset($aVals['smsCode'])) {
                if ($this->getHash(mysql_real_escape_string($aVals['smsCode']), $aVals['userId']) == $this->getHashFromDb($aVals['userId'])) {
                    $this->enableUser($aVals['userId']);
                } else {
                    Phpfox_Error::set('неверное значение кода');
                }
            }
        }

		$this->template()->assign(array(
            'iStatus'   => Phpfox::getUserBy('status_id'),
            'url'       => $url
        ));
	}

    public function getHash($smsCode, $userId)
    {
        if (!$this->hash) {
            $this->hash = md5(md5($smsCode) . $userId);
        }

        return $this->hash;
    }

    public function getHashFromDb($userId)
    {
        if (!$this->hashFromDb) {
            $this->hashFromDb = Phpfox::getLib('database')
                ->select('sms_hash')
                ->from($this->_sTable)
                ->where('user_id = "' . $userId . '"')
                ->execute('getField');
        }

        return $this->hashFromDb;
    }

    public function enableUser($userId)
    {
        Phpfox::getService('user.process')->userPending($userId, 1);
        $aUser = Phpfox::getService('user.user')->getUser($userId);
        Phpfox::getService('user.auth')->login($aUser['email'], $aUser['password'], false, 'email', true);
        $this->url()->send('');
    }
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('user.component_controller_pending_clean')) ? eval($sPlugin) : false);
	}
}

?>