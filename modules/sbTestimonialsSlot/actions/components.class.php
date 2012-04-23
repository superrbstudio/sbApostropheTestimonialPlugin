<?php
class sbTestimonialsSlotComponents extends aSlotComponents
{
  public function executeEditView()
  {
    // Must be at the start of both view components
    $this->setup();
    
    // Careful, don't clobber a form object provided to us with validation errors
    // from an earlier pass
    if (!isset($this->form))
    {
      $this->form = new sbTestimonialsSlotEditForm($this->id, $this->slot->getArrayValue());
    }
  }
  public function executeNormalView()
  {
    $this->setup();
    $this->values = $this->slot->getArrayValue();
    
    if(!isset($this->values['number'])) { $this->values['number'] = 3; }
    if(!isset($this->values['order_by'])) { $this->values['order_by'] = 'updated_at'; }
    
    $reverseOrder = array('updated_at', 'created_at');
    
    if(in_array($this->values['order_by'], $reverseOrder))
    {
      $orderBy = $this->values['order_by'] . " DESC";
    }
    else
    {
      $orderBy = $this->values['order_by'];
    }
    
    $this->testimonials = sbTestimonialTable::getTestimonials(array('order' => $this->values['order_by'],
																																		'limit' => $this->values['number'],
																																		'active' => true));
  }
}
