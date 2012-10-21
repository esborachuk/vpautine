<div class="profilebox-title">Видео</div>
<a href="{$allVideoLink}">Посмотреть все видео...<span>{$videoCount}</span></a>
<div id="blogbox-block">
    <ul id="blogbox">
        <?php foreach ($this->getVar('videos') as $video): ?>
        <li>
            <a href="<?php echo $video['url'] ?>" class="" title="<?php echo $video['title'] ?>">
                <img src="<?php echo $video['video_img'] ?>" alt="<?php echo $video['title'] ?>"  title="<?php echo $video['title'] ?>" />
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
