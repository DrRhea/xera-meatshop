<!-- View Message Detail -->
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detail Pesan</h1>
            <p class="text-gray-600 mt-1">Lihat detail pesan dari <?php echo htmlspecialchars($message->name); ?></p>
        </div>
        
        <div class="flex items-center space-x-3">
            <a href="<?php echo base_url('admin/contact'); ?>" 
               class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                <i class='bx bx-arrow-back mr-2'></i>
                Kembali
            </a>
            
            <a href="mailto:<?php echo htmlspecialchars($message->email); ?>?subject=Re: <?php echo htmlspecialchars($message->subject); ?>" 
               class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                <i class='bx bx-reply mr-2'></i>
                Balas Email
            </a>
        </div>
    </div>

    <!-- Message Detail -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <!-- Message Header -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                        <i class='bx bx-user text-primary text-lg'></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900"><?php echo htmlspecialchars($message->name); ?></h2>
                        <p class="text-sm text-gray-600"><?php echo htmlspecialchars($message->email); ?></p>
                        <?php if($message->phone): ?>
                            <p class="text-sm text-gray-600"><?php echo htmlspecialchars($message->phone); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="text-right">
                    <div class="text-sm text-gray-500">
                        <?php echo date('d M Y, H:i', strtotime($message->created_at)); ?>
                    </div>
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
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo $status_colors[$message->status]; ?> mt-1">
                        <?php echo $status_labels[$message->status]; ?>
                    </span>
                </div>
            </div>
        </div>
        
        <!-- Message Content -->
        <div class="p-6">
            <div class="space-y-6">
                <!-- Subject -->
                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Subjek</h3>
                    <p class="text-lg text-gray-900"><?php echo htmlspecialchars($message->subject); ?></p>
                </div>
                
                <!-- Message -->
                <div>
                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-2">Pesan</h3>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-900 leading-relaxed whitespace-pre-wrap"><?php echo htmlspecialchars($message->message); ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Actions -->
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <!-- Status Update Icons -->
                    <div class="flex items-center space-x-2">
                        <span class="text-sm font-medium text-gray-700">Status:</span>
                        <div class="flex items-center space-x-1">
                            <form method="POST" action="<?php echo base_url('admin/contact/update_status/' . $message->id); ?>" class="inline">
                                <button type="submit" name="status" value="new" 
                                        class="inline-flex items-center p-2 <?php echo ($message->status === 'new') ? 'bg-red-100 text-red-700' : 'text-gray-400 hover:text-red-600'; ?> rounded-lg transition-colors duration-200"
                                        title="Set as Baru">
                                    <i class='bx bx-circle text-sm'></i>
                                </button>
                            </form>
                            
                            <form method="POST" action="<?php echo base_url('admin/contact/update_status/' . $message->id); ?>" class="inline">
                                <button type="submit" name="status" value="read" 
                                        class="inline-flex items-center p-2 <?php echo ($message->status === 'read') ? 'bg-yellow-100 text-yellow-700' : 'text-gray-400 hover:text-yellow-600'; ?> rounded-lg transition-colors duration-200"
                                        title="Set as Dibaca">
                                    <i class='bx bx-check-circle text-sm'></i>
                                </button>
                            </form>
                            
                            <form method="POST" action="<?php echo base_url('admin/contact/update_status/' . $message->id); ?>" class="inline">
                                <button type="submit" name="status" value="replied" 
                                        class="inline-flex items-center p-2 <?php echo ($message->status === 'replied') ? 'bg-green-100 text-green-700' : 'text-gray-400 hover:text-green-600'; ?> rounded-lg transition-colors duration-200"
                                        title="Set as Dibalas">
                                    <i class='bx bx-check-double text-sm'></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center space-x-3">
                    <!-- Delete Button -->
                    <a href="<?php echo base_url('admin/contact/delete/' . $message->id); ?>" 
                       onclick="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')"
                       class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors duration-200">
                        <i class='bx bx-trash mr-2'></i>
                        Hapus
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
