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

    <!-- Search and Filter -->
    <div class="bg-card border border-border rounded-lg p-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Search -->
            <div class="md:col-span-2">
                <div class="relative">
                    <i class='bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 text-muted'></i>
                    <input type="text" 
                           placeholder="Cari galeri..." 
                           class="w-full pl-10 pr-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
            </div>
            
            <!-- Category Filter -->
            <div>
                <select class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="">Semua Kategori</option>
                    <option value="products">Produk</option>
                    <option value="store">Toko</option>
                    <option value="team">Tim</option>
                    <option value="events">Acara</option>
                </select>
            </div>
            
            <!-- Status Filter -->
            <div>
                <select class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="">Semua Status</option>
                    <option value="active">Aktif</option>
                    <option value="inactive">Tidak Aktif</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Gallery Grid -->
    <div class="bg-card border border-border rounded-lg p-6">
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
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-between">
        <div class="text-sm text-muted">
            Menampilkan 0 dari 0 galeri
        </div>
        <div class="flex items-center space-x-2">
            <button disabled class="px-3 py-2 text-muted border border-border rounded-lg cursor-not-allowed">
                <i class='bx bx-chevron-left'></i>
            </button>
            <span class="px-3 py-2 bg-primary text-white rounded-lg">1</span>
            <button disabled class="px-3 py-2 text-muted border border-border rounded-lg cursor-not-allowed">
                <i class='bx bx-chevron-right'></i>
            </button>
        </div>
    </div>
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
