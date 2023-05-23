<?php

//Check Routes
$routes = [
    get_root_directory_uri() . '/' => 'frontend/index.php',
    get_root_directory_uri() . '/about' => 'frontend/page-about.php',
    get_root_directory_uri() . '/login' => 'frontend/page-login.php',
    get_root_directory_uri() . '/signup' => 'frontend/page-signup.php',
    get_root_directory_uri() . '/profile' => 'frontend/profile.php',
    get_root_directory_uri() . '/user' => 'frontend/user.php',
    get_root_directory_uri() . '/post' => 'frontend/post.php',
    get_root_directory_uri() . '/settings' => 'frontend/settings.php',
    get_root_directory_uri() . '/chat' => 'frontend/page-chat.php',
    get_root_directory_uri() . '/search' => 'frontend/search-result.php',
    get_root_directory_uri() . '/admin' => 'backend/admin/admin.php'
];

// Get the URL path from the request
$path = parse_url($_SERVER['REQUEST_URI'])['path'];

if (array_key_exists($path, $routes)) {
    require $routes[$path];
} else {
    require 'frontend/404.php';
}
