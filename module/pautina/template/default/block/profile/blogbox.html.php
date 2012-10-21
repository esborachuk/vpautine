<div class="profilebox-title">Блог</div>
    <a href="{$allBlogLink}">Посмотреть все статьи блога...<span>{$blogCount}</span></a>
<div id="blogbox-block">
    <ul id="blogbox">
        <?php foreach ($this->getVar('blogs') as $blog): ?>
        <li>
            <a href="<?php echo $blog['blog_url'] ?>" class="" title="<?php echo $blog['title'] ?>">
                <span><?php echo $blog['title']; ?></span>
                <span><?php echo date('d.m.Y', $blog['time_stamp']); ?></span>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
