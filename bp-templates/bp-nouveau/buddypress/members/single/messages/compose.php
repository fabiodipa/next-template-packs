<?php
/**
 * BuddyPress - Members Single Messages Compose
 *
 * @package BuddyPress
 * @subpackage bp-nouveau
 */

?>
<form action="<?php bp_messages_form_action('compose' ); ?>" method="post" id="send_message_form" class="standard-form" enctype="multipart/form-data">

	<?php

	/**
	 * Fires before the display of message compose content.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_before_messages_compose_content' ); ?>

	<label for="send-to-input"><?php _e("Send To (Username or Friend's Name)", 'bp-nouveau' ); ?></label>
	<input type="text" name="send-to-input" class="bp-suggestions send-to-input" id="send-to-input" />

	<?php if ( bp_current_user_can( 'bp_moderate' ) ) : ?>
		<p><label for="send-notice"><input type="checkbox" id="send-notice" name="send-notice" value="1" /> <?php esc_html_e( 'This is a notice to all users.', 'bp-nouveau' ); ?></label></p>
	<?php endif; ?>

	<label for="subject"><?php _e( 'Subject', 'bp-nouveau' ); ?></label>
	<input type="text" name="subject" id="subject" value="<?php bp_messages_subject_value(); ?>" />

	<label for="message_content"><?php _e( 'Message', 'bp-nouveau' ); ?></label>
	<textarea name="content" id="message_content" rows="15" cols="40"><?php bp_messages_content_value(); ?></textarea>

	<input type="hidden" name="send_to_usernames" id="send-to-usernames" value="<?php bp_message_get_recipient_usernames(); ?>" class="<?php bp_message_get_recipient_usernames(); ?>" />

	<?php

	/**
	 * Fires after the display of message compose content.
	 *
	 * @since 1.1.0
	 */
	do_action( 'bp_after_messages_compose_content' ); ?>

	<div class="submit">
		<input type="submit" value="<?php esc_attr_e( "Send Message", 'bp-nouveau' ); ?>" name="send" id="send" />
	</div>

	<?php wp_nonce_field( 'messages_send_message' ); ?>
</form>

<script type="text/javascript">
	document.getElementById("send-to-input").focus();
</script>

