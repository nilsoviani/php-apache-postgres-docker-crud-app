<?php
defined('BASEPATH') || exit('Direct access is not allowed');

/**
 * Login controller
 */
class IndexHandler extends Controller
{
  /**
   * @throws Exception
   */
  public function __invoke()
  {
    $this->render('login/login');
  }
}
