<form method="post" id="sms_registration" action="{url link='registration.pending'}">
    {token}
    <input type="hidden" name="val[userId]" id="val[userId]" value="{$userId}">
    <div class="table">
        <div class="table_left">
            Code
        </div>
        <div class="table_right">
            <input type="text" id="val[smsCode]" name="val[smsCode]" />
        </div>
    </div>
    <div class="table">
        <div class="table_right">
            <input type="submit" id="val[submit]" name="val[submit]" value="submit" />
        </div>
    </div>
</form>