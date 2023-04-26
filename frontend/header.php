<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo get_root_directory_uri(); ?>/frontend/assets/img/svg/rentease_favicon.svg" type="image/x-icon">
    <title><?php
            if (isset($page_title)) :
                echo $page_title . ' - Vehicle Rental System';
            else :
                echo "RentEase - Vehicle Rental System";
            endif;
            ?></title>
    <link rel="stylesheet" href="<?php echo get_root_directory_uri(); ?>/frontend/assets/css/utilities.css">
    <link rel="stylesheet" href="<?php echo get_root_directory_uri(); ?>/frontend/assets/css/style.css">
</head>

<body>

    <header class="site-header">
        <div class="container">
            <div class="flex align-items-center justify-content-between">
                <a href="<?php echo get_root_directory_uri(); ?>" class="site-brand">
                    Rent<span class="fw-bold">Ease</span>
                </a>

                <nav class="main-navigation">
                    <ul class="menu">
                        <li><a href="<?php echo get_root_directory_uri(); ?>/">Home</a></li>
                        <li><a href="<?php echo get_root_directory_uri(); ?>/about">About</a></li>
                    </ul>
                    <div class="user-avatar">
                        <div class="user-info">
                            <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                            <span class="user-name">User</span>
                        </div>

                        <ul class="user-dropdown">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Setting</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main class="main-content">