<?php

/*
 * 
 * MODEL (сервис типа) для нашего модуля
 */

class Setbonus_Service_Setbonus extends Phpfox_Service {
    /*  С помощью этого метода будем доставать список пользователей для админки
     * 
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

    public function getUsers($iTotal) {

    }

    public function getActiveUsers() {
        
    }

    /* Функция возвращает список запросов 
     */

    public function getRequests() {
        // select * from phpfox_setbonus_requests where state_id <> 1
    }

    public function test() {
        
    }

}
