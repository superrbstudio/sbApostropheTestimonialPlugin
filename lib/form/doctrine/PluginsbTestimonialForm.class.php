<?php

/**
 * PluginsbTestimonial form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginsbTestimonialForm extends BasesbTestimonialForm
{
	public function setup()
	{
    parent::setup();
		$user = sfContext::getInstance()->getUser();
		sfContext::getInstance()->getConfiguration()->loadHelpers('Url');

		$this->setWidget('author_id', new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getGuardUser()->getId())));

		$this->setWidget('slug', new sfWidgetFormInputText(array(), array('class' => 'medium-input')));
		$this->setValidator('slug', new sfValidatorString(array('required' => true), array()));

		$this->setWidget('name', new sfWidgetFormInputText(array(), array('class' => 'large-input')));
		$this->setValidator('name', new sfValidatorString(array('required' => true), array()));

		$this->setWidget('job_title', new sbApostropheJQueryInputAutocomplete(array('source' => url_for('@sb_testimonial_autocomplete_job_titles')), array('class' => 'large-input')));
		$this->setValidator('job_title', new sfValidatorString(array('required' => true), array()));

		$this->setWidget('company_name', new sbApostropheJQueryInputAutocomplete(array('source' => url_for('@sb_testimonial_autocomplete_company_names')), array('class' => 'large-input')));
		$this->setValidator('company_name', new sfValidatorString(array('required' => true), array()));

		$this->setWidget('person_type', new sbApostropheJQueryInputAutocomplete(array('source' => url_for('@sb_testimonial_autocomplete_person_types')), array('class' => 'small-input')));
		$this->setValidator('person_type', new sfValidatorString(array('required' => true), array()));

		$this->setWidget('testimonial', new sfWidgetFormTextarea(array(), array('class' => 'large-input')));
		$this->setValidator('testimonial', new sfValidatorString(array('required' => true), array()));

		unset($this['created_at'], $this['updated_at']);
	}
}
