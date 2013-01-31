<form method="post" action="{url link='email.index'}"  id="js_form_email" class="send_email_form" onsubmit="Email.send(); return false;">
    {token}
    <?php if($this->getVar('aUser')): ?>
        <input type="hidden" value="{$aUser.user_id}" name="email[user-id]">
    <?php else: ?>
        <input type="hidden" value="none" name="email[user-id]">
    <?php endif; ?>
    <div class="table">
        <div id="email-error"></div>
        <div class="block_wrapper">
            <div class="block_left block">
                <div class="table_left">Email</div>
                <div class="table_right">
                    <input type="text" name="email[email]" id="email-email" value="{$sendToEmail}" />
                </div>
            </div>
            <div class="block_right block">
                <div class="table_left">{phrase var='email.message_subject'}</div>
                <div class="table_right">
                    <input type="text" name="email[title]" id="email-title" />
                </div>
            </div>
            <div class="clear"></div>
        </div>

        <label for="email[message]" class="table_left">{phrase var='email.letter'}</label>
        <div class="table_right">
            <textarea name="email[message]" id="email-message" rows="8" cols="50"></textarea>
        </div>
        <div id="email-button">
            <input type="submit" class="button" value="{phrase var='email.send__email'}" onclick="Email.send(); return false;" />
        </div>
        <div class="clear"></div>
    </div>
</form>
<div id="email-success-result">
    <div class="message"></div>
    <a id="sendMoreEmail" href="#" onclick="Email.sendMoreEmail(); return false;">{phrase var='email.send_new_email'}</a>
</div>