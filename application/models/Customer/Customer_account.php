<?php 
 
class Customer_account extends CI_Model
{
	function emailcheck($email)
	{
		 $query = $this->db->get_where('customer',array('email'=> $email));
		 $rowcount = $query->num_rows();
		 if($rowcount){
		 	return true;
		 }else{
		 	return false;
		 }
	}

	function logincheck($email,$password)
	{
		$query = $this->db->get_where('customer',array('email'=> $email , 'password'=> md5($password)));
		$rowcount = $query->num_rows();
		 if($rowcount){
		  $data=$query->first_row('array');
		   $this->session->set_userdata('user' ,array(
			    'user_id'  => $data['entity_id'],
			    'username' => $data['first_name'],		   
			    'email'     => $data['email'],
			    'is_logged_in'   => TRUE,
			));

		 	 $this->db->select('entity_id');
			 $this->db->from('sales_quote');
			 $this->db->where('sales_quote.customer_id', $this->session->userdata("user")['user_id']);
			 $this->db->where('sales_quote.is_active', 1);
			 $quotefetchquery = $this->db->get();
	         $quotedata=$quotefetchquery->first_row('array');
	         if($quotedata){
	         	$this->session->set_userdata('quote', array(
										    'quote_id'  =>$quotedata['entity_id']
										   	
										));
	         	return true;
	         }
		 }else{
		 	return false;
		 }
	}

	function userregistraion($data)
	{

		
		if(!$this->emailcheck($data['email'])){
		$data['password']=md5($data['password']);	
		$data['updated_at']=date('Y-m-d H:i:s');
		$query = $this->db->insert('customer',$data);
		$affected_rows = $this->db->affected_rows();
			if($affected_rows){
			$id = $this->db->insert_id();
			$q = $this->db->get_where('customer', array('id' => $id));
			$data=$q->first_row('array');

			$this->session->set_userdata('user', array(
			    'user_id'  => $data['entity_id'],
			    'username' => $data['first_name'],		   
			    'email'     => $data['email'],
			    'is_logged_in'   => TRUE,
			));
			 $this->db->select('entity_id');
			 $this->db->from('sales_quote');
			 $this->db->where('sales_quote.customer_id', $this->session->userdata("user")['user_id']);
			 $this->db->where('sales_quote.is_active', 1);
			 $quotefetchquery = $this->db->get();
	         $quotedata=$quotefetchquery->first_row('array');
	         if($quotedata){
	         	$this->session->set_userdata('quote', array(
										    'quote_id'  =>$quotedata['entity_id']
										   	
										));
	         	return true;
	         }
				
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

	function userprofileupdate($data)
	{
		if($this->emailcheck($data['email'])){
		  $this->db->where('email', $data['email']);
		  $data['updated_at']=date('Y-m-d H:i:s');
		  $query = $this->db->update('customer',$data);
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

	function addcustomeraddress($data)
	{

		if($this->session->userdata("user")){
		$data['customer_id']=$this->session->userdata("user")['user_id'];	
		$query = $this->db->insert('customer_address',$data);
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

	function updatecustomeraddress($data)
	{
		if($this->session->userdata("user")){
		  $this->db->where('entity_id', $data['entity_id']);
		  $data['updated_at']=date('Y-m-d H:i:s');
		  $data['customer_id']=$this->session->userdata("user")['user_id'];
		  $query = $this->db->update('customer_address',$data);
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

	function logout(){
		$this->session->unset_userdata('user'); 
		return true;
	}

	function updatepassword($password){
		if($this->session->userdata("user")){
		  $data['password']=md5($password);	
		  $this->db->where('entity_id', $this->session->userdata("user")['user_id']);
		  $query = $this->db->update('customer',$data);
	      $affected_rows = $this->db->affected_rows();
	      return true;
		}else{
			return false;
		}
	}





}

?>