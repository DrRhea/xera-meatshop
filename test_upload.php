<?php
// Test upload functionality
echo "=== TEST UPLOAD FUNCTIONALITY ===\n";

// Test 1: Cek direktori upload
echo "\n1. Checking upload directory...\n";
if (is_dir('./uploads/products/')) {
    echo "Upload directory exists\n";
    echo "Permissions: " . substr(sprintf('%o', fileperms('./uploads/products/')), -4) . "\n";
} else {
    echo "Upload directory does not exist\n";
}

// Test 2: Cek apakah bisa write ke direktori
echo "\n2. Testing write permission...\n";
$testFile = './uploads/products/test.txt';
if (file_put_contents($testFile, 'test')) {
    echo "Write permission OK\n";
    unlink($testFile);
} else {
    echo "Write permission FAILED\n";
}

// Test 3: Cek konfigurasi upload
echo "\n3. Testing upload configuration...\n";
$config = array(
    'upload_path' => './uploads/products/',
    'allowed_types' => 'gif|jpg|png|jpeg|JPG|JPEG|PNG|GIF',
    'max_size' => 2048,
    'encrypt_name' => TRUE,
    'overwrite' => FALSE,
    'remove_spaces' => TRUE
);

echo "Upload path: " . $config['upload_path'] . "\n";
echo "Allowed types: " . $config['allowed_types'] . "\n";
echo "Max size: " . $config['max_size'] . " KB\n";

echo "\n=== TEST COMPLETE ===\n";
?>
