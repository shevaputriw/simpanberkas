<!doctype html>
<html lang="en">
  	<head>
		<title><?=$title?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" type="image/x-icon" href="<?=base_url()?>assets/awal/logo_kab.png" />
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url()?>/assets/login/css/style.css">
	</head>
    <style>
    	html { 
			background-color: transparent;
			background: url(<?php echo base_url('assets/awal/login.png') ?>) no-repeat center center fixed; 
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
		<!-- <section class="ftco-section" style="margin-top:-6%;margin-bottom:-100%;"> -->
			<div class="container" style="margin-top:5%;">
				<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-7 col-lg-5">
						<div class="login-wrap p-4 p-md-5" style="background-color:#000000;background-color: rgba(0, 0, 0, 0);border: 7px solid white;border-radius:30px;">
							<div class="icon d-flex align-items-center justify-content-center" style="margin-top:-10px;background-color:#ffffff;width:130px;height:130px;">
								<span><img src="<?=base_url()?>assets/awal/logo_kab.png" style="width:80px;height:110px;"></span>
							</div>
							<h4 class="text-center mb-4" style="color:#ffffff;"><b>NAMA APLIKASI</b></h4>
							<form action="<?=base_url()?>Login/proses_login" class="login-form" style="margin-bottom:-20px;" method="post">
								<div class="form-group">
									<!-- <select class="form-control select" aria-label="Default select example" style="height:40px;">
										<option selected disabled style="text-align:center;">Pilih Login Sebagai</option>
										<option value="1" style="text-align:center;">One</option>
										<option value="2" style="text-align:center;">Two</option>
										<option value="3" style="text-align:center;">Three</option>
									</select> -->
                                    <select class="form-control select" aria-label="Default select example" style="height:40px;" name="level">
                                        <option value="" selected="true" disabled="disabled">- Pilih Login Sebagai -</option>
                                        <?php foreach($level as $l) : ?>
                                            <option value="<?=$l['level'];?>"><?=$l['level'];?></option>
                                        <?php endforeach;?>
                                    </select>
								</div>
								<div class="form-group">
									<input type="text" class="form-control rounded-left" placeholder="Username" style="text-align:center;height:40px;" name="username" autocomplete="off">
								</div>
								<div class="form-group d-flex">
									<input type="password" class="form-control rounded-left" placeholder="Password" style="text-align:center;height:40px;" name="password" autocomplete="off">
								</div>
								<br>
								<center>
									<div class="form-group">
									<button type="submit" class="btn rounded submit px-3" style="width:40%;background-color:#ffffff;color:#000000;margin-right:5%;"><span class="fa fa-sign-in"></span>&nbsp;&nbsp;&nbsp;Login</button>

									<button type="button" class="btn rounded submit px-3" style="width:40%;background-color:#ffffff;color:#000000;margin-left:5%"><a href="https://jalasemar.mojokertokab.go.id/CAwal/Pilih_menu" style="color:#000000"><span class="fa fa-times-circle"></span>&nbsp;&nbsp;&nbsp;Batal</a></button>
								</center>
								</div>
							</form>
						</div>
					</div>
				</div>
				</div>
			</div>
		<!-- </section> -->

		<script src="<?=base_url()?>/assets/login/js/jquery.min.js"></script>
		<script src="<?=base_url()?>/assets/login/js/popper.js"></script>
		<script src="<?=base_url()?>/assets/login/js/bootstrap.min.js"></script>
		<script src="<?=base_url()?>/assets/login/js/main.js"></script>
	</body>
</html>