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
            <div class="flex align-items-center justify-content-between gap-5">
                <a href="<?php echo get_root_directory_uri(); ?>" class="site-brand">
                    Rent<span class="fw-bold">Ease</span>
                </a>

                <form action="#" class="search-bar">
                    <div class="form-field">
                        <input type="text" id="search" name="search" class="form-control">
                        <button type="submit">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                    <path d="M1945 5110 c-655 -74 -1224 -420 -1590 -970 -382 -574 -460 -1324
-205 -1969 110 -278 264 -513 475 -726 352 -355 761 -561 1249 -630 149 -21
437 -21 581 0 376 55 720 198 1005 416 l93 71 636 -636 c443 -443 647 -640
673 -651 93 -38 195 5 239 100 23 49 24 94 4 143 -11 26 -208 230 -651 673
l-636 636 71 93 c218 285 361 629 416 1005 21 144 21 432 0 581 -69 488 -275
897 -630 1249 -325 322 -736 530 -1185 600 -124 19 -432 27 -545 15z m505
-393 c516 -89 956 -384 1230 -825 176 -285 261 -585 262 -927 1 -180 -11 -278
-53 -445 -157 -630 -659 -1132 -1289 -1289 -167 -42 -265 -54 -445 -53 -342 1
-642 86 -927 262 -448 278 -744 726 -829 1255 -20 119 -17 427 4 553 63 367
236 702 501 968 300 299 643 461 1096 518 68 8 366 -3 450 -17z" />
                                    <path d="M1205 3991 c-78 -35 -212 -203 -295 -369 -97 -194 -133 -352 -134
-582 -1 -138 1 -159 20 -194 59 -114 202 -141 298 -57 44 39 56 84 56 218 0
264 73 463 236 650 85 97 102 158 65 238 -45 98 -151 139 -246 96z" />
                                </g>
                            </svg>

                            <span class="screen-reader-text">Search</span>
                        </button>
                    </div>
                </form>

                <nav class="main-navigation">
                    <ul class="menu">
                        <li><a href="<?php echo get_root_directory_uri(); ?>/">Home</a></li>
                        <li><a href="<?php echo get_root_directory_uri(); ?>/about">About</a></li>
                    </ul>

                    <div class="chat-container dropdown-container">
                        <button class="btn-dropdown chat-toggler">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                    <path d="M2080 5114 c-325 -27 -575 -83 -830 -184 -569 -226 -1003 -656 -1170
-1159 -165 -493 -68 -1017 269 -1451 74 -96 230 -255 308 -314 l52 -39 -56
-81 c-168 -241 -329 -382 -504 -441 -82 -28 -103 -44 -131 -99 -39 -75 -4
-172 75 -210 83 -39 475 -1 802 79 256 62 558 170 767 276 l60 30 96 -15 c242
-39 495 -42 757 -10 959 117 1725 736 1876 1517 99 511 -71 1024 -475 1429
-350 352 -836 581 -1381 653 -118 15 -426 27 -515 19z m495 -338 c380 -55 716
-190 995 -400 567 -425 740 -1069 443 -1646 -220 -429 -703 -764 -1274 -885
-234 -50 -613 -64 -814 -31 -55 9 -134 22 -176 28 l-77 12 -148 -72 c-236
-113 -553 -228 -710 -258 l-38 -7 51 64 c58 74 130 180 202 299 42 68 51 92
51 129 0 67 -24 97 -151 193 -311 235 -507 518 -581 840 -29 126 -31 365 -5
486 73 333 272 630 571 852 322 238 696 373 1156 414 86 8 406 -4 505 -18z" />
                                    <path d="M4767 2716 c-48 -17 -71 -38 -91 -81 -24 -50 -19 -95 20 -187 141
-328 135 -647 -16 -948 -100 -199 -239 -361 -440 -512 -58 -43 -113 -93 -122
-111 -22 -39 -23 -108 -2 -148 29 -57 140 -224 188 -282 26 -32 46 -61 43 -63
-6 -7 -131 24 -247 61 -139 44 -287 103 -412 166 -100 50 -104 51 -173 46 -38
-3 -117 -13 -175 -23 -141 -23 -451 -23 -605 0 -376 57 -711 199 -968 410
-101 82 -178 88 -248 17 -41 -41 -55 -88 -44 -148 8 -47 72 -110 204 -203 417
-295 986 -449 1522 -410 88 6 195 17 237 25 l77 13 95 -45 c398 -187 850 -293
1250 -293 126 0 166 10 208 51 98 96 51 228 -98 278 -164 54 -318 182 -472
392 l-27 36 87 75 c275 236 461 544 534 881 31 143 31 387 0 537 -43 210 -126
413 -184 448 -46 28 -96 34 -141 18z" />
                                </g>
                            </svg>

                            <span class="screen-reader-text">
                                Chat
                            </span>
                        </button>
                        <div class="dropdown-content"></div>
                    </div>

                    <div class="dropdown-container notifications">
                        <button class="btn-dropdown notification-icon">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                    <path d="M2315 4839 c-544 -79 -1001 -463 -1174 -986 -63 -191 -72 -263 -78
-643 -3 -256 -8 -348 -20 -389 -19 -69 -72 -175 -163 -326 -129 -213 -159
-290 -180 -456 -33 -262 64 -527 263 -715 91 -87 185 -144 303 -183 92 -31
358 -69 754 -108 243 -24 756 -24 1010 0 294 28 638 75 720 97 214 60 398 213
505 420 62 122 86 211 92 356 10 211 -26 329 -174 576 -193 324 -185 293 -193
743 -7 323 -10 382 -29 467 -129 590 -592 1037 -1179 1138 -122 21 -343 25
-457 9z m478 -338 c210 -56 369 -146 523 -296 159 -156 253 -316 312 -535 24
-91 25 -111 32 -470 8 -398 8 -406 63 -551 34 -89 55 -129 164 -311 110 -183
133 -243 141 -355 10 -158 -43 -305 -147 -411 -62 -63 -167 -123 -246 -141
-64 -14 -388 -55 -620 -78 -250 -24 -744 -24 -985 0 -282 29 -570 66 -634 82
-160 41 -294 168 -353 336 -21 60 -26 92 -26 174 0 132 22 195 140 390 113
187 145 251 185 368 l32 92 7 365 c7 389 14 454 64 601 132 387 467 677 872
754 115 21 372 14 476 -14z" />
                                    <path d="M2025 830 c-46 -10 -84 -39 -106 -81 -43 -85 -16 -154 106 -275 66
-66 100 -90 176 -128 123 -61 211 -79 354 -73 190 8 336 70 470 202 87 85 130
164 119 219 -19 105 -126 166 -222 127 -15 -7 -58 -45 -95 -86 -92 -101 -165
-137 -286 -143 -68 -3 -98 0 -143 16 -76 27 -140 73 -189 135 -23 29 -49 57
-59 64 -26 18 -91 30 -125 23z" />
                                </g>
                            </svg>

                            <span class="screen-reader-text">Notifications</span>
                        </button>
                        <ul class="dropdown-content dropdown-menu notifications-menu">
                            <li>
                                <a href="#">
                                    Lorem ipsum dolor sit amet.
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Lorem ipsum dolor sit amet.
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Lorem ipsum dolor sit amet.
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div class="post-create-container">
                        <button class="btn btn-dark btn-post-create">
                            Create Post
                        </button>
                        <div class="modal-container">
                            <form action="#">

                            </form>
                        </div>
                    </div>

                    <div class="has-dropdown user-avatar">
                        <div class="user-info">
                            <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                            <span class="user-name">User</span>
                        </div>

                        <ul class="dropdown-menu">
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