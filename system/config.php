<?php
defined('BASEPATH') || exit('Direct access is not allowed');

// Uri consts
define('URI', $_SERVER['REQUEST_URI']);
define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);

// Routes consts
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
const PATH_VIEWS = '/app/views/';
const PATH_CONTROLLERS = 'app/controllers/';
const HELPER_PATH = 'system/helpers/';
const LIBS_ROUTE = ROOT . '/system/libs/';

// Core consts
const CORE = 'system/core/';
const DEFAULT_SECTION = 'Login';

// Database data from environment
define("DB", parse_url(getenv("DATABASE_URL")));

const DB_OPTIONS = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
const ERROR_REPORTING_LEVEL = -1;
