<script type="text/javascript">
    AllImages.init({$pageCount}, '{$requestUrl}', {$userId});
    Imagebox.getImage('<?php echo $this->_aVars['aPhotos'][0]['photo_id']; ?>', '{$userId}');
</script>


<div id="scrollbar_wrapper" class="photo">
    <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
    <div class="viewport">
        <div class="overview">
            <div id="ajax_wrapper"></div>
        </div>
    </div>
</div>