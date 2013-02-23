<?php
defined('PHPFOX') or exit('NO DICE!');


class Registration_Service_Phone extends Phpfox_Service
{
    private $smsCode;
    private $smsHash;
    private $phoneCrypt;
    private $phoneDecrypt;
    private $iv = 'gGDENjd0zTXuE3QUUfxA9L9bvAaXRD4vui4SOH9kz0o=';
    public $userId;

    const MY_MCRYPT_CIPHER        = MCRYPT_RIJNDAEL_256;
    const MY_MCRYPT_MODE          = MCRYPT_MODE_CBC;
    const MY_MCRYPT_KEY_STRING    = "1234567890-abcDEFGHUzyxwvutsrqpo"; // This should be a random string, recommended 32 bytes

    public  $lastIv               = '';

    public function __construct()
    {
        $this->_sTable = Phpfox::getT('registration');
        $this->date = date('Ymd', PHPFOX_TIME);
        $this->_oSession = Phpfox::getService('log.session');
    }

    public function phone($phone, $userId)
    {
        $this->userId = $userId;

        $smsService = Phpfox::getService('sms.sms');
        $this->savePhone($phone);
        //$smsReport = $smsService->sendRegistrationCode($phone, $this->smsCode);
    }

    public function savePhone($phone)
    {
        $this->smsCode = $this->generateRandomCode();
        $this->smsHash = md5(md5($this->smsCode) . $this->userId);
        $this->phoneCrypt = $this->mcryptEncryptString($phone);

        $this->database()->insert($this->_sTable, array(
            'user_id' => $this->userId,
            'sms_hash' => $this->smsHash,
            'phone' => $this->phoneCrypt
        ));

        $this->saveUserIdToCookie();
    }

    public function generateRandomCode()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $result = '';
        for ($i = 0; $i < 5; $i++)
            $result .= $characters[mt_rand(0, 61)];

        return $result;
    }

    public function saveUserIdToCookie()
    {
        return Phpfox::setCookie('reg_user_id', $this->userId);
    }

    public function isOnRegistration()
    {
        if (!Phpfox::getCookie('reg_user_id')) {
            return false;
        }

        return true;
    }

    /**
     * Accepts a plaintext string and returns the encrypted version
     */
    public function mcryptEncryptString($stringToEncrypt)
    {
        $iv = base64_decode($this->iv);

        // Encrypt the data
        $encryptedData = mcrypt_encrypt( self::MY_MCRYPT_CIPHER, self::MY_MCRYPT_KEY_STRING, $stringToEncrypt , self::MY_MCRYPT_MODE , $iv );

        // Data may need to be passed through a non-binary safe medium so base64_encode it if necessary. (makes data about 33% larger)
        $encryptedData = base64_encode( $encryptedData );

        // Return the encrypted data
        return $encryptedData;
    }


    /**
     * Accepts a plaintext string and returns the encrypted version
     */
    public function mcryptDecryptString( $stringToDecrypt, $iv, $base64encoded = true )
    {
        // Note: the decryption IV must be the same as the encryption IV so the encryption IV must be stored during encryption

        // The data may have been base64_encoded so decode it if necessary (must come before the decrypt)
        if ( $base64encoded ) {
            $stringToDecrypt = base64_decode( $stringToDecrypt );
            $iv              = base64_decode( $iv );
        }

        // Decrypt the data
        $decryptedData = mcrypt_decrypt( self::MY_MCRYPT_CIPHER, self::MY_MCRYPT_KEY_STRING, $stringToDecrypt, self::MY_MCRYPT_MODE, $iv );

        // Return the decrypted data
        return rtrim( $decryptedData ); // the rtrim is needed to remove padding added during encryption
    }
}

?>