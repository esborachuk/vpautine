<?php
defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Profile_Blogbox extends Phpfox_Component
{
    public function process()
    {
        $aUser = $this->getParam('aUser');
        if (!$aUser) {
            return false;
        }

        $blogboxService = Phpfox::getService('pautina.profile.blogbox');
        $blogCount = $blogboxService->getBlogCount($aUser['user_id']);

        if ($blogCount == 0) {
            return false;
        }

        $blogs = $blogboxService->getBlogs($aUser['user_id']);

        $allBlogLink = $userLink = Phpfox::getService('user')->getLink($aUser['user_id']) . 'blog';

        $this->template()->assign(
            array(
                'blogs' => $blogs,
                'blogCount' => $blogCount,
                'allBlogLink' => $allBlogLink
            )
        );

        return 'block';
    }
}
?>