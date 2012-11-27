<div class="menu_box">
    <div id="imagebox-detail" class="feed">
        <a href="#" class="closePautina"></a>
        <div class="info"></div>
    </div>
    <div class="profilebox-title">
        <a href="<?php echo $this->getVar('moduleUrl'); ?>">Фото</a>
        <?php if ($this->getVar('showAddLink')): ?>
        <span class="add-photo">
                <a title="Добавить фото" href="{url link='photo.add'}">
                    + добавить...
                </a>
            </span>
        <?php endif; ?>
    </div>
    <a href="<?php echo $this->getVar('moduleUrl'); ?>" class="all-items">Посмотреть все фото...<span></span></a>
    <div id="imagebox-block">
        <ul id="imagebox">
            <?php foreach ($this->getVar('photos') as $photo): ?>
                <li>
                    <table>
                        <tr>
                            <td class="v-align">
                                <a data-photoid="<?php echo $photo['photo_id']; ?>" data-userid="<?php echo $this->_aVars['aUser']['user_id']; ?>" href="#" class="imagebox" title="<?php echo $photo['title'] ?>">
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
<div class="clear"></div>