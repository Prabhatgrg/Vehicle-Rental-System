<?php get_header(); ?>

<?php
session_start();
if (isset($_SESSION['success'])) :
    $message = $_SESSION['success'];
    unset($_SESSION['success']);
?>
    <div class="alert">
        <div class="container">
            <p class="bg-success p-2">
                <?php echo $message; ?>
            </p>
        </div>
    </div>
<?php
endif;
?>

<section class="py-5">
    <div class="container">
        <h1>home page</h1>

    </div>
</section>


<?php
get_footer();
