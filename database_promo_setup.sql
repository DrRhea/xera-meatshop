-- Daily Promo Management System Database Setup
-- Run this SQL script to set up the daily_promos table

USE meatshop_grocery;

-- Create daily_promos table
CREATE TABLE IF NOT EXISTS daily_promos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    original_price DECIMAL(10,2) NOT NULL,
    promo_price DECIMAL(10,2) NOT NULL,
    discount_percentage INT DEFAULT 0,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    is_active ENUM('active','inactive') DEFAULT 'active',
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Insert sample promo data (optional)
-- Uncomment the lines below to add sample promo data

/*
INSERT INTO daily_promos (product_id, title, description, original_price, promo_price, discount_percentage, start_date, end_date, is_active, sort_order) VALUES 
(1, 'Promo Spesial Daging Sapi', 'Daging sapi segar dengan potongan harga terbatas!', 85000, 72000, 15, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 7 DAY), 'active', 1),
(2, 'Minuman Segar Hemat', 'Minuman favorit dengan harga terjangkau', 16000, 12000, 25, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 5 DAY), 'active', 2);
*/

-- Verify table creation
SHOW TABLES LIKE 'daily_promos';
DESCRIBE daily_promos;
