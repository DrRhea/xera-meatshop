<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Keranjang Belanja - Meat Shop & Grocery';
        
        // Load latest products like in Home controller
        $this->load->model('Product_model');
        $data['latest_products'] = $this->Product_model->get_products(4, 0, null, null, 'active');
        
        $this->load->view('templates/header', $data);
        $this->load->view('cart/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
