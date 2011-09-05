<ul>
	<?php foreach($testimonials as $testimonial): ?>
	<li>
		<h2><?php echo $testimonial['name']; ?> - <?php echo $testimonial['job_title']; ?>, <?php echo $testimonial['company_name']; ?></h2>
		<p><?php echo $testimonial['testimonial']; ?></p>
	</li>
	<?php endforeach; ?>
</ul>
