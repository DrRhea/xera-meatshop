-- Create missing tables for admin CRUD functionality

-- Table for daily promotions
CREATE TABLE IF NOT EXISTS `daily_promos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `original_price` decimal(10,2) NOT NULL,
  `promo_price` decimal(10,2) NOT NULL,
  `discount_percentage` int(11) DEFAULT 0,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` enum('active','inactive') DEFAULT 'active',
  `sort_order` int(11) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `is_active` (`is_active`),
  KEY `start_date` (`start_date`),
  KEY `end_date` (`end_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table for contact messages
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('new','read','replied','archived') DEFAULT 'new',
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert sample data for daily_promos
INSERT INTO `daily_promos` (`title`, `description`, `product_id`, `original_price`, `promo_price`, `discount_percentage`, `start_date`, `end_date`, `is_active`, `sort_order`) VALUES
('Promo Daging Sapi', 'Daging sapi segar dengan harga spesial', NULL, 150000.00, 120000.00, 20, '2025-01-01', '2025-12-31', 'active', 1),
('Promo Bumbu Dapur', 'Paket bumbu lengkap untuk masakan', NULL, 50000.00, 40000.00, 20, '2025-01-01', '2025-12-31', 'active', 2),
('Promo Roti Segar', 'Roti fresh dari oven setiap pagi', NULL, 25000.00, 20000.00, 20, '2025-01-01', '2025-12-31', 'active', 3),
('Promo Sayur Organik', 'Sayur organik segar dari petani lokal', NULL, 30000.00, 25000.00, 17, '2025-01-01', '2025-12-31', 'active', 4);

-- Insert sample data for contact_messages
INSERT INTO `contact_messages` (`name`, `email`, `phone`, `subject`, `message`, `status`, `ip_address`) VALUES
('John Doe', 'john@example.com', '081234567890', 'Pertanyaan Produk', 'Apakah ada stok daging sapi segar?', 'new', '127.0.0.1'),
('Jane Smith', 'jane@example.com', '081234567891', 'Komplain Layanan', 'Pesanan saya belum sampai', 'read', '127.0.0.1'),
('Bob Wilson', 'bob@example.com', '081234567892', 'Saran', 'Tolong tambahkan produk organik', 'new', '127.0.0.1');
