    </main>

    <!-- FOOTER -->
    <footer class="bg-white text-gray-900 border-t border-gray-200">
        <!-- Main Footer Content -->
        <div class="w-full px-6 sm:px-8 lg:px-12 py-24">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16">
                    
                    <!-- Company Info -->
                    <div class="space-y-8">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-6">Meat Shop & Grocery</h3>
                            <p class="text-gray-600 leading-relaxed text-base">
                                Menyediakan produk daging segar, bumbu berkualitas, dan kebutuhan dapur lengkap dengan harga terbaik.
                            </p>
                        </div>
                        
                        <!-- Contact Info -->
                        <div class="space-y-5">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <i class='bx bx-phone text-primary text-base'></i>
                                </div>
                                <span class="text-gray-700 text-base">(+62) 811-2993-400</span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <i class='bx bx-envelope text-primary text-base'></i>
                                </div>
                                <a href="mailto:supplierdaging@mitraboga.com" class="text-gray-700 hover:text-primary transition-colors text-base break-all">
                                    supplierdaging@mitraboga.com
                                </a>
                            </div>
                            <div class="flex items-start space-x-4">
                                <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 mt-1">
                                    <i class='bx bx-map text-primary text-base'></i>
                                </div>
                                <a href="https://maps.app.goo.gl/sVC5gorCAYFzk7CJ8" target="_blank" class="text-gray-700 hover:text-primary transition-colors text-sm leading-relaxed">
                                    Jl. Suratmo No.59, Kalibanteng Kidul,<br>
                                    Kec. Semarang Barat, Kota Semarang,<br>
                                    Jawa Tengah 50147
                                </a>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="pt-2">
                            <h4 class="text-gray-900 font-semibold mb-6 text-lg">Ikuti Kami</h4>
                            <div class="flex space-x-3">
                                <a href="https://www.facebook.com/share/174RhAy1hY/" aria-label="facebook" class="w-12 h-12 bg-gray-100 border border-gray-200 rounded-xl flex items-center justify-center hover:bg-primary hover:border-primary transition-all duration-300">
                                    <i class='bx bxl-facebook text-gray-600 hover:text-white text-xl'></i>
                                </a>
                                <a href="https://www.instagram.com/meatshopindoguna_semarang?igsh=bHQycjU4NTh2OTV3" aria-label="instagram" class="w-12 h-12 bg-gray-100 border border-gray-200 rounded-xl flex items-center justify-center hover:bg-primary hover:border-primary transition-all duration-300">
                                    <i class='bx bxl-instagram text-gray-600 hover:text-white text-xl'></i>
                                </a>
                                <a href="https://www.tiktok.com/@meatshopindoguna_smg?_t=ZS-8zwRsprvqbP&_r=1" aria-label="tiktok" class="w-12 h-12 bg-gray-100 border border-gray-200 rounded-xl flex items-center justify-center hover:bg-primary hover:border-primary transition-all duration-300">
                                    <i class='bx bxl-tiktok text-gray-600 hover:text-white text-xl'></i>
                                </a>
                                <a href="#" aria-label="whatsapp" class="w-12 h-12 bg-gray-100 border border-gray-200 rounded-xl flex items-center justify-center hover:bg-primary hover:border-primary transition-all duration-300">
                                    <i class='bx bxl-whatsapp text-gray-600 hover:text-white text-xl'></i>
                                </a>
                            </div>
                </div>
            </div>

                    <!-- Product Links -->
                    <div class="space-y-8">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-8">Produk Kami</h4>
                            <ul class="space-y-4">
                                <li><a href="<?php echo base_url('produk/daging'); ?>" class="text-gray-600 hover:text-primary transition-colors text-base">Daging Segar</a></li>
                                <li><a href="<?php echo base_url('produk/minuman'); ?>" class="text-gray-600 hover:text-primary transition-colors text-base">Minuman</a></li>       
                                <li><a href="<?php echo base_url('produk/seafood'); ?>" class="text-gray-600 hover:text-primary transition-colors text-base">Seafood</a></li>
                                <li><a href="<?php echo base_url('produk/bumbu'); ?>" class="text-gray-600 hover:text-primary transition-colors text-base">Bumbu & Rempah</a></li>
                                <li><a href="<?php echo base_url('produk/roti'); ?>" class="text-gray-600 hover:text-primary transition-colors text-base">Roti & Kue</a></li>
                                <li><a href="<?php echo base_url('produk/sayur-buah'); ?>" class="text-gray-600 hover:text-primary transition-colors text-base">Sayur & Buah</a></li>
                                <li><a href="<?php echo base_url('produk/daging-olahan'); ?>" class="text-gray-600 hover:text-primary transition-colors text-base">Daging Olahan</a></li>
                                <li><a href="<?php echo base_url('produk/susu-olahan'); ?>" class="text-gray-600 hover:text-primary transition-colors text-base">Susu & Olahan</a></li>
                </ul>
                        </div>
            </div>

                    <!-- Navigation Links -->
                    <div class="space-y-8">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-8">Menu</h4>
                            <ul class="space-y-4">
                                <li><a href="<?php echo base_url(); ?>" class="text-gray-600 hover:text-primary transition-colors text-base">Beranda</a></li>
                                <li><a href="<?php echo base_url('gallery'); ?>" class="text-gray-600 hover:text-primary transition-colors text-base">Galeri</a></li>
                                <li><a href="<?php echo base_url('tentang-kami'); ?>" class="text-gray-600 hover:text-primary transition-colors text-base">Tentang Kami</a></li>
                                <li><a href="<?php echo base_url('kontak'); ?>" class="text-gray-600 hover:text-primary transition-colors text-base">Kontak</a></li>
                </ul>
            </div>

                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-8">Jam Operasional</h4>
                            <div class="space-y-3 text-gray-600">
                                <p class="text-base">Senin - Jumat: 08:00 - 20:00 WIB</p>
                                <p class="text-base">Sabtu - Minggu: 08:00 - 18:00 WIB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="space-y-8">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-8">Hubungi Kami</h4>
                            
                            <!-- Flash Messages -->
                            <?php if($this->session->flashdata('success')): ?>
                                <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-xl">
                                    <p class="text-green-700 text-sm"><?php echo $this->session->flashdata('success'); ?></p>
                                </div>
                            <?php endif; ?>
                            
                            <?php if($this->session->flashdata('error')): ?>
                                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-xl">
                                    <p class="text-red-700 text-sm"><?php echo $this->session->flashdata('error'); ?></p>
                                </div>
                            <?php endif; ?>
                            
                            <form action="<?php echo base_url('contact/submit'); ?>" method="POST" class="space-y-5">
                                <input type="text" name="name" placeholder="Nama Lengkap" required class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none focus:border-primary focus:bg-white transition-all duration-300 text-base">
                                <input type="tel" name="phone" placeholder="No. WhatsApp" class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none focus:border-primary focus:bg-white transition-all duration-300 text-base">
                                <input type="email" name="email" placeholder="Email" required class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none focus:border-primary focus:bg-white transition-all duration-300 text-base">
                                <input type="text" name="subject" placeholder="Subjek" required class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none focus:border-primary focus:bg-white transition-all duration-300 text-base">
                                <textarea name="message" placeholder="Pesan Anda" rows="4" required class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none focus:border-primary focus:bg-white transition-all duration-300 resize-none text-base"></textarea>
                                <button type="submit" class="w-full bg-primary text-white px-6 py-4 rounded-xl hover:bg-primary-700 transition-all duration-300 font-semibold text-base">
                                    <i class='bx bx-send mr-2'></i>
                                    Kirim Pesan
                                </button>
                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="bg-gray-50 border-t border-gray-200">
            <div class="w-full px-6 sm:px-8 lg:px-12 py-8">
                <div class="max-w-7xl mx-auto">
                    <div class="text-center">
                        <p class="text-gray-600 text-base">
                            © 2025 Meat Shop & Grocery. All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Toast Notifications -->
    <div x-data="toastComponent()" class="fixed top-4 right-4 z-50 space-y-2">
        <template x-for="toast in toasts" :key="toast.id">
            <div x-show="toast.show" 
                 x-transition:enter="transition ease-out duration-300" 
                 x-transition:enter-start="opacity-0 transform translate-x-full" 
                 x-transition:enter-end="opacity-100 transform translate-x-0" 
                 x-transition:leave="transition ease-in duration-200" 
                 x-transition:leave-start="opacity-100 transform translate-x-0" 
                 x-transition:leave-end="opacity-0 transform translate-x-full"
                 class="bg-white border border-gray-200 rounded-lg p-4 max-w-sm w-full"
                 :class="{
                     'border-green-400': toast.type === 'success',
                     'border-red-400': toast.type === 'error',
                     'border-yellow-400': toast.type === 'warning',
                     'border-blue-400': toast.type === 'info'
                 }">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div x-show="toast.type === 'success'" class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <i class='bx bx-check text-green-600 text-lg'></i>
                        </div>
                        <div x-show="toast.type === 'error'" class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                            <i class='bx bx-x text-red-600 text-lg'></i>
                        </div>
                        <div x-show="toast.type === 'warning'" class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                            <i class='bx bx-error text-yellow-600 text-lg'></i>
                        </div>
                        <div x-show="toast.type === 'info'" class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class='bx bx-info-circle text-blue-600 text-lg'></i>
                        </div>
                    </div>
                    <div class="ml-3 flex-1">
                        <h3 class="text-sm font-medium text-gray-900" x-text="toast.title"></h3>
                        <p class="text-sm text-gray-700 mt-1" x-text="toast.message"></p>
                    </div>
                    <button @click="removeToast(toast.id)" class="ml-3 text-gray-400 hover:text-gray-600">
                        <i class='bx bx-x text-lg'></i>
                    </button>
                </div>
            </div>
        </template>
    </div>


    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Scripts -->
    <script src="<?php echo base_url('js/script.js'); ?>"></script>
    
    <!-- Toast Functions -->
    <script>
        // Toast Component
        function toastComponent() {
            return {
                toasts: [],
                
                addToast(type, title, message, duration = 5000) {
                    const id = Date.now() + Math.random();
                    const toast = {
                        id: id,
                        type: type,
                        title: title,
                        message: message,
                        show: true
                    };
                    
                    this.toasts.push(toast);
                    
                    // Auto remove after duration
                    setTimeout(() => {
                        this.removeToast(id);
                    }, duration);
                },
                
                removeToast(id) {
                    const index = this.toasts.findIndex(toast => toast.id === id);
                    if (index > -1) {
                        this.toasts[index].show = false;
                        setTimeout(() => {
                            this.toasts.splice(index, 1);
                        }, 200);
                    }
                }
            }
        }
        
        // Global toast functions
        window.customAlert = {
            success: function(message, title = 'Berhasil') {
                const toast = document.querySelector('[x-data="toastComponent()"]').__x.$data;
                toast.addToast('success', title, message);
            },
            
            error: function(message, title = 'Error') {
                const toast = document.querySelector('[x-data="toastComponent()"]').__x.$data;
                toast.addToast('error', title, message);
            },
            
            warning: function(message, title = 'Peringatan') {
                const toast = document.querySelector('[x-data="toastComponent()"]').__x.$data;
                toast.addToast('warning', title, message);
            },
            
            info: function(message, title = 'Informasi') {
                const toast = document.querySelector('[x-data="toastComponent()"]').__x.$data;
                toast.addToast('info', title, message);
            },
            
            confirm: function(message, title = 'Konfirmasi', onConfirm, onCancel) {
                // Fallback to browser confirm for now
                if (confirm(title + '\n\n' + message)) {
                    if (onConfirm) onConfirm();
                } else {
                    if (onCancel) onCancel();
                }
            }
        };
    </script>
    
    <!-- Cart System Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Cart system initialized');
        });
    </script>

    <!-- Floating WhatsApp Button -->
    <div class="fixed bottom-6 right-6 z-50 group">
        <a href="https://wa.me/628112993400" 
           target="_blank" 
           class="flex items-center justify-center w-14 h-14 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 animate-pulse">
            <i class='bx bxl-whatsapp text-2xl'></i>
        </a>
        <!-- Tooltip -->
        <div class="absolute bottom-full right-0 mb-2 px-3 py-2 bg-gray-800 text-white text-sm rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap pointer-events-none">
            Chat dengan kami
            <div class="absolute top-full right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-800"></div>
        </div>
    </div>
</body>
</html>
