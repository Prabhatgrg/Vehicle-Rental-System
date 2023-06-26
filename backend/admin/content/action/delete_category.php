<?php
if (isset($_GET['category_id']) && empty($_GET['category_id']))
    echo '<script>window.location.href = "' . get_root_directory_uri() . '/admin?page=' . urlencode('category') . '"</script>';

$category_id = $_GET['category_id'];

$message = delete_category($category_id);

?>
<?php
if (isset($message['success'])) :
?>
    <div class="alert mb-2">
        <p class="bg-success p-1">
            <?php echo $message['success']; ?>
        </p>
    </div>
<?php
endif;
?>
<?php
if (isset($message['error'])) :
?>
    <div class="alert mb-2">
        <p class="bg-error p-1">
            <?php echo $message['error']; ?>
        </p>
    </div>
<?php
endif;
?>
<?php
if (isset($message['category_not_exists'])) :
?>
    <div class="alert mb-2">
        <p class="bg-error p-1">
            <?php echo $message['category_not_exists']; ?>
        </p>
    </div>
<?php
endif;
?>

<a href="<?php echo get_root_directory_uri(); ?>/admin?page=<?php echo urlencode('category'); ?>" title="Categories">Back to category</a>