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

// function to get total number of posts
function get_total_post_count()
{
    global $conn;

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM re_posts");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['total'];
    }

    return 0;
}

// function to get total number of users
function get_total_user_count()
{
    global $conn;

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM re_users");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['total'];
    }

    return 0;
}

// function to get total number of categories
function get_total_categories_count()
{
    global $conn;

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM re_category");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['total'];
    }

    return 0;
}

// function to get total number of pending posts
function get_total_pending_post_count()
{
    global $conn;

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM re_posts WHERE post_status = 'pending'");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['total'];
    }

    return 0;
}

// function to get total number of pending posts
function get_total_published_post_count()
{
    global $conn;

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM re_posts WHERE post_status = 'published'");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['total'];
    }

    return 0;
}

// function to get total number of pending posts
function get_total_comments_count()
{
    global $conn;

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM re_comments");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['total'];
    }

    return 0;
}

// function to get total number of pending posts
function get_total_bookings_count()
{
    global $conn;

    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM re_bookings");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['total'];
    }

    return 0;
}
