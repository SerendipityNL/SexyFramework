<!DOCTYPE html>
<html lang="nl">
	<head>
		<title>Sexy Framework</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="<?php echo BASE_PATH ?>/assets/img/favicon.ico">
		<base href="<?php echo BASE_PATH ?>">
		<?php echo html::stylesheet('assets/css/default.css') ?>
		<?php echo html::javascript('assets/js/jquery.js') ?>
		<?php echo html::javascript('assets/js/bootstrap.min.js') ?>
		<?php echo html::javascript('assets/js/messages.js') ?>
	</head>
	
	<body>
		<div id="container">
			<?php echo $content ?>
		</div>
	</body>
</html>