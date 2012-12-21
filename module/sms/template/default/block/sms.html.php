<form method="post" action="{url link='sms.index'}"  id="js_form_sms" onsubmit="Sms.send(); return false;">
    {token}
    <?php if($this->getVar('aUser')): ?>
        <input type="hidden" value="{$aUser.user_id}" name="sms[user-id]">
    <?php else: ?>
        <input type="hidden" value="none" name="sms[user-id]">
    <?php endif; ?>
    <div class="table">
        <div id="sms-error"></div>
        <div class="table_left">{phrase var='sms.phone_number'}</div>
        <div class="sms_number_block table_right">
            <select name="sms[county]">
                <option value="38">{phrase var='sms.country_code_ua'}</option>
                <option value="7">{phrase var='sms.country_code_ru'}</option>
            </select>
            <input placeholder="{phrase var='sms.phone_number_example'}" type="text" name="sms[phone]" id="sms-phone" {if isset($phoneNumber)}value="{$phoneNumber}"{/if} />
        </div>
        <div class="clear"></div>
        <div class="sms_block_message">
            <label for="sms[message]" class="table_left">{phrase var='sms.message_text'}</label>
            <div class="table_right">
                <textarea name="sms[message]" id="sms-message" rows="5" cols="50"></textarea>
            </div>
        </div>
        <div id="sms-button">
            <input type="submit" class="button" value="{phrase var='sms.send__message'}" onclick="Sms.send(); return false;" />
        </div>
        <div class="clear"></div>
    </div>
</form>
<div id="sms-success-result">
    <div class="message"></div>
    <a id="sendMoreSms" href="#" onclick="Sms.sendMoreSms(); return false;">{phrase var='sms.send_new_message'}</a>
</div>