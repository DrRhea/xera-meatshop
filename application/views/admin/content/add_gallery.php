<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-text">Tambah Galeri</h1>
            <p class="text-muted mt-1">Tambah foto atau gambar baru ke galeri</p>
        </div>
        <a href="<?php echo base_url('admin/gallery'); ?>" 
           class="bg-surface text-text px-4 py-2 rounded-lg hover:bg-border transition-colors duration-200 flex items-center">
            <i class='bx bx-arrow-back mr-2'></i>
            Kembali
        </a>
    </div>

    <!-- Form -->
    <form action="<?php echo base_url('admin/gallery/add'); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <div class="bg-card border border-border rounded-lg p-6">
            <!-- Image Upload -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-text mb-4">Upload Gambar</h3>
                <div class="border-2 border-dashed border-border rounded-lg p-8 text-center hover:border-primary transition-colors duration-200 cursor-pointer"
                     onclick="document.getElementById('gallery_image').click()">
                    <i class='bx bx-cloud-upload text-4xl text-muted mb-4'></i>
                    <p class="text-lg text-text mb-2">Klik untuk upload gambar atau drag & drop</p>
                    <p class="text-sm text-muted mb-4">PNG, JPG, JPEG maksimal 5MB</p>
                    <input type="file" 
                           id="gallery_image"
                           name="gallery_image" 
                           accept="image/*"
                           class="hidden"
                           onchange="previewGalleryImage(this)">
                </div>
                
                <!-- Image Preview -->
                <div id="gallery_preview" class="mt-6 hidden">
                    <div class="relative inline-block">
                        <img id="preview_gallery_img" src="" alt="Preview" class="w-64 h-48 object-cover rounded-lg border border-border">
                        <button type="button" 
                                onclick="removeGalleryPreview()"
                                class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-600 transition-colors duration-200">
                            <i class='bx bx-x text-sm'></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Gallery Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-text mb-4">Informasi Galeri</h3>
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Judul <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="title"
                               required
                               class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                               placeholder="Masukkan judul galeri">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Deskripsi
                        </label>
                        <textarea name="description" 
                                  rows="4" 
                                  class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent resize-none"
                                  placeholder="Masukkan deskripsi galeri"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-text mb-2">
                            Status
                        </label>
                        <select name="status" class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
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
                Simpan Galeri
            </button>
        </div>
    </form>
</div>

<script>
function previewGalleryImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('gallery_preview');
            const previewImg = document.getElementById('preview_gallery_img');
            if (preview && previewImg) {
                previewImg.src = e.target.result;
                preview.classList.remove('hidden');
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function removeGalleryPreview() {
    const preview = document.getElementById('gallery_preview');
    const input = document.getElementById('gallery_image');
    if (preview && input) {
        preview.classList.add('hidden');
        input.value = '';
    }
}
</script>
