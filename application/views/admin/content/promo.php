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

<!-- Page Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Kelola Promo Harian</h1>
        <p class="text-gray-600 mt-1">Kelola promo harian yang ditampilkan di halaman beranda</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="<?php echo base_url('admin/promo/add'); ?>" 
           class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200 flex items-center">
            <i class='bx bx-plus mr-2'></i>
            Tambah Promo
        </a>
    </div>
</div>

<!-- Search and Filter -->
<div class="bg-white rounded-lg border border-gray-200 p-4 mb-6">
    <form method="GET" action="<?php echo base_url('admin/promo'); ?>" class="flex flex-col sm:flex-row gap-4">
        <div class="flex-1">
            <input type="text" name="search" value="<?php echo htmlspecialchars($search ?? ''); ?>" 
                   placeholder="Cari promo atau produk..." 
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
        </div>
        <div class="sm:w-48">
            <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <option value="">Semua Status</option>
                <option value="active" <?php echo ($status === 'active') ? 'selected' : ''; ?>>Aktif</option>
                <option value="inactive" <?php echo ($status === 'inactive') ? 'selected' : ''; ?>>Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors duration-200 flex items-center">
            <i class='bx bx-search mr-2'></i>
            Cari
        </button>
        <a href="<?php echo base_url('admin/promo'); ?>" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition-colors duration-200 flex items-center">
            <i class='bx bx-refresh mr-2'></i>
            Reset
        </a>
    </form>
</div>

<!-- Promo List -->
<div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
    <?php if (!empty($promos)): ?>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Promo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Diskon</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Periode</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($promos as $promo): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <?php if (!empty($promo->product_image)): ?>
                                            <img class="h-10 w-10 rounded-lg object-cover" src="<?php echo base_url($promo->product_image); ?>" alt="<?php echo htmlspecialchars($promo->product_name); ?>">
                                        <?php else: ?>
                                            <div class="h-10 w-10 rounded-lg bg-gray-200 flex items-center justify-center">
                                                <i class='bx bx-image text-gray-400'></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($promo->product_name); ?></div>
                                        <div class="text-sm text-gray-500"><?php echo htmlspecialchars($promo->product_category); ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900"><?php echo htmlspecialchars($promo->title); ?></div>
                                <?php if (!empty($promo->description)): ?>
                                    <div class="text-sm text-gray-500"><?php echo htmlspecialchars(substr($promo->description, 0, 50)); ?>...</div>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500 line-through">Rp <?php echo number_format($promo->original_price, 0, ',', '.'); ?></div>
                                <div class="text-sm font-medium text-primary">Rp <?php echo number_format($promo->promo_price, 0, ',', '.'); ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <?php echo $promo->discount_percentage; ?>%
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div><?php echo date('d/m/Y', strtotime($promo->start_date)); ?></div>
                                <div>s/d <?php echo date('d/m/Y', strtotime($promo->end_date)); ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php if ($promo->is_active === 'active'): ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Aktif
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        Tidak Aktif
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <a href="<?php echo base_url('admin/promo/edit/' . $promo->id); ?>" 
                                       class="text-blue-600 hover:text-blue-900 transition-colors duration-200"
                                       title="Edit Promo">
                                        <i class='bx bx-edit text-lg'></i>
                                    </a>
                                    <button @click="
                                        deleteItem = {
                                            title: 'Hapus Promo',
                                            message: 'Apakah Anda yakin ingin menghapus promo ini? Semua data terkait akan dihapus secara permanen.',
                                            itemName: '<?php echo htmlspecialchars($promo->title, ENT_QUOTES); ?>',
                                            url: '<?php echo base_url('admin/promo/delete/' . $promo->id); ?>',
                                            confirmText: 'Hapus Promo'
                                        };
                                        showDeleteModal = true;
                                    " 
                                       class="text-red-600 hover:text-red-900 transition-colors duration-200"
                                       title="Hapus Promo">
                                        <i class='bx bx-trash text-lg'></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <?php if (!empty($pagination)): ?>
            <div class="bg-white px-4 py-3 border-t border-gray-200">
                <div class="flex justify-center">
                    <?php echo $pagination; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="text-center py-12">
            <i class='bx bx-gift text-6xl text-gray-300 mb-4'></i>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada promo</h3>
            <p class="text-gray-500 mb-6">Mulai buat promo harian pertama Anda untuk menarik pelanggan.</p>
            <a href="<?php echo base_url('admin/promo/add'); ?>" 
               class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-700 transition-colors duration-200 inline-flex items-center">
                <i class='bx bx-plus mr-2'></i>
                Tambah Promo Pertama
            </a>
        </div>
    <?php endif; ?>
</div>
