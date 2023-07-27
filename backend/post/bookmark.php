<?php

// function to check if post is booked or not
function is_saved($post_id, $user_id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM re_bookmarks WHERE post_id = ? AND user_id = ?");
    $stmt->bind_param('ii', $post_id, $user_id);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0)
        return true;
    return false;
}

// function to bookmark or save post
function save_post($post_id, $user_id)
{
    global $conn;

    $message = [];

    $is_saved = is_saved($post_id, $user_id);

    if ($is_saved) {
        $message['error'] = "This post has already been saved.";
        return $message;
    }

    $stmt = $conn->prepare("INSERT INTO re_bookmarks (post_id, user_id) VALUES (?,?)");
    $stmt->bind_param('ii', $post_id, $user_id);
    if ($stmt->execute()) :
        $message['success'] = 'The post is successfully saved.';
    else :
        $message['error'] = 'There is an error while saving the post. Please try again later.';
    endif;

    return $message;
}

// function to remove saved post
function remove_saved_post($post_id, $user_id)
{
    global $conn;

    $message = [];

    $is_saved = is_saved($post_id, $user_id);

    if (!$is_saved) {
        $message['error'] = "This post is already not saved.";
        return $message;
    }

    $stmt = $conn->prepare("DELETE FROM re_bookmarks WHERE post_id = ? AND user_id = ?");
    $stmt->bind_param('ii', $post_id, $user_id);
    if ($stmt->execute()) :
        $message['success'] = 'The post is successfully removed from saved list.';
    else :
        $message['error'] = 'There is an error while removing the saved post. Please try again later.';
    endif;
}


// function to get saved post data
function get_saved_post($user_id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM re_bookmarks WHERE user_id = ?");
    $stmt->bind_param('i', $user_id);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0)
        return false;

    return $result->fetch_all(MYSQLI_ASSOC);
}
