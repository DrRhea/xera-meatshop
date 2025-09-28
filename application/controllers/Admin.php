<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Product_model');
    }

    public function index()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        $data['title'] = 'Dashboard Admin - Meat Shop & Grocery';
        $data['page_title'] = 'Dashboard';
        $data['content'] = $this->load->view('admin/content/dashboard', '', TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function login()
    {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }

        $data['title'] = 'Login Admin - Meat Shop & Grocery';
        $this->load->view('admin/login', $data);
    }

    public function authenticate()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Debug logging
        log_message('debug', 'Login attempt - Username: ' . $username);

        // Database authentication
        $this->db->where('username', $username);
        $this->db->where('status', 'active');
        $user = $this->db->get('admin_users')->row();

        if ($user) {
            // Verify password
            if (password_verify($password, $user->password)) {
                // Set session data
                $this->session->set_userdata('admin_logged_in', TRUE);
                $this->session->set_userdata('admin_username', $user->username);
                
                log_message('debug', 'Login successful for user: ' . $username);
                $this->session->set_flashdata('success', 'Selamat datang, ' . $user->username . '!');
                redirect('admin');
            } else {
                log_message('debug', 'Login failed - Invalid password for user: ' . $username);
                $this->session->set_flashdata('error', 'Password salah!');
            }
        } else {
            log_message('debug', 'Login failed - User not found: ' . $username);
            $this->session->set_flashdata('error', 'Username tidak ditemukan!');
        }

        redirect('login');
    }

    public function products()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }

        // Get search and filter parameters
        $search = $this->input->get('search') ?: null;
        $category = $this->input->get('category') ?: null;
        $status = $this->input->get('status') ?: null;
        
        // Pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/products');
        $config['total_rows'] = $this->Product_model->count_products($search, $category, $status);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['products'] = $this->Product_model->get_products($config['per_page'], $page, $search, $category, $status);
        $data['pagination'] = $this->pagination->create_links();
        
        $data['title'] = 'Kelola Produk - Admin Dashboard';
        $data['page_title'] = 'Kelola Produk';
        $data['search'] = $search;
        $data['category'] = $category;
        $data['status'] = $status;
        $data['selected_category'] = $category;
        $data['categories'] = $this->Product_model->get_categories();
        $data['content'] = $this->load->view('admin/content/products', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function add_product()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        // Get categories for the form
        $categories = $this->Product_model->get_categories();
        
        if ($this->input->method() === 'post') {
            // Validate required fields
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Nama Produk', 'required|trim');
            $this->form_validation->set_rules('category', 'Kategori', 'required');
            $this->form_validation->set_rules('price', 'Harga', 'required|numeric|greater_than[0]');
            $this->form_validation->set_rules('stock', 'Stok', 'required|numeric|greater_than_equal_to[0]');
            
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('admin/add_product');
                return;
            }
            
            // Handle form submission
            $product_data = array(
                'name' => $this->input->post('name'),
                'category' => $this->input->post('category'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock'),
                'unit' => $this->input->post('unit'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status') ?: 'active'
            );
            
            // Check if file is uploaded
            if (!empty($_FILES['product_image']['name'])) {
                $file = $_FILES['product_image'];
                $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
                
                // Validate file extension
                if (!in_array($file_extension, $allowed_extensions)) {
                    $this->session->set_flashdata('error', 'File type tidak didukung. Hanya JPG, PNG, GIF yang diizinkan.');
                    redirect('admin/add_product');
                    return;
                }
                
                // Validate file size (5MB max)
                if ($file['size'] > 5120 * 1024) {
                    $this->session->set_flashdata('error', 'File terlalu besar. Maksimal 5MB.');
                    redirect('admin/add_product');
                    return;
                }
                
                // Create upload directory if not exists
                $upload_path = './uploads/products/';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0755, TRUE);
                }
                
                // Generate unique filename
                $new_filename = uniqid() . '_' . time() . '.' . $file_extension;
                $destination = $upload_path . $new_filename;
                
                // Move uploaded file
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    $product_data['image'] = 'uploads/products/' . $new_filename;
                    log_message('debug', 'Upload successful: ' . $new_filename);
                } else {
                    $this->session->set_flashdata('error', 'Gagal menyimpan file.');
                    redirect('admin/add_product');
                    return;
                }
            }
            
            if ($this->Product_model->create_product($product_data)) {
                $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
                redirect('admin/products');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan produk!');
                redirect('admin/add_product');
                return;
            }
        }
        
        $data['title'] = 'Tambah Produk - Admin Dashboard';
        $data['page_title'] = 'Tambah Produk';
        $data['categories'] = $categories;
        $data['content'] = $this->load->view('admin/content/add_product', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function edit_product($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        if (!$id || !$this->Product_model->product_exists($id)) {
            $this->session->set_flashdata('error', 'Produk tidak ditemukan!');
            redirect('admin/products');
        }
        
        if ($this->input->method() === 'post') {
            // Validate required fields
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Nama Produk', 'required|trim');
            $this->form_validation->set_rules('category', 'Kategori', 'required');
            $this->form_validation->set_rules('price', 'Harga', 'required|numeric|greater_than[0]');
            $this->form_validation->set_rules('stock', 'Stok', 'required|numeric|greater_than_equal_to[0]');
            
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('admin/edit_product/' . $id);
                return;
            }
            
            // Handle form submission
            $product_data = array(
                'name' => $this->input->post('name'),
                'category' => $this->input->post('category'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock'),
                'unit' => $this->input->post('unit'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status') ?: 'active'
            );
            
            // Check if file is uploaded
            if (!empty($_FILES['product_image']['name'])) {
                $file = $_FILES['product_image'];
                $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
                
                // Validate file extension
                if (!in_array($file_extension, $allowed_extensions)) {
                    $this->session->set_flashdata('error', 'File type tidak didukung. Hanya JPG, PNG, GIF yang diizinkan.');
                    redirect('admin/edit_product/' . $id);
                    return;
                }
                
                // Validate file size (5MB max)
                if ($file['size'] > 5120 * 1024) {
                    $this->session->set_flashdata('error', 'File terlalu besar. Maksimal 5MB.');
                    redirect('admin/edit_product/' . $id);
                    return;
                }
                
                // Create upload directory if not exists
                $upload_path = './uploads/products/';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0755, TRUE);
                }
                
                // Generate unique filename
                $new_filename = uniqid() . '_' . time() . '.' . $file_extension;
                $destination = $upload_path . $new_filename;
                
                // Move uploaded file
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    $product_data['image'] = 'uploads/products/' . $new_filename;
                    log_message('debug', 'Upload successful: ' . $new_filename);
                } else {
                    $this->session->set_flashdata('error', 'Gagal menyimpan file.');
                    redirect('admin/edit_product/' . $id);
                    return;
                }
            }
            
            if ($this->Product_model->update_product($id, $product_data)) {
                $this->session->set_flashdata('success', 'Produk berhasil diperbarui!');
                redirect('admin/products');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui produk!');
                redirect('admin/edit_product/' . $id);
                return;
            }
        }
        
        $data['title'] = 'Edit Produk - Admin Dashboard';
        $data['page_title'] = 'Edit Produk';
        $data['product'] = $this->Product_model->get_product($id);
        $data['content'] = $this->load->view('admin/content/edit_product', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function delete_product($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        if (!$id || !$this->Product_model->product_exists($id)) {
            $this->session->set_flashdata('error', 'Produk tidak ditemukan!');
            redirect('admin/products');
        }
        
        if ($this->Product_model->delete_product($id)) {
            $this->session->set_flashdata('success', 'Produk berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus produk!');
        }
        
        redirect('admin/products');
    }

    public function test_upload()
    {
        if ($this->input->method() === 'post') {
            $file = $_FILES['test_image'];
            $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
            
            echo "<h3>Test Upload Results</h3>";
            echo "File name: " . $file['name'] . "<br>";
            echo "File type: " . $file['type'] . "<br>";
            echo "File size: " . $file['size'] . " bytes<br>";
            echo "File extension: " . $file_extension . "<br>";
            echo "Tmp name: " . $file['tmp_name'] . "<br><br>";
            
            // Validate file extension
            if (!in_array($file_extension, $allowed_extensions)) {
                echo "<span style='color:red'>❌ File type tidak didukung. Hanya JPG, PNG, GIF yang diizinkan.</span><br>";
                return;
            }
            
            // Validate file size (5MB max)
            if ($file['size'] > 5120 * 1024) {
                echo "<span style='color:red'>❌ File terlalu besar. Maksimal 5MB.</span><br>";
                return;
            }
            
            // Create upload directory if not exists
            $upload_path = './uploads/products/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0755, TRUE);
            }
            
            // Generate unique filename
            $new_filename = uniqid() . '_' . time() . '.' . $file_extension;
            $destination = $upload_path . $new_filename;
            
            // Move uploaded file
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                echo "<span style='color:green'>✅ Upload berhasil!</span><br>";
                echo "Saved as: " . $new_filename . "<br>";
                echo "Full path: " . $destination . "<br>";
            } else {
                echo "<span style='color:red'>❌ Gagal menyimpan file.</span><br>";
            }
        } else {
            echo '<h3>Test Upload Form</h3>';
            echo '<form method="post" enctype="multipart/form-data">
                    <input type="file" name="test_image" accept="image/*" required>
                    <button type="submit">Test Upload</button>
                  </form>';
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('admin_logged_in');
        $this->session->unset_userdata('admin_username');
        $this->session->set_flashdata('success', 'Anda telah berhasil logout!');
        redirect('login');
    }

    // Contact Messages Management
    public function contact()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }

        $this->load->model('Contact_model');
        
        // Get status filter
        $status = $this->input->get('status') ?: null;
        
        // Pagination
        $this->load->library('pagination');
        $config['base_url'] = base_url('admin/contact');
        $config['total_rows'] = $this->Contact_model->count_messages($status);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['messages'] = $this->Contact_model->get_messages($config['per_page'], $page, $status);
        $data['pagination'] = $this->pagination->create_links();
        
        $data['title'] = 'Pesan Kontak - Admin Dashboard';
        $data['page_title'] = 'Pesan Kontak';
        $data['status'] = $status;
        $data['content'] = $this->load->view('admin/content/contact_messages', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    // View specific message
    public function view_message($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        $this->load->model('Contact_model');
        
        if (!$id || !$this->Contact_model->message_exists($id)) {
            $this->session->set_flashdata('error', 'Pesan tidak ditemukan!');
            redirect('admin/contact');
        }
        
        // Mark as read
        $this->Contact_model->update_status($id, 'read');
        
        $data['title'] = 'Detail Pesan - Admin Dashboard';
        $data['page_title'] = 'Detail Pesan';
        $data['message'] = $this->Contact_model->get_message($id);
        $data['content'] = $this->load->view('admin/content/view_message', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    // View message (alias for view_message)
    public function view($id = null)
    {
        $this->view_message($id);
    }

    // Update message status
    public function update_status($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        $this->load->model('Contact_model');
        
        if (!$id || !$this->Contact_model->message_exists($id)) {
            $this->session->set_flashdata('error', 'Pesan tidak ditemukan!');
            redirect('admin/contact');
        }
        
        $status = $this->input->post('status');
        
        if ($this->Contact_model->update_status($id, $status)) {
            $this->session->set_flashdata('success', 'Status pesan berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status pesan!');
        }
        
        redirect('admin/contact');
    }

    // Delete message
    public function delete_message($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        $this->load->model('Contact_model');
        
        if (!$id || !$this->Contact_model->message_exists($id)) {
            $this->session->set_flashdata('error', 'Pesan tidak ditemukan!');
            redirect('admin/contact');
        }
        
        if ($this->Contact_model->delete_message($id)) {
            $this->session->set_flashdata('success', 'Pesan berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus pesan!');
        }
        
        redirect('admin/contact');
    }
}