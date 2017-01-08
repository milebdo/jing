<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siteplan extends CI_Controller {

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
		
		$this->load->model('tagging');
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
			$data['image'] = $this->tagging->getImage(1);
			$this->load->view('common/header', $data);
			$this->load->view('content/siteplan');
			$this->load->view('common/footer');
		}
	}
	
	function getone()
	{
		$id = $this->input->post('id');
		$point = $this->tagging->getSitePointId($id);
		if($point)
		{
			$data['id'] = $point[0]['siteplan_id'];
			$data['gridx'] = $point[0]['gridx'];
			$data['gridy'] = $point[0]['gridy'];
			$data['type'] = $point[0]['house_type'];
			$data['img'] = $point[0]['house_image'];
			$data['nokav'] = $point[0]['nokavling'];
			$data['lt'] = $point[0]['luas_tanah'];
			$data['lb'] = $point[0]['luas_bangunan'];
			$data['status'] = $point[0]['status'];
			echo json_encode($data);
		}
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
				$data['boxes'] .= '<div class="tagview" style="background-color:'.$color.'; left:' . $points['gridx'] . 'px;top:' . $points['gridy'] . 'px;" id="view_'.$points['siteplan_id'].'" value="'.$points['siteplan_id'].'">';
				$data['boxes'] .= '<span style="text-align: center;color:#fff; font-weight:600; font-size:11px;float:left; padding-top:1px;padding-left:5px;">' . $points['nokavling'];
				$data['boxes'] .= '</span>';
				$data['boxes'] .= '</div>';
			}
			echo json_encode($data);
		}
	}
	
	function save()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'png|jpg|jpeg';
			$config['max_size']	= '200000';
			$config['max_width']  = '30000';
			$config['max_height']  = '30000';
			
			$this->load->library('upload', $config);
			
			$imageid = $this->input->post('picid');
			$ex = $this->input->post('gridx');
			$ye = $this->input->post('gridy');
			$housetype = $this->input->post('housetype');
			$nokav = $this->input->post('nokav');
			$lt = $this->input->post('lt');
			$lb = $this->input->post('lb');
			$status = $this->input->post('status');
			$data = array(
					'image_id' => $imageid,
					'gridx'	=> $ex,//+33
					'gridy' => $ye,//+40
					'house_type' => $housetype,
					'luas_tanah' => $lt,
					'luas_bangunan' => $lb,
					'nokavling' => $nokav,
					'status' => $status
			);
			if($this->upload->do_upload("ico"))
			{
				$tn = $ex.'_'.$ye;
				$ndir = "images/".$tn;
				if(!is_dir($ndir)) //create the folder if it's not already exists
				{
					mkdir($ndir);
					chmod($ndir, 0775);
					copy('images/index.html', $ndir.'/index.html');
				}
				$dataicon = $this->upload->data("ico");
				chmod("images/".$dataicon['file_name'], 0777);
				copy("images/".$dataicon['file_name'], $ndir."/".$dataicon['file_name']);
				unlink("./images/".$dataicon['file_name']);
				$imgico =  $ndir."/".$dataicon['file_name'];
				$data["house_image"] = $imgico;
				if(file_exists($imgico))
				{
					chmod($imgico, 0777);
				}
			}
			
			if( !empty( $_POST['type'] ) && $_POST['type'] == "insert" )
			{	
				$this->tagging->addSiteplanTag($data);
			}
			
			if( !empty( $_POST['type'] ) && $_POST['type'] == "update" )
			{
				$siteid = $this->input->post('sid');
				
				$this->tagging->updateSiteplanTag($data, $siteid);
			}
			
			if( !empty( $_POST['type'] ) && $_POST['type'] == "remove" )
			{
				$id = $this->input->post('tagid');
				$this->tagging->deleteTag($id);
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */