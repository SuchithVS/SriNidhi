CREATE DATABASE IF NOT EXISTS restaurant_management;
USE restaurant_management;

CREATE TABLE IF NOT EXISTS restaurants (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image_url VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS reservations (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    restaurant_id INT NOT NULL,
    customer_name VARCHAR(255) NOT NULL,
    customer_email VARCHAR(255) NOT NULL,
    reservation_date DATE NOT NULL,
    reservation_time TIME NOT NULL,
    guests INT NOT NULL,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(id)
);

INSERT INTO restaurants (name, description, image_url) VALUES
('Restaurant A', 'A wonderful place to enjoy fine dining.', 'https://example.com/restaurant_a.jpg'),
('Restaurant B', 'Known for its great atmosphere and delicious food.', 'https://example.com/restaurant_b.jpg'),
('Restaurant C', 'A perfect spot for family and friends.', 'https://example.com/restaurant_c.jpg');
