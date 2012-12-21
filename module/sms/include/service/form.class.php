<?php
class Sms_Service_Form extends Phpfox_Service
{
    public function __construct() {

    }

    public function getSelect() {
        return Phpfox::getLib('database')->select("t2.*")
            ->from(Phpfox::getT('table2'), 't2')
            ->order('fc.ordering')
            ->execute('getRows');
    }

    public function getForEdit($id) {
        return Phpfox::getLib('database')->select("t1.*")
            ->from(Phpfox::getT('table1'), 't1')
            ->where('t1.table_id = ' . $id)
            ->order('t1.table_id')
            ->execute('getRow');
    }

    public function edit($aVal) {
        return Phpfox::getLib('database')->insert(
            Phpfox::getT('table1'),
            array(
                'select_id' => $aVal['select_id'],
                'textarea' => $aVal['textarea']
            )
        );
    }
}