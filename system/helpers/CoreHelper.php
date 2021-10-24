<?php
defined('BASEPATH') || exit('Direct access is not allowed');

class CoreHelper
{
  /**
   * @param $controller
   * @return bool
   */
  public static function validateHandler($section, $handler)
  {
    if (!is_file(PATH_CONTROLLERS . "{$section}/{$handler}Handler.php")) {

      return false;
    }

    return true;
  }
}
