<?php $this->load->view('templates/header'); ?>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Keranjang Belanja</h1>
            <p class="text-gray-600">Kelola produk yang akan Anda beli</p>
        </div>

        <!-- Cart Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div class="bg-white border border-gray-200 rounded-lg">
                    <!-- Cart Header -->
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-800">Produk di Keranjang</h2>
                    </div>
                    
                    <!-- Empty Cart State -->
                    <div class="p-12 text-center">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class='bx bx-cart text-3xl text-gray-400'></i>
                        </div>
                        <h3 class="text-xl font-medium text-gray-800 mb-2">Keranjang Kosong</h3>
                        <p class="text-gray-600 mb-6">Belum ada produk di keranjang Anda</p>
                        <a href="<?php echo base_url('produk'); ?>" 
                           class="inline-flex items-center bg-primary text-white px-6 py-3 rounded-lg hover:bg-yellow-600 transition-colors duration-200">
                            <i class='bx bx-plus mr-2'></i>
                            Mulai Belanja
                        </a>
                    </div>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white border border-gray-200 rounded-lg p-6 sticky top-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Belanja</h3>
                    
                    <!-- Summary Details -->
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span>Rp 0</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Ongkos Kirim</span>
                            <span>Rp 0</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Diskon</span>
                            <span>- Rp 0</span>
                        </div>
                        <div class="border-t border-gray-200 pt-3">
                            <div class="flex justify-between text-lg font-semibold text-gray-800">
                                <span>Total</span>
                                <span>Rp 0</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Checkout Button -->
                    <button disabled 
                            class="w-full bg-gray-400 text-white py-3 px-4 rounded-lg cursor-not-allowed opacity-50">
                        <i class='bx bx-credit-card mr-2'></i>
                        Lanjut ke Pembayaran
                    </button>
                    
                    <!-- Continue Shopping -->
                    <a href="<?php echo base_url('produk'); ?>" 
                       class="block w-full text-center text-gray-600 hover:text-gray-800 py-3 mt-3 transition-colors duration-200">
                        <i class='bx bx-arrow-left mr-2'></i>
                        Lanjutkan Belanja
                    </a>
                </div>
            </div>
        </div>

        <!-- Recommended Products -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Rekomendasi</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product Card 1 -->
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <div class="aspect-square bg-gray-100 flex items-center justify-center">
                        <i class='bx bx-package text-4xl text-gray-400'></i>
                    </div>
                    <div class="p-4">
                        <h3 class="font-medium text-gray-800 mb-2">Daging Sapi Premium</h3>
                        <p class="text-primary font-semibold">Rp 85.000/kg</p>
                        <button class="w-full mt-3 bg-primary text-white py-2 px-4 rounded-lg hover:bg-yellow-600 transition-colors duration-200">
                            <i class='bx bx-plus mr-1'></i>
                            Tambah ke Keranjang
                        </button>
                    </div>
                </div>
                
                <!-- Product Card 2 -->
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <div class="aspect-square bg-gray-100 flex items-center justify-center">
                        <i class='bx bx-package text-4xl text-gray-400'></i>
                    </div>
                    <div class="p-4">
                        <h3 class="font-medium text-gray-800 mb-2">Daging Ayam Segar</h3>
                        <p class="text-primary font-semibold">Rp 35.000/kg</p>
                        <button class="w-full mt-3 bg-primary text-white py-2 px-4 rounded-lg hover:bg-yellow-600 transition-colors duration-200">
                            <i class='bx bx-plus mr-1'></i>
                            Tambah ke Keranjang
                        </button>
                    </div>
                </div>
                
                <!-- Product Card 3 -->
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <div class="aspect-square bg-gray-100 flex items-center justify-center">
                        <i class='bx bx-package text-4xl text-gray-400'></i>
                    </div>
                    <div class="p-4">
                        <h3 class="font-medium text-gray-800 mb-2">Ikan Segar</h3>
                        <p class="text-primary font-semibold">Rp 45.000/kg</p>
                        <button class="w-full mt-3 bg-primary text-white py-2 px-4 rounded-lg hover:bg-yellow-600 transition-colors duration-200">
                            <i class='bx bx-plus mr-1'></i>
                            Tambah ke Keranjang
                        </button>
                    </div>
                </div>
                
                <!-- Product Card 4 -->
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <div class="aspect-square bg-gray-100 flex items-center justify-center">
                        <i class='bx bx-package text-4xl text-gray-400'></i>
                    </div>
                    <div class="p-4">
                        <h3 class="font-medium text-gray-800 mb-2">Sayuran Segar</h3>
                        <p class="text-primary font-semibold">Rp 15.000/kg</p>
                        <button class="w-full mt-3 bg-primary text-white py-2 px-4 rounded-lg hover:bg-yellow-600 transition-colors duration-200">
                            <i class='bx bx-plus mr-1'></i>
                            Tambah ke Keranjang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('templates/footer'); ?>
