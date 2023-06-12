<?php
// constants
define('THEME_DIRECTORY_URI', './frontend');

/*
 *   This will include global functions
 */
require_once './functions.php';

/*
 *   This will include backend functions
 */
require_once './backend/index.php';

/*
 *  This will include configuration such as:
 *  Routing, Database Connection
 */

$conn = open_con();
session_start();

require_once './routes.php';

close_con($conn);
session_destroy();
