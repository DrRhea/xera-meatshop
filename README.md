# Meat Shop & Grocery - CodeIgniter 3

Template website Meat Shop & Grocery yang telah dikonversi dari HTML ke CodeIgniter 3.

## Fitur

- ✅ Responsive Design
- ✅ Modern UI/UX
- ✅ CodeIgniter 3 Framework
- ✅ MVC Architecture
- ✅ Clean URL Routing
- ✅ Template System
- ✅ Multi-page Website

## Struktur Proyek

```
Meatshop&Grocery/
├── application/
│   ├── config/
│   │   ├── config.php
│   │   ├── routes.php
│   │   ├── autoload.php
│   │   └── database.php
│   ├── controllers/
│   │   ├── Home.php
│   │   └── Produk.php
│   └── views/
│       ├── templates/
│       │   ├── header.php
│       │   └── footer.php
│       ├── home/
│       │   ├── index.php
│       │   ├── about.php
│       │   └── contact.php
│       └── produk/
│           ├── daging.php
│           ├── minuman.php
│           ├── seafood.php
│           ├── bumbu.php
│           ├── roti.php
│           ├── sayur_buah.php
│           ├── daging_olahan.php
│           └── susu_olahan.php
├── assets/
├── css/
├── js/
├── gambar/
├── gambar_produk/
├── index.php
├── .htaccess
└── README.md
```

## Instalasi

1. **Clone atau download proyek ini**
2. **Setup Web Server** (Apache/Nginx)
3. **Setup PHP** (versi 7.0 atau lebih baru)
4. **Setup Database** (opsional)
5. **Konfigurasi URL** di `application/config/config.php`

## Konfigurasi

### 1. Base URL
Edit file `application/config/config.php`:
```php
$config['base_url'] = 'http://localhost/meatshop/';
```

### 2. Database (Opsional)
Edit file `application/config/database.php`:
```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'meatshop_grocery',
    'dbdriver' => 'mysqli',
    // ... konfigurasi lainnya
);
```

## Halaman yang Tersedia

### Halaman Utama
- **Beranda** - `/` atau `/beranda`
- **Tentang Kami** - `/tentang-kami`
- **Kontak** - `/kontak`

### Halaman Produk
- **Daging** - `/produk/daging`
- **Minuman** - `/produk/minuman`
- **Seafood** - `/produk/seafood`
- **Bumbu** - `/produk/bumbu`
- **Roti** - `/produk/roti`
- **Sayur & Buah** - `/produk/sayur-buah`
- **Daging Olahan** - `/produk/daging-olahan`
- **Susu & Olahan** - `/produk/susu-olahan`

## Routing

Routing dapat dikustomisasi di `application/config/routes.php`:

```php
$route['default_controller'] = 'home';
$route['beranda'] = 'home';
$route['tentang-kami'] = 'home/about';
$route['kontak'] = 'home/contact';
// ... routing lainnya
```

## Template System

### Header Template
File: `application/views/templates/header.php`
- Navigation
- Meta tags
- CSS/JS includes

### Footer Template
File: `application/views/templates/footer.php`
- Footer content
- Contact information
- Social media links

## Assets

- **CSS**: `css/style.css`
- **JavaScript**: `js/script.js`
- **Images**: `gambar/`, `gambar_produk/`, `assets/img/`

## Kontroller

### Home Controller
- `index()` - Halaman beranda
- `about()` - Halaman tentang kami
- `contact()` - Halaman kontak

### Produk Controller
- `daging()` - Produk daging
- `minuman()` - Produk minuman
- `seafood()` - Produk seafood
- `bumbu()` - Produk bumbu
- `roti()` - Produk roti
- `sayur_buah()` - Produk sayur & buah
- `daging_olahan()` - Produk daging olahan
- `susu_olahan()` - Produk susu & olahan

## Pengembangan

### Menambah Halaman Baru
1. Buat controller method
2. Buat view file
3. Update routing (opsional)
4. Update navigation

### Menambah Produk
1. Edit view file di `application/views/produk/`
2. Update gambar di folder `gambar_produk/`
3. Update informasi produk

## Troubleshooting

### URL tidak berfungsi
- Pastikan mod_rewrite enabled
- Cek file `.htaccess`
- Cek konfigurasi web server

### CSS/JS tidak load
- Cek path di `base_url()`
- Pastikan file ada di folder yang benar
- Cek permission file

### Database error
- Cek konfigurasi database
- Pastikan database server running
- Cek kredensial database

## Support

Untuk pertanyaan atau bantuan, silakan hubungi developer.

## License

Proyek ini menggunakan template HTML yang telah dikonversi ke CodeIgniter 3.
