<?php
defined('PHPFOX') or exit('NO DICE!');

echo Phpfox::getLib('template')->getVar('sStyle');
$data = Phpfox::getLib('template')->getVar('data');

$sPathPreview = "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$sPathPreview = str_replace("admincp/", "", $sPathPreview);
?>


hello from adminka!!!

{$test}

{pager}