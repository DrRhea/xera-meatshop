<!-- Contact Messages Management -->
<div class="space-y-8">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Pesan Kontak</h1>
            <p class="text-gray-600 mt-1">Kelola pesan yang masuk dari form hubungi kami</p>
        </div>
        
        <!-- Status Filter -->
        <div class="flex items-center space-x-3">
            <label class="text-sm font-medium text-gray-700">Filter:</label>
            <select onchange="filterMessages(this.value)" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-primary">
                <option value="all" <?php echo ($status === null || $status === 'all') ? 'selected' : ''; ?>>Semua</option>
                <option value="new" <?php echo ($status === 'new') ? 'selected' : ''; ?>>Baru</option>
                <option value="read" <?php echo ($status === 'read') ? 'selected' : ''; ?>>Sudah Dibaca</option>
                <option value="replied" <?php echo ($status === 'replied') ? 'selected' : ''; ?>>Sudah Dibalas</option>
            </select>
        </div>
    </div>

    <!-- Flash Messages -->
    <?php if($this->session->flashdata('success')): ?>
        <div class="p-4 bg-green-50 border border-green-200 rounded-xl">
            <p class="text-green-700 text-sm"><?php echo $this->session->flashdata('success'); ?></p>
        </div>
    <?php endif; ?>
    
    <?php if($this->session->flashdata('error')): ?>
        <div class="p-4 bg-red-50 border border-red-200 rounded-xl">
            <p class="text-red-700 text-sm"><?php echo $this->session->flashdata('error'); ?></p>
        </div>
    <?php endif; ?>

    <!-- Messages List -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <?php if(empty($messages)): ?>
            <div class="p-8 text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class='bx bx-message-dots text-2xl text-gray-400'></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum Ada Pesan</h3>
                <p class="text-gray-600">Belum ada pesan yang masuk dari form hubungi kami.</p>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengirim</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subjek</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach($messages as $message): ?>
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center flex-shrink-0">
                                            <i class='bx bx-user text-primary text-sm'></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($message->name); ?></div>
                                            <div class="text-sm text-gray-500"><?php echo htmlspecialchars($message->email); ?></div>
                                            <?php if($message->phone): ?>
                                                <div class="text-sm text-gray-500"><?php echo htmlspecialchars($message->phone); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-xs truncate"><?php echo htmlspecialchars($message->subject); ?></div>
                                </td>
                                <td class="px-6 py-4">
                                    <?php
                                    $status_colors = [
                                        'new' => 'bg-red-100 text-red-800',
                                        'read' => 'bg-yellow-100 text-yellow-800',
                                        'replied' => 'bg-green-100 text-green-800'
                                    ];
                                    $status_labels = [
                                        'new' => 'Baru',
                                        'read' => 'Dibaca',
                                        'replied' => 'Dibalas'
                                    ];
                                    ?>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo $status_colors[$message->status]; ?>">
                                        <?php echo $status_labels[$message->status]; ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <?php echo date('d M Y, H:i', strtotime($message->created_at)); ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <a href="<?php echo base_url('admin/contact/view/' . $message->id); ?>" 
                                           class="inline-flex items-center px-3 py-1.5 bg-primary text-white text-xs font-medium rounded-lg hover:bg-primary-700 transition-colors duration-200">
                                            <i class='bx bx-show mr-1'></i>
                                            Lihat
                                        </a>
                                        
                                        <!-- Status Update Icons -->
                                        <div class="flex items-center space-x-1">
                                            <form method="POST" action="<?php echo base_url('admin/contact/update_status/' . $message->id); ?>" class="inline">
                                                <button type="submit" name="status" value="new" 
                                                        class="inline-flex items-center p-1.5 <?php echo ($message->status === 'new') ? 'bg-red-100 text-red-700' : 'text-gray-400 hover:text-red-600'; ?> rounded-lg transition-colors duration-200"
                                                        title="Set as Baru">
                                                    <i class='bx bx-circle text-sm'></i>
                                                </button>
                                            </form>
                                            
                                            <form method="POST" action="<?php echo base_url('admin/contact/update_status/' . $message->id); ?>" class="inline">
                                                <button type="submit" name="status" value="read" 
                                                        class="inline-flex items-center p-1.5 <?php echo ($message->status === 'read') ? 'bg-yellow-100 text-yellow-700' : 'text-gray-400 hover:text-yellow-600'; ?> rounded-lg transition-colors duration-200"
                                                        title="Set as Dibaca">
                                                    <i class='bx bx-check-circle text-sm'></i>
                                                </button>
                                            </form>
                                            
                                            <form method="POST" action="<?php echo base_url('admin/contact/update_status/' . $message->id); ?>" class="inline">
                                                <button type="submit" name="status" value="replied" 
                                                        class="inline-flex items-center p-1.5 <?php echo ($message->status === 'replied') ? 'bg-green-100 text-green-700' : 'text-gray-400 hover:text-green-600'; ?> rounded-lg transition-colors duration-200"
                                                        title="Set as Dibalas">
                                                    <i class='bx bx-check-double text-sm'></i>
                                                </button>
                                            </form>
                                        </div>
                                        
                                        <a href="<?php echo base_url('admin/contact/delete/' . $message->id); ?>" 
                                           onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')"
                                           class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 text-xs font-medium rounded-lg hover:bg-red-200 transition-colors duration-200">
                                            <i class='bx bx-trash mr-1'></i>
                                            Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if(isset($pagination) && !empty($pagination)): ?>
        <div class="flex justify-center">
            <?php echo $pagination; ?>
        </div>
    <?php endif; ?>
</div>

<script>
function filterMessages(status) {
    const url = new URL(window.location);
    if (status === 'all') {
        url.searchParams.delete('status');
    } else {
        url.searchParams.set('status', status);
    }
    window.location.href = url.toString();
}
</script>
