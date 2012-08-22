<?php
class Sms_Component_Block_Sms extends Phpfox_Component
{
    public function process() {
        list($iTotalFriends, $aFriends) = Phpfox::getService('friend')->get('friend.user_id = ' . Phpfox::getUserId());
        $b = 5;
    }
}
?>