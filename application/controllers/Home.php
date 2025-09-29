<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Product_model');
        $this->load->model('Promo_model');
        $this->load->model('Content_model');
    }

    public function index()
    {
        // Prevent caching
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
        
        $data['title'] = 'Meat Shop & Grocery';
        $data['page'] = 'home';
        
        // Get latest products from database
        $data['latest_products'] = $this->Product_model->get_products(4, 0, null, null, 'active');
        
        // Get active daily promos from database
        $data['daily_promos'] = $this->Promo_model->get_active_promos(4);
        
        // Get dynamic content
        $data['content'] = $this->Content_model->get_content('homepage');
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function about()
    {
        $data['title'] = 'Tentang Kami - Meat Shop & Grocery';
        $data['page'] = 'about';
        
        // Get dynamic content
        $data['content'] = $this->Content_model->get_content('about');
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/about', $data);
        $this->load->view('templates/footer', $data);
    }

    public function contact()
    {
        $data['title'] = 'Kontak - Meat Shop & Grocery';
        $data['page'] = 'contact';
        
        // Get dynamic content
        $data['content'] = $this->Content_model->get_content('contact');
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/contact', $data);
        $this->load->view('templates/footer', $data);
    }

    public function gallery()
    {
        $data['title'] = 'Galeri - Meat Shop & Grocery';
        $data['page'] = 'gallery';
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/gallery', $data);
        $this->load->view('templates/footer', $data);
    }
}
