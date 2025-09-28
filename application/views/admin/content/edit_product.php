<!-- Form Container -->
<div class="max-w-4xl mx-auto">
    <div class="bg-card rounded-lg border border-border">
        <!-- Form Header -->
        <div class="px-6 py-4 border-b border-border">
            <h2 class="text-lg font-semibold text-text">Edit Informasi Produk</h2>
            <p class="text-muted text-sm">Ubah informasi produk yang sudah ada</p>
        </div>
        
        <!-- Form Content -->
        <form class="p-6 space-y-6">
            <!-- Basic Information -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Product Name -->
                <div class="lg:col-span-2">
                    <label for="product_name" class="block text-sm font-medium text-text mb-2">
                        Nama Produk <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="product_name" 
                           name="product_name" 
                           value="Daging Sapi Premium"
                           required
                           class="w-full px-3 py-2 border border-border rounded-lg text-text placeholder-muted focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                           placeholder="Masukkan nama produk">
                </div>
                
                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-text mb-2">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <select id="category" 
                            name="category" 
                            required
                            class="w-full px-3 py-2 border border-border rounded-lg text-text focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <option value="">Pilih Kategori</option>
                        <option value="daging-segar" selected>Daging Segar</option>
                        <option value="daging-olahan">Daging Olahan</option>
                        <option value="seafood">Seafood</option>
                        <option value="sayur-buah">Sayur & Buah</option>
                        <option value="susu-olahan">Susu & Olahan</option>
                    </select>
                </div>
                
                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-text mb-2">
                        Harga (Rp) <span class="text-red-500">*</span>
                    </label>
                    <input type="number" 
                           id="price" 
                           name="price" 
                           value="85000"
                           required
                           min="0"
                           step="100"
                           class="w-full px-3 py-2 border border-border rounded-lg text-text placeholder-muted focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                           placeholder="0">
                </div>
                
                <!-- Stock -->
                <div>
                    <label for="stock" class="block text-sm font-medium text-text mb-2">
                        Stok <span class="text-red-500">*</span>
                    </label>
                    <input type="number" 
                           id="stock" 
                           name="stock" 
                           value="25"
                           required
                           min="0"
                           class="w-full px-3 py-2 border border-border rounded-lg text-text placeholder-muted focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                           placeholder="0">
                </div>
                
                <!-- Unit -->
                <div>
                    <label for="unit" class="block text-sm font-medium text-text mb-2">
                        Satuan
                    </label>
                    <select id="unit" 
                            name="unit"
                            class="w-full px-3 py-2 border border-border rounded-lg text-text focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                        <option value="kg" selected>Kilogram (kg)</option>
                        <option value="gram">Gram (g)</option>
                        <option value="pcs">Pieces (pcs)</option>
                        <option value="pack">Pack</option>
                        <option value="liter">Liter (L)</option>
                    </select>
                </div>
            </div>
            
            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-text mb-2">
                    Deskripsi Produk
                </label>
                <textarea id="description" 
                          name="description" 
                          rows="4"
                          class="w-full px-3 py-2 border border-border rounded-lg text-text placeholder-muted focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                          placeholder="Deskripsikan produk secara detail...">Daging sapi segar berkualitas premium, dipotong dengan teknik yang tepat untuk mempertahankan kelezatan dan kelembutan. Cocok untuk berbagai olahan masakan.</textarea>
            </div>
            
            <!-- Current Image -->
            <div>
                <label class="block text-sm font-medium text-text mb-2">
                    Gambar Produk Saat Ini
                </label>
                <div class="flex items-center space-x-4">
                    <div class="w-20 h-20 bg-surface rounded-lg border border-border flex items-center justify-center">
                        <i class='bx bx-image text-2xl text-muted'></i>
                    </div>
                    <div>
                        <p class="text-sm text-text">current-image.jpg</p>
                        <p class="text-xs text-muted">Gambar saat ini</p>
                    </div>
                </div>
            </div>
            
            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-medium text-text mb-2">
                    Ganti Gambar Produk
                </label>
                <div class="border-2 border-dashed border-border rounded-lg p-6 text-center hover:border-primary transition-colors duration-200 cursor-pointer"
                     onclick="document.getElementById('product_image_edit').click()">
                    <i class='bx bx-cloud-upload text-4xl text-muted mb-2'></i>
                    <p class="text-muted text-sm mb-2">Klik untuk upload gambar baru atau drag & drop</p>
                    <p class="text-xs text-muted">PNG, JPG, JPEG maksimal 2MB</p>
                    <input type="file" 
                           id="product_image_edit"
                           name="product_image" 
                           accept="image/*"
                           class="hidden"
                           onchange="previewImageEdit(this)">
                </div>
                <!-- Image Preview -->
                <div id="image_preview_edit" class="mt-4 hidden">
                    <img id="preview_img_edit" src="" alt="Preview" class="w-32 h-32 object-cover rounded-lg border border-border">
                </div>
            </div>
            
            <!-- Status -->
            <div>
                <label class="block text-sm font-medium text-text mb-2">
                    Status Produk
                </label>
                <div class="flex items-center space-x-4">
                    <label class="flex items-center">
                        <input type="radio" 
                               name="status" 
                               value="active" 
                               checked
                               class="w-4 h-4 text-primary bg-card border-border focus:ring-primary">
                        <span class="ml-2 text-sm text-text">Aktif</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" 
                               name="status" 
                               value="inactive"
                               class="w-4 h-4 text-primary bg-card border-border focus:ring-primary">
                        <span class="ml-2 text-sm text-text">Tidak Aktif</span>
                    </label>
                </div>
            </div>
            
            <!-- Form Actions -->
            <div class="flex justify-end space-x-3 pt-6 border-t border-border">
                <a href="<?php echo base_url('admin/products'); ?>" 
                   class="px-4 py-2 text-muted hover:text-text transition-colors duration-200">
                    Batal
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary-700 transition-colors duration-200">
                    <i class='bx bx-save mr-2'></i>
                    Update Produk
                </button>
            </div>
        </form>
    </div>
</div>
