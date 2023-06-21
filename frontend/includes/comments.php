<?php global $post_id; ?>

<div id="comments">
    <ul class="comment-list">
        <?php display_comments($post_id); ?>
    </ul>
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
        <span class="text-error">Please login to post comment</span>
    <?php endif; ?>
</div>