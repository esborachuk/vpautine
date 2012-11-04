<div class="menu_box">
    <div class="profilebox-title">
        <a href="{url link='music'}">Музыка</a>
    </div>
        <a href="{url link='music'}" class="all-items">
            Посмотреть все аудиозаписи...
        </a>
    <div id="musicbox-block">
        <div class="js_block_track_player"></div>
        <ul id="musicbox">
            <?php foreach ($this->getVar('musics') as $music): ?>
            <li>
                <div id="js_controller_music_play_<?php echo $music['song_id'] ?>">
                    <a href="#" onclick="$.ajaxCall('music.playInFeed', 'id=<?php echo $music['song_id'] ?>', 'GET'); return false;" title="<?php echo $music['title'] ?>">
                        <span class="title"><?php echo $music['title'] ?></span>
                        <span class="duration"><?php echo $music['duration'] ?></span>
                    </a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<div class="clear"></div>
