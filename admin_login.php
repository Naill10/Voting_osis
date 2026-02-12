<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V18</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest_login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assest_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest_login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assest_login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assest_login/css/main.css">
<!--===============================================================================================-->
</head>


<style>
    /* BACKGROUND LUAR */
body {
    background: linear-gradient(135deg, #005bea, #ff8c00);
}

/* KARTU LOGIN */
.wrap-login100 {
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.25);
}

/* JUDUL */
.login100-form-title {
    color: #005bea;
    font-weight: bold;
}

/* INPUT */
.input100 {
    border-bottom: 2px solid #ccc;
}

.input100:focus {
    border-bottom: 2px solid #ff8c00;
}

/* LABEL INPUT */
.label-input100 {
    color: #005bea;
}

/* TOMBOL LOGIN */
.login100-form-btn {
    background: linear-gradient(to right, #005bea, #ff8c00);
    color: white;
    border-radius: 25px;
    transition: 2s;
}
.login100-form-btn {
    background: linear-gradient(135deg, #005bea, #ff8c00);
    border-radius: 25px;
    color: #fff;
    position: relative;
    overflow: hidden;
    transition: all 0.4s ease;
}

/* efek glow + glossy */
.login100-form-btn::before {
    content: "";
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.35), transparent 60%);
    opacity: 0;
    transition: opacity 0.4s ease;
}

/* HOVER */
.login100-form-btn:hover {
    background: linear-gradient(135deg, #ff8c00, #005bea);
    transform: scale(1.05);
    box-shadow: 0 0 20px rgba(0,91,234,0.6),
                0 0 30px rgba(255,140,0,0.6);
}

/* glow muncul */
.login100-form-btn:hover::before {
    opacity: 1;
}


/* CHECKBOX */
.label-checkbox100::before {
    border: 2px solid #005bea;
}

.input-checkbox100:checked + .label-checkbox100::before {
    background-color: #ff8c00;
    border-color: #ff8c00;
}

/* LINK */
.txt1, .txt2 {
    color: #005bea;
    transition: 2s ease;
}

.txt1:hover {
    color: #ff8c00;
    transition: 5s ease;
}

/* POSISI FORM KE TENGAH */
.container-login100 {
    justify-content: center;
    align-items: center;
}

/* GAMBAR SAMPING */
.login100-more {
    background-size: cover;
    background-position: center;
}

</style>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST"
				action="proseslog_admin.php" autocomplete="off">
					<span class="login100-form-title p-b-43 ">
						Login to Vote
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid username is required">
						<input class="input100" type="text" name="username" required>
						<span class="focus-input100"></span>
						<span class="label-input100">username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('assest_login/images/vote.png');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="assest_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assest_login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assest_login/vendor/bootstrap/js/popper.js"></script>
	<script src="assest_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assest_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assest_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assest_login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assest_login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assest_login/js/main.js"></script>

</body>
</html>
