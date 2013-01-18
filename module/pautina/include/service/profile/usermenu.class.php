<?php
class Pautina_Service_Profile_Usermenu extends Phpfox_Service
{
    public function getMenu()
    {
        $currentUser = Phpfox::getLib('request')->get('req1');
        $userName = Phpfox::getUserBy('user_name');
        $currentPage = Phpfox::getLib('request')->get('req2');

        $userId = Phpfox::getUserId();
        $userLink = Phpfox::getService('user')->getLink($userId);
        $url = Phpfox::getLib('url');

        $menu = array(
            'friend' => array(
                'label' => 'Мои Друзья',
                'url' => $url->makeUrl('friend.view_my'),
                'class' => 'friend'
            ),
            'photo' => array(
                'label' => 'Мои Фото',
                'url' => $url->makeUrl('photo.view_my'),
                'class' => 'photo'
            ),
            'video' => array(
                'label' => 'Мое Видео',
                'url' => $url->makeUrl('video.view_my'),
                'class' => 'video'
            ),
            'blog' => array(
                'label' => 'Мой Блог',
                'url' => $url->makeUrl('blog.view_my'),
                'class' => 'blog'
            ),
            'music' => array(
                'label' => 'Моя Музыка',
                'url' => $url->makeUrl('music.view_my'),
                'class' => 'music'
            )
        );

        if ($currentUser == $userName) {
            foreach ($menu as $key => $item) {
                if ($key == $currentPage) {
                    $menu[$key]['class'] .= ' ' . 'active';
                }
            }
        }

        return $menu;
    }
}

?>