<?php 

class Admin_product extends CI_Model
{
	function skucheck($sku)
	{
		 $query = $this->db->get_where('catalog_product',array('sku'=> $sku));
		 $rowcount = $query->num_rows();
		 if($rowcount){
		 	return true;
		 }else{
		 	return false;
		 }
	} 

	 function vendorfetch()
	{
		if($this->session->userdata("admin")['user_id'] ){
		$this->db->select('entity_id,display_name');
		$this->db->from('vendor');		 
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
		if($this->session->userdata("admin")['user_id'] ){
		$this->db->select('*');
		 $this->db->where('entity_id', $data);	
		$this->db->from('catalog_product');		 
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


    function catalogproductfetch()
	{
		if($this->session->userdata("admin")['user_id'] ){
		$this->db->select('entity_id,product_name');
		$this->db->from('catalog_product');		 
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

	function addproduct($data)
	{
		if(!$this->skucheck($data['sku']) && $this->session->userdata("admin")['user_id'] ){
		$query = $this->db->insert('catalog_product',$data);
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

	function updateproduct($data)
	{
		if($this->skucheck($data['sku']) && $this->session->userdata("admin")['user_id'] ){
		  $this->db->where('entity_id', $data['entity_id']);		  
		  $query = $this->db->update('catalog_product',$data);
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

	function deleteproduct($data)
	{
		if($this->session->userdata("admin")['user_id'] ){
		  $this->db->where('entity_id', $data);		  
		  $query = $this->db->delete('catalog_product');
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


}

?>