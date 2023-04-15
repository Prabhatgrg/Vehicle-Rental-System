<?php

function get_root_directory_uri(): string
{
    return '/' . basename(__DIR__);
}

function get_theme_directory_uri(): string
{
    return THEME_DIRECTORY_URI;
}
function get_header(): void
{
    include_once('frontend/header.php');
}
function get_footer(): void
{
    include_once('frontend/footer.php');
}
