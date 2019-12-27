<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyController extends CI_Controller {
	

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('DataModal', 'm1');
		$this->load->library('session');
		
		$this->load->helper('url');
	}



	public function index()
	{
		$data['StateData'] = $this->m1->fetchAll_data('tbl_state');
		//$data['CityData'] =  $this->m1->fetchAll_data('tbl_city');
		$data['CityData'] =  $this->m1->fetchJoin('tbl_city','tbl_state','tbl_state.nm_sid=tbl_city.nm_sid');
		$this->load->view('ViewData', $data);
	}

	public function InsertState()
	{
		$sname = $this->input->post('txtStateName');
		$data = array(
			'sz_sname' => $sname,
		);
		$res=$this->m1->Insert_data('tbl_state', $data);
		if($res!=null)
		{
    		$this->session->set_flashdata('Successfully','Data Successfully Inserted'); 
		}else{
			$this->session->set_flashdata('Failed','Failed To 
			inserted Data');
		}
		//$this->index();
		
		redirect('MyController','refresh');
		
	}

	public function UpdateState()
	{
		$sid=$this->input->post('txtStateId1');
		$sname=$this->input->post('txtStateName1');
		$data=array(
			'nm_sid' => $sid,
			'sz_sname' => $sname,
		);
		$this->m1->Update_data('tbl_state',$data,$sid,'nm_sid');
		//$this->index();
		redirect('MyController','refresh');
	}

	public function DeleteState()
	{
		$sid=$this->uri->segment('3');
		$this->m1->Delete_data('tbl_state', $sid,'nm_sid');
		//$this->index();
		redirect('MyController','refresh');
	}

	public function DeleteCity()
	{
		$cid=$this->uri->segment('3');
		$this->m1->Delete_data('tbl_city', $cid,'nm_cid');
		//$this->index();
		redirect('MyController','refresh');
	}

	public function InsertCity()
	{
		$cname = $this->input->post('txtCityName');
		$sid= $this->input->post('txtState');
		$data = array(
			'sz_cname' => $cname,
			'nm_sid' => $sid,
		);
		
		$this->m1->Insert_data('tbl_city', $data);
		//$this->index();
		redirect('MyController','refresh');
	}

	public function UpdateCity()
	{
		$cid=$this->input->post('txtCityId1');
		$cname=$this->input->post('txtCityName1');
		$sid=$this->input->post('txtState1');	
		$data=array(
			'sz_cname' => $cname,
			'nm_sid' => $sid,
		);
		
		$this->m1->Update_data('tbl_city',$data,$cid,'nm_cid');
		//$this->index();
		redirect('MyController','refresh');
	}
	
	public function fetch_city()
	{	
		echo $this->m1->fetchByID('tbl_city',$this->input->post('state_id'),'nm_sid');	
	}

	public function checkData()
	{
		$statename= $this->input->post('statename');
		$result = $this->m1->getNumRows('tbl_state',$statename,'sz_sname');
		echo $result;
	}
}
?>
