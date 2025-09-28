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

<!-- Action Bar -->
<div class="flex justify-between items-center mb-4">
    <form method="GET" action="<?php echo base_url('admin/products'); ?>" class="flex items-center space-x-4">
        <div class="relative">
            <input type="text" 
                   name="search"
                   value="<?php echo htmlspecialchars($search); ?>"
                   placeholder="Cari produk..." 
                   class="w-64 px-3 py-2 border border-border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            <i class='bx bx-search absolute right-3 top-2.5 text-muted'></i>
        </div>
        <select name="category" class="px-3 py-2 border border-border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary">
            <option value="">Semua Kategori</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo htmlspecialchars($category); ?>" <?php echo ($selected_category == $category) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($category); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200">
            <i class='bx bx-search mr-1'></i>
            Cari
        </button>
    </form>
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
                <?php if (empty($products)): ?>
                    <!-- Empty State -->
                    <tr>
                        <td colspan="7" class="px-4 py-12 text-center">
                            <i class='bx bx-package text-4xl text-muted mb-3'></i>
                            <h4 class="text-lg font-medium text-text mb-2">Belum Ada Produk</h4>
                            <p class="text-muted text-sm">Mulai dengan menambahkan produk pertama Anda</p>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <?php if ($product->image): ?>
                                    <img src="<?php echo base_url($product->image); ?>" 
                                         alt="<?php echo htmlspecialchars($product->name); ?>" 
                                         class="w-12 h-12 object-cover rounded-lg">
                                <?php else: ?>
                                    <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <i class='bx bx-package text-gray-400 text-xl'></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-text"><?php echo htmlspecialchars($product->name); ?></div>
                                <div class="text-sm text-muted"><?php echo htmlspecialchars($product->description); ?></div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-muted">
                                <?php echo htmlspecialchars($product->category); ?>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-muted">
                                Rp <?php echo number_format($product->price, 0, ',', '.'); ?>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-muted">
                                <?php echo $product->stock; ?> <?php echo htmlspecialchars($product->unit); ?>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    <?php echo $product->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                                    <?php echo ucfirst($product->status); ?>
                                </span>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <a href="<?php echo base_url('admin/products/edit/' . $product->id); ?>" 
                                       class="inline-flex items-center justify-center w-8 h-8 text-primary hover:text-primary-700 hover:bg-primary-50 rounded-lg transition-colors duration-200"
                                       title="Edit Produk">
                                        <i class='bx bx-edit text-lg'></i>
                                    </a>
                                    <button @click="
                                        deleteItem = {
                                            title: 'Hapus Produk',
                                            message: 'Apakah Anda yakin ingin menghapus produk ini? Semua data terkait akan dihapus secara permanen.',
                                            itemName: '<?php echo htmlspecialchars($product->name, ENT_QUOTES); ?>',
                                            url: '<?php echo base_url('admin/products/delete/' . $product->id); ?>',
                                            confirmText: 'Hapus Produk'
                                        };
                                        showDeleteModal = true;
                                    " 
                                       class="inline-flex items-center justify-center w-8 h-8 text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition-colors duration-200"
                                       title="Hapus Produk">
                                        <i class='bx bx-trash text-lg'></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <?php if (!empty($products) && $pagination): ?>
        <div class="px-4 py-3 flex items-center justify-between border-t border-border bg-surface">
            <div class="flex-1 flex justify-between sm:hidden">
                <?php echo $pagination; ?>
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-muted">
                        Menampilkan
                        <span class="font-medium"><?php echo (($current_page - 1) * 10) + 1; ?></span>
                        sampai
                        <span class="font-medium"><?php echo min($current_page * 10, $total_products); ?></span>
                        dari
                        <span class="font-medium"><?php echo $total_products; ?></span>
                        hasil
                    </p>
                </div>
                <div>
                    <?php echo $pagination; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Include Delete Confirmation Modal -->
    <?php $this->load->view('admin/components/delete_confirmation_modal'); ?>
</div>
