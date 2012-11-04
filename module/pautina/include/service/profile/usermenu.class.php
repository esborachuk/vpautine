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
                'url' => $userLink . 'friend',
                'class' => 'friend'
            ),
            'photo' => array(
                'label' => 'Фото',
                'url' => $userLink . 'photo',
                'class' => 'photo'
            ),
            'video' => array(
                'label' => 'Видеозаписи',
                'url' => $userLink . 'video',
                'class' => 'video'
            ),
            'blog' => array(
                'label' => 'Блоги',
                'url' => $userLink . 'blog',
                'class' => 'blog'
            ),
            'music' => array(
                'label' => 'Аудиозаписи',
                'url' => $userLink . 'music',
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