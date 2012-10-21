<div>
    <ul id="imagebox">
        <?php foreach ($this->getVar('photos') as $photo): ?>
            <li>
                <a class="imagebox" data-image="<?php echo $photo['image_src_medium'] ?>" data-id="<?php echo $photo['photo_id']; ?>" href="#" title="<?php echo $photo['title'] ?>">
                    <img src="<?php echo $photo['image_src_small'] ?>" alt="<?php echo $photo['title'] ?>">
                </a>
                <a href="<?php echo $photo['link']; ?>" rel="<?php echo $photo['photo_id']; ?>" class="thickbox photo_holder_image" title="<?php echo $photo['title'] ?>">
                    <img src="<?php echo $photo['image_src_small'] ?>" alt="<?php echo $photo['title'] ?>">
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="imagebox-detail">

</div>
