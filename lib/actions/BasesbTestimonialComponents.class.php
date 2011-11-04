<?php

/**
 * Base Components for the sbTestimonial module.
 *
 * @package     sbApostropheTestimonialPlugin
 * @subpackage  sbTestimonial
 * @author      Superrb Studio
 */
abstract class BasesbTestimonialComponents extends sfComponents
{
	/**
	 * Returns a randomised set of testimonials
	 *
	 * @return Doctrine_Collection
	 */
	public function executeRandomTestimonials()
	{
		if(!is_numeric($this->numTestimonials))
		{
			$this->numTestimonials = 5;
		}

		$this->testimonials = sbTestimonialTable::getRandomTestimonials($this->numTestimonials);
	}

	public function executeTestimonials()
	{
		if(!is_numeric($this->numTestimonials))
		{
			$this->numTestimonials = 5;
		}

		if($this->orderTestimonials == '')
		{
			$this->orderTestimonials = 'updated_at';
		}

		$this->testimonials = sbTestimonialTable::getTestimonials(array('order' => $this->orderTestimonials, 'limit' => $this->numTestimonials));
	}
}
