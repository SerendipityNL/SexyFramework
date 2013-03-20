<!DOCTYPE html>

<html>
<head>

	<meta charset="utf-8" />
	<title><?php echo $location['name'] ?></title>
	<link rel="shortcut icon" href="favicon.ico" />
	<base href="<?php echo BASE_PATH ?>" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes" />
	<meta name="description" content="Dit is de menukaart van restaurant La Fleurie." />
	<?php html::stylesheet('assets/css/menu.css') ?>
	<?php html::stylesheet('assets/templates/'.$location['template'].'/css/style.css', array("id" => "template-selector")) ?>
	<?php html::stylesheet('assets/themes/'.$location['theme'].'/css/style.css', array("id" => "theme-selector")) ?>
	<?php html::javascript('assets/js/jquery.js') ?>
	<?php html::javascript('assets/js/menu.js') ?>
	<?php html::javascript('assets/js/jquery.fittext.js') ?>
	
	<script type="text/javascript">
		$("#fittext1").fitText();
		$("#fittext2").fitText(1.2);
		$("#fittext3").fitText(1.1, { minFontSize: 50, maxFontSize: '75px' });
	</script>
	
	
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
</head>

<body id="index">

	<?php if (user::role(1)): ?>
	<div id="theme-selector">
		<div>
			<div id="template">
				<p>Kies layout</p>
				<?php foreach (array('icons', 'images') as $template): ?>
					<?php $class = ($location['template'] == $template) ? 'selected' : ''; ?>
					<a href="#<?php echo $template ?>" class="<?php echo $class ?>" style="background-image: url(assets/img/menu/preview_<?php echo $template ?>.png);"><?php echo $template ?></a>
				<?php endforeach; ?>
			</div>
			<div id="theme">

				<p>Kies thema</p>
				<?php if ( ! empty($themes)): ?>
					<?php foreach ($themes as $theme): ?>
							<?php $class = ($location['theme'] == $theme) ? 'selected' : ''; ?>
							<a href="#<?php echo $theme ?>" style="background: url(assets/themes/<?php echo $theme ?>/img/header.png);" class="<?php echo $class ?>">
								<?php echo $theme ?>
							</a>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<div id="publish">
				<a href="logout" id="logout">Log out</a>
				<a href="cms/compose" class="dashboard">Dashboard</a>
				<a href="#customize" id="customize">Customize</a><br />

				<?php echo form::open('cms/settings/set_theme') ?>
					<?php echo form::hidden("template", $location['template'], array("id" => "template-option")) ?>
					<?php echo form::hidden("theme", $location['theme'], array("id" => "theme-option")) ?>
					<?php echo form::submit("Publish", array("class" => "publish")) ?>
				<?php echo form::close() ?>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<header>
	
		<section>
			<h1 id="fittext3"><a href="<?php echo BASE_PATH ?>"><?php echo $location['name'] ?></a></h1>
		</section>
	</header>

	<div id="menu">
		<section>
			<ul id="options">
				<li><a href="#" id="language_toggle">Change Language</a>
					<ul id="language_select" style="display:none">
						<li><a href="change_language/NL">Nederlands</a></li>
						<li><a href="change_language/EN">Engels</a></li>
						<li><a href="change_language/DE">Duits</a></li>
						<li><a href="change_language/FR">Frans</a></li>
					</ul>
				</li>
				<li><a href="http://www.menukaarten.nl/" target="_blank">Over menukaarten.nl</a></li>
			</ul>
			<a class="toggler" href="#toggle">Menu</a>
			
			<div id=""></div>

			<form id="search">
				<button type="submit"><span></span>Zoeken</button>
				<input type="text" placeholder="Zoeken..." id="search_term" />
			</form>
			
		</section>
	</div>


	<section>
	
	<div id="search_results">
	</div>
	
	<div id="content">
		<?php echo $content ?>
		
	</div>
		
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#language_toggle').click(function(e) {
				e.preventDefault();
				$('#language_select').slideToggle();
			});
		});
		
	</script>
	<?php html::javascript('assets/js/search.js') ?>
	
		

</body>
</html>