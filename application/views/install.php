<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Installation of CodeIgniter</title>
		<link rel="stylesheet" href="<?php echo $site_url; ?>/install/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $site_url; ?>/install/main.css">
	</head>
	<body>
		<header class="d-flex align-items-center">
			<div class="container">
				<h1 class="display-4">CodeIgniter</h1>
				<p class="lead">Installing the CodeIgniter version <?php echo CI_VERSION; ?> framework step by step</p>
			</div>
		</header>

		<form action="" method="post" accept-charset="utf-8">
			<main>
				<div class="container">
					<div class="card">
						<div class="card-body p-0">
							<fieldset class="p-3">
								<label class="w-100 p-3 font-weight-bold text-uppercase">Base URL</label>
								<p class="mb-4 font-weight-bold">You must enter the address of your site where CodeIgniter will be executed. By default, the installation script detects this one.</p>
								<div class="form-group row">
									<label for="base-url" class="col-sm-3 col-form-label">Base URL</label>
									<div class="col-sm-9">
										<input class="form-control" type="text" name="base-url" id="base-url" value="<?php echo $site_url; ?>" aria-describedby="base-url-help" required>
										<small id="base-url-help" class="form-text">Address of your site.</small>
									</div>
								</div>
							</fieldset>
							<fieldset class="p-3">
								<label class="w-100 p-3 font-weight-bold text-uppercase">Database</label>
								<p class="mb-4 font-weight-bold">You must enter the login details for your database below. If you do not know them, contact your host.</p>
								<div class="form-group row">
									<label for="db-hostname" class="col-sm-3 col-form-label">Address of the database</label>
									<div class="col-sm-9">
										<input class="form-control" type="text" name="db-hostname" id="db-hostname" value="localhost" aria-describedby="db-hostname-help" required>
										<small id="db-hostname-help" class="form-text">If <code>localhost</code> does not work, ask this information to the host of your site.</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="db-login" class="col-sm-3 col-form-label">Login</label>
									<div class="col-sm-9">
										<input class="form-control" type="text" name="db-login" id="db-login" aria-describedby="db-login-help" required>
										<small id="db-login-help" class="form-text">Username of your database.</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="db-password" class="col-sm-3 col-form-label">Password</label>
									<div class="col-sm-9">
										<input class="form-control" type="text" name="db-password" id="db-password" aria-describedby="db-password-help">
										<small id="db-password-help" class="form-text">Your database password.</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="db-name" class="col-sm-3 col-form-label">Name of the database</label>
									<div class="col-sm-9">
										<input class="form-control" type="text" name="db-name" id="db-name" aria-describedby="db-name-help" required>
										<small id="db-name-help" class="form-text">The name of the database with which you want to use CodeIgniter.</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="db-prefix" class="col-sm-3 col-form-label">Prefix of tables</label>
									<div class="col-sm-9">
										<input class="form-control" type="text" name="db-prefix" id="db-prefix" value="ci_" aria-describedby="db-prefix-help" required>
										<small id="db-prefix-help" class="form-text">If you want to run multiple installations of CodeIgniter on the same database, change this setting.</small>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
			</main>
			<footer class="d-flex align-items-center">
				<div class="container d-flex justify-content-end">
					<button type="button" class="btn btn-primary btn-lg">Next</button>
				</div>
			</footer>
		</form>

		<script src="<?php echo $site_url; ?>/install/jquery.slim.min.js"></script>
		<script src="<?php echo $site_url; ?>/install/bootstrap.bundle.min.js"></script>
		<script src="<?php echo $site_url; ?>/install/main.js"></script>
	</body>
</html>