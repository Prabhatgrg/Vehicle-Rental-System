<?php

function get_categories()
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM re_category");
    if ($stmt->execute()) :
        $restult = $stmt->get_result();
        return $restult->fetch_all(MYSQLI_ASSOC);
    endif;
}

function add_category($category_title)
{
    global $conn;

    $message = [];

    $stmt = $conn->prepare("INSERT INTO re_category (category_title) VALUES (?)");
    $stmt->bind_param('s', $category_title);

    if ($stmt->execute()) :
        $message['success'] = 'The category is inserted successfully';
    else :
        $message['error'] = 'Error while inserting category';
    endif;

    return $message;
}
