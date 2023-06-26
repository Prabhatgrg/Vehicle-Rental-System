<?php

if (isset($_GET['category_id']) && empty($_GET['category_id']))
    echo '<script>window.location.href = "' . get_root_directory_uri() . '/admin?page=' . urlencode('category') . '"</script>';

$category_id = $_GET['category_id'];
$category_name = get_category_by_id($category_id);


if ($_SERVER['REQUEST_METHOD'] == 'POST') :

    $cetegory_id = $_POST['category_id'];
    $cetegory_title = $_POST['category_title'];

    $message = update_category($cetegory_id, $cetegory_title);

endif;

?>

<div class="flex flex-wrap">
    <div class="col-md-12">
        <h2 class="mb-2 h3">Edit Category</h2>
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
        if (isset($message['category_exists'])) :
        ?>
            <div class="alert mb-2">
                <p class="bg-error p-1">
                    <?php echo $message['category_exists']; ?>
                </p>
            </div>
        <?php
        endif;
        ?>
    </div>
    <div class="col-md-6">
        <form method="post">
            <div class="form-field mb-2">
                <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
                <label for="category-title">Category Title</label>
                <input type="text" name="category_title" id="category-title" class="form-control" value="<?php echo $category_name; ?>" required>
            </div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>

    </div>
</div>