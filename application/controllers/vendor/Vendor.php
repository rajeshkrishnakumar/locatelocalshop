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
        $this->load->model('Admin/admin_vendor');
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

	public function dashboard(){
    	if ($this->session->userdata("vendor")['user_id']) {    	
    	 $data['dashboard']=$this->vendor_vendor->getdashboarddata();
    	 $data['lastorder']=$this->vendor_vendor->getlastorderdata();
    	 $data['shiporder']=$this->vendor_vendor->getlastorderdata();
    	 $this->load->view('vendor/header');
    	 $this->load->view('vendor/dashboard',$data);
    	 $this->load->view('vendor/footer');
    	}else{
    	show_404();
    	}
    
	}

	function orderitemfetch()
    {
    	if ($this->session->userdata("vendor")['user_id']) {    	
		$data['ordersitems']=$this->vendor_vendor->orderitemfetch();
	 	 $this->load->view('vendor/header');
    	 $this->load->view('vendor/orderitems',$data);
    	 $this->load->view('vendor/footer');
    	 }else{
    	show_404();
    	}	
    }

     function vendorproductfetch()
    {
    	if ($this->session->userdata("vendor")['user_id']) {    	
		 $data['vendorcatalog']=$this->vendor_vendor->vendorproductfetch();
	 	 $this->load->view('vendor/header');
    	 $this->load->view('vendor/vendorcatalog',$data);
    	 $this->load->view('vendor/footer');
    	 }else{
    	show_404();
    	}	
    }

    public function editcatalogproductfetch($value=''){
		$productdata=$this->uri->segment(4);	
		$productdatafetch=$this->vendor_vendor->editcatalogproductfetch($productdata);
		if($productdatafetch)
		{
		$data['editproduct']=$productdatafetch;	
		 $this->load->view('vendor/header');
    	 $this->load->view('vendor/edit/editproductassignment',$data);
    	 $this->load->view('vendor/footer');	 
		}else{
			redirect('/');
		}

	}

	public function updateproductassignment()
    {

	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('vendor_id', 'Vendor Id', 'required');
        $this->form_validation->set_rules('product_id', 'Product Id', 'required');
        $this->form_validation->set_rules('qty', 'Qty', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
       	  if ($this->form_validation->run() == TRUE){
		  	  	if($this->vendor_vendor->updateproductassignment($data))
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

	function deleteproductassignment()
    {


	  $data=$this->uri->segment(4);
	  if(!empty($data))
	  {

    	  	if($this->vendor_vendor->deleteproductassignment($data))
		  	{
		  	redirect('vendor/vendorcatalog');
		  	}
		  	else
		  	{
		 		redirect('/');
		  	}
	
	  }	
	  else
	  {
	  	redirect('/');
	  }	
	    }

	 public function changepasswordview(){
    	 if ($this->session->userdata("vendor")['user_id']) {   
    	 $this->load->view('vendor/header');
    	 $this->load->view('vendor/changepassword');
    	 $this->load->view('vendor/footer');	 
    	}else{
    		redirect('dashboard');
    	}
    }


	public function changepassword()
	{
	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))	{
		$this->form_validation->set_rules('password', 'Password', 'required');
	    $this->form_validation->set_rules('password_conf', 'Password Confirmation', 'required|matches[password]');
	    if($this->form_validation->run() == TRUE){
			if($this->vendor_vendor->updatepassword($data['password']))
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

	public function editupdatevendorfetch(){
		$productdata=$this->session->userdata("vendor")['user_id'];	
		$productdatafetch=$this->admin_vendor->editupdateadminfetch($productdata);
		if($productdatafetch)
		{
		$data['editvendor']=$productdatafetch;	
		 $this->load->view('vendor/header');
    	 $this->load->view('vendor/edit/editvendor',$data);
    	 $this->load->view('vendor/footer');	 
		}else{
			redirect('/');
		}	
	}




}

?>