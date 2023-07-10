<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo get_root_directory_uri(); ?>/frontend/assets/img/svg/rentease_favicon.svg" type="image/x-icon">
    <meta name="description" content="A system which allows user to rent the vehicle from rental provider.">
    <meta name="keywords" content="Rent, Vehicle, RentEase">
    <meta name="author" content="Neer Bahadur Shrestha and Prabhat Gurung">
    <title>Dashboard - RentEase</title>
    <link rel="stylesheet" href="<?php echo get_root_directory_uri(); ?>/frontend/assets/css/global.css">
    <link rel="stylesheet" href="<?php echo get_root_directory_uri(); ?>/frontend/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo get_root_directory_uri(); ?>/frontend/assets/css/responsive.css">
</head>

<body>
    <div id="page-content">
        <header class="site-header admin-header">
            <div class="flex gap-2 justify-content-between">
                <a href="<?php echo get_root_directory_uri(); ?>" class="site-brand">
                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/svg/rentease_favicon.svg" alt="">
                    <div class="site-title-wrapper">
                        Rent<span class="fw-bold">Ease</span>
                    </div>
                </a>

                <div class="has-dropdown user-avatar">
                    <div class="user-info">
                        <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                        <span class="user-name"><?php echo get_user_name(); ?></span>

                    </div>

                    <ul class="dropdown-menu">
                        <li><a href="<?php echo get_root_directory_uri(); ?>/">Home</a></li>
                        <li><a href="<?php echo get_root_directory_uri(); ?>/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <main class="main-content dashboard">