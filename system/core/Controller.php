<?php
defined('BASEPATH') || exit('Direct access is not allowed');

/** Base Controller */
abstract class Controller
{
  /** @var View */
  public $view;

  /**
   * Views initializer
   * @throws Exception
   */
  public function render($view = '', $params = [])
  {
    $this->view = new View($view, $params);
  }
}
