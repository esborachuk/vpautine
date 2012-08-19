<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: August 19, 2012, 7:11 pm */ ?>
Hello World!
<br /><br />
<?php echo $this->_aVars['sSampleVariable']; ?>
<br />
<a href="#" id="sms_id">Click me</a>
<br />
<b>Members:</b>
<br />
<ul>
<?php if (count((array)$this->_aVars['aUsers'])):  foreach ((array) $this->_aVars['aUsers'] as $this->_aVars['aUser']): ?>
        <li><?php echo $this->_aVars['aUser']['full_name']; ?></li>
<?php endforeach; endif; ?>
</ul>
<?php Phpfox::getBlock('sms.display', array()); ?>
