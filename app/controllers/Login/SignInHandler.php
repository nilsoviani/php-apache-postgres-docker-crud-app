<?php
defined('BASEPATH') || exit('Direct access is not allowed');
require_once "LoginTrait.php";
/**
 * Login controller
 */
class SignInHandler extends Controller
{
  use LoginTrait;

  public function __invoke($requestParams)
  {
    if ($this->verify($requestParams)) {
      return $this->renderErrorMessage('El email y password son obligatorios');
    }

    $result = $this->model->signIn($requestParams['email']);

    if (!$result->rowCount()) {
      return $this->renderErrorMessage("El email {$requestParams['email']} no fue encontrado");
    }

    $result = $result->fetchObject();

    if (!password_verify($requestParams['password'], $result->password)) {
      return $this->renderErrorMessage('La contraseña es incorrecta');
    }

    if (!$result->active) {
      return $this->renderErrorMessage('Su usuario está desactivado');
    }

    $this->session->init();
    $this->session->add('email', $result->email);
    header('location: /user');
  }
}
