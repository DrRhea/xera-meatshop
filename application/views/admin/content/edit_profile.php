<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-text">Edit Profile</h1>
            <p class="text-muted mt-1">Ubah informasi profil admin</p>
        </div>
        <a href="<?php echo base_url('admin/settings'); ?>" 
           class="bg-surface text-text px-4 py-2 rounded-lg hover:bg-border transition-colors duration-200 flex items-center">
            <i class='bx bx-arrow-back mr-2'></i>
            Kembali
        </a>
    </div>

    <!-- Form -->
    <form class="space-y-6">
        <div class="bg-card border border-border rounded-lg p-6">
            <!-- Profile Picture -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-text mb-4">Foto Profil</h3>
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <img src="<?php echo base_url('gambar/logo_new.jpg'); ?>" 
                             alt="Profile Picture" 
                             class="w-20 h-20 rounded-full object-cover border-2 border-border">
                        <button type="button" 
                                class="absolute -bottom-1 -right-1 bg-primary text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-primary-700 transition-colors duration-200">
                            <i class='bx bx-camera text-sm'></i>
                        </button>
                    </div>
                    <div>
                        <button type="button" 
                                class="bg-surface text-text px-4 py-2 rounded-lg hover:bg-border transition-colors duration-200">
                            <i class='bx bx-upload mr-2'></i>
                            Upload Foto
                        </button>
                        <p class="text-sm text-muted mt-1">JPG, PNG maksimal 2MB</p>
                    </div>
                </div>
            </div>

            <!-- Personal Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-text mb-4">Informasi Personal</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               value="Admin Meat Shop"
                               required>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Username <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               value="admin"
                               required>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               value="admin@meatshop.com"
                               required>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            No. Telepon
                        </label>
                        <input type="tel" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               value="+62 812-3456-7890">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Jabatan
                        </label>
                        <input type="text" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               value="Administrator">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Tanggal Bergabung
                        </label>
                        <input type="date" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               value="2024-01-01"
                               readonly>
                    </div>
                </div>
            </div>

            <!-- Account Settings -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-text mb-4">Pengaturan Akun</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Role
                        </label>
                        <select class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="admin" selected>Administrator</option>
                            <option value="manager">Manager</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Status Akun
                        </label>
                        <select class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="active" selected>Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Timezone
                        </label>
                        <select class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="Asia/Jakarta" selected>Asia/Jakarta (WIB)</option>
                            <option value="Asia/Makassar">Asia/Makassar (WITA)</option>
                            <option value="Asia/Jayapura">Asia/Jayapura (WIT)</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Bahasa
                        </label>
                        <select class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="id" selected>Bahasa Indonesia</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Preferences -->
            <div class="bg-surface rounded-lg p-6">
                <h3 class="text-lg font-semibold text-text mb-4">Preferensi</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="font-medium text-text">Email Notifications</h4>
                            <p class="text-sm text-muted">Terima notifikasi via email</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                        </label>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="font-medium text-text">SMS Notifications</h4>
                            <p class="text-sm text-muted">Terima notifikasi via SMS</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                        </label>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="font-medium text-text">Dark Mode</h4>
                            <p class="text-sm text-muted">Gunakan tema gelap</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-4">
            <a href="<?php echo base_url('admin/settings'); ?>" 
               class="bg-surface text-text px-6 py-3 rounded-lg hover:bg-border transition-colors duration-200">
                Batal
            </a>
            <button type="submit" 
                    class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-700 transition-colors duration-200">
                <i class='bx bx-save mr-2'></i>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
