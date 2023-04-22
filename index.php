<?php
define('THEME_DIRECTORY_URI', './frontend');

include './functions.php';

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
