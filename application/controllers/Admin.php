<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('meatshop');
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Product_model');
        $this->load->model('Gallery_model');
        $this->load->model('Promo_model');
        $this->load->model('Contact_model');
    }

    public function index()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        // Get dashboard statistics
        $data['stats'] = $this->get_dashboard_stats();
        $data['recent_products'] = $this->get_recent_products();
        $data['recent_messages'] = $this->get_recent_messages();
        $data['low_stock_products'] = $this->get_low_stock_products();
        $data['recent_orders'] = $this->get_recent_orders();
        
        $data['title'] = 'Dashboard Admin - Meat Shop & Grocery';
        $data['page_title'] = 'Dashboard';
        $data['content'] = $this->load->view('admin/content/dashboard', $data, TRUE);
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

    // Gallery Management
    public function gallery()
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
        
        $data['title'] = 'Kelola Gallery - Admin Dashboard';
        $data['page_title'] = 'Kelola Gallery';
        $data['search'] = $search;
        $data['status'] = $status;
        $data['content'] = $this->load->view('admin/content/gallery', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function add_gallery()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        if ($this->input->method() === 'post') {
            // Validate required fields
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Judul', 'required|trim');
            $this->form_validation->set_rules('category', 'Kategori', 'required');
            
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('admin/add_gallery');
                return;
            }
            
            // Handle form submission
            $gallery_data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'category' => $this->input->post('category'),
                'status' => $this->input->post('status') ?: 'active',
                'sort_order' => $this->input->post('sort_order') ?: 0,
                'alt_text' => $this->input->post('alt_text'),
                'keywords' => $this->input->post('keywords')
            );
            
            // Check if file is uploaded
            if (!empty($_FILES['gallery_image']['name'])) {
                $file = $_FILES['gallery_image'];
                $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
                
                // Validate file extension
                if (!in_array($file_extension, $allowed_extensions)) {
                    $this->session->set_flashdata('error', 'File type tidak didukung. Hanya JPG, PNG, GIF yang diizinkan.');
                    redirect('admin/add_gallery');
                    return;
                }
                
                // Validate file size (5MB max)
                if ($file['size'] > 5120 * 1024) {
                    $this->session->set_flashdata('error', 'File terlalu besar. Maksimal 5MB.');
                    redirect('admin/add_gallery');
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
                } else {
                    $this->session->set_flashdata('error', 'Gagal menyimpan file.');
                    redirect('admin/add_gallery');
                    return;
                }
            } else {
                $this->session->set_flashdata('error', 'Gambar gallery harus diupload.');
                redirect('admin/add_gallery');
                return;
            }
            
            if ($this->Gallery_model->create_gallery($gallery_data)) {
                $this->session->set_flashdata('success', 'Gallery berhasil ditambahkan!');
                redirect('admin/gallery');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan gallery!');
                redirect('admin/add_gallery');
            }
        }
        
        $data['title'] = 'Tambah Gallery - Admin Dashboard';
        $data['page_title'] = 'Tambah Gallery';
        $data['content'] = $this->load->view('admin/content/add_gallery', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function edit_gallery($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        if (!$id || !$this->Gallery_model->gallery_exists($id)) {
            $this->session->set_flashdata('error', 'Gallery tidak ditemukan!');
            redirect('admin/gallery');
        }
        
        if ($this->input->method() === 'post') {
            // Validate required fields
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Judul', 'required|trim');
            $this->form_validation->set_rules('category', 'Kategori', 'required');
            
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('admin/edit_gallery/' . $id);
                return;
            }
            
            // Handle form submission
            $gallery_data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'category' => $this->input->post('category'),
                'status' => $this->input->post('status') ?: 'active',
                'sort_order' => $this->input->post('sort_order') ?: 0,
                'alt_text' => $this->input->post('alt_text'),
                'keywords' => $this->input->post('keywords')
            );
            
            // Check if file is uploaded
            if (!empty($_FILES['gallery_image']['name'])) {
                $file = $_FILES['gallery_image'];
                $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
                
                // Validate file extension
                if (!in_array($file_extension, $allowed_extensions)) {
                    $this->session->set_flashdata('error', 'File type tidak didukung. Hanya JPG, PNG, GIF yang diizinkan.');
                    redirect('admin/edit_gallery/' . $id);
                    return;
                }
                
                // Validate file size (5MB max)
                if ($file['size'] > 5120 * 1024) {
                    $this->session->set_flashdata('error', 'File terlalu besar. Maksimal 5MB.');
                    redirect('admin/edit_gallery/' . $id);
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
                } else {
                    $this->session->set_flashdata('error', 'Gagal menyimpan file.');
                    redirect('admin/edit_gallery/' . $id);
                    return;
                }
            }
            
            if ($this->Gallery_model->update_gallery($id, $gallery_data)) {
                $this->session->set_flashdata('success', 'Gallery berhasil diperbarui!');
                redirect('admin/gallery');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui gallery!');
                redirect('admin/edit_gallery/' . $id);
            }
        }
        
        $data['title'] = 'Edit Gallery - Admin Dashboard';
        $data['page_title'] = 'Edit Gallery';
        $data['gallery'] = $this->Gallery_model->get_gallery_item($id);
        $data['content'] = $this->load->view('admin/content/edit_gallery', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function delete_gallery($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        if (!$id || !$this->Gallery_model->gallery_exists($id)) {
            $this->session->set_flashdata('error', 'Gallery tidak ditemukan!');
            redirect('admin/gallery');
        }
        
        if ($this->Gallery_model->delete_gallery($id)) {
            $this->session->set_flashdata('success', 'Gallery berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus gallery!');
        }
        
        redirect('admin/gallery');
    }

    // Promo Management
    public function promo()
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
        
        $data['title'] = 'Kelola Promo - Admin Dashboard';
        $data['page_title'] = 'Kelola Promo';
        $data['search'] = $search;
        $data['status'] = $status;
        $data['content'] = $this->load->view('admin/content/promo', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function add_promo()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        // Get products for selection
        $data['products'] = $this->Promo_model->get_products_for_promo();
        
        if ($this->input->method() === 'post') {
            // Validate required fields
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Judul Promo', 'required|trim');
            $this->form_validation->set_rules('original_price', 'Harga Asli', 'required|numeric|greater_than[0]');
            $this->form_validation->set_rules('promo_price', 'Harga Promo', 'required|numeric|greater_than[0]');
            $this->form_validation->set_rules('start_date', 'Tanggal Mulai', 'required');
            $this->form_validation->set_rules('end_date', 'Tanggal Berakhir', 'required');
            
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('admin/add_promo');
                return;
            }
            
            // Calculate discount percentage
            $original_price = $this->input->post('original_price');
            $promo_price = $this->input->post('promo_price');
            $discount_percentage = $this->Promo_model->calculate_discount_percentage($original_price, $promo_price);
            
            // Handle form submission
            $promo_data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'product_id' => $this->input->post('product_id') ?: null,
                'original_price' => $original_price,
                'promo_price' => $promo_price,
                'discount_percentage' => $discount_percentage,
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'is_active' => $this->input->post('is_active') ?: 'active',
                'sort_order' => $this->input->post('sort_order') ?: 0
            );
            
            // Check if file is uploaded
            if (!empty($_FILES['promo_image']['name'])) {
                $file = $_FILES['promo_image'];
                $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
                
                // Validate file extension
                if (!in_array($file_extension, $allowed_extensions)) {
                    $this->session->set_flashdata('error', 'File type tidak didukung. Hanya JPG, PNG, GIF yang diizinkan.');
                    redirect('admin/add_promo');
                    return;
                }
                
                // Validate file size (5MB max)
                if ($file['size'] > 5120 * 1024) {
                    $this->session->set_flashdata('error', 'File terlalu besar. Maksimal 5MB.');
                    redirect('admin/add_promo');
                    return;
                }
                
                // Create upload directory if not exists
                $upload_path = './uploads/promo/';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0755, TRUE);
                }
                
                // Generate unique filename
                $new_filename = uniqid() . '_' . time() . '.' . $file_extension;
                $destination = $upload_path . $new_filename;
                
                // Move uploaded file
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    $promo_data['image'] = 'uploads/promo/' . $new_filename;
                } else {
                    $this->session->set_flashdata('error', 'Gagal menyimpan file.');
                    redirect('admin/add_promo');
                    return;
                }
            }
            
            if ($this->Promo_model->create_promo($promo_data)) {
                $this->session->set_flashdata('success', 'Promo berhasil ditambahkan!');
                redirect('admin/promo');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan promo!');
                redirect('admin/add_promo');
            }
        }
        
        $data['title'] = 'Tambah Promo - Admin Dashboard';
        $data['page_title'] = 'Tambah Promo';
        $data['content'] = $this->load->view('admin/content/add_promo', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function edit_promo($id = null)
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        if (!$id || !$this->Promo_model->promo_exists($id)) {
            $this->session->set_flashdata('error', 'Promo tidak ditemukan!');
            redirect('admin/promo');
        }
        
        // Get products for selection
        $data['products'] = $this->Promo_model->get_products_for_promo();
        
        if ($this->input->method() === 'post') {
            // Validate required fields
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Judul Promo', 'required|trim');
            $this->form_validation->set_rules('original_price', 'Harga Asli', 'required|numeric|greater_than[0]');
            $this->form_validation->set_rules('promo_price', 'Harga Promo', 'required|numeric|greater_than[0]');
            $this->form_validation->set_rules('start_date', 'Tanggal Mulai', 'required');
            $this->form_validation->set_rules('end_date', 'Tanggal Berakhir', 'required');
            
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                redirect('admin/edit_promo/' . $id);
                return;
            }
            
            // Calculate discount percentage
            $original_price = $this->input->post('original_price');
            $promo_price = $this->input->post('promo_price');
            $discount_percentage = $this->Promo_model->calculate_discount_percentage($original_price, $promo_price);
            
            // Handle form submission
            $promo_data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'product_id' => $this->input->post('product_id') ?: null,
                'original_price' => $original_price,
                'promo_price' => $promo_price,
                'discount_percentage' => $discount_percentage,
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'is_active' => $this->input->post('is_active') ?: 'active',
                'sort_order' => $this->input->post('sort_order') ?: 0
            );
            
            // Check if file is uploaded
            if (!empty($_FILES['promo_image']['name'])) {
                $file = $_FILES['promo_image'];
                $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
                
                // Validate file extension
                if (!in_array($file_extension, $allowed_extensions)) {
                    $this->session->set_flashdata('error', 'File type tidak didukung. Hanya JPG, PNG, GIF yang diizinkan.');
                    redirect('admin/edit_promo/' . $id);
                    return;
                }
                
                // Validate file size (5MB max)
                if ($file['size'] > 5120 * 1024) {
                    $this->session->set_flashdata('error', 'File terlalu besar. Maksimal 5MB.');
                    redirect('admin/edit_promo/' . $id);
                    return;
                }
                
                // Create upload directory if not exists
                $upload_path = './uploads/promo/';
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0755, TRUE);
                }
                
                // Generate unique filename
                $new_filename = uniqid() . '_' . time() . '.' . $file_extension;
                $destination = $upload_path . $new_filename;
                
                // Move uploaded file
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    $promo_data['image'] = 'uploads/promo/' . $new_filename;
                } else {
                    $this->session->set_flashdata('error', 'Gagal menyimpan file.');
                    redirect('admin/edit_promo/' . $id);
                    return;
                }
            }
            
            if ($this->Promo_model->update_promo($id, $promo_data)) {
                $this->session->set_flashdata('success', 'Promo berhasil diperbarui!');
                redirect('admin/promo');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui promo!');
                redirect('admin/edit_promo/' . $id);
            }
        }
        
        $data['title'] = 'Edit Promo - Admin Dashboard';
        $data['page_title'] = 'Edit Promo';
        $data['promo'] = $this->Promo_model->get_promo($id);
        $data['content'] = $this->load->view('admin/content/edit_promo', $data, TRUE);
        $this->load->view('admin/layout', $data);
    }

    public function delete_promo($id = null)
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

    // Dashboard helper methods
    private function get_dashboard_stats()
    {
        $stats = array();
        
        // Total products
        $stats['total_products'] = $this->Product_model->count_products();
        
        // Total gallery items
        $stats['total_gallery'] = $this->Gallery_model->count_gallery();
        
        // Total promos
        $stats['total_promos'] = $this->Promo_model->count_promos();
        
        // Total contact messages
        $stats['total_messages'] = $this->Contact_model->count_messages();
        
        // New messages (unread)
        $stats['new_messages'] = $this->Contact_model->get_new_messages_count();
        
        // Active products
        $stats['active_products'] = $this->Product_model->get_total_products();
        
        // Low stock products (stock < 10)
        $this->db->where('stock <', 10);
        $this->db->where('status', 'active');
        $stats['low_stock_count'] = $this->db->count_all_results('products');
        
        // Recent orders (if orders table exists)
        $stats['total_orders'] = 0;
        $stats['total_revenue'] = 0;
        
        // Check if orders table exists
        if ($this->db->table_exists('orders')) {
            $stats['total_orders'] = $this->db->count_all('orders');
            
            // Calculate total revenue
            $this->db->select_sum('total_amount');
            $this->db->where('status !=', 'cancelled');
            $revenue_result = $this->db->get('orders')->row();
            $stats['total_revenue'] = $revenue_result->total_amount ?: 0;
        }
        
        return $stats;
    }
    
    private function get_recent_products($limit = 5)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }
    
    private function get_recent_messages($limit = 5)
    {
        $this->db->select('*');
        $this->db->from('contact_messages');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }
    
    private function get_low_stock_products($limit = 5)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('stock <', 10);
        $this->db->where('status', 'active');
        $this->db->order_by('stock', 'ASC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }
    
    private function get_recent_orders($limit = 5)
    {
        if (!$this->db->table_exists('orders')) {
            return array();
        }
        
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }
}