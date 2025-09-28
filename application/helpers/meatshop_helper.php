<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Meat Shop & Grocery Helper Functions
 */

if (!function_exists('get_product_image'))
{
    /**
     * Get product image URL
     *
     * @param string $category
     * @param string $filename
     * @return string
     */
    function get_product_image($category, $filename)
    {
        return base_url('gambar_produk/' . ucfirst($category) . '/' . $filename);
    }
}

if (!function_exists('format_price'))
{
    /**
     * Format price with currency
     *
     * @param int $price
     * @return string
     */
    function format_price($price)
    {
        return 'Rp ' . number_format($price, 0, ',', '.');
    }
}

if (!function_exists('get_category_name'))
{
    /**
     * Get category display name
     *
     * @param string $category
     * @return string
     */
    function get_category_name($category)
    {
        $categories = array(
            'daging' => 'Daging',
            'minuman' => 'Minuman',
            'seafood' => 'Seafood',
            'bumbu' => 'Bumbu',
            'roti' => 'Roti',
            'sayur_buah' => 'Sayur & Buah',
            'daging_olahan' => 'Daging Olahan',
            'susu_olahan' => 'Susu & Olahan'
        );
        
        return isset($categories[$category]) ? $categories[$category] : ucfirst($category);
    }
}

if (!function_exists('get_badge_class'))
{
    /**
     * Get badge CSS class
     *
     * @param string $type
     * @return string
     */
    function get_badge_class($type)
    {
        $badges = array(
            'new' => 'badge-new',
            'promo' => 'badge-promo',
            'bestseller' => 'badge-bestseller',
            'premium' => 'badge-premium'
        );
        
        return isset($badges[$type]) ? $badges[$type] : 'badge-new';
    }
}

if (!function_exists('is_active_page'))
{
    /**
     * Check if current page is active
     *
     * @param string $page
     * @return string
     */
    function is_active_page($page)
    {
        $CI =& get_instance();
        $current_page = $CI->router->class . '/' . $CI->router->method;
        
        if ($current_page === $page) {
            return 'active';
        }
        
        return '';
    }
}
