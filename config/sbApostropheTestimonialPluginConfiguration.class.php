<?php

/**
 * sbApostropheTestimonialPlugin configuration.
 *
 * @package     sbApostropheTestimonialPlugin
 * @subpackage  config
 * @author      Giles Smith <tech@superrb.com>
 * @version     SVN: $Id: PluginConfiguration.class.php 17207 2009-04-10 15:36:26Z Kris.Wallsmith $
 */
class sbApostropheTestimonialPluginConfiguration extends sfPluginConfiguration
{

  static $registered = false;
  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    // Yes, this can get called twice. This is Fabien's workaround:
    // http://trac.symfony-project.org/ticket/8026

    if (!self::$registered)
    {
      $this->dispatcher->connect('a.getGlobalButtons', array('sbApostropheTestimonialPluginConfiguration', 'getGlobalButtons'));
      self::$registered = true;
    }
  }


  static public function getGlobalButtons()
  {
    $user = sfContext::getInstance()->getUser();

    if ($user->hasCredential('sb_job_board_admin'))
    {
      aTools::addGlobalButtons(array(
        new aGlobalButton('sb-testimonial', 'Testimonials', '@sb_testimonial_admin', 'sb-testimonial-btn')
      ));
    }
  }
}
