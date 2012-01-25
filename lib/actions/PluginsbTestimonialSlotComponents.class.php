<?php

/**
 * Description of PluginsbTestimonialSlotComponents
 *
 * @author Giles Smith <tech@superrb.com>
 */
abstract class PluginsbTestimonialSlotComponents extends aSlotComponents
{
	public function executeEditView()
  {
    // Must be at the start of both view components
    $this->setup();
    
    // Careful, don't clobber a form object provided to us with validation errors
    // from an earlier pass
    if (!isset($this->form))
    {
      $this->form = new sbTestimonialSlotEditForm($this->id, $this->slot->getArrayValue());
    }
  }
  public function executeNormalView()
  {
    $this->setup();
    $this->values = $this->slot->getArrayValue();
		$this->testimonial = null;
		
		if(isset($this->values['testimonial_id']))
		{
			$this->testimonial = Doctrine_Core::getTable('sbTestimonial')->findOneById($this->values['testimonial_id']);
			
			if(!($this->testimonial instanceof sbTestimonial))
			{
				$this->testimonial = null;
			}
		}
  }
}