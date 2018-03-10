$(document).ready(function(e){
    $("#register-form").ajaxForm({
      url: "create_attendant.php",
      type: "POST",
      success: function(response){
        console.log(response);
      }
    })
    
  
  
  
  });