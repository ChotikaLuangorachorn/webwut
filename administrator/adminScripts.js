$(document).ready(function(e){
	showAllOrganizer();
	$('#show-attendant').hide();
	$('#show-event').hide();
// Organizer
	$('#btn-show-organizer').click(function(e) {
		$('#show-event').hide();
		$('#show-attendant').hide();
		$('#show-organizer').show();

		showAllOrganizer();
	})
	function showAllOrganizer(){
		$.ajax({
			url: 'organizerList.php',
			type: 'POST',
			dataType:"json",
			success: function(organizer){
				tbody = $("tbody.organizer-list");
				tbody.empty();
				organizer.forEach(row=>{
					console.log(row);
					// td1 = "<td scope='row' style='text-align: center;'>" + row.id + "</td>";
					// td2 = "<td scope='row'>" + row.userID + "</td>";
					// td3 = "<td scope='row'>" + row.orgName + "</td>";
					// td4 = "<td scope='row'>" + row.email + "</td>";
					// td5 = "<td scope='row'>" + row.phoneNo + "</td>";
					// $('.organizer-list').append("<tr id='list'>"+td1+td2+td3+td4+td5+"</tr>");
					tr = tbody.append("<tr id='list'></tr>").children().last();
					tr.append("<td scope='row' style='text-align: center;'>" + row.id + "</td>");
					tr.append("<td scope='row'>" + row.userID + "</td>");
					tr.append("<td scope='row'>" + row.orgName + "</td>");
					tr.append("<td scope='row'>" + row.email + "</td>");
					tr.append("<td scope='row'>" + row.phoneNo + "</td>");
					tr.click(function(){
						onSelectOrganizerRow(row.id,row.userID,row.orgName,row.email,row.phoneNo);
					})
				});
			}
		});
	}
	// edit
	function onSelectOrganizerRow(id,userName,orgName,email,phone){
		document.getElementById('form-edit-organizer').style.display='block';
		$("#id-edit1").text(id);
		$("#userID-edit1").text(userName);
		$("#orgName-edit1").val(orgName);
		$("#email-edit1").val(email);
		$("#phone-edit1").val(phone);
	}
	$('#cancel-edit-organizer').click(function(e) {
		console.log("cancel");
		document.getElementById('form-edit-organizer').style.display='none';
	})
	$('#confirm-edit-organizer').click(function(e) {
		var id = $('#id-edit1').text();
		var orgName = $('#orgName-edit1').val();
		var email = $('#email-edit1').val();
		var phone = $('#phone-edit1').val();
		console.log("id>",id);
		console.log("email>",email);
		$.ajax({
			url: "updateOrganizer.php",
			type: "POST",
			data: {
				id: id,
				orgName: orgName,
				email: email,
				phone: phone
			},
			success: function(response){
				console.log("success");
				console.log(response);
				document.getElementById('form-edit-organizer').style.display='none';
				showAllOrganizer();
			},error: function(r){
				console.log("error");
				console.log(r);
			}
		})
		})


	// add
	document.getElementById('form-add-organizer').style.display='none';
	$('#btn-add-organizer').click(function(e) {
		document.getElementById('form-add-organizer').style.display='block';
	})
	$('#cancel-add-organizer').click(function(e) {
		console.log("cancel");
		document.getElementById('form-add-organizer').style.display='none';
	})
	$('#confirm-add-organizer').click(function(e) {
		console.log("add");
		console.log($("#organizer-adding-form"));
		// $("#organizer-adding-form").ajaxForm({
		// url: "addOrganizer.php",
		// type: "POST",
		// success: function(response){
		// 	console.log("success");
		// 	console.log(response);
		// 	document.getElementById('form-add-organizer').style.display='none';
		// 	showAllOrganizer();
		// },error: function(r){
		// 	console.log("error");
		// 	console.log(r);
		// }
		// })
		var userID = $('#userID').val();
		var pwd = $('#pwd').val();
		var orgName = $('#orgName').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		$.ajax({
			url: "addOrganizer.php",
			type: "POST",
			data: {
				userID: userID,
				pwd: pwd,
				orgName: orgName,
				email: email,
				phone: phone
			},
			success: function(response){
				console.log("success");
				console.log(response);
				document.getElementById('form-add-organizer').style.display='none';
				showAllOrganizer();
			},error: function(r){
				console.log("error");
				console.log(r);
			}
		})
	})

	


// Attendant
	$('#btn-show-attendant').click(function(e) {
		$('#show-organizer').hide();
		$('#show-event').hide();
		$('#show-attendant').show();
		showAllAttendant();
	})

	function showAllAttendant(){
		$.ajax({
			url: 'attendantList.php',
			type: 'POST',
			dataType:"json",
			success: function(attendant){
				tbody = $("tbody.attendant-list");
				tbody.empty();
				attendant.forEach(row=>{
					console.log(row);
					td1 = "<td scope='row' style='text-align: center;'>" + row.id + "</td>";
					td2 = "<td scope='row'>" + row.userID + "</td>";
					td3 = "<td scope='row'>" + row.firstName + "</td>";
					td4 = "<td scope='row'>" + row.lastName + "</td>";
					td5 = "<td scope='row'>" + row.email + "</td>";
					td6 = "<td scope='row' style='text-align: center;'>" + row.age + "</td>";
					td7 = "<td scope='row'>" + row.phoneNo + "</td>";
					td8 = "<td scope='row'>" + row.gender + "</td>";
					tr = tbody.append("<tr id='list'></tr>").children().last();
					tr.append(td1);
					tr.append(td2);
					tr.append(td3);
					tr.append(td4);
					tr.append(td5);
					tr.append(td6);
					tr.append(td7);
					tr.append(td8);

					// $('.attendant-list').append("<tr id='list'>"+td1+td2+td3+td4+td5+td6+td7+td8+"</tr>");
					tr.click(function(){
						onSelectAttendantRow(row.id,row.userID,row.firstName,row.lastName,row.email,row.age,row.phoneNo);
					})
				});
			}
		});
	}
	// edit
	function onSelectAttendantRow(id,userName,firstName,lastName,email,age,phone){
		document.getElementById('form-edit-attendant').style.display='block';
		$("#id-edit2").text(id);
		$("#userID-edit2").text(userName);
		$("#firstName-edit2").val(firstName);
		$("#lastName-edit2").val(lastName);
		$("#email-edit2").val(email);
		$("#age-edit2").val(age);
		$("#phone-edit2").val(phone);
	}
	$('#cancel-edit-attendant').click(function(e) {
		console.log("cancel");
		document.getElementById('form-edit-attendant').style.display='none';
	})
	$('#confirm-edit-attendant').click(function(e) {
		var id = $('#id-edit2').text();
		var firstName = $('#firstName-edit2').val();
		var lastName = $('#lastName-edit2').val();
		var email = $('#email-edit2').val();
		var age = $('#age-edit2').val();
		var phone = $('#phone-edit2').val();
		console.log("id>",id);
		console.log("email>",email);
		$.ajax({
			url: "updateAttendant.php",
			type: "POST",
			data: {
				id: id,
				firstName: firstName,
				lastName: lastName,
				email: email,
				age: age,
				phone: phone
			},
			success: function(response){
				console.log("success");
				console.log(response);
				document.getElementById('form-edit-attendant').style.display='none';
				showAllAttendant();
			},error: function(r){
				console.log("error");
				console.log(r);
			}
		})
		})

	// add
	document.getElementById('form-add-attendant').style.display='none';
	$('#btn-add-attendant').click(function(e) {
		document.getElementById('form-add-attendant').style.display='block';
	})
	$('#cancel-add-attendant').click(function(e) {
		console.log("cancel");
		document.getElementById('form-add-attendant').style.display='none';
	})
	$('#confirm-add-attendant').click(function(e) {
		var userID = $('#userID2').val();
		var pwd = $('#pwd2').val();
		var fName = $('#fName2').val();
		var lName = $('#lName2').val();
		console.log("pwd:",pwd2);
		var age = $('#age2').val();
		var email = $('#email2').val();
		var phone = $('#phone2').val();
		if (document.getElementById('male2').checked) {
			var gender = document.getElementById('male2').value;
		}
		else{
			var gender = document.getElementById('female2').value;
		}
		$.ajax({
			url: "addAttendant.php",
			type: "POST",
			data: {
				userID: userID,
				pwd: pwd,
				fName: fName,
				lName: lName,
				age: age,
				email: email,
				phone: phone,
				gender: gender
			},
			success: function(response){
				console.log("success");
				console.log(response);
				document.getElementById('form-add-attendant').style.display='none';
				showAllAttendant();
			},error: function(r){
				console.log("error");
				console.log(r);
			}
		})
	})


// Event
	$('#btn-show-event').click(function(e) {
		$('#show-organizer').hide();
		$('#show-attendant').hide();
		$('#show-event').show();

		showAllEvent();
		
	})
	function showAllEvent(){
		$.ajax({
			url: 'eventList.php',
			type: 'POST',
			dataType:"json",
			success: function(event){
				console.log(event);
				tbody = $("tbody.event-list");
				tbody.empty();
				event.forEach(row=>{
					console.log(row);
					// day = row.date.slice(8, 10);
					// month = row.date.slice(5, 7);
					// year = row.date.slice(0, 4);
					// hour = row.date.slice(11, 13);
					// minute = row.date.slice(14, 16);
			        formatDay= moment(row.date).format('DD/MM/YYYY H:mm');
					tr = tbody.append("<tr id='list'></tr>").children().last();
					tr.append("<td scope='row' style='text-align: center;'>" + row.eventID + "</td>");
					tr.append("<td scope='row' style='text-align: center;'>" +formatDay+ "</td>");
					tr.append("<td scope='row'>" + row.eventName + "</td>");
					tr.append("<td scope='row'>" + row.location + "</td>");
					tr.append("<td scope='row' style='text-align: right;'>" + row.capacity + "</td>");
					tr.append("<td scope='row' style='text-align: right;'>" + row.price + "</td>");
					tr.append("<td scope='row'>" + row.type + "</td>");
					tr.append("<td scope='row'>" + row.orgName + "</td>");
				});
			}
		});
	}

});


