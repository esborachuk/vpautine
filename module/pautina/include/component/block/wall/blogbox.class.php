<?php
defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Wall_Blogbox extends Phpfox_Component
{
    public function process()
    {
        $blogboxService = Phpfox::getService('pautina.profile.blogbox');
        $blogs = $blogboxService->getLastBlogs();

        $this->template()->assign(
            array(
                'blogs' => $blogs
            )
        );

        return 'block';
    }
}
?>