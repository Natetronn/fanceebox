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
 * Fanceebox - Library class
 */

class Fanceebox_lib
{
	/**
	 * Theme URL
	 *
	 * @access public
	 * @return string
	 */
	public function theme_url()
	{
			$theme_folder_url = defined('URL_THIRD_THEMES') ? URL_THIRD_THEMES : $this->EE->config->slash_item('theme_folder_url').'third_party/';
			return $theme_folder_url.'fanceebox/';
	}
	
		/**
	 * Set up our array for all the possible options or "parameters" based on the Fancybox API
	 * @var array
	 */
	

	public $options = array(
				'selector' => 'string',
				// Fancybox options
				'padding' => 'int',
				'margin' => 'int',
				'opacity' => 'bool',
				'modal' => 'bool',
				'cyclic' => 'bool',
				'scrolling' => array('yes', 'no', 'auto'),
				'width' => 'int',
				'height' => 'int',
				'autoScale' => 'bool',
				'autoDimensions' => 'bool',
				'centerOnScroll' => 'bool',
				'ajax' => 'string',
				'swf' => 'string',
				'hideOnOverlayClick' => 'bool',
				'hideOnContentClick' => 'bool',
				'overlayShow' => 'bool',
				'overlayOpacity' => 'int',
				'overlayColor' => 'string',
				'titleShow' => 'bool',
				'titlePosition' => 'string',
				'titleFormat' => 'string',
				'transitionIn' => 'string',
				'transitionOut' => 'string',
				'speedIn' => 'int',
				'speedOut' => 'int',
				'changeSpeed' => 'int',
				'changeFade' => 'string',
				'easingIn' => 'string',
				'easingOut' => 'string',
				'showCloseButton' => 'bool',
				'showNavArrows' => 'bool',
				'enableEscapeButton' => 'bool',
				'onStart' => 'string',
				'onCancel' => 'string',
				'onComplete' => 'string',
				'onCleanup' => 'string',
				'onClosed' => 'string',
				'type' => 'string',
				'href' => 'string',
				'title' => 'string',
				'content' => 'string',
				'orig' => 'string',
				'index' => 'int',
 
		);

}
/* End of file Fanceebox_lib.php */
/* Location: /system/expressionengine/third_party/fanceebox/libraries/Fanceebox_lib.php */