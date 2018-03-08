$(document).ready(function(e){
	function displayInbox(){
		$.ajax({
			url: 'inbox.php',
			type: 'POST',
			success: function(data){
				$("#inbox").html(data);
			}
		});
	}
	function displaySentBox(){
		$.ajax({
			url: 'sentBox.php',
			type: 'POST',
			success: function(data){
				$("#sentBox").html(data);
			}
		});
	}
	setInterval(function(){displayInbox();displaySentBox();},1000);

	$("#message-sender").ajaxForm({
		url: "sendMessage.php",
		type: "post",
		success: function(response){
			console.log(response);
			if (response == "true"){
				// Get the snackbar DIV
			    $('#snackbar').text('ข้อความถูกส่งแล้ว');
			    document.getElementById('toID').value = '';
				document.getElementById('msg-box').value = '';
				document.getElementById("snackbar").style.backgroundColor ="#00cc00";
			}else if (response == "false"){
				$('#snackbar').text('User ID ไม่ถูกต้อง');
				document.getElementById("snackbar").style.backgroundColor ="red";
			}else{
				$('#snackbar').text('กรอกข้อมูลไม่ครบถ้วน');
				document.getElementById("snackbar").style.backgroundColor ="red";
			}

			var x = document.getElementById("snackbar");

		    // Add the "show" class to DIV
		    x.className = "show";

		    // After 3 seconds, remove the show class from DIV
		    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
		}
	})

	// $('#send').click(function(e) {
	// 	var toID = $('#toID').val();
	// 	var msg = $('#msg-box').val();
	// 	var file = $('#file').val();
	// 	console.log(toID, msg, file);
	// 	var formData = new FormData($("#message-sender")[0]);
	// 	console.log("formData " + FormData);
	// 	$.ajax({
	// 		url: 'sendMessage.php',
	// 		type: 'POST',
	// 		// data: {
	// 		// 	toID: toID,
	// 		// 	msg: msg,
	// 		// 	file: file
	// 		// },
	// 		data:formData,
	// 		cache: false,
 //            contentType: false,
 //            processData: false,
 //            async: false,
	// 		success: function(data){

	// 			if (data == "true"){
	// 				// Get the snackbar DIV
	// 			    $('#snackbar').text('ข้อความถูกส่งแล้ว');
	// 			    document.getElementById('toID').value = '';
	// 				document.getElementById('msg-box').value = '';
	// 				document.getElementById("snackbar").style.backgroundColor ="#00cc00";
	// 			}else if (data == "false"){
	// 				$('#snackbar').text('User ID ไม่ถูกต้อง');
	// 				document.getElementById("snackbar").style.backgroundColor ="red";
	// 			}else{
	// 				$('#snackbar').text('กรอกข้อมูลไม่ครบถ้วน');
	// 				document.getElementById("snackbar").style.backgroundColor ="red";
	// 			}
	// 			var x = document.getElementById("snackbar");

	// 		    // Add the "show" class to DIV
	// 		    x.className = "show";

	// 		    // After 3 seconds, remove the show class from DIV
	// 		    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
				
	// 		}
	// 	});



	// });

});


