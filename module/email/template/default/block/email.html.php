<form method="post" action="{url link='email.index'}"  id="js_form_email" onsubmit="Email.send(); return false;">
    {token}
    <?php if($this->getVar('aUser')): ?>
        <input type="hidden" value="{$aUser.user_id}" name="email[user-id]">
    <?php else: ?>
        <input type="hidden" value="none" name="email[user-id]">
    <?php endif; ?>
    <div class="table">
        <div id="email-error"></div>
        <div class="table_left">
            Тема:
        </div>
        <div class="table_right">
            <input type="text" name="email[title]" id="email-title" />
        </div>
        <div class="clear"></div>

        <label for="email[message]" class="table_left">
            Письмо:
        </label>
        <div class="table_right">
            <textarea name="email[message]" id="email-message" rows="8" cols="50"></textarea>
        </div>
        <div id="email-button">
            <input type="submit" class="button" value="Отправить Email" onclick="Email.send(); return false;" />
        </div>
        <div class="clear"></div>
    </div>
</form>
<div id="email-success-result">
    <div class="message"></div>
    <a id="sendMoreEmail" href="#" onclick="Email.sendMoreEmail(); return false;">Отправить еще Email</a>
</div>