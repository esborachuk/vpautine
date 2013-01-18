<?php
defined('PHPFOX') or exit('NO DICE!');

class Pautina_Service_Header_Header extends Phpfox_Service
{
    public function showMiniHeader($controller)
    {
        $pagesWithMiniHeader = array(
            'blog_index',
            'music_index',
            'video_index',
            'photo_index',
            'friend_profile'
        );

        if (in_array($controller, $pagesWithMiniHeader)) {
            return true;
        } else {
            return false;
        }
    }
}
?>