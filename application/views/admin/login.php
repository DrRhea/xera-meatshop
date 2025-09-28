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

                <!-- Login Form -->
                <form action="<?php echo base_url('authenticate'); ?>" method="POST" class="space-y-6">
                    <div>
                        <label for="username" class="block text-sm font-medium text-text mb-2">
                            Username
                        </label>
                        <input type="text" 
                               id="username" 
                               name="username" 
                               required
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="Masukkan username">
                    </div>
                    
                    <div>
                        <label for="password" class="block text-sm font-medium text-text mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   required
                                   class="w-full px-3 py-2 pr-10 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   placeholder="Masukkan password">
                            <button type="button" 
                                    id="togglePassword"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-muted hover:text-text transition-colors duration-200">
                                <i class='bx bx-hide text-xl' id="passwordIcon"></i>
                            </button>
                        </div>
                    </div>
                    
                    <button type="submit" 
                            class="w-full bg-primary text-white font-semibold py-3 px-4 rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all duration-200 flex items-center justify-center">
                        <i class='bx bx-log-in mr-2'></i>
                        Masuk ke Dashboard
                    </button>
                </form>

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

        <!-- Right Side - Banner Background -->
        <div class="hidden lg:flex lg:flex-1 bg-cover bg-center bg-no-repeat" 
             style="background-image: url('<?php echo base_url('gambar/banner.jpg'); ?>');">
            <!-- Overlay untuk readability -->
            <div class="w-full h-full bg-black bg-opacity-20">
            </div>
        </div>
    </div>

    <!-- JavaScript untuk toggle password -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');
            
            togglePassword.addEventListener('click', function() {
                // Toggle password visibility
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    passwordIcon.className = 'bx bx-show text-xl';
                } else {
                    passwordInput.type = 'password';
                    passwordIcon.className = 'bx bx-hide text-xl';
                }
            });
        });
    </script>

</body>
</html>
