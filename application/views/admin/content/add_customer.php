<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-text">Tambah Pelanggan</h1>
            <p class="text-muted mt-1">Tambah pelanggan baru ke sistem</p>
        </div>
        <a href="<?php echo base_url('admin/customers'); ?>" 
           class="bg-surface text-text px-4 py-2 rounded-lg hover:bg-border transition-colors duration-200 flex items-center">
            <i class='bx bx-arrow-back mr-2'></i>
            Kembali
        </a>
    </div>

    <!-- Form -->
    <form class="space-y-6">
        <div class="bg-card border border-border rounded-lg p-6">
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
                               placeholder="Masukkan nama lengkap">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="Masukkan email">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            No. Telepon <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="Masukkan nomor telepon">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Tanggal Lahir
                        </label>
                        <input type="date" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-text mb-2">
                            Jenis Kelamin
                        </label>
                        <div class="flex space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="male" class="mr-2">
                                <span class="text-text">Laki-laki</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="gender" value="female" class="mr-2">
                                <span class="text-text">Perempuan</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-text mb-4">Informasi Alamat</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-text mb-2">
                            Alamat Lengkap <span class="text-red-500">*</span>
                        </label>
                        <textarea rows="3" 
                                  class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none"
                                  placeholder="Masukkan alamat lengkap"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Kota
                        </label>
                        <input type="text" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="Masukkan kota">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Kode Pos
                        </label>
                        <input type="text" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="Masukkan kode pos">
                    </div>
                </div>
            </div>

            <!-- Customer Settings -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-text mb-4">Pengaturan Pelanggan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Status Pelanggan
                        </label>
                        <select class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                            <option value="vip">VIP</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Sumber Pelanggan
                        </label>
                        <select class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="website">Website</option>
                            <option value="social_media">Media Sosial</option>
                            <option value="referral">Referral</option>
                            <option value="walk_in">Datang Langsung</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-text mb-2">
                            Catatan Pelanggan
                        </label>
                        <textarea rows="3" 
                                  class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none"
                                  placeholder="Catatan khusus tentang pelanggan ini"></textarea>
                    </div>
                </div>
            </div>

            <!-- Preferences -->
            <div class="bg-surface rounded-lg p-6">
                <h3 class="text-lg font-semibold text-text mb-4">Preferensi Pelanggan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Produk Favorit
                        </label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span class="text-text">Daging Sapi</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span class="text-text">Daging Ayam</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span class="text-text">Seafood</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span class="text-text">Sayuran</span>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Metode Pembayaran Favorit
                        </label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span class="text-text">Tunai</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span class="text-text">Transfer Bank</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="mr-2">
                                <span class="text-text">QRIS</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-4">
            <a href="<?php echo base_url('admin/customers'); ?>" 
               class="bg-surface text-text px-6 py-3 rounded-lg hover:bg-border transition-colors duration-200">
                Batal
            </a>
            <button type="submit" 
                    class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-700 transition-colors duration-200">
                <i class='bx bx-save mr-2'></i>
                Simpan Pelanggan
            </button>
        </div>
    </form>
</div>
