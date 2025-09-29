
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
                        <!-- Cart items will be populated by JavaScript -->
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
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span id="cart-subtotal">Rp 0</span>
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
                                <span id="cart-total">Rp 0</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- WhatsApp Order Button -->
                    <button id="whatsapp-order-btn" 
                            onclick="sendCartItemsToWhatsApp()"
                            class="w-full bg-green-500 hover:bg-green-600 text-white py-3 px-4 rounded-lg transition-colors duration-200 mb-3"
                            style="cursor: pointer;">
                        <i class='bx bxl-whatsapp mr-2'></i>
                        Pesan Sekarang via WhatsApp
                    </button>
                    
                    <!-- Clear Cart Button -->
                    <button id="clear-cart-btn" 
                            onclick="clearCartWithConfirm()"
                            class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg transition-colors duration-200 mb-3">
                        <i class='bx bx-trash mr-2'></i>
                        Kosongkan Keranjang
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
    </div>


<script>
// Display cart items
function displayCartItems() {
    const cartItemsContainer = document.getElementById('cart-items');
    const emptyCartContainer = document.getElementById('empty-cart');
    const cartSubtotal = document.getElementById('cart-subtotal');
    const cartTotal = document.getElementById('cart-total');
    const whatsappBtn = document.getElementById('whatsapp-order-btn');
    const clearBtn = document.getElementById('clear-cart-btn');
    
    // Load cart from localStorage
    let cart = [];
    try {
        const savedCart = localStorage.getItem('meatshop_cart');
        if (savedCart) {
            cart = JSON.parse(savedCart);
        }
    } catch (e) {
        console.error('Error loading cart:', e);
        cart = [];
    }
    
    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '';
        emptyCartContainer.classList.remove('hidden');
        cartSubtotal.textContent = 'Rp 0';
        cartTotal.textContent = 'Rp 0';
        whatsappBtn.disabled = true;
        whatsappBtn.classList.add('opacity-50', 'cursor-not-allowed');
        clearBtn.disabled = true;
        clearBtn.classList.add('opacity-50', 'cursor-not-allowed');
        return;
    }
    
    emptyCartContainer.classList.add('hidden');
    whatsappBtn.disabled = false;
    whatsappBtn.classList.remove('opacity-50', 'cursor-not-allowed');
    clearBtn.disabled = false;
    clearBtn.classList.remove('opacity-50', 'cursor-not-allowed');
    
    let totalPrice = 0;
    let cartHTML = '';
    
    cart.forEach((item, index) => {
        const price = parseFloat(item.price.replace(/[^\d]/g, ''));
        const itemTotal = price * item.quantity;
        totalPrice += itemTotal;
        
        cartHTML += `
            <div class="flex items-center space-x-4 p-4 border border-gray-200 rounded-lg mb-4">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                        <i class='bx bx-package text-2xl text-gray-400'></i>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <h4 class="text-lg font-medium text-gray-900 truncate">${item.name}</h4>
                    <p class="text-sm text-gray-500">${item.category}</p>
                    <p class="text-sm text-gray-600">Rp ${price.toLocaleString('id-ID')} × ${item.quantity} ${item.unit}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-lg font-semibold text-gray-900">Rp ${itemTotal.toLocaleString('id-ID')}</span>
                    <button onclick="removeFromCart(${item.id}); displayCartItems();" 
                            class="text-red-500 hover:text-red-700 p-1">
                        <i class='bx bx-trash text-lg'></i>
                    </button>
                </div>
            </div>
        `;
    });
    
    cartItemsContainer.innerHTML = cartHTML;
    cartSubtotal.textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
    cartTotal.textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
}

// Initialize cart display when page loads
document.addEventListener('DOMContentLoaded', function() {
    console.log('=== CART PAGE LOADED ===');
    console.log('sendCartToWhatsApp available:', typeof window.sendCartToWhatsApp);
    console.log('Cart contents from localStorage:', localStorage.getItem('meatshop_cart'));
    
    displayCartItems();
    
    // Also reinitialize cart buttons
    if (typeof initializeCartButtons === 'function') {
        initializeCartButtons();
    }
    
    // Test WhatsApp button
    const whatsappBtn = document.getElementById('whatsapp-order-btn');
    if (whatsappBtn) {
        console.log('WhatsApp button found:', whatsappBtn);
        
        // Remove existing event listeners to prevent duplicates
        whatsappBtn.removeEventListener('click', handleWhatsAppClick);
        whatsappBtn.addEventListener('click', handleWhatsAppClick);
        
        // Also add onclick as backup
        whatsappBtn.setAttribute('onclick', 'sendCartItemsToWhatsApp()');
        
    } else {
        console.error('WhatsApp button not found!');
    }
    
    // Test Clear Cart button
    const clearBtn = document.getElementById('clear-cart-btn');
    if (clearBtn) {
        console.log('Clear cart button found:', clearBtn);
        console.log('clearCart function available:', typeof window.clearCart);
        console.log('window.clearCart:', window.clearCart);
        
        // Force clearCart to be available
        if (typeof window.clearCart !== 'function') {
            console.log('Creating clearCart function...');
            window.clearCart = function() {
                console.log('=== CLEAR CART CALLED ===');
                try {
                    localStorage.removeItem('meatshop_cart');
                    console.log('Cart cleared from localStorage');
                    return true;
                } catch (e) {
                    console.error('Error clearing cart:', e);
                    return false;
                }
            };
        }
        
        // Remove existing event listeners to prevent duplicates
        clearBtn.removeEventListener('click', handleClearCart);
        clearBtn.addEventListener('click', handleClearCart);
        
        // Also add onclick as backup
        clearBtn.setAttribute('onclick', 'clearCart(); displayCartItems();');
        
    } else {
        console.error('Clear cart button not found!');
    }
    
    // Handle WhatsApp button click
    function handleWhatsAppClick(e) {
        e.preventDefault();
        e.stopPropagation();
        
        console.log('WhatsApp button clicked via event listener');
        
        // Call the new function
        if (typeof window.sendCartItemsToWhatsApp === 'function') {
            window.sendCartItemsToWhatsApp();
        } else {
            console.error('sendCartItemsToWhatsApp function not available!');
            alert('Fungsi WhatsApp tidak tersedia. Silakan refresh halaman.');
        }
    }
    
    // Handle Clear Cart button click
    function handleClearCart(e) {
        e.preventDefault();
        e.stopPropagation();
        
        console.log('Clear cart button clicked via event listener');
        console.log('clearCart function available:', typeof window.clearCart);
        console.log('displayCartItems function available:', typeof displayCartItems);
        
        // Confirm before clearing
        if (confirm('Apakah Anda yakin ingin mengosongkan keranjang?')) {
            console.log('User confirmed to clear cart');
            
            // Call clearCart function
            if (typeof window.clearCart === 'function') {
                window.clearCart();
                console.log('Cart cleared successfully');
                
                // Update display
                if (typeof displayCartItems === 'function') {
                    displayCartItems();
                    console.log('Display updated after clearing cart');
                } else {
                    console.error('displayCartItems function not available!');
                }
                
        // Show success message
        if (typeof window.customAlert !== 'undefined' && window.customAlert.success) {
            window.customAlert.success('Keranjang berhasil dikosongkan!');
        } else {
            alert('Keranjang berhasil dikosongkan!');
        }
            } else {
                console.error('clearCart function not available!');
                if (typeof window.customAlert !== 'undefined' && window.customAlert.error) {
                    window.customAlert.error('Fungsi kosongkan keranjang tidak tersedia. Silakan refresh halaman.');
                } else {
                    alert('Fungsi kosongkan keranjang tidak tersedia. Silakan refresh halaman.');
                }
            }
        } else {
            console.log('User cancelled clear cart');
        }
    }
});

// Also initialize immediately if DOM is already loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
        displayCartItems();
        if (typeof initializeCartButtons === 'function') {
            initializeCartButtons();
        }
    });
} else {
    displayCartItems();
    if (typeof initializeCartButtons === 'function') {
        initializeCartButtons();
    }
}

// Function to send cart items to WhatsApp using the same function as homepage/product pages
function sendCartItemsToWhatsApp() {
    console.log('=== SEND CART ITEMS TO WHATSAPP ===');
    
    // Load cart data
    let cart = [];
    try {
        const savedCart = localStorage.getItem('meatshop_cart');
        if (savedCart) {
            cart = JSON.parse(savedCart);
        }
    } catch (e) {
        console.error('Error loading cart:', e);
    }
    
    console.log('Cart data:', cart);
    
    if (cart.length === 0) {
        if (typeof window.customAlert !== 'undefined' && window.customAlert.warning) {
            window.customAlert.warning('Keranjang kosong! Silakan tambahkan produk terlebih dahulu.');
        } else {
            alert('Keranjang kosong! Silakan tambahkan produk terlebih dahulu.');
        }
        return;
    }
    
    // Create dynamic product name, price, category, stock, unit from cart
    let productName = '';
    let productPrice = '';
    let productCategory = '';
    let productStock = '';
    let productUnit = '';
    
    if (cart.length === 1) {
        // Single item - use the same format as homepage/product pages
        const item = cart[0];
        productName = item.name;
        productPrice = item.price.replace(/[^\d]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        productCategory = item.category;
        productStock = item.stock;
        productUnit = item.unit;
    } else {
        // Multiple items - create summary with product list
        const productList = cart.map((item, index) => {
            const price = parseFloat(item.price.replace(/[^\d]/g, ''));
            return `${index + 1}. ${item.name} (${item.quantity} ${item.unit}) - Rp ${price.toLocaleString('id-ID')}`;
        }).join('\n');
        
        productName = `Pesanan ${cart.length} Produk:\n${productList}`;
        productPrice = cart.reduce((total, item) => {
            const price = parseFloat(item.price.replace(/[^\d]/g, ''));
            return total + (price * item.quantity);
        }, 0).toLocaleString('id-ID');
        productCategory = 'Berbagai Kategori';
        productStock = 'Tersedia';
        productUnit = 'pcs';
    }
    
    console.log('Dynamic product data:', {productName, productPrice, productCategory, productStock, productUnit});
    
    // Use the same sendToWhatsApp function as homepage/product pages
    if (typeof window.sendToWhatsApp === 'function') {
        window.sendToWhatsApp(productName, productPrice, productCategory, productStock, productUnit);
    } else {
        console.error('sendToWhatsApp function not available!');
        if (typeof window.customAlert !== 'undefined' && window.customAlert.error) {
            window.customAlert.error('Fungsi WhatsApp tidak tersedia. Silakan refresh halaman.');
        } else {
            alert('Fungsi WhatsApp tidak tersedia. Silakan refresh halaman.');
        }
    }
}

// Make function globally available
window.sendCartItemsToWhatsApp = sendCartItemsToWhatsApp;

// Clear cart with custom confirm dialog
function clearCartWithConfirm() {
    if (typeof window.customAlert !== 'undefined' && window.customAlert.confirm) {
        window.customAlert.confirm(
            'Apakah Anda yakin ingin mengosongkan keranjang?',
            'Konfirmasi',
            function() {
                // User confirmed
                localStorage.removeItem('meatshop_cart');
                displayCartItems();
                window.customAlert.success('Keranjang berhasil dikosongkan!');
            },
            function() {
                // User cancelled
                console.log('User cancelled clear cart');
            }
        );
    } else {
        // Fallback to browser confirm
        if (confirm('Apakah Anda yakin ingin mengosongkan keranjang?')) {
            localStorage.removeItem('meatshop_cart');
            displayCartItems();
            if (typeof window.customAlert !== 'undefined' && window.customAlert.success) {
                window.customAlert.success('Keranjang berhasil dikosongkan!');
            } else {
                alert('Keranjang berhasil dikosongkan!');
            }
        }
    }
}

// Make function globally available
window.clearCartWithConfirm = clearCartWithConfirm;

// Fallback clearCart function if not available from script.js
if (typeof window.clearCart !== 'function') {
    console.log('clearCart not available from script.js, creating fallback...');
    window.clearCart = function() {
        console.log('=== FALLBACK CLEAR CART ===');
        try {
            localStorage.removeItem('meatshop_cart');
            console.log('Cart cleared from localStorage');
            return true;
        } catch (e) {
            console.error('Error clearing cart:', e);
            return false;
        }
    };
    console.log('Fallback clearCart function created');
}
</script>
