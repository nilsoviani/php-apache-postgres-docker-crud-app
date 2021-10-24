<?php

/** Sessions class manager */
class Session
{
  /**
   * Initializes session
   */
  public function init()
  {
    session_start();
  }

  /**
   * Adds an item to the session
   * @param string $key Session array key
   * @param string $value Session element value
   */
  public function add($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  /**
   * Retorna un elemento a la sesión
   * @param string $key Session array key
   * @return string|null Session value, if it has it
   */
  public function get($key)
  {
    return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
  }

  /**
   * Returns session array value
   * @return array
   */
  public function getAll()
  {
    return $_SESSION;
  }

  /**
   * Removes an item from the session
   * @param string $key Session array key
   * @return void
   */
  public function remove($key)
  {
    if (!empty($_SESSION[$key])) {
      unset($_SESSION[$key]);
    }
  }

  /**
   * Closes the session
   */
  public function close()
  {
    session_unset();
    session_destroy();
  }

  /**
   * Returns status session
   * @return int Session status
   */
  public function getStatus()
  {
    return session_status();
  }
}
