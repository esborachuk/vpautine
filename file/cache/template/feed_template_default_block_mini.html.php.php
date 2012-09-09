<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: August 27, 2012, 8:55 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Feed
 * @version 		$Id: mini.html.php 4545 2012-07-20 10:40:35Z Raymond_Benc $
 */
 
 

?>
<div class="feed_share_holder">
<?php if (! isset ( $this->_aVars['aParentFeed']['no_user_show'] )): ?>
<?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aParentFeed']['user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aParentFeed']['user_name'], ((empty($this->_aVars['aParentFeed']['user_name']) && isset($this->_aVars['aParentFeed']['profile_page_id'])) ? $this->_aVars['aParentFeed']['profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten($this->_aVars['aParentFeed']['full_name'], 50, '...') . '</a></span>'; ?>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aParentFeed']['parent_user'] )): ?> <?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/arrow.png','class' => 'v_middle')); ?> <?php echo '<span class="user_profile_link_span" id="js_user_name_link_' . $this->_aVars['aParentFeed']['parent_user']['parent_user_name'] . '"><a href="' . Phpfox::getLib('phpfox.url')->makeUrl('profile', array($this->_aVars['aParentFeed']['parent_user']['parent_user_name'], ((empty($this->_aVars['aParentFeed']['parent_user']['parent_user_name']) && isset($this->_aVars['aParentFeed']['parent_user']['parent_profile_page_id'])) ? $this->_aVars['aParentFeed']['parent_user']['parent_profile_page_id'] : null))) . '">' . Phpfox::getLib('phpfox.parse.output')->shorten($this->_aVars['aParentFeed']['parent_user']['parent_full_name'], 50, '...') . '</a></span>'; ?> <?php endif;  if (! empty ( $this->_aVars['aParentFeed']['feed_info'] )): ?> <?php echo $this->_aVars['aParentFeed']['feed_info'];  endif; ?>
	
	
<?php if (! empty ( $this->_aVars['aParentFeed']['feed_mini_content'] )): ?>
			<div class="activity_feed_content_status">
				<div class="activity_feed_content_status_left">
					<img src="<?php echo $this->_aVars['aParentFeed']['feed_icon']; ?>" alt="" class="v_middle" /> <?php echo $this->_aVars['aParentFeed']['feed_mini_content']; ?> 
				</div>
				<div class="activity_feed_content_status_right">
<?php /* Cached: August 27, 2012, 8:55 am */ ?>
<?php if (PHPFOX_IS_AJAX && Phpfox ::getLib('request')->get('theater') == 'true'): ?>

			
<?php elseif (isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'view'): ?>
			<div class="feed_share_custom">	
<?php if (Phpfox ::isModule('share') && Phpfox ::getParam('share.share_twitter_link')): ?>
				<div class="feed_share_custom_block"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" data-count="horizontal" data-via="<?php echo Phpfox::getParam('feed.twitter_share_via'); ?>"><?php echo Phpfox::getPhrase('feed.tweet'); ?></a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && Phpfox ::getParam('share.share_google_plus_one')): ?>
				<div class="feed_share_custom_block">
					<g:plusone href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" size="medium"></g:plusone>
					<?php echo '
					<script type="text/javascript">
					  (function() {
						var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
						po.src = \'https://apis.google.com/js/plusone.js\';
						var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script>
					'; ?>

				</div>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && Phpfox ::getParam('share.share_facebook_like')): ?>
				<div class="feed_share_custom_block">
					<iframe src="http://www.facebook.com/plugins/like.php?app_id=156226084453194&amp;href=<?php if (! empty ( $this->_aVars['aFeed']['feed_link'] )):  echo $this->_aVars['aFeed']['feed_link'];  else:  echo Phpfox::getLib('phpfox.url')->makeUrl('current');  endif; ?>&amp;send=false&amp;layout=button_count&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;width=90&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:140px; height:21px;" allowTransparency="true"></iframe>					
				</div>
<?php endif; ?>
				<div class="clear"></div>
			</div>
<?php endif; ?>
			
			<ul>
<?php if (! Phpfox ::getService('profile')->timeline()): ?>
<?php if (! isset ( $this->_aVars['aFeed']['feed_mini'] )): ?>
<?php if (! empty ( $this->_aVars['aFeed']['feed_icon'] )): ?>
				<li><img src="<?php echo $this->_aVars['aFeed']['feed_icon']; ?>" alt="" /></li>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['time_stamp'] )): ?>
				<li class="feed_entry_time_stamp">				
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>" class="feed_permalink"><?php echo Phpfox::getLib('date')->convertTime($this->_aVars['aFeed']['time_stamp'], 'feed.feed_display_time_stamp'); ?></a><?php if (! empty ( $this->_aVars['aFeed']['app_link'] )): ?> via <?php echo $this->_aVars['aFeed']['app_link'];  endif; ?>
				</li>
				<li><span>&middot;</span></li>
<?php endif; ?>
				
<?php if ($this->_aVars['aFeed']['privacy'] > 0 && ( $this->_aVars['aFeed']['user_id'] == Phpfox ::getUserId() || Phpfox ::getUserParam('core.can_view_private_items'))): ?>
				<li><div class="js_hover_title"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'layout/privacy_icon.png','alt' => $this->_aVars['aFeed']['privacy'])); ?><span class="js_hover_info"><?php echo Phpfox::getService('privacy')->getPhrase($this->_aVars['aFeed']['privacy']); ?></span></div></li>	
				<li><span>&middot;</span></li>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
					
<?php if (Phpfox ::isUser() && Phpfox ::isModule('like') && isset ( $this->_aVars['aFeed']['like_type_id'] )): ?>
<?php if (isset ( $this->_aVars['aFeed']['like_item_id'] )): ?>
<?php Phpfox::getBlock('like.link', array('like_type_id' => $this->_aVars['aFeed']['like_type_id'],'like_item_id' => $this->_aVars['aFeed']['like_item_id'],'like_is_liked' => $this->_aVars['aFeed']['feed_is_liked'])); ?>
<?php else: ?>
<?php Phpfox::getBlock('like.link', array('like_type_id' => $this->_aVars['aFeed']['like_type_id'],'like_item_id' => $this->_aVars['aFeed']['item_id'],'like_is_liked' => $this->_aVars['aFeed']['feed_is_liked'])); ?>
<?php endif; ?>
<?php if (Phpfox ::isUser() && Phpfox ::isModule('comment') && Phpfox ::getUserParam('feed.can_post_comment_on_feed') && ( isset ( $this->_aVars['aFeed']['comment_type_id'] ) && $this->_aVars['aFeed']['can_post_comment'] ) || ( ! isset ( $this->_aVars['aFeed']['comment_type_id'] ) && isset ( $this->_aVars['aFeed']['total_comment'] ) )): ?>
				<li><span>&middot;</span></li>
<?php endif; ?>
<?php endif; ?>
				
<?php if (Phpfox ::isUser() && Phpfox ::isModule('comment') && Phpfox ::getUserParam('feed.can_post_comment_on_feed') && ( isset ( $this->_aVars['aFeed']['comment_type_id'] ) && $this->_aVars['aFeed']['can_post_comment'] ) || ( ! isset ( $this->_aVars['aFeed']['comment_type_id'] ) && isset ( $this->_aVars['aFeed']['total_comment'] ) )): ?>
				<li>
					<a href="<?php echo $this->_aVars['aFeed']['feed_link']; ?>add-comment/" class="<?php if (( isset ( $this->_aVars['sFeedType'] ) && $this->_aVars['sFeedType'] == 'mini' ) || ( ! isset ( $this->_aVars['aFeed']['comment_type_id'] ) && isset ( $this->_aVars['aFeed']['total_comment'] ) )):  else: ?>js_feed_entry_add_comment no_ajax_link<?php endif; ?>"><?php echo Phpfox::getPhrase('feed.comment'); ?></a>
				</li>				
<?php if (( Phpfox ::isModule('share') && ! isset ( $this->_aVars['aFeed']['no_share'] ) )): ?>
					<li><span>&middot;</span></li>
<?php endif; ?>
<?php endif; ?>
<?php if (Phpfox ::isModule('share') && ! isset ( $this->_aVars['aFeed']['no_share'] )): ?>
<?php if ($this->_aVars['aFeed']['privacy'] == '0'): ?>
<?php Phpfox::getBlock('share.link', array('type' => 'feed','display' => 'menu','url' => $this->_aVars['aFeed']['feed_link'],'title' => $this->_aVars['aFeed']['feed_title'],'sharefeedid' => $this->_aVars['aFeed']['item_id'],'sharemodule' => $this->_aVars['aFeed']['type_id'])); ?>
<?php else: ?>
<?php Phpfox::getBlock('share.link', array('type' => 'feed','display' => 'menu','url' => $this->_aVars['aFeed']['feed_link'],'title' => $this->_aVars['aFeed']['feed_title'])); ?>
<?php endif; ?>
<?php endif; ?>
<?php if (isset ( $this->_aVars['aFeed']['report_module'] ) && isset ( $this->_aVars['aFeed']['force_report'] )): ?>
					<li><span>&middot;</span></li>	
					<li><a href="#?call=report.add&amp;height=100&amp;width=400&amp;type=<?php echo $this->_aVars['aFeed']['report_module']; ?>&amp;id=<?php echo $this->_aVars['aFeed']['item_id']; ?>" class="inlinePopup activity_feed_report" title="<?php echo $this->_aVars['aFeed']['report_phrase']; ?>"><?php echo Phpfox::getPhrase('feed.report'); ?></a></li>				
<?php endif; ?>
<?php (($sPlugin = Phpfox_Plugin::get('feed.template_block_entry_2')) ? eval($sPlugin) : false); ?>
<?php if (Phpfox ::isMobile() && ( ( defined ( 'PHPFOX_FEED_CAN_DELETE' ) ) || ( Phpfox ::getUserParam('feed.can_delete_own_feed') && $this->_aVars['aFeed']['user_id'] == Phpfox ::getUserId()) || Phpfox ::getUserParam('feed.can_delete_other_feeds'))): ?>
				<li><span>&middot;</span></li>
				<li><a href="#" onclick="if (confirm(getPhrase('core.are_you_sure'))){$.ajaxCall('feed.delete', 'id=<?php echo $this->_aVars['aFeed']['feed_id'];  if (isset ( $this->_aVars['aFeedCallback']['module'] )): ?>&amp;module=<?php echo $this->_aVars['aFeedCallback']['module']; ?>&amp;item=<?php echo $this->_aVars['aFeedCallback']['item_id'];  endif; ?>', 'GET');} return false;"><?php echo Phpfox::getPhrase('feed.delete'); ?></a></li>
<?php endif; ?>
			</ul>
			<div class="clear"></div>		
				</div>
				<div class="clear"></div>
			</div>
<?php endif; ?>

<?php if (isset ( $this->_aVars['aParentFeed']['feed_status'] ) && ( ! empty ( $this->_aVars['aParentFeed']['feed_status'] ) || $this->_aVars['aParentFeed']['feed_status'] == '0' )): ?>
			<div class="activity_feed_content_status">
<?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('parse.output')->feedStrip($this->_aVars['aParentFeed']['feed_status']), 200, 'feed.view_more', true), 55); ?>
			</div>
<?php endif; ?>
	
			<div class="activity_feed_content_link"<?php if (isset ( $this->_aVars['aParentFeed']['no_user_show'] )): ?> style="margin-top:0px;"<?php endif; ?>>
				
<?php if ($this->_aVars['aParentFeed']['type_id'] == 'friend' && isset ( $this->_aVars['aParentFeed']['more_feed_rows'] ) && is_array ( $this->_aVars['aParentFeed']['more_feed_rows'] ) && count ( $this->_aVars['aParentFeed']['more_feed_rows'] )): ?>
<?php if (count((array)$this->_aVars['aParentFeed']['more_feed_rows'])):  foreach ((array) $this->_aVars['aParentFeed']['more_feed_rows'] as $this->_aVars['aFriends']): ?>
<?php echo $this->_aVars['aFriends']['feed_image']; ?>
<?php endforeach; endif; ?>
<?php echo $this->_aVars['aParentFeed']['feed_image']; ?>
<?php else: ?>
<?php if (! empty ( $this->_aVars['aParentFeed']['feed_image'] )): ?>
				<div class="activity_feed_content_image"<?php if (isset ( $this->_aVars['aParentFeed']['feed_custom_width'] )): ?> style="width:<?php echo $this->_aVars['aParentFeed']['feed_custom_width']; ?>;"<?php endif; ?>>
<?php if (is_array ( $this->_aVars['aParentFeed']['feed_image'] )): ?>
						<ul class="activity_feed_multiple_image">
<?php if (count((array)$this->_aVars['aParentFeed']['feed_image'])):  foreach ((array) $this->_aVars['aParentFeed']['feed_image'] as $this->_aVars['sFeedImage']): ?>
								<li><?php echo $this->_aVars['sFeedImage']; ?></li>
<?php endforeach; endif; ?>
						</ul>
						<div class="clear"></div>
<?php else: ?>
						<a href="<?php echo $this->_aVars['aParentFeed']['feed_link']; ?>" target="_blank" class="<?php if (isset ( $this->_aVars['aParentFeed']['custom_css'] )): ?> <?php echo $this->_aVars['aParentFeed']['custom_css']; ?> <?php endif;  if (! empty ( $this->_aVars['aParentFeed']['feed_image_onclick'] )):  if (! isset ( $this->_aVars['aParentFeed']['feed_image_onclick_no_image'] )): ?>play_link <?php endif; ?> no_ajax_link<?php endif; ?>"<?php if (! empty ( $this->_aVars['aParentFeed']['feed_image_onclick'] )): ?> onclick="<?php echo $this->_aVars['aParentFeed']['feed_image_onclick']; ?>"<?php endif;  if (! empty ( $this->_aVars['aParentFeed']['custom_rel'] )): ?> rel="<?php echo $this->_aVars['aParentFeed']['custom_rel']; ?>"<?php endif;  if (isset ( $this->_aVars['aParentFeed']['custom_js'] )): ?> <?php echo $this->_aVars['aParentFeed']['custom_js']; ?> <?php endif; ?>><?php if (! empty ( $this->_aVars['aParentFeed']['feed_image_onclick'] )):  if (! isset ( $this->_aVars['aParentFeed']['feed_image_onclick_no_image'] )): ?><span class="play_link_img"><?php echo Phpfox::getPhrase('feed.play'); ?></span><?php endif;  endif;  echo $this->_aVars['aParentFeed']['feed_image']; ?></a>
<?php endif; ?>
				</div>
<?php endif; ?>
				<div class="<?php if (( ! empty ( $this->_aVars['aParentFeed']['feed_content'] ) || ! empty ( $this->_aVars['aParentFeed']['feed_custom_html'] ) ) && empty ( $this->_aVars['aParentFeed']['feed_image'] )): ?> activity_feed_content_no_image<?php endif;  if (! empty ( $this->_aVars['aParentFeed']['feed_image'] )): ?> activity_feed_content_float<?php endif; ?>"<?php if (isset ( $this->_aVars['aParentFeed']['feed_custom_width'] )): ?> style="margin-left:<?php echo $this->_aVars['aParentFeed']['feed_custom_width']; ?>;"<?php endif; ?>>
<?php if (! empty ( $this->_aVars['aParentFeed']['feed_title'] )): ?>
					<a href="<?php echo $this->_aVars['aParentFeed']['feed_link']; ?>" class="activity_feed_content_link_title"<?php if (isset ( $this->_aVars['aParentFeed']['feed_title_extra_link'] )): ?> target="_blank"<?php endif; ?>><?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aParentFeed']['feed_title']), 30); ?></a>
<?php if (! empty ( $this->_aVars['aParentFeed']['feed_title_extra'] )): ?>
					<div class="activity_feed_content_link_title_link">
						<a href="<?php echo $this->_aVars['aParentFeed']['feed_title_extra_link']; ?>" target="_blank"><?php echo Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aParentFeed']['feed_title_extra']); ?></a>
					</div>
<?php endif; ?>
<?php endif; ?>
<?php if (! empty ( $this->_aVars['aParentFeed']['feed_content'] )): ?>
					<div class="activity_feed_content_display">
<?php echo Phpfox::getLib('phpfox.parse.output')->split(Phpfox::getLib('phpfox.parse.output')->shorten(Phpfox::getLib('parse.output')->feedStrip($this->_aVars['aParentFeed']['feed_content']), 200, '...'), 55); ?>
					</div>
<?php endif; ?>
<?php if (! empty ( $this->_aVars['aParentFeed']['feed_custom_html'] )): ?>
					<div class="activity_feed_content_display_custom">
<?php echo $this->_aVars['aParentFeed']['feed_custom_html']; ?>
					</div>
<?php endif; ?>
					
				</div>	
<?php if (! empty ( $this->_aVars['aParentFeed']['feed_image'] )): ?>
				<div class="clear"></div>
<?php endif; ?>
<?php endif; ?>
			</div>			
			
</div>
			
