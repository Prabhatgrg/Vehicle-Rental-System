<?php

// function to post reviews
function post_user_review($user_id, $reviewer_id, $user_rating, $user_review)
{
    global $conn;

    $stmt = $conn->prepare('INSERT INTO re_reviews (user_id, reviewer_id, user_rating, user_review) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('iiss', $user_id, $reviewer_id, $user_rating, $user_review);
    $stmt->execute();
}

// function to get user rating
function get_user_rating($user_id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT ROUND(user_rating, 2) AS user_rating FROM re_users WHERE user_id = ?");
    $stmt->bind_param('i', $user_id);

    $stmt->execute();

    $result = $stmt->get_result();

    return $result->fetch_array(MYSQLI_ASSOC)['user_rating'];
}

// function to get user all ratings
function get_user_reviews($user_id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM re_reviews WHERE user_id = ?");
    $stmt->bind_param('i', $user_id);

    $stmt->execute();

    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
}
