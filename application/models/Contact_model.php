<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Create new contact message
    public function create_message($data)
    {
        $this->db->insert('contact_messages', $data);
        return $this->db->insert_id();
    }

    // Get all messages with pagination
    public function get_messages($limit = null, $offset = null, $status = null)
    {
        $this->db->select('*');
        $this->db->from('contact_messages');
        
        if ($status && $status !== 'all') {
            $this->db->where('status', $status);
        }
        
        $this->db->order_by('created_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        
        return $this->db->get()->result();
    }

    // Get message by ID
    public function get_message($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('contact_messages')->row();
    }

    // Update message status
    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        return $this->db->update('contact_messages', array('status' => $status));
    }

    // Delete message
    public function delete_message($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('contact_messages');
    }

    // Count messages
    public function count_messages($status = null)
    {
        if ($status && $status !== 'all') {
            $this->db->where('status', $status);
        }
        
        return $this->db->count_all_results('contact_messages');
    }

    // Get new messages count
    public function get_new_messages_count()
    {
        $this->db->where('status', 'new');
        return $this->db->count_all_results('contact_messages');
    }

    // Check if message exists
    public function message_exists($id)
    {
        $this->db->where('id', $id);
        return $this->db->count_all_results('contact_messages') > 0;
    }
}
