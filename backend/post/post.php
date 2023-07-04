<?php

// function to post the post
function create_post($post_title, $post_image_upload, $post_category, $post_location, $post_description, $post_delivery, $post_colour, $post_fuel, $post_mileage, $post_price, $post_negotiable, $post_rent_start_date, $post_rent_end_date)
{
    global $conn;

    $message = [];

    // random id for post
    $post_id = rand(time(), 10000000);

    $file_array = reorganize_files_array($post_image_upload);

    $file_data = move_uploaded_post_images($file_array);

    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare('INSERT INTO re_posts(post_id, post_user, post_title, post_image, post_category, post_location, post_description, post_delivery, post_color, post_fuel_type, post_mileage, post_price, post_negotiable, post_rent_start, post_rent_end) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
    $stmt->bind_param('iisssssssssssss', $post_id, $user_id, $post_title, $file_data, $post_category, $post_location, $post_description, $post_delivery, $post_colour, $post_fuel, $post_mileage, $post_price, $post_negotiable, $post_rent_start_date, $post_rent_end_date);
    if ($stmt->execute()) {
        $message['success'] = 'The ads post was successfully requested.';
    } else {
        $message['success'] = 'There is some error to post ads posts request.';
    }
    return $message;
}

// Helper function to reorganize $_FILES array
function reorganize_files_array($files)
{
    $file_array = array();
    $file_count = count($files['name']);
    $file_keys = array_keys($files);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_array[$i][$key] = $files[$key][$i];
        }
    }

    return $file_array;
}

// helper function to upload files and get json format data
function move_uploaded_post_images($file_array)
{
    $file_data_array = array(); // Array to store file data

    foreach ($file_array as $file) {
        // File details
        $file_name = rand(1000, 10000) . '-' . $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_type = $file['type'];

        // Move uploaded file to desired location (optional)
        $upload_dir = "frontend/uploads/";
        $file_path = $upload_dir . $file_name;
        move_uploaded_file($file_tmp, $file_path);

        // Store file details in array
        $file_data = array("name" => $file_name, "path" => $file_path);
        $file_data_array[] = $file_data;
    }

    // Encode file data array as JSON
    return $json_file_data = json_encode($file_data_array);
}
