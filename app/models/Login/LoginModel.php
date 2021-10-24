<?php

class LoginModel extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Sign-in action
   * @param $email
   * @return object
   */
  public function signIn($email)
  {
    $connection = $this->db;
    $sql = "SELECT email, password, active FROM users WHERE email = :email";

    $formattedEmail = trim($email);
    $formattedEmail = stripcslashes($formattedEmail);
    $formattedEmail = htmlspecialchars($formattedEmail);

    $query = $connection->prepare($sql);
    $query->bindParam(':email', $formattedEmail, PDO::PARAM_STR, 50);
    $query->execute();

    return $query;
  }
}
