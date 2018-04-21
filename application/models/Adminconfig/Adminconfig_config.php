<?php

class Adminconfig_config extends CI_Model
{



	function addpromotion($data){
		if($this->session->userdata("admin")['user_id']){		 
			$query = $this->db->insert('promotion',$data);
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

	function updatepromotion($data){
		if($this->session->userdata("admin")['user_id'] ){
		  $this->db->where('entity_id', $data['entity_id']);
	      $query = $this->db->update('promotion',$data);
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

	function deletepromotion($data){
		if($this->session->userdata("admin")['user_id'] ){
		  $this->db->where('entity_id', $data);
	      $query = $this->db->delete('promotion');
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
	

	function addshipmentmethod($data){
		if($this->session->userdata("admin")['user_id']){		 
			$query = $this->db->insert('shipment_method',$data);
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

	function updateshipmentmethod($data){
		if($this->session->userdata("admin")['user_id'] ){
		  $this->db->where('entity_id', $data['entity_id']);
	      $query = $this->db->update('shipment_method',$data);
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

	function deleteshipmentmethod($data){
		if($this->session->userdata("admin")['user_id'] ){
		  $this->db->where('entity_id', $data);
	      $query = $this->db->delete('shipment_method');
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


	function addpaymentmethod($data){
		if($this->session->userdata("admin")['user_id']){		 
			$query = $this->db->insert('payment_method',$data);
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

	function updatepaymentmethod($data){
		if($this->session->userdata("admin")['user_id'] ){
		  $this->db->where('entity_id', $data['entity_id']);
	      $query = $this->db->update('payment_method',$data);
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

	function deletepaymentmethod($data){
		if($this->session->userdata("admin")['user_id'] ){
		  $this->db->where('entity_id', $data);
	      $query = $this->db->delete('payment_method');
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

	function getpaymentmethod()
	{
		if($this->session->userdata("admin")['user_id'] || $this->session->userdata("user") ){
		  $this->db->select('*');
		$this->db->from('payment_method');		 
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

	function getshipmethod()
	{

		if($this->session->userdata("admin")['user_id'] || $this->session->userdata("user") ){
		  $this->db->select('*');
		$this->db->from('shipment_method');		 
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

    function customerfetch()
    {
    	if($this->session->userdata("admin")['user_id'] ){
		$this->db->select('*');
		$this->db->from('customer');		 
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

    function customeraddressfetch()
    {
    	if($this->session->userdata("admin")['user_id'] ){
		$this->db->select('*');
		$this->db->from('customer_address');		 
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

    function quotefetch()
	{
		if($this->session->userdata("admin")['user_id'] ){
		$this->db->select('*');
		$this->db->from('sales_quote');
		$this->db->where('sales_quote.is_active', 1);
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

    function quoteitemfetch()
	{
		if($this->session->userdata("admin")['user_id'] ){
		$this->db->select('*');
		$this->db->from('sales_quote_item')						
		         ->join('sales_quote', 'sales_quote.entity_id = sales_quote_item.quote_id')
		         ->where('sales_quote.is_active',1);	 
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


    function orderfetch()
	{
		if($this->session->userdata("admin")['user_id'] ){
		$this->db->select('*');
		$this->db->from('sales_order');		 
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

    function orderitemfetch()
	{
		if($this->session->userdata("admin")['user_id'] ){
		$this->db->select('*');
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


     function promotionfetch()
	{
		if($this->session->userdata("admin")['user_id'] ){
		$this->db->select('*');
		$this->db->from('promotion');		 
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

     function vendorfetch()
	{
		if($this->session->userdata("admin")['user_id'] ){
		$this->db->select('*');
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

     function vendorproductfetch()
	{
		if($this->session->userdata("admin")['user_id'] ){
		$this->db->select('*');
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

     function catalogproductfetch()
	{
		if($this->session->userdata("admin")['user_id'] ){
		$this->db->select('*');
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

    function adminuserfetch()
	{
		if($this->session->userdata("admin")['user_id'] ){
		$this->db->select('*');
		$this->db->from('admin');		 
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
    

    function orderstatusupdate($data)
    {
    	if($this->session->userdata("admin")['user_id'] ){
		  $this->db->where('entity_id', $data['entity_id']);
	      $query = $this->db->update('sales_order',$data);
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