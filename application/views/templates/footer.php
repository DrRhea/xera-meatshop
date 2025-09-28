    </main>

    <!-- Divider sebelum footer -->
    <div class="footer-divider"></div>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container footer-grid">
            <!-- Kolom 1: Brand & Kontak -->
            <div class="foot-col">
                <h5>CV.Semarang Boga Utama</h5>
                <ul class="contact-list">
                    <li><i class="fas fa-phone"></i> Hubungi dengan telepon</li>
                    <li><i class="fas fa-envelope"></i><a href="mailto:meatshoprnbgrill.semarang@gmail.com">Hubungi dengan email</a></li>
                    <li><i class="fas fa-map-marker-alt"></i><a href="https://maps.app.goo.gl/sVC5gorCAYFzk7CJ8" target="_blank">Jl. Suratmo No.59, Gisikdrono,<br/> Kec. Semarang Barat, Kota Semarang,<br/>Jawa Tengah 50147
                </a>
                </li>
                </ul>
                <div class="socials">
                    <a href="https://www.facebook.com/share/174RhAy1hY/" aria-label="facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/meatshopindoguna_semarang?igsh=bHQycjU4NTh2OTV3" aria-label="instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/@meatshopindoguna_smg?_t=ZS-8zwRsprvqbP&_r=1" aria-label="tiktok"><i class="fab fa-tiktok"></i></a>
                    <a href="#" aria-label="whatsapp"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Kolom 2: Produk -->
            <div class="foot-col">
                <h5>Produk</h5>
                <ul class="list">
                    <li><a href="<?php echo base_url('produk/daging'); ?>">Daging</a></li>
                    <li><a href="<?php echo base_url('produk/minuman'); ?>">Minuman</a></li>       
                    <li><a href="<?php echo base_url('produk/seafood'); ?>">Seafood</a></li>
                    <li><a href="<?php echo base_url('produk/bumbu'); ?>">Bumbu</a></li>
                    <li><a href="<?php echo base_url('produk/roti'); ?>">Roti</a></li>
                    <li><a href="<?php echo base_url('produk/sayur-buah'); ?>">Buah & Sayur</a></li>
                    <li><a href="<?php echo base_url('produk/daging-olahan'); ?>">Daging & Olahan</a></li>
                    <li><a href="<?php echo base_url('produk/susu-olahan'); ?>">Susu & Olahan</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Menu -->
            <div class="foot-col">
                <h5>Menu</h5>
                <ul class="list">
                    <li><a href="<?php echo base_url(); ?>">Beranda</a></li>
                    <li><a href="">Produk</a></li>
                    <li><a href="<?php echo base_url('tentang-kami'); ?>">Tentang Kami</a></li>
                    <li><a href="<?php echo base_url('kontak'); ?>">Kontak</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Hubungi Kami -->
            <div class="foot-col">
                
                <h5>Hubungi Kami</h5>
                <section id="hubungi-kami">
                <form>
                    <input type="text" placeholder="Nama" style="width:100%;margin-bottom:8px;padding:8px;border:1px solid #ccc;border-radius:6px;">
                    <input type="text" placeholder="No. WhatsApp" style="width:100%;margin-bottom:8px;padding:8px;border:1px solid #ccc;border-radius:6px;">
                    <input type="email" placeholder="Email" style="width:100%;margin-bottom:8px;padding:8px;border:1px solid #ccc;border-radius:6px;">
                    <textarea placeholder="Pesan" style="width:100%;height:80px;margin-bottom:8px;padding:8px;border:1px solid #ccc;border-radius:6px;"></textarea>
                    <button type="submit" class="btn-primary" style="width:100%;border:none;border-radius:8px;padding:10px;font-size:16px;cursor:pointer;">Kirim</button>
                </form>
                </section>
            </div>
        </div>

        <div style="text-align:center;margin-top:24px;font-size:14px;color:#555;">
            © 2025 Meat Shop & Grocery
        </div>
    </footer>

</body>
</html>
