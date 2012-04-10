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
 * Fanceebox - Module Control Panel File
 */

class Fanceebox_mcp {
	
	public $return_data;
	
	private $_base_url;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->EE =& get_instance();
		
		$this->EE->load->helper('form');
		
		$this->EE->load->model('fanceebox_model');
		
		$this->EE->load->library('table');
		$this->EE->load->library('fanceebox_lib'); // add our libraries
					
		$this->options = $this->EE->fanceebox_lib->options;	// grab all the fancybox options		

		$this->_base_url = BASE.AMP.'C=addons_modules'.AMP.'M=show_module_cp'.AMP.'module=fanceebox';
		// Set our CP navigation
		$this->EE->cp->set_right_nav(array(
			'module_home'		=> $this->_base_url,
			'create_new'  	=> $this->_base_url.AMP.'method=create_new',
			'create_new_cp' => $this->_base_url.AMP.'method=create_new_cp',
		));
	}
	
	// ----------------------------------------------------------------

	/**
	 * Index Function 
	 * This is the addons home page
	 * @return 	void
	 */
	public function index()
	{
		$this->EE->cp->set_variable('cp_page_title',lang('fanceebox_module_name'));
		
		// We need to display any Fanceeboxes here both for frontend and CP. 
		// For frontend should show name, maybe tag for convience, edit and delete links (or a check box style w/ are you sure you want to delete)
		// For CP should show name, edit and delete as above.
		// Don't forget to call model method/s

	}

	/**
	 * This allows us to create a new Fanceebox for frontent use.
	 */		
	
	public function create_new()
	{		
		$this->EE->cp->set_breadcrumb($this->_base_url,$this->EE->lang->line('fanceebox_module_name'));
		$this->EE->cp->set_variable('cp_page_title', lang('create_new'));
		
		$this->_get_data();
		
		$vars = array();
		$vars['options'] = $this->options;
		
		return $this->EE->load->view('create_new', $vars, TRUE);
	
	}
	
	public function create_new_cp()
	{		
		$this->EE->cp->set_breadcrumb($this->_base_url,$this->EE->lang->line('fanceebox_module_name'));
		$this->EE->cp->set_variable('cp_page_title', lang('create_new_cp'));
		
		$this->_get_data();
		
		$vars = array();
		$vars['options'] = $this->options;
		
		return $this->EE->load->view('create_new_cp', $vars, TRUE);
	
	}
	
	private function _get_data()
	{
		$data = array();
		foreach($this->options as $key => $value)
		{
      $data[$key] = $this->EE->input->post(''.$key.'', TRUE);
    }
		
		$data['is_cp'] = $this->EE->input->post('is_cp', TRUE);
		$data['selector'] = $this->EE->input->post('selector', TRUE);
		
		/*
		$data['jquery'] = $this->EE->input->post('jquery', TRUE);
		$data['mousewheel'] = $this->EE->input->post('mousewheel', TRUE);
		$data['easing'] = $this->EE->input->post('easing', TRUE);
		*/
	
		if($this->EE->input->post('allow_create'))
		{
			$this->EE->fanceebox_model->add_new($data);
			
			if($this->EE->input->post('is_cp') == FALSE)
			{
				$this->EE->logger->log_action($this->EE->lang->line('create_new_log'));
				$this->EE->session->set_flashdata('message_success', $this->EE->lang->line('create_new_success'));
				$this->EE->functions->redirect($this->_base_url);
				exit;
			}
			elseif($this->EE->input->post('is_cp') == TRUE)
			{
				$this->EE->logger->log_action($this->EE->lang->line('create_new_cp_log'));
				$this->EE->session->set_flashdata('message_success', $this->EE->lang->line('create_new_cp_success'));
				$this->EE->functions->redirect($this->_base_url);
				exit;
			}
			else
			{
				$this->EE->session->set_flashdata('message_failure', $this->EE->lang->line('create_new_fail'));
				$this->EE->functions->redirect($this->_base_url);	
				exit;	
			}
		}
	}
	
}
/* End of file mcp.fanceebox.php */
/* Location: /system/expressionengine/third_party/fanceebox/mcp.fanceebox.php */