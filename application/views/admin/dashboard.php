<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: false }">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($title) ? $title : 'Admin Dashboard - Meat Shop & Grocery'; ?></title>

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
                        primary: '#e53e3e',
                        'primary-700': '#c53030',
                        bg: '#ffffff',
                        surface: '#f9fafb',
                        muted: '#555',
                        text: '#222',
                        card: '#ffffff',
                        border: '#e2e8f0'
                    },
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif']
                    },
                    boxShadow: {
                        'custom': '0 6px 18px rgba(0,0,0,.08)'
                    }
                }
            }
        }
    </script>
    
    <link rel="icon" href="<?php echo base_url('gambar/logo_new.jpg'); ?>" />
    
    <!-- Alpine.js x-cloak CSS -->
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-inter bg-surface">
    <div class="flex h-screen bg-surface">
        <!-- Mobile Overlay -->
        <div x-show="sidebarOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sidebarOpen = false"
             class="fixed inset-0 z-40 bg-black bg-opacity-50 md:hidden"
             x-cloak>
        </div>

        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-50 w-64 bg-card text-text transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out"
             :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">
            
            <!-- Sidebar Header -->
            <div class="flex items-center justify-between p-4 bg-primary">
                <a href="<?php echo base_url('admin'); ?>" class="flex items-center space-x-2">
                    <img src="<?php echo base_url('gambar/logo_new.jpg'); ?>" alt="Logo" class="h-8 w-8 rounded-full">
                    <span class="text-xl font-semibold text-white">Admin Panel</span>
                </a>
                <button @click="sidebarOpen = false" 
                        class="md:hidden text-white hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 rounded p-1">
                    <i class='bx bx-x text-2xl'></i>
                </button>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="mt-6">
                <a href="<?php echo base_url('admin'); ?>" class="flex items-center px-4 py-2 text-muted hover:bg-surface hover:text-text transition-colors duration-200">
                    <i class='bx bx-home-alt mr-3 text-lg'></i>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-muted hover:bg-surface hover:text-text transition-colors duration-200">
                    <i class='bx bx-box mr-3 text-lg'></i>
                    Produk
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-muted hover:bg-surface hover:text-text transition-colors duration-200">
                    <i class='bx bx-cart-alt mr-3 text-lg'></i>
                    Pesanan
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-muted hover:bg-surface hover:text-text transition-colors duration-200">
                    <i class='bx bx-group mr-3 text-lg'></i>
                    Pelanggan
                </a>
                <a href="#" class="flex items-center px-4 py-2 text-muted hover:bg-surface hover:text-text transition-colors duration-200">
                    <i class='bx bx-cog mr-3 text-lg'></i>
                    Pengaturan
                </a>
            </nav>

            <!-- Logout Button -->
            <div class="absolute bottom-0 w-full p-4 bg-surface border-t border-border">
                <a href="<?php echo base_url('admin/logout'); ?>" class="flex items-center justify-center w-full bg-primary text-white py-2 px-4 rounded-lg hover:bg-primary-700 transition-colors duration-200">
                    <i class='bx bx-log-out mr-2'></i>
                    Logout
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navbar -->
            <header class="flex justify-between items-center p-4 bg-card border-b border-border">
                <button @click="sidebarOpen = true" 
                        class="md:hidden text-muted hover:text-text focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50 rounded p-2">
                    <i class='bx bx-menu text-2xl'></i>
                </button>
                <h1 class="text-2xl font-semibold text-text">Dashboard</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-muted">Admin</span>
                    <img src="<?php echo base_url('gambar/logo_new.jpg'); ?>" alt="Admin Avatar" class="h-8 w-8 rounded-full">
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-surface p-6" 
                  @click="if (window.innerWidth < 768) sidebarOpen = false">
                <!-- Welcome Section -->
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-text mb-2">Selamat Datang di Dashboard</h2>
                    <p class="text-muted">Kelola bisnis Meat Shop & Grocery Anda dengan mudah</p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Stat Card 1 -->
                    <div class="bg-card rounded-lg border border-border p-6 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-muted">Total Produk</p>
                            <h2 class="text-3xl font-bold text-text">0</h2>
                        </div>
                        <i class='bx bx-box text-4xl text-primary'></i>
                    </div>
                    
                    <!-- Stat Card 2 -->
                    <div class="bg-card rounded-lg border border-border p-6 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-muted">Total Pesanan</p>
                            <h2 class="text-3xl font-bold text-text">0</h2>
                        </div>
                        <i class='bx bx-cart-alt text-4xl text-primary'></i>
                    </div>
                    
                    <!-- Stat Card 3 -->
                    <div class="bg-card rounded-lg border border-border p-6 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-muted">Pelanggan Baru</p>
                            <h2 class="text-3xl font-bold text-text">0</h2>
                        </div>
                        <i class='bx bx-group text-4xl text-primary'></i>
                    </div>
                    
                    <!-- Stat Card 4 -->
                    <div class="bg-card rounded-lg border border-border p-6 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-muted">Pendapatan</p>
                            <h2 class="text-3xl font-bold text-text">Rp 0</h2>
                        </div>
                        <i class='bx bx-dollar-circle text-4xl text-primary'></i>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="bg-card rounded-lg border border-border p-6">
                    <h3 class="text-xl font-semibold text-text mb-4">Konten Utama</h3>
                    <div class="text-center py-12">
                        <i class='bx bx-package text-6xl text-muted mb-4'></i>
                        <h4 class="text-lg font-medium text-text mb-2">Halaman Dashboard</h4>
                        <p class="text-muted">Konten dashboard akan ditambahkan di sini</p>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Mobile Menu Fix Script -->
    <script>
        // Ensure Alpine.js is loaded and working
        document.addEventListener('alpine:init', () => {
            console.log('Alpine.js initialized');
        });

        // Fix for mobile menu button
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listener for mobile menu button
            const menuButton = document.querySelector('button[\\@click="sidebarOpen = true"]');
            if (menuButton) {
                menuButton.addEventListener('click', function(e) {
                    console.log('Mobile menu button clicked');
                    // Force sidebar to open
                    const sidebar = document.querySelector('[x-data]');
                    if (sidebar && sidebar._x_dataStack) {
                        sidebar._x_dataStack[0].sidebarOpen = true;
                    }
                });
            }

            // Add event listener for close button
            const closeButton = document.querySelector('button[\\@click="sidebarOpen = false"]');
            if (closeButton) {
                closeButton.addEventListener('click', function(e) {
                    console.log('Close button clicked');
                });
            }

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                if (window.innerWidth < 768) {
                    const sidebar = document.querySelector('.fixed.inset-y-0.left-0');
                    const menuButton = document.querySelector('button[\\@click="sidebarOpen = true"]');
                    
                    if (sidebar && !sidebar.contains(e.target) && !menuButton.contains(e.target)) {
                        const sidebarData = document.querySelector('[x-data]');
                        if (sidebarData && sidebarData._x_dataStack) {
                            sidebarData._x_dataStack[0].sidebarOpen = false;
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>