<div class="menu_box">
    <div class="profilebox-title">
        <a href="{url link='video.view_my'}">Видео</a>
        <?php if ($this->getVar('showAddLink')): ?>
        <span class="add-photo">
                <a title="Добавить видео" href="{url link='video.add'}">
                    + добавить...
                </a>
        </span>
        <?php endif; ?>
    </div>
    <a href="{url link='video.view_my'}" class="all-items">
        Посмотреть все видео...
        <span>{$videoCount}&nbsp; видео</span>
    </a>
    <div id="videobox-block">
        <ul id="videobox">
            <?php foreach ($this->getVar('videos') as $video): ?>
            <li>
                <a href="<?php echo $video['url'] ?>" class="" title="<?php echo $video['title'] ?>">
                    <img src="<?php echo $video['video_img'] ?>" alt="<?php echo $video['title'] ?>"  title="<?php echo $video['title'] ?>" />
                </a>
                <p>
                    <?php echo $video['title'] ?>
                </p>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>