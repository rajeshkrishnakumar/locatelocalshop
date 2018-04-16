<?php
class Adminconfig extends CI_Controller
{


	public function __construct()
    {
        parent::__construct();
        $this->load->model('Adminconfig/adminconfig_config');
        $this->load->helper('url_helper');
    }
	
	public function addshipmentmethod(){

	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('method_name', 'Method Name', 'required');
        $this->form_validation->set_rules('shipment_method_info', 'Shipment info', 'required');
       	  if ($this->form_validation->run() == TRUE){
		  	  	if($this->adminconfig_config->addshipmentmethod($data))
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


    function updateshipmentmethod()
    {


	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {
        $this->form_validation->set_rules('method_name', 'Method Name', 'required');
        $this->form_validation->set_rules('shipment_method_info', 'Shipment info', 'required');


       	if ($this->form_validation->run() == TRUE){
		  	  	if($this->adminconfig_config->updateshipmentmethod($data))
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

     function deleteshipmentmethod()
    {


      $data=$this->uri->segment(4);
	  $result=array();
	  if(!empty($data))
	  {

    	  	if($this->adminconfig_config->deleteshipmentmethod($data))
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


    public function addpaymentmethod(){

	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('method_name', 'Method Name', 'required');
        $this->form_validation->set_rules('payment_method_info', 'Payment info', 'required');
       	  if ($this->form_validation->run() == TRUE){
		  	  	if($this->adminconfig_config->addpaymentmethod($data))
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


    function updatepaymentmethod()
    {


	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {
        $this->form_validation->set_rules('method_name', 'Method Name', 'required');
        $this->form_validation->set_rules('payment_method_info', 'Payment info', 'required');


       	if ($this->form_validation->run() == TRUE){
		  	  	if($this->adminconfig_config->updatepaymentmethod($data))
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

     function deletepaymentmethod()
    {


      $data=$this->uri->segment(4);
	  $result=array();
	  if(!empty($data))
	  {

    	  	if($this->adminconfig_config->deletepaymentmethod($data))
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


    function getpaymentmethod()
	{
	$fetchdata=$this->adminconfig_config->getpaymentmethod();
	print_r($fetchdata);		
		
	}

	function getshipmethod()
	{
	$fetchdata=$this->adminconfig_config->getshipmethod();
	print_r($fetchdata);
	}

    function customerfetch()
    {
    $fetchdata=$this->adminconfig_config->customerfetch();
	print_r($fetchdata);	
    }

    function customeraddressfetch()
    {
     $fetchdata=$this->adminconfig_config->customeraddressfetch();
	print_r($fetchdata);	
    }

     function quotefetch()
	{
		 $fetchdata=$this->adminconfig_config->quotefetch();
	print_r($fetchdata);
	}

    function quoteitemfetch()
	{
	 $fetchdata=$this->adminconfig_config->quoteitemfetch();
	print_r($fetchdata);	
    }
 

    function orderfetch()
	{
		$fetchdata=$this->adminconfig_config->orderfetch();
	print_r($fetchdata);	
    }

   

    function orderitemfetch()
    {
    	$fetchdata=$this->adminconfig_config->orderitemfetch();
	print_r($fetchdata);	
    }


     function promotionfetch()
    {
    	$fetchdata=$this->adminconfig_config->promotionfetch();
	print_r($fetchdata);	
    }


     function vendorfetch()
    {
    	$fetchdata=$this->adminconfig_config->vendorfetch();
	print_r($fetchdata);	
    }

     function vendorproductfetch()
    {
    	$fetchdata=$this->adminconfig_config->vendorproductfetch();
	print_r($fetchdata);	
    }

     function catalogproductfetch()
    {
    	$fetchdata=$this->adminconfig_config->catalogproductfetch();
	    print_r($fetchdata);	
    }

    function orderstatusupdate()
    {

    	 $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {
        $this->form_validation->set_rules('entity_id', 'Entity id', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');


       	if ($this->form_validation->run() == TRUE){
		  	  	if($this->adminconfig_config->orderstatusupdate($data))
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
}

?>