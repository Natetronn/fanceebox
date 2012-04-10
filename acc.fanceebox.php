<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Fanceebox
 *
 * @package			Fanceebox
 * @version			2.0.0
 * @author			Nathan Doyle <@natetronn>
 * @copyright		Copyright (c) 2011 Cosmos Web Works, LLC
 * @license			MIT  http://opensource.org/licenses/mit-license.php
 * @link				https://github.com/Natetronn/fanceebox
 */
 
/**
 * Fanceebox - Accessory
 */
 
class Fanceebox_acc 
{
	var $name					= 'Fanceebox';
	var $id						= 'fanceebox';
	var $version			= '2.0.0';
	var $description	= 'Adds the Fancybox "lightbox" popup to the control panel for use with your custom fields\' labels';
	var $sections			= array();
	
	/**
	 * Constructor
	 */
	function __construct()
	{
		$this->EE =& get_instance();
	
		$this->EE->load->library('fanceebox_lib'); // add our library
		$theme = $this->EE->fanceebox_lib->theme_url(); // grab our theme_url
		
		$haystack = $this->EE->input->get('C'); // almost like $GET_['C']; but, more rad!
		
		if($haystack == 'content_edit' OR $haystack == 'content_publish')  // Let's limit this to the Publish and Edit pages only
		{
			$this->EE->cp->add_to_head("<link rel='stylesheet' type='text/css' href='{$theme}fancybox/jquery.fancybox-1.3.4.css' />");
			
			$this->EE->cp->add_to_foot("<script type='text/javascript' src='{$theme}javascript/jquery.easing-1.3.pack.js'></script>");
			$this->EE->cp->add_to_foot("<script type='text/javascript' src='{$theme}javascript/jquery.mousewheel-3.0.4.pack.js'></script>");
			$this->EE->cp->add_to_foot("<script type='text/javascript' src='{$theme}javascript/jquery.fancybox-1.3.4.pack.js'></script>");
			$this->EE->cp->add_to_foot("<script type='text/javascript' src='{$theme}javascript/jquery.fanceebox-1.0.5.pack.js'></script>");
		}
	}

	/**
	 * Set Sections
	 *
	 * Set content for the accessory
	 *
	 * @access	public
	 * @return	void
	 */

		// Let's use this to show your {exp:fanceebox: what ever tags} so people can copy and paste them into their template via the accessory.
	function set_sections()
	{
		$this->sections[] ='<script type="text/javascript">$("#accessoryTabs .' . $this->id  . '").parent("li").hide();</script>';
	}
	
}
/* End of file acc.fanceebox.php */
/* Location: /system/expressionengine/third_party/fanceebox/acc.fanceebox.php */