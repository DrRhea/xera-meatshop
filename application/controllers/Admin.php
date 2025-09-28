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
            log_message('debug', 'User found: ' . $user->username);
            log_message('debug', 'Password verification: ' . (password_verify($password, $user->password) ? 'SUCCESS' : 'FAILED'));
            
            if (password_verify($password, $user->password)) {
                $this->session->set_userdata('admin_logged_in', TRUE);
                $this->session->set_userdata('admin_username', $user->username);
                $this->session->set_userdata('admin_full_name', $user->full_name);
                $this->session->set_userdata('admin_role', $user->role);
                log_message('debug', 'Login successful, redirecting to admin');
                redirect('admin');
            } else {
                log_message('debug', 'Password verification failed');
                $this->session->set_flashdata('error', 'Username atau password salah!');
                redirect('login');
            }
        } else {
            log_message('debug', 'User not found or inactive');
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('login');
        }
    }

    public function products()
    {
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
        
        // Get search and filter parameters
        $search = $this->input->get('search');
        $category = $this->input->get('category');
        $page = $this->input->get('page') ?: 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        
        // Get products from database
        $products = $this->Product_model->get_products($limit, $offset, $search, $category);
        $total_products = $this->Product_model->get_total_products($search, $category);
        $categories = $this->Product_model->get_categories();
        
        // Pagination
        $this->load->library('pagination');
        $config = array(
            'base_url' => base_url('admin/products'),
            'total_rows' => $total_products,
            'per_page' => $limit,
            'page_query_string' => TRUE,
            'query_string_segment' => 'page',
            'first_link' => 'First',
            'last_link' => 'Last',
            'next_link' => 'Next',
            'prev_link' => 'Previous',
            'full_tag_open' => '<div class="pagination">',
            'full_tag_close' => '</div>',
            'num_tag_open' => '<span class="page-link">',
            'num_tag_close' => '</span>',
            'cur_tag_open' => '<span class="page-link active">',
            'cur_tag_close' => '</span>',
            'next_tag_open' => '<span class="page-link">',
            'next_tag_close' => '</span>',
            'prev_tag_open' => '<span class="page-link">',
            'prev_tag_close' => '</span>',
            'first_tag_open' => '<span class="page-link">',
            'first_tag_close' => '</span>',
            'last_tag_open' => '<span class="page-link">',
            'last_tag_close' => '</span>'
        );
        $this->pagination->initialize($config);
        
        $data['title'] = 'Kelola Produk - Admin Dashboard';
        $data['page_title'] = 'Kelola Produk';
        $data['products'] = $products;
        $data['categories'] = $categories;
        $data['pagination'] = $this->pagination->create_links();
        $data['total_products'] = $total_products;
        $data['current_page'] = $page;
        $data['search'] = $search;
        $data['selected_category'] = $category;
        
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
            
            // Handle image upload if provided
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
}

                $config['remove_spaces'] = TRUE;

                $config['file_ext_tolower'] = TRUE;
                $config['detect_mime'] = TRUE;
                $config['mod_mime_fix'] = TRUE;
                

                // Create upload directory if not exists

                if (!is_dir($config['upload_path'])) {

                    mkdir($config['upload_path'], 0755, TRUE);

                }

                

                $this->upload->initialize($config);

                

                if ($this->upload->do_upload('product_image')) {

                    $upload_data = $this->upload->data();

                    $product_data['image'] = 'uploads/products/' . $upload_data['file_name'];

                    log_message('debug', 'Upload successful: ' . $upload_data['file_name']);

                } else {

                    $error_msg = $this->upload->display_errors();

                    $file_info = $_FILES['product_image'];
                    log_message('error', 'Upload failed: ' . $error_msg);

                    log_message('error', 'File info: ' . json_encode($file_info));
                    log_message('error', 'MIME type: ' . $file_info['type']);
                    $this->session->set_flashdata('error', 'Gagal upload gambar: ' . $error_msg . '<br>File type: ' . $file_info['type']);
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

            // Handle form submission

            $this->load->library('upload');

            

            $config['upload_path'] = './uploads/products/';

            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 5120; // 5MB
            $config['encrypt_name'] = TRUE;

            $config['overwrite'] = FALSE;

            $config['remove_spaces'] = TRUE;

            $config['file_ext_tolower'] = TRUE;
            $config['detect_mime'] = TRUE;
            $config['mod_mime_fix'] = TRUE;
            

            $this->upload->initialize($config);

            

            $product_data = array(

                'name' => $this->input->post('name'),

                'category' => $this->input->post('category'),

                'price' => $this->input->post('price'),

                'stock' => $this->input->post('stock'),

                'unit' => $this->input->post('unit'),

                'description' => $this->input->post('description'),

                'status' => $this->input->post('status') ?: 'active'

            );

            

            if ($this->upload->do_upload('product_image')) {

                $upload_data = $this->upload->data();

                $product_data['image'] = 'uploads/products/' . $upload_data['file_name'];

            }

            

            if ($this->Product_model->update_product($id, $product_data)) {

                $this->session->set_flashdata('success', 'Produk berhasil diperbarui!');

                redirect('admin/products');

            } else {

                $this->session->set_flashdata('error', 'Gagal memperbarui produk!');

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
            $this->load->library('upload');
            
            $config['upload_path'] = './uploads/products/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 5120; // 5MB
            $config['encrypt_name'] = TRUE;
            $config['overwrite'] = FALSE;
            $config['remove_spaces'] = TRUE;
            $config['file_ext_tolower'] = TRUE;
            $config['detect_mime'] = TRUE;
            $config['mod_mime_fix'] = TRUE;
            
            $this->upload->initialize($config);
            
            if ($this->upload->do_upload('test_image')) {
                $upload_data = $this->upload->data();
                echo "Upload berhasil!<br>";
                echo "File name: " . $upload_data['file_name'] . "<br>";
                echo "File size: " . $upload_data['file_size'] . " bytes<br>";
                echo "File type: " . $upload_data['file_type'] . "<br>";
                echo "Image width: " . $upload_data['image_width'] . "px<br>";
                echo "Image height: " . $upload_data['image_height'] . "px<br>";
            } else {
                $error_msg = $this->upload->display_errors();
                $file_info = $_FILES['test_image'];
                echo "Upload gagal!<br>";
                echo "Error: " . $error_msg . "<br>";
                echo "File name: " . $file_info['name'] . "<br>";
                echo "File type: " . $file_info['type'] . "<br>";
                echo "File size: " . $file_info['size'] . " bytes<br>";
                echo "Tmp name: " . $file_info['tmp_name'] . "<br>";
            }
        } else {
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

}

