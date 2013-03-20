<?php
$lang = language::get();
if ($location['template'] == 'images')
	$display_icons = 'style="display:none"';
else 
	$display_images = 'style="display:none"';
?>
<?php if ( ! empty($categories)): ?>
	<?php foreach($categories as $c): ?>
		<a href="category/<?php echo $c['id'] ?>" class="item">
			<div>
				<img src="<?php echo $c['image_path'] ?>" class="item_images" <?php echo $display_images ?>>
				<img src="<?php echo $c['icon_path'] ?>" class="item_icons" <?php echo $display_icons ?>>
				<p><?php echo $c['name'][$lang] ?></p>
			</div>
		</a>
	<?php endforeach; ?>
<?php endif; ?>

<?php if ( ! empty($offers)): ?>
<a href="offers" class="item">
	<div>
		<img src="<?php echo $location['offer_image'] ?>" class="item_images" <?php echo $display_images ?>>
		<img src="<?php echo $location['offer_icon'] ?>" class="item_icons" <?php echo $display_icons ?>>
		<p>Aanbiedingen</p>
	</div>
</a>
<?php endif; ?>

<a href="info" class="item">
	<div>
		<img src="<?php echo $location['info_image'] ?>" class="item_images" <?php echo $display_images ?>>
		<img src="<?php echo $location['info_icon'] ?>" class="item_icons" <?php echo $display_icons ?>>
		<p>Informatie</p>
	</div>
</a>

<a href="contact" class="item">
	<div>
		<img src="<?php echo $location['contact_image'] ?>" class="item_images" <?php echo $display_images ?>>
		<img src="<?php echo $location['contact_icon'] ?>" class="item_icons" <?php echo $display_icons ?>>
		<p>Contact</p>
	</div>
</a>
