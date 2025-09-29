<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Kelola Konten - Admin Dashboard';
        $data['pages'] = $this->Content_model->get_pages();
        
        $this->load->view('admin/layout', $data);
        $this->load->view('admin/content/index', $data);
    }

    public function page($page = 'homepage')
    {
        $data['title'] = 'Kelola Konten ' . ucfirst($page) . ' - Admin Dashboard';
        $data['page'] = $page;
        $data['content'] = $this->Content_model->get_content_by_page($page);
        $data['sections'] = $this->Content_model->get_sections($page);
        
        $this->load->view('admin/layout', $data);
        $this->load->view('admin/content/page', $data);
    }

    public function update()
    {
        if ($this->input->method() === 'post') {
            $page = $this->input->post('page');
            $content_data = $this->input->post('content');
            
            if ($this->Content_model->update_multiple_content($page, $content_data)) {
                $this->session->set_flashdata('success', 'Konten berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui konten!');
            }
            
            redirect('admin/content/page/' . $page);
        }
    }

    public function update_single()
    {
        if ($this->input->method() === 'post') {
            $page = $this->input->post('page');
            $section = $this->input->post('section');
            $key = $this->input->post('key');
            $value = $this->input->post('value');
            $type = $this->input->post('type');
            
            if ($this->Content_model->set_content($page, $section, $key, $value, $type)) {
                echo json_encode(array('status' => 'success', 'message' => 'Konten berhasil diperbarui!'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Gagal memperbarui konten!'));
            }
        }
    }

    public function toggle_status($id)
    {
        if ($this->Content_model->toggle_content_status($id)) {
            $this->session->set_flashdata('success', 'Status konten berhasil diubah!');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengubah status konten!');
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id)
    {
        if ($this->Content_model->delete_content($id)) {
            $this->session->set_flashdata('success', 'Konten berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus konten!');
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}
