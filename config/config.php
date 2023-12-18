<?php
if (!defined('HOST')) {
    define('HOST', 'localhost');
}

if (!defined('DB_NAME')) {
    define('DB_NAME', 'qlpet');
}

if (!defined('DB_USER')) {
    define('DB_USER', 'root');
}

if (!defined('DB_PASS')) {
    define('DB_PASS', '');
}

if (!defined('ROOT')) {
    define('ROOT', dirname(dirname(__FILE__)));
}

if (!defined('BASE_URL')) {
    define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/lab/');
}

// Các cài đặt khác nếu cần
