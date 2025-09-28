<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Kelola Pesanan - Meat Shop & Grocery';
        $data['page_title'] = 'Pesanan';
        $data['content'] = $this->load->view('admin/content/orders', '', TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Pesanan - Meat Shop & Grocery';
        $data['page_title'] = 'Tambah Pesanan';
        $data['content'] = $this->load->view('admin/content/add_order', '', TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function edit($id = null)
    {
        $data['title'] = 'Edit Pesanan - Meat Shop & Grocery';
        $data['page_title'] = 'Edit Pesanan';
        $data['order_id'] = $id;
        $data['content'] = $this->load->view('admin/content/edit_order', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }
}
