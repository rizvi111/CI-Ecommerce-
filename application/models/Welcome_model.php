 	 <?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

 /**
  * 
  */
 class Welcome_model extends CI_Model{
 	
 	public function select_all_published_product(){
 		$this->db->select('*');
 		$this->db->from('tbl_product');
 		$this->db->where('publication_status',1);
 		$query_result=$this->db->get();
 		$result=$query_result->result();
 		return $result;  
 	}

 	public function select_all_featured_product(){
 		$this->db->select('*');
 		$this->db->from('tbl_product');
 		$this->db->where('is_featured',1);
 		$query_result=$this->db->get();
 		$result=$query_result->result();
 		return $result;  
 	}

 	public function select_published_product_by_category_id($category_id){
 		$this->db->select('*');
 		$this->db->from('tbl_product');
 		$this->db->where('publication_status',1);
 		$this->db->where('category_id',$category_id);
 		$query_result=$this->db->get();
 		$result=$query_result->result();
 		return $result;  
 	}

 	public function select_product_by_id($product_id){
 		$this->db->select('tbl_product.*,tbl_manufacturer.manufacturer_name');
 		$this->db->from('tbl_product');
 		$this->db->join('tbl_manufacturer','tbl_manufacturer.manufacturer_id=tbl_product.manufacturer_id');
 		$this->db->where('product_id',$product_id);
 		$query_result=$this->db->get();
 		$result=$query_result->row();
 		return $result;  
 	}
 }

  // 	public function select_product_by_id($product_id){
 	// 	$this->db->select('tbl_product.*,tbl_manufacturer.category_name');
 	// 	$this->db->from('tbl_product');
 	// 	$this->db->join('tbl_manufacturer','tbl_manufacturer.manufacturer_id=tbl_product.product_id','left');
 	// 	$this->db->where('product_id',$product_id);
 	// 	$query_result=$this->db->get();
 	// 	$result=$query_result->row();
 	// 	return $result;  
 	// }