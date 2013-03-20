
<section id="list">
		
	<div class="list-item buttons">
		<a class="phone" href="tel:<?php echo $contact['phone'] ?>">Direct bellen</a>
		<a class="email" href="mailto:<?php echo $contact['email'] ?>">Email sturen</a>
		<p class="email-text"><?php echo $contact['email'] ?></p>
		<p class="phone-text"><?php echo $contact['phone'] ?></p>
	</div>

	<div class="list-item adress">
	<p class="title">Adres</p>
		<p class="description"><?php echo $address['street'] ?></p>
		<p class="description"><?php echo $address['postal_code'] ?></p>
		<p class="description"><?php echo $address['city'] ?></p>
		</br>
		<p class="description">Website: <?php echo $contact['website'] ?></p>
		<p class="description">Fax: <?php echo $contact['fax'] ?></p>
		<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="position:relative; right:0;" src="https://maps.google.nl/maps?q=<?php echo $address['street'] . '+' . $address['postal_code'] . '+' . $address['city']?>&amp;ie=UTF8&amp;hl=nl&amp;output=embed"></iframe>

	</div>
	
	<div class="list-item">
			</div>

	<div class="list-item info">
		<p class="title">Openingstijden</p>
		<p class="description">
			<table>
				<tbody>
					<tr>
						<td><?php echo ut('monday') ?></td>
						<td><?php echo $open['monday'] ?></td>
					</tr>
					<tr>
						<td><?php echo ut('tuesday') ?></td>
						<td><?php echo $open['tuesday'] ?></td>
					</tr>
					<tr>
						<td><?php echo ut('wednesday') ?></td>
						<td><?php echo $open['wednesday'] ?></td>
					</tr>
					<tr>
						<td><?php echo ut('thursday') ?></td>
						<td><?php echo $open['thursday'] ?></td>
					</tr>
					<tr>
						<td><?php echo ut('friday') ?></td>
						<td><?php echo $open['friday'] ?></td>
					</tr>
					<tr>
						<td><?php echo ut('saterday') ?></td>
						<td><?php echo $open['saterday'] ?></td>
					</tr>
					<tr>
						<td><?php echo ut('sunday') ?></td>
						<td><?php echo $open['sunday'] ?></td>
					</tr>
				</tbody>
			</table>
		</p>
	</div>
		
</section>
