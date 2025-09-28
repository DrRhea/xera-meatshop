<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Meat Shop & Grocery';
        $data['page'] = 'home';
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function about()
    {
        $data['title'] = 'Tentang Kami - Meat Shop & Grocery';
        $data['page'] = 'about';
        
        $this->load->view('templates/header', $data);
        $this->load->view('home/about', $data);
        $this->load->view('templates/footer', $data);
    }

    public function contact()
    {
        $data['title'] = 'Kontak - Meat Shop & Grocery';
        $data['page'] = 'contact';
        
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
