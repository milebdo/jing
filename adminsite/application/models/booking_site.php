<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Booking_site extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
      
    function getAllBooking()
    {
    	$this->db->select("a.booking_id,a.name,a.contact,a.email");
    	$this->db->select("DATE_FORMAT(a.book_date, '%d %b %Y') AS date", FALSE);
    	$this->db->select("b.house_type, b.nokavling");
    	$this->db->from("booking a, siteplan b");
    	$this->db->where("a.site_id = b.siteplan_id");
    	$this->db->order_by("booking_id desc");
    	$query = $this->db->get();
    	if ($query->num_rows() > 0)
    	{
    		return $query->result_array();
    	}
    	else
    		return array();
    }
    
    function count()
    {
    	$this->db->select("COUNT(DISTINCT `booking_id`) AS `total`");
    	$this->db->from("booking");
    	$query = $this->db->get();
    	if ($query->num_rows() > 0)
    	{
    		return $query->row_object();
    	}
    	else
    		return 0;
    }
    
    public function getdata($id = NULL, $date = NULL, $start = NULL, $length = NULL, $search = NULL)
    {
    	$this->db->select("a.booking_id,a.name,a.contact,a.email");
    	$this->db->select("DATE_FORMAT(a.book_date, '%d %b %Y') AS date", FALSE);
    	$this->db->select("b.house_type, b.nokavling");
    	$this->db->from("booking a, siteplan b");
    	$this->db->where("a.site_id = b.siteplan_id");    	
    
    	if ($id) {
    		$this->db->where("a.booking_id", $id);
    	}
    
    	if ($date) {
    		$this->db->where("a.book_date", $date);
    	}
    
    	if ($search) {
    		$like  = '(';
    		$like .= 'a.name' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ' OR ';
    		$like .= 'a.contact' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ' OR ';
    		$like .= 'a.email' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ' OR ';
    		$like .= 'a.book_date' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ' OR ';
    		$like .= 'b.nokavling' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ' OR ';
    		$like .= 'b.house_type' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ')';
    		$this->db->where($like);
    	}
    
    	if ($start != NULL && $length != NULL) {
    		$this->db->limit($length, $start);
    	}
    
    	$this->db->order_by("booking_id desc");
    
    	$query = $this->db->get();
    
    	if ($query && $query->num_rows()) {
    		return $id ? $query->row_object() : $query->result_object();
    	}
    }
    
    public function advcount($id = NULL, $search = NULL)
    {
    	$this->db->select("COUNT(DISTINCT `booking_id`) AS `total`");
    	$this->db->from("booking");
    
    	if ($search) {
    		$like  = '(';
    		$like .= 'name' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ' OR ';
    		$like .= 'contact' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ' OR ';
    		$like .= 'email' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ' OR ';
    		$like .= 'book_date' . ' LIKE ' . "'%" . $search . "%'";
//     		$like .= ' OR ';
//     		$like .= 'b.nokavling' . ' LIKE ' . "'%" . $search . "%'";
//     		$like .= ' OR ';
//     		$like .= 'b.house_type' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ')';
    		$this->db->where($like);
    	}
    
    	$query = $this->db->get();
    
    	if ($query && $query->num_rows()) {
    		return $query->row_object();
    	}
    }
    
    public function delete($id)
    {
    	if ($id) {
    		$this->db->where_in('booking_id', $id);
    		$query = $this->db->delete("booking");
    
    		if($query && $this->db->affected_rows()) {
    			return array('success' => TRUE, 'message' => 'Proses hapus data berhasil.');
    		} else {
    			return array('success' => FALSE, 'message' => 'Proses hapus data gagal.', 'query' => $this->db->last_query(), 'errno' => $this->db->_error_number(), 'error' => $this->db->_error_message());
    		}
    	}
    }
}
?>
