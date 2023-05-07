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
                    <div class="divider">
                        <div class="user-detail-section">
                            <span class="user-name">User</span>
                            <a href="tel:9850492847" class="user-contact">9850492847</a>
                            <span class="user-location">
                                <img class="location-icon" src="./frontend/assets/img/png/location.png" alt="Location Icon">
                                <span class="user-location-details">N/A</span>
                            </span>

                        </div>
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
                                <div class="tab-ad-container text-center">
                                    Here Goes the Ad posts that user posted.
                                </div>
                            </div>
                            <div class="tab-pane" id="user-save-list">
                                <div class="container">
                                    <div class="grid gap-1 column-3">
                                        <div class="card">
                                            <figure class="card-img">
                                                <a href="#">
                                                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                                                </a>
                                            </figure>
                                            
                                            <div class="card-body pt-1">
                                                <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                                                <span class="price">Rs. 5,000/day</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <figure class="card-img">
                                                <a href="#">
                                                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                                                </a>
                                            </figure>
                                            
                                            <div class="card-body pt-1">
                                                <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                                                <span class="price">Rs. 5,000/day</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <figure class="card-img">
                                                <a href="#">
                                                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                                                </a>
                                            </figure>
                                            
                                            <div class="card-body pt-1">
                                                <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                                                <span class="price">Rs. 5,000/day</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <figure class="card-img">
                                                <a href="#">
                                                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                                                </a>
                                            </figure>
                                            
                                            <div class="card-body pt-1">
                                                <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                                                <span class="price">Rs. 5,000/day</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <figure class="card-img">
                                                <a href="#">
                                                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                                                </a>
                                            </figure>
                                            
                                            <div class="card-body pt-1">
                                                <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                                                <span class="price">Rs. 5,000/day</span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <figure class="card-img">
                                                <a href="#">
                                                    <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/jpg/default-image.jpg" alt="Default Image">
                                                </a>
                                            </figure>
                                            
                                            <div class="card-body pt-1">
                                                <h3 class="card-title h5"><a href="#">Car in rent</a></h3>
                                                <span class="price">Rs. 5,000/day</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="user-post-reviews">
                                <div class="tab-review-container text-center">
                                    Here Goes All the comments that user's posted post has.
                                </div>
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