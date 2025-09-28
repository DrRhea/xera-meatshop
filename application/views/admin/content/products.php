<!-- Action Bar -->
<div class="flex justify-between items-center mb-4">
    <div class="flex items-center space-x-4">
        <div class="relative">
            <input type="text" 
                   placeholder="Cari produk..." 
                   class="w-64 px-3 py-2 border border-border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            <i class='bx bx-search absolute right-3 top-2.5 text-muted'></i>
        </div>
        <select class="px-3 py-2 border border-border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary">
            <option>Semua Kategori</option>
            <option>DAGING</option>
            <option>MINUMAN</option>
            <option>SEAFOOD</option>
            <option>BUMBU</option>
            <option>ROTI</option>
            <option>BUAH & SAYUR</option>
            <option>DAGING & OLAHAN</option>
            <option>SUSU & OLAHAN</option>
        </select>
    </div>
    <a href="<?php echo base_url('admin/products/add'); ?>" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200 flex items-center space-x-2">
        <i class='bx bx-plus text-sm'></i>
        <span class="text-sm">Tambah Produk</span>
    </a>
</div>

<!-- Products Table -->
<div class="bg-card rounded-lg border border-border">
    <div class="px-4 py-3 border-b border-border">
        <h3 class="text-lg font-semibold text-text">Daftar Produk</h3>
    </div>
    
    <!-- Table Header -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-surface">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Gambar</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Nama Produk</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Kategori</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Harga</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Stok</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Status</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-muted uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border">
                <!-- Empty State -->
                <tr>
                    <td colspan="7" class="px-4 py-12 text-center">
                        <i class='bx bx-package text-4xl text-muted mb-3'></i>
                        <h4 class="text-lg font-medium text-text mb-2">Belum Ada Produk</h4>
                        <p class="text-muted text-sm">Mulai dengan menambahkan produk pertama Anda</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
