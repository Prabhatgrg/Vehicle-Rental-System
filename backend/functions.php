<?php

require_once 'users/index.php';

function post_comment($post_id, $user_id, $comment_content, $reply_to = null)
{
    global $conn;

    if ($reply_to != null) :

        $stmt = $conn->prepare('INSERT INTO re_comments (comment_post_id, user_id, comment_content, comment_parent) VALUES (?, ?, ?, ?, ?');

    else :

    endif;
}


function isadmin(){

}