<?php

/**
 * Description of PluginsbTestimonialSlotEditForm
 *
 * @author Giles Smith <tech@superrb.com>
 */
class PluginsbTestimonialSlotEditForm extends BaseForm 
{
  // Ensures unique IDs throughout the page
  protected $id;
  public function __construct($id, $defaults = array(), $options = array(), $CSRFSecret = null)
  {
    $this->id = $id;
    parent::__construct($defaults, $options, $CSRFSecret);
  }
  public function configure()
  { 
    // A simple example: a slot with a single 'text' field with a maximum length of 100 characters
    $this->setWidgets(array('testimonial_id' => new sfWidgetFormDoctrineChoice(array('model' => 'sbTestimonial', 'method' => 'getTitle',))));
    $this->setValidators(array('testimonial_id' => new sfValidatorDoctrineChoice(array('model' => 'sbTestimonial'))));
    
    // Ensures unique IDs throughout the page. Hyphen between slot and form to please our CSS
    $this->widgetSchema->setNameFormat('slot-form-' . $this->id . '[%s]');
    
    // You don't have to use our form formatter, but it makes things nice
    $this->widgetSchema->setFormFormatterName('aAdmin');
  }
}