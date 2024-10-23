<?php
session_start();
header('X-Content-Type-Options: nosniff');
header('Content-Type: text/html; charset=UTF-8');
header('X-Permitted-Cross-Domain-Policies: none');
header('Referrer-Policy: origin');

error_reporting(1);


if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
}
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
}
//echo $_SESSION['csrf_token'];
?>
<!DOCTYPE html>
<html>

<head>

    <head>
        <meta charset="utf-8" />
        <meta content="IE=edge" http-equiv="X-UA-Compatible" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <title>Rand | Driver interface</title>
        <link href="./img/rand.png" rel="shortcut icon" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="css/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/css/Lato.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/css/Montserrat.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/css/styles.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/jquery.toast.css">
        <!--===============================================================================================-->
    </head>

<body>
    <div class="container-fluid h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img class="brand_logo" src="images/rand.png">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form id="form" method="post" name="form">
                        <h2>
                            <font color="#581845">&nbsp; &nbsp;Driver interface</font>
                        </h2>
                        <hr />
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <input id="username" class="form-control input_user" name="username"
                                placeholder="Username..." required="" type="text">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-key" aria-hidden="true"></i></span>
                            </div>
                            <input id="password" class="form-control input_pass" name="password"
                                placeholder="Password..." required="" autocomplete="on" type="password">
                        </div>
                        <!------------------------------------------------------------------->
                        <?php $rand = rand(1000, 9999); ?>
                        <div class="input-group ">
                            <label>Type The Following Number : <strong><?php echo $rand; ?></strong></label>
                        </div>
                        <!------------------------------------------------------------------->
                        <div class="form-group mb-2">
                            <input id="num" class="form-control input_code" placeholder="Number Here .." required=""
                                type="text">
                            <input id="num-m" style="display:none" class="form-control" required="" type="text"
                                value="<?php echo $rand; ?>">
                            <input id="token" style="display:none" class="form-control" required="" type="text"
                                value="<?php echo $_SESSION['csrf_token']; ?>">
                        </div>
                        <!------------------------------------------------------------------->
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button id="login" class="btn btn-outline-danger" name="button" type="button"
                                onclick="loginF()">
                                Login</button>
                        </div>
                        <hr />
                        <!------------------------------------------------------------------->
                        <div class=" form-group" id="logInSuccess">
                            <div class="alert-success form-control text-center">
                                <a aria-label="close" class="close" data-dismiss="alert" href="#">&times;</a>
                                <strong>Congratulations ! </strong> Login Done
                            </div>
                        </div>
                        <!------------------------------------------------------------------->
                        <div class="form-group" id="logInError">
                            <div class="alert-danger form-control text-center">
                                <a aria-label="close" class="close" data-dismiss="alert" href="#">&times;</a>Erorr in
                                <strong>Username </strong>Or <strong>Password </strong> !!
                            </div>
                        </div>
                        <!------------------------------------------------------------------->
                        <div class="form-group" id="captchaError">
                            <div class="alert-danger form-control text-center">
                                <a aria-label="close" class="close" data-dismiss="alert" href="#">&times;</a>
                                <strong>Error ! </strong>Incorrect Number
                            </div>
                        </div>
                        <!------------------------------------------------------------------->
                        <div class="form-group" id="emptyLogInError">
                            <div class="alert-danger form-control text-center">
                                <a aria-label="close" class="close" data-dismiss="alert" href="#">&times;</a>
                                <strong>Error !</strong>
                            </div>
                        </div>
                        <!------------------------------------------------------------------->
                    </form>
                </div>
            </div>




        </div>

    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <footer class="footer">
                <div style="background:#581845" class="text-center">
                    <img src="images/rand.png" width="25" height="25" class="d-inline-block align-top">
                    <span class="text-muted"><a href="mailto:Rand-ITSupport@rand.sy" style="color:#FFF3F8">&copy;
                            2020-2021 Created By
                            Rand IT support</a></span>
                </div>
            </footer>
        </div>
    </div>

    <!--===============================================================================================-->
    <script type="text/javascript" src="js/js/jquery-3.5.1.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="js/js/bootstrap.min.js?v=4.4.1"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="js/js/tether.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="js/js/popper.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="js/js/moment.min.js"></script>
    <!--===============================================================================================-->
    <script type="application/javascript" src="js/script.js"></script>
    <!--===============================================================================================-->
    <script type="application/javascript" src="js/jquery.sha.256.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="js/jquery.toast.js"></script>
    <!--===============================================================================================-->
    <script>
    $(document).keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            loginF();
        }
    });
    </script>
</body>

</html>