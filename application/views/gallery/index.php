<!-- Hero Section -->
<section class="bg-gradient-to-br from-primary/10 to-primary/5 py-16">
    <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-bold text-text mb-6">Galeri Kami</h1>
            <p class="text-lg text-muted leading-relaxed">
                Lihat koleksi foto dan gambar dari Meat Shop & Grocery. 
                Dari produk segar hingga suasana toko yang hangat.
            </p>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-16 bg-white">
    <div class="w-full px-4 sm:px-6 lg:px-8">
        <?php if (empty($gallery)): ?>
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="flex flex-col items-center">
                    <i class='bx bx-images text-6xl text-muted mb-6'></i>
                    <h3 class="text-2xl font-semibold text-text mb-4">Galeri Kosong</h3>
                    <p class="text-muted mb-8 max-w-md">
                        Belum ada foto atau gambar yang tersedia di galeri saat ini. 
                        Silakan kembali lagi nanti.
                    </p>
                    <a href="<?php echo base_url(); ?>" 
                       class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-700 transition-colors duration-200">
                        <i class='bx bx-home mr-2'></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        <?php else: ?>
            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <?php foreach ($gallery as $item): ?>
                    <div class="bg-white rounded-2xl transition-all duration-300 group overflow-hidden hover:shadow-lg">
                        <!-- Image Container -->
                        <div class="relative h-64 bg-gradient-to-br from-primary/20 to-primary/10 flex items-center justify-center overflow-hidden">
                            <?php if ($item->image && file_exists(FCPATH . $item->image)): ?>
                                <img src="<?php echo base_url($item->image); ?>" 
                                     alt="<?php echo htmlspecialchars($item->title); ?>" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                    <i class='bx bx-image text-6xl text-gray-400'></i>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Category Badge -->
                            <span class="absolute top-4 left-4 bg-primary text-white px-3 py-1 text-xs font-semibold rounded-full">
                                <?php echo htmlspecialchars($item->category); ?>
                            </span>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo htmlspecialchars($item->title); ?></h3>
                            
                            <?php if (!empty($item->description)): ?>
                                <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                                    <?php echo htmlspecialchars($item->description); ?>
                                </p>
                            <?php endif; ?>
                            
                            <!-- Meta Info -->
                            <div class="flex items-center justify-between text-xs text-gray-500">
                                <span class="flex items-center">
                                    <i class='bx bx-calendar mr-1'></i>
                                    <?php echo date('d M Y', strtotime($item->created_at)); ?>
                                </span>
                                <span class="flex items-center">
                                    <i class='bx bx-category mr-1'></i>
                                    <?php echo htmlspecialchars($item->category); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Call to Action -->
            <div class="text-center mt-16">
                <div class="bg-gradient-to-r from-primary/10 to-primary/5 rounded-2xl p-8">
                    <h3 class="text-2xl font-bold text-text mb-4">Ingin Melihat Lebih Banyak?</h3>
                    <p class="text-muted mb-6 max-w-2xl mx-auto">
                        Jelajahi produk segar kami dan temukan berbagai pilihan daging berkualitas tinggi 
                        yang siap memenuhi kebutuhan keluarga Anda.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="<?php echo base_url('produk'); ?>" 
                           class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-700 transition-colors duration-200">
                            <i class='bx bx-box mr-2'></i>
                            Lihat Produk Kami
                        </a>
                        <a href="<?php echo base_url('about'); ?>" 
                           class="bg-white text-primary border border-primary px-6 py-3 rounded-lg hover:bg-primary hover:text-white transition-colors duration-200">
                            <i class='bx bx-info-circle mr-2'></i>
                            Tentang Kami
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
