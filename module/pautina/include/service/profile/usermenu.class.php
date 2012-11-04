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
            'wall' => array(
                'label' => 'Стена',
                'url' => $userLink . '',
                'class' => 'wall'
            ),
            'info' => array(
                'label' => 'Информация',
                'url' => $userLink . 'info',
                'class' => 'info'
            ),
            'friend' => array(
                'label' => 'Друзья',
                'url' => $url->makeUrl('friend.view_my'),
                'class' => 'friend'
            ),
            'photo' => array(
                'label' => 'Фото',
                'url' => $url->makeUrl('photo.view_my'),
                'class' => 'photo'
            ),
            'video' => array(
                'label' => 'Видеозаписи',
                'url' => $url->makeUrl('video.view_my'),
                'class' => 'video'
            ),
            'blog' => array(
                'label' => 'Блоги',
                'url' => $url->makeUrl('blog.view_my'),
                'class' => 'blog'
            ),
            'music' => array(
                'label' => 'Аудиозаписи',
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