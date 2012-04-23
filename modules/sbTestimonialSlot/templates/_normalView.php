<?php use_helper('a') ?>

<?php if ($editable): ?>
<?php include_partial('a/simpleEditWithVariants', array('pageid' => $pageid, 'name' => $name, 'permid' => $permid, 'slot' => $slot)) ?>
<?php endif; ?>

<?php if (!is_null($testimonial)): ?>
<?php include_partial('sbTestimonialSlot/testimonial', array('testimonial' => $testimonial)); ?>
<?php endif ?>
