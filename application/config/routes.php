<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a routing error, but allows you to automatically
| translate underscores to dashes in controller and method names.
| 'my_controller' becomes 'my-controller'
|
| This is not exactly a routing error, but allows you to automatically
| translate underscores to dashes in controller and method names.
| 'my_controller' becomes 'my-controller'
|
*/

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Custom routes untuk Meat Shop & Grocery
$route['beranda'] = 'home';
$route['tentang-kami'] = 'home/about';
$route['kontak'] = 'home/contact';
$route['produk/daging'] = 'produk/daging';
$route['produk/minuman'] = 'produk/minuman';
$route['produk/seafood'] = 'produk/seafood';
$route['produk/bumbu'] = 'produk/bumbu';
$route['produk/roti'] = 'produk/roti';
$route['produk/sayur-buah'] = 'produk/sayur_buah';
$route['produk/daging-olahan'] = 'produk/daging_olahan';
$route['produk/susu-olahan'] = 'produk/susu_olahan';

// Cart routes
$route['cart'] = 'cart';
$route['keranjang'] = 'cart';

// Admin routes
$route['admin'] = 'admin';
$route['admin/login'] = 'admin/login';
$route['admin/authenticate'] = 'admin/authenticate';
$route['admin/logout'] = 'admin/logout';

// Direct login routes
$route['login'] = 'admin/login';
$route['authenticate'] = 'admin/authenticate';
$route['logout'] = 'admin/logout';
$route['admin/products'] = 'admin/products';
$route['admin/products/add'] = 'admin/add_product';
$route['admin/products/edit/(:num)'] = 'admin/edit_product/$1';
$route['admin/products/delete/(:num)'] = 'admin/delete_product/$1';
$route['admin/orders'] = 'orders';
$route['admin/orders/add'] = 'orders/add';
$route['admin/orders/edit/(:num)'] = 'orders/edit/$1';
$route['admin/customers'] = 'customers';
$route['admin/customers/add'] = 'customers/add';
$route['admin/customers/edit/(:num)'] = 'customers/edit/$1';
$route['admin/gallery'] = 'gallery/index';
$route['admin/gallery/add'] = 'gallery/add';
$route['admin/gallery/edit/(:num)'] = 'gallery/edit/$1';
$route['admin/gallery/delete/(:num)'] = 'gallery/delete/$1';
$route['gallery-delete/(:num)'] = 'gallery/delete/$1';

// Promo routes
$route['admin/promo'] = 'promo/index';
$route['admin/promo/add'] = 'promo/add';
$route['admin/promo/edit/(:num)'] = 'promo/edit/$1';
$route['admin/promo/delete/(:num)'] = 'promo/delete/$1';
$route['admin/promo/update_status/(:num)'] = 'promo/update_status/$1';
$route['admin/settings'] = 'admin/settings';

$route['admin/settings/content'] = 'settings/content';
$route['admin/settings/profile'] = 'admin/edit_profile';
$route['admin/settings/password'] = 'admin/change_password';
$route['admin/change_password'] = 'admin/change_password';
$route['admin/edit_profile'] = 'admin/edit_profile';
$route['admin/update_profile'] = 'admin/update_profile';
$route['admin/test-upload'] = 'admin/test_upload';

// Gallery routes
$route['gallery'] = 'gallery/public_gallery';

// Contact routes
$route['contact/submit'] = 'contact/submit';
$route['admin/contact'] = 'admin/contact';
$route['admin/contact/view/(:num)'] = 'admin/view/$1';
$route['admin/contact/update_status/(:num)'] = 'admin/update_status/$1';
$route['admin/contact/delete/(:num)'] = 'admin/delete_message/$1';
