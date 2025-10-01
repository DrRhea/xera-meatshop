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

if (!function_exists('format_currency'))
{
    /**
     * Format currency with Indonesian Rupiah
     *
     * @param int $amount
     * @return string
     */
    function format_currency($amount)
    {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
}

if (!function_exists('time_ago'))
{
    /**
     * Get time ago string
     *
     * @param string $datetime
     * @return string
     */
    function time_ago($datetime)
    {
        $time = time() - strtotime($datetime);
        
        if ($time < 60) return 'baru saja';
        if ($time < 3600) return floor($time/60) . ' menit lalu';
        if ($time < 86400) return floor($time/3600) . ' jam lalu';
        if ($time < 2592000) return floor($time/86400) . ' hari lalu';
        
        return date('d M Y', strtotime($datetime));
    }
}

if (!function_exists('get_status_badge'))
{
    /**
     * Get status badge class
     *
     * @param string $status
     * @return string
     */
    function get_status_badge($status)
    {
        $badges = array(
            'active' => 'bg-green-100 text-green-800',
            'inactive' => 'bg-red-100 text-red-800',
            'new' => 'bg-orange-100 text-orange-800',
            'read' => 'bg-blue-100 text-blue-800',
            'replied' => 'bg-green-100 text-green-800',
            'pending' => 'bg-yellow-100 text-yellow-800',
            'processing' => 'bg-blue-100 text-blue-800',
            'shipped' => 'bg-purple-100 text-purple-800',
            'delivered' => 'bg-green-100 text-green-800',
            'cancelled' => 'bg-red-100 text-red-800'
        );
        
        return isset($badges[$status]) ? $badges[$status] : 'bg-gray-100 text-gray-800';
    }
}