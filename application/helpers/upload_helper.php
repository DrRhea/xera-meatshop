<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Upload Helper
 * Helper functions untuk upload file
 */

if (!function_exists('validate_image_upload')) {
    /**
     * Validasi file upload gambar
     * @param array $file $_FILES array
     * @return array
     */
    function validate_image_upload($file) {
        $result = array(
            'valid' => false,
            'error' => ''
        );
        
        if (empty($file['name'])) {
            $result['error'] = 'Tidak ada file yang dipilih';
            return $result;
        }
        
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $result['error'] = 'Error upload file: ' . $file['error'];
            return $result;
        }
        
        // Check file size (2MB max)
        if ($file['size'] > 2048 * 1024) {
            $result['error'] = 'File terlalu besar. Maksimal 2MB';
            return $result;
        }
        
        // Check file type
        $allowed_types = array('image/jpeg', 'image/jpg', 'image/png', 'image/gif');
        $file_type = mime_content_type($file['tmp_name']);
        
        if (!in_array($file_type, $allowed_types)) {
            $result['error'] = 'Tipe file tidak diizinkan. Hanya JPG, PNG, GIF yang diizinkan';
            return $result;
        }
        
        // Check file extension
        $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
        
        if (!in_array($file_ext, $allowed_ext)) {
            $result['error'] = 'Ekstensi file tidak diizinkan. Hanya .jpg, .jpeg, .png, .gif yang diizinkan';
            return $result;
        }
        
        $result['valid'] = true;
        return $result;
    }
}

if (!function_exists('get_upload_config')) {
    /**
     * Get upload configuration
     * @return array
     */
    function get_upload_config() {
        return array(
            'upload_path' => './uploads/products/',
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size' => 2048, // 2MB
            'encrypt_name' => TRUE,
            'file_ext_tolower' => TRUE,
            'overwrite' => FALSE
        );
    }
}
