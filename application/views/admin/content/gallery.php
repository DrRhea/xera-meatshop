<div class="space-y-6" x-data="{ showDeleteModal: false, selectedGallery: null }">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-text">Kelola Galeri</h1>
            <p class="text-muted mt-1">Kelola foto dan gambar galeri</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="<?php echo base_url('admin/gallery/add'); ?>" 
               class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200 flex items-center">
                <i class='bx bx-plus mr-2'></i>
                Tambah Galeri
            </a>
        </div>
    </div>

    <!-- Flash Messages -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center space-x-2">
            <i class='bx bx-check-circle text-xl'></i>
            <span><?php echo $this->session->flashdata('success'); ?></span>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-center space-x-2">
            <i class='bx bx-error-circle text-xl'></i>
            <span><?php echo $this->session->flashdata('error'); ?></span>
        </div>
    <?php endif; ?>

    <!-- Search and Filter -->
    <div class="bg-card border border-border rounded-lg p-4">
        <form method="GET" action="<?php echo base_url('admin/gallery'); ?>" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Search -->
            <div class="md:col-span-2">
                <div class="relative">
                    <i class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 text-muted'></i>
                    <input type="text" 
                           name="search"
                           value="<?php echo htmlspecialchars($search); ?>"
                           placeholder="Cari galeri..." 
                           class="w-full pl-10 pr-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
            </div>
            
            
            <!-- Status Filter -->
            <div>
                <select name="status" class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="">Semua Status</option>
                    <option value="active" <?php echo ($status == 'active') ? 'selected' : ''; ?>>Aktif</option>
                    <option value="inactive" <?php echo ($status == 'inactive') ? 'selected' : ''; ?>>Tidak Aktif</option>
                </select>
            </div>
            
            <div class="md:col-span-3 flex justify-end">
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200">
                    <i class='bx bx-search mr-1'></i>
                    Filter
                </button>
            </div>
        </form>
    </div>

    <!-- Gallery Grid -->
    <div class="bg-card border border-border rounded-lg p-6">
        <?php if (empty($gallery)): ?>
            <!-- Empty State -->
            <div class="text-center py-12">
                <div class="flex flex-col items-center">
                    <i class='bx bx-images text-4xl text-muted mb-4'></i>
                    <h3 class="text-lg font-medium text-text mb-2">Belum Ada Galeri</h3>
                    <p class="text-muted mb-4">Belum ada foto atau gambar yang diunggah ke galeri</p>
                    <a href="<?php echo base_url('admin/gallery/add'); ?>" 
                       class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200">
                        <i class='bx bx-plus mr-2'></i>
                        Tambah Galeri Pertama
                    </a>
                </div>
            </div>
        <?php else: ?>
            <!-- Gallery Items -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($gallery as $item): ?>
                    <div class="bg-white rounded-lg border border-border overflow-hidden hover:shadow-lg transition-shadow duration-200">
                        <!-- Image -->
                        <div class="aspect-square bg-gray-100 overflow-hidden">
                            <?php if ($item->image && file_exists(FCPATH . $item->image)): ?>
                                <img src="<?php echo base_url($item->image); ?>" 
                                     alt="<?php echo htmlspecialchars($item->title); ?>" 
                                     class="w-full h-full object-cover">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                    <i class='bx bx-image text-4xl text-gray-400'></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-4">
                            <h3 class="font-semibold text-text mb-2 line-clamp-2"><?php echo htmlspecialchars($item->title); ?></h3>
                            <p class="text-sm text-muted mb-3 line-clamp-2"><?php echo htmlspecialchars($item->description); ?></p>
                            
                            <!-- Meta Info -->
                            <div class="flex items-center justify-end text-xs text-muted mb-3">
                                <span class="<?php echo $item->status == 'active' ? 'text-green-600' : 'text-red-600'; ?>">
                                    <?php echo $item->status == 'active' ? 'Aktif' : 'Tidak Aktif'; ?>
                                </span>
                            </div>
                            
                            <!-- Actions -->
                            <div class="flex items-center space-x-2">
                                <a href="<?php echo base_url('admin/gallery/edit/' . $item->id); ?>" 
                                   class="flex-1 bg-primary text-white text-center py-2 px-3 rounded-lg hover:bg-primary-700 transition-colors duration-200 text-sm">
                                    <i class='bx bx-edit mr-1'></i>
                                    Edit
                                </a>
                                <a href="<?php echo base_url('admin/gallery/delete/' . $item->id); ?>" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')"
                                   class="bg-red-600 text-white py-2 px-3 rounded-lg hover:bg-red-700 transition-colors duration-200 text-sm">
                                    <i class='bx bx-trash'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if (!empty($pagination)): ?>
        <div class="flex items-center justify-between">
            <div class="text-sm text-muted">
                Menampilkan <?php echo count($gallery); ?> dari <?php echo $this->pagination->total_rows; ?> galeri
            </div>
            <div class="flex items-center space-x-2">
                <?php echo $pagination; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Delete Confirmation Modal -->
<div x-show="showDeleteModal" x-cloak
     class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 scale-90"
     x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-90">
    <div @click.away="showDeleteModal = false"
         class="bg-card rounded-lg p-6 w-full max-w-sm mx-auto border border-border">
        <div class="text-center">
            <i class='bx bx-trash-alt text-red-500 text-5xl mb-4'></i>
            <h3 class="text-xl font-semibold text-text mb-2">Konfirmasi Hapus</h3>
            <p class="text-muted mb-6">Apakah Anda yakin ingin menghapus galeri ini? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="flex justify-center space-x-4">
                <button @click="showDeleteModal = false" type="button"
                        class="bg-surface text-text px-4 py-2 rounded-lg hover:bg-border transition-colors duration-200">
                    Batal
                </button>
                <button type="button"
                        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors duration-200">
                    Hapus
                </button>
            </div>
        </div>
    </div>
</div>
