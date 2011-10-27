<?php

/**
 * Base sbTestimonialAjax actions.
 *
 * @package    asandbox
 * @subpackage sbTestimonial
 * @author     Superrb Studio
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class BasesbTestimonialAjaxActions extends BaseaActions
{
	public function executeAjaxJobTitles(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->isAuthenticated());
		$this->getResponse()->setHttpHeader('Content-Type','application/json; charset=utf-8');
		$keylessTitles = array();
		$titles = sbTestimonialTable::getJobTitles($request->getParameter('term'));
		foreach($titles as $title){$keylessTitles[] = $title;}
		$this->getResponse()->setContent(json_encode($keylessTitles));
		return sfView::NONE;
	}

	public function executeAjaxCompanyNames(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->isAuthenticated());
		$this->getResponse()->setHttpHeader('Content-Type','application/json; charset=utf-8');
		$keylessTitles = array();
		$titles = sbTestimonialTable::getCompanyNames($request->getParameter('term'));
		foreach($titles as $title){$keylessTitles[] = $title;}
		$this->getResponse()->setContent(json_encode($keylessTitles));
		return sfView::NONE;
	}

	public function executeAjaxPersonTypes(sfWebRequest $request)
	{
		$this->forward404Unless($this->getUser()->isAuthenticated());
		$this->getResponse()->setHttpHeader('Content-Type','application/json; charset=utf-8');
		$keylessTitles = array();
		$titles = sbTestimonialTable::getPersonTypes($request->getParameter('term'));
		foreach($titles as $title){$keylessTitles[] = $title;}
		$this->getResponse()->setContent(json_encode($keylessTitles));
		return sfView::NONE;
	}
}
