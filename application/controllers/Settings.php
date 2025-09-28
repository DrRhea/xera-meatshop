<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
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
        $data['title'] = 'Edit Konten Halaman - Meat Shop & Grocery';
        $data['page_title'] = 'Edit Konten';
        $data['content'] = $this->load->view('admin/content/edit_content', '', TRUE);
        $this->load->view('admin/layout', $data);
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
