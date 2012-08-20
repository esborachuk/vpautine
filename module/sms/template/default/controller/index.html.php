<form method="post" action={url link='sms.index'}>
    <div class="table">
        <div class="table_left">
            Message:
        </div>
        <div class="table_right">
            <textarea name="val[sms-message]" id="sms-message" rows="8" cols="50" ></textarea>
        </div>
        <input type="submit" value="{phrase var='mail.submit'}" class="button" />
        <div class="clear"></div>
    </div>
</form>

<br />
<b>Members:</b>
<br />
<ul>
    {foreach from=$aUsers item=aUser}
        <li>{$aUser.full_name}</li>
    {/foreach}
</ul>
{module name='sms.display'}