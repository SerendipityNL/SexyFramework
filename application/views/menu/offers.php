<?php $lang = language::get(); ?>
<?php if ( ! empty($products)): ?>
	<?php foreach($products as $p): ?>
		<a href="product/<?php echo $p['id'] ?>" class="list-item offer">
			<div>
				<p class="title">
					<?php echo $p['name'][$lang] ?><span><?php echo $p['price'] ?></span>
				</p>
				<p class="description">
					<?php echo $p['description'][$lang] ?>
				</p>
			</div>
		</a>
	<?php endforeach; ?>
<?php endif; ?>
