<?php
defined('BASEPATH') || exit('Direct access is not allowed');

class ErrorPageHandler extends Controller
{
  public function __invoke()
  {
    $this->render('error_page/error_page');
  }
}
