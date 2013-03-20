<!DOCTYPE html>
<html lang="nl">
	<head>
		<title>Menukaarten 0.6</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="<?php echo BASE_PATH ?>/assets/img/favicon.ico">
		<?php echo html::javascript('assets/js/jquery.js') ?>
		<?php echo html::stylesheet('assets/css/dashboard.css') ?>
		<?php echo html::stylesheet('assets/css/login.css') ?>
	</head>
	
	<body id="main">
		<div id="login_container">
			<div id="login_content">
				<?php echo $content ?>
			</div>
		</div>
	</body>

</html>