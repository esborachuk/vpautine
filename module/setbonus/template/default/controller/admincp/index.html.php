<?php
defined('PHPFOX') or exit('NO DICE!');

echo Phpfox::getLib('template')->getVar('sStyle');
$data = Phpfox::getLib('template')->getVar('data');

$sPathPreview = "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$sPathPreview = str_replace("admincp/", "", $sPathPreview);
?>

<div class="sb-admin-users">
    <h2>Список пользователей и их состояние в программе сетбонус</h2>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Пользователь</td>
                <td>Состояние</td>
                <td>Действия</td>
            </tr>
            <tr>
        <form id="sb-admin-filter" type="POST" action="">
                <td><input type="text" name="filter_id" placeholder="ID" /></td>
                <td><input type="text" name="filter_fullname" placeholder="Пользователь" /></td>
                <td><input type="checkbox" name="filter_state" /></td>
                <td></td>
        </form>
            </tr>
        </thead>
        <tbody>
            {foreach from=$aUsers item=aUser} 
            <tr>
                <td>{$aUser.user_id}</td>
                <td>{$aUser.full_name}</td>
                <td></td>
                <td></td>
            </tr>            
            {/foreach}
        </tbody>
    </table>
</div>

{pager}