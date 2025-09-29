<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Content_model');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Pengaturan - Meat Shop & Grocery';
        $data['page_title'] = 'Pengaturan';
        $data['content'] = $this->load->view('admin/content/settings', '', TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function content()
    {
        // Check if admin is logged in
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        
        $data['title'] = 'Edit Konten Halaman - Meat Shop & Grocery';
        $data['page_title'] = 'Edit Konten';
        
        // Get all content for editing
        $data['homepage_content'] = $this->Content_model->get_content('homepage');
        $data['about_content'] = $this->Content_model->get_content('about');
        $data['contact_content'] = $this->Content_model->get_content('contact');
        
        $data['content'] = $this->load->view('admin/content/edit_content', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }
    
    public function update_content()
    {
        // Check if admin is logged in
        if (!$this->session->userdata('admin_logged_in')) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'error', 'message' => 'Unauthorized access!')));
            return;
        }
        
        if ($this->input->method() === 'post') {
            $page = $this->input->post('page');
            $content_data = array();
            
            // Debug logging
            log_message('debug', 'Update content - Page: ' . $page);
            log_message('debug', 'POST data: ' . print_r($_POST, true));
            
            // Process form data
            foreach ($_POST as $key => $value) {
                if (strpos($key, 'content[') === 0) {
                    // Parse content[section][key] format
                    preg_match('/content\[([^\]]+)\]\[([^\]]+)\]/', $key, $matches);
                    if (count($matches) === 3) {
                        $section = $matches[1];
                        $content_key = $matches[2];
                        $content_data[$section][$content_key] = $value;
                    }
                }
            }
            
            log_message('debug', 'Processed content data: ' . print_r($content_data, true));
            
            try {
                if ($this->Content_model->update_multiple_content($page, $content_data)) {
                    log_message('debug', 'Content updated successfully');
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(array('status' => 'success', 'message' => 'Konten berhasil diperbarui!')));
                } else {
                    log_message('error', 'Failed to update content');
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(array('status' => 'error', 'message' => 'Gagal memperbarui konten!')));
                }
            } catch (Exception $e) {
                log_message('error', 'Exception in update_content: ' . $e->getMessage());
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('status' => 'error', 'message' => 'Terjadi kesalahan: ' . $e->getMessage())));
            }
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'error', 'message' => 'Invalid request method!')));
        }
    }

    public function profile()
    {
        $data['title'] = 'Edit Profile - Meat Shop & Grocery';
        $data['page_title'] = 'Edit Profile';
        $data['content'] = $this->load->view('admin/content/edit_profile', '', TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function password()
    {
        $data['title'] = 'Ganti Password - Meat Shop & Grocery';
        $data['page_title'] = 'Ganti Password';
        $data['content'] = $this->load->view('admin/content/change_password', '', TRUE);
        $this->load->view('admin/layout', $data);
    }
}
