<?php
class Pautina_Component_Block_Friends extends Phpfox_Component
{
    public function process() {
        list($iTotalFriends, $aFriends) = Phpfox::getService('friend')->get('friend.user_id = ' . Phpfox::getUserId());

        $this->template()->assign(array(
            'iTotalFriends' => $iTotalFriends,
            'aFriends' => $aFriends
        ));

    }
}