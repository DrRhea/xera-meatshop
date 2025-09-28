<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Promo_model');
        $this->load->model('Product_model');
    }

    public function index()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }

        // Get search and filter parameters
        $search = $this->input->get('search') ?: null;
        $status = $this->input->get('status') ?: null;
        
        // Pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/promo');
        $config['total_rows'] = $this->Promo_model->count_promos($search, $status);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['promos'] = $this->Promo_model->get_promos($config['per_page'], $page, $search, $status);
        $data['pagination'] = $this->pagination->create_links();
        
        $data['title'] = 'Kelola Promo Harian - Admin Dashboard';
        $data['page_title'] = 'Kelola Promo Harian';
        $data['search'] = $search;
        $data['status'] = $status;
        $data['content'] = $this->load->view('admin/content/promo', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function add()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        if ($this->input->method() === 'post') {
            // Validate required fields
            $this->load->library('form_validation');
            $this->form_validation->set_rules('product_id', 'Produk', 'required|trim');
            $this->form_validation->set_rules('title', 'Judul Promo', 'required|trim');
            $this->form_validation->set_rules('original_price', 'Harga Asli', 'required|trim|numeric');
            $this->form_validation->set_rules('promo_price', 'Harga Promo', 'required|trim|numeric');
            $this->form_validation->set_rules('start_date', 'Tanggal Mulai', 'required|trim');
            $this->form_validation->set_rules('end_date', 'Tanggal Berakhir', 'required|trim');
            
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('admin/promo/add');
                return;
            }
            
            // Handle form submission
            $promo_data = array(
                'product_id' => $this->input->post('product_id'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'original_price' => $this->input->post('original_price'),
                'promo_price' => $this->input->post('promo_price'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'sort_order' => $this->input->post('sort_order') ?: 0,
                'is_active' => $this->input->post('is_active') ?: 'active'
            );
            
            // Calculate discount percentage
            $promo_data['discount_percentage'] = $this->Promo_model->calculate_discount_percentage(
                $promo_data['original_price'], 
                $promo_data['promo_price']
            );
            
            if ($this->Promo_model->create_promo($promo_data)) {
                $this->session->set_flashdata('success', 'Promo berhasil ditambahkan!');
                redirect('admin/promo');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan promo!');
                redirect('admin/promo/add');
                return;
            }
        }
        
        $data['title'] = 'Tambah Promo Harian - Admin Dashboard';
        $data['page_title'] = 'Tambah Promo Harian';
        $data['products'] = $this->Promo_model->get_products_for_promo();
        $data['content'] = $this->load->view('admin/content/add_promo', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function edit($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        if (!$id || !$this->Promo_model->promo_exists($id)) {
            $this->session->set_flashdata('error', 'Promo tidak ditemukan!');
            redirect('admin/promo');
        }
        
        if ($this->input->method() === 'post') {
            // Validate required fields
            $this->load->library('form_validation');
            $this->form_validation->set_rules('product_id', 'Produk', 'required|trim');
            $this->form_validation->set_rules('title', 'Judul Promo', 'required|trim');
            $this->form_validation->set_rules('original_price', 'Harga Asli', 'required|trim|numeric');
            $this->form_validation->set_rules('promo_price', 'Harga Promo', 'required|trim|numeric');
            $this->form_validation->set_rules('start_date', 'Tanggal Mulai', 'required|trim');
            $this->form_validation->set_rules('end_date', 'Tanggal Berakhir', 'required|trim');
            
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('admin/promo/edit/' . $id);
                return;
            }
            
            // Handle form submission
            $promo_data = array(
                'product_id' => $this->input->post('product_id'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'original_price' => $this->input->post('original_price'),
                'promo_price' => $this->input->post('promo_price'),
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'sort_order' => $this->input->post('sort_order') ?: 0,
                'is_active' => $this->input->post('is_active') ?: 'active'
            );
            
            // Calculate discount percentage
            $promo_data['discount_percentage'] = $this->Promo_model->calculate_discount_percentage(
                $promo_data['original_price'], 
                $promo_data['promo_price']
            );
            
            if ($this->Promo_model->update_promo($id, $promo_data)) {
                $this->session->set_flashdata('success', 'Promo berhasil diperbarui!');
                redirect('admin/promo');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui promo!');
                redirect('admin/promo/edit/' . $id);
                return;
            }
        }
        
        $data['title'] = 'Edit Promo Harian - Admin Dashboard';
        $data['page_title'] = 'Edit Promo Harian';
        $data['promo'] = $this->Promo_model->get_promo($id);
        $data['products'] = $this->Promo_model->get_products_for_promo();
        $data['content'] = $this->load->view('admin/content/edit_promo', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function delete($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        if (!$id || !$this->Promo_model->promo_exists($id)) {
            $this->session->set_flashdata('error', 'Promo tidak ditemukan!');
            redirect('admin/promo');
        }
        
        if ($this->Promo_model->delete_promo($id)) {
            $this->session->set_flashdata('success', 'Promo berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus promo!');
        }
        
        redirect('admin/promo');
    }

    // Update promo status
    public function update_status($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        $status = $this->input->post('status');
        
        if ($this->Promo_model->update_status($id, $status)) {
            $this->session->set_flashdata('success', 'Status promo berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status promo!');
        }
        
        redirect('admin/promo');
    }
}
