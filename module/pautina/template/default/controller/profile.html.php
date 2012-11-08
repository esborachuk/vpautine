<div id="pautina_image_page">
    <div class="menu_box" id="pautina_image">
        <div class="profilebox-title">
            <a href="{url link='photo'}">Фото</a>
        </div>
        <a href="{url link='photo'}" class="all-items">Посмотреть все фото...<span></span></a>
        <div id="imagebox-block">
            <ul id="imagebox">
                <?php foreach ($this->getVar('photos') as $photo): ?>
                <li>
                    <table>
                        <tr>
                            <td class="v-align">
                                <a href="#" data-photoid="<?php echo $photo['photo_id']; ?>" data-userid="<?php echo Phpfox::getUserId(); ?>" class="imagebox" title="<?php echo $photo['title'] ?>">
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
                            </td>
                        </tr>
                    </table>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div id="imagebox-detail"></div>
</div>

<?php if ($this->getVar('photoId')): ?>
    <script type="text/javascript">
        Imagebox.getImage(<?php echo $this->getVar('photoId') ?>);
    </script>
<?php endif; ?>