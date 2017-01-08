<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');
		$this->load->helper('url');	
		$this->load->database();
	
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	
		$this->lang->load('auth');
		$this->load->helper('language');
		
// 		$this->load->model('booking_site');
	}
	
	function index()
	{
	
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
		{
			//redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
// 			 $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		
			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();
			foreach ($this->data['users'] as $k => $user)
			{
			$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
		
			//$this->_render_page('auth/index', $this->data); 
// 			$this->load->view('v_others', $this->data);
			$this->load->view('common/header');
			$this->load->view('content/user', $this->data);
			$this->load->view('common/footer');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */