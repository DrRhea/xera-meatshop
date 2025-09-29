<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get content by page and section
    public function get_content($page, $section = null)
    {
        $this->db->select('*');
        $this->db->from('content_settings');
        $this->db->where('page', $page);
        $this->db->where('is_active', 1);
        
        if ($section) {
            $this->db->where('section', $section);
        }
        
        $this->db->order_by('section', 'ASC');
        $this->db->order_by('content_key', 'ASC');
        
        $result = $this->db->get()->result();
        
        // Convert to associative array for easy access
        $content = array();
        foreach ($result as $row) {
            $content[$row->section][$row->content_key] = $row->content_value;
        }
        
        return $content;
    }

    // Get single content value
    public function get_content_value($page, $section, $key, $default = '')
    {
        $this->db->select('content_value');
        $this->db->from('content_settings');
        $this->db->where('page', $page);
        $this->db->where('section', $section);
        $this->db->where('content_key', $key);
        $this->db->where('is_active', 1);
        
        $result = $this->db->get()->row();
        
        return $result ? $result->content_value : $default;
    }

    // Update content value
    public function update_content($page, $section, $key, $value)
    {
        $data = array(
            'content_value' => $value,
            'updated_at' => date('Y-m-d H:i:s')
        );
        
        $this->db->where('page', $page);
        $this->db->where('section', $section);
        $this->db->where('content_key', $key);
        
        return $this->db->update('content_settings', $data);
    }

    // Insert or update content
    public function set_content($page, $section, $key, $value, $type = 'text')
    {
        // Check if content exists
        $this->db->where('page', $page);
        $this->db->where('section', $section);
        $this->db->where('content_key', $key);
        $exists = $this->db->get('content_settings')->row();
        
        if ($exists) {
            // Update existing
            $data = array(
                'content_value' => $value,
                'content_type' => $type,
                'updated_at' => date('Y-m-d H:i:s')
            );
            
            $this->db->where('page', $page);
            $this->db->where('section', $section);
            $this->db->where('content_key', $key);
            
            return $this->db->update('content_settings', $data);
        } else {
            // Insert new
            $data = array(
                'page' => $page,
                'section' => $section,
                'content_key' => $key,
                'content_value' => $value,
                'content_type' => $type,
                'is_active' => 1
            );
            
            return $this->db->insert('content_settings', $data);
        }
    }

    // Get all content for admin
    public function get_all_content($page = null)
    {
        $this->db->select('*');
        $this->db->from('content_settings');
        
        if ($page) {
            $this->db->where('page', $page);
        }
        
        $this->db->order_by('page', 'ASC');
        $this->db->order_by('section', 'ASC');
        $this->db->order_by('content_key', 'ASC');
        
        return $this->db->get()->result();
    }

    // Get content by page for admin
    public function get_content_by_page($page)
    {
        $this->db->select('*');
        $this->db->from('content_settings');
        $this->db->where('page', $page);
        $this->db->order_by('section', 'ASC');
        $this->db->order_by('content_key', 'ASC');
        
        $result = $this->db->get()->result();
        
        // Group by section
        $content = array();
        foreach ($result as $row) {
            $content[$row->section][] = $row;
        }
        
        return $content;
    }

    // Update multiple content values
    public function update_multiple_content($page, $content_data)
    {
        $this->db->trans_start();
        
        foreach ($content_data as $section => $items) {
            foreach ($items as $key => $value) {
                $this->set_content($page, $section, $key, $value);
            }
        }
        
        $this->db->trans_complete();
        
        return $this->db->trans_status();
    }

    // Get pages list
    public function get_pages()
    {
        $this->db->select('DISTINCT page');
        $this->db->from('content_settings');
        $this->db->order_by('page', 'ASC');
        
        $result = $this->db->get()->result();
        $pages = array();
        
        foreach ($result as $row) {
            $pages[] = $row->page;
        }
        
        return $pages;
    }

    // Get sections by page
    public function get_sections($page)
    {
        $this->db->select('DISTINCT section');
        $this->db->from('content_settings');
        $this->db->where('page', $page);
        $this->db->order_by('section', 'ASC');
        
        $result = $this->db->get()->result();
        $sections = array();
        
        foreach ($result as $row) {
            $sections[] = $row->section;
        }
        
        return $sections;
    }

    // Delete content
    public function delete_content($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('content_settings');
    }

    // Toggle content status
    public function toggle_content_status($id)
    {
        $this->db->select('is_active');
        $this->db->from('content_settings');
        $this->db->where('id', $id);
        $result = $this->db->get()->row();
        
        if ($result) {
            $new_status = $result->is_active ? 0 : 1;
            
            $this->db->where('id', $id);
            return $this->db->update('content_settings', array('is_active' => $new_status));
        }
        
        return false;
    }
}
