<?php
defined('BASEPATH') || exit('Direct access is not allowed');
require_once "UserTrait.php";

/**
 * User controller
 */
class UpdateFormHandler extends Controller
{
  use UserTrait;
  /**
   * @throws Exception
   */
  public function __invoke($id)
  {
    $user = $this->model->get($id);
    $this->render('user/update', ['email' => $this->session->get('email'), 'user' => $user]);
  }
}
