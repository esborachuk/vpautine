<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php $aContent = 'if (Phpfox::getParam(\'facebook.enable_facebook_connect\'))
{
	// echo \'<div id="fb-root"></div>\';
} if (Phpfox::getParam(\'janrain.enable_janrain_login\'))
{
	echo \'<script type="text/javascript">
		  var rpxJsHost = (("https:" == document.location.protocol) ? "https://" : "http://static.");
		  document.write(unescape("%3Cscript src=\\\'" + rpxJsHost +
		"rpxnow.com/js/lib/rpx.js\\\' type=\\\'text/javascript\\\'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		  RPXNOW.overlay = true;
		  RPXNOW.language_preference = \\\'en\\\';
		</script>\';	
} $sPathImage = Phpfox::getLib(\'url\')->getDomain().\'module/slscrolltotop/static/image/\';
$sPathJS = Phpfox::getLib(\'url\')->getDomain().\'module/slscrolltotop/static/jscript/\';

$data = Phpfox::getService(\'slscrolltotop.getdata\')->getList();

if($data["enable_module"])
{
	$runThisHook = 0;
	$runScriptOfAdmin = 0;
	
	// Note our use of ===.  Simply == would not work as expected
	// because the position of \'a\' was the 0th (first) character.
	if(strpos($_SERVER[\'REQUEST_URI\'], "admincp") === false) // not found
    	$runThisHook = 1;
	else
		if(Phpfox::getLib(\'module\')->getModuleName() == "slscrolltotop")
		{
			$runScriptOfAdmin = 1;
			$runThisHook = 1;
		}

	if($runThisHook)
	{
		if($data["style"] < 1 or $data["style"] > 7)
			$data["style"] = 1;
	
		echo \'	<div id="ScrollToTop" class="ScrollToTop_Global ScrollToTop_Style_\'.$data["style"].\'">
					<span>\'.$data["text_display"].\'</span>
				</div>\';
	
		echo Phpfox::getService(\'slscrolltotop.process\')->loadStyle($sPathImage, $data);
        echo Phpfox::getService(\'slscrolltotop.process\')->loadScript($sPathImage, $sPathJS, $data, $runScriptOfAdmin);
	}
} '; ?>