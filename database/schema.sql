CREATE TABLE IF NOT EXISTS vehicles(
    id INT AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    year INT NOT NULL,
    rate DECIMAL(8,2) NOT NULL,
    availability ENUM('available', 'rented') NOT NULL DEFAULT 'available'
);

CREATE TABLE IF NOT EXISTS customers(
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(80) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(10) NOT NULL,
    date DATE NOT NULL
);

CREATE TABLE IF NOT EXITS posts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    image longblog NOT NULL,
    crated datetime NOT NULL DEFAULT current_timestamp()
);

CREATE TABLE IF NOT EXISTS bookings(
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_id INT NOT NULL,
    customer_id INT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    total_cost DECIMAL(8,2) NOT NULL,
    FOREIGN KEY (vehicle_id) REFERENCES vehicles(id),
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);