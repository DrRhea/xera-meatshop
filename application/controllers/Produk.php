<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Product_model');
    }

    public function daging()
    {
        $data['title'] = 'Produk Daging - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'daging';
        
        // Get products by category 'DAGING' from database
        $data['products'] = $this->Product_model->get_products(null, null, null, 'DAGING', 'active');
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/daging', $data);
        $this->load->view('templates/footer', $data);
    }

    public function minuman()
    {
        $data['title'] = 'Produk Minuman - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'minuman';
        
        // Get products by category 'MINUMAN' from database
        $data['products'] = $this->Product_model->get_products(null, null, null, 'MINUMAN', 'active');
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/minuman', $data);
        $this->load->view('templates/footer', $data);
    }

    public function seafood()
    {
        $data['title'] = 'Produk Seafood - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'seafood';
        
        // Get products by category 'SEAFOOD' from database
        $data['products'] = $this->Product_model->get_products(null, null, null, 'SEAFOOD', 'active');
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/seafood', $data);
        $this->load->view('templates/footer', $data);
    }

    public function bumbu()
    {
        $data['title'] = 'Produk Bumbu - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'bumbu';
        
        // Get products by category 'BUMBU' from database
        $data['products'] = $this->Product_model->get_products(null, null, null, 'BUMBU', 'active');
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/bumbu', $data);
        $this->load->view('templates/footer', $data);
    }

    public function roti()
    {
        $data['title'] = 'Produk Roti - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'roti';
        
        // Get products by category 'ROTI' from database
        $data['products'] = $this->Product_model->get_products(null, null, null, 'ROTI', 'active');
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/roti', $data);
        $this->load->view('templates/footer', $data);
    }

    public function sayur_buah()
    {
        $data['title'] = 'Produk Sayur & Buah - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'sayur_buah';
        
        // Get products by category 'SAYUR_BUAH' from database
        $data['products'] = $this->Product_model->get_products(null, null, null, 'SAYUR_BUAH', 'active');
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/sayur_buah', $data);
        $this->load->view('templates/footer', $data);
    }

    public function daging_olahan()
    {
        $data['title'] = 'Produk Daging Olahan - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'daging_olahan';
        
        // Get products by category 'DAGING_OLAHAN' from database
        $data['products'] = $this->Product_model->get_products(null, null, null, 'DAGING_OLAHAN', 'active');
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/daging_olahan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function susu_olahan()
    {
        $data['title'] = 'Produk Susu & Olahan - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'susu_olahan';
        
        // Get products by category 'SUSU_OLAHAN' from database
        $data['products'] = $this->Product_model->get_products(null, null, null, 'SUSU_OLAHAN', 'active');
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/susu_olahan', $data);
        $this->load->view('templates/footer', $data);
    }
}
