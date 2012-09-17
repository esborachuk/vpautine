<?php
class Pautina_Service_Profile_Usermenu extends Phpfox_Service {
    public function getMenu() {
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
            'blog' => array(
                'label' => 'Блоги',
                'url' => $userLink . 'blog',
                'class' => 'blog'
            ),
            'event' => array(
                'label' => 'События',
                'url' => $userLink . 'event',
                'class' => 'event'
            ),
            'friend' => array(
                'label' => 'Друзья',
                'url' => $userLink . 'friend',
                'class' => 'friend'
            ),
            'marketplace' => array(
                'label' => 'Списки',
                'url' => $userLink . 'marketplace',
                'class' => 'marketplace'
            ),
            'music' => array(
                'label' => 'Аудиозаписи',
                'url' => $userLink . 'music',
                'class' => 'music'
            ),
            'photo' => array(
                'label' => 'Фото',
                'url' => $userLink . 'photo',
                'class' => 'photo'
            ),
            'poll' => array(
                'label' => 'Опросы',
                'url' => $userLink . 'poll',
                'class' => 'poll'
            ),
            'quizz' => array(
                'label' => 'Викторины',
                'url' => $userLink . 'quizz',
                'class' => 'quizz'
            ),
            'video' => array(
                'label' => 'Видеозаписи',
                'url' => $userLink . 'video',
                'class' => 'video'
            ),
        );

        foreach ($menu as $key => $item) {
            if ($key == $currentPage) {
                $menu[$key]['class'] .= ' ' . 'active';
            }
        }

        return $menu;
    }
}

?>