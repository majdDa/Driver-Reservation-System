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
    document.form.uss.focus();
  } else if (num != numm) {
    $("#captchaError").fadeIn();
  } else if (!token.trim()) {
    $("#emptyTokenInError").fadeIn();
  } else {
    $.post(
      "_Action/login.php",
      {
        uss: uss,
        pss: pss,
        token: token,
      },
      function (data, status) {
        if (data == 1) {
          $("#logInError").fadeOut();
          $("#logInSuccess").fadeIn("slow", function () {
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

function update_password() {
  var curpass = $("#curpass").val();
  //curpass = $.sha256(curpass);
  var newpass = $("#newpass").val();
  // newpass = $.sha256(newpass);
  var confnew = $("#confnew").val();
  // confnew = $.sha256(confnew);

  if (curpass == "") {
    Empty_curpass_Error();
    document.form.curpass.focus();
  } else if (newpass == "") {
    Empty_newpass_Error();
    document.form.newpass.focus();
  } else if (confnew == "") {
    document.form.confnew.focus();
    Empty_confnew_Error();
    // window.setTimeout(function () {  window.location = "change_pass.php."; }, 3000);
  } else if (document.form.newpass.value != document.form.confnew.value) {
    match_error();
    document.form.confnew.focus();
  } else {
    $.post(
      "change_password.php",
      {
        curpass: curpass,
        newpass: newpass,
      },
      function (data, status) {
        if (data == 1) {
          // alert(newpass);
          Success();
          window.setTimeout(function () {
            window.location = "index.php";
          }, 5000);
        } else {
        }
      }
    );
  }
}
/////////////////// Error Toast ////////////////////
function Empty_curpass_Error() {
  $.toast({
    heading: "Current Password Filed is Empty !!",
    text: "",
    //textAlign: 'center'
    showHideTransition: "slide",
    position: "top-center",
    icon: "error",
    hideAfter: 5000,
  });
}
function Empty_newpass_Error() {
  $.toast({
    heading: "New Password Filed is Empty !!",
    text: "",
    showHideTransition: "slide",
    position: "top-center",
    icon: "error",
    hideAfter: 5000,
  });
}
function Empty_confnew_Error() {
  $.toast({
    heading: "Confirm Password Filed is Empty !!",
    text: "",
    showHideTransition: "slide",
    position: "top-center",
    icon: "error",
    hideAfter: 5000,
  });
}
function match_error() {
  $.toast({
    heading: "Password and Confirm Password Field do not match !!",
    text: "",
    showHideTransition: "slide",
    position: "top-center",
    icon: "error",
    hideAfter: 5000,
  });
}
function Error() {
  $.toast({
    heading: "Error .. Try Again !!",
    text: "",
    //textAlign: 'center'
    showHideTransition: "slide",
    position: "top-center",
    icon: "error",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
    hideAfter: 5000,
  });
}
/////////////////// Success Toast ////////////////////
function Success() {
  $.toast({
    heading: " Password Reset !!",
    text: "Your Password has been reset Successfully ",
    textAlign: "center",
    showHideTransition: "slide",
    position: "top-center",
    icon: "success",
    hideAfter: 5000,
  });
}
