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
        // $post_rent_start_date = $_POST['postRentStartDate'];
        // $post_rent_end_date = $_POST['postRentEndDate'];

        $post_message = create_post($post_title, $post_image_upload, $post_category, $post_location, $post_description, $post_delivery, $post_colour, $post_fuel, $post_mileage, $post_price, $post_negotiable);
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

                    <form action="<?php echo get_root_directory_uri(); ?>/search" method="get" class="search-bar" autocomplete="off">
                        <div class="form-field">
                            <label for="search" class="screen-reader-text">Search</label>
                            <input type="text" id="search" name="search" aria-label="Search" class="form-control">
                            <button type="submit" name="submit" aria-label="search">
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
                        <?php if (is_login()) : ?>
                            <div class="flex">
                                <a href="<?php echo get_root_directory_uri(); ?>/notifications" aria-label="notification-icon">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="24.000000pt" height="24.000000pt" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                            <path d="M2315 4839 c-544 -79 -1001 -463 -1174 -986 -63 -191 -72 -263 -78 -643 -3 -256 -8 -348 -20 -389 -19 -69 -72 -175 -163 -326 -129 -213 -159 -290 -180 -456 -33 -262 64 -527 263 -715 91 -87 185 -144 303 -183 92 -31 358 -69 754 -108 243 -24 756 -24 1010 0 294 28 638 75 720 97 214 60 398 213 505 420 62 122 86 211 92 356 10 211 -26 329 -174 576 -193 324 -185 293 -193 743 -7 323 -10 382 -29 467 -129 590 -592 1037 -1179 1138 -122 21 -343 25 -457 9z m478 -338 c210 -56 369 -146 523 -296 159 -156 253 -316 312 -535 24 -91 25 -111 32 -470 8 -398 8 -406 63 -551 34 -89 55 -129 164 -311 110 -183 133 -243 141 -355 10 -158 -43 -305 -147 -411 -62 -63 -167 -123 -246 -141 -64 -14 -388 -55 -620 -78 -250 -24 -744 -24 -985 0 -282 29 -570 66 -634 82 -160 41 -294 168 -353 336 -21 60 -26 92 -26 174 0 132 22 195 140 390 113 187 145 251 185 368 l32 92 7 365 c7 389 14 454 64 601 132 387 467 677 872 754 115 21 372 14 476 -14z" />
                                            <path d="M2025 830 c-46 -10 -84 -39 -106 -81 -43 -85 -16 -154 106 -275 66 -66 100 -90 176 -128 123 -61 211 -79 354 -73 190 8 336 70 470 202 87 85 130 164 119 219 -19 105 -126 166 -222 127 -15 -7 -58 -45 -95 -86 -92 -101 -165 -137 -286 -143 -68 -3 -98 0 -143 16 -76 27 -140 73 -189 135 -23 29 -49 57 -59 64 -26 18 -91 30 -125 23z" />
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
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

                                                <div class="form-field">
                                                    <label for="postCategory">Category</label>
                                                    <select name="postCategory" id="postCategory" class="form-select">
                                                        <?php

                                                        $categories = get_categories();

                                                        if ($categories) :
                                                        ?>

                                                            <?php foreach ($categories as $category) : ?>

                                                                <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_title']; ?></option>

                                                            <?php endforeach; ?>
                                                        <?php else : ?>
                                                            <option value="false">No Category</option>
                                                        <?php endif; ?>
                                                    </select>

                                                </div>
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
                                                <!-- <div class="form-group grid column-2">
                                                    <div class="form-floating">
                                                        <input type="date" name="postRentStartDate" id="postRentStartDate" class="form-control">
                                                        <label for="postRentStartDate">Vehicle Rent Start Date</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input type="date" name="postRentEndDate" id="postRentEndDate" class="form-control">
                                                        <label for="postRentEndDate">Vehicle Rent End Date</label>
                                                    </div>
                                                </div> -->
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
                                    <?php
                                    $user_id = get_user_id();
                                    $user_info = get_user_info_by_id($user_id);
                                    $avatar = $user_info['user_profile'];
                                    ?>
                                    <?php if ($avatar != "") :
                                        $img_url = get_image_url($avatar);
                                    ?>
                                        <img class="user-image" src="<?php echo $img_url; ?>" alt="<?php echo $name; ?>">
                                    <?php else : ?>
                                        <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="Profile Image">
                                    <?php endif; ?>
                                    <span class="user-name"><?php echo htmlspecialchars(get_user_name()); ?></span>
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