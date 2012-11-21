<?php
defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Profile_Imagesinit extends Phpfox_Component
{
    public function process()
    {
        $pageCount = Phpfox::getLib('pager')->getTotalPages();
        $aUser = $this->getParam('aUser');
        $request =  Phpfox::getLib('request')->getRequests();
        $requestUrl = $request['do'];
        $this->template()->assign(array(
            'pageCount'     => $pageCount,
            'requestUrl'    => $requestUrl,
            'userId'        => $aUser['user_id']
        ));

        return 'block';
    }
}
?>