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
$route['gallery'] = 'home/gallery';
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
$route['admin/products'] = 'admin/products';
$route['admin/products/add'] = 'admin/add_product';
$route['admin/products/edit/(:num)'] = 'admin/edit_product/$1';
