        <!-- ========== Hero ========== -->
        <section class="relative h-screen bg-cover bg-center bg-no-repeat" 
                 style="background-image:url('<?php echo base_url('gambar/banner.jpg'); ?>')">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="relative z-10 h-full flex items-center">
                <div class="w-full px-4 sm:px-6 lg:px-8 text-center">
                    <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 animate-fade-in-up">
                        Meat Shop &<br class="md:hidden"/> 
                        <span class="text-primary">Grocery</span>
                    </h1>
                    <p class="text-xl md:text-2xl text-white mb-8 animate-fade-in-up animation-delay-200">
                        Daging segar, bumbu berkualitas, dan kebutuhan dapur lengkap untuk masakan terbaik Anda.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-up animation-delay-400">
                        <a href="#menu" class="bg-primary text-white px-8 py-4 rounded-lg font-semibold hover:bg-yellow-600 transition-colors shadow-lg">
                            Lihat Produk
                        </a>
                        <a href="#about" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-900 transition-colors">
                            Kenapa Kami?
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========== About ========== -->
        <section class="py-20 bg-white" id="about">
            <div class="w-full px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Image -->
                    <div class="order-2 lg:order-1">
                        <div class="relative">
                            <img src="<?php echo base_url('assets/img/gal-1.jpg'); ?>" 
                                 alt="Tentang Kami" 
                                 class="w-full h-96 object-cover rounded-lg shadow-xl">
                            <div class="absolute inset-0 bg-primary bg-opacity-20 rounded-lg"></div>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="order-1 lg:order-2">
                        <h2 class="text-4xl font-bold text-gray-900 mb-6">
                            Kenapa Memilih <span class="text-primary">Toko Kami?</span>
                        </h2>
                        <p class="text-lg text-gray-600 mb-8">
                            Kami menyediakan produk berkualitas, bumbu berkualitas, dan kebutuhan dapur lengkap dengan harga terbaik. Setiap produk dipilih dengan teliti agar kualitas tetap terjaga.
                        </p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class='bx bx-shopping-bag text-primary text-xl'></i>
                                <span class="text-gray-700">Jenis Produk Terlengkap</span>
                            </div>
                            <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class='bx bx-clipboard text-primary text-xl'></i>
                                <span class="text-gray-700">Spesifikasi Sesuai Permintaan</span>
                            </div>
                            <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class='bx bx-like text-primary text-xl'></i>
                                <span class="text-gray-700">Kualitas Produk & Layanan</span>
                            </div>
                            <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class='bx bx-wallet text-primary text-xl'></i>
                                <span class="text-gray-700">Harga Terjangkau</span>
                            </div>
                            <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class='bx bx-handshake text-primary text-xl'></i>
                                <span class="text-gray-700">Mitra Terbaik</span>
                            </div>
                            <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class='bx bx-bolt text-primary text-xl'></i>
                                <span class="text-gray-700">Fast Respons</span>
                            </div>
                            <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class='bx bx-truck text-primary text-xl'></i>
                                <span class="text-gray-700">Pengiriman Cepat</span>
                            </div>
                            <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class='bx bx-shield text-primary text-xl'></i>
                                <span class="text-gray-700">Garansi Produk</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========== Menu Produk Unggulan ========== -->
        <section class="py-20 bg-gray-50" id="menu">
            <div class="w-full px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h3 class="text-4xl font-bold text-gray-900 mb-4">
                        Produk <span class="text-primary">Terbaru</span>
                    </h3>
                    <p class="text-lg text-gray-600">Temukan produk terbaik dengan kualitas premium</p>
                </div>
                <!-- Grid produk Unggulan index -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <!-- Card Produk 1 -->
                    <div class="bg-card border border-border overflow-hidden hover:border-primary transition-colors duration-300 group">
                        <div class="relative">
                            <img src="<?php echo base_url('assets/img/gal-1.jpg'); ?>" 
                                 alt="Produk 1" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-3 left-3 bg-accent text-white px-2 py-1 text-xs font-semibold rounded-full">
                                BARU
                            </span>
                        </div>
                        <div class="p-6">
                            <p class="text-sm text-primary font-semibold mb-2">Meat</p>
                            <h4 class="text-lg font-bold text-gray-900 mb-4">De Cecco Spaghetti 500gr</h4>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-primary">Rp 44.000</span>
                                <div class="flex space-x-2">
                                    <button class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-700 transition-colors text-sm font-semibold uppercase tracking-wide">
                                        Pesan
                                    </button>
                                    <button class="bg-surface text-muted p-2 rounded hover:bg-primary hover:text-white transition-colors">
                                        <i class='bx bx-cart-add text-xl'></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Produk 2 -->
                    <div class="bg-card border border-border overflow-hidden hover:border-primary transition-colors duration-300 group">
                        <div class="relative">
                            <img src="<?php echo base_url('assets/img/gal-1.jpg'); ?>" 
                                 alt="Produk 2" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-3 left-3 bg-accent text-white px-2 py-1 text-xs font-semibold rounded-full">
                                BARU
                            </span>
                        </div>
                        <div class="p-6">
                            <p class="text-sm text-primary font-semibold mb-2">Meat</p>
                            <h4 class="text-lg font-bold text-gray-900 mb-4">De Cecco Spaghetti 500gr</h4>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-primary">Rp 44.000</span>
                                <div class="flex space-x-2">
                                    <button class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-700 transition-colors text-sm font-semibold uppercase tracking-wide">
                                        Pesan
                                    </button>
                                    <button class="bg-surface text-muted p-2 rounded hover:bg-primary hover:text-white transition-colors">
                                        <i class='bx bx-cart-add text-xl'></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Produk 3 -->
                    <div class="bg-card border border-border overflow-hidden hover:border-primary transition-colors duration-300 group">
                        <div class="relative">
                            <img src="<?php echo base_url('assets/img/gal-1.jpg'); ?>" 
                                 alt="Produk 3" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-3 left-3 bg-accent text-white px-2 py-1 text-xs font-semibold rounded-full">
                                BARU
                            </span>
                        </div>
                        <div class="p-6">
                            <p class="text-sm text-primary font-semibold mb-2">Meat</p>
                            <h4 class="text-lg font-bold text-gray-900 mb-4">De Cecco Spaghetti 500gr</h4>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-primary">Rp 44.000</span>
                                <div class="flex space-x-2">
                                    <button class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-700 transition-colors text-sm font-semibold uppercase tracking-wide">
                                        Pesan
                                    </button>
                                    <button class="bg-surface text-muted p-2 rounded hover:bg-primary hover:text-white transition-colors">
                                        <i class='bx bx-cart-add text-xl'></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Produk 4 -->
                    <div class="bg-card border border-border overflow-hidden hover:border-primary transition-colors duration-300 group">
                        <div class="relative">
                            <img src="<?php echo base_url('assets/img/gal-1.jpg'); ?>" 
                                 alt="Produk 4" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-3 left-3 bg-accent text-white px-2 py-1 text-xs font-semibold rounded-full">
                                BARU
                            </span>
                        </div>
                        <div class="p-6">
                            <p class="text-sm text-primary font-semibold mb-2">Meat</p>
                            <h4 class="text-lg font-bold text-gray-900 mb-4">De Cecco Spaghetti 500gr</h4>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-primary">Rp 44.000</span>
                                <div class="flex space-x-2">
                                    <button class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-700 transition-colors text-sm font-semibold uppercase tracking-wide">
                                        Pesan
                                    </button>
                                    <button class="bg-surface text-muted p-2 rounded hover:bg-primary hover:text-white transition-colors">
                                        <i class='bx bx-cart-add text-xl'></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Produk 5 -->
                    <div class="bg-card border border-border overflow-hidden hover:border-primary transition-colors duration-300 group">
                        <div class="relative">
                            <img src="<?php echo base_url('assets/img/gal-1.jpg'); ?>" 
                                 alt="Produk 5" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-3 left-3 bg-accent text-white px-2 py-1 text-xs font-semibold rounded-full">
                                BARU
                            </span>
                        </div>
                        <div class="p-6">
                            <p class="text-sm text-primary font-semibold mb-2">Meat</p>
                            <h4 class="text-lg font-bold text-gray-900 mb-4">De Cecco Spaghetti 500gr</h4>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-primary">Rp 44.000</span>
                                <div class="flex space-x-2">
                                    <button class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-700 transition-colors text-sm font-semibold uppercase tracking-wide">
                                        Pesan
                                    </button>
                                    <button class="bg-surface text-muted p-2 rounded hover:bg-primary hover:text-white transition-colors">
                                        <i class='bx bx-cart-add text-xl'></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Produk 6 -->
                    <div class="bg-card border border-border overflow-hidden hover:border-primary transition-colors duration-300 group">
                        <div class="relative">
                            <img src="<?php echo base_url('assets/img/gal-1.jpg'); ?>" 
                                 alt="Produk 6" 
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-3 left-3 bg-accent text-white px-2 py-1 text-xs font-semibold rounded-full">
                                BARU
                            </span>
                        </div>
                        <div class="p-6">
                            <p class="text-sm text-primary font-semibold mb-2">Meat</p>
                            <h4 class="text-lg font-bold text-gray-900 mb-4">De Cecco Spaghetti 500gr</h4>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-primary">Rp 44.000</span>
                                <div class="flex space-x-2">
                                    <button class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-700 transition-colors text-sm font-semibold uppercase tracking-wide">
                                        Pesan
                                    </button>
                                    <button class="bg-surface text-muted p-2 rounded hover:bg-primary hover:text-white transition-colors">
                                        <i class='bx bx-cart-add text-xl'></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========== Promo Harian ========== -->
        <section class="py-20 bg-white">
            <div class="w-full px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h3 class="text-4xl font-bold text-gray-900 mb-4">
                        Promo <span class="text-primary">Harian</span>
                    </h3>
                    <p class="text-lg text-gray-600">Dapatkan penawaran terbaik setiap hari</p>
                </div>
                <div class="relative">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Card Promo 1 -->
                        <article class="bg-primary rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
                            <div class="relative">
                                <img src="<?php echo base_url('gambar_produk/Minuman/OKF FARMER ALOE POMEGRANATE 500ML Rp16.100.jpg'); ?>" 
                                     alt="minuman" 
                                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <span class="absolute top-3 left-3 bg-accent text-white px-3 py-1 text-sm font-bold rounded-full">
                                    PROMO
                                </span>
                            </div>
                            <div class="p-6">
                                <h5 class="text-sm text-white font-semibold mb-2">Minuman</h5>
                                <h4 class="text-lg font-bold text-white mb-4">Bull-Dog Vegetable & fruit sauce 1 botol / 300 ml</h4>
                                <div class="flex items-center justify-between">
                                    <span class="text-2xl font-bold text-white">Rp 56.000</span>
                                    <div class="flex space-x-2">
                                        <button class="bg-white text-primary px-4 py-2 rounded hover:bg-primary hover:text-white transition-colors text-sm font-semibold uppercase tracking-wide">
                                            Pesan
                                        </button>
                                        <button class="bg-white bg-opacity-20 text-white p-2 rounded hover:bg-white hover:text-primary transition-colors">
                                            <i class='bx bx-cart-add text-xl'></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <!-- Card Promo 2 -->
                        <article class="bg-accent border border-border overflow-hidden hover:border-primary transition-colors duration-300 group">
                            <div class="relative">
                                <img src="<?php echo base_url('gambar_produk/Minuman/OKF FARMER ALOE POMEGRANATE 500ML Rp16.100.jpg'); ?>" 
                                     alt="minuman" 
                                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <span class="absolute top-3 left-3 bg-white text-accent px-3 py-1 text-sm font-bold rounded-full">
                                    PROMO
                                </span>
                            </div>
                            <div class="p-6">
                                <h5 class="text-sm text-white font-semibold mb-2">Minuman</h5>
                                <h4 class="text-lg font-bold text-white mb-4">Bull-Dog Vegetable & fruit sauce 1 botol / 300 ml</h4>
                                <div class="flex items-center justify-between">
                                    <span class="text-2xl font-bold text-white">Rp 56.000</span>
                                    <button class="bg-white text-accent px-4 py-2 rounded hover:bg-accent hover:text-white transition-colors text-sm font-semibold uppercase tracking-wide">
                                        Pesan
                                    </button>
                                </div>
                            </div>
                        </article>
                        <!-- Card Promo 3 -->
                        <article class="bg-secondary border border-border overflow-hidden hover:border-primary transition-colors duration-300 group">
                            <div class="relative">
                                <img src="<?php echo base_url('gambar_produk/Minuman/OKF FARMER ALOE POMEGRANATE 500ML Rp16.100.jpg'); ?>" 
                                     alt="minuman" 
                                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <span class="absolute top-3 left-3 bg-white text-secondary px-3 py-1 text-sm font-bold rounded-full">
                                    PROMO
                                </span>
                            </div>
                            <div class="p-6">
                                <h5 class="text-sm text-white font-semibold mb-2">Minuman</h5>
                                <h4 class="text-lg font-bold text-white mb-4">Bull-Dog Vegetable & fruit sauce 1 botol / 300 ml</h4>
                                <div class="flex items-center justify-between">
                                    <span class="text-2xl font-bold text-white">Rp 56.000</span>
                                    <button class="bg-white text-secondary px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors text-sm font-semibold">
                                        Pesan
                                    </button>
                                </div>
                            </div>
                        </article>
                        <!-- Card Promo 4 -->
                        <article class="bg-green-600 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
                            <div class="relative">
                                <img src="<?php echo base_url('gambar_produk/Minuman/OKF FARMER ALOE POMEGRANATE 500ML Rp16.100.jpg'); ?>" 
                                     alt="minuman" 
                                     class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <span class="absolute top-3 left-3 bg-white text-green-600 px-3 py-1 text-sm font-bold rounded-full">
                                    PROMO
                                </span>
                            </div>
                            <div class="p-6">
                                <h5 class="text-sm text-white font-semibold mb-2">Minuman</h5>
                                <h4 class="text-lg font-bold text-white mb-4">Bull-Dog Vegetable & fruit sauce 1 botol / 300 ml</h4>
                                <div class="flex items-center justify-between">
                                    <span class="text-2xl font-bold text-white">Rp 56.000</span>
                                    <button class="bg-white text-green-600 px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors text-sm font-semibold">
                                        Pesan
                                    </button>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
       