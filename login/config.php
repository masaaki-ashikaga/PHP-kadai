<?php

define('DSN', 'mysql;dbname=php_kadai;host=localhost;charset=utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('SITE_URL', 'http://localhost/php-kadai/keiziban/');

error_reporting(E_ALL & ~E_NOTICE);
session_set_cookie_params(1440, '/');



?>