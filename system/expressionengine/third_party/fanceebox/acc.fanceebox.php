<?php

/**
 * Fanceebox Accessory
 *
 * @package			Fanceebox
 * @version			1.0.4
 * @author			Nathan Doyle <@natetronn>
 * @copyright		Copyright (c) 2011 Cosmos Web Works, LLC
 * @license			MIT  http://opensource.org/licenses/mit-license.php
 * @link			https://github.com/Natetronn/fanceebox
 */
 
class fanceebox_acc 
{
	var $name			= 'Fanceebox';
	var $id				= 'fanceebox';
	var $version		= '1.0.4';
	var $description	= 'Adds the Fancybox "lightbox" popup to the control panel for use with your custom fields\' labels';
	var $sections	= array();
	
	/**
	 * Constructor
	 */
	function __construct()
	{
		$this->EE =& get_instance();

		$theme_folder_url = $this->EE->config->item('theme_folder_url');

		if (substr($theme_folder_url, -1) != '/')
			$theme_folder_url .= '/';

		$theme_folder_url .= "third_party/fanceebox/";
		
		$this->EE->cp->load_package_js('jquery.easing-1.3.pack');
		$this->EE->cp->load_package_js('jquery.mousewheel-3.0.4.pack');
		$this->EE->cp->load_package_js('jquery.fancybox-1.3.4.pack');
		$this->EE->cp->load_package_js('jquery.fanceebox');
		$this->EE->cp->add_to_head('<link rel="stylesheet" type="text/css" href="'.$theme_folder_url.'fancybox/jquery.fancybox-1.3.4.css" />');
	}

	/**
	 * Set Sections
	 *
	 * Set content for the accessory
	 *
	 * @access	public
	 * @return	void
	 */


	function set_sections()
	{
		$this->sections[] ='<script type="text/javascript">$("#accessoryTabs .' . $this->id  . '").parent("li").hide();</script>';
		
	}
	
}
// END CLASS