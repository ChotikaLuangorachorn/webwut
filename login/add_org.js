$(document).ready(function(e){
  $("#register-form").ajaxForm({
    url: "../services/create_organizer.php",
    type: "POST",
    success: function(response){
      if (response == 0) {
        window.location.replace("../organizer/homepage.php");
      }
      if (response == 1) {
        $('#error-box').html('Please fill data!!')
      }
      if (response == 2) {
        $('#error-box').html('Username and email has already !!')
      }
      if (response == 3) {
        $('#error-box').html('The confirm password does not match password')
      }
    }
  })




});
