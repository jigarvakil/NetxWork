<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataModal extends CI_Controller {
	

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
	}

	public function fetchAll_data($tblname)
	{
		$query= $this->db->get($tblname);
		$result=$query->result();
		return $result;
	}

	public function Insert_data($tblname,$data)
	{
		$this->db->insert($tblname,$data);
	}

	public function Delete_data($tblname,$id,$idfield)
	{
		$this->db->where($idfield, $id);
		$this->db->delete($tblname);
	}

	public function Update_data($tblname,$data,$sid,$idfield)
	{
		$this->db->set($data);
		$this->db->where($idfield, $sid);
		$this->db->update($tblname);
	}


	function fetchByID($tblname,$id,$idfield)
	{
		$this->db->where($idfield, $id);
		$query = $this->db->get($tblname);
		$output = '<option value="">--Select City--</option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->nm_cid.'">'.$row->sz_cname.'</option>';
		}
		return $output;
		
		
	}
	
}
?>
