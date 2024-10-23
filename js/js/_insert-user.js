function insert_user() {
	var emp_name = $("#emp_name").val();
	var emp_num = $("#emp_num").val();
	var emp_id = $("#emp_id").val();
	var username = $("#username").val();
	var password = $("#password").val();
	var email = $("#email").val();

	var regEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2})+$/;
	var validEmail = regEx.test(email);

	if (emp_name == '' || emp_num == '' || emp_id == '' || username == '' || password == '' || email == '') {
		$("#alert_danger").fadeIn();
		setTimeout(function () {
			$("#alert_danger").fadeOut();
		}, 1500);
		return false;
	}

	//Name Validation
	if (emp_name.length < 6) {
		$("#alert_danger1").fadeIn();
		setTimeout(function () {
			$("#alert_danger1").fadeOut();
		}, 1500);
		return false;
	}

	//Mobile validation
	if (!emp_num.match('[0-9]{9}')) {
		$("#alert_danger2").fadeIn();
		setTimeout(function () {
			$("#alert_danger2").fadeOut();
		}, 1500);
		return false;
	}
	//ID validation
	if (!emp_id.match('[0-9]')) {
		$("#alert_danger3").fadeIn();
		setTimeout(function () {
			$("#alert_danger3").fadeOut();
		}, 1500);
		return false;
	}
	//USERNAME Validation
	if (username.length < 6) {
		$("#alert_danger4").fadeIn();
		setTimeout(function () {
			$("#alert_danger4").fadeOut();
		}, 1500);
		return false;
	}

	//Password validation
	if (password.length < 8) {
		$("#alert_danger5").fadeIn();
		setTimeout(function () {
			$("#alert_danger5").fadeOut();
		}, 1500);
		return false;
	}
	//email validation
	if (!validEmail) {
		$("#alert_danger6").fadeIn();
		setTimeout(function () {
			$("#alert_danger6").fadeOut();
		}, 1500);
		return false;
	}

	//return true;
	else {
		$.ajax({
			url: "_Action/_CreateUser.php",
			method: "POST",
			data: {
				emp_name: emp_name,
				emp_num: emp_num,
				emp_id: emp_id,
				username: username,
				password: password,
				email: email
			},
			dataType: "html",
			async: false,
			crossDomain: true,
			success: function (data) {
				if (data == 0) {
					$("#error").fadeIn();
					setTimeout(function () {
						$("#error").fadeOut();
					}, 1500);

				}
				if (data == 1) {
					$("#alert_success").fadeIn();
					setTimeout(function () {
						$("#alert_success").fadeOut();
					}, 1500);
					setTimeout(function () {
						window.location = "create_user.php";
					}, 2000);
				}

			}
		});
	}

}