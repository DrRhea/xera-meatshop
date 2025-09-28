<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terjadi Kesalahan - Meat Shop & Grocery</title>
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
                        primary: '#d4af37',
                        'primary-700': '#b8941f',
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
</head>
<body class="font-inter bg-surface text-text flex items-center justify-center min-h-screen p-4">
    <div class="text-center max-w-xl w-full">
        <div class="mb-6">
            <i class='bx bx-error-alt text-red-600 text-6xl mb-2'></i>
            <h1 class="text-3xl font-bold text-text mb-2">Terjadi Kesalahan</h1>
            <p class="text-lg text-muted">Maaf, terjadi kesalahan tak terduga pada aplikasi kami.</p>
        </div>

        <?php if (defined('ENVIRONMENT') && ENVIRONMENT === 'development'): ?>
            <div class="bg-card border border-red-200 rounded-lg p-4 text-left mb-8">
                <h3 class="text-lg font-semibold text-red-700 mb-2">Detail Error:</h3>
                <p class="font-mono text-sm text-red-600 break-all">
                    <strong>Type:</strong> <?php echo isset($severity) ? htmlspecialchars($severity) : 'Unknown'; ?><br>
                    <strong>Message:</strong> <?php echo isset($message) ? htmlspecialchars($message) : 'Unknown error'; ?><br>
                    <strong>Filename:</strong> <?php echo isset($filepath) ? htmlspecialchars($filepath) : 'Unknown'; ?><br>
                    <strong>Line Number:</strong> <?php echo isset($line) ? htmlspecialchars($line) : 'Unknown'; ?>
                </p>
                <?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>
                    <h4 class="font-semibold text-red-700 mt-4 mb-2">Backtrace:</h4>
                    <pre class="font-mono text-xs text-red-600 bg-red-50 p-2 rounded overflow-auto"><?php echo htmlspecialchars($backtrace); ?></pre>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4 mb-12">
            <a href="<?php echo base_url(); ?>" class="bg-primary text-white font-semibold py-3 px-6 rounded-lg hover:bg-primary-700 transition-colors duration-200 flex items-center justify-center space-x-2">
                <i class='bx bx-home-alt text-xl'></i>
                <span>Kembali ke Beranda</span>
            </a>
            <button onclick="history.back()" class="bg-card border border-border text-text font-semibold py-3 px-6 rounded-lg hover:bg-surface transition-colors duration-200 flex items-center justify-center space-x-2">
                <i class='bx bx-arrow-back text-xl'></i>
                <span>Kembali ke Halaman Sebelumnya</span>
            </button>
        </div>
        
        <div class="text-left border-t border-border pt-8 mt-8">
            <h3 class="text-xl font-semibold text-text mb-4">Butuh Bantuan?</h3>
            <ul class="space-y-3 text-muted">
                <li>
                    <a href="mailto:support@meatshopgrocery.com" class="flex items-center space-x-3 hover:text-primary transition-colors duration-200">
                        <i class='bx bx-support text-lg'></i>
                        <span>Hubungi Tim Support</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('about'); ?>" class="flex items-center space-x-3 hover:text-primary transition-colors duration-200">
                        <i class='bx bx-info-circle text-lg'></i>
                        <span>Tentang Kami</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="mt-12 text-center text-muted text-sm">
            <p>&copy; 2025 Meat Shop & Grocery. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
