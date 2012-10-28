<div class="menu_box">
    <div class="profilebox-title">
        <a href="{$allPhotoLink}">Фото</a>
        <span class="add-photo"><a title="Добавить фото" href="{url link='photo.add'}">(+)</a></span>

    </div>
    <a href="{$allPhotoLink}" class="all-items">Посмотреть все фото...<span></span></a>
    <div id="imagebox-block">
        <ul id="imagebox">
            <?php foreach ($this->getVar('photos') as $photo): ?>
                <li>
                    <a href="<?php echo $photo['link']; ?>" rel="<?php echo $photo['photo_id']; ?>" class="thickbox photo_holder_image" title="<?php echo $photo['title'] ?>">
                        <img src="<?php echo $photo['image_src_small'] ?>" alt="<?php echo $photo['title'] ?>">
                        <div class="block-like" <?php if($photo['total_like'] <= 0 && $photo['total_comment'] <= 0):  ?>style="display: none!important;" <?php endif; ?>   >
                            <?php if ($photo['total_like'] > 0): ?>
                                <span class="like"><?php echo $photo['total_like']; ?></span>
                            <?php endif; ?>

                            <?php if ($photo['total_comment'] > 0): ?>
                                <span class="comments"><?php echo $photo['total_comment']; ?></span>
                            <?php endif; ?>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
