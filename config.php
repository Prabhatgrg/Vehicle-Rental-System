<?php
// database configs
define('DB_NAME', 'VRMS');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

require_once './database/db_config.php';


// checking routing
$routes = [
    get_root_directory_uri() . '/' => 'frontend/index.php',
    get_root_directory_uri() . '/about' => 'frontend/page-about.php',
    get_root_directory_uri() . '/login' => 'frontend/page-login.php',
    get_root_directory_uri() . '/signup' => 'frontend/page-signup.php',
];

// Get the URL path from the request
$path = parse_url($_SERVER['REQUEST_URI'])['path'];

if (array_key_exists($path, $routes)) {
    require $routes[$path];
} else {
    require 'frontend/404.php';
}
