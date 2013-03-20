<?php $lang = language::get(); ?>

<?php if ( ! empty($categories)): ?>
	<?php foreach($categories as $c): ?>
		<a href="category/<?php echo $c['id'] ?>" class="list-item">
			<div>
				<p class="title">
					<?php echo $c['name'][$lang] ?>
				</p>
			</div>
		</a>
	<?php endforeach; ?>
<?php endif; ?>

<?php if ( ! empty($products)): ?>
	<?php foreach ($products as $p): ?>
		<?php $class = ($p['offer'] == 1) ? 'offer' : '' ?>
		<a href="product/<?php echo $p['id'] ?>" class="list-item <?php echo $class ?>">
			<div>
				<p class="title">
					<?php echo $p['name'][$lang] ?><span><?php echo price($p['price']) ?></span>
				</p>
				<p class="description">
					<?php echo $p['description'][$lang] ?>
				</p>
			</div>
		</a>
	<?php endforeach; ?>
<?php endif; ?>

<!-- substr($p['description'],0,75) -->

<!--
<pre>
<?php print_r($categories) ?>
</pre>

<pre>
<?php print_r($products) ?>
</pre>
-->