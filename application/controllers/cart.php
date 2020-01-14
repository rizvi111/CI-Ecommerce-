<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Cart extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		// $this->load->library('sessions');
	}
	public function add_to_cart(){
		$qty=$this->input->post('qty');
		$product_id=$this->input->post('product_id');
		$product_info=$this->Welcome_model->select_product_by_id($product_id);
		
		$data = array(
			'id'      => $product_info->product_id,
			'qty'     => $qty,
			'price'   => $product_info->product_new_price,
			'name'    => $product_info->product_name,
			'options' => array('image' => $product_info->product_image)
		);
		  // echo "<pre>";
    // print_r($data);
    // exit();

		$this->cart->insert($data);


		redirect('cart/show_cart');
	}

	public function show_cart(){
		$contents=$this->cart->contents();
		// 'contents' => $contents 
		$data=array('contents' => $contents);
		$data['home_main_content']=$this->load->view('pages/cart_view',$data, true);
		$this->load->view('home', $data);
	}
}        

