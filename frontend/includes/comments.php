<?php

global $post_id;

$comments = get_comments_data($post_id);

?>

<div id="comments">


    <?php if (!isset($comments['no_comments'])) :
        echo '<ul class="comment-list">';
        show_comments($comments);
        echo '</ul>';

    else : ?>

    <?php endif; ?>


    <?php '

    <ul class="comment-list">






        <li data-comment-id="1">
            <div class="user-info">
                <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                <span class="user-name">User One</span>
            </div>
            <div class="comment-container">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat ab, magnam vitae, saepe corrupti quas voluptatum rem odit labore placeat aliquid repellendus maiores dicta veritatis. Nam unde asperiores doloribus magnam?
                </p>
            </div>
            <div class="comment-meta">
                <span class="time">Just Now</span>
                <button class="btn-reply">Reply</button>
            </div>

            <ul class="sub-comment-list">
                <li data-comment-id="2">
                    <div class="user-info">
                        <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
                        <span class="user-name">User Two</span>
                    </div>
                    <div class="comment-container">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat ab, magnam vitae, saepe corrupti quas voluptatum rem odit labore placeat aliquid repellendus maiores dicta veritatis. Nam unde asperiores doloribus magnam?
                        </p>
                    </div>
                    <div class="comment-meta">
                        <span class="time">Just Now</span>
                        <button class="btn-reply">Reply</button>
                    </div>
                </li>
            </ul>
        </li>
    </ul>'; ?>
    <?php if (is_login()) : ?>
        <form method="POST" id="comment-form" class="comment-form" autocomplete="off">
            <img class="user-image" src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="default user avatar">
            <div class="form-field flex-1">
                <div class="replying-to">
                    <span class="replying-user"></span>
                    <button type="button" class="btn-close btn-cancel-reply">
                        <span class="line"></span>
                    </button>
                </div>
                <input type="hidden" name="reply-to" id="reply-to" value="">
                <textarea name="comment-field" id="comment-field" class="form-control" placeholder="Comment"></textarea>
                <button type="submit" class="btn btn-dark">
                    Comment
                </button>
            </div>
        </form>
    <?php else : ?>
        .
        <span class="text-error">Please login to post comment</span>

    <?php endif; ?>
</div>