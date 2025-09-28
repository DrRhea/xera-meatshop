<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all products with pagination
    public function get_products($limit = null, $offset = null, $search = null, $category = null, $status = null)
    {
        $this->db->select('*');
        $this->db->from('products');
        
        if ($search) {
            $this->db->like('name', $search);
        }
        
        if ($category && $category !== 'all') {
            $this->db->where('category', $category);
        }
        
        if ($status && $status !== 'all') {
            $this->db->where('status', $status);
        }
        
        $this->db->order_by('created_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        
        return $this->db->get()->result();
    }

    // Get product by ID
    public function get_product($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('products')->row();
    }

    // Create new product
    public function create_product($data)
    {
        $this->db->insert('products', $data);
        return $this->db->insert_id();
    }

    // Update product
    public function update_product($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    // Delete product
    public function delete_product($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }

    // Get total products count
    public function get_total_products($search = null, $category = null)
    {
        if ($search) {
            $this->db->like('name', $search);
        }
        
        if ($category && $category !== 'all') {
            $this->db->where('category', $category);
        }
        
        return $this->db->count_all_results('products');
    }

    // Count products with filters
    public function count_products($search = null, $category = null, $status = null)
    {
        if ($search) {
            $this->db->like('name', $search);
        }
        
        if ($category && $category !== 'all') {
            $this->db->where('category', $category);
        }
        
        if ($status && $status !== 'all') {
            $this->db->where('status', $status);
        }
        
        return $this->db->count_all_results('products');
    }

    // Get categories
    public function get_categories()
    {
        $this->db->select('category');
        $this->db->distinct();
        $this->db->from('products');
        $this->db->where('category IS NOT NULL');
        $this->db->where('category !=', '');
        $this->db->order_by('category', 'ASC');
        
        $result = $this->db->get()->result();
        $categories = array();
        foreach ($result as $row) {
            $categories[] = $row->category;
        }
        
        return $categories;
    }

    // Check if product exists
    public function product_exists($id)
    {
        $this->db->where('id', $id);
        return $this->db->count_all_results('products') > 0;
    }

    // Get products by status
    public function get_products_by_status($status = 'active')
    {
        $this->db->where('status', $status);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('products')->result();
    }

    // Update product status
    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        return $this->db->update('products', array('status' => $status));
    }
}
