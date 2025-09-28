<div class="space-y-6" x-data="{ showDeleteModal: false, selectedCustomer: null }">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-text">Kelola Pelanggan</h1>
            <p class="text-muted mt-1">Kelola data pelanggan</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="<?php echo base_url('admin/customers/add'); ?>" 
               class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200 flex items-center">
                <i class='bx bx-plus mr-2'></i>
                Tambah Pelanggan
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
                           placeholder="Cari pelanggan..." 
                           class="w-full pl-10 pr-4 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
            </div>
            
            <!-- Status Filter -->
            <div>
                <select class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="">Semua Status</option>
                    <option value="active">Aktif</option>
                    <option value="inactive">Tidak Aktif</option>
                    <option value="vip">VIP</option>
                </select>
            </div>
            
            <!-- Registration Date Filter -->
            <div>
                <input type="date" 
                       class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
        </div>
    </div>

    <!-- Customers Table -->
    <div class="bg-card border border-border rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-surface">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Pelanggan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Kontak</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Total Pesanan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Bergabung</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    <!-- Empty State -->
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <i class='bx bx-group text-4xl text-muted mb-4'></i>
                                <h3 class="text-lg font-medium text-text mb-2">Belum Ada Pelanggan</h3>
                                <p class="text-muted mb-4">Belum ada pelanggan yang tercatat dalam sistem</p>
                                <a href="<?php echo base_url('admin/customers/add'); ?>" 
                                   class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200">
                                    <i class='bx bx-plus mr-2'></i>
                                    Tambah Pelanggan Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-between">
        <div class="text-sm text-muted">
            Menampilkan 0 dari 0 pelanggan
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
            <p class="text-muted mb-6">Apakah Anda yakin ingin menghapus pelanggan ini? Tindakan ini tidak dapat dibatalkan.</p>
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
