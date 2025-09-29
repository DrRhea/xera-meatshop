        <!-- ========== Hero ========== -->
        <section class="relative h-screen bg-cover bg-center bg-no-repeat" 
                 style="background-image:url('<?php echo base_url('gambar/banner.jpg'); ?>')">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            <div class="relative z-10 h-full flex items-center">
                <div class="w-full px-4 sm:px-6 lg:px-8 text-center">
                    <div class="max-w-4xl mx-auto space-y-8">
                        <h1 class="text-5xl md:text-7xl font-bold text-white leading-tight">
                        <?php echo $content['hero']['title']; ?>
                    </h1>
                        <p class="text-xl md:text-2xl text-white/90 leading-relaxed">
                        <?php echo $content['hero']['subtitle']; ?>
                    </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
                            <a href="#menu" class="bg-primary text-white px-8 py-4 rounded-lg font-semibold hover:bg-primary-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <?php echo $content['hero']['button1_text']; ?>
                        </a>
                            <a href="#about" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-900 transition-all duration-300 transform hover:-translate-y-1">
                            <?php echo $content['hero']['button2_text']; ?>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========== About ========== -->
        <section class="py-24 bg-white" id="about">
            <div class="w-full px-4 sm:px-6 lg:px-8">
                <div class="max-w-7xl mx-auto">
                    <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <!-- Image -->
                    <div class="order-2 lg:order-1">
                            <div class="relative group">
                            <img src="<?php echo base_url('assets/img/gal-1.jpg'); ?>" 
                                 alt="Tentang Kami" 
                                     class="w-full h-96 object-cover rounded-2xl shadow-2xl group-hover:shadow-3xl transition-all duration-500">
                                <div class="absolute inset-0 bg-primary bg-opacity-20 rounded-2xl group-hover:bg-opacity-10 transition-all duration-500"></div>
                        </div>
                    </div>
                    <!-- Content -->
                        <div class="order-1 lg:order-2 space-y-8">
                            <div class="space-y-6">
                                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                            <?php echo $content['about']['title']; ?> <span class="text-primary">Kami?</span>
                        </h2>
                                <p class="text-lg text-gray-600 leading-relaxed">
                            <?php echo $content['about']['description']; ?>
                        </p>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="flex items-center space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-300 group">
                                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center group-hover:bg-primary/20 transition-all duration-300">
                                <i class='bx bx-shopping-bag text-primary text-xl'></i>
                                    </div>
                                    <span class="text-gray-700 font-medium">Jenis Produk Terlengkap</span>
                            </div>
                                <div class="flex items-center space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-300 group">
                                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center group-hover:bg-primary/20 transition-all duration-300">
                                <i class='bx bx-clipboard text-primary text-xl'></i>
                                    </div>
                                    <span class="text-gray-700 font-medium">Spesifikasi Sesuai Permintaan</span>
                            </div>
                                <div class="flex items-center space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-300 group">
                                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center group-hover:bg-primary/20 transition-all duration-300">
                                <i class='bx bx-like text-primary text-xl'></i>
                                    </div>
                                    <span class="text-gray-700 font-medium">Kualitas Produk & Layanan</span>
                            </div>
                                <div class="flex items-center space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-300 group">
                                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center group-hover:bg-primary/20 transition-all duration-300">
                                <i class='bx bx-wallet text-primary text-xl'></i>
                                    </div>
                                    <span class="text-gray-700 font-medium">Harga Terjangkau</span>
                                </div>
                                 <div class="flex items-center space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-300 group">
                                     <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center group-hover:bg-primary/20 transition-all duration-300">
                                         <i class='bx bx-group text-primary text-xl'></i>
                                     </div>
                                     <span class="text-gray-700 font-medium">Mitra Terbaik</span>
                                 </div>
                                 <div class="flex items-center space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-300 group">
                                     <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center group-hover:bg-primary/20 transition-all duration-300">
                                         <i class='bx bx-time text-primary text-xl'></i>
                            </div>
                                     <span class="text-gray-700 font-medium">Fast Respons</span>
                            </div>
                                 <div class="flex items-center space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-300 group">
                                     <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center group-hover:bg-primary/20 transition-all duration-300">
                                         <i class='bx bx-package text-primary text-xl'></i>
                            </div>
                                     <span class="text-gray-700 font-medium">Pengiriman Cepat</span>
                            </div>
                                <div class="flex items-center space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-all duration-300 group">
                                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center group-hover:bg-primary/20 transition-all duration-300">
                                <i class='bx bx-shield text-primary text-xl'></i>
                                    </div>
                                    <span class="text-gray-700 font-medium">Garansi Produk</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========== Menu Produk Unggulan ========== -->
        <section class="py-24 bg-gray-50" id="menu">
            <div class="w-full px-4 sm:px-6 lg:px-8">
                <div class="max-w-7xl mx-auto">
                     <!-- Section Header -->
                     <div class="text-center mb-20">
                         <h3 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                        Produk <span class="text-primary">Terbaru</span>
                    </h3>
                         <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                             Temukan produk terbaik dengan kualitas premium yang kami pilih khusus untuk Anda
                         </p>
                </div>
                <!-- Grid produk Unggulan index -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <?php if (!empty($latest_products)): ?>
                        <?php foreach ($latest_products as $product): ?>
                            <div class="bg-white rounded-2xl transition-all duration-300 group overflow-hidden flex flex-col h-full">
                                <div class="relative h-64 bg-gradient-to-br from-primary/20 to-primary/10 flex items-center justify-center">
                                    <?php if (!empty($product->image)): ?>
                                        <img src="<?php echo base_url($product->image); ?>" 
                                             alt="<?php echo htmlspecialchars($product->name); ?>" 
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    <?php else: ?>
                                        <img src="<?php echo base_url('assets/img/gal-1.jpg'); ?>" 
                                             alt="<?php echo htmlspecialchars($product->name); ?>" 
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    <?php endif; ?>
                                    <span class="absolute top-4 left-4 bg-accent text-white px-3 py-1 text-xs font-semibold rounded-full">
                                        BARU
                                    </span>
                                </div>
                                <div class="p-6 flex flex-col h-full">
                                    <div class="flex-1">
                                        <h4 class="text-xl font-bold text-gray-900 mb-3"><?php echo htmlspecialchars($product->name); ?></h4>
                                        <div class="flex flex-wrap gap-2 mb-4">
                                            <span class="px-3 py-1 border border-gray-300 rounded-full text-xs font-medium text-gray-700">
                                                <?php echo htmlspecialchars($product->category); ?>
                                            </span>
                                            <span class="px-3 py-1 border border-gray-300 rounded-full text-xs font-medium text-gray-700">
                                                Stock: <?php echo $product->stock . ' ' . $product->unit; ?>
                                            </span>
                                        </div>
                                        <?php if (!empty($product->description)): ?>
                                            <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                                                <?php echo htmlspecialchars(substr($product->description, 0, 100)); ?>
                                                <?php if (strlen($product->description) > 100): ?>...<?php endif; ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mt-auto">
                                        <div class="mb-4">
                                            <span class="text-xs text-gray-500 uppercase tracking-wide">HARGA</span>
                                            <div class="text-2xl font-bold text-primary">Rp <?php echo number_format($product->price, 0, ',', '.'); ?></div>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <button class="bg-primary text-white px-6 py-3 rounded-xl hover:bg-primary-700 transition-colors font-semibold flex-1" 
                                                    onclick="sendToWhatsApp('<?php echo htmlspecialchars($product->name, ENT_QUOTES); ?>', '<?php echo number_format($product->price, 0, ',', '.'); ?>', '<?php echo htmlspecialchars($product->category, ENT_QUOTES); ?>', '<?php echo $product->stock; ?>', '<?php echo $product->unit; ?>')">
                                                Pesan
                                            </button>
                                            <button class="bg-gray-100 text-gray-700 p-3 rounded-xl hover:bg-primary hover:text-white transition-colors add-cart" 
                                                    onclick="addToCartDirect('<?php echo htmlspecialchars($product->name, ENT_QUOTES); ?>', '<?php echo number_format($product->price, 0, ',', '.'); ?>', '<?php echo htmlspecialchars($product->category, ENT_QUOTES); ?>', '<?php echo $product->stock; ?>', '<?php echo $product->unit; ?>')"
                                                    data-product-name="<?php echo htmlspecialchars($product->name, ENT_QUOTES); ?>" 
                                                    data-product-price="<?php echo number_format($product->price, 0, ',', '.'); ?>" 
                                                    data-product-category="<?php echo htmlspecialchars($product->category, ENT_QUOTES); ?>" 
                                                    data-product-stock="<?php echo $product->stock; ?>" 
                                                    data-product-unit="<?php echo $product->unit; ?>">
                                                <i class='bx bx-cart-add text-xl'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Fallback jika tidak ada produk -->
                        <div class="bg-white rounded-2xl transition-all duration-300 group overflow-hidden flex flex-col h-full">
                            <div class="relative h-64 bg-gradient-to-br from-primary/20 to-primary/10 flex items-center justify-center">
                                <img src="<?php echo base_url('assets/img/gal-1.jpg'); ?>" 
                                     alt="Produk Default" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <span class="absolute top-4 left-4 bg-accent text-white px-3 py-1 text-xs font-semibold rounded-full">
                                    BARU
                                </span>
                            </div>
                            <div class="p-6 flex flex-col h-full">
                                <div class="flex-1">
                                    <h4 class="text-xl font-bold text-gray-900 mb-3">De Cecco Spaghetti 500gr</h4>
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        <span class="px-3 py-1 border border-gray-300 rounded-full text-xs font-medium text-gray-700">Meat</span>
                                        <span class="px-3 py-1 border border-gray-300 rounded-full text-xs font-medium text-gray-700">Premium</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                                        Pasta berkualitas premium dengan tekstur yang sempurna untuk hidangan lezat keluarga Anda.
                                    </p>
                                </div>
                                <div class="mt-auto">
                                    <div class="mb-4">
                                        <span class="text-xs text-gray-500 uppercase tracking-wide">HARGA</span>
                                        <div class="text-2xl font-bold text-primary">Rp 44.000</div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button class="bg-primary text-white px-6 py-3 rounded-xl hover:bg-primary-700 transition-colors font-semibold flex-1" 
                                                onclick="sendToWhatsApp('De Cecco Spaghetti 500gr', '44.000', 'Meat', '50', 'pcs')">
                                            Pesan
                                        </button>
                                        <button class="bg-gray-100 text-gray-700 p-3 rounded-xl hover:bg-primary hover:text-white transition-colors add-cart" 
                                                onclick="addToCartDirect('De Cecco Spaghetti 500gr', '44.000', 'Meat', '50', 'pcs')"
                                                data-product-name="De Cecco Spaghetti 500gr" 
                                                data-product-price="44.000" 
                                                data-product-category="Meat" 
                                                data-product-stock="50" 
                                                data-product-unit="pcs">
                                            <i class='bx bx-cart-add text-xl'></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- ========== Promo Harian ========== -->
        <section class="py-24 bg-white">
            <div class="w-full px-4 sm:px-6 lg:px-8">
                <div class="max-w-7xl mx-auto">
                     <!-- Section Header -->
                     <div class="text-center mb-20">
                         <h3 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                        Promo <span class="text-primary">Harian</span>
                    </h3>
                         <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                             Dapatkan penawaran terbaik setiap hari dengan harga spesial untuk produk pilihan
                         </p>
                </div>
                <div class="relative">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php if (!empty($daily_promos)): ?>
                            <?php foreach ($daily_promos as $promo): ?>
                                <article class="bg-primary rounded-xl overflow-hidden hover:border-primary transition-colors duration-300 group">
                                    <div class="relative">
                                        <?php if (!empty($promo->product_image)): ?>
                                            <img src="<?php echo base_url($promo->product_image); ?>" 
                                                 alt="<?php echo htmlspecialchars($promo->product_name); ?>" 
                                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                        <?php else: ?>
                                            <img src="<?php echo base_url('gambar_produk/Minuman/OKF FARMER ALOE POMEGRANATE 500ML Rp16.100.jpg'); ?>" 
                                                 alt="<?php echo htmlspecialchars($promo->product_name); ?>" 
                                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                        <?php endif; ?>
                                        <span class="absolute top-3 left-3 bg-accent text-white px-3 py-1 text-sm font-bold rounded-full">
                                            <?php echo $promo->discount_percentage; ?>% OFF
                                        </span>
                                    </div>
                                    <div class="p-6">
                                        <h5 class="text-sm text-white font-semibold mb-2 uppercase tracking-wide"><?php echo htmlspecialchars($promo->product_category); ?></h5>
                                        <h4 class="text-lg font-bold text-white mb-4"><?php echo htmlspecialchars($promo->title); ?></h4>
                                        <?php if (!empty($promo->description)): ?>
                                            <p class="text-sm text-white/80 mb-4"><?php echo htmlspecialchars(substr($promo->description, 0, 80)); ?>...</p>
                                        <?php endif; ?>
                                        <div class="space-y-4">
                                            <div>
                                                <span class="text-xs text-white/70 uppercase tracking-wide">Harga Promo</span>
                                                <div class="flex items-center space-x-2">
                                                    <div class="text-lg text-white/60 line-through">Rp <?php echo number_format($promo->original_price, 0, ',', '.'); ?></div>
                                                    <div class="text-2xl font-bold text-white">Rp <?php echo number_format($promo->promo_price, 0, ',', '.'); ?></div>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <button class="bg-white text-primary px-6 py-3 rounded-xl hover:bg-primary hover:text-white transition-colors font-semibold flex-1" 
                                                        onclick="sendToWhatsApp('<?php echo htmlspecialchars($promo->title, ENT_QUOTES); ?>', '<?php echo number_format($promo->promo_price, 0, ',', '.'); ?>', '<?php echo htmlspecialchars($promo->product_category, ENT_QUOTES); ?>', 'Tersedia', 'pcs')">
                                                    Pesan Sekarang
                                                </button>
                                                <button class="bg-white/20 text-white p-3 rounded-xl hover:bg-white hover:text-primary transition-colors add-cart"
                                                        onclick="addToCartDirect('<?php echo htmlspecialchars($promo->title, ENT_QUOTES); ?>', '<?php echo number_format($promo->promo_price, 0, ',', '.'); ?>', '<?php echo htmlspecialchars($promo->product_category, ENT_QUOTES); ?>', 'Tersedia', 'pcs')"
                                                        data-product-name="<?php echo htmlspecialchars($promo->title, ENT_QUOTES); ?>" 
                                                        data-product-price="<?php echo number_format($promo->promo_price, 0, ',', '.'); ?>" 
                                                        data-product-category="<?php echo htmlspecialchars($promo->product_category, ENT_QUOTES); ?>" 
                                                        data-product-stock="Tersedia" 
                                                        data-product-unit="pcs">
                                                    <i class='bx bx-cart-add text-xl'></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- Fallback jika tidak ada promo -->
                            <article class="bg-primary rounded-xl overflow-hidden hover:border-primary transition-colors duration-300 group">
                                <div class="relative">
                                    <img src="<?php echo base_url('gambar_produk/Minuman/OKF FARMER ALOE POMEGRANATE 500ML Rp16.100.jpg'); ?>" 
                                         alt="minuman" 
                                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                    <span class="absolute top-3 left-3 bg-accent text-white px-3 py-1 text-sm font-bold rounded-full">
                                        PROMO
                                    </span>
                                </div>
                                <div class="p-6">
                                     <h5 class="text-sm text-white font-semibold mb-2 uppercase tracking-wide">Minuman</h5>
                                    <h4 class="text-lg font-bold text-white mb-4">Bull-Dog Vegetable & fruit sauce 1 botol / 300 ml</h4>
                                     <div class="space-y-4">
                                         <div>
                                             <span class="text-xs text-white/70 uppercase tracking-wide">Harga</span>
                                             <div class="text-2xl font-bold text-white">Rp 56.000</div>
                                         </div>
                                         <div class="flex items-center space-x-2">
                                             <button class="bg-white text-primary px-6 py-3 rounded-xl hover:bg-primary hover:text-white transition-colors font-semibold flex-1" 
                                                     onclick="sendToWhatsApp('Bull-Dog Vegetable & fruit sauce 1 botol / 300 ml', '56.000', 'Minuman', 'Tersedia', 'botol')">
                                                Pesan
                                            </button>
                                             <button class="bg-white/20 text-white p-3 rounded-xl hover:bg-white hover:text-primary transition-colors add-cart"
                                                     onclick="addToCartDirect('Bull-Dog Vegetable & fruit sauce 1 botol / 300 ml', '56.000', 'Minuman', 'Tersedia', 'botol')"
                                                     data-product-name="Bull-Dog Vegetable & fruit sauce 1 botol / 300 ml" 
                                                     data-product-price="56.000" 
                                                     data-product-category="Minuman" 
                                                     data-product-stock="Tersedia" 
                                                     data-product-unit="botol">
                                                <i class='bx bx-cart-add text-xl'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Spacer between promo and footer -->
        <div class="py-8 bg-white"></div>