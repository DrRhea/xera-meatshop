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
        $this->load->view('admin/dashboard', $data);
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

    public function logout()
    {
        $this->session->unset_userdata('admin_logged_in');
        $this->session->unset_userdata('admin_username');
        $this->session->set_flashdata('success', 'Anda telah berhasil logout!');
        redirect('admin/login');
    }
}
