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
        <fieldset>
            <label for="activate_sets">Количество сетов для активации бизнес-статуса</label>
            <input type="text" name="activate_sets" placeholder="50" value="{$active_sets}" /><br/>
            <label for="bonus_sets">Количество бонусных сетов для начисления предкам</label>
            <input type="text" name="bonus_sets" placeholder="1" value="" /><br/>
            <label for="active_days">Количество дней активности состояния</label>
            <input type="text" name="active_days" placeholder="180" value="" /><br/>
            <label for="bonus_depth">Глубина начисления бонусов</label>
            <input type="text" name="bonus_depth" placeholder="21" value="" /><br/>
        </fieldset>
        <fieldset>
            <label for="id_user_root">ID пользователя корневого уровня дерева</label>
            <label for="pb_cardnumber">Номер карты приватбанка для вывода средств</label>
            <input type="text" name="id_user_root" value="" />
            <input type="text" name="pb_cardnumber" value="" />
        </fieldset>
    </form>
</div>