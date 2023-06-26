<?php

if (!is_admin()) :
    header('Location: ' . get_root_directory_uri() . '/profile');
endif;
require_once 'includes/header.php'; ?>

<div class="flex flex-wrap">
    <aside class="col-2 col-md-3 bg-dark">
        <?php require_once 'includes/sidebar.php'; ?>
    </aside>
    <aside class="col-10 col-md-9">
        <section class="py-3">
            <?php

            if (isset($_GET['page'])) :
                switch ($_GET['page']):
                    case 'posts':
                        require_once 'content/content-post.php';
                        break;

                    case 'users':
                        require_once 'content/content-user.php';
                        break;

                    case 'category':
                        require_once 'content/content-category.php';
                        break;

                    default:
                        require_once 'content/content-dashboard.php';
                        break;
                endswitch;
            else :
                require_once 'content/content-dashboard.php';
            endif;

            ?>
        </section>
    </aside>
</div>

<?php require_once 'includes/footer.php'; ?>