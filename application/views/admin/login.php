<!DOCTYPE html>
<html lang="id" x-data="{ showPassword: false }">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo isset($title) ? $title : 'Login Admin - Meat Shop & Grocery'; ?></title>

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
</head>
<body class="font-inter bg-surface min-h-screen">
    
    <!-- Main Container -->
    <div class="min-h-screen flex">
        <!-- Left Side - Login Form -->
        <div class="flex-1 flex items-center justify-center px-8 py-12">
            <div class="w-full max-w-md">
            
                <!-- Header -->
                <div class="text-center mb-8">
                    <!-- Logo -->
                    <div class="mx-auto w-16 h-16 bg-primary rounded-full flex items-center justify-center mb-4">
                        <i class='bx bx-shield-check text-white text-2xl'></i>
                    </div>
                    
                    <h1 class="text-3xl font-bold text-text mb-2">Admin Login</h1>
                    <p class="text-muted">Meat Shop & Grocery</p>
                </div>

                <!-- Flash Messages -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-center space-x-2">
                        <i class='bx bx-error-circle text-xl'></i>
                        <span><?php echo $this->session->flashdata('error'); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center space-x-2">
                        <i class='bx bx-check-circle text-xl'></i>
                        <span><?php echo $this->session->flashdata('success'); ?></span>
                    </div>
                <?php endif; ?>

                <!-- Direct Access Button -->
                <div class="space-y-6">
                    <div class="text-center">
                        <p class="text-muted mb-4">Klik tombol di bawah untuk langsung masuk ke dashboard</p>
                    </div>
                    
                    <a href="<?php echo base_url('admin'); ?>" 
                       class="w-full bg-primary text-white font-semibold py-3 px-4 rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all duration-200 flex items-center justify-center">
                        <i class='bx bx-log-in mr-2'></i>
                        Masuk ke Dashboard
                    </a>
                </div>

                <!-- Back to Website -->
                <div class="mt-8 text-center">
                    <a href="<?php echo base_url(); ?>" 
                       class="text-muted hover:text-primary transition-colors flex items-center justify-center space-x-2">
                        <i class='bx bx-arrow-back text-xl'></i>
                        <span>Kembali ke Website</span>
                    </a>
                </div>

                <!-- Footer -->
                <div class="mt-8 text-center text-muted text-sm">
                    <p>&copy; 2025 Meat Shop & Grocery. All rights reserved.</p>
                </div>
            </div>
        </div>

        <!-- Right Side - Plain Background -->
        <div class="hidden lg:flex lg:flex-1 bg-primary">
        </div>
    </div>

</body>
</html>
