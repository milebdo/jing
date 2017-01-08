<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tagging extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getImage($id)
    {  	
    	$this->db->select("*");
    	$this->db->from("siteplan_image");
    	$this->db->where("image_id", $id);
    	$query = $this->db->get();
    	if ($query->num_rows() > 0) 
    	{
    		return $query->result_array();
    	}
    	else
    		return array();
    }
    
    function getSitePointbyId($id)
    {
    	$this->db->select("*");
    	$this->db->from("siteplan");
    	$this->db->where("image_id", $id);
    	$query = $this->db->get();
    	if ($query->num_rows() > 0)
    	{
    		return $query->result_array();
    	}
    	else
    		return array();
    }
    
    function getSitePointId($id)
    {
    	$this->db->select("*");
    	$this->db->from("siteplan");
    	$this->db->where("siteplan_id", $id);
    	$query = $this->db->get();
    	if ($query->num_rows() > 0)
    	{
    		return $query->result_array();
    	}
    	else
    		return array();
    }
    
    function getSitePoint()
    {
    	$this->db->select("*");
    	$this->db->from("siteplan");
    	$query = $this->db->get();
    	if ($query->num_rows() > 0)
    	{
    		return $query->result_array();
    	}
    	else
    		return array();
    }

    function addSiteplanTag($datasource){
		$this->db->insert('siteplan', $datasource);
    	return $this->db->insert_id();
    }
    
    function updateSiteplanTag($datasource, $uid){
		$this->db->where("siteplan_id", $uid);
    	return $this->db->update('siteplan', $datasource);
    }

    function deleteTag($id)
    {
    	$this->db->where('siteplan_id', $id);
    	$this->db->delete('siteplan');
    	if($this->db->affected_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
}
?>
