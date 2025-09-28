<!-- Change Password -->
<div class="space-y-8">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Ganti Password</h1>
            <p class="text-gray-600 mt-1">Ubah password admin untuk keamanan akun</p>
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

    <!-- Change Password Form -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="p-6">
            <form action="<?php echo base_url('admin/change_password'); ?>" method="POST" class="space-y-6">
                <!-- Current Password -->
                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">
                        Password Lama
                    </label>
                    <div class="relative">
                        <input type="password" 
                               id="current_password" 
                               name="current_password" 
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors duration-200"
                               placeholder="Masukkan password lama">
                        <button type="button" 
                                onclick="togglePassword('current_password')"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                            <i class='bx bx-hide text-xl' id="current_password_icon"></i>
                        </button>
                    </div>
                </div>

                <!-- New Password -->
                <div>
                    <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">
                        Password Baru
                    </label>
                    <div class="relative">
                        <input type="password" 
                               id="new_password" 
                               name="new_password" 
                               required
                               minlength="6"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors duration-200"
                               placeholder="Masukkan password baru (minimal 6 karakter)">
                        <button type="button" 
                                onclick="togglePassword('new_password')"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                            <i class='bx bx-hide text-xl' id="new_password_icon"></i>
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Password harus minimal 6 karakter</p>
                </div>

                <!-- Confirm New Password -->
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-2">
                        Konfirmasi Password Baru
                    </label>
                    <div class="relative">
                        <input type="password" 
                               id="confirm_password" 
                               name="confirm_password" 
                               required
                               minlength="6"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors duration-200"
                               placeholder="Konfirmasi password baru">
                        <button type="button" 
                                onclick="togglePassword('confirm_password')"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                            <i class='bx bx-hide text-xl' id="confirm_password_icon"></i>
                        </button>
                    </div>
                </div>

                <!-- Password Strength Indicator -->
                <div id="password_strength" class="hidden">
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="text-sm font-medium text-gray-700">Kekuatan Password:</span>
                        <div class="flex space-x-1">
                            <div class="w-2 h-2 bg-gray-300 rounded-full" id="strength_1"></div>
                            <div class="w-2 h-2 bg-gray-300 rounded-full" id="strength_2"></div>
                            <div class="w-2 h-2 bg-gray-300 rounded-full" id="strength_3"></div>
                            <div class="w-2 h-2 bg-gray-300 rounded-full" id="strength_4"></div>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500" id="strength_text">Masukkan password untuk melihat kekuatan</p>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                    <a href="<?php echo base_url('admin/settings'); ?>" 
                       class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                        Batal
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary-700 transition-colors duration-200 font-medium">
                        <i class='bx bx-key mr-2'></i>
                        Ubah Password
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Security Tips -->
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
        <h3 class="text-lg font-semibold text-blue-900 mb-4">
            <i class='bx bx-shield-check mr-2'></i>
            Tips Keamanan Password
        </h3>
        <ul class="space-y-2 text-sm text-blue-800">
            <li class="flex items-start">
                <i class='bx bx-check-circle mr-2 mt-0.5 text-blue-600'></i>
                Gunakan kombinasi huruf besar, huruf kecil, angka, dan simbol
            </li>
            <li class="flex items-start">
                <i class='bx bx-check-circle mr-2 mt-0.5 text-blue-600'></i>
                Hindari menggunakan informasi pribadi seperti nama atau tanggal lahir
            </li>
            <li class="flex items-start">
                <i class='bx bx-check-circle mr-2 mt-0.5 text-blue-600'></i>
                Jangan gunakan password yang sama untuk akun lain
            </li>
            <li class="flex items-start">
                <i class='bx bx-check-circle mr-2 mt-0.5 text-blue-600'></i>
                Ganti password secara berkala untuk keamanan maksimal
            </li>
        </ul>
    </div>
</div>

<script>
// Toggle password visibility
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(inputId + '_icon');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'bx bx-show text-xl';
    } else {
        input.type = 'password';
        icon.className = 'bx bx-hide text-xl';
    }
}

// Password strength checker
document.getElementById('new_password').addEventListener('input', function() {
    const password = this.value;
    const strengthDiv = document.getElementById('password_strength');
    const strength1 = document.getElementById('strength_1');
    const strength2 = document.getElementById('strength_2');
    const strength3 = document.getElementById('strength_3');
    const strength4 = document.getElementById('strength_4');
    const strengthText = document.getElementById('strength_text');
    
    if (password.length === 0) {
        strengthDiv.classList.add('hidden');
        return;
    }
    
    strengthDiv.classList.remove('hidden');
    
    let strength = 0;
    let strengthLabel = '';
    let strengthColor = '';
    
    // Length check
    if (password.length >= 6) strength++;
    if (password.length >= 8) strength++;
    
    // Character variety checks
    if (/[a-z]/.test(password)) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;
    
    // Reset all indicators
    [strength1, strength2, strength3, strength4].forEach(indicator => {
        indicator.className = 'w-2 h-2 bg-gray-300 rounded-full';
    });
    
    // Set strength indicators
    if (strength >= 1) {
        strength1.className = 'w-2 h-2 bg-red-500 rounded-full';
        strengthLabel = 'Lemah';
        strengthColor = 'text-red-600';
    }
    if (strength >= 2) {
        strength2.className = 'w-2 h-2 bg-yellow-500 rounded-full';
        strengthLabel = 'Cukup';
        strengthColor = 'text-yellow-600';
    }
    if (strength >= 3) {
        strength3.className = 'w-2 h-2 bg-blue-500 rounded-full';
        strengthLabel = 'Baik';
        strengthColor = 'text-blue-600';
    }
    if (strength >= 4) {
        strength4.className = 'w-2 h-2 bg-green-500 rounded-full';
        strengthLabel = 'Sangat Kuat';
        strengthColor = 'text-green-600';
    }
    
    strengthText.textContent = strengthLabel;
    strengthText.className = `text-sm ${strengthColor}`;
});

// Confirm password validation
document.getElementById('confirm_password').addEventListener('input', function() {
    const newPassword = document.getElementById('new_password').value;
    const confirmPassword = this.value;
    
    if (confirmPassword.length > 0) {
        if (newPassword === confirmPassword) {
            this.style.borderColor = '#10b981';
            this.style.borderWidth = '2px';
        } else {
            this.style.borderColor = '#ef4444';
            this.style.borderWidth = '2px';
        }
    } else {
        this.style.borderColor = '#d1d5db';
        this.style.borderWidth = '1px';
    }
});
</script>