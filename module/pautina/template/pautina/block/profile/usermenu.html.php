<a id="call-menu" href="#"></a>
    <div id="user-menu">
        <div class="title">Мое меню</div>
        <ul>
            <?php foreach($this->getVar('menu') as $key => $item): ?>
            <li class="<?php echo $item['class'] ?>">
                <a href="<?php echo $item['url'] ?>"><span><?php echo $item['label'] ?></span></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
<script type="text/javascript">

</script>