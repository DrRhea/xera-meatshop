<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($title) ? $title : 'Meat Shop & Grocery'; ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Styles & Scripts -->
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>" />
    <link rel="icon" href="<?php echo base_url('gambar/logo_new.jpg'); ?>" />
    <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
        integrity="sha512-TUgr6y..." 
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script defer src="<?php echo base_url('js/script.js'); ?>"></script>
</head>
<body>

    <!-- ========== Navbar ========== -->
    <header class="navbar" id="navbar">
        <div class="container nav-inner">
            <a class="brand" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url('gambar/logo_new.jpg'); ?>" alt="Logo" />
                <span>Meat Shop & Grocery Semarang</span>
            </a>

            <nav class="nav" id="navMenu">
                <a href="<?php echo base_url(); ?>" <?php echo (isset($page) && $page == 'home') ? 'class="active"' : ''; ?>>Beranda</a>
                <a href="<?php echo base_url('tentang-kami'); ?>" <?php echo (isset($page) && $page == 'about') ? 'class="active"' : ''; ?>>Tentang Kami</a>

                <!-- Dropdown Menu -->
                <div class="dropdown">
                    <button class="dropbtn">Produk<i class=""></i></button>
                    <div class="dropdown-content">
                        <a href="<?php echo base_url('produk/daging'); ?>">Daging</a>
                        <a href="<?php echo base_url('produk/minuman'); ?>">Minuman</a>
                        <a href="<?php echo base_url('produk/seafood'); ?>">Seafood</a>
                        <a href="<?php echo base_url('produk/bumbu'); ?>">Bumbu</a>
                        <a href="<?php echo base_url('produk/roti'); ?>">Roti</a>
                        <a href="<?php echo base_url('produk/sayur-buah'); ?>">Buah & Sayur</a>
                        <a href="<?php echo base_url('produk/daging-olahan'); ?>">Daging & Olahan</a>
                        <a href="<?php echo base_url('produk/susu-olahan'); ?>">Susu & Olahan</a>
                    </div>
                </div>

                <a href="<?php echo base_url('gallery'); ?>">Galeri</a>
                <a href="<?php echo base_url('kontak'); ?>" <?php echo (isset($page) && $page == 'contact') ? 'class="active"' : ''; ?>>Kontak</a>
            </nav>

            <!-- Shopping Cart Button -->
            <div class="nav-actions">
                <a href="<?php echo base_url('keranjang'); ?>" class="cart-btn" title="Keranjang Belanja">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                </a>
            </div>

            <!-- Mobile Hamburger Menu -->
            <button class="hamburger" id="hamburger" aria-label="Toggle Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <main>
