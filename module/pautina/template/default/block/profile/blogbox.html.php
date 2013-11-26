<div class="menu_box">
    <div class="profilebox-title">
        <a href="<?php echo $this->getVar('moduleUrl'); ?>">Блог</a>
        <?php if ($this->getVar('showAddLink')): ?>
        <span class="add-photo">
                <a title="Добавить блог" href="{url link='blog.add'}">
                    + добавить...
                </a>
        </span>
        <?php endif; ?>
    </div>
        <a href="<?php echo $this->getVar('moduleUrl'); ?>" class="all-items">
            Посмотреть все статьи блога...<span>{$blogCount}&nbsp;</span>
        </a>
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
<div class="clear"></div>
