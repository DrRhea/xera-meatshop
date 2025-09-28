<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all gallery items with pagination
    public function get_gallery($limit = null, $offset = null, $search = null, $status = null)
    {
        $this->db->select('*');
        $this->db->from('gallery');
        
        if ($search) {
            $this->db->like('title', $search);
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

    // Get gallery item by ID
    public function get_gallery_item($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('gallery')->row();
    }

    // Create new gallery item
    public function create_gallery($data)
    {
        $this->db->insert('gallery', $data);
        return $this->db->insert_id();
    }

    // Update gallery item
    public function update_gallery($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('gallery', $data);
    }

    // Delete gallery item
    public function delete_gallery($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('gallery');
    }

    // Count gallery items with filters
    public function count_gallery($search = null, $status = null)
    {
        if ($search) {
            $this->db->like('title', $search);
        }
        
        
        if ($status && $status !== 'all') {
            $this->db->where('status', $status);
        }
        
        return $this->db->count_all_results('gallery');
    }


    // Check if gallery item exists
    public function gallery_exists($id)
    {
        $this->db->where('id', $id);
        return $this->db->count_all_results('gallery') > 0;
    }

    // Get public gallery (active items only)
    public function get_public_gallery()
    {
        $this->db->where('status', 'active');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('gallery')->result();
    }

    // Get gallery items by status
    public function get_gallery_by_status($status = 'active')
    {
        $this->db->where('status', $status);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('gallery')->result();
    }

    // Update gallery status
    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        return $this->db->update('gallery', array('status' => $status));
    }
}
