<?php
defined('BASEPATH') || exit('Direct access is not allowed');
require_once ROOT . '/app/models/Login/LoginModel.php';
require_once LIBS_ROUTE . 'Session.php';
/**
 * Login controller
 */
class LogoutHandler extends Controller
{
  private $session;

  public function __construct()
  {
    $this->session = new Session();
  }

  public function __invoke()
  {
    $this->session->init();
    $this->session->close();
    header('location: /');
  }
}
