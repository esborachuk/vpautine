<?php

$sPathImage = Phpfox::getLib('url')->getDomain().'module/slscrolltotop/static/image/';
$sPathJS = Phpfox::getLib('url')->getDomain().'module/slscrolltotop/static/jscript/';

$data = Phpfox::getService('slscrolltotop.getdata')->getList();

if($data["enable_module"])
{
	$runThisHook = 0;
	$runScriptOfAdmin = 0;
	
	// Note our use of ===.  Simply == would not work as expected
	// because the position of 'a' was the 0th (first) character.
	if(strpos($_SERVER['REQUEST_URI'], "admincp") === false) // not found
    	$runThisHook = 1;
	else
		if(Phpfox::getLib('module')->getModuleName() == "slscrolltotop")
		{
			$runScriptOfAdmin = 1;
			$runThisHook = 1;
		}

	if($runThisHook)
	{
		if($data["style"] < 1 or $data["style"] > 7)
			$data["style"] = 1;
	
		echo '	<div id="ScrollToTop" class="ScrollToTop_Global ScrollToTop_Style_'.$data["style"].'">
					<span>'.$data["text_display"].'</span>
				</div>';
	
		echo Phpfox::getService('slscrolltotop.process')->loadStyle($sPathImage, $data);
        echo Phpfox::getService('slscrolltotop.process')->loadScript($sPathImage, $sPathJS, $data, $runScriptOfAdmin);
	}
}