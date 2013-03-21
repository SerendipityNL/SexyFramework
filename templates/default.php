<!DOCTYPE html>
<html lang="nl">
	<head>
		<title>Sexy Framework</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="<?php echo BASE_PATH ?>/assets/img/favicon.ico">
		<base href="<?php echo BASE_PATH ?>">
		<?php echo html::stylesheet('assets/css/bootstrap.min.css') ?>
		<?php echo html::stylesheet('assets/css/bootstrap-responsive.min.css') ?>
		<?php echo html::stylesheet('assets/css/fixes.css') ?>
		<?php echo html::javascript('assets/js/jquery.js') ?>
		<?php echo html::javascript('assets/js/bootstrap.min.js') ?>
		<?php echo html::javascript('assets/js/messages.js') ?>
	</head>
	
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<a class="brand" href="<?php echo BASE_PATH ?>">SexyFramework</a>
				<ul class="nav">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown">
							Weblogs
						</a>
						<ul class="dropdown-menu">
							<li><a href="weblog/">Manage</a></li>
							<li><a href="weblog/new">Create new</a></li>
						</ul>	
					</li>
				</ul>
			</div>
		</div>

		<div class="container">
			<?php echo $content ?>
		</div>
	</body>
</html>