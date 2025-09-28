<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-text">Edit Konten Halaman</h1>
            <p class="text-muted mt-1">Kelola konten halaman website</p>
        </div>
        <a href="<?php echo base_url('admin/settings'); ?>" 
           class="bg-surface text-text px-4 py-2 rounded-lg hover:bg-border transition-colors duration-200 flex items-center">
            <i class='bx bx-arrow-back mr-2'></i>
            Kembali
        </a>
    </div>

    <!-- Content Tabs -->
    <div class="bg-card border border-border rounded-lg">
        <div class="border-b border-border">
            <nav class="flex space-x-8 px-6">
                <button class="py-4 px-1 border-b-2 border-primary text-primary font-medium text-sm">
                    Beranda
                </button>
                <button class="py-4 px-1 border-b-2 border-transparent text-muted hover:text-text font-medium text-sm">
                    Tentang Kami
                </button>
                <button class="py-4 px-1 border-b-2 border-transparent text-muted hover:text-text font-medium text-sm">
                    Kontak
                </button>
            </nav>
        </div>

        <div class="p-6">
            <!-- Beranda Content -->
            <div class="space-y-6">
                <!-- Hero Section -->
                <div>
                    <h3 class="text-lg font-semibold text-text mb-4">Hero Section</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Judul Utama
                            </label>
                            <input type="text" 
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="Selamat Datang di Meat Shop & Grocery">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Sub Judul
                            </label>
                            <input type="text" 
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="Daging Segar Berkualitas untuk Keluarga Anda">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-text mb-2">
                                Deskripsi
                            </label>
                            <textarea rows="3" 
                                      class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none">Kami menyediakan daging segar berkualitas tinggi dan kebutuhan dapur lengkap untuk keluarga Anda. Dengan komitmen kualitas terbaik dan harga bersahabat.</textarea>
                        </div>
                    </div>
                </div>

                <!-- About Section -->
                <div>
                    <h3 class="text-lg font-semibold text-text mb-4">Tentang Kami Section</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Judul Section
                            </label>
                            <input type="text" 
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="Tentang Meat Shop & Grocery">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Deskripsi
                            </label>
                            <textarea rows="4" 
                                      class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none">Meat Shop & Grocery Semarang adalah toko yang menyediakan berbagai kebutuhan dapur mulai dari daging segar berkualitas, bumbu pilihan, produk bakery, sayur, buah, hingga dairy. Kami hadir untuk memberikan pengalaman belanja yang mudah, praktis, dan terpercaya bagi masyarakat Semarang dan sekitarnya.</textarea>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold text-text mb-4">Informasi Kontak</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Nomor Telepon
                            </label>
                            <input type="tel" 
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="+62 812-3456-7890">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Email
                            </label>
                            <input type="email" 
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="info@meatshop.com">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-text mb-2">
                                Alamat
                            </label>
                            <textarea rows="2" 
                                      class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none">Jl. Suratmo No.59, Gisikdrono, Kec. Semarang Barat, Kota Semarang, Jawa Tengah 50147</textarea>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div>
                    <h3 class="text-lg font-semibold text-text mb-4">Media Sosial</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Facebook
                            </label>
                            <input type="url" 
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   placeholder="https://facebook.com/meatshop">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Instagram
                            </label>
                            <input type="url" 
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   placeholder="https://instagram.com/meatshop">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                WhatsApp
                            </label>
                            <input type="tel" 
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   placeholder="+62 812-3456-7890">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                TikTok
                            </label>
                            <input type="url" 
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   placeholder="https://tiktok.com/@meatshop">
                        </div>
                    </div>
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
</div>
