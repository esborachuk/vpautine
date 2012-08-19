Hello World!
<br /><br />
{$sSampleVariable}
<br />
<a href="#" id="sms_id">Click me</a>
<br />
<b>Members:</b>
<br />
<ul>
    {foreach from=$aUsers item=aUser}
        <li>{$aUser.full_name}</li>
    {/foreach}
</ul>
{module name='sms.display'}