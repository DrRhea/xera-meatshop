<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-text">Pengaturan</h1>
            <p class="text-muted mt-1">Kelola pengaturan sistem dan akun</p>
        </div>
    </div>

    <!-- Settings Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Edit Konten Halaman -->
        <div class="bg-card border border-border rounded-lg p-6 hover:shadow-md transition-shadow duration-200">
            <div class="text-center">
                <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class='bx bx-edit text-white text-2xl'></i>
                </div>
                <h3 class="text-xl font-semibold text-text mb-2">Edit Konten Halaman</h3>
                <p class="text-muted mb-6">Kelola konten halaman beranda, tentang kami, dan halaman lainnya</p>
                <a href="<?php echo base_url('admin/settings/content'); ?>" 
                   class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200 inline-flex items-center">
                    <i class='bx bx-edit mr-2'></i>
                    Kelola Konten
                </a>
            </div>
        </div>

        <!-- Edit Profile -->
        <div class="bg-card border border-border rounded-lg p-6 hover:shadow-md transition-shadow duration-200">
            <div class="text-center">
                <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class='bx bx-user text-white text-2xl'></i>
                </div>
                <h3 class="text-xl font-semibold text-text mb-2">Edit Profile</h3>
                <p class="text-muted mb-6">Ubah informasi profil admin dan pengaturan akun</p>
                <a href="<?php echo base_url('admin/settings/profile'); ?>" 
                   class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200 inline-flex items-center">
                    <i class='bx bx-user mr-2'></i>
                    Edit Profile
                </a>
            </div>
        </div>

        <!-- Ganti Password -->
        <div class="bg-card border border-border rounded-lg p-6 hover:shadow-md transition-shadow duration-200">
            <div class="text-center">
                <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class='bx bx-lock text-white text-2xl'></i>
                </div>
                <h3 class="text-xl font-semibold text-text mb-2">Ganti Password</h3>
                <p class="text-muted mb-6">Ubah password untuk keamanan akun admin</p>
                <a href="<?php echo base_url('admin/settings/password'); ?>" 
                   class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200 inline-flex items-center">
                    <i class='bx bx-lock mr-2'></i>
                    Ganti Password
                </a>
            </div>
        </div>
    </div>

    <!-- System Information -->
    <div class="bg-card border border-border rounded-lg p-6">
        <h3 class="text-lg font-semibold text-text mb-4">Informasi Sistem</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-muted">Versi Aplikasi</span>
                    <span class="text-text font-medium">v1.0.0</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-muted">Framework</span>
                    <span class="text-text font-medium">CodeIgniter 3.1.13</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-muted">PHP Version</span>
                    <span class="text-text font-medium"><?php echo phpversion(); ?></span>
                </div>
            </div>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-muted">Server</span>
                    <span class="text-text font-medium"><?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?></span>
                </div>
                <div class="flex justify-between">
                    <span class="text-muted">Database</span>
                    <span class="text-text font-medium">MySQL</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-muted">Last Update</span>
                    <span class="text-text font-medium"><?php echo date('d M Y'); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
