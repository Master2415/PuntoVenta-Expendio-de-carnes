<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

session_start();

// Ruta base
define('RUTA', $_ENV['APP_URL'] ?? 'http://localhost/WS_PHP/WS/Inventario_Expendio/sistema-de-venta-php-axios-y-mysql-mvc/');

// Base de datos
define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
define('DB_USER', $_ENV['DB_USER'] ?? 'root');
define('DB_PASS', $_ENV['DB_PASS'] ?? '');
define('DB_NAME', $_ENV['DB_NAME'] ?? 'sistemaventas');

?>
