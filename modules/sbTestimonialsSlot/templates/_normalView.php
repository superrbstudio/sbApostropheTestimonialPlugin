<?php use_helper('a') ?>

<?php include_partial('a/simpleEditWithVariants', array('pageid' => $pageid, 'name' => $name, 'permid' => $permid, 'slot' => $slot)) ?>

<?php if(count($testimonials) > 0): ?>
  <?php foreach($testimonials as $testimonial): ?>
    <?php include_partial('sbTestimonialSlot/testimonial', array('testimonial' => $testimonial)); ?>
  <?php endforeach; ?>
<?php endif; ?>
