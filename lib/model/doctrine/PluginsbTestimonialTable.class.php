<?php

/**
 * PluginsbTestimonialTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PluginsbTestimonialTable extends Doctrine_Table
{
	/**
	 * Returns an instance of this class.
	 *
	 * @return object PluginsbTestimonialTable
	 */
	public static function getInstance()
	{
		return Doctrine_Core::getTable('sbTestimonial');
	}

	public static function getTestimonials($options = array())
	{
		$fast = sfConfig::get('app_a_fasthydrate', false);
		$root = Doctrine_Query::create()
						->select('t.id, t.active, t.name, t.job_title, t.company_name, t.testimonial,
										 t.person_type, t.created_at, t.updated_at, t.slug, RANDOM() AS rand')
						->from('sbTestimonial t')
						->where(1);

		if(isset($options['active']))
		{
			$root->andWhere('t.active = ?', $options['active']);
		}

		if(isset($options['order']))
		{
			$root->orderBy($options['order']);
		}

		if(is_numeric($options['limit']))
		{
			$root->limit($options['limit']);
		}

		return $root->execute(array(), $fast ? Doctrine::HYDRATE_ARRAY : Doctrine::HYDRATE_RECORD);
	}

	public static function getTestimonialTypes($options = array())
	{
		$fast = sfConfig::get('app_a_fasthydrate', false);
		$root = Doctrine_Query::create()
						->select('t.person_type')
						->from('sbTestimonial t')
						->where(1);

		if(isset($options['active']))
		{
			$root->andWhere('t.active = ?', $active);
		}

		if(isset($options['order']))
		{
			$root->orderBy($options['order']);
		}

		if(is_numeric($options['limit']))
		{
			$root->limit($options['limit']);
		}

		$root->groupBy('t.person_type');

		return $root->execute(array(), $fast ? Doctrine::HYDRATE_ARRAY : Doctrine::HYDRATE_RECORD);
	}

	public static function getRandomTestimonials($limit = 5, $active = true)
	{
		$fast = sfConfig::get('app_a_fasthydrate', false);
		$root = Doctrine_Query::create()
						->select('t.id, t.active, t.name, t.job_title, t.company_name, t.testimonial,
										 t.person_type, t.created_at, t.updated_at, t.slug, RANDOM() AS rand')
						->from('sbTestimonial t')
						->where(1);

		// add the active filter
		if(is_bool($active))
		{
			$root->andWhere('t.active = ?', $active);
		}

		// add the order
		$root->orderBy('rand');

		// add the limit
		if(is_numeric($limit))
		{
			$root->limit($limit);
		}

		return $root->execute(array(), $fast ? Doctrine::HYDRATE_ARRAY : Doctrine::HYDRATE_RECORD);

	}

	public static function getJobTitles($term = null)
	{
		$returns = array();

		$root = Doctrine_Query::create()
						->select('job_title')
						->from('sbTestimonial');

		if($term != null and $term != '' and strlen($term) > 1)
		{
			$root->where('job_title LIKE ?', $term . '%');
		}

		$root->groupBy('job_title');
		$root->orderBy('job_title');

		$items = $root->execute(array(), Doctrine::HYDRATE_ARRAY);
		foreach($items as $item){ $returns[$item['job_title']] = $item['job_title']; }
		return $returns;
	}

	public static function getCompanyNames($term = null)
	{
		$returns = array();

		$root = Doctrine_Query::create()
						->select('company_name')
						->from('sbTestimonial');

		if($term != null and $term != '' and strlen($term) > 1)
		{
			$root->where('company_name LIKE ?', $term . '%');
		}

		$root->groupBy('company_name');
		$root->orderBy('company_name');

		$items = $root->execute(array(), Doctrine::HYDRATE_ARRAY);
		foreach($items as $item){ $returns[$item['company_name']] = $item['company_name']; }
		return $returns;
	}

	public static function getPersonTypes($term = null)
	{
		$returns = array();

		$root = Doctrine_Query::create()
						->select('person_type')
						->from('sbTestimonial');

		if($term != null and $term != '' and strlen($term) > 1)
		{
			$root->where('person_type LIKE ?', $term . '%');
		}

		$root->groupBy('person_type');
		$root->orderBy('person_type');

		$items = $root->execute(array(), Doctrine::HYDRATE_ARRAY);
		foreach($items as $item){ $returns[$item['person_type']] = $item['person_type']; }
		return $returns;
	}
}
