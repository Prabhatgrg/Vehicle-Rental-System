<?php if (!isset($_GET['action'])) : ?>


<?php else : ?>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') :

        $category_title = $_POST['category-title'];

        $message = add_category($category_title);

    endif;

    ?>




    <div class="flex flex-wrap">
        <div class="col-md-12">
            <h2 class="h3 mb-2">Add category</h2>
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
        </div>
        <div class="col-md-6">
            <form method="post">
                <div class="form-field mb-2">
                    <label for="category-title">Category Title</label>
                    <input type="text" name="category-title" id="category-title" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>

<?php endif; ?>