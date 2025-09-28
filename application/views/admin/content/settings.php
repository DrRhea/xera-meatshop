<!-- Settings Dashboard -->
<div class="space-y-8">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Pengaturan</h1>
            <p class="text-gray-600 mt-1">Kelola pengaturan sistem dan akun admin</p>
        </div>
    </div>

    <!-- Settings Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Edit Konten Halaman -->
        <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200 flex flex-col">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class='bx bx-edit text-blue-600 text-xl'></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Edit Konten Halaman</h3>
                    <p class="text-sm text-gray-600">Kelola konten website</p>
                </div>
            </div>
            <p class="text-gray-600 text-sm mb-4 flex-grow">
                Edit dan kelola konten halaman website seperti teks, gambar, dan informasi perusahaan.
            </p>
            <div class="mt-auto">
                <a href="<?php echo base_url('admin/settings/content'); ?>" 
                   class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                    <i class='bx bx-right-arrow-alt mr-2'></i>
                    Kelola Konten
                </a>
            </div>
        </div>

        <!-- Edit Profile -->
        <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200 flex flex-col">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <i class='bx bx-user text-green-600 text-xl'></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Edit Profile</h3>
                    <p class="text-sm text-gray-600">Kelola informasi admin</p>
                </div>
            </div>
            <p class="text-gray-600 text-sm mb-4 flex-grow">
                Ubah informasi profil admin seperti nama, email, dan data pribadi lainnya.
            </p>
            <div class="mt-auto">
                <a href="<?php echo base_url('admin/settings/profile'); ?>" 
                   class="inline-flex items-center px-4 py-2 bg-green-100 text-green-700 rounded-lg hover:bg-green-200 transition-colors duration-200">
                    <i class='bx bx-right-arrow-alt mr-2'></i>
                    Edit Profile
                </a>
            </div>
        </div>

        <!-- Ganti Password -->
        <div class="bg-white rounded-xl border border-gray-200 p-6 hover:shadow-lg transition-shadow duration-200 flex flex-col">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                    <i class='bx bx-key text-red-600 text-xl'></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Ganti Password</h3>
                    <p class="text-sm text-gray-600">Ubah password admin</p>
                </div>
            </div>
            <p class="text-gray-600 text-sm mb-4 flex-grow">
                Ubah password admin untuk menjaga keamanan akun dan sistem.
            </p>
            <div class="mt-auto">
                <a href="<?php echo base_url('admin/settings/password'); ?>" 
                   class="inline-flex items-center px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors duration-200">
                    <i class='bx bx-right-arrow-alt mr-2'></i>
                    Ganti Password
                </a>
            </div>
        </div>
    </div>


</div>