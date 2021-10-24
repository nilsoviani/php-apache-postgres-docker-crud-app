<?php
defined('BASEPATH') || exit('Direct access is not allowed');
require_once "UserTrait.php";

/**
 * User controller
 */
class UpdateHandler extends Controller
{
  use UserTrait;
  /**
   * @throws Exception
   */
  public function __invoke($requestParams)
  {
    if (isset($requestParams['modpassword']) && !empty($requestParams['modpassword']) && $requestParams['modpassword'] !== $requestParams['confirm-modpassword']) {
      $params = ['email' => $this->session->get('email'), 'error_message' => 'Las contraseñas no son iguales'];
      $params['user'][0] = $requestParams;
      $this->render('user/update', $params);
      return;
    }

    $this->model->update($requestParams);
    header('location: /user');
  }
}
