<!-- Universal Delete Confirmation Modal -->
<div x-show="showDeleteModal" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 scale-95"
     x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-95"
     class="fixed inset-0 z-50 overflow-y-auto"
     x-cloak
     @keydown.escape="showDeleteModal = false">
    
    <!-- Modal Backdrop -->
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="showDeleteModal = false"></div>
    
    <!-- Modal Content -->
    <div class="flex min-h-full items-center justify-center p-4">
        <div class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 transform transition-all">
            
            <!-- Modal Header -->
            <div class="px-6 py-5 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class='bx bx-trash text-red-600 text-xl'></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900" x-text="deleteItem ? deleteItem.title : 'Konfirmasi Hapus'"></h3>
                        <p class="text-sm text-gray-500">Tindakan ini tidak dapat dibatalkan</p>
                    </div>
                </div>
            </div>
            
            <!-- Modal Body -->
            <div class="px-6 py-4">
                <p class="text-gray-700 leading-relaxed" x-text="deleteItem ? deleteItem.message : 'Apakah Anda yakin ingin menghapus item ini? Semua data terkait akan dihapus secara permanen.'"></p>
                
                <!-- Additional Info -->
                <div x-show="deleteItem && deleteItem.itemName" class="mt-4 p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-2">
                        <i class='bx bx-info-circle text-blue-500'></i>
                        <span class="text-sm text-gray-600">
                            Item: <span class="font-medium" x-text="deleteItem.itemName"></span>
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Modal Footer -->
            <div class="px-6 py-4 bg-gray-50 rounded-b-2xl flex justify-end space-x-3">
                <button @click="showDeleteModal = false" 
                        class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200 font-medium">
                    <i class='bx bx-x mr-2'></i>
                    Batal
                </button>
                <button @click="
                    if (deleteItem && deleteItem.url) {
                        window.location.href = deleteItem.url;
                    } else {
                        showDeleteModal = false;
                    }
                " 
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors duration-200 font-medium flex items-center">
                    <i class='bx bx-trash mr-2'></i>
                    <span x-text="deleteItem ? deleteItem.confirmText : 'Hapus'"></span>
                </button>
            </div>
        </div>
    </div>
</div>

