<?php

/*
 * 
 * MODEL (сервис типа) для нашего модуля
 */

class Setbonus_Service_Setbonus extends Phpfox_Service {
    /*  С помощью этого метода будем доставать список пользователей для админки
     */
    function getUsersList() {
        $res = Phpfox::getLib('database')->query('SELECT u.user_id,u.full_name,c.sets_count, case when t.user_id is null then 0 else 1 end as st '
                . ' FROM phpfox_user as u join phpfox_setbonus_current  '
                . ' as c on (u.user_id=c.user_id) left join phpfox_setbonus_tree as t '
                . ' on (u.user_id=t.user_id)');

        while ($a = mysql_fetch_assoc($res)) {
            $q[$a['user_id']] = $a;
        }
        return ($q);
    }

//    Возвращает список активных пользователей "в дереве"
    public function getActiveUsers() {
        
    }

    /* Функция возвращает список запросов на подключение к дереву
     */
    public function getRequests() {
        // select * from phpfox_setbonus_requests where state_id <> 1
    }

//    Данная функция возвращает количество бонусов у юзера с определенным id
    public function getUserSetsCount($uid) {
        $res = Phpfox::getLib('database')->query('SELECT `sets_count` FROM `phpfox_setbonus_current` WHERE `user_id`='.$uid);
//        while ($a = mysql_fetch_row($res)) {
//            $q[$a['user_id']] = $a;
//        }
        $a = mysql_fetch_object ($res);
//        var_dump($a);
        return ($a->sets_count);
    }
    
    // эта функция возвращает статус пользователя
    public function getUserStatus($uid){
        $res = Phpfox::getLib('database')->query('SELECT count(*) as is_in_tree from `phpfox_setbonus_tree` where `user_id`='.$uid);
        $a = mysql_fetch_object($res);
        if ($a->is_in_tree != 0) {$is_in_tree=TRUE;} else {$is_in_tree=FALSE;}
        return ($is_in_tree);
    }

}
