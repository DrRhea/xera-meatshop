<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-text">Tambah Pesanan</h1>
            <p class="text-muted mt-1">Buat pesanan baru untuk pelanggan</p>
        </div>
        <a href="<?php echo base_url('admin/orders'); ?>" 
           class="bg-surface text-text px-4 py-2 rounded-lg hover:bg-border transition-colors duration-200 flex items-center">
            <i class='bx bx-arrow-back mr-2'></i>
            Kembali
        </a>
    </div>

    <!-- Form -->
    <form class="space-y-6">
        <div class="bg-card border border-border rounded-lg p-6">
            <!-- Customer Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-text mb-4">Informasi Pelanggan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Nama Pelanggan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="Masukkan nama pelanggan">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            No. Telepon <span class="text-red-500">*</span>
                        </label>
                        <input type="tel" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="Masukkan nomor telepon">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-text mb-2">
                            Alamat Lengkap <span class="text-red-500">*</span>
                        </label>
                        <textarea rows="3" 
                                  class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none"
                                  placeholder="Masukkan alamat lengkap pelanggan"></textarea>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-text">Item Pesanan</h3>
                    <button type="button" 
                            class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition-colors duration-200 flex items-center">
                        <i class='bx bx-plus mr-2'></i>
                        Tambah Item
                    </button>
                </div>
                
                <!-- Empty State -->
                <div class="text-center py-8 border-2 border-dashed border-border rounded-lg">
                    <i class='bx bx-package text-4xl text-muted mb-4'></i>
                    <h4 class="text-lg font-medium text-text mb-2">Belum Ada Item</h4>
                    <p class="text-muted mb-4">Klik tombol "Tambah Item" untuk menambahkan produk ke pesanan</p>
                </div>
            </div>

            <!-- Order Details -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-text mb-4">Detail Pesanan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Status Pesanan
                        </label>
                        <select class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="pending">Menunggu</option>
                            <option value="processing">Diproses</option>
                            <option value="shipped">Dikirim</option>
                            <option value="delivered">Selesai</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Metode Pembayaran
                        </label>
                        <select class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="cash">Tunai</option>
                            <option value="transfer">Transfer Bank</option>
                            <option value="qris">QRIS</option>
                            <option value="cod">COD</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Ongkos Kirim
                        </label>
                        <input type="number" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="0"
                               value="0">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Diskon
                        </label>
                        <input type="number" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="0"
                               value="0">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-text mb-2">
                            Catatan Pesanan
                        </label>
                        <textarea rows="3" 
                                  class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none"
                                  placeholder="Catatan khusus untuk pesanan ini"></textarea>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="bg-surface rounded-lg p-6">
                <h3 class="text-lg font-semibold text-text mb-4">Ringkasan Pesanan</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-muted">Subtotal</span>
                        <span class="text-text">Rp 0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-muted">Ongkos Kirim</span>
                        <span class="text-text">Rp 0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-muted">Diskon</span>
                        <span class="text-text">- Rp 0</span>
                    </div>
                    <div class="border-t border-border pt-3">
                        <div class="flex justify-between text-lg font-semibold text-text">
                            <span>Total</span>
                            <span>Rp 0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-4">
            <a href="<?php echo base_url('admin/orders'); ?>" 
               class="bg-surface text-text px-6 py-3 rounded-lg hover:bg-border transition-colors duration-200">
                Batal
            </a>
            <button type="submit" 
                    class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-700 transition-colors duration-200">
                <i class='bx bx-save mr-2'></i>
                Simpan Pesanan
            </button>
        </div>
    </form>
</div>
