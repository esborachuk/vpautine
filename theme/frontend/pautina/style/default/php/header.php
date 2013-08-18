<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

$oTpl->setHeader('cache', array(
		'main.js'                                               => 'style_script',
        /*'../bootstrap/css/bootstrap.min.css'                    => 'style_css',
        '../bootstrap/css/bootstrap-responsive.min.css'         => 'style_css',*/
        'den.css'                                               => 'style_css',
        'responsive-main.css'                                   => 'style_css',
        'responsive-main.scss'                                  => 'style_css'
	)
);

$oTpl->setHeader(array(
		"<!--[if IE 7]>\n\t\t\t<script type=\"text/javascript\" src=\"" . $oTpl->getStyle('jscript', 'ie7.js') . "?v=" . Phpfox::getLib('template')->getStaticVersion() . "\"></script>\n\t\t<![endif]-->"
	)
);

?>