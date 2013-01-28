<?php
class Pautina_Service_Profile_Usermenu extends Phpfox_Service
{
    public function getMenu()
    {
        $currentPage = Phpfox::getLib('request')->get('req2');
        $userId = Phpfox::getUserId();
        $userLink = Phpfox::getService('user')->getLink($userId);
        $url = Phpfox::getLib('url');

        $menu = array(
            'home' => array(
                'label' => 'Новости',
                'url' => $url->makeUrl(''),
                'class' => 'news'
            ),
            'friend' => array(
                'label' => 'Мои Друзья',
                'url' => $url->makeUrl('friend'),
                'class' => 'friend',
                'submenu' => array(
                    array(
                        'label' => 'Люди',
                        'url' => $url->makeUrl('user.browse'),
                        'class' => 'friend-browse'
                    )
                )
            ),
            'photo' => array(
                'label' => 'Мои Фото',
                'url' => $userLink . 'photo',
                'class' => 'photo',
                'submenu' => array(
                    array(
                        'label' => 'Добавить Фото',
                        'url' => $url->makeUrl('photo.add'),
                        'class' => 'photo-add',
                        'size' => 'small'
                    ),
                    array(
                        'label' => 'Все Фото',
                        'url' => $url->makeUrl('photo'),
                        'class' => 'photo-all'
                    )
                )
            ),
            'video' => array(
                'label' => 'Мое Видео',
                'url' => $userLink . 'video',
                'class' => 'video',
                'submenu' => array(
                    array(
                        'label' => 'Добавить Видео',
                        'url' => $url->makeUrl('video.add'),
                        'class' => 'video-add',
                        'size' => 'small'
                    ),
                    array(
                        'label' => 'Все Видео',
                        'url' => $url->makeUrl('video'),
                        'class' => 'video-all'
                    )
                )
            ),
            'blog' => array(
                'label' => 'Мой Блог',
                'url' => $userLink . 'blog',
                'class' => 'blog',
                'submenu' => array(
                    array(
                        'label' => 'Добавить Блог',
                        'url' => $url->makeUrl('blog.add'),
                        'class' => 'blog-add',
                        'size' => 'small'
                    ),
                    array(
                        'label' => 'Все Блоги',
                        'url' => $url->makeUrl('blog'),
                        'class' => 'blog-all'
                    )
                )
            ),
            'music' => array(
                'label' => 'Моя Музыка',
                'url' => $userLink . 'music',
                'class' => 'music',
                'submenu' => array(
                    array(
                        'label' => 'Добавить Музыку',
                        'url' => $url->makeUrl('music.upload'),
                        'class' => 'music-add',
                        'size' => 'small'
                    ),
                    array(
                        'label' => 'Вся Музыка',
                        'url' => $url->makeUrl('music'),
                        'class' => 'music-all'
                    )
                )
            )
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