<?php get_header("Search Result");

$result = '';

if($_SERVER['REQUEST_METHOD']=='POST') :
    $result = $_POST['search'];
endif;

?>

<section class="result">
    <div class="container">
        <div class="flex justify-content-center align-items-center py-2">
            <div class="col-md-5 col-lg-4">
                <h3>Search Result For: <?php echo $result;?></h3>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>