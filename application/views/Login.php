<!doctype html>
<html lang="en">
  	<head>
		<title><?=$title?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url()?>/assets/login/css/style.css">
	</head>
    <style>
    	html { 
			background-color: transparent;
			background: url(<?php echo base_url('assets/login/bg_login.png') ?>) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
 
		body{  
			background-color: transparent;
		}
	</style>
	<body>
		<section class="ftco-section" style="margin-top:-5%;">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-7 col-lg-5">
						<div class="login-wrap p-4 p-md-5">
							<div class="icon d-flex align-items-center justify-content-center" style="background-color:#915233;">
								<span class="fa fa-user-o"></span>
							</div>
							<h3 class="text-center mb-4">Login</h3>
							<form action="#" class="login-form">
								<div class="form-group">
									<select class="form-control select" aria-label="Default select example">
										<option selected disabled>Pilih Login Sebagai</option>
										<option value="1">OPD</option>
										<option value="2">BPKAD</option>
									</select>
								</div>
								<div class="form-group">
									<input type="text" class="form-control rounded-left" placeholder="Username">
								</div>
								<div class="form-group d-flex">
									<input type="password" class="form-control rounded-left" placeholder="Password">
								</div>
								<center>
									<div class="form-group">
									<button type="submit" class="btn rounded submit px-3" style="width:30%;background-color:#915233;color:#ffffff;margin-right:5%;"><span class="fa fa-sign-in"></span>&nbsp;&nbsp;&nbsp;Login</button>

									<button class="btn rounded submit px-3" style="width:30%;background-color:#915233;color:#ffffff;margin-left:5%"><a href="https://jalasemar.mojokertokab.go.id/CAwal/Pilih_menu" style="color:#ffffff"><span class="fa fa-times-circle"></span>&nbsp;&nbsp;&nbsp;Batal</a></button>
								</center>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="<?=base_url()?>/assets/login/js/jquery.min.js"></script>
		<script src="<?=base_url()?>/assets/login/js/popper.js"></script>
		<script src="<?=base_url()?>/assets/login/js/bootstrap.min.js"></script>
		<script src="<?=base_url()?>/assets/login/js/main.js"></script>
	</body>
</html>