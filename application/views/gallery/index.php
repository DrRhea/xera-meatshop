<!-- Alpine.js x-cloak CSS -->
<style>
    [x-cloak] { display: none !important; }
</style>

<!-- Main Container with Alpine.js -->
<div x-data="{ openModal: false, selectedItem: null }">
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
                    <div class="bg-white rounded-2xl transition-all duration-300 group overflow-hidden hover:shadow-lg cursor-pointer"
                         @click="
                             console.log('Card clicked');
                             openModal = true; 
                             selectedItem = {
                                 id: <?php echo $item->id; ?>,
                                 title: '<?php echo htmlspecialchars($item->title, ENT_QUOTES); ?>',
                                 description: '<?php echo htmlspecialchars($item->description, ENT_QUOTES); ?>',
                                 image: '<?php echo base_url($item->image); ?>',
                                 date: '<?php echo date('d M Y', strtotime($item->created_at)); ?>'
                             };
                             console.log('Selected item:', selectedItem);
                         ">
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
                            
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                                <i class='bx bx-search text-white text-4xl opacity-0 group-hover:opacity-100 transition-opacity duration-300'></i>
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo htmlspecialchars($item->title); ?></h3>
                            
                            <!-- Meta Info -->
                            <div class="flex items-center justify-end text-xs text-gray-500">
                                <span class="flex items-center">
                                    <i class='bx bx-calendar mr-1'></i>
                                    <?php echo date('d M Y', strtotime($item->created_at)); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
        <?php endif; ?>
    </div>
</section>

<!-- Gallery Modal -->
<div x-show="openModal" x-cloak
     class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75 p-4"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 scale-90"
     x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-90"
     @click.self="openModal = false"
     x-init="console.log('Modal initialized')"
     x-effect="console.log('Modal state changed:', openModal)">
    
    <div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-90">
        
        <!-- Modal Header -->
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900" x-text="selectedItem?.title"></h2>
            <button @click="openModal = false" 
                    class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                <i class='bx bx-x text-3xl'></i>
            </button>
        </div>
        
        <!-- Modal Content -->
        <div class="p-6 max-h-[calc(90vh-120px)] overflow-y-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Image -->
                <div class="space-y-4">
                    <div class="aspect-square bg-gray-100 rounded-xl overflow-hidden">
                        <img x-bind:src="selectedItem?.image" 
                             x-bind:alt="selectedItem?.title"
                             class="w-full h-full object-cover">
                    </div>
                    
                    <!-- Meta Info -->
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span class="flex items-center">
                            <i class='bx bx-calendar mr-2'></i>
                            <span x-text="selectedItem?.date"></span>
                        </span>
                        <span class="flex items-center">
                            <i class='bx bx-image mr-2'></i>
                            Galeri
                        </span>
                    </div>
                </div>
                
                <!-- Description -->
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Deskripsi</h3>
                        <p class="text-gray-600 leading-relaxed" x-text="selectedItem?.description || 'Tidak ada deskripsi tersedia.'"></p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Close Alpine.js container -->
</div>
