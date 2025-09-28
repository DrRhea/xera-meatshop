<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: false, showDeleteModal: false, deleteItem: null }">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kelola Produk - Admin Dashboard</title>

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
            <div class="flex items-center justify-between px-3 py-2 bg-card border-b border-border">
                <a href="<?php echo base_url('admin'); ?>" class="flex items-center space-x-2">
                    <img src="<?php echo base_url('gambar/logo_new.jpg'); ?>" alt="Logo" class="h-6 w-6 rounded-full">
                    <span class="text-lg font-semibold text-text">Admin Panel</span>
                </a>
                <button @click="sidebarOpen = false" 
                        class="md:hidden text-muted hover:text-text focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50 rounded p-1">
                    <i class='bx bx-x text-xl'></i>
                </button>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="mt-4">
                <a href="<?php echo base_url('admin'); ?>" class="flex items-center px-3 py-2 text-muted hover:bg-surface hover:text-text transition-colors duration-200 mx-2 mb-1">
                    <i class='bx bx-home-alt mr-2 text-base'></i>
                    <span class="text-sm">Dashboard</span>
                </a>
                <a href="#" class="flex items-center px-3 py-2 bg-primary text-white rounded-lg mx-2 mb-1">
                    <i class='bx bx-box mr-2 text-base'></i>
                    <span class="text-sm font-medium">Produk</span>
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-muted hover:bg-surface hover:text-text transition-colors duration-200 mx-2 mb-1">
                    <i class='bx bx-cart-alt mr-2 text-base'></i>
                    <span class="text-sm">Pesanan</span>
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-muted hover:bg-surface hover:text-text transition-colors duration-200 mx-2 mb-1">
                    <i class='bx bx-group mr-2 text-base'></i>
                    <span class="text-sm">Pelanggan</span>
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-muted hover:bg-surface hover:text-text transition-colors duration-200 mx-2 mb-1">
                    <i class='bx bx-cog mr-2 text-base'></i>
                    <span class="text-sm">Pengaturan</span>
                </a>
            </nav>

            <!-- Logout Button -->
            <div class="absolute bottom-0 w-full p-3 bg-surface border-t border-border">
                <a href="<?php echo base_url('admin/logout'); ?>" class="flex items-center justify-center w-full bg-primary text-white py-2 px-3 rounded-lg hover:bg-primary-700 transition-colors duration-200">
                    <i class='bx bx-log-out mr-2 text-sm'></i>
                    <span class="text-sm">Logout</span>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navbar -->
            <header class="flex justify-between items-center px-4 py-2 bg-card border-b border-border">
                <button @click="sidebarOpen = true" 
                        class="md:hidden text-muted hover:text-text focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50 rounded p-2">
                    <i class='bx bx-menu text-2xl'></i>
                </button>
                <h1 class="text-2xl font-semibold text-text">Kelola Produk</h1>
                <div class="flex items-center space-x-4">
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-surface p-4" 
                  @click="if (window.innerWidth < 768) sidebarOpen = false">
                
                <!-- Action Bar -->
                <div class="flex justify-between items-center mb-4">
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" 
                                   placeholder="Cari produk..." 
                                   class="w-64 px-3 py-2 border border-border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <i class='bx bx-search absolute right-3 top-2.5 text-muted'></i>
                        </div>
                        <select class="px-3 py-2 border border-border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary">
                            <option>Semua Kategori</option>
                            <option>Daging Segar</option>
                            <option>Daging Olahan</option>
                            <option>Seafood</option>
                        </select>
                    </div>
                    <a href="<?php echo base_url('admin/products/add'); ?>" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200 flex items-center space-x-2">
                        <i class='bx bx-plus text-sm'></i>
                        <span class="text-sm">Tambah Produk</span>
                    </a>
                </div>

                <!-- Products Table -->
                <div class="bg-card rounded-lg border border-border">
                    <div class="px-4 py-3 border-b border-border">
                        <h3 class="text-lg font-semibold text-text">Daftar Produk</h3>
                    </div>
                    
                    <!-- Table Header -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-surface">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Gambar</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Nama Produk</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Kategori</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Harga</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Stok</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Status</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-border">
                                <!-- Empty State -->
                                <tr>
                                    <td colspan="7" class="px-4 py-12 text-center">
                                        <i class='bx bx-package text-4xl text-muted mb-3'></i>
                                        <h4 class="text-lg font-medium text-text mb-2">Belum Ada Produk</h4>
                                        <p class="text-muted text-sm">Mulai dengan menambahkan produk pertama Anda</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-show="showDeleteModal" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto"
         x-cloak>
        
        <!-- Modal Backdrop -->
        <div class="fixed inset-0 bg-black bg-opacity-50" @click="showDeleteModal = false"></div>
        
        <!-- Modal Content -->
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative bg-card rounded-lg border border-border max-w-md w-full">
                <!-- Modal Header -->
                <div class="px-6 py-4 border-b border-border">
                    <h3 class="text-lg font-semibold text-text">Konfirmasi Hapus</h3>
                </div>
                
                <!-- Modal Body -->
                <div class="px-6 py-4">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                            <i class='bx bx-trash text-red-600 text-lg'></i>
                        </div>
                        <div>
                            <p class="text-text font-medium">Hapus Produk</p>
                            <p class="text-muted text-sm">Tindakan ini tidak dapat dibatalkan</p>
                        </div>
                    </div>
                    <p class="text-muted text-sm">
                        Apakah Anda yakin ingin menghapus produk ini? Semua data terkait akan dihapus secara permanen.
                    </p>
                </div>
                
                <!-- Modal Footer -->
                <div class="px-6 py-4 bg-surface rounded-b-lg flex justify-end space-x-3">
                    <button @click="showDeleteModal = false" 
                            class="px-4 py-2 text-muted hover:text-text transition-colors duration-200">
                        Batal
                    </button>
                    <button @click="showDeleteModal = false" 
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200">
                        Hapus
                    </button>
                </div>
            </div>
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
