<?php 

class Admin_vendor extends CI_Model
{

	function emailcheck($email)
	{
		 $query = $this->db->get_where('vendor',array('email'=> $email));
		 $rowcount = $query->num_rows();
		 if($rowcount){
		 	return true;
		 }else{
		 	return false;
		 }
	}

	

	function vendorregister($data)
	{

		
		if(!$this->emailcheck($data['email']) && $this->session->userdata("admin")['user_id'] ){
		$data['password']=md5($data['password']);
		$query = $this->db->insert('vendor',$data);
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

	public function editupdateadminfetch($data){
		if($this->session->userdata("admin")['user_id'] || $this->session->userdata("vendor")['user_id']){
		$this->db->select('*');
		 $this->db->where('entity_id', $data);	
		$this->db->from('vendor');		 
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

	function vendorprofileupdate($data)
	{
		if($this->emailcheck($data['email']) && $this->session->userdata("admin")['user_id'] || $this->session->userdata("vendor")['user_id'] ){
		  $this->db->where('email', $data['email']);
		  $data['updated_at']=date('Y-m-d H:i:s');
		  $query = $this->db->update('vendor',$data);
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

	function vendorprofiledelete($data)
	{
		if($this->session->userdata("admin")['user_id'] ){
		$this->db->where('entity_id', $data);
		$query = $this->db->delete('vendor');
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

	function vendorlogin($email,$password)
	{
		$query = $this->db->get_where('vendor',array('email'=> $email , 'password'=> md5($password)));
		$rowcount = $query->num_rows();
		 if($rowcount){
		  $data=$query->first_row('array');
		   $this->session->set_userdata('vendor', array(
			    'user_id'  => $data['entity_id'],
			    'username' => $data['first_name'],		   
			    'email'     => $data['email'],
			    'is_logged_in'   => TRUE,
			));
		 	return TRUE;
		 }else{
		 	return false;
		 }
	}


	function logout(){
		$this->session->unset_userdata('vendor'); 
		return true;
	}


}

?>