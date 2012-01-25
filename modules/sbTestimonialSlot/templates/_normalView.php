<?php use_helper('a') ?>

<?php if ($editable): ?>
<?php include_partial('a/simpleEditWithVariants', array('pageid' => $pageid, 'name' => $name, 'permid' => $permid, 'slot' => $slot)) ?>
<?php endif; ?>

<?php if (!is_null($testimonial)): ?>
<blockquote class="sb-testimonial">
	<p class="sb-testimonial-quote">"<?php echo $testimonial->getTestimonial(); ?>"</p>
	<cite>
		<span class="sb-testimonial-name"><?php echo $testimonial->getName(); ?></span>
		<span class="sb-testimonial-title"><?php echo $testimonial->getJobTitle(); ?></span>
		<span class="sb-testimonial-company"><?php echo $testimonial->getCompanyName(); ?></span>
	</cite>
</blockquote>
<?php endif ?>
