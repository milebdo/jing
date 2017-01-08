<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		$data['current'] = 5;
		$this->load->view('common/header', $data);
		$this->load->view('contact');
		$this->load->view('common/middle-footer');
		$this->load->view('common/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */