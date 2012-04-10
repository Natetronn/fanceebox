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
 * Fanceebox - Module Install/Update File
 */

class Fanceebox_upd {
	
	public $version = '2.0.0';
	
	private $EE;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
		$this->EE->load->library('fanceebox_lib'); // add our library
		$this->options = $this->EE->fanceebox_lib->options;	// grab all the fancybox options
	}
	
	// ----------------------------------------------------------------
	
	/**
	 * Installation Method
	 *
	 * @return 	boolean 	TRUE
	 */
	public function install()
	{
		$mod_data = array(
			'module_name'			=> 'Fanceebox',
			'module_version'		=> $this->version,
			'has_cp_backend'		=> "y",
			'has_publish_fields'	=> 'n'
		);
		
		$this->EE->db->insert('modules', $mod_data);
		
		$this->_add_settings_table();
		
		return TRUE;
	}
	
	private function _add_settings_table()
	{
		$this->EE->load->dbforge();
	
		$fields = array(
								'id' => array('type' => 'int', 'constraint'	=> 10,'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE),
								'is_cp'	=> array('type' => 'tinyint', 'constraint'	=> 10,'unsigned' => TRUE,),
								'selector' => array('selector' => 'varchar', 'constraint' => '250'),
								'padding' => array('type' => 'int', 'constraint' => 10, 'unsigned' => TRUE),
								'margin' => array('type' => 'int', 'constraint' => 10, 'unsigned' => TRUE),
								'opacity' => array('type' => 'tinyint', 'constraint' => 10),
								'modal' => array('type' => 'tinyint', 'constraint' => 10),
								'cyclic' => array('type' => 'tinyint', 'constraint' => 10),
								'scrolling' => array('type' => 'varchar', 'constraint' => 4),
								'width' => array('type' => 'int', 'constraint' => 10, 'unsigned' => TRUE),
								'height' => array('type' => 'int', 'constraint' => 10, 'unsigned' => TRUE),
								'autoScale' => array('type' => 'tinyint', 'constraint' => 10),
								'autoDimensions' => array('type' => 'tinyint', 'constraint' => 10),
								'centerOnScroll' => array('type' => 'tinyint', 'constraint' => 10),
								'ajax' => array('type' => 'varchar', 'constraint' => '250'),
								'swf' => array('type' => 'varchar', 'constraint' => '250'),
								'hideOnOverlayClick' => array('type' => 'tinyint', 'constraint' => 10),
								'hideOnContentClick' => array('type' => 'tinyint', 'constraint' => 10),
								'overlayShow' => array('type' => 'tinyint', 'constraint' => 10),
								'overlayOpacity' => array('type' => 'int', 'constraint' => 10, 'unsigned' => TRUE),
								'overlayColor' => array('type' => 'varchar', 'constraint' => '250'),
								'titleShow' => array('type' => 'tinyint', 'constraint' => 10, 'unsigned' => TRUE),
								'titlePosition' => array('type' => 'varchar', 'constraint' => '250'),
								'titleFormat' => array('type' => 'varchar', 'constraint' => '250'),
								'transitionIn' => array('type' => 'varchar', 'constraint' => '250'),
								'transitionOut' => array('type' => 'varchar', 'constraint' => '250'),
								'speedIn' => array('type' => 'int', 'constraint' => 10, 'unsigned' => TRUE),
								'speedOut' => array('type' => 'int', 'constraint' => 10, 'unsigned' => TRUE),
								'changeSpeed' => array('type' => 'int', 'constraint' => 10, 'unsigned' => TRUE),
								'changeFade' => array('type' => 'varchar', 'constraint' => '250'),
								'easingIn' => array('type' => 'varchar', 'constraint' => '250'),
								'easingOut' => array('type' => 'varchar', 'constraint' => '250'),
								'showCloseButton' => array('type' => 'tinyint', 'constraint' => 10),
								'showNavArrows' => array('type' => 'tinyint', 'constraint' => 10),
								'enableEscapeButton' => array('type' => 'tinyint', 'constraint' => 10),
								'onStart' => array('type' => 'varchar', 'constraint' => '250'),
								'onCancel' => array('type' => 'varchar', 'constraint' => '250'),
								'onComplete' => array('type' => 'varchar', 'constraint' => '250'),
								'onCleanup' => array('type' => 'varchar', 'constraint' => '250'),
								'onClosed' => array('type' => 'varchar', 'constraint' => '250'),
								'type' => array('type' => 'varchar', 'constraint' => '250'),
								'href' => array('type' => 'varchar', 'constraint' => '250'),
								'title' => array('type' => 'varchar', 'constraint' => '250'),
								'content' => array('type' => 'varchar', 'constraint' => '250'),
								'orig' => array('type' => 'varchar', 'constraint' => '250'),
								'index' => array('type' => 'int', 'constraint' => 10, 'unsigned' => TRUE),
							);

		$this->EE->dbforge->add_field($fields);
		$this->EE->dbforge->add_key('id', TRUE);
		$this->EE->dbforge->create_table('fanceebox');	
		
	}
	
	// ----------------------------------------------------------------
	
	/**
	 * Uninstall
	 *
	 * @return 	boolean 	TRUE
	 */	
	public function uninstall()
	{		
		$this->EE->load->dbforge();

    $this->EE->db->select('module_id');
    $query = $this->EE->db->get_where('modules', array('module_name' => 'Fanceebox'));

    $this->EE->db->where('module_id', $query->row('module_id'));
    $this->EE->db->delete('module_member_groups');

    $this->EE->db->where('module_name', 'Fanceebox');
    $this->EE->db->delete('modules');

    $this->EE->db->where('class', 'Fanceebox');
    $this->EE->db->delete('actions');

    $this->EE->dbforge->drop_table('fanceebox');
		
		return TRUE;
	}
	
	// ----------------------------------------------------------------
	
	/**
	 * Module Updater
	 *
	 * @return 	boolean 	TRUE
	 */	
	public function update($current = '')
	{
		// If you have updates, drop 'em in here.
		return TRUE;
	}
	
}
/* End of file upd.fanceebox.php */
/* Location: /system/expressionengine/third_party/fanceebox/upd.fanceebox.php */