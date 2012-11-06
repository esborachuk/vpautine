<?php
defined('PHPFOX') or exit('NO DICE!');

class Slscrolltotop_Service_Process extends Phpfox_Service 
{
	/**
	 * Class constructor
	 */	
	public function __construct()
	{	
		$this->_sTable = Phpfox::getT('socialloft_scrolltotop');
	}
	
	public function add($aVals)
	{
		// $oParseInput = Phpfox::getLib('parse.input');
		
		$aInsert = array(
			
		);
		
		$this->database()->insert($this->_sTable, $aInsert);
		$this->cache()->remove($this->_sTable);
		
		return true;
	}
	
	public function editData($iId, $aVal)
	{
		if (!is_int($iId) or $iId < 1)
			return false;
		
		if((int)$aVal['enable_module'] < 0 or (int)$aVal['enable_module'] > 1)
			$aVal['enable_module'] = 1;
		
		if((int)$aVal['test_module'] < 0 or (int)$aVal['test_module'] > 1)
			$aVal['test_module'] = 1;

		$arrayPosition = array("TL", "TR", "BL", "BR");
		
		if(!in_array($aVal['display_position'], $arrayPosition))
			$aVal['display_position'] == "BR";
			
		if((int)$aVal['speed'] < 1)
			$aVal['speed'] = 1;
			
		if((int)$aVal['how_long'] < 1)
			$aVal['how_long'] = 1;
		
		if((int)$aVal['style'] < 0 or (int)$aVal['style'] > 7)
			$aVal['style'] = 1;

		if(trim($aVal['text_display']) == "")
			$aVal['text_display'] = "Back To Top";

		$aUpdate = array(
			'enable_module' => (int)$aVal['enable_module'],
			'test_module' => (int)$aVal['test_module'],
			'display_position' => $aVal['display_position'],
			'margin' => (int)$aVal['margin_top']."px ".(int)$aVal['margin_right']."px ".(int)$aVal['margin_bottom']."px ".(int)$aVal['margin_left']."px",
			'style' => $aVal['style'],
			'speed' => $aVal['speed'],
			'how_long' => $aVal['how_long'],
			'text_display' => $aVal['text_display'],
			'text_color' => $aVal['text_color'],
			'background_color' => $aVal['background_color'],
			'background_hover_color' => $aVal['background_hover_color'],
			'text_hover_color' => $aVal['text_hover_color']			
		);
		
		$this->database()->update($this->_sTable, $aUpdate, 'id = ' . $iId);
		$this->cache()->remove($this->_sTable);
		
		return true;
	}
	
	function loadStyle($sPathImage, $data)
	{
		switch($data["display_position"])
		{
			case "TL":
				$styleMargin = 'top:'.$data["margin_top"].'px; left:'.$data["margin_left"].'px;';
				break;
			case "TR":
				$styleMargin = 'top:'.$data["margin_top"].'px; right:'.$data["margin_right"].'px;';
				break;			
			case "BL":
				$styleMargin = 'bottom:'.$data["margin_bottom"].'px; left:'.$data["margin_left"].'px;';
				break;
			default:
				$styleMargin = 'bottom:'.$data["margin_bottom"].'px; right:'.$data["margin_right"].'px;';
				break;			
		}
			
		return '<style type="text/css">
				.ScrollToTop_Global { position:fixed; '.$styleMargin.' display:none; cursor:pointer; z-index:1; }
				
				.ScrollToTop_Style_1 {
					background-color:#831608;
					background-image:linear-gradient(#BB413B, #831608);
					border:1px solid #831608;
					border-radius:5px 5px 5px 5px;
					box-shadow:0 1px 0 rgba(255, 255, 255, 0.3), 0 1px 0 rgba(0, 0, 0, 0.7), 0 2px 2px rgba(0, 0, 0, 0.5), 0 1px 0 rgba(255, 255, 255, 0.5) inset;
					padding:3px;
					text-shadow:0 -1px 0 rgba(0, 0, 0, 0.8);
				}		
					.ScrollToTop_Style_1 span {
						float:left;
						background-color:#BB413B;
						background-image:linear-gradient(#D4463C, #AA2618);
						border:1px dashed #EBA1A3;
						cursor:pointer;
						padding:4px 10px;
						font-size:12px;
						font-weight:bold;
						color:'.$data["text_color"].';
					}
					.ScrollToTop_Style_1 span:hover {
						color:'.$data["text_hover_color"].';
					}
					
				.ScrollToTop_Style_2 { background:url("'.$sPathImage.'Style_Real_2.png") no-repeat; width:40px; height:50px; }
					.ScrollToTop_Style_2 span { display:none; }
				
				.ScrollToTop_Style_3 { background:url("'.$sPathImage.'Style_Real_3.png") no-repeat; width:55px; height:30px; }
					.ScrollToTop_Style_3 span { display:none; }
					
				.ScrollToTop_Style_4 { background:url("'.$sPathImage.'Style_Real_4.gif") no-repeat; width:45px; height:31px; border-radius:5px; border:1px solid #ac9a75; }
					.ScrollToTop_Style_4 span { display:none; }
					
				.ScrollToTop_Style_5 { background:url("'.$sPathImage.'Style_Real_5.png") center center no-repeat; background-color:'.$data["background_color"].'; width:40px; height:40px; border-radius:5px; border:1px solid #979797; }
				.ScrollToTop_Style_5:hover { background-color:'.$data["background_hover_color"].'; }
					.ScrollToTop_Style_5 span { display:none; }
				
				.ScrollToTop_Style_6 { background:url("'.$sPathImage.'Style_Real_6.gif") no-repeat; width:47px; height:16px; border-radius:2px; }
					.ScrollToTop_Style_6 span { display:none; }
				
				.ScrollToTop_Style_7 { background:url("'.$sPathImage.'Style_Real_7.png") no-repeat; width:48px; height:48px; border-radius:5px; border:1px solid #92d400; background-color:'.$data["background_color"].'; }
				.ScrollToTop_Style_7:hover { background-color:'.$data["background_hover_color"].'; }
					.ScrollToTop_Style_7 span { display:none; }				
				</style>';
	}

	function loadScript($sPathImage, $sPathJS, $data, $runScriptOfAdmin)
	{
		if($runScriptOfAdmin) // script for Back-End
		{	
			$scriptScrollToTop = '
				jQuery(window).scroll(function()
				{				
					if(jQuery(this).scrollTop() > '.$data["how_long"].' && parseInt(jQuery(".test_radio:checked").val()))
					{					
						jQuery("#ScrollToTop").fadeIn("slow");
					}
					else
					{
						jQuery("#ScrollToTop").fadeOut("slow");
					}
					return false;
				});';
		}
		else // script for Front-End
		{
			$scriptScrollToTop = '
				jQuery(window).scroll(function()
				{				
					if(jQuery(this).scrollTop() > '.$data["how_long"].')
					{					
						jQuery("#ScrollToTop").fadeIn("slow");
					}
					else
					{
						jQuery("#ScrollToTop").fadeOut("slow");
					}
					return false;
				});';
		}
		return '<script type="text/javascript" src="'.$sPathJS.'jquery.backgroundPosition.js"></script>
				<script type="text/javascript" language="javascript">
				
				$Behavior.SocialLoft_ScrollToTop = function() {
					'.$scriptScrollToTop.'
		
					jQuery("#ScrollToTop").click(function (){
						jQuery("body, html").animate({scrollTop:0}, '.$data["speed"].', "linear");
					});
					
					jQuery("#ScrollToTop.ScrollToTop_Style_2").hover(
					function(){
						jQuery(this).animate({backgroundPosition:"0px -50px"}, 400, function(){});
					},
					function(){
						jQuery(this).animate({backgroundPosition:"0px 0px"}, 400, function(){});
					});
					
					jQuery("#ScrollToTop.ScrollToTop_Style_3").hover(
					function(){
						jQuery(this).animate({backgroundPosition:"0px -30px"}, 400, function(){});
					},
					function(){
						jQuery(this).animate({backgroundPosition:"0px 0px"}, 400, function(){});
					});
				};
				</script>';
	}
}
?>