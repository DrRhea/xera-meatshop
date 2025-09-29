        <!-- ========== Heading Produk ========== -->
        <section class="py-16 bg-surface">
            <div class="w-full px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold text-gray-900 mb-4 uppercase tracking-wide">Produk Seafood</h2>
                <p class="text-lg text-muted">Seafood Segar Berkualitas <span class="text-primary font-semibold">Meat Shop & Grocery</span></p>
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
                                        <img src="<?php echo base_url('assets/img/prod-1.jpg'); ?>" 
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
                                                Seafood segar berkualitas premium, ditangkap dengan teknik terbaik untuk mempertahankan kesegaran dan kelezatan.
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
                                            <form method="post" action="<?php echo base_url('cart/add'); ?>" class="inline">
                                                <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product->name, ENT_QUOTES); ?>">
                                                <input type="hidden" name="product_price" value="<?php echo $product->price; ?>">
                                                <input type="hidden" name="product_category" value="<?php echo htmlspecialchars($product->category, ENT_QUOTES); ?>">
                                                <input type="hidden" name="product_stock" value="<?php echo $product->stock; ?>">
                                                <input type="hidden" name="product_unit" value="<?php echo $product->unit; ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="bg-gray-100 text-gray-700 p-3 rounded-xl hover:bg-primary hover:text-white transition-colors">
                                                    <i class='bx bx-cart-add text-xl'></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Fallback jika tidak ada produk -->
                        <div class="bg-white rounded-2xl transition-all duration-300 group overflow-hidden flex flex-col h-full">
                            <div class="relative h-64 bg-gradient-to-br from-primary/20 to-primary/10 flex items-center justify-center">
                                <img src="<?php echo base_url('assets/img/prod-1.jpg'); ?>" 
                                     alt="Ikan Segar" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <span class="absolute top-4 left-4 bg-primary text-white px-3 py-1 text-xs font-semibold rounded-full">
                                    TERLARIS
                                </span>
                            </div>
                            <div class="p-6 flex flex-col h-full">
                                <div class="flex-1">
                                    <h4 class="text-xl font-bold text-gray-900 mb-3">Ikan Segar Premium</h4>
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        <span class="px-3 py-1 border border-gray-300 rounded-full text-xs font-medium text-gray-700">Seafood</span>
                                        <span class="px-3 py-1 border border-gray-300 rounded-full text-xs font-medium text-gray-700">Premium</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-6 leading-relaxed">
                                        Seafood segar berkualitas premium, ditangkap dengan teknik terbaik untuk mempertahankan kesegaran dan kelezatan.
                                    </p>
                                </div>
                                <div class="mt-auto">
                                    <div class="mb-4">
                                        <span class="text-xs text-gray-500 uppercase tracking-wide">Harga</span>
                                        <div class="text-2xl font-bold text-primary">Rp 45.000/kg</div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button class="bg-primary text-white px-6 py-3 rounded-xl hover:bg-primary-700 transition-colors font-semibold flex-1" 
                                                onclick="sendToWhatsApp('Ikan Segar Premium', '45.000', 'Seafood', 'Tersedia', 'kg')">
                                            Pesan
                                        </button>
                                        <form method="post" action="<?php echo base_url('cart/add'); ?>" class="inline">
                            <input type="hidden" name="product_name" value="Ikan Segar Premium">
                            <input type="hidden" name="product_price" value="45000">
                            <input type="hidden" name="product_category" value="Seafood">
                            <input type="hidden" name="product_stock" value="Tersedia">
                            <input type="hidden" name="product_unit" value="kg">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="bg-gray-100 text-gray-700 p-3 rounded-xl hover:bg-primary hover:text-white transition-colors">
                                <i class='bx bx-cart-add text-xl'></i>
                            </button>
                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </main>