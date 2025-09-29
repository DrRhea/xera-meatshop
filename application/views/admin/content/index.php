<!-- Page Header -->
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-text">Kelola Konten Website</h1>
        <p class="text-muted mt-2">Kelola konten untuk halaman beranda, tentang kami, dan kontak</p>
    </div>
</div>

<!-- Flash Messages -->
<?php if($this->session->flashdata('success')): ?>
    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center space-x-2">
        <i class='bx bx-check-circle text-xl'></i>
        <span><?php echo $this->session->flashdata('success'); ?></span>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('error')): ?>
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-center space-x-2">
        <i class='bx bx-error-circle text-xl'></i>
        <span><?php echo $this->session->flashdata('error'); ?></span>
    </div>
<?php endif; ?>

<!-- Pages Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Homepage -->
    <div class="bg-card rounded-lg border border-border p-6 hover:shadow-lg transition-shadow">
        <div class="flex items-center space-x-4 mb-4">
            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                <i class='bx bx-home text-primary text-xl'></i>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-text">Halaman Beranda</h3>
                <p class="text-sm text-muted">Kelola konten hero, about, dan fitur</p>
            </div>
        </div>
        <p class="text-sm text-gray-600 mb-4">
            Kelola judul, deskripsi, tombol, dan konten lainnya untuk halaman beranda website.
        </p>
        <a href="<?php echo base_url('admin/content/page/homepage'); ?>" 
           class="inline-flex items-center text-primary hover:text-primary-700 font-medium">
            Kelola Konten
            <i class='bx bx-arrow-right ml-2'></i>
        </a>
    </div>

    <!-- About Page -->
    <div class="bg-card rounded-lg border border-border p-6 hover:shadow-lg transition-shadow">
        <div class="flex items-center space-x-4 mb-4">
            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                <i class='bx bx-info-circle text-primary text-xl'></i>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-text">Halaman Tentang Kami</h3>
                <p class="text-sm text-muted">Kelola konten tentang perusahaan</p>
            </div>
        </div>
        <p class="text-sm text-gray-600 mb-4">
            Kelola deskripsi perusahaan, sejarah, dan informasi lainnya untuk halaman tentang kami.
        </p>
        <a href="<?php echo base_url('admin/content/page/about'); ?>" 
           class="inline-flex items-center text-primary hover:text-primary-700 font-medium">
            Kelola Konten
            <i class='bx bx-arrow-right ml-2'></i>
        </a>
    </div>

    <!-- Contact Page -->
    <div class="bg-card rounded-lg border border-border p-6 hover:shadow-lg transition-shadow">
        <div class="flex items-center space-x-4 mb-4">
            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                <i class='bx bx-phone text-primary text-xl'></i>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-text">Halaman Kontak</h3>
                <p class="text-sm text-muted">Kelola informasi kontak</p>
            </div>
        </div>
        <p class="text-sm text-gray-600 mb-4">
            Kelola nomor telepon, email, alamat, dan informasi kontak lainnya.
        </p>
        <a href="<?php echo base_url('admin/content/page/contact'); ?>" 
           class="inline-flex items-center text-primary hover:text-primary-700 font-medium">
            Kelola Konten
            <i class='bx bx-arrow-right ml-2'></i>
        </a>
    </div>
</div>

<!-- Quick Stats -->
<div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-card rounded-lg border border-border p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-muted">Total Halaman</p>
                <p class="text-2xl font-bold text-text"><?php echo count($pages); ?></p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class='bx bx-file text-blue-600 text-xl'></i>
            </div>
        </div>
    </div>

    <div class="bg-card rounded-lg border border-border p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-muted">Konten Aktif</p>
                <p class="text-2xl font-bold text-text">-</p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <i class='bx bx-check text-green-600 text-xl'></i>
            </div>
        </div>
    </div>

    <div class="bg-card rounded-lg border border-border p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-muted">Terakhir Diupdate</p>
                <p class="text-2xl font-bold text-text">-</p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                <i class='bx bx-time text-yellow-600 text-xl'></i>
            </div>
        </div>
    </div>
</div>
