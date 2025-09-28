<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Gallery_model');
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
        $config['base_url'] = base_url('admin/gallery');
        $config['total_rows'] = $this->Gallery_model->count_gallery($search, $status);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['gallery'] = $this->Gallery_model->get_gallery($config['per_page'], $page, $search, $status);
        $data['pagination'] = $this->pagination->create_links();
        
        $data['title'] = 'Kelola Galeri - Admin Dashboard';
        $data['page_title'] = 'Kelola Galeri';
        $data['search'] = $search;
        $data['status'] = $status;
        $data['content'] = $this->load->view('admin/content/gallery', $data, TRUE);
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
            $this->form_validation->set_rules('title', 'Judul', 'required|trim');
            $this->form_validation->set_rules('description', 'Deskripsi', 'trim');
            
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('admin/gallery/add');
                return;
            }
            
            // Handle form submission
            $gallery_data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status') ?: 'active'
            );
            
            // Check if file is uploaded
            if (!empty($_FILES['gallery_image']['name'])) {
                $file = $_FILES['gallery_image'];
                $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
                
                // Validate file extension
                if (!in_array($file_extension, $allowed_extensions)) {
                    $this->session->set_flashdata('error', 'File type tidak didukung. Hanya JPG, PNG, GIF yang diizinkan.');
                    redirect('admin/gallery/add');
                    return;
                }
                
                // Validate file size (5MB max)
                if ($file['size'] > 5120 * 1024) {
                    $this->session->set_flashdata('error', 'File terlalu besar. Maksimal 5MB.');
                    redirect('admin/gallery/add');
                    return;
                }
                
                // Create upload directory if not exists
                $upload_path = './uploads/gallery/';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0755, TRUE);
                }
                
                // Generate unique filename
                $new_filename = uniqid() . '_' . time() . '.' . $file_extension;
                $destination = $upload_path . $new_filename;
                
                // Move uploaded file
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    $gallery_data['image'] = 'uploads/gallery/' . $new_filename;
                    log_message('debug', 'Gallery upload successful: ' . $new_filename);
                } else {
                    $this->session->set_flashdata('error', 'Gagal menyimpan file.');
                    redirect('admin/gallery/add');
                    return;
                }
            }
            
            if ($this->Gallery_model->create_gallery($gallery_data)) {
                $this->session->set_flashdata('success', 'Galeri berhasil ditambahkan!');
                redirect('admin/gallery');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan galeri!');
                redirect('admin/gallery/add');
                return;
            }
        }
        
        $data['title'] = 'Tambah Galeri - Admin Dashboard';
        $data['page_title'] = 'Tambah Galeri';
        $data['content'] = $this->load->view('admin/content/add_gallery', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function edit($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        if (!$id || !$this->Gallery_model->gallery_exists($id)) {
            $this->session->set_flashdata('error', 'Galeri tidak ditemukan!');
            redirect('admin/gallery');
        }
        
        if ($this->input->method() === 'post') {
            // Validate required fields
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Judul', 'required|trim');
            $this->form_validation->set_rules('description', 'Deskripsi', 'trim');
            
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('admin/gallery/edit/' . $id);
                return;
            }
            
            // Handle form submission
            $gallery_data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status') ?: 'active'
            );
            
            // Check if file is uploaded
            if (!empty($_FILES['gallery_image']['name'])) {
                $file = $_FILES['gallery_image'];
                $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
                
                // Validate file extension
                if (!in_array($file_extension, $allowed_extensions)) {
                    $this->session->set_flashdata('error', 'File type tidak didukung. Hanya JPG, PNG, GIF yang diizinkan.');
                    redirect('admin/gallery/edit/' . $id);
                    return;
                }
                
                // Validate file size (5MB max)
                if ($file['size'] > 5120 * 1024) {
                    $this->session->set_flashdata('error', 'File terlalu besar. Maksimal 5MB.');
                    redirect('admin/gallery/edit/' . $id);
                    return;
                }
                
                // Create upload directory if not exists
                $upload_path = './uploads/gallery/';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0755, TRUE);
                }
                
                // Generate unique filename
                $new_filename = uniqid() . '_' . time() . '.' . $file_extension;
                $destination = $upload_path . $new_filename;
                
                // Move uploaded file
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    $gallery_data['image'] = 'uploads/gallery/' . $new_filename;
                    log_message('debug', 'Gallery upload successful: ' . $new_filename);
                } else {
                    $this->session->set_flashdata('error', 'Gagal menyimpan file.');
                    redirect('admin/gallery/edit/' . $id);
                    return;
                }
            }
            
            if ($this->Gallery_model->update_gallery($id, $gallery_data)) {
                $this->session->set_flashdata('success', 'Galeri berhasil diperbarui!');
                redirect('admin/gallery');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui galeri!');
                redirect('admin/gallery/edit/' . $id);
                return;
            }
        }
        
        $data['title'] = 'Edit Galeri - Admin Dashboard';
        $data['page_title'] = 'Edit Galeri';
        $data['gallery_item'] = $this->Gallery_model->get_gallery_item($id);
        $data['content'] = $this->load->view('admin/content/edit_gallery', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function delete($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        if (!$id || !$this->Gallery_model->gallery_exists($id)) {
            $this->session->set_flashdata('error', 'Galeri tidak ditemukan!');
            redirect('admin/gallery');
        }
        
        if ($this->Gallery_model->delete_gallery($id)) {
            $this->session->set_flashdata('success', 'Galeri berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus galeri!');
        }
        
        redirect('admin/gallery');
    }

    // Public gallery page
    public function public_gallery()
    {
        $data['gallery'] = $this->Gallery_model->get_public_gallery();
        $data['title'] = 'Galeri - Meat Shop & Grocery';
        
        $this->load->view('templates/header', $data);
        $this->load->view('gallery/index', $data);
        $this->load->view('templates/footer');
    }
}