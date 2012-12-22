<?php
class Sms_Component_Controller_Form extends Phpfox_Component
{
    public function process() {
        if ($editId = $this->request()->getInt('edit')) {
            $isEdit = 1;
        } else {
            $isEdit = 0;
        }

        $this->template()->assign('isEdit', $isEdit);

        $aArrayForEdit = array(
            'mytable_id' => '',
            'select_id' => '',
            'textarea' => ''
        );

        if ($isEdit == 1) {
            $aArrayForEdit = Phpfox::getService('form')->getForEdit($editId);
        }

        $this->template()->assign('aArrayForEdit', $aArrayForEdit);
        $this->template()->assign('aSelects', Phpfox::getService('sms')->getSelect());

        if ($aVal = $this->request()->getArray('val')) {
            if (isset($aVal['add']) && !empty($aVal['add'])) {
                if (Phpfox::getService('form')->add($aVal)) {
                    $this->url()->send('form.addedwithsuccess', null, 'Added with success');
                }
            } elseif (isset($aVal['update']) && !empty($aVal['update'])) {
                if (Phpfox::getService('form')->edit($aVal)) {
                    $this->url()->send('form.updatewithsuccess', null, 'Edited with success');
                }
            }
        }
    }
}