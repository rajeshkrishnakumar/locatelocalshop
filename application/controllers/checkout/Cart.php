<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Checkout/checkout_cart');
        $this->load->helper('url_helper');
    }

	function addproduct(){
	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('product_id', 'Product Id', 'required');
        $this->form_validation->set_rules('vendor_id', 'Vendor Name', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');

       	  if ($this->form_validation->run() == TRUE){       	  	   
		  	  	if($this->checkout_cart->addproduct($data))
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

	function updateproduct(){

	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('product_id', 'Product Id', 'required');
        $this->form_validation->set_rules('vendor_id', 'Vendor Name', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');

       	  if ($this->form_validation->run() == TRUE){       	  	   
		  	  	if($this->checkout_cart->updateproduct($data))
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

	function deleteproduct()
	{

	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

    	  	if($this->checkout_cart->deleteproduct($data))
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

	function couponpost(){

	  $data=$this->input->post('coupon_code');
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required');
   
      	  if ($this->form_validation->run() == TRUE){       	  	   
		  	  	if($this->checkout_cart->checkcouponcode($data))
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

	function couponremove(){

	  $data=$this->input->post('coupon_code');
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required');
   
      	  if ($this->form_validation->run() == TRUE){       	  	   
		  	  	if($this->checkout_cart->deleteamountcoupondiscount($data))
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

	function getquoteitem()
	{
		$data=$this->checkout_cart->getquoteproduct();
		if(!empty($data))
		{
		print_r($data);	
		}else
		{
		redirect("welcome");
		}
	 
	
	}

function placeorder()
	{
		$postdata=$this->input->post();
		

        $this->form_validation->set_rules('shipment_method', 'Shipment Method', 'required');       
        $this->form_validation->set_rules('payment_method', 'Payment Method', 'required');
		if ($this->form_validation->run() == TRUE){
				if($this->checkout_cart->placeorder($postdata))
			  	{
			  		$result['status']=1;
			  	}
			  	else
			  	{
			  		$result['status']=0;
			  	}
		}else{
			$result['status']=validation_errors();
		}
		
	 	echo json_encode($result);
	    exit;
	
	}


}

?>

