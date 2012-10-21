<div id="menu_box">
    <div class="profilebox-title">Фото</div>
    <a href="{$allPhotoLink}" class="all-items">Посмотреть все фото...<span>{$photoCount}&nbsp; фото</span></a>
    <div id="imagebox-block">
        <ul id="imagebox">
            <?php foreach ($this->getVar('photos') as $photo): ?>
                <li>
                    <a href="<?php echo $photo['link']; ?>" rel="<?php echo $photo['photo_id']; ?>" class="thickbox photo_holder_image" title="<?php echo $photo['title'] ?>">
                        <img src="<?php echo $photo['image_src_small'] ?>" alt="<?php echo $photo['title'] ?>">
                    </a>

                    <?php if ($photo['total_like'] > 0): ?>
                        <span class="like"><?php echo $photo['total_like']; ?></span>
                    <?php endif; ?>

                    <?php if ($photo['total_comment'] > 0): ?>
                        <span class="comments"><?php echo $photo['total_comment']; ?></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
