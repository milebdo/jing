<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['current'] = 1;
		$this->load->view('common/header', $data);
		$this->load->view('home');
		$this->load->view('common/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */