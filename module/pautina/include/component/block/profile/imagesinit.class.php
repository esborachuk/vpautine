<?php
defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Profile_Imagesinit extends Phpfox_Component
{
    public function process()
    {
        $pageCount = $this->getParam('pageCount');
        $request =  Phpfox::getLib('request')->getRequests();
        $requestUrl = $request['do'];
        $this->template()->assign(array(
            'pageCount' => $pageCount,
            'requestUrl' => $requestUrl
        ));

        return 'block';
    }
}
?>