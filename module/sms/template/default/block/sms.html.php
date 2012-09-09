<form method="post" action={url link='sms.index'}>
    <div class="table">
        <div class="table_left">
            Phone number:
        </div>
        <div class="table_right">
            <input type="text" name="val[sms-phone]" id="sms-phone" />
        </div>
        <div class="clear"></div>

        <div class="table_left">
            Message:
        </div>
        <div class="table_right">
            <textarea name="val[sms-message]" id="sms-message" rows="8" cols="50" ></textarea>
        </div>
        <a href="#" onclick="Sms.send($('#sms-phone').val(), $('#sms-message').html()); return false;">
            {phrase var='mail.submit'}
        </a>
        <div class="clear"></div>
    </div>
</form>