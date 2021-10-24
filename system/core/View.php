<?php
defined('BASEPATH') || exit('Direct access is not allowed');

/**
 * Vista base
 */
class View
{
  /** string */
  protected $template;

  /** string */
  protected $view;

  /** array */
  protected $params;

  /**
   * @param string $view
   * @param array $params
   * @throws Exception
   */
  public function __construct($view, $params = [])
  {
    $this->view = $view;
    $this->params = $params;
    $this->render();
  }

  /**
   * Reders the view according to the controller that made the request
   */
  protected function render()
  {
    $file_path = ROOT . '/' . PATH_VIEWS . '/' . $this->view . '.php';

    if (is_file($file_path)) {
      $this->template = $this->getContentTemplate($file_path);
      echo $this->template;
    } else {
      throw new Exception("Error! Does not exist " . $this->view);
    }
  }

  /**
   * View render
   */
  protected function getContentTemplate($file_path)
  {
    extract($this->params);
    ob_start();
    require($file_path);
    $template = ob_get_contents();
    ob_end_clean();
    return $template;
  }
}
