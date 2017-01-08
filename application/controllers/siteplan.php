<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siteplan extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	
		$this->load->model('tagging');
	}

	public function index()
	{
		$data['image'] = $this->tagging->getImage(1);
		$data['current'] = 4;
		$this->load->view('common/header', $data);
		$this->load->view('siteplan');
		$this->load->view('common/middle-footer');
		$this->load->view('common/footer');
	}
	
	function getbyid()
	{
		$id = $this->input->post('picid');
		$point = $this->tagging->getSitePointbyId($id);
		if($point)
		{
			$data['boxes'] = '';
			foreach ($point as $points)
			{
				if($points['status']=='0') $color = "#000000";
				elseif($points['status']=='1') $color = "#008000";
				elseif($points['status']=='2') $color = "#FFA500";
				else $color = "#FF0000";
				$xoffset = $points['gridx'] + 25 ;
				$data['boxes'] .= '<div class="tagview" style="background-color:'.$color.'; left:' . $xoffset. 'px;top:' . $points['gridy'] . 'px;" id="view_'.$points['siteplan_id'].'" value="'.$points['siteplan_id'].'">';
				$data['boxes'] .= '<span style="text-align: center;color:#fff; font-weight:600; font-size:11px;float:left; padding-top:2px;padding-left:5px;">' . $points['nokavling'];
				$data['boxes'] .= '</span>';
				$data['boxes'] .= '</div>';
			}
			echo json_encode($data);
		}
	}
	
	function getone()
	{
		$id = $this->input->post('id');
		$point = $this->tagging->getSitePointId($id);
		if($point)
		{
			$data['id'] = $point[0]['siteplan_id'];
			$data['type'] = $point[0]['house_type'];
			$data['img'] = $point[0]['house_image'];
			$data['nokav'] = $point[0]['nokavling'];
			$data['lt'] = $point[0]['luas_tanah'];
			$data['lb'] = $point[0]['luas_bangunan'];
			$data['status'] = $point[0]['status'];
			echo json_encode($data);
		}
	}
	
	function booking()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			date_default_timezone_set('Asia/Jakarta');
			$getdate = date("Y-m-d");
			
			$name = $this->input->post('name');
			$contact = $this->input->post('kontak');
			$email = $this->input->post('email');
			$idsite = $this->input->post('ids');
// 			if (!valid_email($email)) {
// 				echo "{\"status\":\"input data gagal\"}";
// 			}
			$data = array(
					'book_date' => $getdate,
					'name'	=> $name,
					'contact' => $contact,
					'email' => $email,
					'site_id' => $idsite
			);
			
			$val = $this->tagging->newBooking($data);
			if($val > 0)
				echo "{\"status\":\"input data berhasil\", \"id\":\"$val\"}";
				else
					echo "{\"status\":\"input data gagal\"}";
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */