<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

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
		
		$this->load->model('news_model');
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
			
			$this->load->view('common/header');
			$this->load->view('content/news');
			$this->load->view('common/footer');
		}
	}
	
	function add() {
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
			$data['category'] =  $this->news_model->getcatdata();
			$this->load->view('common/header');
			$this->load->view('content/insert_news', $data);
			$this->load->view('common/footer');
		}
	}
	
	function edit_news($id) {
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
			$data['category'] =  $this->news_model->getcatdata();
			$data['content'] = $this->news_model->getdata($id);
			$this->load->view('common/header');
			$this->load->view('content/edit_news', $data);
			$this->load->view('common/footer');
		}
	}
	
	function addcat() {
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
			$this->load->view('content/pop_newcategory');
		}
	}
	
	function addnewcategory()
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$success = TRUE;
			$message = array();
			$notify = array();
			
			$this->db->trans_begin();
			
			$name = trim($this->input->post('name'));
			
			if ( ! $name) {
				$success = FALSE;
				$message['warning']['name'] = 'Name required';
			}
			
			if ($success) {					
				$data['cat'] = array(
						'name'	=> $name
				);
				$result['cat'] = $this->news_model->set_category($data['cat']);
				if ( ! isset($result['cat']['success']) || ! $result['cat']['success']) {
					$success = FALSE;
					array_push($notify, 'An error has occurred #1' . json_encode($result['cat']));
				}
			}
			
			if ($success) {
				$this->db->trans_commit();
				$message['notify'] = 'Data successfully saved';
			} else {
				$this->db->trans_rollback();
				$messages = 'Data could not be saved';
			
				if ($notify) {
					foreach ($notify as $key => $value) {
						$messages .= '<br /> - <small>' . $value . '</small>';
					}
				}
				$message['notify'] = $messages;
			}
			
			$response = array(
					'success'	=> $success,
					'message'	=> $message,
					'modal'		=> 'hide'
			);
			echo json_encode($response);
		}
	}
	
	function writecontent($flag)
	{
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$success = TRUE;
			$message = array();
			$notify = array();
			$redirect = "";
				
			$this->db->trans_begin();
				
			$config['upload_path'] = './images/news/';
			$config['allowed_types'] = 'png|jpg|jpeg';
			$config['max_size']	= '200000';
			$config['max_width']  = '30000';
			$config['max_height']  = '30000';
			$base = $_SERVER['DOCUMENT_ROOT'];
			
			$this->load->library('upload', $config);
			
			date_default_timezone_set('Asia/Jakarta');
			$getdate = date("Y-m-d");
			
			$title = trim($this->input->post('title'));
			$category = $this->input->post('category');
			$content = $this->input->post('content');
			
			if ( ! $title) {
				$success = FALSE;
				$message['warning']['title'] = 'Title required';
			}
			
			if ( ! $content) {
				$success = FALSE;
				array_push($notify, 'An error has occurred #2 No Content' );
			}
				
			if ($success) {
				$data['content'] = array(
						'category_id'	=> $category,
						'title'	=> $title,
						'pub_time'	=> $getdate,
						'content'	=> $content
				);
				
			if($this->upload->do_upload("image"))
			{
				$rawname = $this->input->post("title");
				$tn = preg_replace('/\s+/', '_', $rawname);
				$ndir = "images/news/".$tn;
				if(!is_dir($ndir)) //create the folder if it's not already exists
				{
					mkdir($ndir);
					chmod($ndir, 0775);
					copy('images/news/index.html', $ndir.'/index.html');
				}
				$dataicon = $this->upload->data("image");
				chmod("images/news/".$dataicon['file_name'], 0777);
				copy("images/news/".$dataicon['file_name'], $ndir."/".$dataicon['file_name']);
				unlink("./images/news/".$dataicon['file_name']);
				$imgico =  $ndir."/".$dataicon['file_name'];
				$data['content']['image'] = $imgico;
				if(file_exists($imgico))
				{
					chmod($imgico, 0777);
				}
			}
				if($flag=='new')
				{
					$result['content'] = $this->news_model->set_news($data['content']);
					if ( ! isset($result['content']['success']) || ! $result['content']['success']) {
						$success = FALSE;
						array_push($notify, 'An error has occurred #1' . json_encode($result['content']));
					}
				}
				if($flag=='edit')
				{
					$id = $this->input->post('idnews');
					$result['content'] = $this->news_model->update_news($id, $data['content']);
					if ( ! isset($result['content']['success']) || ! $result['content']['success']) {
						$success = FALSE;
						array_push($notify, 'An error has occurred #1' . json_encode($result['content']));
					}
				}
			}
				
			if ($success) {
				$this->db->trans_commit();
				$message['notify'] = 'Data successfully saved';
				$redirect = base_url().'news';
			} else {
				$this->db->trans_rollback();
				$messages = 'Data could not be saved';
					
				if ($notify) {
					foreach ($notify as $key => $value) {
						$messages .= '<br /> - <small>' . $value . '</small>';
					}
				}
				$message['notify'] = $messages;
			}
				
			$response = array(
					'success'	=> $success,
					'message'	=> $message,
					'modal'		=> 'hide',
					'redirect'  => $redirect
			);
			echo json_encode($response);
		}
	}
	
	function get_list($id = NULL)
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
			if ($id) {
				$data = new stdClass();
	
				$data->emp = $this->news_model->getdata($id);
			} else {
				$sEcho = $this->input->post('sEcho');
				$iColumns = $this->input->post('iColumns');
				$iDisplayStart = $this->input->post('iDisplayStart');
				$iDisplayLength = $this->input->post('iDisplayLength');
				$sSearch = $this->input->post('sSearch');
	
				$iSortCol_0 = $this->input->post('iSortCol_0');
				$sSortDir_0 = $this->input->post('sSortDir_0');
	
				$data = $this->news_model->getdata(NULL, NULL, $iDisplayStart, $iDisplayLength, mysql_real_escape_string($sSearch));
				$total_data = $this->news_model->advcount(NULL,  mysql_real_escape_string($sSearch));
// 						echo json_encode($data); exit();
				$aaData = array();
	
				if ($data) {
					$i = 1 * ($iDisplayStart + 1);
					foreach ($data as $key => $value) {
						$action = '';
						$action .= '<span class="tooltip-area right">';
						$action .= '	<a href="' . base_url() . 'news/edit_news/' . $value->news_id . '" class="btn btn-default btn-sm" title="Edit Berita"><i class="fa fa-pencil"></i></a>';
						$action .= '	<a data-href="' . base_url() . 'news/delete/' . $value->news_id . '" data-id="' . $value->news_id . '" data-message="Hapus Data Berita : ' . $value->title . '?" class="btn btn-default btn-sm delete-table-row" title="Delete"><i class="fa fa-times"></i></a>';
						$action .= '</span>';
						$aData = array(
								$i++,
								$value->date,
								$value->name,
								$value->title,
								$action
						);
						array_push($aaData, $aData);
					}
					}
	
					$data = array(
					'iTotalRecords'			=> $iDisplayLength,
					'iTotalDisplayRecords'	=> isset($total_data->total) ? $total_data->total : 0,
					'sEcho'					=> $sEcho,
						'aaData'				=> $aaData
				);
			}
	
			echo json_encode($data);
		}
		}
		
		function get_catlist($id = NULL)
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
				if ($id) {
					$data = new stdClass();
		
					$data->emp = $this->news_model->getcatdata($id);
				} else {
					$sEcho = $this->input->post('sEcho');
					$iColumns = $this->input->post('iColumns');
					$iDisplayStart = $this->input->post('iDisplayStart');
					$iDisplayLength = $this->input->post('iDisplayLength');
					$sSearch = $this->input->post('sSearch');
		
					$iSortCol_0 = $this->input->post('iSortCol_0');
					$sSortDir_0 = $this->input->post('sSortDir_0');
		
					$data = $this->news_model->getcatdata(NULL, $iDisplayStart, $iDisplayLength, mysql_real_escape_string($sSearch));
					$total_data = $this->news_model->advcatcount(NULL,  mysql_real_escape_string($sSearch));
// 							echo json_encode($data); exit();
					$aaData = array();
		
					if ($data) {
						$i = 1 * ($iDisplayStart + 1);
						foreach ($data as $key => $value) {
							$action = '';
							$action .= '<span class="tooltip-area right">';
							$action .= '	<a href="' . base_url() . 'news/catedit/' . $value->category_id . '" class="btn btn-default btn-sm btn-modal" title="Edit Kategori" modal-title="Edit Kategori" modal-width="480"><i class="fa fa-pencil"></i></a>';
							$action .= '	<a data-href="' . base_url() . 'news/catdelete/' . $value->category_id . '" data-id="' . $value->category_id . '" data-message="Hapus Kategori : ' . $value->name . '?" class="btn btn-default btn-sm delete-table-row" title="Delete"><i class="fa fa-times"></i></a>';
							$action .= '</span>';
							$aData = array(
									$i++,
									$value->name,
									$action
							);
							array_push($aaData, $aData);
						}
						}
		
						$data = array(
						'iTotalRecords'			=> $iDisplayLength,
						'iTotalDisplayRecords'	=> isset($total_data->total) ? $total_data->total : 0,
						'sEcho'					=> $sEcho,
								'aaData'				=> $aaData
				);
				}
		
				echo json_encode($data);
			}
		}
		
		public function delete($id = NULL)
		{
			if ($this->input->server('REQUEST_METHOD') === 'POST') {
		
				$success = TRUE;
				$message = array();
				$notify = array();
		
				$item_id = $this->input->post('id');
		
				if ($id && $id == $item_id) {
					if ($success) {
						$result['item'] = $this->news_model->delete($item_id);
						if ( ! isset($result['item']['success']) || ! $result['item']['success']) {
							$success = FALSE;
							array_push($notify, 'An error has occurred #1');
						}
					}
		
					if ($success) {
						$message['notify'] = 'Data successfully deleted';
					} else {
						$messages = 'Data could not be deleted';
		
						if ($notify) {
							foreach ($notify as $key => $value) {
								$messages .= '<br /> - <small>' . $value . '</small>';
							}
						}
						$message['notify'] = $messages;
					}
		
					$response = array(
							'success'	=> $success,
							'message'	=> $message
					);
					echo json_encode($response);
				}
			}
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */