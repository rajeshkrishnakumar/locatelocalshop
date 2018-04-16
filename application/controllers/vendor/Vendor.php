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
	
	public function vendorview(){
		 $this->load->template('vendor_dealerlocator');
	}

	public function fetchvendor(){

	 $data=$this->input->post();
	 $response=array();
	 if(!empty($data)){
	 	$productdata= $this->vendor_vendor->fetchvendor($data);  
	 	if($productdata){
	 		$html='';
	 		foreach ($productdata as $productdatakey => $productdatavalue) {
	 		$html.='<li class="card card-3 stacked--up"> <div class="dealer_box"> <div class="head_title clearfix">';
            $html.='<img src='.asset_url('images/brand_marker.png').' alt="Brand marker">';
            $html.='<h3>'.$productdatavalue["display_name"].'</h3></div>';
            $html.='    
                <div class="body">
                   <span>Address</span>
                   <p>
                    <strong>Address : </strong>'.$productdatavalue["address_1"].'<br>
                    <strong>Address : </strong>'.$productdatavalue["address_2"].'<br>
                    <strong>Pincode : </strong>'.$productdatavalue["pincode"].'<br>
                   <strong> City : </strong>'.$productdatavalue["city"].'<br>
                   <strong> State : </strong>'.$productdatavalue["state"].'<br>	
                   </p>';
                  
            $html.=' <a href='.base_url("shop/{$productdatavalue["display_name"]}").'>
                      <img src='.asset_url('images/visit_website.png').' alt="">
                      Shop now
                   </a>                  
                                       
                </div>
             </div>
          </li>';
	 		}
	 	$response['results']=$html;
	 		
	 	}else{
	 		$response['results']='<li>No shop found search for another nearby place</li>';
	 	}
	 }	else{
	 	show_404();
	 }  
	 echo json_encode($response);
	  exit; 

    }

    public function fetchvendorbycategory(){

	 $data=$this->input->post();

	 if(!empty($data)){
	 	$productdata= $this->vendor_vendor->fetchvendorbycategory($data);  
	 	if($productdata){
	 		print_r($productdata);
	 	}else{
	 	 print_r($productdata);
	 	}
	 }	else{
	 	show_404();
	 }   

    }
        

	public function fetchvendorproduct($value=""){
	
	 $postdata=$this->uri->segment(2);
	  $result=array();
	  if(!empty($postdata))
	  { 
         $productdata= $this->vendor_vendor->fetchvendorproduct($postdata); 
         $vendordata=$this->vendor_vendor->fetchvendordetail($postdata); 	  	   
  	  	if($productdata)
	  	{
	  		$data['vendor']=$vendordata;
	  		$data['product']=$productdata;
	  			 $this->load->template('vendor_productlist',$data); 
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