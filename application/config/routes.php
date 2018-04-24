<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['shoplocator']="vendor/vendor/vendorview";
$route['shop/(:any)'] = "vendor/vendor/fetchvendorproduct/$1";
$route['vendors']="vendor/vendor/fetchvendor";
$route['vendorbycategory']='vendor/vendor/fetchvendorbycategory'	;
$route['login']='/customer/account/usercheck'	;
$route['register']='customer/account/userregister'	;
$route['logout']='customer/account/logout'	;
$route['cart']='checkout/cart/getquoteitem'	;
$route['cart/add']='checkout/cart/addproduct'	;
$route['checkout']='checkout/cart/checkout';
$route['placeorder']='checkout/cart/placeorder';
$route['couponpost']='checkout/cart/couponpost';
$route['customer/account']='customer/account/customerview';
$route['customer/address/delete/(:any)']='customer/account/customeraddressdelete/$1';
$route['customer/address/add']='customer/account/addaddress';
$route['customer/address/edit/(:any)']='customer/account/editaddress/$1';
$route['backend']='admin/account/adminloginview';
$route['backend/logout']='admin/account/logout';
$route['dashboard']='admin/account/dashboard';
$route['backend/orders']='admin/adminconfig/orderfetch';
$route['backend/ordersitems']='admin/adminconfig/orderitemfetch';
$route['backend/quotes']='admin/adminconfig/quotefetch';
$route['backend/quotesitems']='admin/adminconfig/quoteitemfetch';
$route['backend/customer']='admin/adminconfig/customerfetch';
$route['backend/customeraddress']='admin/adminconfig/customeraddressfetch';
$route['backend/catalog']='admin/adminconfig/catalogproductfetch';
$route['backend/vendorcatalog']='admin/adminconfig/vendorproductfetch';
$route['backend/promotion']='admin/adminconfig/promotionfetch';
$route['backend/vendor']='admin/adminconfig/vendorfetch';
$route['backend/adminusers']='admin/adminconfig/adminuserfetch';
$route['backend/payment']='admin/adminconfig/getpaymentmethod';
$route['backend/shipment']='admin/adminconfig/getshipmethod';
$route['backend/addproduct']='admin/product/addproductview';
$route['backend/addproductpost']='admin/product/addproduct';
$route['backend/product/edit/(:any)']='admin/product/editproduct/$1';
$route['backend/editproductpost']='admin/product/updateproduct';
$route['backend/product/delete/(:any)']='admin/product/deleteproduct/$1';
$route['backend/addproductassigment']='admin/product/addproductassigment';
$route['backend/addproductassignmentpost']='admin/productassignment/addproductassignment';
$route['backend/productassignment/edit/(:any)']='admin/productassignment/editcatalogproductfetch/$1';
$route['backend/editproductassignmentpost']='admin/productassignment/updateproductassignment';
$route['backend/productassignment/delete/(:any)']='admin/productassignment/deleteproductassignment/$1';
$route['backend/addpromotion']='admin/adminconfig/addpromotionform';
$route['backend/addpromotionpost']='admin/adminconfig/addpromotion';
$route['backend/promotion/edit/(:any)']='admin/adminconfig/editupdatepromotionfetch/$1';
$route['backend/editpromotionpost']='admin/adminconfig/updatepromotion';
$route['backend/promotion/delete/(:any)']='admin/adminconfig/deletepromotion/$1';
$route['backend/addvendor']='admin/vendor/addvendorview';
$route['backend/addvendorpost']='admin/vendor/vendorregister';
$route['backend/vendor/edit/(:any)']='admin/vendor/editupdatevendorfetch/$1';
$route['backend/editpromotionpost']='admin/vendor/vendorprofileupdate';
$route['backend/vendor/delete/(:any)']='admin/vendor/vendorprofiledelete/$1';
$route['backend/addadminuser']='admin/account/addadminview';
$route['backend/addadminuserpost']='admin/account/adminregister';
$route['backend/adminuser/edit/(:any)']='admin/account/editupdateadminfetch/$1';
$route['backend/editaddadminuserpost']='admin/account/updateprofile';
$route['backend/adminuser/delete/(:any)']='admin/account/deleteprofile/$1';
$route['backend/addshipment']='admin/adminconfig/addshipmentform';
$route['backend/addshipmentpost']='admin/adminconfig/addshipmentmethod';
$route['backend/shipment/edit/(:any)']='admin/adminconfig/editshipmentmethodfetch/$1';
$route['backend/editshipmentpost']='admin/adminconfig/updateshipmentmethod';
$route['backend/shipment/delete/(:any)']='admin/adminconfig/deleteshipmentmethod/$1';
$route['backend/addpayment']='admin/adminconfig/addpaymentmethodform';
$route['backend/addpaymentpost']='admin/adminconfig/addpaymentmethod';
$route['backend/payment/edit/(:any)']='admin/adminconfig/editpaymentmethodfetch/$1';
$route['backend/editpaymentpost']='admin/adminconfig/updatepaymentmethod';
$route['backend/payment/delete/(:any)']='admin/adminconfig/deletepaymentmethod/$1';
$route['backend/orderstaus']='admin/adminconfig/orderstatusfetch';
$route['backend/orderstauspost']='admin/adminconfig/orderstatusupdate';
$route['backend/changepassword']='admin/account/changepasswordview';
$route['backend/changepasswordpost']='admin/account/changepassword';


$route['vendor/login']='admin/vendor/vendorloginview';
$route['vendor/logout']='admin/vendor/logout';
$route['vendor/dashboard']='vendor/vendor/dashboard';
$route['vendor/ordersitems']='vendor/vendor/orderitemfetch';
$route['vendor/vendorcatalog']='vendor/vendor/vendorproductfetch';
$route['vendor/productassignment/edit/(:any)']='vendor/vendor/editcatalogproductfetch/$1';
$route['vendor/updateproductassignmentpost']='vendor/vendor/updateproductassignment';
$route['vendor/productassignment/delete/(:any)']='vendor/vendor/deleteproductassignment/$1';
$route['vendor/changepassword']='vendor/vendor/changepasswordview';
$route['vendor/changepasswordpost']='vendor/vendor/changepassword';
$route['vendor/profile']='vendor/vendor/editupdatevendorfetch';

