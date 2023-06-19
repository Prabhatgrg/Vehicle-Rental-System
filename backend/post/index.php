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
    $stmt->bind_param('s', $post_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $message['no_comments'] = "This post has no comments";
        return $message;
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}

//  function to show comments
function show_comments($comments, $parent_id = null)
{
?>


    <?php

    foreach ($comments as $comment) :

        $comment_username = get_username_by_id($comment['user_id']);
        $comment_date = get_formated_date($comment['comment_date']);
        $current_parent_id = $comment['comment_parent'];

        if ($comment['comment_parent'] == null) :

    ?>

            <li data-comment-id="<?php echo $comment['comment_id'] ?>">
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
                /* if ($comment["comment_parent"] == $current_parent_id) :

                    // show_comments($comments, $comment["comment_id"]); ?>
                

                    <ul class="sub-comment-list">
                        <?php show_comments($comments, $comment["comment_parent"]);
                        ?>
                    </ul>

              <?php   endif;
                 */

                ?>
            </li>

    <?php
        endif;

    endforeach; ?>


<?php
}
