<section id="list">
	<?php if ( ! empty($images)): ?>
		<div id="slider">
		  <ul>
		  	<?php $i = 0; ?>
		  	<?php foreach($images as $image): ?>
		  		<?php $style = ($i == 0) ? 'display: block;' : 'display: none;' ?>
				<li style="<?php echo $style ?>">
					<img src="assets/user_images/slider/<?php echo $image ?>" height="100%" width="100%" />
					
				</li>
				<?php $i++; ?>
			<?php endforeach; ?>
		  </ul>
		</div>
	<?php endif; ?>
	
	<div class="list-item info">
		<p class="title">Welkomswoord</p>
		<p class="description"><?php echo $about['about_text'] ?></p>
	</div>

	<div class="list-item info">
		<p class="title">Social media</p>
		<p class="description">
			<a href="#" class="social facebook"><?php echo $contact['facebook'] ?></a><br />
			<a href="#" class="social twitter"><?php echo $contact['twitter'] ?></a><br />
			<a href="#" class="social linkedin"><?php echo $contact['linkedin'] ?></a><br />
		</p>
	</div>

</section>

<?php echo html::javascript('assets/js/swipe.min.js'); ?>
<script type="text/javascript">
	window.mySwipe = new Swipe(document.getElementById('slider'), {speed: 400, auto: 4000});
</script>