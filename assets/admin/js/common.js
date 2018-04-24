jQuery( document ).ready(function() {

jQuery('#loginsubmit').click(function(){
     jQuery("#login").submit();
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
                url: URL + "admin/account/adminlogin",
                type: "POST",
                data: jQuery("#login").serializeArray(),
                success: function(transport){
                 var result=JSON.parse(transport);
                  
                   if(result.status==1){
                       window.location.href=URL+'dashboard';          
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

 jQuery('#addproduct').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/addproductpost",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,       
                    cache: false,             
                    processData:false, 
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                         jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });

 

  jQuery('#editproduct').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/editproductpost",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,       
                    cache: false,             
                    processData:false, 
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                         jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });
 
 jQuery('#addproductassignment').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/addproductassignmentpost",
                    type: "POST",
                    data: jQuery("#addproductassignment").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });   

  jQuery('#editproductassignment').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/editproductassignmentpost",
                    type: "POST",
                    data: jQuery("#editproductassignment").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });   

jQuery('#addpromotion').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/addpromotionpost",
                    type: "POST",
                    data: jQuery("#addpromotion").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    }); 


jQuery('#editpromotion').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/editpromotionpost",
                    type: "POST",
                    data: jQuery("#editpromotion").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });         


jQuery('#addvendor').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/addvendorpost",
                    type: "POST",
                    data: jQuery("#addvendor").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });  

jQuery('#editvendor').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/editpromotionpost",
                    type: "POST",
                    data: jQuery("#editvendor").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });  


jQuery('#addadminuser').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/addadminuserpost",
                    type: "POST",
                    data: jQuery("#addadminuser").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });

jQuery('#editadminuser').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/editaddadminuserpost",
                    type: "POST",
                    data: jQuery("#editadminuser").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });


jQuery('#addshipment').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/addshipmentpost",
                    type: "POST",
                    data: jQuery("#addshipment").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });
jQuery('#editshipment').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/editshipmentpost",
                    type: "POST",
                    data: jQuery("#editshipment").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });

jQuery('#addpayment').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/addpaymentpost",
                    type: "POST",
                    data: jQuery("#addpayment").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });

jQuery('#editpayment').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/editpaymentpost",
                    type: "POST",
                    data: jQuery("#editpayment").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });

jQuery('#orderstatuschange').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/orderstauspost",
                    type: "POST",
                    data: jQuery("#orderstatuschange").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Changed successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });

jQuery('#chgpwd').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "backend/changepasswordpost",
                    type: "POST",
                    data: jQuery("#chgpwd").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });

/** vendor js **/
jQuery('#vendorloginsubmit').click(function(){
     jQuery("#vendorlogin").submit();
});

jQuery('#vendorlogin').validate({
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
                url: URL + "admin/vendor/vendorlogin",
                type: "POST",
                data: jQuery("#vendorlogin").serializeArray(),
                success: function(transport){
                 var result=JSON.parse(transport);
                  
                   if(result.status==1){
                       window.location.href=URL+'vendor/dashboard';          
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

jQuery('#editvendorproduct').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "vendor/updateproductassignmentpost",
                    type: "POST",
                    data: jQuery("#editvendorproduct").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });



jQuery('#vchgpwd').on('submit', function(e){  
    e.preventDefault();

    jQuery.ajax({
                    url: URL + "vendor/changepasswordpost",
                    type: "POST",
                    data: jQuery("#vchgpwd").serializeArray(),
                    success: function(transport){
                     var result=JSON.parse(transport);

                       if(result.status==1){
                        jQuery('#addsucessmsg').html('Added successfully');
                         jQuery('#addsucessmsg').show();
                         setTimeout(function(){
                         jQuery("#addsucessmsg").hide();
                         }, 3000);           
                       }else if (result.status==0) {
                        jQuery('#adderrormsg').html('<strong>Oh snap!</strong> Change a few things up and try submitting again.');
                        jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                       }else{
                         jQuery('#adderrormsg').html(result.status);
                         jQuery('#adderrormsg').show();
                         setTimeout(function(){
                         jQuery("#adderrormsg").hide();
                         }, 3000);
                        
                       }          

                   }
                });


    });


 });



