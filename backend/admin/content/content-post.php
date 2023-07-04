<h1 class="h3 mb-2">Posts</h1>

<?php
$update_message;

if ($_SERVER['REQUEST_METHOD'] == 'POST') :

    if (isset($_POST['change_status'])) :
        $post_id = $_POST['_post_id'];
        $post_status = $_POST['postStatus'];

        $update_message = update_post_status($post_id, $post_status);

    endif;
endif;

if (isset($update_message['success'])) :
    $message = $update_message['success'];
?>
    <div class="alert mb-2">
        <p class="bg-success p-2">
            <?php echo $message; ?>
        </p>
    </div>
<?php
endif;

if (isset($update_message['error'])) :
    $message = $update_message['error'];
?>
    <div class="alert mb-2">
        <p class="bg-error p-2">
            <?php echo $message; ?>
        </p>
    </div>
<?php
endif;



if (!isset($_GET['status'])) :

    $posts = get_posts();

    if ($posts) :
        echo '<ul class="posts-list">';
        foreach ($posts as $post) :

            display_post($post);

        endforeach;
        echo '</ul>';
    else :
        echo 'There is no post available.';
    endif;

elseif ($_GET['status'] == 'pending') :

    $posts = get_pending_posts();

    if ($posts) :
        echo '<ul class="posts-list">';
        foreach ($posts as $post) :

            display_post($post);

        endforeach;
        echo '</ul>';
    else :
        echo 'There is no post available.';
    endif;


elseif ($_GET['status'] == 'published') :

    $posts = get_published_posts();

    if ($posts) :
        echo '<ul class="posts-list">';
        foreach ($posts as $post) :

            display_post($post);

        endforeach;
        echo '</ul>';
    else :
        echo 'There is no post available.';
    endif;

endif;
