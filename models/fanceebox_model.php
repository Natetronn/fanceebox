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

class Fanceebox_model extends CI_Model
{

	private $_table = 'fanceebox';
	
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Adds a new fanceebox to the database
	 * 
	 */
	public function add_new($data)
	{	
		return $this->db->insert($this->_table, $data); 
	}	
	
}