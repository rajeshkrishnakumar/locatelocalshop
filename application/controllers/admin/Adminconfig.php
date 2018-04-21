<?php
class Adminconfig extends CI_Controller
{


	public function __construct()
    {
        parent::__construct();
        $this->load->model('Adminconfig/adminconfig_config');
        $this->load->helper('url_helper');
    }


	function addpromotionform(){
		if ($this->session->userdata("admin")['user_id']) {    	
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/addpromotion');
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}	
	}

    public function addpromotion(){

	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required|is_unique[promotion.coupon_code]');
        $this->form_validation->set_rules('discount_price', 'Discount price', 'required');
         $this->form_validation->set_rules('is_active', 'Is active', 'required');
         $this->form_validation->set_rules('from_date', 'From Data', 'required');
       	  if ($this->form_validation->run() == TRUE){
		  	  	if($this->adminconfig_config->addpromotion($data))
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

	public function updatepromotion(){

	  $data=$this->input->post();
	  $result=array();
	  if(!empty($data))
	  {

        $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required|is_unique[promotion.coupon_code]');
        $this->form_validation->set_rules('discount_price', 'Discount price', 'required');
         $this->form_validation->set_rules('is_active', 'Is active', 'required');
         $this->form_validation->set_rules('from_date', 'From Data', 'required');
       	  if ($this->form_validation->run() == TRUE){
		  	  	if($this->adminconfig_config->updatepromotion($data))
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

	 function deletepromotion()
    {


      $data=$this->uri->segment(4);
	  $result=array();
	  if(!empty($data))
	  {

    	  	if($this->adminconfig_config->deletepromotion($data))
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


    function addshipmentform(){
		if ($this->session->userdata("admin")['user_id']) {    	
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/addshipment');
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}	
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


    function addpaymentmethodform(){
		if ($this->session->userdata("admin")['user_id']) {    	
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/addpayment');
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}	
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
	if ($this->session->userdata("admin")['user_id']) {    	
		$data['paymentmethod']=$this->adminconfig_config->getpaymentmethod();
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/paymentmethod',$data);
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}
		
	}

	function getshipmethod()
	{
   	if ($this->session->userdata("admin")['user_id']) {    	
		$data['shipmethod']=$this->adminconfig_config->getshipmethod();
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/shipment',$data);
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}
	}

    function customerfetch()
    {
   	if ($this->session->userdata("admin")['user_id']) {    	
		$data['customer']=$this->adminconfig_config->customerfetch();
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/customer',$data);
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}	
    }

    function customeraddressfetch()
    {
    	if ($this->session->userdata("admin")['user_id']) {    	
		$data['customeraddress']=$this->adminconfig_config->customeraddressfetch();
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/customeraddress',$data);
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}		
    }

     function quotefetch()
	{
		if ($this->session->userdata("admin")['user_id']) {    	
		$data['quotes']=$this->adminconfig_config->quotefetch();
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/quote',$data);
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}

		  
	}

    function quoteitemfetch()
	{
		if ($this->session->userdata("admin")['user_id']) {    	
		$data['quotesitems']=$this->adminconfig_config->quoteitemfetch();
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/quoteitems',$data);
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}

     }
 

    function orderfetch()
	{
		if ($this->session->userdata("admin")['user_id']) {    	
		$data['orders']=$this->adminconfig_config->orderfetch();
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/orders',$data);
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}
    }

   

    function orderitemfetch()
    {
    	if ($this->session->userdata("admin")['user_id']) {    	
		$data['ordersitems']=$this->adminconfig_config->orderitemfetch();
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/orderitems',$data);
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}	
    }


     function promotionfetch()
    {
    	if ($this->session->userdata("admin")['user_id']) {    	
		 $data['promotion']=$this->adminconfig_config->promotionfetch();
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/promotion',$data);
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}
    }


     function vendorfetch()
    {
    	if ($this->session->userdata("admin")['user_id']) {    	
		 $data['vendor']=$this->adminconfig_config->vendorfetch();
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/vendor',$data);
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}	
    }

     function vendorproductfetch()
    {
    	if ($this->session->userdata("admin")['user_id']) {    	
		 $data['vendorcatalog']=$this->adminconfig_config->vendorproductfetch();
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/vendorcatalog',$data);
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}	
    }

     function catalogproductfetch()
    {
    	if ($this->session->userdata("admin")['user_id']) {    	
		 $data['catalog']=$this->adminconfig_config->catalogproductfetch();
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/catalog',$data);
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}	
    }

      function adminuserfetch()
    {
    	if ($this->session->userdata("admin")['user_id']) {    	
		 $data['adminuser']=$this->adminconfig_config->adminuserfetch();
	 	 $this->load->view('admin/header');
    	 $this->load->view('admin/adminuser',$data);
    	 $this->load->view('admin/footer');
    	 }else{
    	show_404();
    	}	
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