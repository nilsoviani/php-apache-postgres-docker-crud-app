<?php
defined('BASEPATH') || exit('Direct access is not allowed');

require_once "UserTrait.php";

/**
 * User controller
 */
class IndexHandler extends Controller
{
  use UserTrait;
  /**
   * @throws Exception
   */
  public function __invoke()
  {
    $users = $this->model->getAll();
    $this->render('user/list', ['email' => $this->session->get('email'), 'users' => $users]);
  }
}
