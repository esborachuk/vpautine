<form method="post" action="{url link='sms.index'}"  id="js_form_sms" onsubmit="Sms.send(); return false;">
    {token}
    <?php if($this->getVar('aUser')): ?>
        <input type="hidden" value="{$aUser.user_id}" name="sms[user-id]">
    <?php else: ?>
        <input type="hidden" value="none" name="sms[user-id]">
    <?php endif; ?>
    <div class="table">
        <div id="sms-error"></div>
        <div class="table_left">
            Phone number:
        </div>
        <div class="table_right">
            38<input type="text" name="sms[phone]" id="sms-phone" />
        </div>
        <div class="clear"></div>

        <label for="sms[message]" class="table_left">
            Message:
        </label>
        <div class="table_right">
            <textarea name="sms[message]" id="sms-message" rows="8" cols="50"></textarea>
        </div>
        <div id="sms-button">
            <button type="submit" class="button">Отправить Sms</button>
        </div>
        <div class="clear"></div>
    </div>
</form>
<div id="sms-success-result">
    <div class="message"></div>
    <a id="sendMoreSms" href="#" onclick="Sms.sendMoreSms(); return false;">Отправить еще Sms</a>
</div>