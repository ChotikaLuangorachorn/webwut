$(document).ready(function(e){
  $("#register-form").ajaxForm({
    url: "../services/create_organizer.php",
    type: "POST",
    success: function(response){
      console.log(response);
    }
  })
  



});