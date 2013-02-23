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
 * @package  		Module_User
 * @version 		$Id: register.class.php 4588 2012-08-09 10:18:00Z Raymond_Benc $
 */
class Registration_Component_Controller_Sms extends Phpfox_Component
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
        $isUserApproved = false;

        if ($aVals = $this->request()->getArray('val')) {
            if ($aVals['submit'] == 'submit' && isset($aVals['smsCode'])) {
                if ($this->getHash(mysql_real_escape_string($aVals['smsCode'])) == $this->getHashFromDb()) {
                    $this->enableUser();
                    $this->removeUserIdFromCookie();

                    $isUserApproved = true;
                }
            }
        }

        if (!$isUserApproved) {
            // return user to pending page
            Phpfox::getLib('url')->send('user.pending');
        }
    }

    public function getHash($smsCode)
    {
        if (!$this->hash) {
            $this->hash = md5(md5($smsCode) . $this->getUserId());
        }

        return $this->hash;
    }

    public function getUserId()
    {
        if (!$this->userId) {
            $this->userId = Phpfox::getCookie('reg_user_id');
        }

        return $this->userId;
    }

    public function getHashFromDb()
    {
        if (!$this->hashFromDb) {
            $this->hashFromDb = Phpfox::getLib('database')
                ->select('sms_hash')
                ->from($this->_sTable)
                ->where('user_id = "' . $this->getUserId() . '"')
                ->execute('getField');
        }

        return $this->hashFromDb;
    }

    public function removeUserIdFromCookie()
    {
        return Phpfox::setCookie('reg_user_id', '', time() - 3600);
    }

    public function enableUser()
    {
        Phpfox::getService('user.process')->userPending($this->getUserId(), 1);
        $aUser = Phpfox::getService('user.user')->getUser($this->getUserId());
        Phpfox::getService('user.auth')->login($aUser['email'], $aUser['password'], false, 'email', true);
        $this->url()->send('');
    }
}

?>