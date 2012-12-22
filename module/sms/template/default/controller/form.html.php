<form method="post" action="{url mylink='sms.form'}">
    <div class="table">
        <div class="table_left">
            Select:
        </div>
        <div class="table_right">
            <select name="val[select_id]" id="select">
                <option value="">Make your choice:</option>
                {foreach from=$aSelects key=iKey item=aSelect}
                    <option value="{$aSelect.select_id}"{if $aArrayForEdit.select_id == $aSelect.select_id} selected{/if}>
                        {$aSelect.select_value}
                    </option>
                {/foreach}
            </select>
        </div>

        <div class="clear"></div>

        <div class="table_left">
            Textarea:
        </div>
        <div class="table_right">
            <textarea name="val[textarea]" id="textarea" rows="8" cols="50">
                {$aArrayForEdit.textarea}
            </textarea>
        </div>

        <div class="clear"></div>
    </div>

    <div class="table_clear">
        {if $isEdit == 1}
            <input type="submit" value="Update" class="button" name="val[update]" />
            <input type="hidden" value="{$aArrayForEdit.mytable_id}" name="val[mytable_id]" />
        {else}
            <input type="submit" value="Add" class="button" name="val[add]" />
        {/if}
    </div>
</form>