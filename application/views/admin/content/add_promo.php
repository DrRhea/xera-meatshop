<!-- Flash Messages -->
<?php if ($this->session->flashdata('error')): ?>
    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-center space-x-2">
        <i class='bx bx-error-circle text-xl'></i>
        <span><?php echo $this->session->flashdata('error'); ?></span>
    </div>
<?php endif; ?>

<!-- Page Header -->
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Tambah Promo Harian</h1>
        <p class="text-gray-600 mt-1">Buat promo harian baru untuk ditampilkan di halaman beranda</p>
    </div>
    <a href="<?php echo base_url('admin/promo'); ?>" 
       class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors duration-200 flex items-center">
        <i class='bx bx-arrow-back mr-2'></i>
        Kembali
    </a>
</div>

<!-- Add Promo Form -->
<div class="bg-white rounded-lg border border-gray-200 p-6">
    <form method="POST" action="<?php echo base_url('admin/promo/add'); ?>" class="space-y-6">
        
        <!-- Product Selection -->
        <div>
            <label for="product_id" class="block text-sm font-medium text-gray-700 mb-2">Pilih Produk *</label>
            <select name="product_id" id="product_id" required 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <option value="">-- Pilih Produk --</option>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <option value="<?php echo $product->id; ?>" data-price="<?php echo $product->price; ?>">
                            <?php echo htmlspecialchars($product->name . ' - Rp ' . number_format($product->price, 0, ',', '.')); ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>

        <!-- Promo Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Promo *</label>
            <input type="text" name="title" id="title" required 
                   placeholder="Contoh: Promo Spesial Daging Sapi"
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Promo</label>
            <textarea name="description" id="description" rows="3" 
                      placeholder="Deskripsikan promo ini..."
                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
        </div>

        <!-- Price Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Original Price -->
            <div>
                <label for="original_price" class="block text-sm font-medium text-gray-700 mb-2">Harga Asli *</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">Rp</span>
                    <input type="number" name="original_price" id="original_price" required step="0.01" min="0"
                           placeholder="0"
                           class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
            </div>

            <!-- Promo Price -->
            <div>
                <label for="promo_price" class="block text-sm font-medium text-gray-700 mb-2">Harga Promo *</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">Rp</span>
                    <input type="number" name="promo_price" id="promo_price" required step="0.01" min="0"
                           placeholder="0"
                           class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
                <p class="text-sm text-gray-500 mt-1">Diskon akan dihitung otomatis</p>
            </div>
        </div>

        <!-- Date Range -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Start Date -->
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai *</label>
                <input type="date" name="start_date" id="start_date" required 
                       value="<?php echo date('Y-m-d'); ?>"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>

            <!-- End Date -->
            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Berakhir *</label>
                <input type="date" name="end_date" id="end_date" required 
                       value="<?php echo date('Y-m-d', strtotime('+7 days')); ?>"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
        </div>

        <!-- Sort Order and Status -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Sort Order -->
            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Urutan Tampil</label>
                <input type="number" name="sort_order" id="sort_order" min="0" value="0"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <p class="text-sm text-gray-500 mt-1">Angka lebih kecil = tampil lebih awal</p>
            </div>

            <!-- Status -->
            <div>
                <label for="is_active" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="is_active" id="is_active" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="active">Aktif</option>
                    <option value="inactive">Tidak Aktif</option>
                </select>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
            <a href="<?php echo base_url('admin/promo'); ?>" 
               class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition-colors duration-200">
                Batal
            </a>
            <button type="submit" 
                    class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200 flex items-center">
                <i class='bx bx-save mr-2'></i>
                Simpan Promo
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const productSelect = document.getElementById('product_id');
    const originalPriceInput = document.getElementById('original_price');
    const promoPriceInput = document.getElementById('promo_price');

    // Auto-fill original price when product is selected
    productSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const price = selectedOption.getAttribute('data-price');
        
        if (price) {
            originalPriceInput.value = price;
            // Auto-calculate 10% discount as default
            const discountPrice = price * 0.9;
            promoPriceInput.value = Math.round(discountPrice);
        }
    });

    // Calculate discount percentage
    function calculateDiscount() {
        const originalPrice = parseFloat(originalPriceInput.value) || 0;
        const promoPrice = parseFloat(promoPriceInput.value) || 0;
        
        if (originalPrice > 0 && promoPrice > 0) {
            const discount = ((originalPrice - promoPrice) / originalPrice) * 100;
            const discountElement = document.getElementById('discount-display');
            if (discountElement) {
                discountElement.textContent = `Diskon: ${Math.round(discount)}%`;
            }
        }
    }

    originalPriceInput.addEventListener('input', calculateDiscount);
    promoPriceInput.addEventListener('input', calculateDiscount);
});
</script>
