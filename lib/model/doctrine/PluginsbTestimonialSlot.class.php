<?php

/**
 * PluginsbTestimonialSlot
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginsbTestimonialSlot extends BasesbTestimonialSlot
{
	protected $editDefault = true;
	
	public function getSearchText()
  {
		$value = unserialize($this->value);
		return '';
		//return $value['question'] . ' ' . $value['answer'];
  }
}