<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>myLPU Clinic | 404 Page Not Found</title>

	<!-- Webapp Icon -->
	<link rel="icon" href="<?= base_url('assets/images/appicon.png') ?>" type="image/png" sizes="16x16">
	<!-- External CSS -->
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
	<!-- AdminLTE Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/AdminLTE-3.1.0-rc/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition layout-top-nav layout-fixed" id="page-top">
	<!-- Content Wrapper. Contains page content -->
	<div class="wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<!-- Navbar -->
			<nav class="navbar navbar-light py-3 fixed-top" style="background-color: #a62d38;">
				<div class="container">
					<a href="<?= site_url('dashboard') ?>" class="navbar-brand">
						<img src="<?= base_url('assets/images/navlogo.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="">
						<span class="brand-text font-weight-bold text-light">myLPU Clinic</span>
					</a>
				</div>
			</nav><br><br><br>
			<!-- /.navbar -->
		</section>

		<!-- Main content -->
		<section class="content mx-4">
			<div class="error-page">
				<h2 class="headline text-danger"> 404</h2>

				<div class="error-content">
					<h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Page not found.</h3>

					<p>
						We could not find the page you were looking for.
						The link may be broken, or the page may have been removed.
						Check to see if the link you're trying to open is correct.
						<br><br><a href="#null" onclick="javascript:history.back ();">Go back to previous page</a>
						| <a href="<?= site_url('dashboard') ?>">Return to dashboard</a>
					</p>
				</div>
				<!-- /.error-content -->
			</div>
			<!-- /.error-page -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- Footer -->
	<footer class="row main-footer fixed-bottom justify-content-center" style="text-align: center;">
		<div> <strong>Copyright &copy;<?= date('Y') ?></strong>
			All rights reserved.
		</div>
		<div>
			<span class="mr-1 ml-1" style="font-size: 9pt;"><a href="<?= site_url('terms') ?>">Terms & Conditions</a></span>
			<span class="mr-1 ml-1" style="font-size: 9pt;"><a href="<?= site_url('privacy') ?>">Privacy Policy</a></span>
			<span class="mr-1 ml-1" style="font-size: 9pt;"><a href="<?= site_url('help') ?>">Help</a></span>
			<br>
		</div>
	</footer>
	<!-- Footer -->



	<!-- jQuery -->
	<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('assets/AdminLTE-3.1.0-rc/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>