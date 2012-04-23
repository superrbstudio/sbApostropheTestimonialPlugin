<?php

/**
 * Description of PluginsbTestimonialsSlotEditForm
 *
 * @author Giles Smith <tech@superrb.com>
 */
class PluginsbTestimonialsSlotEditForm extends BaseForm 
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
    // ADD YOUR FIELDS HERE
    $this->setWidget('number', new sfWidgetFormInput(array(), array('size' => 2)));
    $this->setValidator('number', new sfValidatorNumber(array('min' => 1, 'max' => sfConfig::get('app_a_sbTestimonial_sbTestimonialsSlot_max', 20))));
    $this->widgetSchema->setHelp('number', '<span class="a-help-arrow"></span> Set the number of testimonials to display – ' . sfConfig::get('app_a_sbTestimonial_sbTestimonialsSlot_max', 20) . ' max.');
    if(!$this->hasDefault('number')) { $this->setDefault('number', 3); }
    
    $orders = array('updated_at' => "Last Updated", 'created_at' => "Created", 'name' => 'Person Name', 'job_title' => "Job Title", 'company_name' => 'Company Name');
    $this->setWidget('order_by', new sfWidgetFormChoice(array('choices' => $orders)));
    $this->setValidator('order_by', new sfValidatorChoice(array('choices' => array_keys($orders))));
    
    // Ensures unique IDs throughout the page. Hyphen between slot and form to please our CSS
    $this->widgetSchema->setNameFormat('slot-form-' . $this->id . '[%s]');
    
    // You don't have to use our form formatter, but it makes things nice
    $this->widgetSchema->setFormFormatterName('aAdmin');
  }
}