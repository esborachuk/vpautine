<?php
/*
 * Шаблон формы настроек сетбонуса
 * 
 */
?>

<div class="sb-admin-settings">
    <h2>
        Настройка параметров модуля SET Bonus
    </h2>
    <form id="sb-admin-settings" method="POST" action="">
        <table>
            <tr>
                <td>Количество сетов для активации бизнес-статуса</td>
                <td><input type="text" name="activate_sets" placeholder="50" value="{$active_sets}" /></td>
            </tr>
            <tr>
                <td>Количество бонусных сетов для начисления предкам</td>
                <td><input type="text" name="bonus_sets" placeholder="1" value="" /></td>
            </tr>
            <tr>
                <td>Количество дней активности состояния</td>
                <td><input type="text" name="active_days" placeholder="180" value="" /></td>
            </tr>
            <tr>
                <td>Глубина начисления бонусов</td>
                <td><input type="text" name="bonus_depth" placeholder="21" value="" /></td>
            </tr>
            <tr>
                <td>ID пользователя корневого уровня дерева</td>
                <td><input type="text" name="id_user_root" value="" /></td>
            </tr>
            <tr>
                <td>Номер карты приватбанка для вывода средств</td>
                <td><input type="text" name="pb_cardnumber" value="" /></td>
            </tr>
        </table>
    </form>
</div>