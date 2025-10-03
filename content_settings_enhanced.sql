-- Enhanced Content Settings Table
CREATE TABLE IF NOT EXISTS content_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page VARCHAR(50) NOT NULL COMMENT 'halaman: homepage, about, contact',
    section VARCHAR(100) NOT NULL COMMENT 'bagian konten: hero, about, contact_info, dll',
    content_key VARCHAR(100) NOT NULL COMMENT 'kunci konten: title, subtitle, description, dll',
    content_value TEXT COMMENT 'nilai konten',
    content_type ENUM('text', 'textarea', 'image', 'html') DEFAULT 'text' COMMENT 'tipe konten',
    is_active TINYINT(1) DEFAULT 1 COMMENT 'status aktif',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY unique_page_section_key (page, section, content_key)
);

-- Insert data default untuk homepage
INSERT INTO content_settings (page, section, content_key, content_value, content_type) VALUES
-- Homepage Hero Section
('homepage', 'hero', 'title', 'Selamat Datang di Meat Shop & Grocery', 'text'),
('homepage', 'hero', 'subtitle', 'Daging Segar Berkualitas untuk Keluarga Anda', 'text'),
('homepage', 'hero', 'description', 'Kami menyediakan daging segar berkualitas tinggi dan kebutuhan dapur lengkap untuk keluarga Anda. Dengan komitmen kualitas terbaik dan harga bersahabat.', 'textarea'),
('homepage', 'hero', 'button1_text', 'Lihat Produk', 'text'),
('homepage', 'hero', 'button2_text', 'Tentang Kami', 'text'),
('homepage', 'hero', 'background_image', 'gambar/banner.jpg', 'image'),

-- Homepage About Section
('homepage', 'about', 'title', 'Tentang Meat Shop & Grocery', 'text'),
('homepage', 'about', 'description', 'Meat Shop & Grocery Semarang adalah toko yang menyediakan berbagai kebutuhan dapur mulai dari daging segar berkualitas, bumbu pilihan, produk bakery, sayur, buah, hingga dairy. Kami hadir untuk memberikan pengalaman belanja yang mudah, praktis, dan terpercaya bagi masyarakat Semarang dan sekitarnya.', 'textarea'),
('homepage', 'about', 'image', 'assets/img/gal-1.jpg', 'image'),

-- About Page
('about', 'hero', 'title', 'Tentang Kami', 'text'),
('about', 'hero', 'subtitle', 'CV. Semarang Boga Utama (Jawa Tengah, Indonesia)', 'text'),
('about', 'content', 'description1', 'Meat Shop & Grocery Semarang adalah toko yang menyediakan berbagai kebutuhan dapur mulai dari daging segar berkualitas, bumbu pilihan, produk bakery, sayur, buah, hingga dairy. Kami hadir untuk memberikan pengalaman belanja yang mudah, praktis, dan terpercaya bagi masyarakat Semarang dan sekitarnya.', 'textarea'),
('about', 'content', 'description2', 'Dengan komitmen kualitas terbaik, harga bersahabat, dan layanan yang ramah, kami ingin menjadi mitra setia keluarga dalam memenuhi kebutuhan masakan sehari-hari maupun acara spesial. Semua produk dipilih secara teliti agar selalu fresh, higienis, dan siap diolah menjadi hidangan terbaik untuk keluarga Anda.', 'textarea'),
('about', 'content', 'description3', 'Seluruh produk daging sapi segar dan Dorper Lamb yang tersedia merupakan hasil pemotongan ternak yang berasal dari peternakan kami sendiri. Kami telah menerapkan konsep From Farm to Meat Shop sejak tahun 2012.', 'textarea'),
('about', 'content', 'image', 'gambar/gambar3.jpg', 'image'),

-- Contact Page
('contact', 'hero', 'title', 'Hubungi Kami', 'text'),
('contact', 'hero', 'subtitle', 'Kami siap melayani kebutuhan belanja Anda. Jangan ragu untuk menghubungi kami', 'text'),
('contact', 'info', 'phone', '(+62) 811-2993-400', 'text'),
('contact', 'info', 'phone_hours', 'Senin - Minggu: 08:00 - 20:00 WIB', 'text'),
('contact', 'info', 'email', 'supplierdaging@mitraboga.com', 'text'),
('contact', 'info', 'email_response', 'Kami akan membalas dalam 24 jam', 'text'),
('contact', 'info', 'address', 'Jl. Suratmo No.59, Kalibanteng Kidul, Kec. Semarang Barat, Kota Semarang, Jawa Tengah 50147', 'textarea'),
('contact', 'info', 'whatsapp', '628112993400', 'text'),
('contact', 'social', 'facebook', 'https://www.facebook.com/share/174RhAy1hY/', 'text'),
('contact', 'social', 'instagram', 'https://www.instagram.com/meatshopindoguna_semarang?igsh=bHQycjU4NTh2OTV3', 'text'),
('contact', 'social', 'tiktok', 'https://www.tiktok.com/@meatshopindoguna_smg?_t=ZS-8zwRsprvqbP&_r=1', 'text');
