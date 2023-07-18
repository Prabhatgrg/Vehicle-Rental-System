<?php
if (!isset($_GET['id'])) :
    header('Location: ' . get_root_directory_uri() . '/profile');
endif;

$post_id = $_GET['id'];
$user_id = get_user_id();

if (!is_my_post($post_id, $user_id)) :
    header("Location: 404");
endif;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['postEditTitle'])) {
        $post_title = $_POST['postEditTitle'];
        $post_image_upload = $_FILES['postEditImageUpload'];
        $post_category = $_POST['postEditCategory'];
        $post_location = $_POST['postEditLocation'];
        $post_description = $_POST['postEditDescription'];
        $post_delivery = $_POST['postEditDelivery'];
        $post_colour = $_POST['postEditColour'];
        $post_fuel = $_POST['postEditFuel'];
        $post_mileage = $_POST['postEditMileage'];
        $post_price = $_POST['postEditPrice'];
        $post_negotiable = $_POST['postEditNegotiable'];

        $post_message = update_post($post_id, $post_title, $post_image_upload, $post_category, $post_location, $post_description, $post_delivery, $post_colour, $post_fuel, $post_mileage, $post_price, $post_negotiable);
    }
}


$post = get_post_by_id($post_id);

$title = $post['post_title'];
$post_cat = $post['post_category'];
$location = $post['post_location'];
$description = $post['post_description'];
$delivery = $post['post_delivery'];
$color = $post['post_color'];
$fuel = $post['post_fuel_type'];
$mileage = $post['post_mileage'];
$price = $post['post_price'];
$negotiable = $post['post_negotiable'];


get_header();
?>

<?php if (isset($post_message)) :
    $key = key($post_message);
?>
    <div class="alert mb-2">
        <div class="container">
            <p class="bg-<?php echo $key; ?> p-1">
                <?php echo $post_message[$key]; ?>
            </p>
        </div>
    </div>
<?php endif; ?>

<div class="post-edit py-5">
    <div class="container">
        <div class="flex justify-content-center">
            <div class="col-md-9 col-lg-6">
                <div class="mb-2">
                    <p>
                        Note: If you want to update the post then you have to reupload your post images.
                    </p>
                </div>
                <form method="POST" class="grid gap-2" enctype="multipart/form-data">
                    <div class="form-floating">
                        <input type="text" name="postEditTitle" id="postEditTitle" class="form-control" placeholder="Post Title" value="<?php echo $title; ?>">
                        <label for="postEditTitle">Post Title</label>
                    </div>
                    <div class="form-file-upload">
                        <span class="form-title mb-2">Upload Image For Post</span>
                        <label for="postEditImageUpload">
                            <svg width="60" height="60" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: none;
                                            stroke: #000;
                                            stroke-linecap: round;
                                            stroke-linejoin: round;
                                            stroke-width: 2px;
                                        }
                                    </style>
                                </defs>
                                <title />
                                <g id="plus">
                                    <line class="cls-1" x1="16" x2="16" y1="7" y2="25" />
                                    <line class="cls-1" x1="7" x2="25" y1="16" y2="16" />
                                </g>
                            </svg>
                        </label>
                        <input type="file" name="postEditImageUpload[]" id="postEditImageUpload" class="form-file" multiple>
                    </div>
                    <div class="form-field">
                        <label for="postEditCategory">Category</label>
                        <select name="postEditCategory" id="postEditCategory" class="form-select">
                            <?php

                            $categories = get_categories();

                            if ($categories) :
                            ?>

                                <?php foreach ($categories as $category) :
                                    $cat_id = $category['category_id'];
                                ?>

                                    <option value="<?php echo $cat_id; ?>" <?php echo $post_cat == $cat_id ? 'selected' : null; ?>><?php echo $category['category_title']; ?></option>

                                <?php endforeach; ?>
                            <?php else : ?>
                                <option value="false">No Category</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-floating">
                        <input type="text" name="postEditLocation" id="postEditLocation" class="form-control" placeholder="Location" value="<?php echo $location; ?>">
                        <label for="postEditLocation">Location</label>
                    </div>
                    <div class="form-floating">
                        <textarea name="postEditDescription" id="postEditDescription" class="form-control" placeholder="Description"><?php echo $description; ?></textarea>
                        <label for="postEditDescription">Description</label>
                    </div>
                    <div class="form-field">
                        <label for="postEditDelivery">Delivery</label>
                        <select name="postEditDelivery" id="postEditDelivery" class="form-select">
                            <option value="true" <?php echo $delivery == 'true' ? 'selected' : null; ?>>Yes</option>
                            <option value="false" <?php echo $delivery == 'false' ? 'selected' : null; ?>>No</option>
                        </select>
                    </div>
                    <div class="form-floating">
                        <input type="color" name="postEditColour" id="postEditColour" class="form-control form-color" placeholder="Colour" value="<?php echo $color; ?>">
                        <label for="postEditColour">Colour</label>
                    </div>
                    <div class="form-field">
                        <label for="postEditFuel">Fuel</label>
                        <select name="postEditFuel" id="postEditFuel" class="form-select">
                            <option value="Electric" <?php echo $fuel == 'Electric' ? 'selected' : null; ?>>Electric</option>
                            <option value="Petrol" <?php echo $fuel == 'Petrol' ? 'selected' : null; ?>>Petrol</option>
                            <option value="Diesel" <?php echo $fuel == 'Diesel' ? 'selected' : null; ?>>Diesel</option>
                        </select>
                    </div>
                    <div class="form-floating">
                        <input type="text" name="postEditMileage" id="postEditMileage" class="form-control" placeholder="Mileage" value="<?php echo $mileage; ?>">
                        <label for="postEditMileage">Mileage</label>
                    </div>
                    <div class="form-group grid column-2">
                        <div class="form-floating">
                            <input type="number" name="postEditPrice" id="postEditPrice" class="form-control" placeholder="Price" value="<?php echo $price; ?>">
                            <label for="postEditPrice">Price</label>
                        </div>
                        <div class="form-field">
                            <select name="postEditNegotiable" id="postEditNegotiable" class="form-select">
                                <option value="" <?php echo $negotiable == '' ? 'selected' : null; ?>>Negotiable</option>
                                <option value="true" <?php echo $negotiable == 'true' ? 'selected' : null; ?>>Yes</option>
                                <option value="false" <?php echo $negotiable == 'false' ? 'selected' : null; ?>>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-submit">
                        <input type="hidden" name="postEdit_submit" value="submit">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
get_footer();
