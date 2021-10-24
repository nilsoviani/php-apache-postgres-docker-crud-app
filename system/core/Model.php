<?php
defined('BASEPATH') || exit('Direct access is not allowed');

class Model
{
  /** @var PDO|null PDO instance */
  protected $db;

  /**
   * Starts connection to database
   */
  public function __construct()
  {
    $host = DB["host"];
    $port = DB["port"];
    $databaseName = ltrim(DB["path"], "/");
    $user = DB["user"];
    $password = DB["pass"];
    
    $dbConnection = "pgsql:host={$host};port={$port};dbname={$databaseName};options='--client_encoding=UTF8'";
    $this->db = new PDO($dbConnection, $user, $password);
  }

  /**
   * Validates database connection
   */
  public function __connect()
  {
    try {
      return $this->db;
    } catch (PDOException $ex) {
      die($ex->getMessage());
    }
  }

  /**
   * Ends database connection
   */
  public function __destruct()
  {
    $this->db = null;
  }
}
