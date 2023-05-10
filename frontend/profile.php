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
                                <!-- <div class="tab-review-container text-center">
                                    Here Goes All the comments that user's posted post has.
                                </div> -->
                                <div class="review-card">
                                    <div class="review-items">
                                        <div class="user-meta flex align-items-center gap-1">
                                            <a href="#">
                                                <img src="<?php echo get_theme_directory_uri(); ?>/assets/img/png/default-user.png" alt="Default Image">
                                            </a>
                                            <span>
                                                <a href="#">User</a>
                                            </span>
                                        </div>
                                        <div class="star py-1">
                                            <div class="rating">
                                                <ul class="star-filled">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="black" />
                                                    </svg>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="black" />
                                                    </svg>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="black" />
                                                    </svg>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="black" />
                                                    </svg>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z" fill="black" />
                                                    </svg>
                                                </ul>
                                                <ul class="star-outline">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26ZM12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502L9.96214 9.69434L5.12921 10.2674L8.70231 13.5717L7.75383 18.3451L12.0006 15.968Z" fill="black" />
                                                    </svg>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26ZM12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502L9.96214 9.69434L5.12921 10.2674L8.70231 13.5717L7.75383 18.3451L12.0006 15.968Z" fill="black" />
                                                    </svg>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26ZM12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502L9.96214 9.69434L5.12921 10.2674L8.70231 13.5717L7.75383 18.3451L12.0006 15.968Z" fill="black" />
                                                    </svg>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26ZM12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502L9.96214 9.69434L5.12921 10.2674L8.70231 13.5717L7.75383 18.3451L12.0006 15.968Z" fill="black" />
                                                    </svg>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26ZM12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502L9.96214 9.69434L5.12921 10.2674L8.70231 13.5717L7.75383 18.3451L12.0006 15.968Z" fill="black" />
                                                    </svg>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="review-response">
                                            <span>Test Review</span>
                                        </div>
                                    </div>
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