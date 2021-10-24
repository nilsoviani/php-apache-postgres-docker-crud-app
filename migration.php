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

try {
  $sql = "CREATE DATABASE IF NOT EXISTS db";
  $query = $pdo->prepare($sql);
  $query->execute();

  $sql = 'CREATE TABLE IF NOT EXISTS users
  (
    id           SERIAL PRIMARY KEY,
    name         VARCHAR(50) NOT NULL,
    surname      VARCHAR(50) NOT NULL,
    country_code VARCHAR(10) NOT NULL,
    dni          VARCHAR(15) NOT NULL,
    email        VARCHAR(50) NOT NULL UNIQUE,
    password     VARCHAR(60) DEFAULT NULL,
    active       SMALLINT DEFAULT 1,
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  )';

  $query = $pdo->prepare($sql);
  $query->execute();

  $password = password_hash('admin', PASSWORD_BCRYPT, ['cost' => 10]);
  $sql = "INSERT INTO users (id, name, surname, country_code, dni, email, password) VALUES ('1', 'Super', 'User', 'VE', '123456789', 'super@user.com', '" . $password . "')";  

  $query = $pdo->prepare($sql);
  $query->execute();

  echo 'Database created successfully';

} catch (PDOException $ex) {
  die($ex->getMessage());
}
