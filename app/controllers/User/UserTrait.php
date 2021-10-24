<?php
defined('BASEPATH') || exit('Direct access is not allowed');

require_once ROOT . '/app/models/Login/LoginModel.php';
require_once ROOT . '/app/models/User/UserModel.php';
require_once LIBS_ROUTE . 'Session.php';

/**
 * User controller
 */
trait UserTrait
{
  /** @var UserModel */
  private $model;

  /** @var Session */
  private $session;

  public function __construct()
  {
    $this->model = new UserModel();
    $this->session = new Session();
    $this->session->init();

    if ($this->session->getStatus() === 1 || empty($this->session->get('email'))) {
      header('location: /ErrorPage/unauthorizate');
    }
  }
}
