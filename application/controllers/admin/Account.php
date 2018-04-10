<?php
class Account extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/admin_account');
        $this->load->helper('url_helper');
    }


    public function adminlogin()
	{
	 $email=$this->input->post('email');
	 $password=$this->input->post('password'); 
	 $result=array();
	  if(!empty($email) && !empty($password)){		 
		if($this->admin_account->adminlogin($email,$password))
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

	public function adminregister()
	{
	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password_conf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[admin.email]');
        $this->form_validation->set_rules('mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');

       	  if ($this->form_validation->run() == TRUE){
       	  	   unset($data['password_conf']);
		  	  	if($this->admin_account->adminregister($data))
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
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile Number ', 'required|regex_match[/^[0-9]{10}$/]');

       	if ($this->form_validation->run() == TRUE){
		  	  	if($this->admin_account->updateprofile($data))
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

	public function deleteprofile()
	{
	   $data=$this->uri->segment(5);
	  $result=array();
	  if(!empty($data))
	  {

    	  	if($this->admin_account->deleteprofile($data))
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
	  	$result['status']=2;
	  }	
	  echo json_encode($result);
	  exit;
	

	}

	public function changepassword()
	{
	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))	{
		$this->form_validation->set_rules('password', 'Password', 'required');
	    $this->form_validation->set_rules('password_conf', 'Password Confirmation', 'required|matches[password]');
	    if($this->form_validation->run() == TRUE){
			if($this->admin_account->updatepassword($data['password']))
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

	public function logout()
	{
		if($this->admin_account->logout())
		{
			redirect('Welcome');
		}else{
			redirect('Welcome');
		}
	}

}
?>