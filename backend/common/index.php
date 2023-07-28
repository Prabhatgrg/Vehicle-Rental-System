<?php

// function to format date
function get_formated_date($date_string)
{
    $dateTime = new DateTime($date_string);
    $formattedDate = $dateTime->format('H:i A, D m Y');
    return $formattedDate;
}

// function to format date
function format_date($date_string)
{
    $dateTime = new DateTime($date_string);
    $formattedDate = $dateTime->format('d M, Y');
    return $formattedDate;
}
