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

		<form method="post" action="<?php echo $site_url; ?>" accept-charset="utf-8">
			<main>
				<div class="container">
					<div class="card">
						<div class="card-body">



<h3>File .htaccess</h3>
<p>File exist: <?php echo $htaccess_exist; ?></p>
<p>File create: <?php echo $htaccess_create; ?></p>
<p>File write: <?php echo $htaccess_write; ?></p>

<h3>File config.php</h3>
<p>File exist: <?php echo $config_exist; ?></p>
<p>File write: <?php echo $config_write; ?></p>

<h3>File database.php</h3>
<p>File exist: <?php echo $db_exist; ?></p>
<p>File write: <?php echo $db_write; ?></p>



						</div>
					</div>
				</div>
			</main>
			<footer class="d-flex align-items-center">
				<div class="container d-flex justify-content-end">
					<a href="javascript:history.go(-1)" class="btn btn-primary btn-lg">Previous</a>
				</div>
			</footer>
		</form>

		<script src="<?php echo $site_url; ?>/install/jquery.min.js"></script>
		<script src="<?php echo $site_url; ?>/install/bootstrap.bundle.min.js"></script>
		<script src="<?php echo $site_url; ?>/install/main.js"></script>
	</body>
</html>