<!DOCTYPE html>
<html lang="id" x-data="{ mobileMenuOpen: false, dropdownOpen: false }">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($title) ? $title : 'Meat Shop & Grocery'; ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#c53030',
                        secondary: '#8b4513',
                        accent: '#ff6b35'
                    },
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <link rel="icon" href="<?php echo base_url('gambar/logo_new.jpg'); ?>" />
</head>
<body class="font-inter bg-gray-50">

    <!-- ========== Navbar ========== -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="<?php echo base_url(); ?>" class="flex items-center space-x-3">
                    <img src="<?php echo base_url('gambar/logo_new.jpg'); ?>" alt="Logo" class="h-10 w-10 rounded-full" />
                    <span class="text-xl font-normal text-gray-800 hidden sm:block uppercase tracking-tight">Meat Shop & Grocery</span>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="<?php echo base_url(); ?>" 
                       class="<?php echo (isset($page) && $page == 'home') ? 'text-primary font-semibold uppercase tracking-wide' : 'text-gray-700 hover:text-primary transition-colors uppercase tracking-wide'; ?>">
                        Beranda
                    </a>
                    <a href="<?php echo base_url('tentang-kami'); ?>" 
                       class="<?php echo (isset($page) && $page == 'about') ? 'text-primary font-semibold uppercase tracking-wide' : 'text-gray-700 hover:text-primary transition-colors uppercase tracking-wide'; ?>">
                        Tentang Kami
                    </a>

                    <!-- Dropdown Menu -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" 
                                class="flex items-center text-gray-700 hover:text-primary transition-colors uppercase tracking-wide">
                            Produk
                            <i class='bx bx-chevron-down ml-1' :class="{'rotate-180': open}"></i>
                        </button>
                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute top-full left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <a href="<?php echo base_url('produk/daging'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 uppercase tracking-wide">Daging</a>
                            <a href="<?php echo base_url('produk/minuman'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 uppercase tracking-wide">Minuman</a>
                            <a href="<?php echo base_url('produk/seafood'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 uppercase tracking-wide">Seafood</a>
                            <a href="<?php echo base_url('produk/bumbu'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 uppercase tracking-wide">Bumbu</a>
                            <a href="<?php echo base_url('produk/roti'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 uppercase tracking-wide">Roti</a>
                            <a href="<?php echo base_url('produk/sayur-buah'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 uppercase tracking-wide">Buah & Sayur</a>
                            <a href="<?php echo base_url('produk/daging-olahan'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 uppercase tracking-wide">Daging & Olahan</a>
                            <a href="<?php echo base_url('produk/susu-olahan'); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 uppercase tracking-wide">Susu & Olahan</a>
                        </div>
                    </div>

                    <a href="<?php echo base_url('gallery'); ?>" class="text-gray-700 hover:text-primary transition-colors uppercase tracking-wide">Galeri</a>
                    <a href="<?php echo base_url('kontak'); ?>" 
                       class="<?php echo (isset($page) && $page == 'contact') ? 'text-primary font-semibold uppercase tracking-wide' : 'text-gray-700 hover:text-primary transition-colors uppercase tracking-wide'; ?>">
                        Kontak
                    </a>
                </nav>

                <!-- Shopping Cart Button -->
                <div class="flex items-center space-x-4">
                    <a href="<?php echo base_url('keranjang'); ?>" 
                       class="relative p-2 text-gray-700 hover:text-primary transition-colors" 
                       title="Keranjang Belanja">
                        <i class='bx bx-shopping-bag text-xl'></i>
                        <span class="absolute -top-1 -right-1 bg-accent text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                    </a>

                    <!-- Mobile Menu Button -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen" 
                            class="md:hidden p-2 text-gray-700 hover:text-primary transition-colors">
                        <i class='bx bx-menu text-xl' x-show="!mobileMenuOpen"></i>
                        <i class='bx bx-x text-xl' x-show="mobileMenuOpen"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 class="md:hidden border-t border-gray-200 py-4">
                <div class="flex flex-col space-y-4">
                    <a href="<?php echo base_url(); ?>" 
                       class="<?php echo (isset($page) && $page == 'home') ? 'text-primary font-semibold uppercase tracking-wide' : 'text-gray-700 uppercase tracking-wide'; ?>">
                        Beranda
                    </a>
                    <a href="<?php echo base_url('tentang-kami'); ?>" 
                       class="<?php echo (isset($page) && $page == 'about') ? 'text-primary font-semibold uppercase tracking-wide' : 'text-gray-700 uppercase tracking-wide'; ?>">
                        Tentang Kami
                    </a>
                    <a href="<?php echo base_url('kontak'); ?>" 
                       class="<?php echo (isset($page) && $page == 'contact') ? 'text-primary font-semibold uppercase tracking-wide' : 'text-gray-700 uppercase tracking-wide'; ?>">
                        Kontak
                    </a>
                    <a href="<?php echo base_url('gallery'); ?>" class="text-gray-700 uppercase tracking-wide">Galeri</a>
                    
                    <!-- Mobile Produk Links -->
                    <div class="pl-4 space-y-2">
                        <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Produk</p>
                        <a href="<?php echo base_url('produk/daging'); ?>" class="block text-sm text-gray-600 uppercase tracking-wide">Daging</a>
                        <a href="<?php echo base_url('produk/minuman'); ?>" class="block text-sm text-gray-600 uppercase tracking-wide">Minuman</a>
                        <a href="<?php echo base_url('produk/seafood'); ?>" class="block text-sm text-gray-600 uppercase tracking-wide">Seafood</a>
                        <a href="<?php echo base_url('produk/bumbu'); ?>" class="block text-sm text-gray-600 uppercase tracking-wide">Bumbu</a>
                        <a href="<?php echo base_url('produk/roti'); ?>" class="block text-sm text-gray-600 uppercase tracking-wide">Roti</a>
                        <a href="<?php echo base_url('produk/sayur-buah'); ?>" class="block text-sm text-gray-600 uppercase tracking-wide">Buah & Sayur</a>
                        <a href="<?php echo base_url('produk/daging-olahan'); ?>" class="block text-sm text-gray-600 uppercase tracking-wide">Daging & Olahan</a>
                        <a href="<?php echo base_url('produk/susu-olahan'); ?>" class="block text-sm text-gray-600 uppercase tracking-wide">Susu & Olahan</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
