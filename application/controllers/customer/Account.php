<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller 
{

 public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer/customer_account');
        $this->load->helper('url_helper');
    }
    function customerview(){
    	if($this->session->userdata("user")){
    		$data['profile']=$this->customer_account->customerprofilefetch();
			$data['order']=$this->customer_account->customerorderfetch();
			$data['address']=$this->customer_account->customeraddressfetch();
    	$this->load->template('customer',$data);
       }else{
       	redirect('/');
       }
    }

	public function emailcheck()
	{
	 $data=$this->input->post('email'); 
	 $result=array();
	 if(!empty($data)){
		if($this->customer_account->emailcheck($data))
		{
			$result['status']=1;
		}
		else{
			$result['status']=0;
		}
	}
	else{
		$result['status']=2;
	}	
		echo json_encode($result);
		exit;			
	}

	public function usercheck()
	{
	 $email=$this->input->post('email');
	 $password=$this->input->post('password'); 
	 $result=array();
	  if(!empty($email) && !empty($password)){		 
		if($this->customer_account->logincheck($email,$password))
		{
			$result['status']=1;
		}
		else{
			$result['status']=0;
		}
	  }else{
	  	$result['status']=2;
	  }	
		echo json_encode($result);
		exit;			
	}

	public function userregister()
	{
	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password_conf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[customer.email]');
        $this->form_validation->set_rules('mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');

       	  if ($this->form_validation->run() == TRUE){
       	  	   unset($data['password_conf']);
		  	  	if($this->customer_account->userregistraion($data))
			  	{
			  		$result['status']=1;
			  	}
			  	else
			  	{
			  		$result['status']=0;
			  	}
		  }
		  else
  	 	 {
	  		$result['status']=validation_errors();
	     }
	  }	
	  else
	  {
	  	$result['status']=2;
	  }	
	  echo json_encode($result);
	  exit;
	}

	public function updateprofile()
	{

	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');

       	if ($this->form_validation->run() == TRUE){
		  	  	if($this->customer_account->userprofileupdate($data))
			  	{
			  		$result['status']=1;
			  	}
			  	else
			  	{
			  		$result['status']=0;
			  	}
		}
	    else
  	 	{
	  		$result['status']=validation_errors();
	    }
	  }	
	  else
	  {
	  	$result['status']=2;
	  }	
	  echo json_encode($result);
	  exit;
	

	}


	public function editaddress($value=''){
		$addressdata=$this->uri->segment(4);	
		$addressdatafetch=$this->customer_account->customeraddressedit($addressdata);
		if($addressdatafetch)
		{
		$data['profile']=$addressdatafetch;	
		$this->load->template('customer_addressedit',$data);	 
		}else{
			redirect('/');
		}

	}

	public function addaddress()
	{
	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('add_first_name', 'First Name', 'required');
        $this->form_validation->set_rules('add_last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('address_1', 'Address 1', 'required');
        $this->form_validation->set_rules('address_2', 'Address 2', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('add_mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('pincode', 'Pincode ', 'required|regex_match[/^[0-9]{6}$/]');
       	if ($this->form_validation->run() == TRUE){
       	  	   $data['first_name']=$data['add_first_name'];
       	  	   $data['last_name']=$data['add_last_name'];
       	  	   $data['mobile']=$data['add_mobile'];
       	  	   unset($data['add_first_name']);
       	  	   unset($data['add_last_name']);
       	  	   unset($data['add_mobile']);
		  	  	if($this->customer_account->addcustomeraddress($data))
			  	{
			  		$result['status']=1;
			  	}
			  	else
			  	{
			  		$result['status']=0;
			  	}
		}
	    else
  	 	{

	  		$result['status']=validation_errors();
	    }
	  }	
	  else
	  {
	  	$result['status']=2;
	  }	
	  echo json_encode($result);
	  exit;
	
	}

	public function updateaddress()
	{
	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {
	  	$this->form_validation->set_rules('entity_id', 'Entity id', 'required');
        $this->form_validation->set_rules('add_first_name', 'First Name', 'required');
        $this->form_validation->set_rules('add_last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('address_1', 'Address 1', 'required');
        $this->form_validation->set_rules('address_2', 'Address 2', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('add_mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('pincode', 'Pincode ', 'required|regex_match[/^[0-9]{6}$/]');
       	if ($this->form_validation->run() == TRUE){
       		 $data['first_name']=$data['add_first_name'];
       	  	   $data['last_name']=$data['add_last_name'];
       	  	   $data['mobile']=$data['add_mobile'];
       	  	   unset($data['add_first_name']);
       	  	   unset($data['add_last_name']);
       	  	   unset($data['add_mobile']);
		  	  	if($this->customer_account->updatecustomeraddress($data))
			  	{
			  		$result['status']=1;
			  	}
			  	else
			  	{
			  		$result['status']=0;
			  	}
		}
	    else
  	 	{

	  		$result['status']=validation_errors();
	    }
	  }	
	  else
	  {
	  	$result['status']=2;
	  }	
	  echo json_encode($result);
	  exit;
	
	}

	public function customeraddressdelete($value='')
	{
		 $data=$this->uri->segment(4);
		if($this->customer_account->customeraddressdelete($data))
		{
			redirect('customer/account#parentHorizontalTab3');
		}else{
			redirect('/');
		}	
	}


	public function logout()
	{
		if($this->customer_account->logout())
		{
			redirect('/');
		}else{
			redirect('/');
		}
	}

	public function changepassword()
	{
	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))	{
		$this->form_validation->set_rules('password_profile', 'Password', 'required');
	    $this->form_validation->set_rules('password_conf_profile', 'Password Confirmation', 'required|matches[password_profile]');
	    if($this->form_validation->run() == TRUE){
			if($this->customer_account->updatepassword($data['password_profile']))
			{
				$result['status']=1;
			}else{
				$result['status']=0;
			}
		}else{
			$result['status']=validation_errors();
		}	
	  }

	   echo json_encode($result);
	  exit;
	   	
	}

	 
 
}