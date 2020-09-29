<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="description" content=""/>
	<meta name="author" content=""/>
	<title>ARK - PPN | Login</title>
	
		
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="{{ asset('login_v9/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('login_v9/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('login_v9/fonts/iconic/css/material-design-iconic-font.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('login_v9/vendor/animate/animate.css') }}">	
		<link rel="stylesheet" type="text/css" href="{{ asset('login_v9/vendor/css-hamburgers/hamburgers.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('login_v9/vendor/animsition/css/animsition.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('login_v9/vendor/select2/select2.min.css') }}">	
		<link rel="stylesheet" type="text/css" href="{{ asset('login_v9/vendor/daterangepicker/daterangepicker.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('login_v9/css/util.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('login_v9/css/main.css') }}">

	</head>

	<body>
	<!-- Start wrapper-->
	<div id="wrapper">
		<div class="container-login100" style="background-image: url('login_v9/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">

				<form action="{{ route('login') }}" method="POST" class="login100-form validate-form">
					@csrf
					<span class="login100-form-title p-b-37">
						Sign In
					</span>
					<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
						<input type="text" name="username" id="exampleInputUsername" class="input100" placeholder="Username or email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
						<input type="password" name="password" id="exampleInputPassword" class="input100" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">Sign In</button>
					</div>
				</form>
			</div>
		</div>
			
			<script src="{{ asset('login_v9/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
			<script src="{{ asset('login_v9/vendor/animsition/js/animsition.min.js') }}"></script>
			<script src="{{ asset('login_v9/vendor/bootstrap/js/popper.js') }}"></script>
			<script src="{{ asset('login_v9/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
			<script src="{{ asset('login_v9/vendor/select2/select2.min.js') }}"></script>
			<script src="{{ asset('login_v9/vendor/daterangepicker/moment.min.js') }}"></script>
			<script src="{{ asset('login_v9/vendor/daterangepicker/daterangepicker.js') }}"></script>
			<script src="{{ asset('login_v9/vendor/countdowntime/countdowntime.js') }}"></script>
			<script src="{{ asset('login_v9/js/main.js') }}"></script>
	
	</body>
</html>
