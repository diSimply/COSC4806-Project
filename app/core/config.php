<?php

define('VERSION', '0.7.0');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
define('APPS', ROOT . DS . 'app');
define('CORE', ROOT . DS . 'core');
define('LIBS', ROOT . DS . 'lib');
define('MODELS', ROOT . DS . 'models');
define('VIEWS', ROOT . DS . 'views');
define('CONTROLLERS', ROOT . DS . 'controllers');
define('LOGS', ROOT . DS . 'logs');	
define('FILES', ROOT . DS. 'files');

// ---------------------  NEW DATABASE TABLE -------------------------
define('DB_HOST',         'gol.h.filess.io');
define('DB_USER',         'COSC4608Project_stringwell'); 
define('DB_PASS',         $_ENV['DB_PASS']);
define('DB_DATABASE',     'COSC4608Project_stringwell');
define('DB_PORT',         '3305');

// ---------------------  OMDB -------------------------
define('OMDB_KEY', $_ENV['OMDB_KEY']);

// ---------------------  GOOGLE AI --------------------
define('GOOGLE_AI_KEY', $_ENV['GOOGLE_AI_KEY']);