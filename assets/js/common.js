jQuery( document ).ready(function() {

jQuery('#loginsubmit').click(function(){
     jQuery("#login").submit();
});

jQuery('#homecart').click(function(){
  window.location.href=URL+'cart';
});

jQuery('#login').validate({
    errorElement: "span",
    rules: {
        email: {
          email: true,
          required: true
                },
        password: {          
          required: true
                }
    },
    messages :{
      email : {
       email:"Please enter a valid email address",
       required:"Please enter a valid email address"
      }   ,
     password : "Please enter your password"     
    },
    submitHandler: function (form) {
       jQuery.ajax({
                url: URL + "login",
                type: "POST",
                data: jQuery("#login").serializeArray(),
                success: function(transport){
                 var result=JSON.parse(transport);
                  
                   if(result.status==1){
                       window.location.reload();          
                   }else{
                    jQuery('#loginerror').show();
                     setTimeout(function(){
                     jQuery("#loginerror").hide();
                     }, 3000);
                   }              
               }
              });
            
    
    }

  });


jQuery('#registersubmit').click(function(){
     jQuery("#register").submit();
});

jQuery('#register').validate({
    errorElement: "span",
    rules: {
        first_name:{
          required : true,
          minlength: 3,
        },  
        last_name:{
          required : true,
          minlength: 3,
        },        
        password: {
          required: true,
          minlength: 6,
        },
        password_conf: {
            required: true,
            equalTo: "#password"
          },
        mobile: {
          required : true,
          number : true,
          minlength: 10,
          maxlength: 10
        },        
        email: {
          required: true,
          email: true
        }     
      },
      messages: {
        first_name: {
          required: "Please enter your fullname",
          minlength: "Fullname name should have minimum three letters"
        },
        last_name: {
          required: "Please enter your fullname",
          minlength: "Fullname name should have minimum three letters"
        },        
        mobile: {
          required: "Please enter a mobile number",
          number : 'Please enter valid mobile number',
          minlength: "Please enter valid mobile number",
          maxlength : 'Please enter valid mobile number'
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long",
        }, 
        password_conf: {
          required: "Please provide a password",
          equalTo: "Your password not matching"
        },        
        email: "Please enter a valid email address"     
      },
    submitHandler: function (form) {
       jQuery.ajax({
                url: URL + "register",
                type: "POST",
                data: jQuery("#register").serializeArray(),
                success: function(transport){
                 var result=JSON.parse(transport);
                  
                   if(result.status==1){
                       window.location.reload();          
                   }else if (result.status==0) {
                    jQuery('#registererror').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                    jQuery('#registererror').show();
                     setTimeout(function(){
                     jQuery("#registererror").hide();
                     }, 3000);
                   }else{
                     jQuery('#registererror').html(result.status);
                     jQuery('#registererror').show();
                     setTimeout(function(){
                     jQuery("#registererror").hide();
                     }, 3000);
                    
                   }              
               }
              });
            
    
    }

  });



jQuery('#updateprofilebtn').click(function(){
     jQuery("#custprofile").submit();
});

jQuery('#custprofile').validate({
    errorElement: "span",
    rules: {
        first_name: {
          required: true
                },
        last_name: {          
          required: true
                },
        mobile: {
          required : true,
          number : true,
          minlength: 10,
          maxlength: 10
        }         
    },
    messages :{
      first_name : {
       required:"Please enter a valid name"
      }   ,
     last_name : "Please enter a valid name"   ,
     mobile: {
          required: "Please enter a mobile number",
          number : 'Please enter valid mobile number',
          minlength: "Please enter valid mobile number",
          maxlength : 'Please enter valid mobile number'
        }   
    },

    submitHandler: function (form) {
       jQuery.ajax({
                url: URL + "customer/account/updateprofile",
                type: "POST",
                data: jQuery("#custprofile").serializeArray(),
                success: function(transport){
                 var result=JSON.parse(transport);
                  
                    if(result.status==1){
                      jQuery('#custprofilesucessmsg').html('<strong>Oh yes!</strong> Changes Updated');
                      jQuery('#custprofilesucessmsg').show();
                       setTimeout(function(){
                       jQuery("#custprofilesucessmsg").hide();
                       }, 3000);         
                   }else if (result.status==0) {
                    jQuery('#custprofileerrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                    jQuery('#custprofileerrormsg').show();
                     setTimeout(function(){
                     jQuery("#custprofileerrormsg").hide();
                     }, 3000);
                   }else{
                     jQuery('#custprofileerrormsg').html(result.status);
                     jQuery('#custprofileerrormsg').show();
                     setTimeout(function(){
                     jQuery("#custprofileerrormsg").hide();
                     }, 3000);
                    
                   }              
               }
              });
            
    
    }

  });



jQuery('#changepassbtn').click(function(){
     jQuery("#changepass").submit();
});

jQuery('#changepass').validate({
    errorElement: "span",
    rules: {
       password_profile: {
          required: true,
          minlength: 6,
        },
        password_conf_profile: {
            required: true,
            equalTo: "#password_profile"
          }
    },
    messages :{
      password_profile: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long",
        }, 
        password_conf_profile: {
          required: "Please provide a password",
          equalTo: "Your password not matching"
        },     
    },
    submitHandler: function (form) {
       jQuery.ajax({
                url: URL + "customer/account/changepassword",
                type: "POST",
                data: jQuery("#changepass").serializeArray(),
                success: function(transport){
                 var result=JSON.parse(transport);
                  if(result.status==1){
                      jQuery('#changepasssucessmsg').html('<strong>Oh yes!</strong> Changes Updated');
                      jQuery('#changepasssucessmsg').show();
                       setTimeout(function(){
                       jQuery("#changepasssucessmsg").hide();
                       }, 3000);         
                   }else if (result.status==0) {
                    jQuery('#changepasserrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                    jQuery('#changepasserrormsg').show();
                     setTimeout(function(){
                     jQuery("#changepasserrormsg").hide();
                     }, 3000);
                   }else{
                     jQuery('#changepasserrormsg').html(result.status);
                     jQuery('#changepasserrormsg').show();
                     setTimeout(function(){
                     jQuery("#changepasserrormsg").hide();
                     }, 3000);
                    
                   }
                                
               }
              });
            
    
    }

  });


jQuery('#addaddresssubmit').click(function(){
     jQuery("#addaddress").submit();
});

jQuery('#addaddress').validate({
    errorElement: "span",
    rules: {
        add_first_name:{
          required : true,
          minlength: 3,
        },  
        add_last_name:{
          required : true,
          minlength: 3,
        },
        address_1:{
          required : true,
          minlength: 3,
        },  
        address_2:{
          required : true,
          minlength: 3,
        },
        city:{
          required : true,
          minlength: 3,
        },  
        state:{
          required : true,
          minlength: 3,
        },
        add_mobile: {
          required : true,
          number : true,
          minlength: 10,
          maxlength: 10
        },        
        pincode: {
          required: true,
          minlength: 6,
          maxlength: 6
        }     
      },
      messages: {
        add_first_name: {
          required: "Please enter your fullname",
          minlength: "Fullname name should have minimum three letters"
        },
        add_last_name: {
          required: "Please enter your fullname",
          minlength: "Fullname name should have minimum three letters"
        }, 
        address_1: {
          required: "Please enter your address",
          minlength: "Address name should have minimum three letters"
        }, 
        address_2: {
          required: "Please enter your address",
          minlength: "Address name should have minimum three letters"
        }, 
        city: {
          required: "Please enter your city",
          minlength: "City name should have minimum three letters"
        }, 
        state: {
          required: "Please enter your state",
          minlength: "State name should have minimum three letters"
        },        
        add_mobile: {
          required: "Please enter a mobile number",
          number : 'Please enter valid mobile number',
          minlength: "Please enter valid mobile number",
          maxlength : 'Please enter valid mobile number'
        },
        pincode: {
          required: "Please enter a pincode",
          number : 'Please enter valid pincode',
          minlength: "Please enter valid pincode",
          maxlength : 'Please enter valid pincode'
        }      
             
      },
    submitHandler: function (form) {
       jQuery.ajax({
                url: URL + "customer/address/add",
                type: "POST",
                data: jQuery("#addaddress").serializeArray(),
                success: function(transport){
                 var result=JSON.parse(transport);
                  
                   if(result.status==1){
                       window.location.reload();          
                   }else if (result.status==0) {
                    jQuery('#addaddresserror').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                    jQuery('#addaddresserror').show();
                     setTimeout(function(){
                     jQuery("#registererror").hide();
                     }, 3000);
                   }else{
                     jQuery('#addaddresserror').html(result.status);
                     jQuery('#addaddresserror').show();
                     setTimeout(function(){
                     jQuery("#addaddresserror").hide();
                     }, 3000);
                    
                   }              
               }
              });
            
    
    }

  });

jQuery('#editaddressbtn').click(function(){
     jQuery("#editaddress").submit();
});

jQuery('#editaddress').validate({
    errorElement: "span",
    rules: {
        add_first_name:{
          required : true,
          minlength: 3,
        },  
        add_last_name:{
          required : true,
          minlength: 3,
        },
        address_1:{
          required : true,
          minlength: 3,
        },  
        address_2:{
          required : true,
          minlength: 3,
        },
        city:{
          required : true,
          minlength: 3,
        },  
        state:{
          required : true,
          minlength: 3,
        },
        add_mobile: {
          required : true,
          number : true,
          minlength: 10,
          maxlength: 10
        },        
        pincode: {
          required: true,
          minlength: 6,
          maxlength: 6
        }     
      },
      messages: {
        add_first_name: {
          required: "Please enter your fullname",
          minlength: "Fullname name should have minimum three letters"
        },
        add_last_name: {
          required: "Please enter your fullname",
          minlength: "Fullname name should have minimum three letters"
        }, 
        address_1: {
          required: "Please enter your address",
          minlength: "Address name should have minimum three letters"
        }, 
        address_2: {
          required: "Please enter your address",
          minlength: "Address name should have minimum three letters"
        }, 
        city: {
          required: "Please enter your city",
          minlength: "City name should have minimum three letters"
        }, 
        state: {
          required: "Please enter your state",
          minlength: "State name should have minimum three letters"
        },        
        add_mobile: {
          required: "Please enter a mobile number",
          number : 'Please enter valid mobile number',
          minlength: "Please enter valid mobile number",
          maxlength : 'Please enter valid mobile number'
        },
        pincode: {
          required: "Please enter a pincode",
          number : 'Please enter valid pincode',
          minlength: "Please enter valid pincode",
          maxlength : 'Please enter valid pincode'
        }      
             
      },
    submitHandler: function (form) {
       jQuery.ajax({
                url: URL + "customer/account/updateaddress",
                type: "POST",
                data: jQuery("#editaddress").serializeArray(),
                success: function(transport){
                 var result=JSON.parse(transport);
                  
                   if(result.status==1){
                       window.location=URL+'customer/account#parentHorizontalTab3';         
                   }else if (result.status==0) {
                    jQuery('#editaddresserrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                    jQuery('#editaddresserrormsg').show();
                     setTimeout(function(){
                     jQuery("#editaddresserrormsg").hide();
                     }, 3000);
                   }else{
                     jQuery('#editaddresserrormsg').html(result.status);
                     jQuery('#editaddresserrormsg').show();
                     setTimeout(function(){
                     jQuery("#editaddresserrormsg").hide();
                     }, 3000);
                    
                   }              
               }
              });
            
    
    }

  });

jQuery(document).on("click", ".value-plus", function() {  
     formid=jQuery(this).attr("rowid");
    var values = {};
      jQuery.each(jQuery('#'+formid).serializeArray(), function(i, field) {        
         
          values[field.name] = field.value;        
          
         
      });
      values['qty']=1;
         

    jQuery.ajax({
                url: URL + "checkout/cart/updateproduct",
                type: "POST",
                data: values,
                success: function(transport){
                 var result=JSON.parse(transport);
                  
                   if(result.status==1){
                         window.location.reload();        
                   }else if (result.status==0) {
                    jQuery('#carterrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                    jQuery('#carterrormsg').show();
                     setTimeout(function(){
                     jQuery("#carterrormsg").hide();
                     }, 3000);
                   }else{
                     jQuery('#carterrormsg').html(result.status);
                     jQuery('#carterrormsg').show();
                     setTimeout(function(){
                     jQuery("#carterrormsg").hide();
                     }, 3000);
                    
                   }              
               }
              });
    
});

jQuery(document).on("click", ".value-minus", function() {  
    formid=jQuery(this).attr("rowid");
    var values = {};
      jQuery.each(jQuery('#'+formid).serializeArray(), function(i, field) {
          values[field.name] = field.value;        
          
      });
       values['qty']=1;
        values['flag']=1;

    jQuery.ajax({
                url: URL + "checkout/cart/deleteproduct",
                type: "POST",
                data: values,
                success: function(transport){
                 var result=JSON.parse(transport);
                  
                   if(result.status==1){
                         window.location.reload();        
                   }else if (result.status==0) {
                    jQuery('#carterrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                    jQuery('#carterrormsg').show();
                     setTimeout(function(){
                     jQuery("#carterrormsg").hide();
                     }, 3000);
                   }else{
                     jQuery('#carterrormsg').html(result.status);
                     jQuery('#carterrormsg').show();
                     setTimeout(function(){
                     jQuery("#carterrormsg").hide();
                     }, 3000);
                    
                   }              
               }
              });
    
});

jQuery(document).on("click", ".close1", function() {  
    formid=jQuery(this).attr("rowid");
    var values = {};
      jQuery.each(jQuery('#'+formid).serializeArray(), function(i, field) {
          values[field.name] = field.value;
      });
        values['flag']=0;

    jQuery.ajax({
                url: URL + "checkout/cart/deleteproduct",
                type: "POST",
                data: values,
                success: function(transport){
                 var result=JSON.parse(transport);
                  
                   if(result.status==1){
                         window.location.reload();        
                   }else if (result.status==0) {
                    jQuery('#carterrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                    jQuery('#carterrormsg').show();
                     setTimeout(function(){
                     jQuery("#carterrormsg").hide();
                     }, 3000);
                   }else{
                     jQuery('#carterrormsg').html(result.status);
                     jQuery('#carterrormsg').show();
                     setTimeout(function(){
                     jQuery("#carterrormsg").hide();
                     }, 3000);
                    
                   }              
               }
              });
    
});


jQuery(document).on("click", ".value-minus", function() {  
    formid=jQuery(this).attr("rowid");
    var values = {};
      jQuery.each(jQuery('#'+formid).serializeArray(), function(i, field) {
          values[field.name] = field.value;        
          
      });
       values['qty']=1;
        values['flag']=1;

    jQuery.ajax({
                url: URL + "checkout/cart/deleteproduct",
                type: "POST",
                data: values,
                success: function(transport){
                 var result=JSON.parse(transport);
                  
                   if(result.status==1){
                         window.location.reload();        
                   }else if (result.status==0) {
                    jQuery('#carterrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                    jQuery('#carterrormsg').show();
                     setTimeout(function(){
                     jQuery("#carterrormsg").hide();
                     }, 3000);
                   }else{
                     jQuery('#carterrormsg').html(result.status);
                     jQuery('#carterrormsg').show();
                     setTimeout(function(){
                     jQuery("#carterrormsg").hide();
                     }, 3000);
                    
                   }              
               }
              });
    
});

jQuery('#placeorder').click(function(){
  jQuery("#checkout").submit();
});

jQuery('#checkout').validate({

    errorElement: "span",
    rules: {
        payment: {
          required: true
                },
        shipping: {          
          required: true
                }
    },
    messages :{
      payment : {
       required:"Please enter a valid name"
      }   ,
     shipping : "Please enter a valid name"       
    },

    submitHandler: function (form) {
       jQuery.ajax({
                url: URL + "placeorder",
                type: "POST",
                data: jQuery("#checkout").serializeArray(),
                success: function(transport){
                 var result=JSON.parse(transport);                  
                    if(result.status==1){
                      jQuery('#checkoutsucessmsgs').html('<strong>Oh yes!</strong> Order Placed');
                      jQuery('#checkoutsucessmsgs').show();
                       jQuery('#checkout')[0].reset();
                       setTimeout(function(){
                       jQuery("#checkoutsucessmsgs").hide();
                       }, 8000);         
                       window.location.href=URL;
                   }else if (result.status==0) {
                    jQuery('#checkouterrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                    jQuery('#checkouterrormsg').show();
                     setTimeout(function(){
                     jQuery("#checkouterrormsg").hide();
                     }, 3000);
                   }else{
                     jQuery('#checkouterrormsg').html(result.status);
                     jQuery('#checkouterrormsg').show();
                     setTimeout(function(){
                     jQuery("#checkouterrormsg").hide();
                     }, 3000);
                    
                   }              
               }
              });
            
    
    }

});

jQuery('#addresssubmit').click(function(){
     jQuery("#cartaddress").submit();
});

jQuery('#cartaddress').validate({
    errorElement: "span",
    rules: {
        add_first_name:{
          required : true,
          minlength: 3,
        },  
        add_last_name:{
          required : true,
          minlength: 3,
        },
        address_1:{
          required : true,
          minlength: 3,
        },  
        address_2:{
          required : true,
          minlength: 3,
        },
        city:{
          required : true,
          minlength: 3,
        },  
        state:{
          required : true,
          minlength: 3,
        },
        add_mobile: {
          required : true,
          number : true,
          minlength: 10,
          maxlength: 10
        },        
        pincode: {
          required: true,
          minlength: 6,
          maxlength: 6
        }     
      },
      messages: {
        add_first_name: {
          required: "Please enter your fullname",
          minlength: "Fullname name should have minimum three letters"
        },
        add_last_name: {
          required: "Please enter your fullname",
          minlength: "Fullname name should have minimum three letters"
        }, 
        address_1: {
          required: "Please enter your address",
          minlength: "Address name should have minimum three letters"
        }, 
        address_2: {
          required: "Please enter your address",
          minlength: "Address name should have minimum three letters"
        }, 
        city: {
          required: "Please enter your city",
          minlength: "City name should have minimum three letters"
        }, 
        state: {
          required: "Please enter your state",
          minlength: "State name should have minimum three letters"
        },        
        add_mobile: {
          required: "Please enter a mobile number",
          number : 'Please enter valid mobile number',
          minlength: "Please enter valid mobile number",
          maxlength : 'Please enter valid mobile number'
        },
        pincode: {
          required: "Please enter a pincode",
          number : 'Please enter valid pincode',
          minlength: "Please enter valid pincode",
          maxlength : 'Please enter valid pincode'
        }      
             
      },
    submitHandler: function (form) {
       jQuery.ajax({
                url: URL + "customer/address/add",
                type: "POST",
                data: jQuery("#cartaddress").serializeArray(),
                success: function(transport){
                 var result=JSON.parse(transport);
                  
                   if(result.status==1){
                            
                     jQuery('.cartsuccess').show();
                     setTimeout(function(){
                     jQuery(".cartsuccess").hide();
                     }, 3000);        
                   }else if (result.status==0) {
                    jQuery('#carterrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                    jQuery('#carterrormsg').show();
                     setTimeout(function(){
                     jQuery("#carterrormsg").hide();
                     }, 3000);
                   }else{
                     jQuery('#carterrormsg').html(result.status);
                     jQuery('#carterrormsg').show();
                     setTimeout(function(){
                     jQuery("#carterrormsg").hide();
                     }, 3000);
                    
                   }              
               }
              });
            
    
    }

  });

jQuery('#applycoupon').click(function(){
  jQuery("#cartcoupon").submit();
});

jQuery('#cartcoupon').validate({

    errorElement: "span",
    rules: {
        coupon_code: {
          required: true
                }
        
    },
    messages :{
      coupon_code : {
       required:"Please enter a coupon code"
      }        
    },

    submitHandler: function (form) {
       jQuery.ajax({
                url: URL + "couponpost",
                type: "POST",
                data: jQuery("#cartcoupon").serializeArray(),
                success: function(transport){
                 var result=JSON.parse(transport);                  
                    if(result.status==1){
                      jQuery('#checkoutsucessmsgs1').html('<strong>Oh yes!</strong>  Coupon Code Apply');
                      jQuery('#checkoutsucessmsgs1').show();
                       setTimeout(function(){
                       jQuery("#checkoutsucessmsgs1").hide();
                       }, 3000);         
                        window.location.reload(); 
                   }else if (result.status==0) {
                    jQuery('#checkouterrormsg1').html('<strong>Oh snap!</strong> Wrong Coupon Code');
                    jQuery('#checkouterrormsg1').show();
                     setTimeout(function(){
                     jQuery("#checkouterrormsg1").hide();
                     }, 3000);
                   }else{
                     jQuery('#checkouterrormsg1').html(result.status);
                     jQuery('#checkouterrormsg1').show();
                     setTimeout(function(){
                     jQuery("#checkouterrormsg1").hide();
                     }, 3000);
                    
                   }              
               }
              });
            
    
    }

});


jQuery('#btncontact').click(function(){
     jQuery("#contactus").submit();
});

jQuery('#contactus').validate({
    errorElement: "span",
    rules: {
        name: {
          required: true
                },
        subject: {          
          required: true
                },
        email: {
          required : true,
          email : true
           
        } ,
        message:{
          required : true,
          maxlength:255
        }       
    },
    messages:{
      name : {
       required:"Please enter a valid name"
      }  ,
       subject : "Please enter a valid subject"   ,
     email: {
          required: "Please enter a email number",
          email : 'Please enter valid email number'
        } ,
      message:{
        required: "Please enter a message",
          maxlength : 'Please enter message less then 255'
      }   
    },

    submitHandler: function (form) {
       jQuery.ajax({
                url: URL + 'contactus/contactuspost',
                type: "POST",
                data: jQuery("#contactus").serializeArray(),
                success: function(transport){
                 var result=JSON.parse(transport);
                  
                    if(result.status==1){
                      jQuery('#custprofilesucessmsg').html('<strong>Oh yes!</strong> Detail submitted');
                      jQuery('#custprofilesucessmsg').show();
                       setTimeout(function(){
                       jQuery("#custprofilesucessmsg").hide();
                       }, 3000);         
                   }else if (result.status==0) {
                    jQuery('#custprofileerrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                    jQuery('#custprofileerrormsg').show();
                     setTimeout(function(){
                     jQuery("#custprofileerrormsg").hide();
                     }, 3000);
                   }else{
                     jQuery('#custprofileerrormsg').html(result.status);
                     jQuery('#custprofileerrormsg').show();
                     setTimeout(function(){
                     jQuery("#custprofileerrormsg").hide();
                     }, 3000);
                    
                   }              
               }
              });
            
    
    }

  });





});

