<?php
defined('BASEPATH') || exit('Direct access is not allowed');
require_once "UserTrait.php";

/**
 * User controller
 */
class DeleteHandler extends Controller
{
  use UserTrait;
  /**
   * @throws Exception
   */
  public function __invoke($id)
  {
    $user = $this->model->get($id);

    if ($user[0]['id']) {
      $this->model->deactivate($id);
    }

    header('location: /user');
  }
}
