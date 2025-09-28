<!-- Edit Profile -->
<div class="space-y-8">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Profil</h1>
            <p class="text-gray-600 mt-1">Perbarui informasi profil admin Anda</p>
        </div>
    </div>

    <!-- Flash Messages -->
    <?php if($this->session->flashdata('success')): ?>
        <div class="p-4 bg-green-50 border border-green-200 rounded-xl">
            <p class="text-green-700 text-sm"><?php echo $this->session->flashdata('success'); ?></p>
        </div>
    <?php endif; ?>
    
    <?php if($this->session->flashdata('error')): ?>
        <div class="p-4 bg-red-50 border border-red-200 rounded-xl">
            <p class="text-red-700 text-sm"><?php echo $this->session->flashdata('error'); ?></p>
        </div>
    <?php endif; ?>

    <!-- Profile Form -->
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <form action="<?php echo base_url('admin/update_profile'); ?>" method="POST" class="space-y-6">
            <!-- Username -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($admin_profile->username ?? ''); ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200"
                       placeholder="Masukkan username" required>
                <p class="text-sm text-gray-500 mt-1">Username untuk login ke sistem</p>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($admin_profile->email ?? ''); ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200"
                       placeholder="Masukkan email" required>
                <p class="text-sm text-gray-500 mt-1">Email untuk notifikasi dan komunikasi</p>
            </div>

            <!-- Full Name -->
            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($admin_profile->full_name ?? ''); ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200"
                       placeholder="Masukkan nama lengkap" required>
                <p class="text-sm text-gray-500 mt-1">Nama lengkap yang akan ditampilkan di sistem</p>
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($admin_profile->phone ?? ''); ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200"
                       placeholder="Masukkan nomor telepon">
                <p class="text-sm text-gray-500 mt-1">Nomor telepon untuk kontak darurat</p>
            </div>

            <!-- Role (Read Only) -->
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                <input type="text" id="role" value="<?php echo htmlspecialchars($admin_profile->role ?? 'Administrator'); ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-600 cursor-not-allowed"
                       readonly>
                <p class="text-sm text-gray-500 mt-1">Role tidak dapat diubah</p>
            </div>

            <!-- Status (Read Only) -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status Akun</label>
                <input type="text" id="status" value="<?php echo htmlspecialchars($admin_profile->status ?? 'Aktif'); ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-600 cursor-not-allowed"
                       readonly>
                <p class="text-sm text-gray-500 mt-1">Status akun tidak dapat diubah</p>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="<?php echo base_url('admin/settings'); ?>" 
                   class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                    Batal
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary-700 transition-colors duration-200 font-medium">
                    <i class='bx bx-save mr-2'></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</div>