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

// function to get no prents comment of certain post
function get_no_parent_comments($post_id)
{
    global $conn;

    $message = [];

    $stmt = $conn->prepare("SELECT * FROM re_comments WHERE comment_post_id = ? AND comment_parent = false");
    $stmt->bind_param('i', $post_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $message['no_comments'] = "This post has no comments";
        return $message;
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}

// function to get reply comments from comment id
function get_reply_comments($comment_id)
{
    global $conn;

    $message = [];

    $stmt = $conn->prepare("SELECT * FROM re_comments WHERE comment_parent = ?");
    $stmt->bind_param('i', $comment_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $message['no_comments'] = "This comment has no reply";
        return $message;
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}

//  function to check has comment reply
function has_reply($comment_id)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM re_comments WHERE comment_parent = ?");
    $stmt->bind_param('i', $comment_id);
    $stmt->execute();

    $result = $stmt->get_result();

    // var_dump($result);
    if ($result->num_rows == 0) :
        return false;
    endif;
    return true;
}


// function to display main comments
function display_comments($post_id)
{
    $comments = get_no_parent_comments($post_id);

    if (!isset($comments['no_comments'])) :

        echo '<ul class="comment-list">';

        foreach ($comments as $comment) :

            $comment_username = get_username_by_id($comment['user_id']);
            $comment_date = get_formated_date($comment['comment_date']);
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
                        <button class="btn-reply">Reply</button >
                        <?php if($_SESSION['user_id']===$comment['user_id']) :?>
                            <a href="post?id=<?php echo urlencode($post_id);?>&commentid=<?php echo urlencode($comment['comment_id']);?>&action=<?php echo urlencode('delete');?>">Delete</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>


                <?php
                if (has_reply($comment['comment_id'])) :
                    display_reply($comment['comment_id']);
                endif;
                ?>

            </li>
<?php
        endforeach;
        echo '</ul>';

    else :
        echo '<div class="mb-3"><span> There is no comments of this post.</span></div>';
    endif;
}


// function to display comment reply
function display_reply($comment_id)
{
    global $post_id;
    $replies = get_reply_comments($comment_id);

    echo  '<ul class="sub-comment-list">';
    foreach ($replies as $reply) :
        $comment_username = get_username_by_id($reply['user_id']);
        $comment_date = get_formated_date($reply['comment_date']);


?>


        <li data-comment-id="<?php echo $reply['comment_id']; ?>">

            <div class="user-info">
                <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                <span class="user-name"><?php echo $comment_username; ?></span>
            </div>
            <div class="comment-container">
                <p>
                    <?php echo $reply['comment_content']; ?>
                </p>
            </div>
            <div class="comment-meta">
                <span class="time"><?php echo $comment_date; ?></span>
                <?php if (is_login()) : ?>
                    <button class="btn-reply">Reply</button>
                    <?php if($_SESSION['user_id']===$reply['user_id']) :?>
                        <a href="post?id=<?php echo urlencode($post_id);?>&commentid=<?php echo urlencode($reply['comment_id']);?>&action=<?php echo urlencode('delete');?>">Delete</a>
                    <?php endif; ?>
                <?php endif; ?>
                
            </div>

            <?php
            // check if sub comments
            if (has_reply($reply['comment_id'])) :
                display_reply($reply['comment_id']);
            endif;
            ?>
        </li>
        <?php

    endforeach;
    echo '</ul>';
}