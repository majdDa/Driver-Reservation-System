function loginF() {
	$("#emptyLogInError").fadeOut();
    $("#logInError").fadeOut();
    $("#logInSuccess").fadeOut();
    $("#emptyTokenInError").fadeOut();
    $("#captchaError").fadeOut();
	
	var uss = $("#username").val();
    uss = $.sha256(uss);
	var pss = $("#password").val();
    pss = $.sha256(pss);
	var num = $("#num").val();
    num = $.sha256(num);
    var numm = $("#num-m").val();
    numm = $.sha256(numm);
    var token = $("#token").val();
	

	
	/////////////////////////////////////
    if (!uss.trim() || !pss.trim()) {
        $("#emptyLogInError").fadeIn();
    } else if (num != numm) {
        $("#captchaError").fadeIn();
    } else if (!token.trim()) {
        $("#emptyTokenInError").fadeIn();
    }
	else{
		        $.post("login.php", {
                uss: uss,
                pss: pss
            },
			
            function(data, status) {
                if (data == 1) {
                    $("#logInError").fadeOut();
                    $("#logInSuccess").fadeIn("slow", function() {
                        window.location = "home.php";
                    });
                } else {
                    $("#logInSuccess").fadeOut();
                    $("#logInError").fadeIn();
                }
            }
        );
		
	}
	
	
	
	
}