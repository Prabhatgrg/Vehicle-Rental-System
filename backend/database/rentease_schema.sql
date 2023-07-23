CREATE TABLE IF NOT EXISTS re_users(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_fullname VARCHAR(80) NOT NULL,
    user_login VARCHAR(50) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    user_email VARCHAR(100) NOT NULL,
    user_phone VARCHAR(10) NOT NULL,
    user_profile VARCHAR(255) NOT NULL,
    user_rating VARCHAR(10) NOT NULL DEFAULT '0',
    user_total_rating VARCHAR(10) NOT NULL DEFAULT '0',
    user_rating_count INT DEFAULT 0,
    user_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE IF NOT EXISTS re_posts(
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    post_user INT,
    post_title VARCHAR(255) NOT NULL,
    post_image LONGTEXT NOT NULL,
    post_category VARCHAR(50) NOT NULL,
    post_location VARCHAR(100) NOT NULL,
    post_description VARCHAR(255) NOT NULL,
    post_delivery VARCHAR(5) NOT NULL,
    post_color VARCHAR(10) NOT NULL,
    post_fuel_type VARCHAR(20) NOT NULL,
    post_mileage VARCHAR(30) NOT NULL,
    post_price VARCHAR(30) NOT NULL,
    post_negotiable VARCHAR(10) NOT NULL,
    post_rent_start VARCHAR(50) NOT NULL,
    post_rent_end VARCHAR(50) NOT NULL,
    post_status VARCHAR(10) NOT NULL DEFAULT 'pending',
    post_views INT DEFAULT 0,
    post_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    FOREIGN KEY (post_user) REFERENCES re_users(user_id)
);

CREATE TABLE IF NOT EXISTS re_comments(
	comment_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INT,
    comment_post_id INT,
    comment_content VARCHAR(255) NOT NULL,
    comment_parent VARCHAR(20) DEFAULT false,
    comment_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    FOREIGN KEY (user_id) REFERENCES re_users(user_id),
    FOREIGN KEY (comment_post_id) REFERENCES re_posts(post_id)
);

CREATE TABLE IF NOT EXISTS re_user_roles(
    role_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INT,
    user_roles VARCHAR(25) DEFAULT 'user',
    FOREIGN KEY (user_id) REFERENCES re_users(user_id)
);

CREATE TABLE IF NOT EXISTS re_category(
    category_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    category_title VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS re_bookings(
    booking_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    booking_status VARCHAR(20) NOT NULL DEFAULT 'booked',
    booking_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    booking_startdate datetime NOT NULL,
    booking_enddate datetime NOT NULL,
    FOREIGN KEY (user_id) REFERENCES re_users(user_id),
    FOREIGN KEY (post_id) REFERENCES re_posts(post_id)
);

CREATE TABLE IF NOT EXISTS re_notifications(
    notification_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INT, 
    post_id INT,
    booking_id INT,
    FOREIGN KEY (user_id) REFERENCES re_users(user_id),
    FOREIGN KEY (post_id) REFERENCES re_posts(post_id),
    FOREIGN KEY (booking_id) REFERENCES re_bookings(booking_id)
);

CREATE TABLE IF NOT EXISTS re_reviews(
    review_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INT,
    reviewer_id INT,
    user_rating VARCHAR(10) NOT NULL DEFAULT '0',
    user_review VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES re_users(user_id),
    FOREIGN KEY (reviewer_id) REFERENCES re_users(user_id)
);

CREATE TABLE IF NOT EXISTS re_bookmarks (
    bookmark_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_id INT,
    post_id INT,
    FOREIGN KEY (user_id) REFERENCES re_users(user_id),
    FOREIGN KEY (post_id) REFERENCES re_posts(post_id) 
);

CREATE TRIGGER IF NOT EXISTS updateTotalRating
AFTER INSERT
ON re_reviews
FOR EACH ROW
UPDATE re_users SET user_total_rating = user_total_rating + NEW.user_rating WHERE user_id = NEW.user_id;

CREATE TRIGGER IF NOT EXISTS updateRatingCount
AFTER INSERT
ON re_reviews
FOR EACH ROW
UPDATE re_users SET user_rating_count = user_rating_count + 1 WHERE user_id = NEW.user_id;

CREATE TRIGGER IF NOT EXISTS updateRating
AFTER INSERT
ON re_reviews
FOR EACH ROW
UPDATE re_users SET user_rating = user_total_rating / (user_rating_count * 5)  WHERE user_id = NEW.user_id;

CREATE TRIGGER IF NOT EXISTS delteBookings
BEFORE DELETE
ON re_posts
FOR EACH ROW
DELETE FROM re_bookings WHERE post_id = OLD.post_id;