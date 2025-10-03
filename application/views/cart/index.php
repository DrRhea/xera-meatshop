
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
                    
                    <!-- Cart Items Display -->
                    <div id="cart-items" class="p-6">
                        <?php 
                        // Get cart data from controller (passed from controller)
                        $cart = isset($cart) ? $cart : [];
                        
                        // Debug: Show cart data in HTML comment for debugging (uncomment for debugging)
                        // echo "<!-- DEBUG: Cart data: " . print_r($cart, true) . " -->";
                        // echo "<!-- DEBUG: Cart count: " . count($cart) . " -->";
                        // echo "<!-- DEBUG: Cart type: " . gettype($cart) . " -->";
                        // echo "<!-- DEBUG: Cart empty check: " . (empty($cart) ? 'true' : 'false') . " -->";
                        
                        if (!empty($cart) && is_array($cart) && count($cart) > 0): 
                        ?>
                            <?php foreach ($cart as $index => $item): ?>
                            <div class="flex items-center space-x-4 py-4 border-b border-gray-200 last:border-b-0">
                                <!-- Product Image -->
                                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <i class='bx bx-package text-2xl text-gray-400'></i>
                                </div>
                                
                                <!-- Product Info -->
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-800"><?php echo htmlspecialchars($item['name']); ?></h4>
                                    <p class="text-sm text-gray-600"><?php echo htmlspecialchars($item['category']); ?></p>
                                    <p class="text-sm text-gray-500">Stok: <?php echo htmlspecialchars($item['stock']); ?> <?php echo htmlspecialchars($item['unit']); ?></p>
                                </div>
                                
                                <!-- Quantity -->
                                <div class="flex items-center space-x-2">
                                    <form method="post" action="<?php echo base_url('cart/update'); ?>" class="flex items-center space-x-2">
                                        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($item['name']); ?>">
                                        <button type="submit" name="quantity" value="<?php echo max(0, $item['quantity'] - 1); ?>" 
                                                class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center transition-colors">
                                            <i class='bx bx-minus text-sm'></i>
                                        </button>
                                        <span class="w-8 text-center font-medium"><?php echo $item['quantity']; ?></span>
                                        <button type="submit" name="quantity" value="<?php echo $item['quantity'] + 1; ?>" 
                                                class="w-8 h-8 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center transition-colors">
                                            <i class='bx bx-plus text-sm'></i>
                                        </button>
                                    </form>
                                </div>
                                
                                <!-- Price -->
                                <div class="text-right">
                                    <p class="font-semibold text-gray-800">Rp <?php echo number_format($item['price'], 0, ',', '.'); ?></p>
                                    <p class="text-sm text-gray-600">x<?php echo $item['quantity']; ?></p>
                                </div>
                                
                                <!-- Remove Button -->
                                <form method="post" action="<?php echo base_url('cart/remove'); ?>" class="ml-4">
                                    <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($item['name']); ?>">
                                    <button type="submit" class="w-8 h-8 bg-red-100 hover:bg-red-200 text-red-600 rounded-full flex items-center justify-center transition-colors">
                                        <i class='bx bx-trash text-sm'></i>
                                    </button>
                                </form>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <!-- Empty Cart State -->
                            <div class="p-12 text-center">
                                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class='bx bx-shopping-bag text-3xl text-gray-400'></i>
                                </div>
                                <h3 class="text-xl font-medium text-gray-800 mb-2">Keranjang Kosong</h3>
                                <p class="text-gray-600 mb-6">Belum ada produk di keranjang Anda</p>
                                <a href="<?php echo base_url('produk'); ?>" 
                                   class="inline-flex items-center bg-primary text-white px-6 py-3 rounded-lg hover:bg-yellow-600 transition-colors duration-200">
                                    <i class='bx bx-plus mr-2'></i>
                                    Mulai Belanja
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Empty Cart State (hidden by default) -->
                    <div id="empty-cart" class="p-12 text-center hidden">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class='bx bx-shopping-bag text-3xl text-gray-400'></i>
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
                        <?php 
                        // Get cart data for summary (use data from controller)
                        $cart_summary = isset($cart) ? $cart : [];
                        
                        $subtotal = 0;
                        $item_count = 0;
                        
                        // Debug summary calculation (uncomment for debugging)
                        // echo "<!-- DEBUG Summary: Cart data: " . print_r($cart_summary, true) . " -->";
                        
                        if (!empty($cart_summary) && is_array($cart_summary)) {
                            foreach ($cart_summary as $item) {
                                $subtotal += $item['price'] * $item['quantity'];
                                $item_count += $item['quantity'];
                            }
                        }
                        ?>
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal (<?php echo $item_count; ?> item)</span>
                            <span>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></span>
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
                                <span>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- WhatsApp Order Button -->
                    <?php 
                    // Use cart data from controller
                    $cart_whatsapp = isset($cart) ? $cart : [];
                    
                    // Debug WhatsApp section (uncomment for debugging)
                    // echo "<!-- DEBUG WhatsApp: Cart data: " . print_r($cart_whatsapp, true) . " -->";
                    
                    if (!empty($cart_whatsapp) && is_array($cart_whatsapp) && count($cart_whatsapp) > 0): 
                        $phoneNumber = '628112993400';
                        $message = "Halo! Saya ingin memesan produk berikut:\n\n";
                        
                        $total = 0;
                        foreach ($cart_whatsapp as $item) {
                            $itemTotal = $item['price'] * $item['quantity'];
                            $total += $itemTotal;
                            $message .= "📦 *{$item['name']}*\n";
                            $message .= "💰 Harga: Rp " . number_format($item['price'], 0, ',', '.') . "\n";
                            $message .= "📊 Jumlah: {$item['quantity']} {$item['unit']}\n";
                            $message .= "💵 Subtotal: Rp " . number_format($itemTotal, 0, ',', '.') . "\n\n";
                        }
                        
                        $message .= "💰 *Total: Rp " . number_format($total, 0, ',', '.') . "*\n\n";
                        $message .= "Mohon informasi lebih lanjut tentang cara pembayaran dan pengiriman.\n\n";
                        $message .= "Terima kasih!";
                        
                        $encodedMessage = urlencode($message);
                        $whatsappUrl = "https://wa.me/{$phoneNumber}?text={$encodedMessage}";
                    ?>
                    <a href="<?php echo $whatsappUrl; ?>" 
                       target="_blank"
                       class="w-full bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg transition-colors duration-200 mb-3 inline-flex items-center justify-center">
                        <i class='bx bxl-whatsapp mr-2'></i>
                        Pesan Sekarang via WhatsApp
                    </a>
                    <?php endif; ?>
                    
                    <!-- Clear Cart Button -->
                    <?php 
                    // Use cart data from controller
                    $cart_clear = isset($cart) ? $cart : [];
                    
                    // Debug clear button section (uncomment for debugging)
                    // echo "<!-- DEBUG Clear: Cart data: " . print_r($cart_clear, true) . " -->";
                    
                    if (!empty($cart_clear) && is_array($cart_clear) && count($cart_clear) > 0): ?>
                    <form method="post" action="<?php echo base_url('cart/clear'); ?>" class="mb-3">
                        <button type="submit" 
                                onclick="return confirm('Apakah Anda yakin ingin mengosongkan keranjang?')"
                                class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg transition-colors duration-200">
                            <i class='bx bx-trash mr-2'></i>
                            Kosongkan Keranjang
                        </button>
                    </form>
                    <?php endif; ?>
                    
                    <!-- Continue Shopping -->
                    <a href="<?php echo base_url('produk'); ?>" 
                       class="block w-full text-center text-gray-600 hover:text-gray-800 py-3 mt-3 transition-colors duration-200">
                        <i class='bx bx-arrow-left mr-2'></i>
                        Lanjutkan Belanja
                    </a>
                </div>
            </div>
        </div>

        <!-- Latest Products -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Terbaru</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
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
                                    <form method="post" action="<?php echo base_url('cart/add'); ?>" class="inline">
                                        <input type="hidden" name="product_name" value="De Cecco Spaghetti 500gr">
                                        <input type="hidden" name="product_price" value="44000">
                                        <input type="hidden" name="product_category" value="Meat">
                                        <input type="hidden" name="product_stock" value="50">
                                        <input type="hidden" name="product_unit" value="pcs">
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
    </div>


<script>
// Simple script for cart page - no localStorage conflicts
// All cart operations are handled by PHP forms
document.addEventListener('DOMContentLoaded', function() {
    console.log('Cart page loaded - PHP session based');
    // No JavaScript cart manipulation needed
    // All cart operations are handled by PHP forms
});
</script>