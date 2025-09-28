<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        // Temporary: Allow direct access without authentication
        // if (!$this->session->userdata('admin_logged_in')) {
        //     redirect('admin/login');
        // }
        
        $data['title'] = 'Dashboard Admin - Meat Shop & Grocery';
        $data['page_title'] = 'Dashboard';
        $data['content'] = $this->load->view('admin/content/dashboard', '', TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function login()
    {
        // Temporary: Allow access to login page even if logged in
        // if ($this->session->userdata('admin_logged_in')) {
        //     redirect('admin');
        // }

        $data['title'] = 'Login Admin - Meat Shop & Grocery';
        $this->load->view('admin/login', $data);
    }

    public function authenticate()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Simple authentication (you can enhance this with database)
        if ($username === 'admin' && $password === 'admin123') {
            $this->session->set_userdata('admin_logged_in', TRUE);
            $this->session->set_userdata('admin_username', $username);
            redirect('admin');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('admin/login');
        }
    }

    public function products()
    {
        // Temporary: Allow direct access without authentication
        // if (!$this->session->userdata('admin_logged_in')) {
        //     redirect('admin/login');
        // }
        
        $data['title'] = 'Kelola Produk - Admin Dashboard';
        $data['page_title'] = 'Kelola Produk';
        $data['content'] = $this->load->view('admin/content/products', '', TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function add_product()
    {
        // Temporary: Allow direct access without authentication
        // if (!$this->session->userdata('admin_logged_in')) {
        //     redirect('admin/login');
        // }
        
        $data['title'] = 'Tambah Produk - Admin Dashboard';
        $data['page_title'] = 'Tambah Produk';
        $data['content'] = $this->load->view('admin/content/add_product', '', TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function edit_product($id = null)
    {
        // Temporary: Allow direct access without authentication
        // if (!$this->session->userdata('admin_logged_in')) {
        //     redirect('admin/login');
        // }
        
        $data['title'] = 'Edit Produk - Admin Dashboard';
        $data['page_title'] = 'Edit Produk';
        $data['product_id'] = $id;
        $data['content'] = $this->load->view('admin/content/edit_product', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('admin_logged_in');
        $this->session->unset_userdata('admin_username');
        $this->session->set_flashdata('success', 'Anda telah berhasil logout!');
        redirect('admin/login');
    }
}
