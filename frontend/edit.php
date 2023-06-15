<?php
if (!isset($_GET['id'])) :
    header('Location: ' . get_root_directory_uri() . '/profile');
endif;


get_header();
?>

<div class="post-edit py-5">
    <div class="container">
        <div class="flex justify-content-center">
            <div class="col-md-9 col-lg-6">
                <form action="#" method="POST" class="grid gap-2">
                    <div class="form-floating">
                        <input type="text" name="postEditTitle" id="postEditTitle" class="form-control" placeholder="Post Title">
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
                        <input type="file" name="postEditImageUpload" id="postEditImageUpload" class="form-file" multiple>
                    </div>
                    <div class="form-field">
                        <label for="postEditCategory">Category</label>
                        <select name="postEditCategory" id="postEditCategory" class="form-select">
                            <option value="Bike">Bike</option>
                            <option value="Scooty">Scooty</option>
                            <option value="Car">Car</option>
                        </select>
                    </div>
                    <div class="form-floating">
                        <input type="text" name="postEditLocation" id="postEditLocation" class="form-control" placeholder="Location">
                        <label for="postEditLocation">Location</label>
                    </div>
                    <div class="form-floating">
                        <textarea name="postEditDescription" id="postEditDescription" class="form-control" placeholder="Description"></textarea>
                        <label for="postEditDescription">Description</label>
                    </div>
                    <div class="form-field">
                        <label for="postEditDelivery">Delivery</label>
                        <select name="postEditDelivery" id="postEditDelivery" class="form-select">
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                    </div>
                    <div class="form-floating">
                        <input type="color" name="postEditColour" id="postEditColour" class="form-control form-color" placeholder="Colour">
                        <label for="postEditColour">Colour</label>
                    </div>
                    <div class="form-field">
                        <label for="postEditFuel">Fuel</label>
                        <select name="postEditFuel" id="postEditFuel" class="form-select">
                            <option value="Electric">Electric</option>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                        </select>
                    </div>
                    <div class="form-floating">
                        <input type="text" name="postEditMileage" id="postEditMileage" class="form-control" placeholder="Mileage">
                        <label for="postEditMileage">Mileage</label>
                    </div>
                    <div class="form-group grid column-2">
                        <div class="form-floating">
                            <input type="number" name="postEditPrice" id="postEditPrice" class="form-control" placeholder="Price">
                            <label for="postEditPrice">Price</label>
                        </div>
                        <div class="form-field">
                            <select name="postEditNegotiable" id="postEditNegotiable" class="form-select">
                                <option value="" selected>Negotiable</option>
                                <option value="true">Yes</option>
                                <option value="false">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group grid column-2">
                        <div class="form-floating">
                            <input type="date" name="postEditRentStartDate" id="postEditRentStartDate" class="form-control">
                            <label for="postEditRentStartDate">Vehicle Rent Start Date</label>
                        </div>
                        <div class="form-floating">
                            <input type="date" name="postEditRentEndDate" id="postEditRentEndDate" class="form-control">
                            <label for="postEditRentEndDate">Vehicle Rent End Date</label>
                        </div>
                    </div>
                    <div class="form-submit">
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
get_footer();
