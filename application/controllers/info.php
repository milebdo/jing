<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller {

	public function index()
	{
		$data['current'] = 7;
		$this->load->view('common/header', $data);
		$this->load->view('info');
		$this->load->view('common/middle-footer');
		$this->load->view('common/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */