<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Checkout/checkout_cart');
        $this->load->model('Adminconfig/adminconfig_config');
        $this->load->helper('url_helper');
        $this->load->library('user_agent');
    }

	function addproduct(){
	  $data=$this->input->post();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('product_id', 'Product Id', 'required');
        $this->form_validation->set_rules('vendor_id', 'Vendor Name', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');

       	  if ($this->form_validation->run() == TRUE){       	  	   
		  	  	if($this->checkout_cart->addproduct($data))
			  	{
			  		$path=explode('?', $this->agent->referrer());
			  		redirect($path[0].'?msg=success');
			  	}
			  	else
			  	{
			  		$path=explode('?', $this->agent->referrer());
			  		redirect($path[0].'?msg=error');
			  	}
		  }
		  else
  	 	 {
  	 	 	$path=explode('?', $this->agent->referrer());
	  		redirect($path[0].'?msg=error');
	     }
	  }	
	  else
	  {
	  	$path=explode('?', $this->agent->referrer());
	  	redirect($path[0].'?msg=error');
	  }	
	   

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
		

		$data['product']=$this->checkout_cart->getquoteproduct();
		$data['price']=$this->checkout_cart->getquoteproductprice();
		$this->load->template('cart',$data);  
			
		   
	 
	
	}

function checkout(){
	if($this->session->userdata("user") && $this->session->userdata("quote")['quote_id'] ){
	$data['payment']=$this->adminconfig_config->getpaymentmethod();
	$data['shipment']=$this->adminconfig_config->getshipmethod();
	$this->load->template('checkout',$data);  
	}else{
		redirect('cart');
	}
}

function placeorder()
	{
		$postdata=$this->input->post();
		

        $this->form_validation->set_rules('shipping', 'Shipment Method', 'required');       
        $this->form_validation->set_rules('payment', 'Payment Method', 'required');
		if(!empty($postdata))
		  {
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

		}else{
				$result['status']=0;
			}
			
		 	echo json_encode($result);
		    exit;
		}
	


}

?>

