<?php

class Setbonus_Component_Block_Panel extends Phpfox_Component {

    public function process() {
//        $this->template()->assign(array(
//                'sHeader' => '1111111111111',
//                'aFooter' => array(
//                    'Panel Link' => $this->url()->makeUrl('setbonus.pending')
//                ),
//            )
//        );
//        return 'block';
        $this->template()->setHeader(array(
            'setbonus.css' => 'setbonus'
        ));
        $setsCount = Phpfox::getService('setbonus')->getUserSetsCount(Phpfox::getUserId());
        $this->template()->assign('currentUserSetsCount', $setsCount);
    }

}

?> 