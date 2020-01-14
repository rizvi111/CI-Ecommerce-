	<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
/**
	 * 
	 */
class Admin extends CI_Controller{

	public function index(){
		$this->load->view('admin/admin_login');
	}

	public function admin_front_pages(){
		$admin_email=$this->input->post('admin_email');
		$admin_password=md5($this->input->post('admin_password'));
		$result=$this->Admin_model->admin_login_check_info($admin_email,$admin_password);

		$sdata=array();

		if($result){
			$sdata['admin_id']=$result->admin_id;
			$sdata['admin_name']=$result->admin_name;
			$this->session->set_userdata($sdata);
			
			redirect('Super_admin');
		}else{
			$sdata['exception']="User Id Or Password Invalid!";
			$this->session->set_userdata($sdata);
			redirect('Admin');
			
		}
	}
}	
