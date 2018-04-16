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

		 	 $this->db->select('entity_id,items_count');
			 $this->db->from('sales_quote');
			 $this->db->where('sales_quote.customer_id', $this->session->userdata("user")['user_id']);
			 $this->db->where('sales_quote.is_active', 1);
			 $quotefetchquery = $this->db->get();
	         $quotedata=$quotefetchquery->first_row('array');
	         if($quotedata){
	         	$this->session->set_userdata('quote', array(
										    'quote_id'  =>$quotedata['entity_id'],
										   	'items_count'  =>$quotedata['items_count']
										));
	         	
	         }
	         return true;
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
			$q = $this->db->get_where('customer', array('entity_id' => $id));
			$data=$q->first_row('array');

			$this->session->set_userdata('user', array(
			    'user_id'  => $data['entity_id'],
			    'username' => $data['first_name'],		   
			    'email'     => $data['email'],
			    'is_logged_in'   => TRUE,
			));
			 $this->db->select('entity_id,items_count');
			 $this->db->from('sales_quote');
			 $this->db->where('sales_quote.customer_id', $this->session->userdata("user")['user_id']);
			 $this->db->where('sales_quote.is_active', 1);
			 $quotefetchquery = $this->db->get();
	         $quotedata=$quotefetchquery->first_row('array');
	         if($quotedata){
	         	$this->session->set_userdata('quote', array(
										    'quote_id'  =>$quotedata['entity_id'],
										   	'items_count'  =>$quotedata['items_count']

										   	
										));
	         	return true;
	         }
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
		$this->session->unset_userdata('quote'); 
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

function customerprofilefetch(){
		if($this->session->userdata("user")){
		$this->db->select('first_name,last_name,email,mobile');
			 $this->db->from('customer');
			 $this->db->where('customer.entity_id', $this->session->userdata("user")['user_id']);
			 $customerprofilefetch = $this->db->get();
	         $customerprofilefetchdata=$customerprofilefetch->first_row('array');
	      return $customerprofilefetchdata;
		}else{
			return false;
		}
	}

function customerorderfetch(){
		if($this->session->userdata("user")){
		$this->db->select('*');
			 $this->db->from('sales_order');
			 $this->db->where('sales_order.customer_id', $this->session->userdata("user")['user_id']);
			 $customerorderfetch = $this->db->get();
	         $customerorderfetchdata=$customerorderfetch->result('array');
	      return $customerorderfetchdata;
		}else{
			return false;
		}
	}

function customeraddressfetch(){
	if($this->session->userdata("user")){
		$this->db->select('*');
			 $this->db->from('customer_address');
			 $this->db->where('customer_address.customer_id', $this->session->userdata("user")['user_id']);
			 $customeraddressfetch = $this->db->get();
	         $customeraddressdata=$customeraddressfetch->result('array');
	      return $customeraddressdata;
		}else{
			return false;
		}
	
}

function customeraddressedit($data){
	if($this->session->userdata("user")){
		$this->db->select('*');
			 $this->db->from('customer_address');
			 $this->db->where('customer_address.entity_id', $data);
			 $customeraddressfetch = $this->db->get();
	         $customeraddressdata=$customeraddressfetch->first_row('array');
	      return $customeraddressdata;
		}else{
			return false;
		}
	
}


function customeraddressdelete($id){
	if($this->session->userdata("user")){
		 $this->db->where('entity_id', $id);	
		 $customeraddressdeletequery = $this->db->delete('customer_address');;
	      $customeraddressdeletefirerow = $this->db->affected_rows(); 
	      if($customeraddressdeletefirerow){
	      	return true;
	      }else{
	      	return false;	
	      }
	      
		}else{
			return false;
		}

}

}

?>