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
                        <span class="user-name">User</span>
                    </div>

                    <ul class="dropdown-menu">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <main class="main-content dashboard">
            <div class="flex flex-wrap">
                <aside class="col-2 col-md-3 bg-dark">
                    <div class="admin-sidebar py-3">
                        <ul class="admin-menu-list">
                            <li>
                                <a href="<?php echo get_root_directory_uri(); ?>/admin" title="Posts">
                                    <span class="list-icon">
                                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M499.99 176h-59.87l-16.64-41.6C406.38 91.63 365.57 64 319.5 64h-127c-46.06 0-86.88 27.63-103.99 70.4L71.87 176H12.01C4.2 176-1.53 183.34.37 190.91l6 24C7.7 220.25 12.5 224 18.01 224h20.07C24.65 235.73 16 252.78 16 272v48c0 16.12 6.16 30.67 16 41.93V416c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-32h256v32c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-54.07c9.84-11.25 16-25.8 16-41.93v-48c0-19.22-8.65-36.27-22.07-48H494c5.51 0 10.31-3.75 11.64-9.09l6-24c1.89-7.57-3.84-14.91-11.65-14.91zm-352.06-17.83c7.29-18.22 24.94-30.17 44.57-30.17h127c19.63 0 37.28 11.95 44.57 30.17L384 208H128l19.93-49.83zM96 319.8c-19.2 0-32-12.76-32-31.9S76.8 256 96 256s48 28.71 48 47.85-28.8 15.95-48 15.95zm320 0c-19.2 0-48 3.19-48-15.95S396.8 256 416 256s32 12.76 32 31.9-12.8 31.9-32 31.9z" />
                                        </svg>
                                    </span>
                                    <span class="list-text">
                                        Posts
                                    </span>
                                </a>

                                <ul class="sub-menu">
                                    <li>
                                        <a href="?status=<?php echo urlencode('pending'); ?>" title="Pending">
                                            <span class="list-icon">
                                                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                    <path clip-rule="evenodd" d="M1 7C1 3.68629 3.68629 1 7 1H17C20.3137 1 23 3.68629 23 7V17C23 20.3137 20.3137 23 17 23H7C3.68629 23 1 20.3137 1 17V7ZM11 5V12C11 12.5523 11.4477 13 12 13H19V11H13V5H11Z" fill="black" fill-rule="evenodd" />
                                                </svg>
                                            </span>
                                            <span class="list-text">
                                                Pending
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="?status=<?php echo urlencode('published'); ?>" title="Published">
                                            <span class="list-icon">
                                                <svg height="32" id="icon" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg">
                                                    <defs>
                                                        <style>
                                                            .cls-1 {
                                                                fill: none;
                                                            }
                                                        </style>
                                                    </defs>
                                                    <title />
                                                    <path d="M26,4H6A2,2,0,0,0,4,6V26a2,2,0,0,0,2,2H26a2,2,0,0,0,2-2V6A2,2,0,0,0,26,4ZM14,21.5,9,16.5427,10.5908,15,14,18.3456,21.4087,11l1.5918,1.5772Z" transform="translate(0 0)" />
                                                    <path class="cls-1" d="M14,21.5,9,16.5427,10.5908,15,14,18.3456,21.4087,11l1.5918,1.5772Z" id="inner-path" transform="translate(0 0)" />
                                                    <rect class="cls-1" data-name="&lt;Transparent Rectangle&gt;" height="32" id="_Transparent_Rectangle_" width="32" />
                                                </svg>
                                            </span>
                                            <span class="list-text">
                                                Published
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </aside>
                <aside class="col-10 col-md-9">
                    <section class="py-3">
                        <h1 class="h3 mb-2">Posts</h1>

                        <ul class="posts-list">
                            <li>
                                <form method="post" action="#">
                                    <h2 class="h6 mb-1">The title goes here</h2>
                                    <div class="post-status mb-1">
                                        <label for="postStatus">Status : </label>
                                        <select name="postStatus" id="postStatus" class="form-select">
                                            <option value="pending" selected>Pending</option>
                                            <option value="published">Published</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-submit">Save</button>
                                </form>
                            </li>
                            <li>
                                <form method="post" action="#">
                                    <h2 class="h6 mb-1">The title goes here</h2>
                                    <div class="post-status mb-1">
                                        <label for="postStatus">Status : </label>
                                        <select name="postStatus" id="postStatus" class="form-select">
                                            <option value="pending" selected>Pending</option>
                                            <option value="published">Published</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-submit">Save</button>
                                </form>
                            </li>
                            <li>
                                <form method="post" action="#">
                                    <h2 class="h6 mb-1">The title goes here</h2>
                                    <div class="post-status mb-1">
                                        <label for="postStatus">Status : </label>
                                        <select name="postStatus" id="postStatus" class="form-select">
                                            <option value="pending" selected>Pending</option>
                                            <option value="published">Published</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-submit">Save</button>
                                </form>
                            </li>
                            <li>
                                <form method="post" action="#">
                                    <h2 class="h6 mb-1">The title goes here</h2>
                                    <div class="post-status mb-1">
                                        <label for="postStatus">Status : </label>
                                        <select name="postStatus" id="postStatus" class="form-select">
                                            <option value="pending" selected>Pending</option>
                                            <option value="published">Published</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-submit">Save</button>
                                </form>
                            </li>
                        </ul>
                    </section>
                </aside>
            </div>
        </main>
    </div>
</body>

</html>