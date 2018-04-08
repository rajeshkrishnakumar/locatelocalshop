<?php 

class Admin_productassignment extends CI_Model
{

	function checkproductid($id)
	{
		 $query = $this->db->get_where('catalog_product',array('entity_id'=> $id));
		 $rowcount = $query->num_rows();
		 if($rowcount){
		 	return true;
		 }else{
		 	return false;
		 }
	}
 	
 	function checkvendorid($id)
	{
		 $query = $this->db->get_where('vendor',array('entity_id'=> $id));
		 $rowcount = $query->num_rows();
		 if($rowcount){
		 	return true;
		 }else{
		 	return false;
		 }
	}

	function checkproductassignment($proudctid,$vendorid)
	{

		$this->db->select('entity_id');
		$this->db->from('vendor_product');
		$this->db->where('vendor_product.vendor_id', $vendorid);
		$this->db->where('vendor_product.product_id', $proudctid);
		$query = $this->db->get();		 
		$rowcount = $query->num_rows();
		 if($rowcount){
		 	return true;
		 }else{
		 	return false;
		 }

	}
 

	function addproductassignment($data)
	{
		if($this->checkproductid($data['product_id']) && $this->checkvendorid($data['vendor_id']) &&  !$this->checkproductassignment($data['product_id'],$data['vendor_id']) && $this->session->userdata("admin")['user_id'] ){
		$query = $this->db->insert('vendor_product',$data);
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

	function updateproductassignment($data)
	{
		if($this->checkproductid($data['product_id']) && $this->checkvendorid($data['vendor_id']) && $this->checkproductassignment($data['product_id'],$data['vendor_id']) && $this->session->userdata("admin")['user_id'] ){
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
		if($this->session->userdata("admin")['user_id'] ){
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
	 

}

?>