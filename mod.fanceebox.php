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
 * Fanceebox - Module Front End File
 */
 
class Fanceebox {
	
	public $return_data;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
		$this->EE->load->library('fanceebox_lib'); // add our library
		$this->options = $this->EE->fanceebox_lib->options;	// grab all the fancybox options
		$this->theme_url = $this->EE->fanceebox_lib->theme_url(); // grab our theme_url
	}
	
	/**
	 * CSS template method
	 *
	 * @access public
	 * @return string
	 */
	 
	public function css()
	{	
		return 	"<link rel='stylesheet' type='text/css' href='{$this->theme_url}/fancybox/jquery.fancybox-1.3.4.css' />";
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
			$ease = "<script type='text/javascript' src='{$this->theme_url}/javascript/jquery.easing-1.3.pack.js'></script>";
		}
		else 
		{
			$ease = '';
		}
		
		if (isset($mousewheel) && $mousewheel == 'yes')
		{
			$mouse = "<script type='text/javascript' src='{$this->theme_url}/javascript/jquery.mousewheel-3.0.4.pack.js'></script>";
		}
		else 
		{
			$mouse = '';
		}
		
		// give them the Fancybox js file
		$fancybox = "<script type='text/javascript' src='{$this->theme_url}/javascript/jquery.fancybox-1.3.4.pack.js'></script>";

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
	
	// ----------------------------------------------------------------

	/**
	 * Start on your custom code here...
	 */
	
}
/* End of file mod.fanceebox.php */
/* Location: /system/expressionengine/third_party/fanceebox/mod.fanceebox.php */