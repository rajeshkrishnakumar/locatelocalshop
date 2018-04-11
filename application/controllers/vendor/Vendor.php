<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Vendor extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Vendor/vendor_vendor');
        $this->load->helper('url_helper');
		 
	}
 
      

	public function fetchvendorproduct($value=""){
	
	 $data=$this->uri->segment(2);
	  $result=array();
	  if(!empty($data))
	  { 
         $productdata= $this->vendor_vendor->fetchvendorproduct($data);  	  	   
  	  	if($productdata)
	  	{
	  		echo "<pre>";
	  		print_r($productdata);
	  	}
	  	else
	  	{
	  		show_404();
	  	}
   
	  }	
	  else
	  {
	  show_404();
	  }	
	 
	}
}

?>