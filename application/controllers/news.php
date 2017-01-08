<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('news_model');
	}
	public function index()
	{
		$data['current'] = 6;
		$data['content'] = $this->news_model->getdata();
		$this->load->view('common/header', $data);
		$this->load->view('news');
		$this->load->view('common/middle-footer');
		$this->load->view('common/footer');
	}
	
	public function detail($id)
	{
		$data['current'] = 6;
		$data['content'] = $this->news_model->getdata($id);
		$this->load->view('common/header', $data);
		$this->load->view('news-detail');
		$this->load->view('common/middle-footer');
		$this->load->view('common/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */