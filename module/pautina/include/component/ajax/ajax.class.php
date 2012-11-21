<?php

class Pautina_Component_Ajax_Ajax extends Phpfox_Ajax
{
    public function imagebox()
    {
        Phpfox::getComponent('pautina.profile.imageview', array(), 'block');

        $aHeaderFiles = Phpfox::getLib('template')->getHeader(true);

        $aPhrases = Phpfox::getLib('template')->getPhrases();

        $sLoadFiles = '';
        $sEchoData = '';
        foreach ($aHeaderFiles as $sHeaderFile)
        {
            if (preg_match('/<style(.*)>(.*)<\/style>/i', $sHeaderFile))
            {
                continue;
            }

            $sHeaderFile = strip_tags($sHeaderFile);

            $sNew = preg_replace('/\s+/','',$sHeaderFile);
            if (empty($sNew))
            {
                continue;
            }

            if (substr($sNew, 0, 13) == 'oTranslations')
            {
                continue;
            }

            $sLoadFiles .= '\'' . str_replace("'", "\'", $sHeaderFile) . '\',';
        }
        $sLoadFiles = rtrim($sLoadFiles, ',');

        $sContent = $this->getContent(false);

        if (count($aPhrases) && is_array($aPhrases))
        {
            $sPhrases = '<script type="text/javascript">';
            foreach ($aPhrases as $sKey => $sValue)
            {
                $sPhrases .= 'oTranslations[\'' . $sKey . '\'] = \'' . str_replace("'", "\'", $sValue) . '\';';
            }
            $sPhrases .= '</script>';

            echo $sPhrases;
        }

        echo '<script type="text/javascript">$Core.loadStaticFiles([' . $sLoadFiles . ']);</script>';
        echo $sContent;
        echo '<script type="text/javascript">$Core.loadInit();</script>';
    }

    public function getMoreImages()
    {
         define('PHPFOX_IS_USER_PROFILE', true);

        $aUser = Phpfox::getService('user')->getUser(Phpfox::getLib('request')->get('userid'));
        $page = Phpfox::getLib('request')->get('page');
        $paramsString = explode(',', Phpfox::getLib('request')->getRequests());

        $request = array(
            'page' => $page,
            'do'   => '/' . $aUser['user_name'] . '/photo/page_' . $page . '/',
            'req1'  => $aUser['user_name'],
            'req2' => 'photo'
        );
        Phpfox::getLib('request')->set($request);

        $params = array(
            'aUser' => $aUser
        );
        Phpfox::getComponent('photo.index', $params, 'controller');
    }
}

?>