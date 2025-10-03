-- Table untuk mengelola konten website
CREATE TABLE content_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    page VARCHAR(50) NOT NULL COMMENT 'halaman: homepage, about, contact',
    section VARCHAR(100) NOT NULL COMMENT 'bagian konten: hero_title, hero_subtitle, about_text, contact_info, dll',
    content_key VARCHAR(100) NOT NULL COMMENT 'kunci konten: hero_title, hero_subtitle, about_description, dll',
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
('homepage', 'hero', 'hero_title', 'Meat Shop & Grocery', 'text'),
('homepage', 'hero', 'hero_subtitle', 'Daging segar, bumbu berkualitas, dan kebutuhan dapur lengkap untuk masakan terbaik Anda.', 'textarea'),
('homepage', 'hero', 'hero_button1_text', 'Lihat Produk', 'text'),
('homepage', 'hero', 'hero_button2_text', 'Kenapa Kami?', 'text'),
('homepage', 'hero', 'hero_background_image', 'gambar/banner.jpg', 'image'),

-- Homepage About Section
('homepage', 'about', 'about_title', 'Mengapa Memilih Kami?', 'text'),
('homepage', 'about', 'about_description', 'Kami menyediakan produk berkualitas, bumbu berkualitas, dan kebutuhan dapur lengkap dengan harga terbaik. Setiap produk dipilih dengan teliti agar kualitas tetap terjaga.', 'textarea'),
('homepage', 'about', 'about_image', 'assets/img/gal-1.jpg', 'image'),

-- Homepage Features
('homepage', 'features', 'feature1_title', 'Jenis Produk Terlengkap', 'text'),
('homepage', 'features', 'feature1_icon', 'bx-shopping-bag', 'text'),
('homepage', 'features', 'feature2_title', 'Spesifikasi Sesuai Permintaan', 'text'),
('homepage', 'features', 'feature2_icon', 'bx-clipboard', 'text'),
('homepage', 'features', 'feature3_title', 'Kualitas Produk & Layanan', 'text'),
('homepage', 'features', 'feature3_icon', 'bx-like', 'text'),
('homepage', 'features', 'feature4_title', 'Harga Terjangkau', 'text'),
('homepage', 'features', 'feature4_icon', 'bx-wallet', 'text'),
('homepage', 'features', 'feature5_title', 'Mitra Terbaik', 'text'),
('homepage', 'features', 'feature5_icon', 'bx-group', 'text'),
('homepage', 'features', 'feature6_title', 'Fast Respons', 'text'),
('homepage', 'features', 'feature6_icon', 'bx-time', 'text'),
('homepage', 'features', 'feature7_title', 'Pengiriman Cepat', 'text'),
('homepage', 'features', 'feature7_icon', 'bx-package', 'text'),
('homepage', 'features', 'feature8_title', 'Garansi Produk', 'text'),
('homepage', 'features', 'feature8_icon', 'bx-shield', 'text'),

-- About Page
('about', 'hero', 'about_title', 'Tentang Kami', 'text'),
('about', 'hero', 'about_subtitle', 'CV. Semarang Boga Utama (Jawa Tengah, Indonesia)', 'text'),
('about', 'content', 'about_description1', 'Meat Shop & Grocery Semarang adalah toko yang menyediakan berbagai kebutuhan dapur mulai dari daging segar berkualitas, bumbu pilihan, produk bakery, sayur, buah, hingga dairy. Kami hadir untuk memberikan pengalaman belanja yang mudah, praktis, dan terpercaya bagi masyarakat Semarang dan sekitarnya.', 'textarea'),
('about', 'content', 'about_description2', 'Dengan komitmen kualitas terbaik, harga bersahabat, dan layanan yang ramah, kami ingin menjadi mitra setia keluarga dalam memenuhi kebutuhan masakan sehari-hari maupun acara spesial. Semua produk dipilih secara teliti agar selalu fresh, higienis, dan siap diolah menjadi hidangan terbaik untuk keluarga Anda.', 'textarea'),
('about', 'content', 'about_description3', 'Seluruh produk daging sapi segar dan Dorper Lamb yang tersedia merupakan hasil pemotongan ternak yang berasal dari peternakan kami sendiri. Kami telah menerapkan konsep From Farm to Meat Shop sejak tahun 2012.', 'textarea'),
('about', 'content', 'about_image', 'gambar/gambar3.jpg', 'image'),

-- Contact Page
('contact', 'hero', 'contact_title', 'Hubungi Kami', 'text'),
('contact', 'hero', 'contact_subtitle', 'Kami siap melayani kebutuhan belanja Anda. Jangan ragu untuk menghubungi kami', 'text'),
('contact', 'info', 'contact_phone', '(+62) 811-2993-400', 'text'),
('contact', 'info', 'contact_phone_hours', 'Senin - Minggu: 08:00 - 20:00 WIB', 'text'),
('contact', 'info', 'contact_email', 'supplierdaging@mitraboga.com', 'text'),
('contact', 'info', 'contact_email_response', 'Kami akan membalas dalam 24 jam', 'text'),
('contact', 'info', 'contact_address', 'Jl. Suratmo No.59, Kalibanteng Kidul, Kec. Semarang Barat, Kota Semarang, Jawa Tengah 50147', 'text'),
('contact', 'info', 'contact_whatsapp', '628112993400', 'text'),
('contact', 'info', 'contact_facebook', 'https://www.facebook.com/share/174RhAy1hY/', 'text'),
('contact', 'info', 'contact_instagram', 'https://www.instagram.com/meatshopindoguna_semarang?igsh=bHQycjU4NTh2OTV3', 'text'),
('contact', 'info', 'contact_tiktok', 'https://www.tiktok.com/@meatshopindoguna_smg?_t=ZS-8zwRsprvqbP&_r=1', 'text');
