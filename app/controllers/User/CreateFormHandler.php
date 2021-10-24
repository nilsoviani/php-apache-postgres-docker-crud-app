<?php
defined('BASEPATH') || exit('Direct access is not allowed');
require_once "UserTrait.php";

/**
 * User controller
 */
class CreateFormHandler extends Controller
{
  use UserTrait;
  /**
   * @throws Exception
   */
  public function __invoke()
  {
    $this->render('user/create', ['email' => $this->session->get('email')]);
  }
}
