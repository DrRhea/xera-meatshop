<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: false }">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Produk - Admin Dashboard</title>

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
                    }
                }
            }
        }
    </script>
    
    <link rel="icon" href="<?php echo base_url('gambar/logo_new.jpg'); ?>" />
    
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
                <a href="<?php echo base_url('admin/products'); ?>" class="flex items-center px-3 py-2 bg-primary text-white rounded-lg mx-2 mb-1">
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
                <div class="flex items-center space-x-4">
                    <button @click="sidebarOpen = true" 
                            class="md:hidden text-muted hover:text-text focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50 rounded p-2">
                        <i class='bx bx-menu text-2xl'></i>
                    </button>
                    <div class="flex items-center space-x-2">
                        <a href="<?php echo base_url('admin/products'); ?>" class="text-muted hover:text-text">
                            <i class='bx bx-arrow-left text-xl'></i>
                        </a>
                        <h1 class="text-2xl font-semibold text-text">Edit Produk</h1>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-surface p-4" 
                  @click="if (window.innerWidth < 768) sidebarOpen = false">
                
                <!-- Form Container -->
                <div class="max-w-4xl mx-auto">
                    <div class="bg-card rounded-lg border border-border">
                        <!-- Form Header -->
                        <div class="px-6 py-4 border-b border-border">
                            <h2 class="text-lg font-semibold text-text">Edit Informasi Produk</h2>
                            <p class="text-muted text-sm">Ubah informasi produk yang sudah ada</p>
                        </div>
                        
                        <!-- Form Content -->
                        <form class="p-6 space-y-6">
                            <!-- Basic Information -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Product Name -->
                                <div class="lg:col-span-2">
                                    <label for="product_name" class="block text-sm font-medium text-text mb-2">
                                        Nama Produk <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           id="product_name" 
                                           name="product_name" 
                                           value="Daging Sapi Premium"
                                           required
                                           class="w-full px-3 py-2 border border-border rounded-lg text-text placeholder-muted focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                           placeholder="Masukkan nama produk">
                                </div>
                                
                                <!-- Category -->
                                <div>
                                    <label for="category" class="block text-sm font-medium text-text mb-2">
                                        Kategori <span class="text-red-500">*</span>
                                    </label>
                                    <select id="category" 
                                            name="category" 
                                            required
                                            class="w-full px-3 py-2 border border-border rounded-lg text-text focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                        <option value="">Pilih Kategori</option>
                                        <option value="daging-segar" selected>Daging Segar</option>
                                        <option value="daging-olahan">Daging Olahan</option>
                                        <option value="seafood">Seafood</option>
                                        <option value="sayur-buah">Sayur & Buah</option>
                                        <option value="susu-olahan">Susu & Olahan</option>
                                    </select>
                                </div>
                                
                                <!-- Price -->
                                <div>
                                    <label for="price" class="block text-sm font-medium text-text mb-2">
                                        Harga (Rp) <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" 
                                           id="price" 
                                           name="price" 
                                           value="85000"
                                           required
                                           min="0"
                                           step="100"
                                           class="w-full px-3 py-2 border border-border rounded-lg text-text placeholder-muted focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                           placeholder="0">
                                </div>
                                
                                <!-- Stock -->
                                <div>
                                    <label for="stock" class="block text-sm font-medium text-text mb-2">
                                        Stok <span class="text-red-500">*</span>
                                    </label>
                                    <input type="number" 
                                           id="stock" 
                                           name="stock" 
                                           value="25"
                                           required
                                           min="0"
                                           class="w-full px-3 py-2 border border-border rounded-lg text-text placeholder-muted focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                           placeholder="0">
                                </div>
                                
                                <!-- Unit -->
                                <div>
                                    <label for="unit" class="block text-sm font-medium text-text mb-2">
                                        Satuan
                                    </label>
                                    <select id="unit" 
                                            name="unit"
                                            class="w-full px-3 py-2 border border-border rounded-lg text-text focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                        <option value="kg" selected>Kilogram (kg)</option>
                                        <option value="gram">Gram (g)</option>
                                        <option value="pcs">Pieces (pcs)</option>
                                        <option value="pack">Pack</option>
                                        <option value="liter">Liter (L)</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-text mb-2">
                                    Deskripsi Produk
                                </label>
                                <textarea id="description" 
                                          name="description" 
                                          rows="4"
                                          class="w-full px-3 py-2 border border-border rounded-lg text-text placeholder-muted focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                          placeholder="Deskripsikan produk secara detail...">Daging sapi segar berkualitas premium, dipotong dengan teknik yang tepat untuk mempertahankan kelezatan dan kelembutan. Cocok untuk berbagai olahan masakan.</textarea>
                            </div>
                            
                            <!-- Current Image -->
                            <div>
                                <label class="block text-sm font-medium text-text mb-2">
                                    Gambar Produk Saat Ini
                                </label>
                                <div class="flex items-center space-x-4">
                                    <div class="w-20 h-20 bg-surface rounded-lg border border-border flex items-center justify-center">
                                        <i class='bx bx-image text-2xl text-muted'></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-text">current-image.jpg</p>
                                        <p class="text-xs text-muted">Gambar saat ini</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Image Upload -->
                            <div>
                                <label class="block text-sm font-medium text-text mb-2">
                                    Ganti Gambar Produk
                                </label>
                                <div class="border-2 border-dashed border-border rounded-lg p-6 text-center hover:border-primary transition-colors duration-200">
                                    <i class='bx bx-cloud-upload text-4xl text-muted mb-2'></i>
                                    <p class="text-muted text-sm mb-2">Klik untuk upload gambar baru atau drag & drop</p>
                                    <p class="text-xs text-muted">PNG, JPG, JPEG maksimal 2MB</p>
                                    <input type="file" 
                                           name="product_image" 
                                           accept="image/*"
                                           class="hidden">
                                </div>
                            </div>
                            
                            <!-- Status -->
                            <div>
                                <label class="block text-sm font-medium text-text mb-2">
                                    Status Produk
                                </label>
                                <div class="flex items-center space-x-4">
                                    <label class="flex items-center">
                                        <input type="radio" 
                                               name="status" 
                                               value="active" 
                                               checked
                                               class="w-4 h-4 text-primary bg-card border-border focus:ring-primary">
                                        <span class="ml-2 text-sm text-text">Aktif</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" 
                                               name="status" 
                                               value="inactive"
                                               class="w-4 h-4 text-primary bg-card border-border focus:ring-primary">
                                        <span class="ml-2 text-sm text-text">Tidak Aktif</span>
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Form Actions -->
                            <div class="flex justify-end space-x-3 pt-6 border-t border-border">
                                <a href="<?php echo base_url('admin/products'); ?>" 
                                   class="px-4 py-2 text-muted hover:text-text transition-colors duration-200">
                                    Batal
                                </a>
                                <button type="submit" 
                                        class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary-700 transition-colors duration-200">
                                    <i class='bx bx-save mr-2'></i>
                                    Update Produk
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Mobile Menu Fix Script -->
    <script>
        document.addEventListener('alpine:init', () => {
            console.log('Alpine.js initialized');
        });

        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.querySelector('button[\\@click="sidebarOpen = true"]');
            if (menuButton) {
                menuButton.addEventListener('click', function(e) {
                    const sidebar = document.querySelector('[x-data]');
                    if (sidebar && sidebar._x_dataStack) {
                        sidebar._x_dataStack[0].sidebarOpen = true;
                    }
                });
            }

            const closeButton = document.querySelector('button[\\@click="sidebarOpen = false"]');
            if (closeButton) {
                closeButton.addEventListener('click', function(e) {
                    console.log('Close button clicked');
                });
            }

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
