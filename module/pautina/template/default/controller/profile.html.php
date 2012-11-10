<div id="pautina_image_page">
    <div class="menu_box" id="pautina_image">
        <div id="imagebox-detail" class="feed">
            <a href="#" class="closePautina">close</a>
            <div class="info"></div>
        </div>

        <div class="profilebox-title">
            <a href="">Фото</a>
        </div>
        <div id="imagebox-block">
            <ul id="imagebox">
                <?php foreach ($this->getVar('photos') as $photo): ?>
                <li>
                    <table>
                        <tr>
                            <td class="v-align">
                                <a data-photoid="<?php echo $photo['photo_id']; ?>" href="#" class="imagebox" title="<?php echo $photo['title'] ?>">
                                    <img src="<?php echo $photo['100_square'] ?>" alt="<?php echo $photo['title'] ?>">
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
</div>

<?php if ($this->getVar('photoId')): ?>
    <script type="text/javascript">
        Imagebox.getImage(<?php echo $this->getVar('photoId') ?>);
    </script>
<?php endif; ?>