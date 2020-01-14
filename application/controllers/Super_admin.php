	<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
/**
 * 
 */
class Super_admin extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$admin_id=$this->session->userdata('admin_id');
		if($admin_id == NULL)
		{
			redirect('Admin');
		}
		
	}
	
	public function index(){
		$data=array();
		$data['admin_main_content']=$this->load->view('admin/pages/dashboard_main_content', '', true);
		$this->load->view('admin/admin_home',$data);
	}

// Start Category Section

	public function add_category(){
		$data=array();
		$data['admin_main_content']=$this->load->view('admin/pages/add_category', '', true);
		$this->load->view('admin/admin_home',$data);
	}

	public function save_category(){
		$data=array();
		$data['category_name']=$this->input->post('category_name');
		$data['category_description']=$this->input->post('category_description');
		$data['publication_status']=$this->input->post('publication_status');
		$this->Super_admin_model->save_category_info($data);

		$sdata=array();
		$sdata['message']="Save Category successfully";
		$this->session->set_userdata($sdata);
		redirect('Super_admin/add_category');
	}

	public function manage_category(){
		$data=array();
		$data['all_category']=$this->Super_admin_model->select_all_category();
		$data['admin_main_content']=$this->load->view('admin/pages/manage_category', $data, true);
		$this->load->view('admin/admin_home',$data);
	}

	public function unpublished_category($category_id){
		$this->Super_admin_model->unpublished_category_by_id($category_id);

		redirect('Super_admin/manage_category');
	}

	public function published_category($category_id){
		$this->Super_admin_model->published_category_by_id($category_id);

		redirect('Super_admin/manage_category');
	}

	public function delete_category($category_id){
		$this->Super_admin_model->delete_category_by_id($category_id);

		redirect('Super_admin/manage_category');
	}
	
	public function edit_category($category_id){
		$data=array();
		$data['category_info']=$this->Super_admin_model->select_category_info_by_id($category_id);
		$data['admin_main_content']=$this->load->view('admin/pages/edit_category', $data, true);
		$this->load->view('admin/admin_home',$data);
	}

	public function update_category(){
		$data=array();
		$category_id=$this->input->post('category_id',true);
		$data['category_name']=$this->input->post('category_name',true);
		$data['category_description']=$this->input->post('category_description',true);
		$this->Super_admin_model->update_category_info($data,$category_id);
		redirect('Super_admin/manage_category','refresh');
	}

// End Category Section


// Start Manufacturer Section 

	public function add_manufacturer(){
		$data=array();
		$data['admin_main_content']=$this->load->view('admin/pages/add_manufacturer', '',true);
		$this->load->view('admin/admin_home',$data);
	}

	public function save_manufacturer(){
		$data=array();
		$data['manufacturer_name']=$this->input->post('manufacturer_name');
		$data['manufacturer_description']=$this->input->post('manufacturer_description');
		$data['publication_status']=$this->input->post('publication_status');
		$this->Super_admin_model->save_manufacturer_info($data);

		$sdata=array();
		$sdata['message']="Save Category successfully	";
		$this->session->set_userdata($sdata);
		redirect('Super_admin/add_manufacturer');
	}

	public function manage_manufacturer(){
		$data=array();
		$data['all_manufacturer']=$this->Super_admin_model->select_all_manufacturer();
		$data['admin_main_content']=$this->load->view('admin/pages/manage_manufacturer', $data,true);
		$this->load->view('admin/admin_home',$data);
	}

	public function unpublished_manufacturer($manufacturer_id){
		$this->Super_admin_model->unpublished_manufacturer_by_id($manufacturer_id);

		redirect('Super_admin/manage_manufacturer');
	}

	public function published_manufacturer($manufacturer_id){
		$this->Super_admin_model->published_manufacturer_by_id($manufacturer_id);

		redirect('Super_admin/manage_manufacturer');
	}

	public function delete_manufacturer($manufacturer_id){
		$this->Super_admin_model->delete_manufacturer_by_id($manufacturer_id);

		redirect('Super_admin/manage_manufacturer');
	}
	
	public function edit_manufacturer($manufacturer_id){
		$data=array();;
		$data['manufacturer_info']=$this->Super_admin_model->select_manufacturer_info_by_id($manufacturer_id);
		$data['admin_main_content']=$this->load->view('admin/pages/edit_manufacturer', $data, true);
		$this->load->view('admin/admin_home', $data);
	}
	public function update_manufacturer(){
		$data=array();
		$manufacturer_id=$this->input->post('manufacturer_id',true);
		$data['manufacturer_name']=$this->input->post('manufacturer_name',true);
		$data['manufacturer_description']=$this->input->post('manufacturer_description',true);
		$this->Super_admin_model->update_manufacturer_info($data,$manufacturer_id);
		redirect('Super_admin/manage_manufacturer');
	}

// Start Product Section

	public function add_product(){
		$data=array();
		$data['published_category']=$this->Super_admin_model->select_all_published_category();
		$data['published_manufacturer']=$this->Super_admin_model->select_all_published_manufacturer();
		$data['admin_main_content']=$this->load->view('admin/pages/add_product', $data, true);
		$this->load->view('admin/admin_home', $data);
	}

	public function save_product(){
		$data=array();
		$data['product_name']=$this->input->post('product_name',true);
		$data['category_id']=$this->input->post('category_id',true);
		$data['manufacturer_id']=$this->input->post('manufacturer_id',true);
		$data['product_short_description']=$this->input->post('product_short_description',true);
		$data['product_long_description']=$this->input->post('product_long_description',true);
		$data['product_price']=$this->input->post('product_price',true);
		$data['product_new_price']=$this->input->post('product_new_price',true);
		$data['product_quantity']=$this->input->post('product_quantity',true);
		$is_featured=$this->input->post('is_featured',true);
		if ($is_featured == 'on') {
			$data['is_featured']=1;
		}else{
			$data['is_featured']=0;
		}
		// $data['is_featured']=$this->input->post('is_featured',true);

//start images upload
		$fdata=array();
		$config['upload_path']          = 'product_images/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 6000;
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('product_image'))
		{
			$error=$this->upload->display_errors();
			echo $error;
			exit();
			//$this->load->view('upload_form', $error);
		}
		else
		{
			$fdata=$this->upload->data();
			$data['product_image']=$config['upload_path'].$fdata['file_name'];

			//$this->load->view('upload_success', $data);
		}
//end images upload




		$data['publication_status']=$this->input->post('publication_status',true);
		$this->Super_admin_model->save_product_info($data);
		$sdata=array();
		$sdata['message']="save product informetion successfully";
		$this->session->set_userdata($sdata);
		redirect('Super_admin/add_product');
	}


	public function manage_product(){
		$data=array();
		$data['all_product']=$this->Super_admin_model->select_all_product();
		$data['admin_main_content']=$this->load->view('admin/pages/manage_product', $data,true);
		$this->load->view('admin/admin_home',$data);
	}

	public function delete_product($product_id){
		$this->Super_admin_model->delete_product_by_id($product_id);

		redirect('Super_admin/manage_product');
	}

	public function unpublished_product($product_id){
		$this->Super_admin_model->unpublished_product_by_id($product_id);

		redirect('Super_admin/manage_product');
	}

	public function published_product($product_id){
		$this->Super_admin_model->published_product_by_id($product_id);

		redirect('Super_admin/manage_product');
	}

	public function edit_product($product_id){
		$data=array();
		$data['product_edit']=$this->Super_admin_model->select_product_edit_by_id($product_id);
		$data['admin_main_content']=$this->load->view('admin/pages/edit_product', $data, true);
		$this->load->view('admin/admin_home', $data);
	}

	public function update_product(){
		$data=array();
		$data['product_name']=$this->input->post('product_name',true);
		$data['category_id']=$this->input->post('category_id',true);
		$data['manufacturer_id']=$this->input->post('manufacturer_id',true);
		$data['product_short_description']=$this->input->post('product_short_description',true);
		$data['product_long_description']=$this->input->post('product_long_description',true);
		$data['product_price']=$this->input->post('product_price',true);
		$data['product_new_price']=$this->input->post('product_new_price',true);
		$data['product_quantity']=$this->input->post('product_quantity',true);
		

		$this->Super_admin_model->update_product_info($data,$product_id);
		redirect('Super_admin/manage_product');
	} 

// End product Section	


// End Manufacturer Section
	public function logout(){
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_name');
		$sdata=array();
		$sdata['message']="You are successfully LogOut";
		$this->session->set_userdata($sdata);
		redirect('Admin');
	}
	
}

