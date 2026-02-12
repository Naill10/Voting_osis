<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V18</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assest_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assest_login/css/main.css">
<!--===============================================================================================-->
</head>
<style>/* ===============================
   GLASSMORPHISM + GLOW STYLE
================================*/

body {
    background: linear-gradient(135deg, #667eea, #764ba2) !important;
}

.wrap-login100 {
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    box-shadow: 0 0 40px rgba(0,0,0,0.4);
    overflow: hidden;
}

/* Title */
.login100-form-title {
    font-size: 32px;
    letter-spacing: 2px;
    color: #fff;
    text-shadow: 0 0 10px rgba(255,255,255,0.4);
}

/* Input box */
.wrap-input100 {
    border-bottom: 2px solid rgba(255,255,255,0.3);
}

.input100 {
    color: #000000;
}

.label-input100 {
    color: rgba(255,255,255,0.6);
}

/* Focus glow */
.wrap-input100:focus-within {
    border-bottom: 2px solid #00fff7;
    box-shadow: 0 0 12px rgba(0,255,247,0.6);
}

/* Button */
.login100-form-btn {
    background: linear-gradient(45deg, #00fff7, #6a11cb);
    border-radius: 50px;
    font-size: 18px;
    letter-spacing: 1px;
    box-shadow: 0 0 20px rgba(0,255,247,0.6);
    transition: 0.3s ease;
}



.login100-form-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 0 30px rgba(106,17,203,0.8);
}

/* Social icons */
.login100-form-social-item {
    border-radius: 50%;
    transition: 0.3s ease;
}

.login100-form-social-item:hover {
    transform: rotate(10deg) scale(1.2);
    box-shadow: 0 0 15px rgba(255,255,255,0.7);
}

/* Right image glow */
.login100-more {
    position: relative;
}

.login100-more::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(0,255,247,0.3), rgba(106,17,203,0.4));
}
/* Ganti semua teks putih jadi gelap */
.login100-form-title {
    color: #222 !important;
    text-shadow: none;
}

.input100 {
    color: #222 !important;
}

.label-input100 {
    color: #555 !important;
}

.txt1, .txt2, .label-checkbox100 {
    color: #444 !important;
}

/* Placeholder saat fokus */
.input100::placeholder {
    color: #888;
}

/* Border input lebih soft */
.wrap-input100 {
    border-bottom: 2px solid rgba(0,0,0,0.2);
}

.wrap-input100:focus-within {
    border-bottom: 2px solid #6a11cb;
    box-shadow: 0 0 10px rgba(106,17,203,0.4);
}


/* Remember + link */
.label-checkbox100, .txt1, .txt2 {
    color: rgba(255,255,255,0.8);
}
</style>

<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST"
				action="proses_login.php" autocomplete="off">
					<span class="login100-form-title p-b-43 ">
						Login to Vote
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid username is required">
						<input class="input100" type="text" name="username" required>
						<span class="focus-input100"></span>
						<span class="label-input100">username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass">
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
	<script src="assets/vendor/animsition/js/animsition.min.js"></script>
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
