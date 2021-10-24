<?php
defined('BASEPATH') || exit('Direct access is not allowed');
require_once ROOT . '/app/models/Login/LoginModel.php';
require_once LIBS_ROUTE . 'Session.php';
/**
 * Login controller
 */
trait LoginTrait
{
  private $model;

  private $session;

  public function __construct()
  {
    $this->model = new LoginModel();
    $this->session = new Session();
  }

  private function verify($requestParams)
  {
    return empty($requestParams['email']) || empty($requestParams['password']);
  }

  private function renderErrorMessage($message)
  {
    $this->render('login/login', ['error_message' => $message]);
  }
}
