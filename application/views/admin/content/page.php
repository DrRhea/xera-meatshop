<!-- Page Header -->
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-text">Kelola Konten - <?php echo ucfirst($page); ?></h1>
        <p class="text-muted mt-2">Kelola konten untuk halaman <?php echo ucfirst($page); ?></p>
    </div>
    <a href="<?php echo base_url('admin/content'); ?>" 
       class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
        <i class='bx bx-arrow-left mr-2'></i>
        Kembali
    </a>
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

<!-- Content Form -->
<form action="<?php echo base_url('admin/content/update'); ?>" method="POST" class="space-y-8">
    <input type="hidden" name="page" value="<?php echo $page; ?>">
    
    <?php foreach ($content as $section => $items): ?>
        <div class="bg-card rounded-lg border border-border p-6">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                    <i class='bx bx-<?php echo $section === 'hero' ? 'home' : ($section === 'about' ? 'info-circle' : 'phone'); ?> text-primary'></i>
                </div>
                <h3 class="text-xl font-semibold text-text"><?php echo ucfirst($section); ?></h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php foreach ($items as $item): ?>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-text">
                            <?php echo ucwords(str_replace('_', ' ', $item->content_key)); ?>
                        </label>
                        
                        <?php if ($item->content_type === 'textarea'): ?>
                            <textarea name="content[<?php echo $item->section; ?>][<?php echo $item->content_key; ?>]" 
                                      rows="3" 
                                      class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                      placeholder="Masukkan <?php echo str_replace('_', ' ', $item->content_key); ?>"><?php echo htmlspecialchars($item->content_value); ?></textarea>
                        <?php elseif ($item->content_type === 'html'): ?>
                            <textarea name="content[<?php echo $item->section; ?>][<?php echo $item->content_key; ?>]" 
                                      rows="5" 
                                      class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                      placeholder="Masukkan HTML content"><?php echo htmlspecialchars($item->content_value); ?></textarea>
                        <?php else: ?>
                            <input type="text" 
                                   name="content[<?php echo $item->section; ?>][<?php echo $item->content_key; ?>]" 
                                   value="<?php echo htmlspecialchars($item->content_value); ?>"
                                   class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                   placeholder="Masukkan <?php echo str_replace('_', ' ', $item->content_key); ?>">
                        <?php endif; ?>
                        
                        <div class="flex items-center space-x-2 text-xs text-muted">
                            <span class="px-2 py-1 bg-gray-100 rounded"><?php echo $item->content_type; ?></span>
                            <span class="px-2 py-1 bg-<?php echo $item->is_active ? 'green' : 'red'; ?>-100 text-<?php echo $item->is_active ? 'green' : 'red'; ?>-700 rounded">
                                <?php echo $item->is_active ? 'Aktif' : 'Tidak Aktif'; ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
    
    <!-- Submit Button -->
    <div class="flex justify-end space-x-4">
        <a href="<?php echo base_url('admin/content'); ?>" 
           class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
            Batal
        </a>
        <button type="submit" 
                class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary-700 transition-colors">
            <i class='bx bx-save mr-2'></i>
            Simpan Perubahan
        </button>
    </div>
</form>

<!-- Preview Section -->
<div class="mt-12 bg-card rounded-lg border border-border p-6">
    <h3 class="text-xl font-semibold text-text mb-4">Preview Halaman</h3>
    <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-sm text-muted">
            Preview akan menampilkan bagaimana konten akan terlihat di halaman website.
            <a href="<?php echo base_url($page === 'homepage' ? '' : $page); ?>" 
               target="_blank" 
               class="text-primary hover:text-primary-700 ml-2">
                Lihat halaman live
                <i class='bx bx-external-link ml-1'></i>
            </a>
        </p>
    </div>
</div>
