<?php

$instancePath = '/user';

$userData = [
  'id' => '',
  'name' => '',
  'surname' => '',
  'country_code' => '',
  'dni' => '',
  'email' => '',
  'password' => '',
];

if (isset($user)) {
  foreach ($userData as $key => $value) {
    $userData[$key] = $user[0][$key];
  }
  $instancePath .= '/update';
} else {
  $instancePath .= '/create';
}
