<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Error - Terjadi Kesalahan</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
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
</head>
<body class="font-inter bg-surface min-h-screen">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-lg w-full text-center">
            <!-- Error Icon -->
            <div class="mb-8">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class='bx bx-error text-4xl text-red-600'></i>
                </div>
                <div class="w-16 h-1 bg-red-600 mx-auto"></div>
            </div>
            
            <!-- Error Message -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-text mb-4">Terjadi Kesalahan</h1>
                <p class="text-muted leading-relaxed mb-6">
                    Maaf, terjadi kesalahan pada server. Tim kami telah diberitahu dan sedang memperbaiki masalah ini.
                </p>
                
                <!-- Error Details (only in development) -->
                <?php if (ENVIRONMENT === 'development' && isset($message)): ?>
                <div class="bg-red-50 border border-red-200 rounded-lg p-4 text-left">
                    <h3 class="text-sm font-medium text-red-800 mb-2">Detail Error:</h3>
                    <p class="text-xs text-red-700 font-mono"><?php echo htmlspecialchars($message); ?></p>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Action Buttons -->
            <div class="space-y-4">
                <a href="<?php echo base_url(); ?>" 
                   class="inline-flex items-center justify-center w-full bg-primary text-white py-3 px-6 rounded-lg hover:bg-primary-700 transition-colors duration-200">
                    <i class='bx bx-home mr-2'></i>
                    Kembali ke Beranda
                </a>
                
                <a href="javascript:history.back()" 
                   class="inline-flex items-center justify-center w-full bg-card text-text border border-border py-3 px-6 rounded-lg hover:bg-surface transition-colors duration-200">
                    <i class='bx bx-arrow-left mr-2'></i>
                    Kembali ke Halaman Sebelumnya
                </a>
            </div>
            
            <!-- Help Section -->
            <div class="mt-12 pt-8 border-t border-border">
                <h3 class="text-lg font-medium text-text mb-4">Butuh Bantuan?</h3>
                <div class="space-y-3">
                    <a href="<?php echo base_url('kontak'); ?>" 
                       class="block text-muted hover:text-primary transition-colors duration-200">
                        <i class='bx bx-phone mr-2'></i>
                        Hubungi Tim Support
                    </a>
                    <a href="<?php echo base_url('tentang-kami'); ?>" 
                       class="block text-muted hover:text-primary transition-colors duration-200">
                        <i class='bx bx-info-circle mr-2'></i>
                        Tentang Kami
                    </a>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="mt-12 text-center">
                <p class="text-xs text-muted">
                    &copy; 2025 Meat Shop & Grocery. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
