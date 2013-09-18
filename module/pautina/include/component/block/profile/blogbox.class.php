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

        $loginUserId = Phpfox::getUserId();

        $showAddLink = false;
        if ($loginUserId == $aUser['user_id']) {
            $showAddLink = true;
        }

        $blogboxService = Phpfox::getService('pautina.profile.blogbox');
        $blogCount = $blogboxService->getBlogCount($aUser['user_id']);

        $blogs = $blogboxService->getBlogs($aUser['user_id']);

        $this->template()->assign(
            array(
                'blogs' => $blogs,
                'blogCount' => $blogCount,
                'showAddLink'   => $showAddLink,
                'moduleUrl'     => Phpfox::getService('user')->getLink($aUser['user_id']) . 'blog/',
            )
        );

        return 'block';
    }
}
?>