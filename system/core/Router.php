<?php
defined('BASEPATH') or exit('Direct access is not allowed');

/** URI management */
class Router
{
  /** @var string */
  public $uri;

  /** @var string */
  public $section;

  /** @var string */
  public $handler;

  /** @var string */
  public $param;

  /**
   * Attrs initializer
   */
  public function __construct()
  {
    $this->setUri();
    $this->setSection();
    $this->setHandler();
    $this->setParam();
  }

  /**
   * URI setter
   * Sets whole URI
   */
  public function setUri()
  {
    $this->uri = explode('/', URI);
  }

  /**
   * Section setter
   * Sets controller name
   */
  public function setSection()
  {
    $this->section = $this->uri[1] === '' ? DEFAULT_SECTION : ucfirst($this->uri[1]);
  }

  /**
   * Handler setter
   * Sets method name
   */
  public function setHandler()
  {
    $this->handler = !empty($this->uri[2]) ? $this->handlerTranslate($this->uri[2]) : 'Index';
  }

  /**
   * Param setter
   * Sets $this->param value if it exists according to request method
   */
  public function setParam()
  {
    if (REQUEST_METHOD === 'POST') {
      $this->param = $_POST;
    } else if (REQUEST_METHOD === 'GET') {
      $this->param = !empty($this->uri[3]) ? $this->uri[3] : '';
    }
  }

  /**
   * @return string $uri
   */
  public function getUri()
  {
    return $this->uri;
  }

  /**
   * @return string $section
   */
  public function getSection()
  {
    return $this->section;
  }

  /**
   * @return string $handler
   */
  public function getHandler()
  {
    return $this->handler;
  }

  /**
   * @return string $param
   */
  public function getParam()
  {
    return $this->param;
  }

  /**
   * Manage URI sections to map controller with respective view
   */
  private function handlerTranslate(string $url)
  {
    $handler = '';
    $separateString = explode('-', $url);
    if (count($separateString) > 0) {
      foreach ($separateString as $string) {
        $handler .= ucfirst($string);
      }
      return $handler;
    }
    return ucfirst($url);
  }
}
