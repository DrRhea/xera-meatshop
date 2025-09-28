    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Kolom 1: Brand & Kontak -->
                <div>
                    <h5 class="text-xl font-bold mb-6">CV.Semarang Boga Utama</h5>
                    <ul class="space-y-3">
                        <li class="flex items-center space-x-3">
                            <i class='bx bx-phone text-primary text-xl'></i>
                            <span>Hubungi dengan telepon</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i class='bx bx-envelope text-primary text-xl'></i>
                            <a href="mailto:meatshoprnbgrill.semarang@gmail.com" class="hover:text-primary transition-colors">
                                Hubungi dengan email
                            </a>
                        </li>
                        <li class="flex items-start space-x-3">
                            <i class='bx bx-map text-primary text-xl mt-1'></i>
                            <a href="https://maps.app.goo.gl/sVC5gorCAYFzk7CJ8" target="_blank" class="hover:text-primary transition-colors">
                                Jl. Suratmo No.59, Gisikdrono,<br/> Kec. Semarang Barat, Kota Semarang,<br/>Jawa Tengah 50147
                            </a>
                        </li>
                    </ul>
                    <div class="flex space-x-4 mt-6">
                        <a href="https://www.facebook.com/share/174RhAy1hY/" aria-label="facebook" class="text-gray-400 hover:text-primary transition-colors">
                            <i class='bx bxl-facebook text-2xl'></i>
                        </a>
                        <a href="https://www.instagram.com/meatshopindoguna_semarang?igsh=bHQycjU4NTh2OTV3" aria-label="instagram" class="text-gray-400 hover:text-primary transition-colors">
                            <i class='bx bxl-instagram text-2xl'></i>
                        </a>
                        <a href="https://www.tiktok.com/@meatshopindoguna_smg?_t=ZS-8zwRsprvqbP&_r=1" aria-label="tiktok" class="text-gray-400 hover:text-primary transition-colors">
                            <i class='bx bxl-tiktok text-2xl'></i>
                        </a>
                        <a href="#" aria-label="whatsapp" class="text-gray-400 hover:text-primary transition-colors">
                            <i class='bx bxl-whatsapp text-2xl'></i>
                        </a>
                    </div>
                </div>

                <!-- Kolom 2: Produk -->
                <div>
                    <h5 class="text-xl font-bold mb-6">Produk</h5>
                    <ul class="space-y-3">
                        <li><a href="<?php echo base_url('produk/daging'); ?>" class="text-gray-300 hover:text-primary transition-colors">Daging</a></li>
                        <li><a href="<?php echo base_url('produk/minuman'); ?>" class="text-gray-300 hover:text-primary transition-colors">Minuman</a></li>       
                        <li><a href="<?php echo base_url('produk/seafood'); ?>" class="text-gray-300 hover:text-primary transition-colors">Seafood</a></li>
                        <li><a href="<?php echo base_url('produk/bumbu'); ?>" class="text-gray-300 hover:text-primary transition-colors">Bumbu</a></li>
                        <li><a href="<?php echo base_url('produk/roti'); ?>" class="text-gray-300 hover:text-primary transition-colors">Roti</a></li>
                        <li><a href="<?php echo base_url('produk/sayur-buah'); ?>" class="text-gray-300 hover:text-primary transition-colors">Buah & Sayur</a></li>
                        <li><a href="<?php echo base_url('produk/daging-olahan'); ?>" class="text-gray-300 hover:text-primary transition-colors">Daging & Olahan</a></li>
                        <li><a href="<?php echo base_url('produk/susu-olahan'); ?>" class="text-gray-300 hover:text-primary transition-colors">Susu & Olahan</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Menu -->
                <div>
                    <h5 class="text-xl font-bold mb-6">Menu</h5>
                    <ul class="space-y-3">
                        <li><a href="<?php echo base_url(); ?>" class="text-gray-300 hover:text-primary transition-colors">Beranda</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-primary transition-colors">Produk</a></li>
                        <li><a href="<?php echo base_url('tentang-kami'); ?>" class="text-gray-300 hover:text-primary transition-colors">Tentang Kami</a></li>
                        <li><a href="<?php echo base_url('kontak'); ?>" class="text-gray-300 hover:text-primary transition-colors">Kontak</a></li>
                    </ul>
                </div>

                <!-- Kolom 4: Hubungi Kami -->
                <div>
                    <h5 class="text-xl font-bold mb-6">Hubungi Kami</h5>
                    <form class="space-y-4">
                        <input type="text" placeholder="Nama" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-primary transition-colors">
                        <input type="text" placeholder="No. WhatsApp" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-primary transition-colors">
                        <input type="email" placeholder="Email" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-primary transition-colors">
                        <textarea placeholder="Pesan" rows="3" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-primary transition-colors resize-none"></textarea>
                        <button type="submit" class="w-full bg-primary text-white px-4 py-3 rounded-lg hover:bg-yellow-600 transition-colors font-semibold">
                            Kirim
                        </button>
                    </form>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p class="text-gray-400">© 2025 Meat Shop & Grocery. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
