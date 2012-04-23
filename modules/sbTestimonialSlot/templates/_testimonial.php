<?php $testimonial = isset($testimonial) ? $sf_data->getRaw('testimonial') : null; ?>
<?php if($testimonial): ?>
<blockquote class="sb-testimonial">
	<p class="sb-testimonial-quote">"<?php echo $testimonial['testimonial']; ?>"</p>
	<cite>
		<span class="sb-testimonial-name"><?php echo $testimonial['name']; ?></span>
		<span class="sb-testimonial-title"><?php echo $testimonial['job_title']; ?></span>
		<span class="sb-testimonial-company"><?php echo $testimonial['company_name']; ?></span>
	</cite>
</blockquote>
<?php endif; ?>