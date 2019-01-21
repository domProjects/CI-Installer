<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Installation of CodeIgniter</title>
		<link rel="stylesheet" href="<?php echo base_url('install/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('install/main.css'); ?>">
	</head>
	<body>
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">CodeIgniter</h1>
				<p class="lead">Installing the CodeIgniter version <?php echo CI_VERSION; ?> framework step by step</p>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col">
					<ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="pills-url-tab" data-toggle="pill" href="#pills-url" role="tab" aria-controls="pills-url" aria-selected="true">Base URL</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-database-tab" data-toggle="pill" href="#pills-database" role="tab" aria-controls="pills-database" aria-selected="false">Database</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-summary-tab" data-toggle="pill" href="#pills-summary" role="tab" aria-controls="pills-summary" aria-selected="false">Summary</a>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-url" role="tabpanel" aria-labelledby="pills-url-tab">
							<div class="form-group">
								<label for="base-url">Base URL</label>
								<input class="form-control" type="text" name="base-url" id="base-url" required>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-database" role="tabpanel" aria-labelledby="pills-database-tab">
							<div class="form-group">
								<label for="db-hostname">Hostname</label>
								<input class="form-control" type="text" name="db-hostname" id="db-hostname" required>
							</div>
							<div class="form-group">
								<label for="db-name">Database Name</label>
								<input class="form-control" type="text" name="db-name" id="db-name" required>
							</div>
							<div class="form-group">
								<label for="db-user">Database User</label>
								<input class="form-control" type="text" name="db-user" id="db-user" required>
							</div>
							<div class="form-group">
								<label for="db-password">Database Password</label>
								<input class="form-control" type="text" name="db-password" id="db-password">
							</div>
						</div>
						<div class="tab-pane fade" id="pills-summary" role="tabpanel" aria-labelledby="pills-summary-tab">
							3
						</div>

						<div class="form-footer">
							<div class="container">
								<div class="row">
									<div class="col">
										<button type="button" class="btn btn-primary">Previous</button>
										<button type="button" class="btn btn-primary">Next</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="<?php echo base_url('install/jquery.slim.min.js'); ?>"></script>
		<script src="<?php echo base_url('install/bootstrap.bundle.min.js'); ?>"></script>
		<script src="<?php echo base_url('install/main.js'); ?>"></script>
	</body>
</html>