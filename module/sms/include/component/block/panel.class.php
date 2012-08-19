<?php
class Sms_Component_Block_Panel extends Phpfox_Component
{
    public function process() {
        $this->template()->assign(array(
            'sHeader' => 'Panel Block',
            'aFooter' => array(
                'Panel Link' => $this->url()->makeUrl('sms.add')
            ),
        ));

        return 'block';
    }
}
