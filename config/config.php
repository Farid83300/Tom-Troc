<?php
declare(strict_types=1);

session_start();

define('TEMPLATE_VIEW_PATH', './views/templates/');
define('MAIN_VIEW_PATH', TEMPLATE_VIEW_PATH . 'main.php');

define('DB_HOST', 'localhost');
define('DB_NAME', 'tom-troc');
define('DB_USER', 'root');
define('DB_PASS', 'root');
