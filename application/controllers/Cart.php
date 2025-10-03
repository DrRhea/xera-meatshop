<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Keranjang Belanja - Meat Shop & Grocery';
        
        // Check cart session
        $cart = $this->session->userdata('cart') ?: [];
        
        // Debug: Log cart data in index
        log_message('debug', 'Cart index - Cart data: ' . print_r($cart, true));
        log_message('debug', 'Cart index - Session ID: ' . $this->session->session_id);
        
        // Pass cart data to view
        $data['cart'] = $cart;
        
        // Load latest products like in Home controller
        $this->load->model('Product_model');
        $data['latest_products'] = $this->Product_model->get_products(4, 0, null, null, 'active');
        
        $this->load->view('templates/header', $data);
        $this->load->view('cart/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        if ($this->input->method() === 'post') {
            $product_name = $this->input->post('product_name');
            $product_price = $this->input->post('product_price');
            $product_category = $this->input->post('product_category');
            $product_stock = $this->input->post('product_stock');
            $product_unit = $this->input->post('product_unit');
            $quantity = $this->input->post('quantity') ?: 1;

            // Validate required fields
            if (empty($product_name) || empty($product_price)) {
                $this->session->set_flashdata('error', 'Data produk tidak lengkap');
                redirect($_SERVER['HTTP_REFERER'] ?? base_url());
                return;
            }

            // Get current cart from session
            $cart = $this->session->userdata('cart') ?: [];

            // Check if product already exists in cart
            $product_exists = false;
            foreach ($cart as $key => $item) {
                if ($item['name'] === $product_name) {
                    $cart[$key]['quantity'] += $quantity;
                    $product_exists = true;
                    break;
                }
            }

            // If product doesn't exist, add new item
            if (!$product_exists) {
                $cart[] = [
                    'name' => $product_name,
                    'price' => $product_price,
                    'category' => $product_category,
                    'stock' => $product_stock,
                    'unit' => $product_unit,
                    'quantity' => $quantity
                ];
            }

            // Save cart to session
            $this->session->set_userdata('cart', $cart);
            
            // Debug: Log cart data
            log_message('debug', 'Cart add - Final cart data: ' . print_r($cart, true));
            log_message('debug', 'Cart add - Session ID: ' . $this->session->session_id);
            
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan ke keranjang');

            // Redirect back to previous page
            redirect($_SERVER['HTTP_REFERER'] ?? base_url());
        } else {
            redirect(base_url());
        }
    }

    public function remove()
    {
        if ($this->input->method() === 'post') {
            $product_name = $this->input->post('product_name');
            
            if (!empty($product_name)) {
                $cart = $this->session->userdata('cart') ?: [];
                
                // Remove product from cart
                $cart = array_filter($cart, function($item) use ($product_name) {
                    return $item['name'] !== $product_name;
                });
                
                // Re-index array
                $cart = array_values($cart);
                
                $this->session->set_userdata('cart', $cart);
                $this->session->set_flashdata('success', 'Produk berhasil dihapus dari keranjang');
            }
            
            redirect($_SERVER['HTTP_REFERER'] ?? base_url('keranjang'));
        } else {
            redirect(base_url());
        }
    }

    public function update()
    {
        if ($this->input->method() === 'post') {
            $product_name = $this->input->post('product_name');
            $quantity = $this->input->post('quantity');
            
            if (!empty($product_name) && $quantity >= 0) {
                $cart = $this->session->userdata('cart') ?: [];
                
                foreach ($cart as $key => $item) {
                    if ($item['name'] === $product_name) {
                        if ($quantity == 0) {
                            unset($cart[$key]);
                        } else {
                            $cart[$key]['quantity'] = $quantity;
                        }
                        break;
                    }
                }
                
                // Re-index array
                $cart = array_values($cart);
                
                $this->session->set_userdata('cart', $cart);
                $this->session->set_flashdata('success', 'Keranjang berhasil diperbarui');
            }
            
            redirect($_SERVER['HTTP_REFERER'] ?? base_url('keranjang'));
        } else {
            redirect(base_url());
        }
    }

    public function clear()
    {
        $this->session->unset_userdata('cart');
        $this->session->set_flashdata('success', 'Keranjang berhasil dikosongkan');
        redirect(base_url('keranjang'));
    }

    public function generateWhatsAppUrl($cart)
    {
        $phoneNumber = '628112993400';
        $message = "Halo! Saya ingin memesan produk berikut:\n\n";
        
        $total = 0;
        foreach ($cart as $item) {
            $itemTotal = $item['price'] * $item['quantity'];
            $total += $itemTotal;
            $message .= "📦 *{$item['name']}*\n";
            $message .= "💰 Harga: Rp " . number_format($item['price'], 0, ',', '.') . "\n";
            $message .= "📊 Jumlah: {$item['quantity']} {$item['unit']}\n";
            $message .= "💵 Subtotal: Rp " . number_format($itemTotal, 0, ',', '.') . "\n\n";
        }
        
        $message .= "💰 *Total: Rp " . number_format($total, 0, ',', '.') . "*\n\n";
        $message .= "Mohon informasi lebih lanjut tentang cara pembayaran dan pengiriman.\n\n";
        $message .= "Terima kasih!";
        
        $encodedMessage = urlencode($message);
        return "https://wa.me/{$phoneNumber}?text={$encodedMessage}";
    }
}
