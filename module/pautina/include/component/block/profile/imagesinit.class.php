<?php
defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Profile_Imagesinit extends Phpfox_Component
{
    public function process()
    {
        $pageCount = Phpfox::getLib('pager')->getTotalPages();
        $aUser = $this->getParam('aUser');
        $this->setParam('aUser', $aUser);
        $request =  Phpfox::getLib('request')->getRequests();
        $requestUrl = $request['do'];
        $this->template()->assign(array(
            'pageCount'     => $pageCount,
            'requestUrl'    => $requestUrl
        ));

        if ($aUser) {
            $this->template()->assign(array(
                'userId'        => $aUser['user_id']
            ));
        }

        return 'block';
    }
}
?>