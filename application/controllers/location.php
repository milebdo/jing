<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends CI_Controller {

	public function index($place='bandung')
	{
		$data['place'] = $place;
		$data['current'] = 2;
		$this->load->view('common/header',$data);
		$this->load->view('location');
		$this->load->view('common/middle-footer');
		$this->load->view('common/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */