<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-text">Ganti Password</h1>
            <p class="text-muted mt-1">Ubah password untuk keamanan akun</p>
        </div>
        <a href="<?php echo base_url('admin/settings'); ?>" 
           class="bg-surface text-text px-4 py-2 rounded-lg hover:bg-border transition-colors duration-200 flex items-center">
            <i class='bx bx-arrow-back mr-2'></i>
            Kembali
        </a>
    </div>

    <!-- Security Notice -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
        <div class="flex items-start">
            <i class='bx bx-info-circle text-blue-500 text-xl mr-3 mt-0.5'></i>
            <div>
                <h3 class="text-sm font-medium text-blue-800 mb-1">Tips Keamanan Password</h3>
                <ul class="text-sm text-blue-700 space-y-1">
                    <li>• Gunakan minimal 8 karakter</li>
                    <li>• Kombinasikan huruf besar, huruf kecil, angka, dan simbol</li>
                    <li>• Hindari menggunakan informasi pribadi</li>
                    <li>• Jangan gunakan password yang sama dengan akun lain</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form class="space-y-6">
        <div class="bg-card border border-border rounded-lg p-6">
            <!-- Current Password -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-text mb-2">
                    Password Saat Ini <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="password" 
                           id="current_password"
                           class="w-full px-3 py-2 pr-10 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                           placeholder="Masukkan password saat ini"
                           required>
                    <button type="button" 
                            onclick="togglePassword('current_password')"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-muted hover:text-text transition-colors duration-200">
                        <i class='bx bx-show text-lg'></i>
                    </button>
                </div>
            </div>

            <!-- New Password -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-text mb-2">
                    Password Baru <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="password" 
                           id="new_password"
                           class="w-full px-3 py-2 pr-10 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                           placeholder="Masukkan password baru"
                           required>
                    <button type="button" 
                            onclick="togglePassword('new_password')"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-muted hover:text-text transition-colors duration-200">
                        <i class='bx bx-show text-lg'></i>
                    </button>
                </div>
                <!-- Password Strength Indicator -->
                <div class="mt-2">
                    <div class="flex space-x-1">
                        <div class="h-1 w-full bg-gray-200 rounded"></div>
                        <div class="h-1 w-full bg-gray-200 rounded"></div>
                        <div class="h-1 w-full bg-gray-200 rounded"></div>
                        <div class="h-1 w-full bg-gray-200 rounded"></div>
                    </div>
                    <p class="text-xs text-muted mt-1">Kekuatan password: <span id="password_strength">Lemah</span></p>
                </div>
            </div>

            <!-- Confirm New Password -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-text mb-2">
                    Konfirmasi Password Baru <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="password" 
                           id="confirm_password"
                           class="w-full px-3 py-2 pr-10 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                           placeholder="Konfirmasi password baru"
                           required>
                    <button type="button" 
                            onclick="togglePassword('confirm_password')"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-muted hover:text-text transition-colors duration-200">
                        <i class='bx bx-show text-lg'></i>
                    </button>
                </div>
                <div id="password_match" class="mt-1 text-sm hidden">
                    <i class='bx bx-check-circle text-green-500 mr-1'></i>
                    <span class="text-green-600">Password cocok</span>
                </div>
                <div id="password_mismatch" class="mt-1 text-sm hidden">
                    <i class='bx bx-x-circle text-red-500 mr-1'></i>
                    <span class="text-red-600">Password tidak cocok</span>
                </div>
            </div>

            <!-- Password Requirements -->
            <div class="bg-surface rounded-lg p-4">
                <h4 class="font-medium text-text mb-3">Persyaratan Password:</h4>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-center">
                        <i class='bx bx-check text-green-500 mr-2' id="req_length"></i>
                        <span class="text-muted">Minimal 8 karakter</span>
                    </li>
                    <li class="flex items-center">
                        <i class='bx bx-check text-green-500 mr-2' id="req_uppercase"></i>
                        <span class="text-muted">Mengandung huruf besar (A-Z)</span>
                    </li>
                    <li class="flex items-center">
                        <i class='bx bx-check text-green-500 mr-2' id="req_lowercase"></i>
                        <span class="text-muted">Mengandung huruf kecil (a-z)</span>
                    </li>
                    <li class="flex items-center">
                        <i class='bx bx-check text-green-500 mr-2' id="req_number"></i>
                        <span class="text-muted">Mengandung angka (0-9)</span>
                    </li>
                    <li class="flex items-center">
                        <i class='bx bx-check text-green-500 mr-2' id="req_symbol"></i>
                        <span class="text-muted">Mengandung simbol (!@#$%^&*)</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-4">
            <a href="<?php echo base_url('admin/settings'); ?>" 
               class="bg-surface text-text px-6 py-3 rounded-lg hover:bg-border transition-colors duration-200">
                Batal
            </a>
            <button type="submit" 
                    class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary-700 transition-colors duration-200">
                <i class='bx bx-lock mr-2'></i>
                Ganti Password
            </button>
        </div>
    </form>
</div>

<script>
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const button = input.nextElementSibling;
    const icon = button.querySelector('i');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bx-show');
        icon.classList.add('bx-hide');
    } else {
        input.type = 'password';
        icon.classList.remove('bx-hide');
        icon.classList.add('bx-show');
    }
}

// Password strength checker
document.getElementById('new_password').addEventListener('input', function() {
    const password = this.value;
    const strengthBars = document.querySelectorAll('.bg-gray-200');
    const strengthText = document.getElementById('password_strength');
    
    let strength = 0;
    if (password.length >= 8) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[a-z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;
    
    // Update strength bars
    strengthBars.forEach((bar, index) => {
        if (index < strength) {
            bar.classList.remove('bg-gray-200');
            bar.classList.add('bg-green-500');
        } else {
            bar.classList.remove('bg-green-500');
            bar.classList.add('bg-gray-200');
        }
    });
    
    // Update strength text
    if (strength < 2) {
        strengthText.textContent = 'Lemah';
        strengthText.className = 'text-red-600';
    } else if (strength < 4) {
        strengthText.textContent = 'Sedang';
        strengthText.className = 'text-yellow-600';
    } else {
        strengthText.textContent = 'Kuat';
        strengthText.className = 'text-green-600';
    }
});

// Password match checker
document.getElementById('confirm_password').addEventListener('input', function() {
    const newPassword = document.getElementById('new_password').value;
    const confirmPassword = this.value;
    const matchDiv = document.getElementById('password_match');
    const mismatchDiv = document.getElementById('password_mismatch');
    
    if (confirmPassword === '') {
        matchDiv.classList.add('hidden');
        mismatchDiv.classList.add('hidden');
    } else if (newPassword === confirmPassword) {
        matchDiv.classList.remove('hidden');
        mismatchDiv.classList.add('hidden');
    } else {
        matchDiv.classList.add('hidden');
        mismatchDiv.classList.remove('hidden');
    }
});
</script>
