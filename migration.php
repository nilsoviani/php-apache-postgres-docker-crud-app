<?php
const BASEPATH = true;
require 'system/config.php';

$host = DB["host"];
$port = DB["port"];
$databaseName = ltrim(DB["path"], "/");
$user = DB["user"];
$password = DB["pass"];

$dbConnection = "pgsql:host={$host};port={$port};dbname={$databaseName};options='--client_encoding=UTF8'";
$pdo = new PDO($dbConnection, $user, $password);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
  // Creates user table if it doesn't already exist
  $sql = "
  DO $$ 
  BEGIN 
    CREATE TABLE IF NOT EXISTS users (
      id           SERIAL PRIMARY KEY,
      name         VARCHAR(50) NOT NULL,
      surname      VARCHAR(50) NOT NULL,
      country_code VARCHAR(10) NOT NULL,
      dni          VARCHAR(15) NOT NULL,
      email        VARCHAR(150) NOT NULL UNIQUE,
      password     VARCHAR(60) DEFAULT NULL,
      active       SMALLINT DEFAULT 1,
      created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      updated_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ); 
  END 
  $$
  ";

  $query = $pdo->prepare($sql);
  $query->execute();

  // Creates default user
  $password = password_hash('admin', PASSWORD_BCRYPT, ['cost' => 10]);
  $sql = "INSERT INTO users (name, surname, country_code, dni, email, password) VALUES ('Super', 'User', 'VE', '123456789', 'super@user.com', '" . $password . "')";  
  $query = $pdo->prepare($sql);
  $query->execute();

  echo 'Migration was executed successfully';

} catch (PDOException $e) {
  // SQLSTATE[23505]: Unique violation (Means super@user.com exists)
  if($e->getCode() == '23505') {
    echo 'Migration was previously executed, no changes have been applied';
  }else{
    die($e->getMessage());
  }
}
