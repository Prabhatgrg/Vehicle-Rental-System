<?php

require_once 'review.php';
// Returns boolean value if user is logged in
function is_login()
{
    if (isset($_SESSION['user_id'])) :
        return true;
    else :
        return false;
    endif;
}

// Check if the user is logged in
function check_if_login()
{
    if (!is_login()) {
        header('Location: ' . get_root_directory_uri() . '/login');
    }
}

// Get User ID
function get_user_id()
{
    if (isset($_SESSION['user_id'])) :
        return $_SESSION['user_id'];
    endif;
}

//Get User Name
function get_user_name()
{
    if (isset($_SESSION['user_name'])) :
        return $_SESSION['user_name'];
    endif;
}

// Get user by id
function get_username_by_id($id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT user_fullname FROM re_users WHERE user_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_array(MYSQLI_ASSOC)['user_fullname'];
}

// Authenticate the User
function user_auth($username, $password) //
{
    global $conn;

    $message = [];

    $stmt = $conn->prepare("SELECT * FROM re_users WHERE user_login = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $message['username'] = "Username does not exist";
    } else {
        $user =  $result->fetch_array(MYSQLI_ASSOC);

        if ($user['user_login'] == $username && password_verify($password, $user['user_password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['user_fullname'];
            header('Location: ' . get_root_directory_uri() . '/');
        } else {
            $message['error'] = "Incorrect username or password";
        }
    }
    return $message;
}

// Validate the User Data
function validate_user(string $name, string $email, string $username, string $password)
{
    global $conn;

    $message = [];
    if (empty($name)) {
        $message['name'] = 'Name is empty';
    }
    if (empty($username)) {
        $message['username'] = 'Username is empty';
    } else {
        $stmt = $conn->prepare('SELECT * FROM re_users WHERE user_login=?');
        $stmt->bind_param('s', $username);
        $stmt->execute();

        $result = $stmt->get_result();
        $users = $result->fetch_array(MYSQLI_ASSOC);

        if (isset($users)) {
            $message['username'] = "Username Already Exists";
        }
    }
    if (empty($email)) {
        $message['email'] = 'Email is empty';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message['email'] = "Invalid Email Format";
    }
    if (empty($password)) {
        $message['password'] = "Password is empty";
    }
    return $message;
}

// Register the User
function register_user($fullname, $email, $username, $password, $phone)
{
    global $conn;
    $message = [];

    $stmt = $conn->prepare("INSERT INTO re_users(user_fullname, user_login, user_password, user_email, user_phone)VALUES(?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $fullname, $username, $password, $email, $phone);

    if ($stmt->execute()) {
        $message['success'] = "User Registered Successfully";
        header('Location: ' . get_root_directory_uri() . '/');
    } else {
        $message['error'] = "Error Registering User";
    }
    $stmt->close();
    return $message;
}

function is_admin()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM re_user_roles WHERE user_id=?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0)
        return  false;

    $data = $result->fetch_array(MYSQLI_ASSOC);


    if ($data['user_roles'] == 'admin') {
        return true;
    } else {
        return false;
    }
}

function change_password($user_id, $old_password, $new_password, $confirm_password)
{
    global $conn;

    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM re_users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        $_SESSION['error'] = "No data exists";
    } else {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $password_verify = password_verify($old_password, $row['user_password']);
        if ($password_verify) {
            if ($new_password == $confirm_password) {
                $stmt = $conn->prepare("UPDATE re_users SET user_password = ? WHERE user_id = ?");
                $stmt->bind_param("si", $new_password_hash, $user_id);
                $stmt->execute();
                $_SESSION['success'] = "Password Updated";
                header('Location: ' . get_root_directory_uri() . '/settings');
            }else{
                $_SESSION['error'] = "New Password does not match with Confirm Password";
                header('Location: '. get_root_directory_uri() . '/settings');
            }
        } else {
            $_SESSION['error'] = "Old password does not match";
            header('Location: ' . get_root_directory_uri() . '/settings');
        }
    }
}

// function to logout
function logout()
{
    session_unset();
    session_destroy();
    // Redirect the user to login page
    header('Location: ' . get_root_directory_uri() . '/');
}

// function to get user details by id
function get_user_info_by_id($user_id)
{
    global $conn;

    $data = [];

    $stmt = $conn->prepare('SELECT * FROM re_users WHERE user_id = ?');
    $stmt->bind_param('i', $user_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $data['error'] = 'There is no such user';
            return $data;
        }

        $data = $result->fetch_all(MYSQLI_ASSOC)[0];
    } else {
        $data['error'] = 'Error while fetching user data';
    }

    return $data;
}



function update_user_info($user_id, $name, $user_avatar, $phone, $email)
{
    global $conn;

    $message = [];

    $pname = rand(1000, 10000) . '-' . $user_avatar['name'];
    $tname = $user_avatar['tmp_name'];
    $upload_dir =  'frontend/uploads/';


    move_uploaded_file($tname, $upload_dir . $pname);

    $stmt = $conn->prepare("UPDATE re_users SET user_fullname = ?, user_profile = ?, user_phone = ?, user_email = ? WHERE user_id = ?");
    $stmt->bind_param('ssssi', $name, $pname, $phone, $email, $user_id);

    if ($stmt->execute()) {
        $message['success'] = "User Registered Successfully";
    } else {
        $message['error'] = "Error occured during the registration";
    }


    return $message;
}

function get_image_url(string $img_name)
{
    return get_root_directory_uri() . "/frontend/uploads/" . $img_name;
}

function display_reviews($user_id)
{
    $reviews = get_user_reviews($user_id);
    $max_star = 5;

    if ($reviews) :

        foreach ($reviews as $review) :
            $reviewer_id = $review['reviewer_id'];
            $reviewer_name = htmlspecialchars(get_username_by_id($reviewer_id));
            $permalink = 'user?id=' . urlencode($reviewer_id);
            $rating = (int) $review['user_rating'];
            $rating_percent = ($rating * 100) / 5;
            $review_content = htmlspecialchars($review['user_review']);

            $user_info = get_user_info_by_id($reviewer_id);
            $avatar = $user_info['user_profile'];
?>

            <div class="review-card py-1">
                <div class="review-items">
                    <div class="user-meta flex align-items-center gap-1">
                        <a href="<?php echo $permalink; ?>" target="_blank">
                            <?php if ($avatar != "") :
                                $img_url = get_image_url($avatar);
                            ?>
                                <img src="<?php echo $img_url; ?>" alt="<?php echo $reviewer_name; ?>">
                            <?php else : ?>
                                <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="Profile Image">
                            <?php endif; ?>
                        </a>
                        <span>
                            <a href="<?php echo $permalink; ?>" target="_blank"><?php echo $reviewer_name; ?></a>
                        </span>
                    </div>
                    <div class="star py-1">
                        <div class="rating">
                            <div class="star-filled" style="width: <?php echo $rating_percent; ?>%">
                                <?php for ($i = 0; $i < $max_star; $i++) : ?>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="black" />
                                    </svg>
                                <?php endfor; ?>
                            </div>
                            <div class="star-outline">
                                <?php for ($i = 0; $i < $max_star; $i++) : ?>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26ZM12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502L9.96214 9.69434L5.12921 10.2674L8.70231 13.5717L7.75383 18.3451L12.0006 15.968Z" fill="black" />
                                    </svg>
                                <?php endfor; ?>

                            </div>
                        </div>
                    </div>
                    <div class="review-response">
                        <span>
                            <?php echo $review_content; ?>
                        </span>
                    </div>
                </div>
            </div>

<?php
        endforeach;

    else :
        echo "There is no reviews";
    endif;
}
