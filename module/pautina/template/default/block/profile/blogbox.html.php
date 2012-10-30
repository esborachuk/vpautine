<div class="menu_box">
    <div class="profilebox-title">Блог</div>
        <a href="{$allBlogLink}" class="all-items">Посмотреть все статьи блога...<span>{$blogCount}&nbsp;</span></a>
    <div id="blogbox-block">
        <ul id="blogbox">
            <?php foreach ($this->getVar('blogs') as $blog): ?>
            <li>
                <a href="<?php echo $blog['url'] ?>" class="" title="<?php echo $blog['title'] ?>">
                    <span class="title"><?php echo $blog['title']; ?></span>
                    <span class="data"><?php echo date('d.m.Y', $blog['time_stamp']); ?></span>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
