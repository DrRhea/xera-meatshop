        <!-- ========== Heading Produk ========== -->
        <section class="py-16 bg-surface">
            <div class="w-full px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold text-gray-900 mb-4 uppercase tracking-wide">Produk Bumbu</h2>
                <p class="text-lg text-muted">Bumbu Masakan Berkualitas <span class="text-primary font-semibold">Meat Shop & Grocery</span></p>
            </div>
        </section>

        <!-- ========== Konten Produk ========== -->
        <main class="py-16 bg-white">
            <div class="w-full px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <div class="bg-white rounded-2xl transition-all duration-300 group overflow-hidden flex flex-col h-full">
                                <div class="relative h-64 bg-gradient-to-br from-primary/20 to-primary/10 flex items-center justify-center">
                                    <?php if (!empty($product->image)): ?>
                                        <img src="<?php echo base_url($product->image); ?>" 
                                             alt="<?php echo htmlspecialchars($product->name); ?>" 
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    <?php else: ?>
                                        <img src="<?php echo base_url('gambar_produk/Bumbu/Bull-Dog Vegetable & fruit sauce 300 ml Rp 56.000.jpg'); ?>" 
                                             alt="<?php echo htmlspecialchars($product->name); ?>" 
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    <?php endif; ?>
                                    <span class="absolute top-4 left-4 bg-primary text-white px-3 py-1 text-xs font-semibold rounded-full">
                                        TERLARIS
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
                                        <?php else: ?>
                                            <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                                                Bumbu masakan berkualitas premium untuk memberikan cita rasa yang sempurna pada setiap hidangan Anda.
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mt-auto">
                                        <div class="mb-4">
                                            <span class="text-xs text-gray-500 uppercase tracking-wide">Harga</span>
                                            <div class="text-2xl font-bold text-primary">Rp <?php echo number_format($product->price, 0, ',', '.'); ?>/<?php echo $product->unit; ?></div>
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
                                <img src="<?php echo base_url('gambar_produk/Bumbu/Bull-Dog Vegetable & fruit sauce 300 ml Rp 56.000.jpg'); ?>" 
                                     alt="Bull-Dog Vegetable & fruit sauce" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <span class="absolute top-4 left-4 bg-primary text-white px-3 py-1 text-xs font-semibold rounded-full">
                                    TERLARIS
                                </span>
                            </div>
                            <div class="p-6 flex flex-col h-full">
                                <div class="flex-1">
                                    <h4 class="text-xl font-bold text-gray-900 mb-3">Bull-Dog Vegetable & fruit sauce 300ml</h4>
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        <span class="px-3 py-1 border border-gray-300 rounded-full text-xs font-medium text-gray-700">Bumbu</span>
                                        <span class="px-3 py-1 border border-gray-300 rounded-full text-xs font-medium text-gray-700">Premium</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                                        Bumbu masakan berkualitas premium untuk memberikan cita rasa yang sempurna pada setiap hidangan Anda.
                                    </p>
                                </div>
                                <div class="mt-auto">
                                    <div class="mb-4">
                                        <span class="text-xs text-gray-500 uppercase tracking-wide">Harga</span>
                                        <div class="text-2xl font-bold text-primary">Rp 56.000</div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button class="bg-primary text-white px-6 py-3 rounded-xl hover:bg-primary-700 transition-colors font-semibold flex-1" 
                                                onclick="sendToWhatsApp('Bull-Dog Vegetable & fruit sauce 300ml', '56.000', 'Bumbu', 'Tersedia', 'botol')">
                                            Pesan
                                        </button>
                                        <button class="bg-gray-100 text-gray-700 p-3 rounded-xl hover:bg-primary hover:text-white transition-colors add-cart" 
                                                data-product-name="Bull-Dog Vegetable & fruit sauce 300ml" 
                                                data-product-price="56.000" 
                                                data-product-category="Bumbu" 
                                                data-product-stock="Tersedia" 
                                                data-product-unit="botol">
                                            <i class='bx bx-cart-add text-xl'></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </main>