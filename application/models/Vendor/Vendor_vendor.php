<?php 
class Vendor_vendor extends CI_Model
{
	function fetchvendor($data){
		$pincodes=$this->getpincodes($data['lat'],$data['lng'],'10');
		 $this->db->select('vendor.email,vendor.mobile,vendor.display_name,vendor.address_1,vendor.address_2,vendor.pincode,vendor.city,vendor.state');
		 $this->db->from('vendor');
		 $this->db->where_in('pincode',$pincodes);
 		
		$vendorfetchquery = $this->db->get();
		$vendordata=$vendorfetchquery->result('array');
		if($vendordata){
			return $vendordata;
		}else{
			return false;
		}
		 
	 }

	 function fetchvendorbycategory($postdata){		 
		$data=$this->getpincodes($postdata['lat'],$postdata['lng'],'10');
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

	  function fetchvendordetail($postdata){
		 $this->db->select('vendor.email,vendor.mobile,vendor.display_name,vendor.address_1,vendor.address_2,vendor.pincode,vendor.city,vendor.state');
		 $this->db->from('vendor');
		 $this->db->where('vendor.display_name',$postdata);
		$vendorfetchcatquery = $this->db->get();
		$vendordata=$vendorfetchcatquery->first_row('array');
		if($vendordata){
			return $vendordata;
		}else{
			return false;
		}
		 
	 }


	function fetchvendorproduct($data){
					 $this->db->select('vendor.entity_id as vendor_id,vendor_product.price,vendor_product.product_id,vendor_product.qty,vendor_product.product_offers,catalog_product.product_name,catalog_product.special_price,catalog_product.product_desc,catalog_product.brand,catalog_product.image_gallery');
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

	function getdashboarddata(){
		 $dashboard=array();
		 $this->db->select('SUM(sales_order.grant_total) as totalrevenue');	
		 $this->db->from('sales_order')
		  				->join('sales_order_item', 'sales_order.entity_id = sales_order_item.order_id');	
		 $this->db->where('sales_order.status','delivered');
		 $this->db->where('sales_order_item.vendor_id',$this->session->userdata("vendor")['user_id']); 				
		 $fetchquery= $this->db->get();
		 $dashboard['totalrevenue']=$fetchquery->first_row('array');
		 $this->db->select('COUNT(item_id) as ordercount');
		 $this->db->where('vendor_id',$this->session->userdata("vendor")['user_id']);
		 $this->db->from('sales_order_item');	
		 $fetchquerycount= $this->db->get();
		 $dashboard['ordercount']=$fetchquerycount->first_row('array');
		 $this->db->select('COUNT(entity_id) as vendorcount');
		 $this->db->where('vendor_id',$this->session->userdata("vendor")['user_id']);
		 $this->db->from('vendor_product');	
		 $fetchquerycount1= $this->db->get();
		 $dashboard['vendorcount']=$fetchquerycount1->first_row('array');  
		
		 return $dashboard;

	}

	function getlastorderdata(){
		 $this->db->select("*");
	     $this->db->from("sales_order");
	      $this->db->where('vendor_id',$this->session->userdata("vendor")['user_id']);
		 $this->db->limit(4);
		 $this->db->order_by('entity_id',"DESC");
		 $query = $this->db->get();
		 return $query->result('array');
	}

	function getlastshiporderdata(){

		 $this->db->select("*");
		 $this->db->where('status','shipped');
		  $this->db->where('vendor_id',$this->session->userdata("vendor")['user_id']);
	     $this->db->from("sales_order");
		 $this->db->limit(4);
		 $this->db->order_by('entity_id',"DESC");
		 $query = $this->db->get();
		 return  $query->result('array');
	}

	 function orderitemfetch()
	{
		if($this->session->userdata("vendor")['user_id'] ){
		$this->db->select('*');
		 $this->db->where('vendor_id',$this->session->userdata("vendor")['user_id']);
		$this->db->from('sales_order_item');		 
		$itemfetchquery = $this->db->get();
		$itemdata=$itemfetchquery->result('array');
			if($itemdata){
				return $itemdata;
			}
			else
			{
			 	return false;
			}	
		}
		else
		{
			return false;
		} 

    }


     function vendorproductfetch()
	{
		if($this->session->userdata("vendor")['user_id'] ){
		$this->db->select('*');
		$this->db->where('vendor_id',$this->session->userdata("vendor")['user_id']);
		$this->db->from('vendor_product');		 
		$itemfetchquery = $this->db->get();
		$itemdata=$itemfetchquery->result('array');
			if($itemdata){
				return $itemdata;
			}
			else
			{
			 	return false;
			}	
		}
		else
		{
			return false;
		} 

    }


 	 function editcatalogproductfetch($data)
	{
		if($this->session->userdata("vendor")['user_id'] ){
		$this->db->select('*');
		 $this->db->where('entity_id', $data);	
		$this->db->from('vendor_product');		 
		$itemfetchquery = $this->db->get();
		$itemdata=$itemfetchquery->first_row('array');
			if($itemdata){
				return $itemdata;
			}
			else
			{
			 	return false;
			}	
		}
		else
		{
			return false;
		} 

    }


function updateproductassignment($data)
	{
		if($this->session->userdata("vendor")['user_id'] ){
		$this->db->where('product_id', $data['product_id']);
		$this->db->where('vendor_id', $data['vendor_id']);		  
	    $query = $this->db->update('vendor_product',$data);
	    $affected_rows = $this->db->affected_rows();
			if($affected_rows){
				return true;
			}
			else
			{
			 	return false;
			}	
		}
		else
		{
			return false;
		} 
 

	}


    function deleteproductassignment($data)
	{
		if($this->session->userdata("vendor")['user_id'] ){
		$this->db->where('entity_id', $data);
		$query = $this->db->delete('vendor_product');
	    $affected_rows = $this->db->affected_rows();
			if($affected_rows){
				return true;
			}
			else
			{
			 	return false;
			}	
		}
		else
		{
			return false;
		} 
 

	}

	function updatepassword($password){
		if($this->session->userdata("vendor")){
		  $data['password']=md5($password);	
		  $this->db->where('entity_id', $this->session->userdata("admin")['user_id']);
		  $query = $this->db->update('vendor',$data);
	      $affected_rows = $this->db->affected_rows();
	      return true;
		}else{
			return false;
		}
	}


}
?>