<?php get_header("Search Result");

if ($_SERVER['REQUEST_METHOD'] == 'GET') :
    if (isset($_GET['submit'])) :
        $search = $_GET['search'];
        $query = $conn->prepare("SELECT * FROM re_posts WHERE (post_title LIKE '%$search%' OR post_location LIKE '%$search%') AND post_status = 'published'");
        $query->execute();
        $result = $query->get_result();
    endif;
endif;
?>

<section class="result">
    <div class="container">
        <div class="flex justify-content-center align-items-center py-2">
            <div class="col-lg-10">
                <h3 class="text-center divider-bottom my-2">Search Result For: <?php echo $_GET['search']; ?></h3>
                <?php
                if ($result->num_rows > 0) :
                    while ($row = $result->fetch_assoc()) { ?>
                    
                <?php }
                else :
                    echo "<div class='text-center'>No Data Found</div>";
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>