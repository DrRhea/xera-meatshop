/* ===================== JS ===================== */

// Define sendToWhatsApp function early to ensure it's available
function sendToWhatsApp(productName, productPrice, productCategory, productStock, productUnit) {
  console.log('=== WHATSAPP FUNCTION CALLED ===');
  console.log('Parameters:', {productName, productPrice, productCategory, productStock, productUnit});
  
  // Validate parameters
  if (!productName) {
    console.error('Product name is missing!');
    if (typeof window.customAlert !== 'undefined' && window.customAlert.error) {
      window.customAlert.error('Error: Nama produk tidak ditemukan');
    } else {
      alert('Error: Nama produk tidak ditemukan');
    }
    return;
  }
  
  const phoneNumber = '6285724964731'; // +62 85724964731
  const message = `Halo! Saya tertarik dengan produk berikut:

📦 *${productName}*
💰 Harga: Rp ${productPrice}
📂 Kategori: ${productCategory}
📊 Stok: ${productStock} ${productUnit}

Saya ingin memesan produk ini. Mohon informasi lebih lanjut tentang cara pemesanan dan pengiriman.

Terima kasih!`;

  const encodedMessage = encodeURIComponent(message);
  const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
  
  console.log('WhatsApp URL:', whatsappUrl);
  console.log('Opening WhatsApp...');
  
  try {
    window.open(whatsappUrl, '_blank');
    console.log('WhatsApp opened successfully');
  } catch (error) {
    console.error('Error opening WhatsApp:', error);
    if (typeof window.customAlert !== 'undefined' && window.customAlert.error) {
      window.customAlert.error('Gagal membuka WhatsApp. Silakan coba lagi.');
    } else {
      alert('Gagal membuka WhatsApp. Silakan coba lagi.');
    }
  }
}

// Make sendToWhatsApp available globally immediately
window.sendToWhatsApp = sendToWhatsApp;
console.log('sendToWhatsApp function defined and made global');

// Direct add to cart function for onclick handlers
function addToCartDirect(productName, productPrice, productCategory, productStock, productUnit) {
  console.log('=== ADD TO CART DIRECT ===');
  console.log('Parameters:', {productName, productPrice, productCategory, productStock, productUnit});
  
  // Validate parameters
  if (!productName) {
    console.error('Product name is missing!');
    if (typeof window.customAlert !== 'undefined' && window.customAlert.error) {
      window.customAlert.error('Error: Nama produk tidak ditemukan');
    } else {
      alert('Error: Nama produk tidak ditemukan');
    }
    return;
  }
  
  if (!productPrice) {
    console.error('Product price is missing!');
    if (typeof window.customAlert !== 'undefined' && window.customAlert.error) {
      window.customAlert.error('Error: Harga produk tidak ditemukan');
    } else {
      alert('Error: Harga produk tidak ditemukan');
    }
    return;
  }
  
  // Create product data object
  const productData = {
    id: Date.now(),
    name: productName,
    price: productPrice,
    category: productCategory || 'Umum',
    stock: productStock || 'Tersedia',
    unit: productUnit || 'pcs'
  };
  
  console.log('Product data for direct add:', productData);
  
  // Call the global addToCart function
  if (typeof window.addToCartGlobal === 'function') {
    window.addToCartGlobal(productData);
  } else {
    console.error('addToCartGlobal function not available!');
    if (typeof window.customAlert !== 'undefined' && window.customAlert.error) {
      window.customAlert.error('Fungsi keranjang tidak tersedia. Silakan refresh halaman.');
    } else {
      alert('Fungsi keranjang tidak tersedia. Silakan refresh halaman.');
    }
  }
}

// Make addToCartDirect available globally immediately
window.addToCartDirect = addToCartDirect;
console.log('addToCartDirect function defined and made global');

// Global cart system
let globalCart = [];

// Load cart from localStorage
function loadGlobalCart() {
  try {
    const savedCart = localStorage.getItem('meatshop_cart');
    if (savedCart) {
      globalCart = JSON.parse(savedCart);
      console.log('Global cart loaded:', globalCart);
    }
  } catch (e) {
    console.error('Error loading global cart:', e);
    globalCart = [];
  }
}

// Save cart to localStorage
function saveGlobalCart() {
  try {
    localStorage.setItem('meatshop_cart', JSON.stringify(globalCart));
    console.log('Global cart saved:', globalCart);
    updateGlobalCartBadge();
  } catch (e) {
    console.error('Error saving global cart:', e);
  }
}

// Update cart badge
function updateGlobalCartBadge() {
  const cartBadge = document.querySelector('.cart-count');
  if (cartBadge) {
    cartBadge.textContent = String(globalCart.length);
    if (globalCart.length > 0) {
      cartBadge.classList.add('pulse');
      setTimeout(() => cartBadge.classList.remove('pulse'), 400);
    }
  }
  
  // Also update Alpine.js cart count
  const alpineCart = document.querySelector('[x-data*="cartCount"]');
  if (alpineCart && alpineCart.__x) {
    alpineCart.__x.$data.cartCount = globalCart.length;
  }
}

// Global add to cart function
function addToCartGlobal(productData) {
  console.log('=== GLOBAL ADD TO CART FUNCTION CALLED ===');
  console.log('Product data received:', productData);
  console.log('Current global cart before adding:', globalCart);
  
  // Check if product already exists by name
  const existingItem = globalCart.find(item => item.name === productData.name);
  
  if (existingItem) {
    existingItem.quantity += 1;
    console.log('Updated existing item quantity:', existingItem.quantity);
    
    // Show updated notification
    if (typeof window.customAlert !== 'undefined' && window.customAlert.success) {
      window.customAlert.success(
        `${productData.name} ditambahkan ke keranjang (${existingItem.quantity}x)`,
        'Produk Diperbarui'
      );
    } else {
      alert(`${productData.name} ditambahkan ke keranjang (${existingItem.quantity}x)`);
    }
  } else {
    const newItem = {
      id: productData.id || Date.now(),
      name: productData.name,
      price: productData.price,
      category: productData.category,
      stock: productData.stock,
      unit: productData.unit,
      quantity: 1
    };
    globalCart.push(newItem);
    console.log('Added new item to global cart:', newItem);
    
    // Show success notification
    if (typeof window.customAlert !== 'undefined' && window.customAlert.success) {
      window.customAlert.success(
        `${productData.name} berhasil ditambahkan ke keranjang!`,
        'Produk Ditambahkan'
      );
    } else {
      alert(`${productData.name} berhasil ditambahkan ke keranjang!`);
    }
  }
  
  console.log('Global cart after adding:', globalCart);
  saveGlobalCart();
  showGlobalCartNotification();
}

// Show cart notification
function showGlobalCartNotification() {
  // Create notification element
  const notification = document.createElement('div');
  notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
  notification.innerHTML = '✅ Produk ditambahkan ke keranjang!';
  
  document.body.appendChild(notification);
  
  setTimeout(() => {
    notification.remove();
  }, 3000);
}

// Make functions globally available
window.addToCartGlobal = addToCartGlobal;
window.loadGlobalCart = loadGlobalCart;
window.saveGlobalCart = saveGlobalCart;
window.updateGlobalCartBadge = updateGlobalCartBadge;

// Initialize global cart
loadGlobalCart();

// Define sendCartToWhatsApp function early as well
function sendCartToWhatsApp() {
  console.log('=== SEND CART TO WHATSAPP CALLED ===');
  console.log('Cart length:', globalCart.length);
  console.log('Cart contents:', globalCart);
  
  if (globalCart.length === 0) {
    console.log('Cart is empty, showing alert');
    if (typeof window.customAlert !== 'undefined' && window.customAlert.warning) {
      window.customAlert.warning('Keranjang kosong! Silakan tambahkan produk terlebih dahulu.');
    } else {
      alert('Keranjang kosong! Silakan tambahkan produk terlebih dahulu.');
    }
    return;
  }
  
  const phoneNumber = '6285724964731'; // +62 85724964731
  
  let message = `Halo! Saya ingin memesan produk berikut:\n\n`;
  
  let totalPrice = 0;
  
  globalCart.forEach((item, index) => {
    const price = parseFloat(item.price.replace(/[^\d]/g, ''));
    const itemTotal = price * item.quantity;
    totalPrice += itemTotal;
    
    message += `${index + 1}. 📦 *${item.name}*\n`;
    message += `   💰 Harga: Rp ${item.price.replace(/[^\d]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.')}\n`;
    message += `   📂 Kategori: ${item.category}\n`;
    message += `   📊 Jumlah: ${item.quantity} ${item.unit}\n`;
    message += `   💵 Subtotal: Rp ${itemTotal.toLocaleString('id-ID')}\n\n`;
  });
  
  message += `💰 *TOTAL PEMBELIAN: Rp ${totalPrice.toLocaleString('id-ID')}*\n\n`;
  message += `Mohon informasi lebih lanjut tentang cara pembayaran dan pengiriman.\n\nTerima kasih!`;
  
  console.log('Generated message:', message);
  
  const encodedMessage = encodeURIComponent(message);
  const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
  
  console.log('WhatsApp URL:', whatsappUrl);
  console.log('Opening WhatsApp...');
  
  try {
    window.open(whatsappUrl, '_blank');
    console.log('WhatsApp opened successfully');
  } catch (error) {
    console.error('Error opening WhatsApp:', error);
    if (typeof window.customAlert !== 'undefined' && window.customAlert.error) {
      window.customAlert.error('Gagal membuka WhatsApp. Silakan coba lagi.');
    } else {
      alert('Gagal membuka WhatsApp. Silakan coba lagi.');
    }
  }
}

// Make sendCartToWhatsApp available globally immediately
window.sendCartToWhatsApp = sendCartToWhatsApp;
console.log('sendCartToWhatsApp function defined and made global');

// Add global click handler for all buttons as backup
document.addEventListener('click', function(e) {
  // Check if clicked element is a Pesan button
  if (e.target && e.target.textContent && e.target.textContent.trim() === 'Pesan') {
    console.log('Pesan button clicked via global handler');
    
    // Get product data from the button's parent card
    const card = e.target.closest('.bg-white, .card, [class*="product"]');
    if (card) {
      const productName = card.querySelector('h3, h4, .product-name')?.textContent?.trim() || 'Produk';
      const productPrice = card.querySelector('.text-primary, .price, [class*="price"]')?.textContent?.trim() || '0';
      const productCategory = card.querySelector('[class*="category"], .category')?.textContent?.trim() || 'Umum';
      const productStock = 'Tersedia';
      const productUnit = 'pcs';
      
      console.log('Product data from card:', {productName, productPrice, productCategory, productStock, productUnit});
      
      // Call sendToWhatsApp function
      sendToWhatsApp(productName, productPrice, productCategory, productStock, productUnit);
    }
  }
  
  // Check if clicked element is a cart button (add-cart class or cart icon)
  if (e.target && (e.target.classList.contains('add-cart') || e.target.closest('.add-cart'))) {
    console.log('Cart button clicked via global handler');
    e.preventDefault();
    e.stopPropagation();
    
    const btn = e.target.classList.contains('add-cart') ? e.target : e.target.closest('.add-cart');
    console.log('Cart button element:', btn);
    console.log('Cart button dataset:', btn.dataset);
    
    // Get product data from data attributes
    const productData = {
      id: Date.now(),
      name: btn.dataset.productName || 'Produk',
      price: btn.dataset.productPrice || '0',
      category: btn.dataset.productCategory || 'Umum',
      stock: btn.dataset.productStock || 'Tersedia',
      unit: btn.dataset.productUnit || 'pcs'
    };
    
    console.log('Product data from global handler:', productData);
    
    // Validate and add to cart
    if (productData.name && productData.name !== 'Produk' && productData.price && productData.price !== '0') {
      console.log('Adding to cart via global handler');
      if (typeof window.addToCartGlobal === 'function') {
        window.addToCartGlobal(productData);
      } else {
        console.error('addToCartGlobal function not available in global handler');
        if (typeof window.customAlert !== 'undefined' && window.customAlert.error) {
          window.customAlert.error('Fungsi keranjang tidak tersedia. Silakan refresh halaman.');
        } else {
          alert('Fungsi keranjang tidak tersedia. Silakan refresh halaman.');
        }
      }
    } else {
      console.error('Invalid product data in global handler');
      if (typeof window.customAlert !== 'undefined' && window.customAlert.error) {
        window.customAlert.error('Error: Data produk tidak valid');
      } else {
        alert('Error: Data produk tidak valid');
      }
    }
  }
  
  // Check if clicked element is WhatsApp cart button
  if (e.target && e.target.id === 'whatsapp-order-btn') {
    console.log('WhatsApp cart button clicked via global handler');
    
    // Call the new function
    if (typeof window.sendCartItemsToWhatsApp === 'function') {
      window.sendCartItemsToWhatsApp();
    } else {
      console.error('sendCartItemsToWhatsApp function not available!');
      if (typeof window.customAlert !== 'undefined' && window.customAlert.error) {
      window.customAlert.error('Fungsi WhatsApp tidak tersedia. Silakan refresh halaman.');
    } else {
      alert('Fungsi WhatsApp tidak tersedia. Silakan refresh halaman.');
    }
    }
  }
  
  // Check if clicked element is Clear Cart button
  if (e.target && e.target.id === 'clear-cart-btn') {
    console.log('Clear cart button clicked via global handler');
    
    // Confirm before clearing
    if (confirm('Apakah Anda yakin ingin mengosongkan keranjang?')) {
      console.log('User confirmed to clear cart');
      
      // Call clearCart function
      if (typeof window.clearCart === 'function') {
        window.clearCart();
        console.log('Cart cleared successfully');
        
        // Update display if displayCartItems function exists
        if (typeof window.displayCartItems === 'function') {
          window.displayCartItems();
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

document.addEventListener('DOMContentLoaded', () => {
  const navbar = document.getElementById('navbar');
  const hamburger = document.getElementById('hamburger');
  const navMenu = document.getElementById('navMenu');
  const cartBadge = document.querySelector('.cart-count');

  let cartCount = 0;




  // ===================== RESTORE CART =====================
  try {
    const saved = localStorage.getItem('cartCount');
    if (saved) cartCount = Number(saved) || 0;
    if (cartBadge) cartBadge.textContent = String(cartCount);
  } catch (e) {}




  // ===================== NAVBAR SCROLL =====================
  window.addEventListener('scroll', () => {
    if (!navbar) return;
    if (window.scrollY > 10) navbar.classList.add('is-scrolled');
    else navbar.classList.remove('is-scrolled');
  });



  // ===================== HAMBURGER MENU =====================
  if (hamburger && navMenu) {
    hamburger.addEventListener('click', () => {
      navMenu.classList.toggle('active');
      hamburger.classList.toggle('active');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
      if (!hamburger.contains(e.target) && !navMenu.contains(e.target)) {
        navMenu.classList.remove('active');
        hamburger.classList.remove('active');
      }
    });

    // Close mobile menu when clicking on nav links
    navMenu.addEventListener('click', (e) => {
      if (e.target.tagName === 'A') {
        navMenu.classList.remove('active');
        hamburger.classList.remove('active');
      }
    });

    // Handle dropdown in mobile menu
    const dropdown = navMenu.querySelector('.dropdown');
    if (dropdown) {
      const dropbtn = dropdown.querySelector('.dropbtn');
      const dropdownContent = dropdown.querySelector('.dropdown-content');
      
      dropbtn.addEventListener('click', (e) => {
        e.preventDefault();
        dropdown.classList.toggle('active');
      });
    }
  }




  // ===================== CART SYSTEM =====================
  // Use global cart instead of local cart
  let cart = globalCart;
  
  // Load cart from localStorage
  function loadCart() {
    // Use global cart loading
    if (typeof window.loadGlobalCart === 'function') {
      window.loadGlobalCart();
      cart = globalCart;
      updateCartBadge();
    }
    // Also update cart reference
    cart = globalCart;
  }
  
  // Save cart to localStorage
  function saveCart() {
    // Use global cart saving
    if (typeof window.saveGlobalCart === 'function') {
      window.saveGlobalCart();
    }
  }
  
  // Update cart badge
  function updateCartBadge() {
      if (cartBadge) {
      cartBadge.textContent = String(globalCart.length);
      if (globalCart.length > 0) {
        cartBadge.classList.add('pulse');
        setTimeout(() => cartBadge.classList.remove('pulse'), 400);
      }
    }
    // Also update global cart badge
    if (typeof window.updateGlobalCartBadge === 'function') {
      window.updateGlobalCartBadge();
    }
  }
  
  // Add product to cart
  function addToCart(productData) {
    console.log('=== ADD TO CART FUNCTION CALLED (DOMContentLoaded) ===');
    console.log('Product data received:', productData);
    console.log('Current cart before adding:', cart);
    
    // Use global cart function
    if (typeof window.addToCartGlobal === 'function') {
      window.addToCartGlobal(productData);
      // Update local cart reference
      cart = globalCart;
    } else {
      console.error('addToCartGlobal function not available in DOMContentLoaded');
      if (typeof window.customAlert !== 'undefined' && window.customAlert.error) {
        window.customAlert.error('Fungsi keranjang tidak tersedia. Silakan refresh halaman.');
      } else {
        alert('Fungsi keranjang tidak tersedia. Silakan refresh halaman.');
      }
    }
  }
  
  // Show cart notification
  function showCartNotification() {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
    notification.innerHTML = '✅ Produk ditambahkan ke keranjang!';
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
      notification.remove();
    }, 3000);
  }
  
  // Debug function to check cart status
  function debugCart() {
    console.log('Cart contents:', globalCart);
    console.log('Cart count:', globalCart.length);
    console.log('Cart total:', getCartTotal());
    console.log('localStorage cart:', localStorage.getItem('meatshop_cart'));
  }
  
  // Remove item from cart
  function removeFromCart(productId) {
    globalCart = globalCart.filter(item => item.id !== productId);
    cart = globalCart;
    if (typeof window.saveGlobalCart === 'function') {
      window.saveGlobalCart();
    }
  }
  
  // Clear cart
  function clearCart() {
    console.log('=== CLEARING CART ===');
    console.log('Cart before clearing:', cart);
    globalCart = [];
    cart = globalCart;
    if (typeof window.saveGlobalCart === 'function') {
      window.saveGlobalCart();
    }
    console.log('Cart after clearing:', cart);
    console.log('localStorage after clearing:', localStorage.getItem('meatshop_cart'));
  }
  
  // Get cart total
  function getCartTotal() {
    return globalCart.reduce((total, item) => {
      const price = parseFloat(item.price.replace(/[^\d]/g, ''));
      return total + (price * item.quantity);
    }, 0);
  }
  
  // Initialize cart
  loadCart();

  // ===================== ADD TO CART BUTTONS =====================
  function initializeCartButtons() {
    console.log('Initializing cart buttons...');
    const cartButtons = document.querySelectorAll('.add-cart');
    console.log('Found cart buttons:', cartButtons.length);
    
    cartButtons.forEach((btn, index) => {
      console.log(`Button ${index}:`, btn);
      console.log('Button data attributes:', {
        name: btn.dataset.productName,
        price: btn.dataset.productPrice,
        category: btn.dataset.productCategory,
        stock: btn.dataset.productStock,
        unit: btn.dataset.productUnit
      });
      
      // Remove existing event listeners to prevent duplicates
      btn.removeEventListener('click', handleAddToCart);
      btn.addEventListener('click', handleAddToCart);
    });
  }
  
  function handleAddToCart(e) {
    e.preventDefault();
    e.stopPropagation();
    
    console.log('=== ADD TO CART CLICKED ===');
    const btn = e.currentTarget;
    console.log('Button clicked:', btn);
    console.log('Button dataset:', btn.dataset);
    
    // Get product data from data attributes first, then fallback to card elements
    const productData = {
      id: Date.now(),
      name: btn.dataset.productName || btn.closest('.bg-white, .card, [class*="product"]')?.querySelector('h3, h4, .product-name')?.textContent?.trim() || 'Produk',
      price: btn.dataset.productPrice || btn.closest('.bg-white, .card, [class*="product"]')?.querySelector('.text-primary, .price, [class*="price"]')?.textContent?.trim() || '0',
      category: btn.dataset.productCategory || btn.closest('.bg-white, .card, [class*="product"]')?.querySelector('[class*="category"], .category')?.textContent?.trim() || 'Umum',
      stock: btn.dataset.productStock || 'Tersedia',
      unit: btn.dataset.productUnit || 'pcs'
    };
    
    console.log('Product data extracted:', productData);
    
    // Validate required data
    if (!productData.name || productData.name === 'Produk') {
      console.error('Product name is missing or invalid');
      if (typeof window.customAlert !== 'undefined' && window.customAlert.error) {
        window.customAlert.error('Error: Nama produk tidak ditemukan');
      } else {
        alert('Error: Nama produk tidak ditemukan');
      }
      return;
    }
    
    if (!productData.price || productData.price === '0') {
      console.error('Product price is missing or invalid');
      if (typeof window.customAlert !== 'undefined' && window.customAlert.error) {
        window.customAlert.error('Error: Harga produk tidak ditemukan');
      } else {
        alert('Error: Harga produk tidak ditemukan');
      }
      return;
    }
    
    console.log('Calling addToCartGlobal with:', productData);
    if (typeof window.addToCartGlobal === 'function') {
      window.addToCartGlobal(productData);
    } else {
      console.error('addToCartGlobal function not available!');
      if (typeof window.customAlert !== 'undefined' && window.customAlert.error) {
        window.customAlert.error('Fungsi keranjang tidak tersedia. Silakan refresh halaman.');
      } else {
        alert('Fungsi keranjang tidak tersedia. Silakan refresh halaman.');
      }
    }
  }
  
  // Initialize cart buttons when DOM is ready
  document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing cart buttons...');
    initializeCartButtons();
    initializePesanButtons();
  });
  
  // Also initialize immediately in case DOM is already loaded
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
      initializeCartButtons();
      initializePesanButtons();
    });
  } else {
    initializeCartButtons();
    initializePesanButtons();
  }
  
  // Initialize Pesan buttons (alternative to onclick)
  function initializePesanButtons() {
    console.log('Initializing Pesan buttons...');
    const pesanButtons = document.querySelectorAll('button[onclick*="sendToWhatsApp"]');
    console.log('Found Pesan buttons:', pesanButtons.length);
    
    pesanButtons.forEach((btn, index) => {
      console.log(`Pesan Button ${index}:`, btn);
      // Add click event listener as backup
      btn.addEventListener('click', function(e) {
        console.log('Pesan button clicked via event listener');
        // Let the onclick handler run first, then we can add backup logic if needed
      });
    });
  }



  // ===================== HERO ANIMATION =====================
  const hero = document.querySelector('.hero');
  if (hero) {
    const animatedEls = hero.querySelectorAll('.fade-up');
    let staggerTimeouts = [];

    const runStagger = () => {
      staggerTimeouts.forEach(t => clearTimeout(t));
      staggerTimeouts = [];
      animatedEls.forEach(el => el.classList.remove('animate'));
      animatedEls.forEach((el, i) => {
        staggerTimeouts.push(setTimeout(() => el.classList.add('animate'), i * 150));
      });
    };

    const resetStagger = () => {
      staggerTimeouts.forEach(t => clearTimeout(t));
      staggerTimeouts = [];
      animatedEls.forEach(el => el.classList.remove('animate'));
    };

    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => entry.isIntersecting ? runStagger() : resetStagger());
    }, { threshold: 0.35 });

    observer.observe(hero);
  }




// ===================== ABOUT CHECKLIST ANIMATION =====================
const checklistItems = document.querySelectorAll(".checklist li");
window.addEventListener("scroll", () => {
  const triggerBottom = window.innerHeight * 0.85;
  checklistItems.forEach(item => {
    const boxTop = item.getBoundingClientRect().top;
    if (boxTop < triggerBottom) {
      item.classList.add("visible");
    } else {
      item.classList.remove("visible");
    }
  });
});







  // ===================== LIGHTBOX (Gallery + Produk) =====================
  const galleryImgs = document.querySelectorAll('.gallery-item img');
  const productImgs = document.querySelectorAll('.product-grid img');
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightboxImg');
  const closeLightbox = lightbox ? lightbox.querySelector('.close') : null;

  function openLightbox(src) {
    if (!lightbox || !lightboxImg) return;
    lightbox.style.display = 'flex';
    lightboxImg.src = src;
  }

  function closeLb() {
    if (!lightbox || !lightboxImg) return;
    lightbox.style.display = 'none';
    lightboxImg.src = "";
  }

  if (lightbox && lightboxImg && closeLightbox) {
    // gallery
    galleryImgs.forEach(img => {
      img.addEventListener('click', () => openLightbox(img.src));
    });
    // produk
    productImgs.forEach(img => {
      img.addEventListener('click', () => openLightbox(img.src));
    });

    closeLightbox.addEventListener('click', closeLb);
    lightbox.addEventListener('click', (e) => {
      if (e.target === lightbox) closeLb();
    });
  }
});


const contactForm = document.getElementById('contactForm');
if(contactForm){
  contactForm.addEventListener('submit', e => {
    e.preventDefault();
    if (typeof window.customAlert !== 'undefined' && window.customAlert.success) {
      window.customAlert.success("Pesan berhasil dikirim!");
    } else {
      alert("Pesan berhasil dikirim!");
    }
    contactForm.reset();
  });
}


// ===================== PROMO SLIDER =====================
document.addEventListener("DOMContentLoaded", () => {
  const promoSlider = document.querySelector('.promo-slider');
  const promoItems = document.querySelectorAll('.promo-slider .card');
  const prevBtn = document.querySelector('.promo-btn.prev');
  const nextBtn = document.querySelector('.promo-btn.next');

  let promoIndex = 0;
  const visiblePromo = 4;
  const totalPromo = promoItems.length;

  function getItemWidth() {
    return promoItems[0].getBoundingClientRect().width + 20; // tambahkan jarak antar card
  }

  function updatePromoSlider() {
    const itemWidth = getItemWidth();
    promoSlider.style.transform = `translateX(${-promoIndex * itemWidth}px)`;
    promoSlider.style.transition = "transform 0.5s ease-in-out";
  }

  nextBtn.addEventListener('click', () => {
    if (promoIndex < totalPromo - visiblePromo) {
      promoIndex++;
    } else {
      promoIndex = 0;
    }
    updatePromoSlider();
  });

  prevBtn.addEventListener('click', () => {
    if (promoIndex > 0) {
      promoIndex--;
    } else {
      promoIndex = totalPromo - visiblePromo;
    }
    updatePromoSlider();
  });

  // Auto slide
  setInterval(() => {
    if (promoIndex < totalPromo - visiblePromo) {
      promoIndex++;
    } else {
      promoIndex = 0;
    }
    updatePromoSlider();
  }, 4000);

  // Responsif saat resize
  window.addEventListener("resize", updatePromoSlider);

  updatePromoSlider();
});

// ===================== WHATSAPP INTEGRATION =====================
// sendToWhatsApp function is already defined at the top of the file

// Send cart items to WhatsApp function is already defined at the top of the file

// Make functions globally available IMMEDIATELY
window.sendToWhatsApp = sendToWhatsApp;
window.sendCartToWhatsApp = sendCartToWhatsApp;
window.addToCart = addToCart;
window.removeFromCart = removeFromCart;
window.clearCart = clearCart;
window.getCartTotal = getCartTotal;
window.initializeCartButtons = initializeCartButtons;
window.handleAddToCart = handleAddToCart;
window.debugCart = debugCart;

console.log('=== GLOBAL FUNCTIONS REGISTERED ===');
console.log('sendToWhatsApp available:', typeof window.sendToWhatsApp);
console.log('clearCart available:', typeof window.clearCart);
console.log('addToCart available:', typeof window.addToCart);
console.log('handleAddToCart available:', typeof window.handleAddToCart);
console.log('initializeCartButtons available:', typeof window.initializeCartButtons);

// Ensure sendToWhatsApp is available immediately
console.log('Making sendToWhatsApp globally available...');
if (typeof window.sendToWhatsApp !== 'function') {
  console.error('sendToWhatsApp function not available!');
} else {
  console.log('sendToWhatsApp function is available');
}

// Force reinitialize all buttons
function reinitializeAllButtons() {
  console.log('Reinitializing all buttons...');
  initializeCartButtons();
  
  // Also reinitialize any other buttons that might need it
  setTimeout(() => {
    initializeCartButtons();
  }, 100);
}

// Make reinitialize function available globally
window.reinitializeAllButtons = reinitializeAllButtons;

// Reinitialize cart buttons when DOM changes (for dynamic content)
const observer = new MutationObserver(function(mutations) {
  mutations.forEach(function(mutation) {
    if (mutation.addedNodes.length > 0) {
      // Check if any new nodes contain cart buttons
      mutation.addedNodes.forEach(function(node) {
        if (node.nodeType === 1) { // Element node
          if (node.querySelector && node.querySelector('.add-cart')) {
            initializeCartButtons();
          }
        }
      });
    }
  });
});

// Start observing
observer.observe(document.body, {
  childList: true,
  subtree: true
});

// ===================== IMAGE PREVIEW FUNCTION =====================
function previewImage(input) {
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    const preview = document.getElementById('preview_img');
    const previewContainer = document.getElementById('image_preview');
    
    reader.onload = function(e) {
      preview.src = e.target.result;
      previewContainer.classList.remove('hidden');
    };
    
    reader.readAsDataURL(input.files[0]);
  }
}
