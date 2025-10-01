<!-- Welcome Section -->
<div class="mb-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-1">Selamat Datang di Dashboard</h2>
    <p class="text-gray-600 text-sm">Kelola bisnis Meat Shop & Grocery Anda dengan mudah</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Products -->
    <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Total Produk</p>
                <h3 class="text-2xl font-bold text-gray-900"><?php echo number_format($stats['total_products']); ?></h3>
                <p class="text-xs text-green-600 mt-1">
                    <i class='bx bx-check-circle mr-1'></i>
                    <?php echo $stats['active_products']; ?> Aktif
                </p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <i class='bx bx-box text-blue-600 text-xl'></i>
            </div>
        </div>
    </div>
    
    <!-- Total Orders -->
    <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Total Pesanan</p>
                <h3 class="text-2xl font-bold text-gray-900"><?php echo number_format($stats['total_orders']); ?></h3>
                <p class="text-xs text-blue-600 mt-1">
                    <i class='bx bx-trending-up mr-1'></i>
                    Rp <?php echo number_format($stats['total_revenue'], 0, ',', '.'); ?>
                </p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <i class='bx bx-cart-alt text-green-600 text-xl'></i>
            </div>
        </div>
    </div>
    
    <!-- Contact Messages -->
    <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Pesan Kontak</p>
                <h3 class="text-2xl font-bold text-gray-900"><?php echo number_format($stats['total_messages']); ?></h3>
                <p class="text-xs text-orange-600 mt-1">
                    <i class='bx bx-message-dots mr-1'></i>
                    <?php echo $stats['new_messages']; ?> Baru
                </p>
            </div>
            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                <i class='bx bx-message-square text-orange-600 text-xl'></i>
            </div>
        </div>
    </div>
    
    <!-- Low Stock Alert -->
    <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 mb-1">Stok Rendah</p>
                <h3 class="text-2xl font-bold text-gray-900"><?php echo number_format($stats['low_stock_count']); ?></h3>
                <p class="text-xs text-red-600 mt-1">
                    <i class='bx bx-error-circle mr-1'></i>
                    Perlu Restock
                </p>
            </div>
            <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                <i class='bx bx-error text-red-600 text-xl'></i>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    
    <!-- Recent Products -->
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Produk Terbaru</h3>
            <a href="<?php echo base_url('admin/products'); ?>" class="text-sm text-blue-600 hover:text-blue-800">
                Lihat Semua
            </a>
        </div>
        <div class="space-y-3">
            <?php if (!empty($recent_products)): ?>
                <?php foreach ($recent_products as $product): ?>
                <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                        <i class='bx bx-box text-gray-600'></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($product->name); ?></h4>
                        <p class="text-xs text-gray-600"><?php echo htmlspecialchars($product->category); ?> • Rp <?php echo number_format($product->price, 0, ',', '.'); ?></p>
                    </div>
                    <div class="text-right">
                        <span class="text-xs px-2 py-1 rounded-full <?php echo $product->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                            <?php echo ucfirst($product->status); ?>
                        </span>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center py-4">
                    <i class='bx bx-box text-4xl text-gray-300 mb-2'></i>
                    <p class="text-gray-500 text-sm">Belum ada produk</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Recent Messages -->
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Pesan Terbaru</h3>
            <a href="<?php echo base_url('admin/contact'); ?>" class="text-sm text-blue-600 hover:text-blue-800">
                Lihat Semua
            </a>
        </div>
        <div class="space-y-3">
            <?php if (!empty($recent_messages)): ?>
                <?php foreach ($recent_messages as $message): ?>
                <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class='bx bx-user text-blue-600'></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($message->name); ?></h4>
                        <p class="text-xs text-gray-600"><?php echo htmlspecialchars($message->subject); ?></p>
                        <p class="text-xs text-gray-500"><?php echo date('d M Y H:i', strtotime($message->created_at)); ?></p>
                    </div>
                    <div class="text-right">
                        <span class="text-xs px-2 py-1 rounded-full <?php echo $message->status == 'new' ? 'bg-orange-100 text-orange-800' : 'bg-green-100 text-green-800'; ?>">
                            <?php echo ucfirst($message->status); ?>
                        </span>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center py-4">
                    <i class='bx bx-message-square text-4xl text-gray-300 mb-2'></i>
                    <p class="text-gray-500 text-sm">Belum ada pesan</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Low Stock Products Alert -->
<?php if (!empty($low_stock_products)): ?>
<div class="bg-white rounded-xl border border-red-200 p-6 mb-6">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-semibold text-red-900">⚠️ Produk Stok Rendah</h3>
        <a href="<?php echo base_url('admin/products'); ?>" class="text-sm text-red-600 hover:text-red-800">
            Kelola Stok
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($low_stock_products as $product): ?>
        <div class="flex items-center space-x-3 p-3 bg-red-50 rounded-lg border border-red-200">
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                <i class='bx bx-error text-red-600'></i>
            </div>
            <div class="flex-1">
                <h4 class="text-sm font-medium text-red-900"><?php echo htmlspecialchars($product->name); ?></h4>
                <p class="text-xs text-red-600">Stok: <?php echo $product->stock; ?> <?php echo $product->unit; ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>

<!-- Quick Actions -->
<div class="bg-white rounded-xl border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="<?php echo base_url('admin/products/add'); ?>" class="flex items-center space-x-3 p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
            <i class='bx bx-plus text-blue-600 text-xl'></i>
            <span class="text-sm font-medium text-blue-900">Tambah Produk</span>
        </a>
        <a href="<?php echo base_url('admin/gallery/add'); ?>" class="flex items-center space-x-3 p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
            <i class='bx bx-image text-green-600 text-xl'></i>
            <span class="text-sm font-medium text-green-900">Tambah Gallery</span>
        </a>
        <a href="<?php echo base_url('admin/promo/add'); ?>" class="flex items-center space-x-3 p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition-colors">
            <i class='bx bx-discount text-orange-600 text-xl'></i>
            <span class="text-sm font-medium text-orange-900">Buat Promo</span>
        </a>
        <a href="<?php echo base_url('admin/settings'); ?>" class="flex items-center space-x-3 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
            <i class='bx bx-cog text-gray-600 text-xl'></i>
            <span class="text-sm font-medium text-gray-900">Pengaturan</span>
        </a>
    </div>
</div>