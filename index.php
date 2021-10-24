<?php

const BASEPATH = true;

require 'system/config.php';
require 'system/core/autoload.php';

/** Nivel de errores notificados */
error_reporting(ERROR_REPORTING_LEVEL);

/** Inicializa Router y detección de valores de la URI */
$router = new Router();

$section = $router->getSection();
$handler = $router->getHandler();
$param = $router->getParam();

/** Validaciones e inclusión del controlador y el metodo */
if (!CoreHelper::validateHandler($section, $handler)) {
  $section = $handler = 'ErrorPage';
}

require PATH_CONTROLLERS . "{$section}/{$handler}Handler.php";

$handler .= 'Handler';

/** Ejecución final del controlador, método y parámetro obtenido por URI */
$execHandler = new $handler;

$param ? $execHandler($param) : $execHandler();
