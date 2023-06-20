<?php
// to post comments
function post_comment($post_id, $user_id, $comment_content, $reply_to)
{
    global $conn;

    if (empty($reply_to)) :

        $stmt = $conn->prepare("INSERT INTO re_comments(comment_post_id, user_id, comment_content) VALUES (?, ?, ?)");
        $stmt->bind_param('iis', $post_id, $user_id, $comment_content);
        $stmt->execute();

    else :

        $stmt = $conn->prepare("INSERT INTO re_comments(comment_post_id, user_id, comment_content, comment_parent) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('iisi', $post_id, $user_id, $comment_content, $reply_to);
        $stmt->execute();

    endif;
}

// function to get all the comments of post from database
function get_comments_data($post_id)
{
    global $conn;

    $message = [];

    $stmt = $conn->prepare("SELECT * FROM re_comments WHERE comment_post_id = ?");
    $stmt->bind_param('i', $post_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $message['no_comments'] = "This post has no comments";
        return $message;
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}

// function to get all the comments that have no parents
function get_no_parent_comments($post_id)
{
    global $conn;

    $message = [];

    $stmt = $conn->prepare("SELECT * FROM re_comments WHERE comment_post_id = ?");
    $stmt->bind_param('i', $post_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $message['no_comments'] = "This post has no comments";
        return $message;
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}

// function to get boolean value if has comments or not
function has_replay_comments($user_id): bool
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM re_comments WHERE comment_parent = ?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows == 0) :
        return false;
    endif;
    return true;
}

// function to get comments by user id
function get_comments_by_user_id($user_id)
{
    global $conn;


    // $stmt = $conn->prepare("SELECT * FROM re_comments WHERE comment_parent = false AND comment_post_id = ?");
    // $stmt->bind_param('i', $post_id);
    // $stmt->execute();


    $stmt = $conn->prepare("SELECT * FROM re_comments WHERE user_id = ?  and comment_parent <> false");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();

    $result = $stmt->get_result();
    // var_dump($result);
    // var_dump($result->fetch_all(MYSQLI_ASSOC));

    if ($result->num_rows == 0) {
        $message['no_comments'] = "No reply.";
        return $message;
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}

// function to show reply
function show_reply($comment_id, $user_id)
{
    if (has_replay_comments($comment_id)) :
        $reply_comments = get_comments_by_user_id($user_id);

        // echo '<pre>';
        // var_dump($reply_comments);
        // echo '</pre>';
        echo  '<ul class="sub-comment-list">';
        foreach ($reply_comments as $comment) :

            $comment_username = get_username_by_id($comment['user_id']);
            $comment_date = get_formated_date($comment['comment_date']);
            $current_parent_id = $comment['comment_parent'];
?>


            <li data-comment-id="<?php echo $comment['comment_id']; ?>">
                <?php echo 'parent_id: ' . $current_parent_id; ?>
                <?php echo 'comment_id: ' . $comment['comment_id']; ?>

                <div class="user-info">
                    <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                    <span class="user-name"><?php echo $comment_username; ?></span>
                </div>
                <div class="comment-container">
                    <p>
                        <?php echo $comment['comment_content']; ?>
                    </p>
                </div>
                <div class="comment-meta">
                    <span class="time"><?php echo $comment_date; ?></span>
                    <?php if (is_login()) : ?>
                        <button class="btn-reply">Reply</button>
                    <?php endif; ?>
                </div>

                <?php
                // check if sub comments
                // if (has_replay_comments($comment['comment_id'])) :
                //     show_reply($comment['comment_id'], $comment['user_id']);
                // endif;
                ?>



            </li>


    <?php
        endforeach;
        echo '</ul>';
    endif;
}

//  function to show comments
function show_comments($comments, $parent_id = null)
{
    ?>


    <?php
    // echo '<pre>';
    // var_dump($comments);
    // echo '</pre>';
    foreach ($comments as $comment) :

        $comment_username = get_username_by_id($comment['user_id']);
        $comment_date = get_formated_date($comment['comment_date']);
        $current_parent_id = $comment['comment_parent'];


        if ($current_parent_id == 'false') :


    ?>

            <li data-comment-id="<?php echo $comment['comment_id']; ?>">
                <div class="user-info">
                    <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                    <span class="user-name"><?php echo $comment_username; ?></span>
                </div>
                <div class="comment-container">
                    <p>
                        <?php echo $comment['comment_content']; ?>
                    </p>
                </div>
                <div class="comment-meta">
                    <span class="time"><?php echo $comment_date; ?></span>
                    <?php if (is_login()) : ?>
                        <button class="btn-reply">Reply</button>
                    <?php endif; ?>
                </div>


                <?php


                show_reply($comment['comment_id'], $comment['user_id']); ?>

            </li>

    <?php
        endif;

    endforeach; ?>


<?php
}
