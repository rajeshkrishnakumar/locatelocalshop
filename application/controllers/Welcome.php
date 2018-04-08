<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		echo $this->uri->segment('3');
		$this->load->helper('form');

		$this->load->view('welcome_message');
	}


	function delete_controller(){
			$salt='eCwWELxi';
 				$status='in progress'; 
				$merchant_key='gtKFFx';
				$txnid_magepayu='100018185m2alldev';
				$amount = '1085.00';
                $productinfo = 'Product Information';  
                $firstname   = 'Rajesh';
                $email       = 'rajesh.nadar@ambab.com';
                $keyString='';
                $Udf1 = '';
                $Udf2 = '';
                $Udf3 = '';
                $Udf4 = '';
                $Udf5 = '';
                $Udf6 = '';
                $Udf7 = '';
                $Udf8 = '';
                $Udf9 = '';
                $Udf10 = '';				
                $keyString =  $merchant_key.'|'.$txnid_magepayu.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|'.$Udf1.'|'.$Udf2.'|'.$Udf3.'|'.$Udf4.'|'.$Udf5.'|'.$Udf6.'|'.$Udf7.'|'.$Udf8.'|'.$Udf9.'|'.$Udf10;    
                echo "<pre>";
               print_r($keyArray = explode("|",$keyString));
                echo "<pre>";
               print_r( $reverseKeyArray = array_reverse($keyArray));
                echo "<pre>";
               print_r($reverseKeyString=implode("|",$reverseKeyArray));
               echo "<br>";
               echo $saltString     = $salt.'|'.$status.'|'.$reverseKeyString	;
               echo "<br>";
                echo $sentHashString = strtolower(hash('sha512', $saltString));
                 



}

}
