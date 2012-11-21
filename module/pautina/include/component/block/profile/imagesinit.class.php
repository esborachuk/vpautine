<?php
defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Profile_Imagesinit extends Phpfox_Component
{
    public function process()
    {
        $pageCount = $this->getParam('pageCount');
        $params =  Phpfox::getLib('url')->getParams();
        $paramsString = implode(',', $params);
        $this->template()->assign(array(
            'paramsString' => $paramsString,
            'pageCount' => $pageCount
        ));

        return 'block';
    }
}
?>