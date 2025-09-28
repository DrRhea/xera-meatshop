<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Kelola Pelanggan - Meat Shop & Grocery';
        $data['page_title'] = 'Pelanggan';
        $data['content'] = $this->load->view('admin/content/customers', '', TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Pelanggan - Meat Shop & Grocery';
        $data['page_title'] = 'Tambah Pelanggan';
        $data['content'] = $this->load->view('admin/content/add_customer', '', TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function edit($id = null)
    {
        $data['title'] = 'Edit Pelanggan - Meat Shop & Grocery';
        $data['page_title'] = 'Edit Pelanggan';
        $data['customer_id'] = $id;
        $data['content'] = $this->load->view('admin/content/edit_customer', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }
}
