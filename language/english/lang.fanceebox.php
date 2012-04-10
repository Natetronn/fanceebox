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
 * Fanceebox - English language file
 */

$lang = array(

	// required by modules page
	'fanceebox_module_name' => 	'Fanceebox',
	'fanceebox_module_description' => 'Adds the Fancybox "lightbox" popup to the control panel for use with your custom fields\' labels or you can add Fancybox directly in your templates, the EECMS tag way!',

	// Additional Key => Value pairs go here
	'module_home' => 'Fanceebox Home',
	'submit' => 'Submit',
	'jquery' => 'Adds jQuery',
	
	// create_new method and view
	'true' => 'True',
	'false' => 'False',
	'create_new' => 'Create New Fanceebox',
	'create_new_log' => 'New Fanceebox Created',
	'create_new_fail' => 'Failed to Create New Fanceebox',
	'create_new_success' => 'New Fanceebox Successfully Created',
	'create_new_options_caption' => 'Fancybox Options',
	'create_new_options_header1' => 'Key',
	'create_new_options_header2' => 'Description',
	'create_new_options_header3' => 'Default Value',
	'create_new_options_header4' => 'Value',
	
	// create_new_cp method and view
	'create_new_cp' => 'Create New Fanceebox for CP',
	'create_new_cp_log' => 'New Fanceebox for CP Created',
	'create_new_cp_success' => 'New Fanceebox for CP Successfully Created',
	
	// Fancybox Options - Descriptions
	'selector_desc' => 'Choose which id or class you would like to have Fancybox fire from',
	'padding_desc' => 'Space between FancyBox wrapper and content',
	'margin_desc' => 'Space between viewport and FancyBox wrapper',
	'opacity_desc' => 'When true, transparency of content is changed for elastic transitions',
	'modal_desc' => 'When true, \'overlayShow\' is set to \'true\' and \'hideOnOverlayClick\', \'hideOnContentClick\', \'enableEscapeButton\', \'showCloseButton\' are set to \'false\'',
	'cyclic_desc' => 'When true, galleries will be cyclic, allowing you to keep pressing next/back.',
	'scrolling_desc' => 'Set the overflow CSS property to create or hide scrollbars. Can be set to \'auto\', \'yes\', or \'no\'',
	'scrolling_desc_yes' => 'yes',
	'scrolling_desc_no' => 'no',
	'scrolling_desc_auto' => 'auto',
	'width_desc' => 'Width for content types \'iframe\' and \'swf\'. Also set for inline content if \'autoDimensions\' is set to \'false\'',
	'height_desc' => 'Height for content types \'iframe\' and \'swf\'. Also set for inline content if \'autoDimensions\' is set to \'false\'',
	'autoScale_desc' => 'If true, FancyBox is scaled to fit in viewport',
	'autoDimensions_desc' => 'For inline and ajax views, resizes the view to the element recieves. Make sure it has dimensions otherwise this will give unexpected results',
	'centerOnScroll_desc' => 'When true, FancyBox is centered while scrolling page',
	'ajax_desc' => 'Ajax options - Note: \'error\' and \'success\' will be overwritten by FancyBox',
	'swf_desc' => 'Params to put on the swf object',
	'hideOnOverlayClick_desc' => 'Toggle if clicking the overlay should close FancyBox',
	'hideOnContentClick_desc' => 'Toggle if clicking the content should close FancyBox',
	'overlayShow_desc'	=> 'Toggle overlay',
	'overlayOpacity_desc' => 'Opacity of the overlay (from 0 to 1; default - 0.3)',
	'overlayColor_desc' => 'Color of the overlay',
	'titleShow_desc' => 'Toggle title',
	'titlePosition_desc' => 'The position of title. Can be set to \'outside\', \'inside\' or \'over\'',
	'titleFormat_desc' => 'Callback to customize title area. You can set any html - custom image counter or even custom navigation',
	'transitionIn_desc' => 'The transition type. Can be set to \'elastic\', \'fade\' or \'none\'',
	'transitionOut_desc' => 'The transition type. Can be set to \'elastic\', \'fade\' or \'none\'',
	'speedIn_desc' => 'Speed of resizing when changing gallery items, in milliseconds',
	'speedOut_desc' => 'Speed of the fade and elastic transitions, in milliseconds',
	'changeSpeed_desc' => 'Speed of resizing when changing gallery items, in milliseconds',
	'changeFade_desc' => 'Speed of the content fading while changing gallery items',
	'easingIn_desc' => 'Easing used for elastic animations',
	'easingOut_desc' => 'Easing used for elastic animations',
	'showCloseButton_desc' => 'Toggle close button',
	'showNavArrows_desc' => 'Toggle navigation arrows',
	'enableEscapeButton_desc' => 'Toggle if pressing Esc button closes FancyBox',
	'onStart_desc' => 'Will be called right before attempting to load the content',
	'onCancel_desc' => 'Will be called after loading is canceled',
	'onComplete_desc' => 'Will be called once the content is displayed',
	'onCleanup_desc' => 'Will be called just before closing',
	'onClosed_desc' => 'Will be called once FancyBox is closed',
	'type_desc' => 'Forces content type. Can be set to \'image\', \'ajax\', \'iframe\', \'swf\' or \'inline\'',
	'href_desc' => 'Forces content source',
	'title_desc' => 'Forces title',
	'content_desc' => 'Forces content (can be any html data)',
	'orig_desc' => 'Sets object whos position and dimensions will be used by \'elastic\' transition',
	'index_desc' => 'Custom start index of manually created gallery (since 1.3.1)',
	
	// Fancybox Options - Defaults
	'selector_default' => 'fancy',
	'padding_default' => '10',
	'margin_default' => '20',
	'opacity_default' => 'false',
	'modal_default' => 'false',
	'cyclic_default' => 'false',
	'scrolling_default' => 'auto',
	'width_default' => '560',
	'height_default' => '340',
	'autoScale_default' => 'true',
	'autoDimensions_default' => 'true',
	'centerOnScroll_default' => 'false',
	'ajax_default' => '{}',
	'swf_default' => '{wmode:\'transparent\'}',
	'hideOnOverlayClick_default' => 'true',
	'hideOnContentClick_default' => 'false',
	'overlayShow_default' => 'true',
	'overlayOpacity_default' => '0.3',
	'overlayColor_default' => '#666',
	'titleShow_default' => 'true',
	'titlePosition_default' => 'outside',
	'titleFormat_default' => 'null',
	'transitionIn_default' => 'fade',
	'transitionOut_default' => 'fade',
	'speedIn_default' => '300',
	'speedOut_default' => '300',
	'changeSpeed_default' => '300',
	'changeFade_default' => '300',
	'easingIn_default' => 'swing',
	'easingOut_default' => 'swing',
	'showCloseButton_default' => 'true',
	'showNavArrows_default' => 'true',
	'enableEscapeButton_default' => 'true',
	'onStart_default' => 'null',
	'onCancel_default' => 'null',
	'onComplete_default' => 'null',
	'onCleanup_default' => 'null',
	'onClosed_default' => 'null',
	'type_default' => 'null',
	'href_default' => 'null',
	'title_default' => 'null',
	'content_default' => 'null',
	'orig_default' => 'null',
	'index_default' => 'null',
);

/* End of file lang.fanceebox.php */
/* Location: /system/expressionengine/third_party/fanceebox/language/english/lang.fanceebox.php */
