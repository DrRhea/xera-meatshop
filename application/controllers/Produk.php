<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function daging()
    {
        $data['title'] = 'Produk Daging - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'daging';
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/daging', $data);
        $this->load->view('templates/footer', $data);
    }

    public function minuman()
    {
        $data['title'] = 'Produk Minuman - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'minuman';
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/minuman', $data);
        $this->load->view('templates/footer', $data);
    }

    public function seafood()
    {
        $data['title'] = 'Produk Seafood - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'seafood';
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/seafood', $data);
        $this->load->view('templates/footer', $data);
    }

    public function bumbu()
    {
        $data['title'] = 'Produk Bumbu - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'bumbu';
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/bumbu', $data);
        $this->load->view('templates/footer', $data);
    }

    public function roti()
    {
        $data['title'] = 'Produk Roti - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'roti';
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/roti', $data);
        $this->load->view('templates/footer', $data);
    }

    public function sayur_buah()
    {
        $data['title'] = 'Produk Sayur & Buah - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'sayur_buah';
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/sayur_buah', $data);
        $this->load->view('templates/footer', $data);
    }

    public function daging_olahan()
    {
        $data['title'] = 'Produk Daging Olahan - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'daging_olahan';
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/daging_olahan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function susu_olahan()
    {
        $data['title'] = 'Produk Susu & Olahan - Meat Shop & Grocery';
        $data['page'] = 'produk';
        $data['kategori'] = 'susu_olahan';
        
        $this->load->view('templates/header', $data);
        $this->load->view('produk/susu_olahan', $data);
        $this->load->view('templates/footer', $data);
    }
}
