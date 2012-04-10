<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Fanceebox
 *
 * @package			Fanceebox
 * @version			2.0.0
 * @author			Nathan Doyle <@natetronn>
 * @copyright		Copyright (c) 2012 Cosmos Web Works, LLC
 * @license			MIT  http://opensource.org/licenses/mit-license.php
 * @link				https://github.com/Natetronn/fanceebox
 */
 
/**
 * Fanceebox - Plugin
 */

$plugin_info = array(
	'pi_name'					=> 'Fanceebox',
	'pi_version'			=> '2.0.0',
	'pi_author'				=> 'Natetronn',
	'pi_author_url'		=> 'http://natetronn.com',
	'pi_description'	=> 'Fanceebox, the plugin, allows you to bring Fancybox style light-box popups to your templates',
	'pi_usage'				=> Fanceebox::usage()
);


class Fanceebox
{

	/**
	 * The data wrapped in EE template tags
	 * @var string
	 */
	 
	public $return_data = '';
	
	/**
	 * Constructor
	 */
	 
	public function __construct()
	{
		$this->EE =& get_instance();
		$this->EE->load->library('fanceebox_lib'); // add our library
		$this->options = $this->EE->fanceebox_lib->options;	// grab all the fancybox options
		$this->theme_url = $this->EE->fanceebox_lib->theme_url(); // grab our theme_url
		$theme = $this->theme_url;
	}
	
	/**
	 * CSS template method
	 *
	 * @access public
	 * @return string
	 */
	 
	public function css()
	{	
		return 	"<link rel='stylesheet' type='text/css' href='{$theme}/fancybox/jquery.fancybox-1.3.4.css' />";
	}
	
	
	/**
	 * JavaScript template method with optional jQuery, Easing and or Mousewheel effects
	 *
	 * @access public
	 * @return string
	 */
	 
	public function js()
	{
		// grab the optional parameters for the following if statments
		$jquery 		= $this->EE->TMPL->fetch_param('jquery');
		$easing 		= $this->EE->TMPL->fetch_param('easing');
		$mousewheel = $this->EE->TMPL->fetch_param('mousewheel');
	
		if (isset($jquery) && $jquery == 'yes')
		{
			$jQuery = "<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>";
		}
		else 
		{
			$jQuery = '';
		}
		
		if (isset($easing) && $easing == 'yes')
		{
			$ease = "<script type='text/javascript' src='{$theme}/javascript/jquery.easing-1.3.pack.js'></script>";
		}
		else 
		{
			$ease = '';
		}
		
		if (isset($mousewheel) && $mousewheel == 'yes')
		{
			$mouse = "<script type='text/javascript' src='{$theme}/javascript/jquery.mousewheel-3.0.4.pack.js'></script>";
		}
		else 
		{
			$mouse = '';
		}
		
		// give them the Fancybox js file
		$fancybox = "<script type='text/javascript' src='{$theme}/javascript/jquery.fancybox-1.3.4.pack.js'></script>";

		return $jQuery . NL . $fancybox . NL . $ease . NL . $mouse . NL;
	}
	
		
	/**
	 * Grap all our parameters & our selector and return them as jQuery.
	 * 
	 * @access public
	 * @return string
	 */
	 
	public function params()
	{
		$selector = $this->EE->TMPL->fetch_param('selector');
		// we need a selector to point Fancybox at. For example 'a.someClass'
		if ($selector  === FALSE ) 
		{
			return 'selector="someSelector" is missing from &#123;exp:fanceebox:param&#125; and is required';
		}		
		
		$vars = array();
		foreach ($this->options as $key => $value)
		{
			//we need to check if the user submitted the key as a parameter
			$test_key = $this->EE->TMPL->fetch_param($key);
			if($test_key != FALSE)
			{
				$vars[$key] = $test_key;
			}
		}
		
		$api = array();
		foreach ($this->options as $key => $value)
		{
			//certain API options allow for explicit, set, values. 
			if(array_key_exists($key, $vars))
			{
				if(is_array($value))
				{
					if(in_array($vars[$key], $value))
					{
						$api[] 	= "'".$key."':'".$vars[$key]."'";
					}

					continue;
				}

				switch($value)
				{
					case 'int':
					case 'bool':
					
						$api[] = "'".$key."':".$vars[$key];

					break;

					case 'string':

					  $api[] = "'".$key."':'".$vars[$key]."'";

					break;
				}
			}
		}	
		
		// if no parametes exist then give the basic Fancybox setup for the chosen selector
		if(count($api) == '0')
		{
			$js =	'
				<script type="text/javascript">
					$(document).ready(function() {
						$("'.$selector.'").fancybox();
					});
				</script>
			';
		}
		else // else there are custom parameters so let's handle it
		{
			$js = '
				<script type="text/javascript">
					$(document).ready(function() {
						$("'.$selector.'").fancybox({
							
							'.implode(", ", $api).'

						});
					});
				</script>
			';
		}
		
		return $js;

	}
			
	/*
	* Plugin Usage
	*
	* This function describes how the plugin is used.
	*
	* @access	public
	* @return	string
	*/
	public static function usage()
	{
		ob_start();	?>
		
		***** Description *****

			Faneebox Plugin allows you to have your Fanceebox and eat it too!
			
			Gone are the days where Fanceebox only lived in the Control Panel. A new dawn has broken. Fanceebox Plugin brings Fancybox style pop-ups to your templates the way you like it!
			
			Based upon Fancybox 1.3.4 (not verison 2)
			
			http://fancybox.net
			http://fancybox.net/api
		
		***** Usage *****
			
			CSS
			==============================
				Add the CSS tag in between your head tags
			
				{exp:fanceebox:css} 
			
			
			JavaScript
			==============================
				Add this to your head or better yet before your closing body tag where the rest of your JavaScript should live.
				
				{exp:fanceebox:js}
					
					Optional Params
					==========================
					-	jquery="yes" - Do you need jQuery? There's a param for that!
					-	easing="yes"- Do you want some easing effects? Go for it!
					-	mousewheel="yes" - How about some Mouse Wheeling action? Yeah, that's there too!
					
			Paramerters
			==============================
				Add this to the area where you have your scripts.
				
				{exp:fanceebox:params} - 
					
					Requried Param
					==========================
						selector="" - The only required param to make Fanceebox Plugin work. You will need to tell Fancybox where you would it to do it's thing. For example selector="a.myImageClass"
						
					Optional Params
					==========================
						Note: The following parameters are for customizing the "lightbox" and is explained in greater detail on the Fancybox API: http://fancybox.net/api - I may update them here later but, that seems a bit redundant.
						Also Note: Some options from the API are wrapped in single quotes, for example '#666' - you don't need to do this any longer as we wrote the code to make your life a little bit easier. Just keep doing it as you are used to doing things with template tag parameters. So, do overlayColor="#666" not overlayColor="'#666'" Got it? Good!
						
						padding=""
						margin=""
						opacity=""
						modal=""
						cyclic=""
						scrolling=""
						width=""
						height=""
						autoScale=""
						autoDimensions=""
						centerOnScroll=""
						ajax=""
						swf=""
						hideOnOverlayClick=""
						hideOnContentClick=""
						overlayOpacity=""
						overlayColor=""
						titleShow=""
						titlePosition=""
						titleFormat=""
						transitionIn=""
						transitionOut=""
						speedIn=""
						speedOut=""
						changeSpeed=""
						changeFade=""
						easingIn=""
						easingOut=""
						showCloseButton=""
						showNavArrows=""
						enableEscapeButton=""
						onStart=""
						onCancel=""
						onComplete=""
						onCleanup=""
						onClosed=""
						type=""
						href=""
						title=""
						content=""
						orig=""
						index=""

		<?php
			$buffer = ob_get_contents();
			ob_end_clean();
			
			return $buffer;
	}
	// END
	
}


/* End of file pi.fanceebox.php */
/* Location: /system/expressionengine/third_party/fanceebox/pi.fanceebox.php */