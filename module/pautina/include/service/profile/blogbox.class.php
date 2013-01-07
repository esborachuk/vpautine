<?php
class Pautina_Service_Profile_Blogbox extends Phpfox_Service
{
    protected $_userId;
    protected $_page;
    protected $_pageSize;
    protected $_blogCount;

    public function getBlogs($userId, $page = 1, $pageSize = 9)
    {
        $this->_userId = (int)$userId;
        $this->_page = $page;
        $this->_pageSize = $pageSize;

        $blogService = Phpfox::getService('blog');
        $blogIds = $this->getUserBlogIds();

        $blogs = array();
        foreach ($blogIds as $blog) {
            $blogs[] = $blogService->getBlog($blog['blog_id']);
        }
        unset($blog);

        foreach ($blogs as &$blog) {
            $blog['url'] = Phpfox::permalink('blog', $blog['blog_id'], $blog['title']);
        }
        unset($blog);

        return $blogs;
    }

    public function getUserBlogIds()
    {
        $blogCount = $this->getBlogCount($this->_userId);

        $blogIds = $this->database()->select('blog_id')
                    ->from(Phpfox::getT('blog'))
                    ->where('user_id = ' . (int)$this->_userId)
                    ->limit($this->_page, $this->_pageSize, $blogCount)
                    ->order('time_stamp DESC')
                    ->execute('getRows');

        return $blogIds;
    }

    public function getBlogCount($userId)
    {
        if (!$this->_blogCount) {
            $blogIds = $this->database()->select('blog_id')
                ->from(Phpfox::getT('blog'))
                ->where('user_id = ' . $userId)
                ->execute('getRows');

            $this->_blogCount = count($blogIds);
        }

        return $this->_blogCount;
    }

    public function getLastBlogs($page = 1, $pageSize = 9)
    {
        $this->_page = $page;
        $this->_pageSize = $pageSize;
        $this->_count = 9;

        $blogService = Phpfox::getService('blog');
        $blogIds = $this->database()->select('blog_id')
            ->from(Phpfox::getT('blog'))
            ->limit($this->_page, $this->_pageSize, $this->_count)
            ->order('time_stamp DESC')
            ->execute('getRows');

        $blogs = array();
        foreach ($blogIds as $blog) {
            $blogs[] = $blogService->getBlog($blog['blog_id']);
        }
        unset($blog);

        foreach ($blogs as &$blog) {
            $blog['url'] = Phpfox::permalink('blog', $blog['blog_id'], $blog['title']);
        }
        unset($blog);

        return $blogs;
    }
}
?>