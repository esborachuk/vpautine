<div class="menu_box">
    <div class="profilebox-title">
        <a href="{url link='video'}">Видео Сайта</a>
    </div>
    <a href="{url link='video'}" class="all-items">
        Посмотреть все видео...
    </a>
    <div id="videobox-block">
        <ul id="videobox">
            <?php foreach ($this->getVar('videos') as $video): ?>
            <li>
                <a href="<?php echo $video['url'] ?>" class="" title="<?php echo $video['title'] ?>">
                    <img src="<?php echo $video['video_img'] ?>" alt="<?php echo $video['title'] ?>"  title="<?php echo $video['title'] ?>" />
                </a>
                <p>
                    <span class="title-block"><?php echo $video['title'] ?></span>
                </p>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>