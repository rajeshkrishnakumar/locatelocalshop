<?php 
class Vendor_vendor extends CI_Model
{
	function fetchvendor($data){
		$data=$this->getpincodes($data['lat'],$data['long'],'10');
		 $this->db->select('vendor.email,vendor.mobile,vendor.display_name,vendor.address_1,vendor.address_2,vendor.pincode,vendor.city,vendor.state');
		 $this->db->from('vendor');
		 $this->db->where_in('pincode',$data);
 
		$vendorfetchquery = $this->db->get();
		$vendordata=$vendorfetchquery->result('array');
		if($vendordata){
			return $vendordata;
		}else{
			return false;
		}
		 
	 }

	 function fetchvendorbycategory($postdata){		 
		$data=$this->getpincodes($postdata['lat'],$postdata['long'],'10');
		 $this->db->select('vendor.email,vendor.mobile,vendor.display_name,vendor.address_1,vendor.address_2,vendor.pincode,vendor.city,vendor.state');
		 $this->db->from('vendor');
		 $this->db->where_in('pincode',$data);
		 $this->db->where('category',$postdata['cat']);
		$vendorfetchcatquery = $this->db->get();
		$vendordata=$vendorfetchcatquery->result('array');
		if($vendordata){
			return $vendordata;
		}else{
			return false;
		}
		 
	 }


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

	function getpincodes($lat,$long,$distance){
		 $str = "SELECT pincode, `lat`, `long`, 6371 * 2 *
                        ASIN(SQRT( POWER(SIN(($lat - `lat`)*pi()/180/2),2)
                            +COS($lat*pi()/180 )*COS(`lat`*pi()/180)
                            *POWER(SIN(($long-`long`)*pi()/180/2),2)))
                              as distance FROM pincode_locality WHERE
                              `long` between ($long-$distance/cos(radians($lat))*69)
                        and ($long+$distance/cos(radians($lat))*69)
                        and `lat` between ($lat-($distance/69))
                        and ($lat+($distance/69))
                              having distance < $distance ORDER BY distance";
         $query = $this->db->query($str);       
         $quotedata=$query->result('array');              
         return array_column($quotedata, 'pincode');
	}
}
?>