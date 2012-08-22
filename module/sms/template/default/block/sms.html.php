<form method="post" action={url link='current'}>
    <div class="table">
        <div class="table_left">
            Phone number:
        </div>
        <div class="table_right">
            <input type="text" name="sms[sms-phone]" id="sms-phone" />
        </div>
        <div class="clear"></div>

        <div class="table_left">
            Message:
        </div>
        <div class="table_right">
            <textarea name="sms[sms-message]" id="sms-message" rows="8" cols="50" ></textarea>
        </div>
        <input type="submit" name="sms[sms-submit]" value="{phrase var='mail.submit'}" class="button"/>
        <div class="clear"></div>
    </div>
</form>