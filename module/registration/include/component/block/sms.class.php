<?php
class Registration_Component_Block_Sms extends Phpfox_Component
{
    /**
     * Class process method wnich is used to execute this component.
     */
    public function process()
    {
        $userId = $this->request()->get('id');

        $this->template()->assign(array(
            'id' => $userId
        ));
    }

    /**
     * Garbage collector. Is executed after this class has completed
     * its job and the template has also been displayed.
     */
    public function clean()
    {
        (($sPlugin = Phpfox_Plugin::get('user.component_controller_index_clean')) ? eval($sPlugin) : false);
    }
}

?>