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

 });