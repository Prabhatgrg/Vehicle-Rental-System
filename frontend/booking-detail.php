<?php
if (!isset($_GET['id']) || empty($_GET['id'])) :
    header('Location: 404');
endif;

$post_id = $_GET['id'];

get_header("Booking Detail");
?>

<section class="py-5">
    <div class="container">

    </div>
</section>

<?php
get_footer();
