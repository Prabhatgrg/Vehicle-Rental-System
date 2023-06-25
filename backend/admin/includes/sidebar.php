<div class="admin-sidebar py-3">
    <ul class="admin-menu-list">
        <li>
            <a href="<?php echo get_root_directory_uri(); ?>/admin" title="Dashboard">
                <span class="list-icon">
                    <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z" />
                    </svg>
                </span>
                <span class="list-text">
                    Dashboard
                </span>
            </a>
        </li>
        <li>
            <a href="<?php echo get_root_directory_uri(); ?>/admin?page=<?php echo urlencode('posts'); ?>" title="Posts">
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
                    <a href="?page=<?php echo urlencode('posts'); ?>&status=<?php echo urlencode('pending'); ?>" title="Pending">
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
                    <a href="?page=<?php echo urlencode('posts'); ?>&status=<?php echo urlencode('published'); ?>" title="Published">
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
        <li>
            <a href="<?php echo get_root_directory_uri(); ?>/admin?page=<?php echo urlencode('users'); ?>" title="Users">
                <span class="list-icon">
                    <svg enable-background="new 0 0 24 24" id="Layer_1" version="1.0" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g>
                            <path d="M9,9c0-1.7,1.3-3,3-3s3,1.3,3,3c0,1.7-1.3,3-3,3S9,10.7,9,9z M12,14c-4.6,0-6,3.3-6,3.3V19h12v-1.7C18,17.3,16.6,14,12,14z   " />
                        </g>
                        <g>
                            <g>
                                <circle cx="18.5" cy="8.5" r="2.5" />
                            </g>
                            <g>
                                <path d="M18.5,13c-1.2,0-2.1,0.3-2.8,0.8c2.3,1.1,3.2,3,3.2,3.2l0,0.1H23v-1.3C23,15.7,21.9,13,18.5,13z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <circle cx="18.5" cy="8.5" r="2.5" />
                            </g>
                            <g>
                                <path d="M18.5,13c-1.2,0-2.1,0.3-2.8,0.8c2.3,1.1,3.2,3,3.2,3.2l0,0.1H23v-1.3C23,15.7,21.9,13,18.5,13z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <circle cx="5.5" cy="8.5" r="2.5" />
                            </g>
                            <g>
                                <path d="M5.5,13c1.2,0,2.1,0.3,2.8,0.8c-2.3,1.1-3.2,3-3.2,3.2l0,0.1H1v-1.3C1,15.7,2.1,13,5.5,13z" />
                            </g>
                        </g>
                    </svg>
                </span>
                <span class="list-text">
                    Users
                </span>
            </a>

            <ul class="sub-menu">
                <li>
                    <a href="?page=<?php echo urlencode('users'); ?>&action=<?php echo urlencode('add user'); ?>" title="Add users">
                        <span class="list-icon">
                            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>
                                        .cls-add {
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
                                    <line class="cls-add" x1="16" x2="16" y1="7" y2="25" />
                                    <line class="cls-add" x1="7" x2="25" y1="16" y2="16" />
                                </g>
                            </svg>
                        </span>
                        <span class="list-text">
                            Add users
                        </span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo get_root_directory_uri(); ?>/admin?page=<?php echo urlencode('category'); ?>" title="Categories">
                <span class="list-icon">
                    <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm10 10h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zM17 3c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zM7 13c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4z" />
                    </svg>
                </span>
                <span class="list-text">
                    Categories
                </span>
            </a>

            <ul class="sub-menu">
                <li>
                    <a href="?page=<?php echo urlencode('category'); ?>&action=<?php echo urlencode('add category'); ?>" title="Add category">
                        <span class="list-icon">
                            <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>
                                        .cls-add {
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
                                    <line class="cls-add" x1="16" x2="16" y1="7" y2="25" />
                                    <line class="cls-add" x1="7" x2="25" y1="16" y2="16" />
                                </g>
                            </svg>
                        </span>
                        <span class="list-text">
                            Add category
                        </span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>