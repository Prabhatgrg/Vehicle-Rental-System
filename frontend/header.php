<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['post_submit'])) {
        $post_title = $_POST['postTitle'];
        $post_image_upload = $_FILES['postImageUpload'];
        $post_category = $_POST['postCategory'];
        $post_location = $_POST['postLocation'];
        $post_description = $_POST['postDescription'];
        $post_delivery = $_POST['postDelivery'];
        $post_colour = $_POST['postColour'];
        $post_fuel = $_POST['postFuel'];
        $post_mileage = $_POST['postMileage'];
        $post_price = $_POST['postPrice'];
        $post_negotiable = $_POST['postNegotiable'];
        $post_rent_start_date = $_POST['postRentStartDate'];
        $post_rent_end_date = $_POST['postRentEndDate'];

        $post_message = create_post($post_title, $post_image_upload, $post_category, $post_location, $post_description, $post_delivery, $post_colour, $post_fuel, $post_mileage, $post_price, $post_negotiable, $post_rent_start_date, $post_rent_end_date);
    }
}


?>


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
    <title><?php
            if (isset($page_title)) :
                echo $page_title . ' - Vehicle Rental System';
            else :
                echo "RentEase - Vehicle Rental System";
            endif;

            ?></title>
    <link rel="stylesheet" href="<?php echo get_root_directory_uri(); ?>/frontend/assets/css/global.css">
    <link rel="stylesheet" href="<?php echo get_root_directory_uri(); ?>/frontend/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo get_root_directory_uri(); ?>/frontend/assets/css/responsive.css">
</head>

<body>
    <div id="page-content">
        <header class="site-header">
            <div class="container">
                <div class="flex align-items-center justify-content-between gap-5">
                    <a href="<?php echo get_root_directory_uri(); ?>" class="site-brand" aria-label="RentEase">
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/svg/rentease_favicon.svg" alt="">
                        <div class="site-title-wrapper">
                            Rent<span class="fw-bold">Ease</span>
                        </div>
                    </a>

                    <form method="post" class="search-bar" autocomplete="off">
                        <div class="form-field">
                            <label for="search" class="screen-reader-text">Search</label>
                            <input type="text" id="search" name="search" aria-label="Search" class="form-control">
                            <button type="submit" name="serch_submit" aria-label="search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                        <path d="M1945 5110 c-655 -74 -1224 -420 -1590 -970 -382 -574 -460 -1324 -205 -1969 110 -278 264 -513 475 -726 352 -355 761 -561 1249 -630 149 -21 437 -21 581 0 376 55 720 198 1005 416 l93 71 636 -636 c443 -443 647 -640 673 -651 93 -38 195 5 239 100 23 49 24 94 4 143 -11 26 -208 230 -651 673 l-636 636 71 93 c218 285 361 629 416 1005 21 144 21 432 0 581 -69 488 -275 897 -630 1249 -325 322 -736 530 -1185 600 -124 19 -432 27 -545 15z m505 -393 c516 -89 956 -384 1230 -825 176 -285 261 -585 262 -927 1 -180 -11 -278 -53 -445 -157 -630 -659 -1132 -1289 -1289 -167 -42 -265 -54 -445 -53 -342 1 -642 86 -927 262 -448 278 -744 726 -829 1255 -20 119 -17 427 4 553 63 367 236 702 501 968 300 299 643 461 1096 518 68 8 366 -3 450 -17z" />
                                        <path d="M1205 3991 c-78 -35 -212 -203 -295 -369 -97 -194 -133 -352 -134 -582 -1 -138 1 -159 20 -194 59 -114 202 -141 298 -57 44 39 56 84 56 218 0 264 73 463 236 650 85 97 102 158 65 238 -45 98 -151 139 -246 96z" />
                                    </g>
                                </svg>

                            </button>
                        </div>
                    </form>

                    <nav class="main-navigation">

                        <a href="<?php echo get_root_directory_uri(); ?>/chat" class="btn-dropdown chat-toggler" aria-label="Chat">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                    <path d="M2080 5114 c-325 -27 -575 -83 -830 -184 -569 -226 -1003 -656 -1170 -1159 -165 -493 -68 -1017 269 -1451 74 -96 230 -255 308 -314 l52 -39 -56 -81 c-168 -241 -329 -382 -504 -441 -82 -28 -103 -44 -131 -99 -39 -75 -4 -172 75 -210 83 -39 475 -1 802 79 256 62 558 170 767 276 l60 30 96 -15 c242 -39 495 -42 757 -10 959 117 1725 736 1876 1517 99 511 -71 1024 -475 1429 -350 352 -836 581 -1381 653 -118 15 -426 27 -515 19z m495 -338 c380 -55 716 -190 995 -400 567 -425 740 -1069 443 -1646 -220 -429 -703 -764 -1274 -885 -234 -50 -613 -64 -814 -31 -55 9 -134 22 -176 28 l-77 12 -148 -72 c-236 -113 -553 -228 -710 -258 l-38 -7 51 64 c58 74 130 180 202 299 42 68 51 92 51 129 0 67 -24 97 -151 193 -311 235 -507 518 -581 840 -29 126 -31 365 -5 486 73 333 272 630 571 852 322 238 696 373 1156 414 86 8 406 -4 505 -18z" />
                                    <path d="M4767 2716 c-48 -17 -71 -38 -91 -81 -24 -50 -19 -95 20 -187 141 -328 135 -647 -16 -948 -100 -199 -239 -361 -440 -512 -58 -43 -113 -93 -122 -111 -22 -39 -23 -108 -2 -148 29 -57 140 -224 188 -282 26 -32 46 -61 43 -63 -6 -7 -131 24 -247 61 -139 44 -287 103 -412 166 -100 50 -104 51 -173 46 -38 -3 -117 -13 -175 -23 -141 -23 -451 -23 -605 0 -376 57 -711 199 -968 410 -101 82 -178 88 -248 17 -41 -41 -55 -88 -44 -148 8 -47 72 -110 204 -203 417 -295 986 -449 1522 -410 88 6 195 17 237 25 l77 13 95 -45 c398 -187 850 -293 1250 -293 126 0 166 10 208 51 98 96 51 228 -98 278 -164 54 -318 182 -472 392 l-27 36 87 75 c275 236 461 544 534 881 31 143 31 387 0 537 -43 210 -126 413 -184 448 -46 28 -96 34 -141 18z" />
                                </g>
                            </svg>
                            <span class="screen-reader-text">
                                Chat
                            </span>
                        </a>

                        <div class="modal-container">
                            <button class="btn btn-dark btn-modal">
                                Create Post
                            </button>
                            <div class="modal-content px-2">
                                <div class="flex justify-content-center align-items-center h-100">
                                    <div class="modal-dialog col-md-6 col-lg-5 bg-light">

                                        <?php if (is_login()) : ?>
                                            <div class="flex justify-content-between align-items-center mb-2">
                                                <h3>Create New Post</h3>

                                                <button class="btn-close">
                                                    <span class="line"></span>
                                                    <span class="screen-reader-text">Close</span>
                                                </button>
                                            </div>
                                            <form method="post" class="grid gap-2 post-form" enctype="multipart/form-data">
                                                <div class="form-floating">
                                                    <input type="text" name="postTitle" id="postTitle" class="form-control" placeholder="Post Title">
                                                    <label for="postTitle">Post Title</label>
                                                </div>
                                                <div class="form-file-upload">
                                                    <span class="form-title mb-2">Upload Image For Post</span>
                                                    <label for="postImageUpload">
                                                        <svg width="60" height="60" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                                            <defs>
                                                                <style>
                                                                    .cls-1 {
                                                                        fill: none;
                                                                        stroke: #000;
                                                                        stroke-linecap: round;
                                                                        stroke-linejoin: round;
                                                                        stroke-width: 2px;
                                                                    }
                                                                </style>
                                                            </defs>
                                                            <title />
                                                            <g id="plus">
                                                                <line class="cls-1" x1="16" x2="16" y1="7" y2="25" />
                                                                <line class="cls-1" x1="7" x2="25" y1="16" y2="16" />
                                                            </g>
                                                        </svg>
                                                    </label>
                                                    <input type="file" name="postImageUpload[]" id="postImageUpload" class="form-file" multiple>
                                                </div>

                                                <?php

                                                $categories = get_categories();

                                                if ($categories) :
                                                ?>
                                                    <div class="form-field">
                                                        <label for="postCategory">Category</label>
                                                        <select name="postCategory" id="postCategory" class="form-select">

                                                            <?php foreach ($categories as $category) : ?>

                                                                <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_title']; ?></option>

                                                            <?php endforeach; ?>
                                                        </select>

                                                    </div>
                                                <?php
                                                endif; ?>
                                                <div class="form-floating">
                                                    <input type="text" name="postLocation" id="postLocation" class="form-control" placeholder="Location">
                                                    <label for="postLocation">Location</label>
                                                </div>
                                                <div class="form-floating">
                                                    <textarea name="postDescription" id="postDescription" class="form-control" placeholder="Description"></textarea>
                                                    <label for="postDescription">Description</label>
                                                </div>
                                                <div class="form-field">
                                                    <label for="postDelivery">Delivery</label>
                                                    <select name="postDelivery" id="postDelivery" class="form-select">
                                                        <option value="true">Yes</option>
                                                        <option value="false">No</option>
                                                    </select>
                                                </div>
                                                <div class="form-floating">
                                                    <input type="color" name="postColour" id="postColour" class="form-control form-color" placeholder="Colour">
                                                    <label for="postColour">Colour</label>
                                                </div>
                                                <div class="form-field">
                                                    <label for="postFuel">Fuel</label>
                                                    <select name="postFuel" id="postFuel" class="form-select">
                                                        <option value="Electric">Electric</option>
                                                        <option value="Petrol">Petrol</option>
                                                        <option value="Diesel">Diesel</option>
                                                    </select>
                                                </div>
                                                <div class="form-floating">
                                                    <input type="text" name="postMileage" id="postMileage" class="form-control" placeholder="Mileage">
                                                    <label for="postMileage">Mileage</label>
                                                </div>
                                                <div class="form-group grid column-2">
                                                    <div class="form-floating">
                                                        <input type="number" name="postPrice" id="postPrice" class="form-control" placeholder="Price">
                                                        <label for="postPrice">Price</label>
                                                    </div>
                                                    <div class="form-field">
                                                        <select name="postNegotiable" id="postNegotiable" class="form-select">
                                                            <option value="" selected>Negotiable</option>
                                                            <option value="true">Yes</option>
                                                            <option value="false">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group grid column-2">
                                                    <div class="form-floating">
                                                        <input type="date" name="postRentStartDate" id="postRentStartDate" class="form-control">
                                                        <label for="postRentStartDate">Vehicle Rent Start Date</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="date" name="postRentEndDate" id="postRentEndDate" class="form-control">
                                                        <label for="postRentEndDate">Vehicle Rent End Date</label>
                                                    </div>
                                                </div>
                                                <div class="form-submit">
                                                    <input type="hidden" name="post_submit" value="submit">
                                                    <button type="submit" class="btn btn-dark btn-post-submit" value="submit">Submit</button>
                                                </div>
                                            </form>
                                        <?php else : ?>
                                            <div class="flex justify-content-between align-items-center mb-2">
                                                <h3>Notice!</h3>

                                                <button class="btn-close">
                                                    <span class="line"></span>
                                                    <span class="screen-reader-text">Close</span>
                                                </button>
                                            </div>
                                            <p>You need to login to post the rental ads.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if (!is_login()) : ?>
                            <ul class="menu">
                                <li><a href="<?php echo get_root_directory_uri(); ?>/login">Login</a></li>
                                <li><a href="<?php echo get_root_directory_uri(); ?>/signup">Signup</a></li>
                            </ul>
                        <?php endif; ?>

                        <?php if (is_login()) : ?>
                            <div class="has-dropdown user-avatar">
                                <div class="user-info">
                                    <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                                    <span class="user-name"><?php echo get_user_name(); ?></span>
                                </div>

                                <ul class="dropdown-menu">
                                    <?php if (is_admin()) : ?>
                                        <li><a href="<?php echo get_root_directory_uri(); ?>/admin">Dashboard</a></li>
                                    <?php endif; ?>
                                    <li><a href="<?php echo get_root_directory_uri(); ?>/profile">Profile</a></li>
                                    <li><a href="<?php echo get_root_directory_uri(); ?>/settings">Setting</a></li>
                                    <li><a href="<?php echo get_root_directory_uri(); ?>/logout">Logout</a></li>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </nav>
                    <div class="menu-overlay"></div>

                </div>
            </div>
        </header>

        <main class="main-content">
            <?php
            if (isset($post_message['success'])) :
                $message = $post_message['success'];
            ?>
                <div class="alert">
                    <div class="container">
                        <p class="bg-success p-2">
                            <?php echo $message; ?>
                        </p>
                    </div>
                </div>
            <?php
            endif;
            ?>