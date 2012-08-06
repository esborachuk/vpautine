<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = array (
  'ad.show_ads' => true,
  'ad.can_create_ad_campaigns' => false,
  'admincp.can_clear_site_cache' => true,
  'admincp.can_add_new_block' => true,
  'admincp.can_view_product_options' => true,
  'admincp.can_manage_modules' => true,
  'admincp.can_add_new_modules' => true,
  'admincp.has_admin_access' => true,
  'announcement.can_close_announcement' => true,
  'announcement.can_view_announcements' => true,
  'apps.can_add_app' => true,
  'apps.can_view_app' => true,
  'apps.apps_require_moderation' => false,
  'apps.can_moderate_apps' => true,
  'attachment.points_attachment' => 1,
  'attachment.can_attach_on_blog' => true,
  'attachment.attachment_limit' => 'null',
  'attachment.delete_own_attachment' => true,
  'attachment.delete_user_attachment' => true,
  'attachment.can_attach_on_bulletin' => true,
  'attachment.item_max_upload_size' => 0,
  'blog.view_blogs' => true,
  'blog.edit_own_blog' => true,
  'blog.edit_user_blog' => true,
  'blog.delete_own_blog' => true,
  'blog.delete_user_blog' => true,
  'blog.search_blogs' => true,
  'blog.add_new_blog' => true,
  'blog.points_blog' => 1,
  'blog.blog_add_categories' => true,
  'blog.can_password_protect_blogs' => true,
  'blog.can_control_comments_on_blogs' => true,
  'blog.can_use_editor_on_blog' => true,
  'blog.can_post_comment_on_blog' => true,
  'blog.can_view_password_protected_blog' => true,
  'blog.blog_category_limit' => '10',
  'blog.show_drafts_count' => true,
  'blog.can_delete_other_blog_category' => true,
  'blog.can_delete_own_blog_category' => true,
  'blog.can_approve_blogs' => true,
  'blog.can_view_private_blogs' => true,
  'blog.approve_blogs' => false,
  'blog.flood_control_blog' => 0,
  'captcha.captcha_on_blog_add' => false,
  'captcha.captcha_on_comment' => false,
  'comment.wysiwyg_on_comments' => false,
  'comment.edit_own_comment' => true,
  'comment.edit_user_comment' => true,
  'comment.delete_own_comment' => true,
  'comment.delete_user_comment' => true,
  'comment.points_comment' => 1,
  'comment.can_vote_on_comments' => true,
  'comment.can_post_comments' => true,
  'comment.comment_post_flood_control' => 0,
  'comment.can_moderate_comments' => true,
  'comment.can_delete_comments_posted_on_own_profile' => true,
  'comment.can_comment_on_own_profile' => true,
  'comment.approve_all_comments' => false,
  'comment.can_delete_comment_on_own_item' => false,
  'core.can_view_update_info' => true,
  'core.can_view_private_items' => true,
  'core.can_add_new_setting' => true,
  'core.can_view_site_offline' => true,
  'core.user_is_banned' => false,
  'core.is_spam_free' => true,
  'core.can_view_twitter_updates' => true,
  'core.can_view_news_updates' => true,
  'core.can_design_dnd' => true,
  'custom.can_edit_own_custom_field' => true,
  'custom.can_edit_other_custom_fields' => true,
  'custom.can_manage_custom_fields' => true,
  'custom.can_add_custom_fields' => true,
  'custom.can_add_custom_fields_group' => true,
  'custom.has_special_custom_fields' => false,
  'custom.custom_table_name' => '',
  'custom.can_have_relationship' => true,
  'event.can_edit_own_event' => true,
  'event.can_edit_other_event' => true,
  'event.can_post_comment_on_event' => true,
  'event.can_delete_own_event' => true,
  'event.can_delete_other_event' => true,
  'event.max_upload_size_event' => 500,
  'event.can_view_pirvate_events' => true,
  'event.can_approve_events' => true,
  'event.can_feature_events' => true,
  'event.event_must_be_approved' => false,
  'event.total_mass_emails_per_hour' => 0,
  'event.can_mass_mail_own_members' => true,
  'event.can_access_event' => true,
  'event.can_create_event' => true,
  'event.can_sponsor_event' => false,
  'event.can_purchase_sponsor' => false,
  'event.event_sponsor_price' => 'null',
  'event.auto_publish_sponsored_item' => true,
  'event.flood_control_events' => 0,
  'event.can_view_gmap' => true,
  'event.can_add_gmap' => true,
  'event.points_event' => 1,
  'feed.can_post_comment_on_feed' => true,
  'feed.can_remove_feeds_from_dashboard' => true,
  'feed.can_remove_feeds_from_profile' => true,
  'feed.can_delete_own_feed' => true,
  'feed.can_delete_other_feeds' => true,
  'forum.can_stick_thread' => true,
  'forum.can_close_a_thread' => true,
  'forum.can_post_announcement' => true,
  'forum.can_delete_own_post' => true,
  'forum.can_delete_other_posts' => true,
  'forum.can_add_new_forum' => true,
  'forum.can_edit_forum' => true,
  'forum.can_manage_forum_moderators' => true,
  'forum.can_delete_forum' => true,
  'forum.can_edit_own_post' => true,
  'forum.can_edit_other_posts' => true,
  'forum.can_move_forum_thread' => true,
  'forum.can_copy_forum_thread' => true,
  'forum.can_merge_forum_threads' => true,
  'forum.can_multi_quote_forum' => true,
  'forum.can_reply_to_own_thread' => true,
  'forum.can_reply_on_other_threads' => true,
  'forum.can_add_new_thread' => true,
  'forum.can_add_forum_attachments' => true,
  'forum.can_add_tags_on_threads' => true,
  'forum.enable_captcha_on_posting' => false,
  'forum.forum_thread_flood_control' => 0,
  'forum.forum_post_flood_control' => 0,
  'forum.points_forum' => 1,
  'forum.can_view_forum' => true,
  'forum.can_sponsor_thread' => false,
  'forum.can_purchase_sponsor' => false,
  'forum.forum_thread_sponsor_price' => 'null',
  'forum.auto_publish_sponsored_thread' => true,
  'forum.approve_forum_thread' => false,
  'forum.can_approve_forum_thread' => true,
  'forum.approve_forum_post' => false,
  'forum.can_approve_forum_post' => true,
  'forum.can_thank_on_forum_posts' => true,
  'forum.can_delete_thanks_by_other_users' => true,
  'forum.can_manage_forum_permissions' => true,
  'forum.can_add_poll_to_forum_thread' => true,
  'friend.can_add_friends' => true,
  'friend.can_add_folders' => true,
  'friend.total_folders' => 10,
  'friend.can_remove_friends_from_profile' => true,
  'friend.can_remove_friends_from_dashboard' => true,
  'help.show_tips' => true,
  'invite.points_invite' => 1,
  'language.can_manage_lang_packs' => true,
  'mail.total_folders' => 10,
  'mail.can_compose_message' => true,
  'mail.can_add_folders' => true,
  'mail.show_core_mail_folders_item_count' => true,
  'mail.can_add_attachment_on_mail' => true,
  'mail.mail_box_limit' => 0,
  'mail.override_mail_box_limit' => true,
  'mail.restrict_message_to_friends' => false,
  'mail.can_message_self' => true,
  'mail.override_restrict_message_to_friends' => true,
  'mail.mail_box_warning' => 0,
  'mail.allow_delete_every_message' => true,
  'mail.can_read_private_messages' => true,
  'mail.can_delete_others_messages' => true,
  'mail.enable_captcha_on_mail' => false,
  'mail.send_message_to_max_users_each_time' => 0,
  'marketplace.can_post_comment_on_listing' => true,
  'marketplace.can_edit_own_listing' => true,
  'marketplace.can_edit_other_listing' => true,
  'marketplace.can_delete_own_listing' => true,
  'marketplace.can_delete_other_listings' => true,
  'marketplace.max_upload_size_listing' => 500,
  'marketplace.can_feature_listings' => true,
  'marketplace.listing_approve' => false,
  'marketplace.can_approve_listings' => true,
  'marketplace.can_access_marketplace' => true,
  'marketplace.can_create_listing' => true,
  'marketplace.can_sponsor_marketplace' => false,
  'marketplace.can_purchase_sponsor' => false,
  'marketplace.marketplace_sponsor_price' => 'null',
  'marketplace.auto_publish_sponsored_item' => true,
  'marketplace.can_sell_items_on_marketplace' => false,
  'marketplace.flood_control_marketplace' => 0,
  'marketplace.points_marketplace' => 1,
  'marketplace.total_photo_upload_limit' => 6,
  'music.can_upload_music_public' => true,
  'music.can_add_comment_on_music_album' => true,
  'music.can_add_comment_on_music_song' => true,
  'music.can_edit_other_music_albums' => true,
  'music.can_edit_own_albums' => true,
  'music.can_delete_own_track' => true,
  'music.can_delete_other_tracks' => true,
  'music.can_delete_own_music_album' => true,
  'music.can_delete_other_music_albums' => true,
  'music.music_max_file_size' => 10,
  'music.can_feature_songs' => true,
  'music.can_approve_songs' => true,
  'music.music_song_approval' => false,
  'music.can_feature_music_albums' => true,
  'music.total_song_on_profile' => 10,
  'music.can_access_music' => true,
  'music.can_sponsor_song' => false,
  'music.can_sponsor_album' => false,
  'music.can_purchase_sponsor_album' => false,
  'music.can_purchase_sponsor_song' => false,
  'music.music_album_sponsor_price' => 'null',
  'music.music_song_sponsor_price' => 'null',
  'music.auto_publish_sponsored_album' => true,
  'music.auto_publish_sponsored_song' => true,
  'music.can_edit_own_song' => true,
  'music.can_edit_other_song' => true,
  'music.points_music_song' => 1,
  'newsletter.show_privacy' => true,
  'newsletter.can_create_newsletter' => true,
  'page.can_manage_custom_pages' => true,
  'pages.max_upload_size_pages' => 500,
  'pages.can_moderate_pages' => true,
  'pages.approve_pages' => false,
  'pages.points_pages' => 1,
  'pages.can_add_new_pages' => true,
  'pages.can_view_browse_pages' => true,
  'pages.can_design_pages' => true,
  'photo.can_create_photo_album' => true,
  'photo.max_number_of_albums' => 'null',
  'photo.points_photo' => 1,
  'photo.can_upload_photos' => true,
  'photo.can_password_protect_albums' => true,
  'photo.can_use_privacy_settings' => true,
  'photo.max_images_per_upload' => 10,
  'photo.can_add_to_rating_module' => true,
  'photo.can_add_tags_on_photos' => true,
  'photo.can_control_comments_on_photos' => true,
  'photo.can_add_mature_images' => true,
  'photo.can_search_for_photos' => true,
  'photo.total_photos_displays' => 
  array (
    0 => '18',
    1 => '21',
    2 => '24',
    3 => '60',
    4 => '100',
  ),
  'photo.default_photo_display_limit' => 15,
  'photo.max_photo_display_limit' => 100,
  'photo.refresh_featured_photo' => '1 min',
  'photo.can_download_user_photos' => true,
  'photo.can_view_all_photo_sizes' => true,
  'photo.can_edit_own_photo_album' => true,
  'photo.can_edit_other_photo_albums' => true,
  'photo.can_view_hidden_photos' => true,
  'photo.can_delete_own_photo' => true,
  'photo.can_delete_other_photos' => true,
  'photo.can_edit_own_photo' => true,
  'photo.can_edit_other_photo' => true,
  'photo.photo_mature_age_limit' => 18,
  'photo.can_rate_on_photos' => true,
  'photo.can_edit_photo_categories' => true,
  'photo.can_add_public_categories' => true,
  'photo.photo_must_be_approved' => false,
  'photo.can_approve_photos' => true,
  'photo.can_feature_photo' => true,
  'photo.can_delete_own_photo_album' => true,
  'photo.can_delete_other_photo_albums' => true,
  'photo.can_tag_own_photo' => true,
  'photo.can_tag_other_photos' => true,
  'photo.how_many_tags_on_own_photo' => 40,
  'photo.how_many_tags_on_other_photo' => 4,
  'photo.photo_max_upload_size' => 500,
  'photo.can_view_photos' => true,
  'photo.can_view_private_photos' => true,
  'photo.can_post_on_photos' => true,
  'photo.can_sponsor_photo' => false,
  'photo.can_purchase_sponsor' => false,
  'photo.photo_sponsor_price' => 'null',
  'photo.auto_publish_sponsored_item' => true,
  'photo.can_view_photo_albums' => true,
  'photo.flood_control_photos' => 0,
  'photo.total_photo_display_profile' => 9,
  'poke.can_poke' => true,
  'poke.can_only_poke_friends' => false,
  'poll.poll_can_upload_image' => true,
  'poll.view_poll_results_before_vote' => true,
  'poll.poll_can_change_own_vote' => true,
  'poll.poll_flood_control' => 0,
  'poll.poll_requires_admin_moderation' => false,
  'poll.poll_can_moderate_polls' => true,
  'poll.poll_require_captcha_challenge' => false,
  'poll.poll_can_edit_own_polls' => true,
  'poll.poll_can_edit_others_polls' => true,
  'poll.poll_can_delete_own_polls' => true,
  'poll.poll_can_delete_others_polls' => true,
  'poll.can_post_comment_on_poll' => true,
  'poll.view_poll_results_after_vote' => true,
  'poll.maximum_answers_count' => 20,
  'poll.can_vote_in_own_poll' => true,
  'poll.points_poll' => 5,
  'poll.can_view_user_poll_results_own_poll' => true,
  'poll.can_view_user_poll_results_other_poll' => true,
  'poll.can_edit_title' => true,
  'poll.can_edit_question' => true,
  'poll.highlight_answer_voted_by_viewer' => true,
  'poll.can_access_polls' => true,
  'poll.can_create_poll' => true,
  'poll.can_view_hidden_poll_votes' => true,
  'privacy.can_set_allow_list_on_blogs' => true,
  'privacy.can_view_all_items' => true,
  'privacy.can_comment_on_all_items' => true,
  'profile.can_post_comment_on_profile' => true,
  'profile.can_custom_design_own_profile' => true,
  'profile.display_membership_info' => true,
  'profile.can_view_users_profile' => true,
  'profile.can_change_cover_photo' => true,
  'quiz.max_questions' => 9999,
  'quiz.min_questions' => 1,
  'quiz.max_answers' => 25,
  'quiz.min_answers' => 2,
  'quiz.can_answer_own_quiz' => true,
  'quiz.can_approve_quizzes' => true,
  'quiz.can_delete_others_quizzes' => true,
  'quiz.new_quizzes_need_moderation' => false,
  'quiz.can_delete_own_quiz' => true,
  'quiz.can_post_comment_on_quiz' => true,
  'quiz.can_edit_own_questions' => true,
  'quiz.can_edit_others_questions' => true,
  'quiz.can_edit_own_title' => true,
  'quiz.can_edit_others_title' => true,
  'quiz.points_quiz' => 10,
  'quiz.can_view_results_before_answering' => true,
  'quiz.can_upload_picture' => true,
  'quiz.is_picture_upload_required' => false,
  'quiz.can_access_quiz' => true,
  'quiz.can_create_quiz' => true,
  'quiz.flood_control_quiz' => 0,
  'report.can_report_comments' => true,
  'search.can_use_global_search' => true,
  'share.can_send_emails' => true,
  'share.total_emails_per_round' => 0,
  'share.emails_per_hour' => 0,
  'shoutbox.can_view_shoutbox' => true,
  'shoutbox.can_add_shoutout' => true,
  'shoutbox.can_delete_all_shoutbox_messages' => true,
  'tag.edit_own_tags' => true,
  'tag.edit_user_tags' => true,
  'tag.can_add_tags_on_blogs' => true,
  'theme.can_view_theme_sample' => true,
  'user.can_add_user_group_setting' => true,
  'user.can_control_profile_privacy' => true,
  'user.can_control_notification_privacy' => true,
  'user.can_override_user_privacy' => true,
  'user.require_profile_image' => false,
  'user.can_edit_gender_setting' => true,
  'user.custom_name_field' => '',
  'user.can_edit_dob' => true,
  'user.can_edit_users' => true,
  'user.can_stay_logged_in' => true,
  'user.can_change_other_user_picture' => true,
  'user.can_edit_other_user_privacy' => true,
  'user.can_change_own_user_name' => true,
  'user.total_times_can_change_user_name' => 3,
  'user.can_block_other_members' => true,
  'user.can_be_blocked_by_others' => false,
  'user.can_feature' => true,
  'user.can_change_email' => true,
  'user.can_verify_others_emails' => true,
  'user.can_delete_own_account' => false,
  'user.can_change_own_full_name' => true,
  'user.total_times_can_change_own_full_name' => 0,
  'user.can_delete_others_account' => true,
  'user.can_be_invisible' => true,
  'user.total_upload_space' => 0,
  'user.force_cropping_tool_for_photos' => false,
  'user.max_upload_size_profile_photo' => 500,
  'user.can_search_user_gender' => true,
  'user.can_search_user_age' => true,
  'user.can_browse_users_in_public' => true,
  'user.can_edit_user_group_membership' => true,
  'user.can_view_if_a_user_is_invisible' => true,
  'user.can_edit_currency' => true,
  'user.can_manage_user_group_settings' => true,
  'user.can_edit_user_group' => true,
  'user.can_delete_user_group' => true,
  'user.can_member_snoop' => false,
  'video.can_add_comment_on_video' => true,
  'video.can_edit_own_video' => true,
  'video.can_edit_other_video' => true,
  'video.can_delete_own_video' => true,
  'video.can_delete_other_video' => true,
  'video.video_file_size_limit' => 75,
  'video.can_upload_videos' => true,
  'video.can_feature_videos_' => true,
  'video.can_spotlight_videos' => true,
  'video.approve_video_before_display' => false,
  'video.can_approve_videos' => true,
  'video.max_size_for_video_photos' => 500,
  'video.points_video' => 1,
  'video.can_access_videos' => true,
  'video.can_sponsor_video' => false,
  'video.can_purchase_sponsor' => false,
  'video.video_sponsor_price' => 'null',
  'video.auto_publish_sponsored_item' => true,
  'video.flood_control_videos' => 0,
); ?>