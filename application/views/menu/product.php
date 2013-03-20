<?php $lang = $_COOKIE['lang']; ?>

<?php if ( ! empty($p)): ?>
	<div id="product-item">
		<div>
			<p class="title"><?php echo $p['name'][$lang] ?><span><?php echo price($p['price']) ?></span></p>
			<p class="description"><?php echo $p['description'][$lang] ?></p>
		</div>

		<?php if (file_exists('assets/user_images/products/'.$p['id'].'.jpeg')): ?>
			<div style="width: 300px">
				<img src="assets/user_images/products/<?php echo $p['id'] ?>.jpeg" style="width: 100%" />
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>