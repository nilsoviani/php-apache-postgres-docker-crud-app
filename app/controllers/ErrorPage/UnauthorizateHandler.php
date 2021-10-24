<?php
defined('BASEPATH') || exit('Direct access is not allowed');

class UnauthorizateHandler extends Controller
{
  public function __invoke()
  {
    $this->render('error_page/unauthorizate_page');
  }
}
