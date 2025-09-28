<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: false }">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($title) ? $title : 'Admin Dashboard'; ?></title>

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
                <a href="<?php echo base_url('admin'); ?>" 
                   class="flex items-center px-3 py-2 <?php echo (uri_string() == 'admin' || uri_string() == '') ? 'bg-primary text-white rounded-lg mx-2 mb-1' : 'text-muted hover:bg-surface hover:text-text transition-colors duration-200 mx-2 mb-1'; ?>">
                    <i class='bx bx-home-alt mr-2 text-base'></i>
                    <span class="text-sm <?php echo (uri_string() == 'admin' || uri_string() == '') ? 'font-medium' : ''; ?>">Dashboard</span>
                </a>
                <a href="<?php echo base_url('admin/products'); ?>" 
                   class="flex items-center px-3 py-2 <?php echo (strpos(uri_string(), 'admin/products') !== false) ? 'bg-primary text-white rounded-lg mx-2 mb-1' : 'text-muted hover:bg-surface hover:text-text transition-colors duration-200 mx-2 mb-1'; ?>">
                    <i class='bx bx-box mr-2 text-base'></i>
                    <span class="text-sm <?php echo (strpos(uri_string(), 'admin/products') !== false) ? 'font-medium' : ''; ?>">Produk</span>
                </a>
                <a href="<?php echo base_url('admin/gallery'); ?>" 
                   class="flex items-center px-3 py-2 <?php echo (strpos(uri_string(), 'gallery') !== false) ? 'bg-primary text-white rounded-lg mx-2 mb-1' : 'text-muted hover:bg-surface hover:text-text transition-colors duration-200 mx-2 mb-1'; ?>">
                    <i class='bx bx-images mr-2 text-base'></i>
                    <span class="text-sm <?php echo (strpos(uri_string(), 'gallery') !== false) ? 'font-medium' : ''; ?>">Galeri</span>
                </a>
            </nav>

            <!-- Settings Button -->
            <div class="mt-auto p-3">
                <a href="<?php echo base_url('admin/settings'); ?>" 
                   class="flex items-center px-3 py-2 <?php echo (strpos(uri_string(), 'settings') !== false) ? 'bg-primary text-white rounded-lg mx-2 mb-1' : 'text-muted hover:bg-surface hover:text-text transition-colors duration-200 mx-2 mb-1'; ?>">
                    <i class='bx bx-cog mr-2 text-base'></i>
                    <span class="text-sm <?php echo (strpos(uri_string(), 'settings') !== false) ? 'font-medium' : ''; ?>">Pengaturan</span>
                </a>
            </div>

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
                    <h1 class="text-2xl font-semibold text-text"><?php echo isset($page_title) ? $page_title : 'Dashboard'; ?></h1>
                </div>
                <div class="flex items-center space-x-4">
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-surface p-4" 
                  @click="if (window.innerWidth < 768) sidebarOpen = false">
                <?php echo $content; ?>
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

        // Image Preview Function
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const preview = document.getElementById('image_preview');
                    const previewImg = document.getElementById('preview_img');
                    
                    if (preview && previewImg) {
                        previewImg.src = e.target.result;
                        preview.classList.remove('hidden');
                    }
                };
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Image Preview Function for Edit
        function previewImageEdit(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const preview = document.getElementById('image_preview_edit');
                    const previewImg = document.getElementById('preview_img_edit');
                    
                    if (preview && previewImg) {
                        previewImg.src = e.target.result;
                        preview.classList.remove('hidden');
                    }
                };
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Drag and Drop functionality
        document.addEventListener('DOMContentLoaded', function() {
            const uploadAreas = document.querySelectorAll('[onclick*="product_image"]');
            
            uploadAreas.forEach(area => {
                // Prevent default drag behaviors
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    area.addEventListener(eventName, preventDefaults, false);
                    document.body.addEventListener(eventName, preventDefaults, false);
                });

                // Highlight drop area when item is dragged over it
                ['dragenter', 'dragover'].forEach(eventName => {
                    area.addEventListener(eventName, highlight, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    area.addEventListener(eventName, unhighlight, false);
                });

                // Handle dropped files
                area.addEventListener('drop', handleDrop, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            function highlight(e) {
                e.currentTarget.classList.add('border-primary', 'bg-primary', 'bg-opacity-10');
            }

            function unhighlight(e) {
                e.currentTarget.classList.remove('border-primary', 'bg-primary', 'bg-opacity-10');
            }

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                
                if (files.length > 0) {
                    const fileInput = document.getElementById('product_image');
                    if (fileInput) {
                        fileInput.files = files;
                        previewImage(fileInput);
                    }
                }
            }
        });
    </script>
</body>
</html>
