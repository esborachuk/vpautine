<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

$oTpl->setHeader('cache', array(
		'main.js'                       => 'style_script',
        'sms.js'                        => 'style_script',
        'pautina.js'                    => 'style_script',
        'jquery.validate.min.js'        => 'style_script',
        'email.js'                      => 'style_script',
        'imagebox.js'                   => 'style_script',
        'blogbox.js'                    => 'style_script',
        'bootstrap.min.js'              => 'style_script',
        'tab.js'                        => 'style_script',
        'menu.js'                       => 'style_script',
        'jquery.tinyscrollbar.min.js'   => 'style_script',
        'pautina.css'                       => 'style_css',
        'style.css'                     => 'style_css'
	)
);

$oTpl->setHeader(array(
		"<!--[if IE 7]>\n\t\t\t<script type=\"text/javascript\" src=\"" . $oTpl->getStyle('jscript', 'ie7.js') . "?v=" . Phpfox::getLib('template')->getStaticVersion() . "\"></script>\n\t\t<![endif]-->"
	)
);

?>