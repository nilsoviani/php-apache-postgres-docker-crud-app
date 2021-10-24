<?php
defined('BASEPATH') or exit('Direct access is not allowed');

class UserModel extends Model
{

  /**
   * Starts connection
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Sets database connection
   * @return PDO
   */
  private function getConnection()
  {
    $connection = $this->db;
    $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $connection;
  }

  /**
   * Returns user by id
   * @return array
   */
  public function get($id): array
  {
    $connection = $this->getConnection();
    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $connection->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll();
  }

  /**
   * Returns all active users
   * @return array
   */
  public function getAll(): array
  {
    $connection = $this->getConnection();
    $sql = "SELECT id, name, surname, country_code, dni, email FROM users WHERE active = 1";
    $query = $connection->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }

  /**
   * Updates user data
   * @return void
   */
  public function update($requestParams): void
  {
    $connection = $this->getConnection();
    $sql = "UPDATE users SET name = :name, surname = :surname, country_code = :country_code, dni = :dni, email = :email, password = :password WHERE id = :id";

    $id = $requestParams['id'];
    $name = $requestParams['name'] ? $requestParams['name'] : '';
    $surname = $requestParams['surname'] ? $requestParams['surname'] : '';
    $countryCode = $requestParams['country_code'] ? $requestParams['country_code'] : '';
    $dni = $requestParams['dni'] ? $requestParams['dni'] : '';
    $email = $requestParams['email'] ? $requestParams['email'] : '';
    $password = !empty($requestParams['modpassword']) ? password_hash($requestParams['modpassword'], PASSWORD_BCRYPT, ['cost' => 10]) : $requestParams['password'];

    $query = $connection->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(':name', $name, PDO::PARAM_STR, 50);
    $query->bindParam(':surname', $surname, PDO::PARAM_STR, 50);
    $query->bindParam(':country_code', $countryCode, PDO::PARAM_STR, 10);
    $query->bindParam(':dni', $dni, PDO::PARAM_STR, 15);
    $query->bindParam(':email', $email, PDO::PARAM_STR, 50);
    $query->bindParam(':password', $password, PDO::PARAM_STR, 60);

    $query->execute();
  }

  /**
   * Creates nwe user
   * @return void
   */
  public function create($requestParams): void
  {
    $connection = $this->getConnection();
    $sql = "INSERT INTO users(name, surname, country_code, dni, email, password) VALUES (:name, :surname, :country_code, :dni, :email, :password)";

    $name = $requestParams['name'] ? $requestParams['name'] : '';
    $surname = $requestParams['surname'] ? $requestParams['surname'] : '';
    $countryCode = $requestParams['country_code'] ? $requestParams['country_code'] : '';
    $dni = $requestParams['dni'] ? $requestParams['dni'] : '';
    $email = $requestParams['email'] ? $requestParams['email'] : '';
    $password = password_hash($requestParams['password'], PASSWORD_BCRYPT, ['cost' => 10]);

    $query = $connection->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR, 50);
    $query->bindParam(':surname', $surname, PDO::PARAM_STR, 50);
    $query->bindParam(':country_code', $countryCode, PDO::PARAM_STR, 10);
    $query->bindParam(':dni', $dni, PDO::PARAM_STR, 15);
    $query->bindParam(':email', $email, PDO::PARAM_STR, 50);
    $query->bindParam(':password', $password, PDO::PARAM_STR, 60);

    $query->execute();
  }

  /**
   * Deactivates user by id
   * @return void
   */
  public function deactivate($id): void
  {
    $connection = $this->getConnection();
    $sql = "UPDATE users SET active = 0 WHERE id = :id";
    $query = $connection->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
  }
}
