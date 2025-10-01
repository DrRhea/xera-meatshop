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
        // Check if admin is logged in
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        
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
        // Check if admin is logged in
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        
        if ($this->input->method() === 'post') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('current_password', 'Password Lama', 'required');
            $this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[new_password]');
            
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('settings/password');
                return;
            }
            
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            
            // Get current user
            $this->load->database();
            $this->db->where('username', $this->session->userdata('admin_username'));
            $user = $this->db->get('admin_users')->row();
            
            if ($user && password_verify($current_password, $user->password)) {
                // Update password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->where('id', $user->id);
                if ($this->db->update('admin_users', array('password' => $hashed_password))) {
                    $this->session->set_flashdata('success', 'Password berhasil diubah!');
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengubah password!');
                }
            } else {
                $this->session->set_flashdata('error', 'Password lama tidak benar!');
            }
            
            redirect('settings/password');
        }
        
        $data['title'] = 'Ganti Password - Meat Shop & Grocery';
        $data['page_title'] = 'Ganti Password';
        $data['content'] = $this->load->view('admin/content/change_password', '', TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function edit_profile()
    {
        // Check if admin is logged in
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        
        if ($this->input->method() === 'post') {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('full_name', 'Nama Lengkap', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('settings/profile');
                return;
            }
            
            $profile_data = array(
                'full_name' => $this->input->post('full_name'),
                'email' => $this->input->post('email')
            );
            
            $this->load->database();
            $this->db->where('username', $this->session->userdata('admin_username'));
            if ($this->db->update('admin_users', $profile_data)) {
                $this->session->set_flashdata('success', 'Profile berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui profile!');
            }
            
            redirect('settings/profile');
        }
        
        // Get current user data
        $this->load->database();
        $this->db->where('username', $this->session->userdata('admin_username'));
        $data['user'] = $this->db->get('admin_users')->row();
        
        $data['title'] = 'Edit Profile - Meat Shop & Grocery';
        $data['page_title'] = 'Edit Profile';
        $data['content'] = $this->load->view('admin/content/edit_profile', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function system()
    {
        // Check if admin is logged in
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        
        $data['title'] = 'Pengaturan Sistem - Meat Shop & Grocery';
        $data['page_title'] = 'Pengaturan Sistem';
        $data['content'] = $this->load->view('admin/content/system_settings', '', TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function backup()
    {
        // Check if admin is logged in
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        
        $data['title'] = 'Backup Database - Meat Shop & Grocery';
        $data['page_title'] = 'Backup Database';
        $data['content'] = $this->load->view('admin/content/backup', '', TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function logs()
    {
        // Check if admin is logged in
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
        
        $data['title'] = 'Log Sistem - Meat Shop & Grocery';
        $data['page_title'] = 'Log Sistem';
        $data['content'] = $this->load->view('admin/content/logs', '', TRUE);
        $this->load->view('admin/layout', $data);
    }
}
