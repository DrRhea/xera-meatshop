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

    <!-- Flash Messages -->
    <?php if($this->session->flashdata('success')): ?>
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center space-x-2">
            <i class='bx bx-check-circle text-xl'></i>
            <span><?php echo $this->session->flashdata('success'); ?></span>
        </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-center space-x-2">
            <i class='bx bx-error-circle text-xl'></i>
            <span><?php echo $this->session->flashdata('error'); ?></span>
        </div>
    <?php endif; ?>

    <!-- Content Tabs -->
    <div class="bg-card border border-border rounded-lg" x-data="{ activeTab: 'homepage' }">
        <div class="border-b border-border">
            <nav class="flex space-x-8 px-6">
                <button @click="activeTab = 'homepage'" 
                        :class="activeTab === 'homepage' ? 'border-b-2 border-primary text-primary font-medium' : 'border-b-2 border-transparent text-muted hover:text-text font-medium'"
                        class="py-4 px-1 text-sm">
                    Beranda
                </button>
                <button @click="activeTab = 'about'" 
                        :class="activeTab === 'about' ? 'border-b-2 border-primary text-primary font-medium' : 'border-b-2 border-transparent text-muted hover:text-text font-medium'"
                        class="py-4 px-1 text-sm">
                    Tentang Kami
                </button>
                <button @click="activeTab = 'contact'" 
                        :class="activeTab === 'contact' ? 'border-b-2 border-primary text-primary font-medium' : 'border-b-2 border-transparent text-muted hover:text-text font-medium'"
                        class="py-4 px-1 text-sm">
                    Kontak
                </button>
            </nav>
        </div>

        <div class="p-6">
            <!-- Homepage Content -->
            <div x-show="activeTab === 'homepage'" class="space-y-6">
                <!-- Hero Section -->
                <div>
                    <h3 class="text-lg font-semibold text-text mb-4">Hero Section</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Judul Utama
                            </label>
                            <input type="text" 
                                   name="content[hero][title]"
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="<?php echo isset($homepage_content['hero']['title']) ? htmlspecialchars($homepage_content['hero']['title']) : 'Selamat Datang di Meat Shop & Grocery'; ?>">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Sub Judul
                            </label>
                            <input type="text" 
                                   name="content[hero][subtitle]"
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="<?php echo isset($homepage_content['hero']['subtitle']) ? htmlspecialchars($homepage_content['hero']['subtitle']) : 'Daging Segar Berkualitas untuk Keluarga Anda'; ?>">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-text mb-2">
                                Deskripsi
                            </label>
                            <textarea rows="3" 
                                      name="content[hero][description]"
                                      class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none"><?php echo isset($homepage_content['hero']['description']) ? htmlspecialchars($homepage_content['hero']['description']) : 'Kami menyediakan daging segar berkualitas tinggi dan kebutuhan dapur lengkap untuk keluarga Anda. Dengan komitmen kualitas terbaik dan harga bersahabat.'; ?></textarea>
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
                                   name="content[about][title]"
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="<?php echo isset($homepage_content['about']['title']) ? htmlspecialchars($homepage_content['about']['title']) : 'Tentang Meat Shop & Grocery'; ?>">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Deskripsi
                            </label>
                            <textarea rows="4" 
                                      name="content[about][description]"
                                      class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none"><?php echo isset($homepage_content['about']['description']) ? htmlspecialchars($homepage_content['about']['description']) : 'Meat Shop & Grocery Semarang adalah toko yang menyediakan berbagai kebutuhan dapur mulai dari daging segar berkualitas, bumbu pilihan, produk bakery, sayur, buah, hingga dairy. Kami hadir untuk memberikan pengalaman belanja yang mudah, praktis, dan terpercaya bagi masyarakat Semarang dan sekitarnya.'; ?></textarea>
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
                                   name="content[contact_info][phone]"
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="<?php echo isset($contact_content['info']['phone']) ? htmlspecialchars($contact_content['info']['phone']) : '(+62) 811-2993-400'; ?>">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Email
                            </label>
                            <input type="email" 
                                   name="content[contact_info][email]"
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="<?php echo isset($contact_content['info']['email']) ? htmlspecialchars($contact_content['info']['email']) : 'supplierdaging@mitraboga.com'; ?>">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-text mb-2">
                                Alamat
                            </label>
                            <textarea rows="2" 
                                      name="content[contact_info][address]"
                                      class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none"><?php echo isset($contact_content['info']['address']) ? htmlspecialchars($contact_content['info']['address']) : 'Jl. Suratmo No.59, Kalibanteng Kidul, Kec. Semarang Barat, Kota Semarang, Jawa Tengah 50147'; ?></textarea>
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
                                   name="content[social][facebook]"
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="<?php echo isset($contact_content['social']['facebook']) ? htmlspecialchars($contact_content['social']['facebook']) : ''; ?>"
                                   placeholder="https://facebook.com/meatshop">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Instagram
                            </label>
                            <input type="url" 
                                   name="content[social][instagram]"
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="<?php echo isset($contact_content['social']['instagram']) ? htmlspecialchars($contact_content['social']['instagram']) : ''; ?>"
                                   placeholder="https://instagram.com/meatshop">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                WhatsApp
                            </label>
                            <input type="tel" 
                                   name="content[contact_info][whatsapp]"
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="<?php echo isset($contact_content['info']['whatsapp']) ? htmlspecialchars($contact_content['info']['whatsapp']) : ''; ?>"
                                   placeholder="+62 812-3456-7890">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                TikTok
                            </label>
                            <input type="url" 
                                   name="content[social][tiktok]"
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="<?php echo isset($contact_content['social']['tiktok']) ? htmlspecialchars($contact_content['social']['tiktok']) : ''; ?>"
                                   placeholder="https://tiktok.com/@meatshop">
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Page Content -->
            <div x-show="activeTab === 'about'" class="space-y-6">
                <div>
                    <h3 class="text-lg font-semibold text-text mb-4">Halaman Tentang Kami</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Judul Halaman
                            </label>
                            <input type="text" 
                                   name="content[hero][title]"
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="<?php echo isset($about_content['hero']['title']) ? htmlspecialchars($about_content['hero']['title']) : 'Tentang Kami'; ?>">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Sub Judul
                            </label>
                            <input type="text" 
                                   name="content[hero][subtitle]"
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="<?php echo isset($about_content['hero']['subtitle']) ? htmlspecialchars($about_content['hero']['subtitle']) : 'CV. Semarang Boga Utama (Jawa Tengah, Indonesia)'; ?>">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Deskripsi 1
                            </label>
                            <textarea rows="4" 
                                      name="content[content][description1]"
                                      class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none"><?php echo isset($about_content['content']['description1']) ? htmlspecialchars($about_content['content']['description1']) : 'Meat Shop & Grocery Semarang adalah toko yang menyediakan berbagai kebutuhan dapur mulai dari daging segar berkualitas, bumbu pilihan, produk bakery, sayur, buah, hingga dairy. Kami hadir untuk memberikan pengalaman belanja yang mudah, praktis, dan terpercaya bagi masyarakat Semarang dan sekitarnya.'; ?></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Deskripsi 2
                            </label>
                            <textarea rows="4" 
                                      name="content[content][description2]"
                                      class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none"><?php echo isset($about_content['content']['description2']) ? htmlspecialchars($about_content['content']['description2']) : 'Dengan komitmen kualitas terbaik, harga bersahabat, dan layanan yang ramah, kami ingin menjadi mitra setia keluarga dalam memenuhi kebutuhan masakan sehari-hari maupun acara spesial. Semua produk dipilih secara teliti agar selalu fresh, higienis, dan siap diolah menjadi hidangan terbaik untuk keluarga Anda.'; ?></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Deskripsi 3
                            </label>
                            <textarea rows="4" 
                                      name="content[content][description3]"
                                      class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none"><?php echo isset($about_content['content']['description3']) ? htmlspecialchars($about_content['content']['description3']) : 'Seluruh produk daging sapi segar dan Dorper Lamb yang tersedia merupakan hasil pemotongan ternak yang berasal dari peternakan kami sendiri. Kami telah menerapkan konsep From Farm to Meat Shop sejak tahun 2012.'; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Page Content -->
            <div x-show="activeTab === 'contact'" class="space-y-6">
                <div>
                    <h3 class="text-lg font-semibold text-text mb-4">Halaman Kontak</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Judul Halaman
                            </label>
                            <input type="text" 
                                   name="content[hero][title]"
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="<?php echo isset($contact_content['hero']['title']) ? htmlspecialchars($contact_content['hero']['title']) : 'Hubungi Kami'; ?>">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">
                                Sub Judul
                            </label>
                            <input type="text" 
                                   name="content[hero][subtitle]"
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   value="<?php echo isset($contact_content['hero']['subtitle']) ? htmlspecialchars($contact_content['hero']['subtitle']) : 'Kami siap melayani kebutuhan belanja Anda. Jangan ragu untuk menghubungi kami'; ?>">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-text mb-2">
                                    Nomor Telepon
                                </label>
                                <input type="tel" 
                                       name="content[info][phone]"
                                       class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                       value="<?php echo isset($contact_content['info']['phone']) ? htmlspecialchars($contact_content['info']['phone']) : '(+62) 811-2993-400'; ?>">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-text mb-2">
                                    Jam Operasional
                                </label>
                                <input type="text" 
                                       name="content[info][phone_hours]"
                                       class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                       value="<?php echo isset($contact_content['info']['phone_hours']) ? htmlspecialchars($contact_content['info']['phone_hours']) : 'Senin - Minggu: 08:00 - 20:00 WIB'; ?>">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-text mb-2">
                                    Email
                                </label>
                                <input type="email" 
                                       name="content[info][email]"
                                       class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                       value="<?php echo isset($contact_content['info']['email']) ? htmlspecialchars($contact_content['info']['email']) : 'supplierdaging@mitraboga.com'; ?>">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-text mb-2">
                                    Response Time
                                </label>
                                <input type="text" 
                                       name="content[info][email_response]"
                                       class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                       value="<?php echo isset($contact_content['info']['email_response']) ? htmlspecialchars($contact_content['info']['email_response']) : 'Kami akan membalas dalam 24 jam'; ?>">
                            </div>
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
        <button type="button" 
                onclick="saveContent()"
                class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-700 transition-colors duration-200">
            <i class='bx bx-save mr-2'></i>
            Simpan Perubahan
        </button>
    </div>

    <script>
        function saveContent() {
            // Get current active tab using Alpine.js
            let activeTab = 'homepage'; // default
            try {
                const alpineData = document.querySelector('[x-data]');
                if (alpineData && alpineData.__x) {
                    activeTab = alpineData.__x.$data.activeTab;
                }
            } catch (e) {
                console.log('Could not get active tab from Alpine.js, using default');
            }
            
            console.log('Active tab:', activeTab);
            
            // Create form data
            const formData = new FormData();
            formData.append('page', activeTab);
            console.log('Page parameter:', activeTab);
            
            // Get all inputs from current active tab
            const activeTabElement = document.querySelector('[x-show="activeTab === \'' + activeTab + '\'"]');
            if (activeTabElement) {
                const inputs = activeTabElement.querySelectorAll('input, textarea');
                console.log('Found inputs:', inputs.length);
                
                inputs.forEach(input => {
                    if (input.name && input.name.startsWith('content[')) {
                        formData.append(input.name, input.value);
                        console.log('Added:', input.name, '=', input.value);
                    }
                });
            } else {
                console.log('Active tab element not found');
                alert('Tidak dapat menemukan tab yang aktif. Silakan refresh halaman dan coba lagi.');
                return;
            }
            
            // Show loading
            const button = document.querySelector('button[onclick="saveContent()"]');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="bx bx-loader-alt animate-spin mr-2"></i>Menyimpan...';
            button.disabled = true;
            
            // Submit form
            fetch('<?php echo base_url('admin/settings/update_content'); ?>', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                console.log('Response status:', response.status);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data);
                if (data.status === 'success') {
                    alert('Konten berhasil diperbarui! Silakan refresh halaman untuk melihat perubahan.');
                    // Optionally reload the page
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    alert('Gagal memperbarui konten: ' + (data.message || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menyimpan konten: ' + error.message);
            })
            .finally(() => {
                // Restore button
                button.innerHTML = originalText;
                button.disabled = false;
            });
        }
    </script>
</div>
