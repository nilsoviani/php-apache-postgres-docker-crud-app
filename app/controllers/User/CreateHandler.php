<?php
defined('BASEPATH') || exit('Direct access is not allowed');
require_once "UserTrait.php";

/**
 * User controller
 */
class CreateHandler extends Controller
{
  use UserTrait;
  /**
   * @throws Exception
   */
  public function __invoke($requestParams)
  {

    $this->model->create($requestParams);

    header('location: /user');
  }
}
