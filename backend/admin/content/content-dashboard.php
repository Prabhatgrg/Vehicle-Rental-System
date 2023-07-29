<h2 class="h3 mb-3">Dashboard</h2>
<div class="grid column-4 gap-2">
    <div class="overview-card">
        <h3 class="h6 mb-1">Total Posts</h3>
        <span class="fw-bold"><?php echo get_total_post_count(); ?></span>
    </div>
    <div class="overview-card">
        <h3 class="h6 mb-1">Total Users</h3>
        <span class="fw-bold"><?php echo get_total_user_count(); ?></span>
    </div>
    <div class="overview-card">
        <h3 class="h6 mb-1">Total Categories</h3>
        <span class="fw-bold"><?php echo get_total_categories_count(); ?></span>
    </div>
    <div class="overview-card">
        <h3 class="h6 mb-1">Total Pending Posts</h3>
        <span class="fw-bold"><?php echo get_total_pending_post_count(); ?></span>
    </div>
    <div class="overview-card">
        <h3 class="h6 mb-1">Total Published Posts</h3>
        <span class="fw-bold"><?php echo get_total_published_post_count(); ?></span>
    </div>
    <div class="overview-card">
        <h3 class="h6 mb-1">Total Comments</h3>
        <span class="fw-bold"><?php echo get_total_comments_count(); ?></span>
    </div>
    <div class="overview-card">
        <h3 class="h6 mb-1">Total Bookings</h3>
        <span class="fw-bold"><?php echo get_total_bookings_count(); ?></span>
    </div>
</div>