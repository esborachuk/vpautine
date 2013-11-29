<?php

/*
 * 
 * MODEL (сервис типа) для нашего модуля
 */

class Setbonus_Service_Setbonus extends Phpfox_Service {
    

/*  С помощью этого метода будем доставать список пользователей для админки
 * 
 */
    function getUsersList(){
        
    }
    
     public function getUsers($iTotal) 
    { 
        return $this->database()->select('u.full_name, u.user_id') 
            ->from(Phpfox::getT('user'), 'u') 
            ->limit($iTotal) 
            ->execute('getRows'); 
    }
    
    public function getActiveUsers(){}
    
    /* Функция возвращает список запросов 
     */
    public function getRequests(){
        // select * from phpfox_setbonus_requests where state_id <> 1
    }
}
