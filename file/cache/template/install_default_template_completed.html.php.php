<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: August 6, 2012, 11:39 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: completed.html.php 2825 2011-08-09 20:14:13Z Raymond_Benc $
 */
 
 

 if ($this->_aVars['bIsUpgrade']): ?>
Successfully upgraded to phpFox version <?php echo $this->_aVars['sUpgradeVersion']; ?>.
<?php else: ?>
Successfully installed phpFox <?php echo $this->_aVars['sUpgradeVersion']; ?>.
<?php endif; ?>
<ul class="action">
	<li><a href="../index.php">View Your Site</a></li>
</ul>
