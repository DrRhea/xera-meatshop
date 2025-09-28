<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Contact_model');
    }

    // Public contact form submission
    public function submit()
    {
        if ($this->input->method() === 'post') {
            // Validate required fields
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Nama', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
            $this->form_validation->set_rules('subject', 'Subjek', 'required|trim');
            $this->form_validation->set_rules('message', 'Pesan', 'required|trim');
            
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('#'); // Stay on same page
                return;
            }
            
            // Handle form submission
            $contact_data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
                'status' => 'new'
            );
            
            if ($this->Contact_model->create_message($contact_data)) {
                $this->session->set_flashdata('success', 'Pesan berhasil dikirim! Terima kasih telah menghubungi kami.');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengirim pesan. Silakan coba lagi.');
            }
        }
        
        redirect('#'); // Stay on same page
    }

    // Admin contact messages management
    public function admin_messages()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }

        // Get status filter
        $status = $this->input->get('status') ?: null;
        
        // Pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/contact');
        $config['total_rows'] = $this->Contact_model->count_messages($status);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['messages'] = $this->Contact_model->get_messages($config['per_page'], $page, $status);
        $data['pagination'] = $this->pagination->create_links();
        
        $data['title'] = 'Pesan Kontak - Admin Dashboard';
        $data['page_title'] = 'Pesan Kontak';
        $data['status'] = $status;
        $data['content'] = $this->load->view('admin/content/contact_messages', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    // View specific message
    public function view_message($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        if (!$id || !$this->Contact_model->message_exists($id)) {
            $this->session->set_flashdata('error', 'Pesan tidak ditemukan!');
            redirect('admin/contact');
        }
        
        // Mark as read
        $this->Contact_model->update_status($id, 'read');
        
        $data['title'] = 'Detail Pesan - Admin Dashboard';
        $data['page_title'] = 'Detail Pesan';
        $data['message'] = $this->Contact_model->get_message($id);
        $data['content'] = $this->load->view('admin/content/view_message', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    // Update message status
    public function update_status($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        if (!$id || !$this->Contact_model->message_exists($id)) {
            $this->session->set_flashdata('error', 'Pesan tidak ditemukan!');
            redirect('admin/contact');
        }
        
        $status = $this->input->post('status');
        
        if ($this->Contact_model->update_status($id, $status)) {
            $this->session->set_flashdata('success', 'Status pesan berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status pesan!');
        }
        
        redirect('admin/contact');
    }

    // Delete message
    public function delete_message($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        if (!$id || !$this->Contact_model->message_exists($id)) {
            $this->session->set_flashdata('error', 'Pesan tidak ditemukan!');
            redirect('admin/contact');
        }
        
        if ($this->Contact_model->delete_message($id)) {
            $this->session->set_flashdata('success', 'Pesan berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus pesan!');
        }
        
        redirect('admin/contact');
    }
}
