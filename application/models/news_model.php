<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function getdata($id = NULL, $date = NULL, $start = NULL, $length = NULL, $search = NULL)
    {
    	$this->db->select("a.news_id,a.title,a.image,a.content");
    	$this->db->select("DATE_FORMAT(a.pub_time, '%d %b %Y') AS date", FALSE);
    	$this->db->select("b.category_id, b.name");
    	$this->db->from("news a, category b");
    	$this->db->where("a.category_id = b.category_id");    	
    
    	if ($id) {
    		$this->db->where("a.news_id", $id);
    	}
    
    	if ($date) {
    		$this->db->where("a.pub_time", $date);
    	}
    
    	if ($search) {
    		$like  = '(';
    		$like .= 'a.title' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ' OR ';
    		$like .= 'b.name' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ' OR ';
    		$like .= 'a.pub_time' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ')';
    		$this->db->where($like);
    	}
    
    	if ($start != NULL && $length != NULL) {
    		$this->db->limit($length, $start);
    	}
    
    	$this->db->order_by("news_id desc");
    
    	$query = $this->db->get();
    
    	if ($query && $query->num_rows()) {
    		return $id ? $query->row_object() : $query->result_object();
    	}
    }
    
    public function advcount($id = NULL, $search = NULL)
    {
    	$this->db->select("COUNT(DISTINCT `news_id`) AS `total`");
    	$this->db->from("news");
    
    	if ($search) {
    		$like  = '(';
    		$like .= 'title' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ' OR ';
    		$like .= 'pub_time' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ')';
    		$this->db->where($like);
    	}
    
    	$query = $this->db->get();
    
    	if ($query && $query->num_rows()) {
    		return $query->row_object();
    	}
    }
    
    public function getcatdata($id = NULL, $start = NULL, $length = NULL, $search = NULL)
    {
    	$this->db->select("*");
    	$this->db->from("category");
    
    	if ($id) {
    		$this->db->where("category_id", $id);
    	}
    
    	if ($search) {
    		$like  = '(';
    		$like .= 'name' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ')';
    		$this->db->where($like);
    	}
    
    	if ($start != NULL && $length != NULL) {
    		$this->db->limit($length, $start);
    	}
    
    	$this->db->order_by("category_id desc");
    
    	$query = $this->db->get();
    
    	if ($query && $query->num_rows()) {
    		return $id ? $query->row_object() : $query->result_object();
    	}
    }
    
    public function advcatcount($id = NULL, $search = NULL)
    {
    	$this->db->select("COUNT(DISTINCT `category_id`) AS `total`");
    	$this->db->from("category");
    
    	if ($search) {
    		$like  = '(';
    		$like .= 'name' . ' LIKE ' . "'%" . $search . "%'";
    		$like .= ')';
    		$this->db->where($like);
    	}
    
    	$query = $this->db->get();
    
    	if ($query && $query->num_rows()) {
    		return $query->row_object();
    	}
    }
}
?>
