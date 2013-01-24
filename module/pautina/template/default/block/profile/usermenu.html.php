<div id="user-menu">
    <ul>
        <li class="user">{$sUserProfileImage}</li>
        <?php foreach($this->getVar('menu') as $key => $item): ?>
        <li class="<?php echo $item['class'] ?>">
            <a href="<?php echo $item['url'] ?>" class="first"></a>
            <?php if (isset($item['submenu'])): ?>
                <span class="user-menu-link-wrapper">
                    <a href="<?php echo $item['url'] ?>" class="sub">
                        <span><?php echo $item['label'] ?></span>
                    </a>
                    <?php foreach($item['submenu'] as $submenu): ?>
                        <a href="<?php echo $submenu['url'] ?>" class="sub <?php echo $submenu['class'] ?> <?php if (isset($submenu['size'])) echo $submenu['size'] ?>">
                            <span><?php echo $submenu['label'] ?></span>
                        </a>
                    <?php endforeach; ?>
                </span>
            <?php endif; ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="clear"></div>