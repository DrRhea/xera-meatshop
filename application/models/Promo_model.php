<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all daily promos with pagination
    public function get_promos($limit = null, $offset = null, $search = null, $status = null)
    {
        $this->db->select('dp.*, p.name as product_name, p.image as product_image, p.category as product_category');
        $this->db->from('daily_promos dp');
        $this->db->join('products p', 'dp.product_id = p.id', 'left');
        
        if ($search) {
            $this->db->group_start();
            $this->db->like('dp.title', $search);
            $this->db->or_like('p.name', $search);
            $this->db->group_end();
        }
        
        if ($status && $status !== 'all') {
            $this->db->where('dp.is_active', $status);
        }
        
        $this->db->order_by('dp.sort_order', 'ASC');
        $this->db->order_by('dp.created_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        
        return $this->db->get()->result();
    }

    // Get promo by ID
    public function get_promo($id)
    {
        $this->db->select('dp.*, p.name as product_name, p.image as product_image, p.category as product_category');
        $this->db->from('daily_promos dp');
        $this->db->join('products p', 'dp.product_id = p.id', 'left');
        $this->db->where('dp.id', $id);
        return $this->db->get()->row();
    }

    // Create new promo
    public function create_promo($data)
    {
        $this->db->insert('daily_promos', $data);
        return $this->db->insert_id();
    }

    // Update promo
    public function update_promo($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('daily_promos', $data);
    }

    // Delete promo
    public function delete_promo($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('daily_promos');
    }

    // Count promos with filters
    public function count_promos($search = null, $status = null)
    {
        $this->db->from('daily_promos dp');
        $this->db->join('products p', 'dp.product_id = p.id', 'left');
        
        if ($search) {
            $this->db->group_start();
            $this->db->like('dp.title', $search);
            $this->db->or_like('p.name', $search);
            $this->db->group_end();
        }
        
        if ($status && $status !== 'all') {
            $this->db->where('dp.is_active', $status);
        }
        
        return $this->db->count_all_results();
    }

    // Check if promo exists
    public function promo_exists($id)
    {
        $this->db->where('id', $id);
        return $this->db->count_all_results('daily_promos') > 0;
    }

    // Get active promos for homepage
    public function get_active_promos($limit = 4)
    {
        $this->db->select('dp.*, p.name as product_name, p.image as product_image, p.category as product_category');
        $this->db->from('daily_promos dp');
        $this->db->join('products p', 'dp.product_id = p.id', 'left');
        $this->db->where('dp.is_active', 'active');
        $this->db->where('dp.start_date <=', date('Y-m-d'));
        $this->db->where('dp.end_date >=', date('Y-m-d'));
        $this->db->order_by('dp.sort_order', 'ASC');
        $this->db->order_by('dp.created_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit);
        }
        
        return $this->db->get()->result();
    }

    // Get all products for promo selection
    public function get_products_for_promo()
    {
        $this->db->select('id, name, price, category, image');
        $this->db->from('products');
        $this->db->where('status', 'active');
        $this->db->order_by('name', 'ASC');
        return $this->db->get()->result();
    }

    // Update promo status
    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        return $this->db->update('daily_promos', array('is_active' => $status));
    }

    // Calculate discount percentage
    public function calculate_discount_percentage($original_price, $promo_price)
    {
        if ($original_price <= 0) return 0;
        return round((($original_price - $promo_price) / $original_price) * 100);
    }
}
