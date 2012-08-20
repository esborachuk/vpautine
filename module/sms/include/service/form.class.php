<?php
defined('PHPFOX') or exit('NO DICE!');

class Sms_Service_From extends Phpfox_Component
{
    public function __construct() {

    }

    public function getSelect() {
        return Phpfox::getLib('database')->select("t2.*");
    }
}