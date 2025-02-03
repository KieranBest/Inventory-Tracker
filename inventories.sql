CREATE DATABASE inventory_tracker_db;

USE inventory_tracker_db;

CREATE TABLE inventories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    slug VARCHAR(191) NOT NULL,
    last_updated DATETIME DEFAULT current_timestamp(),
    status TEXT NOT NULL,
    deleted DATETIME DEFAULT NULL,
    UNIQUE KEY (slug)
);

INSERT INTO inventories (name, quantity, price, slug, last_updated, status, deleted)
VALUES
('Apple', 12, 0.49, 'Apples1738529618', '2025-02-02 20:53:59', 'In stock', NULL),
('Banana', 5, 0.79, 'Banana1738529632', '2025-02-02 20:53:52', 'Low stock', NULL),
('Big TV', 11, 200.00, 'Big-TV1738529664', '2025-02-02 20:54:24', 'In stock', NULL),
('Small TV', 0, 100.00, 'Small-TV1738529682', '2025-02-02 20:54:42', 'Out of stock', NULL),
('Chips', 3, 1.34, 'Chips1738529700', '2025-02-02 20:55:00', 'Low stock', NULL),
('Pepperoni Pizza', 0, 2.50, 'Pepperoni-Pizza1738529715', '2025-02-02 20:55:15', 'Out of stock', NULL),
('Dog Food', 15, 30.00, 'Dog-Food1738529757', '2025-02-02 20:55:57', 'In stock', NULL),
('Cat Food', 0, 20.00, 'Cat-Food1738529782', '2025-02-02 20:56:22', 'Out of stock', NULL),
('Baby Food', 8, 4.68, 'Baby-Food1738529806', '2025-02-02 20:56:46', 'Low stock', NULL),
('Salad Dressing', 30, 1.50, 'Salad-Dressing1738529838', '2025-02-02 20:57:18', 'In stock', NULL),
('Chicken Breast', 2, 6.50, 'Chicken-Breast1738529919', '2025-02-02 20:58:43', 'Low stock', '2025-02-02 20:58:43');
