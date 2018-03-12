$(document).ready(function(e){
    $("#register-form").ajaxForm({
      url: "../services/create_attendant.php-scripts",
      type: "POST",
      success: function(response){
        console.log(response);
      }
    })
    
  
  
  
  });