<!DOCTYPE html>
<html lang="nl">
	<head>
		<title>Menukaarten 0.6</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="<?php echo BASE_PATH ?>/assets/img/favicon.ico">
		<base href="<?php echo BASE_PATH ?>">
		<?php echo html::stylesheet('assets/css/dashboard.css') ?>
		<?php echo html::stylesheet('assets/css/lightbox.css') ?>
		<?php echo html::stylesheet('assets/css/tabs.css') ?>
		<?php echo html::javascript('assets/js/jquery.js') ?>
		<?php echo html::javascript('assets/js/messages.js') ?>
	</head>
	
	<body id="main">
		<div id="header-wide">

			<div id="header" class="clearfix">

				<div id="title">
					<div id="title-inner">
						<?php html::a('cms', 'Dashboard menukaarten 0.6') ?>
					</div>
				</div>

				<div id="user">
					<div id="user-inner">
						Welkom,
						<a class="bold" href="cms/profile">
							<?php echo $_SESSION['firstname'].' '.$_SESSION['lastname'] ?>
						</a>
						(<?php html::a('logout', 'uitloggen') ?>)
					</div>
				</div>
				
			</div>

		</div>

		<div id="container-wide">

			<div id="container" class="clearfix">

				<div id="menu">

					<div id="navigation">
						<ul>
							<?php $menu_items = json_decode(file_get_contents('assets/menu.json')); ?>
							<?php foreach($menu_items as $m): ?>
								<?php if (user::role($m->min_role)): ?>
									<?php $class = ('cms/'.get('page') == $m->location) ? $m->class.' active' : $m->class ?>
									<li class="<?php echo $class ?>">
										<?php html::a($m->location, $m->name) ?>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>

				</div>
				
				<div id="content">
					<div id="content-inner">
						<!-- RENDER CONTENT -->
						<?php echo $content; ?>
						<!-- RENDER CONTENT -->
					</div>

				</div>
				
			</div>

		</div>
		
		<div id="footer-wide">
			Copyright &copy; 2012
		</div>
		
		<div id="lightbox_overlay">
			<div id="lightbox_inner">
				<!-- <a href="#" id="lightbox_close_link" onClick="closeLightbox()">Sluiten</a> -->
				<div id="lightbox_content"></div>
			</div>
		</div>
		<script type="text/javascript">
			$('.tabbable .nav-tabs li a').click(function(e){
				e.preventDefault();
				$('.tabbable .nav-tabs .active-tab').removeClass('active-tab');
				$(this).parent('li').addClass('active-tab');
				var target = $(this).attr('href');
				$('.tab-content .tab-pane').removeClass('active-tab');
				$(''+target+'').addClass('active-tab');
			});
		</script>
	</body>
</html>