<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-text">Edit Galeri</h1>
            <p class="text-muted mt-1">Edit galeri #<?php echo $gallery_id; ?></p>
        </div>
        <a href="<?php echo base_url('admin/gallery'); ?>" 
           class="bg-surface text-text px-4 py-2 rounded-lg hover:bg-border transition-colors duration-200 flex items-center">
            <i class='bx bx-arrow-back mr-2'></i>
            Kembali
        </a>
    </div>

    <!-- Form -->
    <form class="space-y-6">
        <div class="bg-card border border-border rounded-lg p-6">
            <!-- Current Image -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-text mb-4">Gambar Saat Ini</h3>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <img src="<?php echo base_url('gambar/gambar3.jpg'); ?>" 
                             alt="Current Gallery Image" 
                             class="w-32 h-24 object-cover rounded-lg border border-border">
                        <div class="absolute inset-0 bg-black bg-opacity-50 rounded-lg flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-200">
                            <span class="text-white text-sm">Gambar Saat Ini</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm text-muted mb-2">Nama file: gallery-image.jpg</p>
                        <p class="text-sm text-muted">Ukuran: 1.2 MB</p>
                    </div>
                </div>
            </div>

            <!-- Image Upload -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-text mb-4">Ganti Gambar</h3>
                <div class="border-2 border-dashed border-border rounded-lg p-8 text-center hover:border-primary transition-colors duration-200 cursor-pointer"
                     onclick="document.getElementById('gallery_image_edit').click()">
                    <i class='bx bx-cloud-upload text-4xl text-muted mb-4'></i>
                    <p class="text-lg text-text mb-2">Klik untuk upload gambar baru atau drag & drop</p>
                    <p class="text-sm text-muted mb-4">PNG, JPG, JPEG maksimal 5MB</p>
                    <input type="file" 
                           id="gallery_image_edit"
                           name="gallery_image_edit" 
                           accept="image/*"
                           class="hidden"
                           onchange="previewGalleryImageEdit(this)">
                </div>
                
                <!-- Image Preview -->
                <div id="gallery_preview_edit" class="mt-6 hidden">
                    <div class="relative inline-block">
                        <img id="preview_gallery_img_edit" src="" alt="Preview" class="w-64 h-48 object-cover rounded-lg border border-border">
                        <button type="button" 
                                onclick="removeGalleryPreviewEdit()"
                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-600 transition-colors duration-200">
                            <i class='bx bx-x text-sm'></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Gallery Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-text mb-4">Informasi Galeri</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Judul <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="Masukkan judul galeri"
                               value="Daging Sapi Premium">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Kategori
                        </label>
                        <select class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="">Pilih Kategori</option>
                            <option value="products" selected>Produk</option>
                            <option value="store">Toko</option>
                            <option value="team">Tim</option>
                            <option value="events">Acara</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Status
                        </label>
                        <select class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="active" selected>Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Urutan Tampil
                        </label>
                        <input type="number" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="0"
                               value="1">
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-text mb-2">
                            Deskripsi
                        </label>
                        <textarea rows="4" 
                                  class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none"
                                  placeholder="Masukkan deskripsi galeri">Daging sapi segar berkualitas premium yang dipotong langsung dari peternakan kami</textarea>
                    </div>
                </div>
            </div>

            <!-- SEO Settings -->
            <div class="bg-surface rounded-lg p-6">
                <h3 class="text-lg font-semibold text-text mb-4">Pengaturan SEO</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Alt Text
                        </label>
                        <input type="text" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="Masukkan alt text untuk SEO"
                               value="Daging sapi premium segar">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Keywords
                        </label>
                        <input type="text" 
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="Masukkan keywords (pisahkan dengan koma)"
                               value="daging sapi, premium, segar, meat shop">
                    </div>
                </div>
            </div>

            <!-- Gallery Statistics -->
            <div class="bg-surface rounded-lg p-6">
                <h3 class="text-lg font-semibold text-text mb-4">Statistik Galeri</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-primary mb-1">156</div>
                        <div class="text-sm text-muted">Total Views</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-primary mb-1">23</div>
                        <div class="text-sm text-muted">Likes</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-primary mb-1">2024-01-15</div>
                        <div class="text-sm text-muted">Tanggal Upload</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-4">
            <a href="<?php echo base_url('admin/gallery'); ?>" 
               class="bg-surface text-text px-6 py-3 rounded-lg hover:bg-border transition-colors duration-200">
                Batal
            </a>
            <button type="submit" 
                    class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-700 transition-colors duration-200">
                <i class='bx bx-save mr-2'></i>
                Update Galeri
            </button>
        </div>
    </form>
</div>

<script>
function previewGalleryImageEdit(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('gallery_preview_edit');
            const previewImg = document.getElementById('preview_gallery_img_edit');
            if (preview && previewImg) {
                previewImg.src = e.target.result;
                preview.classList.remove('hidden');
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function removeGalleryPreviewEdit() {
    const preview = document.getElementById('gallery_preview_edit');
    const input = document.getElementById('gallery_image_edit');
    if (preview && input) {
        preview.classList.add('hidden');
        input.value = '';
    }
}
</script>
