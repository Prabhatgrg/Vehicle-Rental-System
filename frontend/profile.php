<?php
get_header("Profile")
?>


<section class="user-profile py-5">
    <div class="container">
        <div class="flex">
            <div class="col-4">
                <aside class="user-info-section">
                    <div class="user-image-section">
                        <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="Profile Image">
                    </div>
                    <div class="user-detail-section">
                        <span class="user-name">User</span>
                        <a href="tel:9850492847" class="user-contact">9850492847</a>
                        <span class="user-location">
                            <img class="location-icon" src="./frontend/assets/img/png/location.png" alt="Location Icon">
                            <span class="user-location-details">N/A</span>
                        </span>
                    </div>
                    
                </aside>
            </div>
            <div class="col-8 ps-2">
                <aside class="user-activities">
                    <div class="tabs-container">
                        <ul class="tab-list">
                            <li><button class="tab-button active" data-target="#user-ad-posts">Ad Posts</button></li>
                            <li><button class="tab-button" data-target="#user-save-list">Save List</button></li>
                            <li><button class="tab-button" data-target="#user-post-reviews">Reviews</button></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="user-ad-posts">
                                Here Goes the Ad posts that user posted.
                            </div>
                            <div class="tab-pane" id="user-save-list">
                                Here Goes the bookmarked posts.
                            </div>
                            <div class="tab-pane" id="user-post-reviews">
                                Here Goes All the comments that user's posted post has.
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>

    </div>
</section>

<?php
get_footer()
?>