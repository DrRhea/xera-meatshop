<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Kelola Galeri - Meat Shop & Grocery';
        $data['page_title'] = 'Galeri';
        $data['content'] = $this->load->view('admin/content/gallery', '', TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Galeri - Meat Shop & Grocery';
        $data['page_title'] = 'Tambah Galeri';
        $data['content'] = $this->load->view('admin/content/add_gallery', '', TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function edit($id = null)
    {
        $data['title'] = 'Edit Galeri - Meat Shop & Grocery';
        $data['page_title'] = 'Edit Galeri';
        $data['gallery_id'] = $id;
        $data['content'] = $this->load->view('admin/content/edit_gallery', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }
}
