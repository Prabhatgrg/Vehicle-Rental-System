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

function get_category_by_id($category_id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM re_category WHERE category_id = ?");
    $stmt->bind_param('i', $category_id);
    if ($stmt->execute()) :
        $restult = $stmt->get_result();
        return $restult->fetch_array(MYSQLI_ASSOC)['category_title'];
    endif;
}

function update_category($category_id, $category_title)
{
    global $conn;

    $message = [];

    $stmt = $conn->prepare("SELECT * FROM re_category WHERE category_title = ?");
    $stmt->bind_param('s', $category_title);

    $stmt->execute();

    $num_rows = $stmt->get_result()->num_rows;

    if ($num_rows > 0) {
        $message['category_exists'] = 'The category you are trying to update is already exists.';
        return $message;
    }

    $stmt = $conn->prepare("UPDATE re_category SET category_title = ? WHERE category_id = ?");
    $stmt->bind_param('si', $category_title, $category_id);

    if ($stmt->execute()) :
        $message['success'] = 'The category is updated successfully';
    else :
        $message['error'] = 'Error while updating category';
    endif;

    return $message;
}

function add_category($category_title)
{
    global $conn;

    $message = [];

    $stmt = $conn->prepare("SELECT * FROM re_category WHERE category_title = ?");
    $stmt->bind_param('s', $category_title);

    $stmt->execute();

    $num_rows = $stmt->get_result()->num_rows;

    if ($num_rows > 0) {
        $message['category_exists'] = 'The category you are trying to add is already exists.';
        return $message;
    }

    $stmt = $conn->prepare("INSERT INTO re_category (category_title) VALUES (?)");
    $stmt->bind_param('s', $category_title);

    if ($stmt->execute()) :
        $message['success'] = 'The category is inserted successfully';
    else :
        $message['error'] = 'Error while inserting category';
    endif;

    return $message;
}

function delete_category($category_id)
{
    global $conn;

    $message = [];

    $stmt = $conn->prepare("SELECT * FROM re_category WHERE category_id = ?");
    $stmt->bind_param('i', $category_id);

    $stmt->execute();

    $num_rows = $stmt->get_result()->num_rows;

    if ($num_rows == 0) {
        $message['category_not_exists'] = 'The category you are trying to delete is does not exists.';
        return $message;
    }

    $stmt = $conn->prepare("DELETE FROM re_category WHERE category_id = ?");
    $stmt->bind_param('i', $category_id);

    if ($stmt->execute()) :
        $message['success'] = 'The category is deleted successfully';
    else :
        $message['error'] = 'Error while deleting category';
    endif;

    return $message;
}
