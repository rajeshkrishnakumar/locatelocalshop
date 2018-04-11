<?php 
class Vendor_vendor extends CI_Model
{
	// function fetchvendor(){
	// 	 $this->db->select('*');
	// 				 $this->db->from('vendor');
	// 				 $this->db->where('vendor.customer_id', $this->session->userdata("user")['user_id']);
	// 				 $this->db->where('sales_quote.coupon_code', $couponcode);
	// 				 $this->db->where('sales_quote.is_active', 1);
	// 	$quotefetchquery = $this->db->get();
	// 	$quotedata=$quotefetchquery->first_row('array');
	// }

	function fetchvendorproduct($data){
					 $this->db->select('vendor.email,vendor.mobile,vendor.display_name,vendor.address_1,vendor.address_2,vendor.pincode,vendor.city,vendor.state,vendor_product.price,vendor_product.product_offers,catalog_product.product_name,catalog_product.special_price,catalog_product.product_desc,catalog_product.brand,catalog_product.image_gallery');
					 $this->db->from('vendor')
				     		  ->join('vendor_product', 'vendor.entity_id = vendor_product.vendor_id')
				     		  ->join('catalog_product', 'catalog_product.entity_id = vendor_product.product_id')
					 ->where('vendor.display_name', $data);
					 
		$quotefetchquery = $this->db->get();
		$quotedata=$quotefetchquery->result('array');
		if($quotedata){
			return $quotedata;
		}else{
			return false;
		}
	}
}
?>