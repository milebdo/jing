<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {

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
		
		$this->load->model('booking_site');
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
// 			$data['allbook'] = $this->booking_site->getAllBooking();
			$this->load->view('common/header');
			$this->load->view('content/booking');
			$this->load->view('common/footer');
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
	
			$data->emp = $this->booking_site->getdata($id);
			} else {
				$sEcho = $this->input->post('sEcho');
				$iColumns = $this->input->post('iColumns');
				$iDisplayStart = $this->input->post('iDisplayStart');
				$iDisplayLength = $this->input->post('iDisplayLength');
				$sSearch = $this->input->post('sSearch');
		
				$iSortCol_0 = $this->input->post('iSortCol_0');
				$sSortDir_0 = $this->input->post('sSortDir_0');
		
				$data = $this->booking_site->getdata(NULL, NULL, $iDisplayStart, $iDisplayLength, mysql_real_escape_string($sSearch));
				$total_data = $this->booking_site->advcount(NULL,  mysql_real_escape_string($sSearch));
// 		echo json_encode($data); exit();
				$aaData = array();
		
				if ($data) {
					$i = 1 * ($iDisplayStart + 1);
					foreach ($data as $key => $value) {
						$action = '';
						$action .= '<span class="tooltip-area right">';
						$action .= '	<a data-href="' . base_url() . 'booking/delete/' . $value->booking_id . '" data-id="' . $value->booking_id . '" data-message="Hapus Data Booking : ' . $value->name . '?" class="btn btn-default btn-sm delete-table-row" title="Delete"><i class="fa fa-times"></i></a>';
						$action .= '</span>';
						$aData = array(
								$i++,
								$value->date,
								$value->house_type,	
								$value->nokavling,
								$value->name,
								$value->contact,
								$value->email,
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
					$result['item'] = $this->booking_site->delete($item_id);
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
	
// 	public function check_counter()
// 	{
// 		$result = $this->booking_site->count();
// 		echo json_encode($result->total);
// 	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */