<a id="call-menu" href="#" onmouseout="MenuOut.animate(); return false;" onmouseover="MenuOver.animate(); return false;" onclick="Menu.toggle(); return false;"></a>
<div id="user-menu">
    <ul>
        <?php foreach($this->getVar('menu') as $key => $item): ?>
        <li class="<?php echo $item['class'] ?>">
            <a href="<?php echo $item['url'] ?>"><span><?php echo $item['label'] ?></span></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="clear"></div>