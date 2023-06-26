<?php
if (!isset($_GET['action'])) :

    $categories = get_categories();

    if ($categories) :
        echo '<h2 class="h3 mb-1">Categories</h2>', '<ul class="category-list">';

        foreach ($categories as $category) :
?>

            <li>
                <strong><?php echo $category['category_title']; ?></strong>
                <div class="list-actions">
                    <a href="?page=<?php echo urlencode('category'); ?>&action=<?php echo urlencode('edit category'); ?>&category_id=<?php echo urlencode($category['category_id']); ?>" class="edit-category">Edit</a>
                    <a href="?page=<?php echo urlencode('category'); ?>&action=<?php echo urlencode('delete category'); ?>&category_id=<?php echo urlencode($category['category_id']); ?>" class="delete-category">Delete</a>
                </div>
            </li>

    <?php
        endforeach;
        echo '</ul>';

    else :
        echo '<span>There is no category found.</span>';
    endif;

elseif ($_GET['action'] == 'add category') :

    require_once 'action/add_category.php';

elseif ($_GET['action'] == 'edit category') :

    require_once 'action/edit_category.php';

elseif ($_GET['action'] == 'delete category') :

    require_once 'action/delete_category.php';

else : ?>


<?php endif; ?>