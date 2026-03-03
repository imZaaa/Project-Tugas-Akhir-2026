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
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';
$route['404_override']       = '';
$route['translate_uri_dashes'] = FALSE;

// =============================================
// AUTH
// =============================================
$route['auth']               = 'auth/index';
$route['auth/login']         = 'auth/login';
$route['auth/logout']        = 'auth/logout';

// =============================================
// ADMIN — DASHBOARD
// =============================================
$route['admin/admin']        = 'admin/admin/index';

// =============================================
// ADMIN — MASTER DATA
// =============================================

// Kategori Produk
$route['admin/kategori']            = 'admin/kategori/index';
$route['admin/kategori/tambah']     = 'admin/kategori/tambah';
$route['admin/kategori/update']     = 'admin/kategori/update';
$route['admin/kategori/hapus']      = 'admin/kategori/hapus';

// Stok Produk
$route['admin/produk']              = 'admin/produk/index';
$route['admin/produk/tambah']       = 'admin/produk/tambah';
$route['admin/produk/update']       = 'admin/produk/update';
$route['admin/produk/update_stok']  = 'admin/produk/update_stok';
$route['admin/produk/hapus']        = 'admin/produk/hapus';

// Data Supplier
$route['admin/supplier']            = 'admin/supplier/index';
$route['admin/supplier/tambah']     = 'admin/supplier/tambah';
$route['admin/supplier/update']     = 'admin/supplier/update';
$route['admin/supplier/hapus']      = 'admin/supplier/hapus';

// Kelola User
$route['admin/users']               = 'admin/users/index';
$route['admin/users/tambah']        = 'admin/users/tambah';
$route['admin/users/update']        = 'admin/users/update';
$route['admin/users/hapus']         = 'admin/users/hapus';

// =============================================
// ADMIN — TRANSAKSI
// =============================================

// Barang Masuk
$route['admin/barang_masuk']                    = 'admin/barang_masuk/index';
$route['admin/barang_masuk/create']             = 'admin/barang_masuk/create';
$route['admin/barang_masuk/simpan']             = 'admin/barang_masuk/simpan';
$route['admin/barang_masuk/detail/(:num)']      = 'admin/barang_masuk/detail/$1';
$route['admin/barang_masuk/hapus']              = 'admin/barang_masuk/hapus';

// Penjualan Offline
$route['admin/penjualan']                       = 'admin/penjualan/index';
$route['admin/penjualan/create']                = 'admin/penjualan/create';
$route['admin/penjualan/simpan']                = 'admin/penjualan/simpan';
$route['admin/penjualan/detail/(:num)']         = 'admin/penjualan/detail/$1';
$route['admin/penjualan/cetak/(:num)']          = 'admin/penjualan/cetak/$1';
$route['admin/penjualan/void']                  = 'admin/penjualan/void_transaksi';
$route['admin/penjualan/get_produk']            = 'admin/penjualan/get_produk_json';

// =============================================
// ADMIN — LAPORAN & PENGATURAN
// =============================================
$route['admin/laporan']                         = 'admin/laporan/index';
$route['admin/laporan/cetak']                   = 'admin/laporan/cetak';

// =============================================
// KASIR — DASHBOARD
// =============================================
$route['kasir']              = 'kasir/Kasir';       // TAMBAHIN INI BRE!
$route['kasir/kasir']        = 'kasir/Kasir/index';

// =============================================
// KASIR — TRANSAKSI
// =============================================

// Barang Masuk (kasir punya controller sendiri)
$route['kasir/barang_masuk']                    = 'kasir/barang_masuk/index';
$route['kasir/barang_masuk/create']             = 'kasir/barang_masuk/create';
$route['kasir/barang_masuk/simpan']             = 'kasir/barang_masuk/simpan';
$route['kasir/barang_masuk/detail/(:num)']      = 'kasir/barang_masuk/detail/$1';

// Penjualan Offline (kasir punya controller sendiri)
$route['kasir/penjualan']                       = 'kasir/penjualan/index';
$route['kasir/penjualan/create']                = 'kasir/penjualan/create';
$route['kasir/penjualan/simpan']                = 'kasir/penjualan/simpan';
$route['kasir/penjualan/detail/(:num)']         = 'kasir/penjualan/detail/$1';
$route['kasir/penjualan/cetak/(:num)']          = 'kasir/penjualan/cetak/$1';
$route['kasir/penjualan/get_produk']            = 'kasir/penjualan/get_produk_json';

// =============================================
// KASIR — STOK & RIWAYAT
// =============================================

// Cek Stok Produk (kasir punya controller sendiri)
$route['kasir/produk']                          = 'kasir/produk/index';
$route['kasir/produk/update_stok']              = 'kasir/produk/update_stok';

// Supplier (kasir punya controller sendiri)
$route['kasir/supplier']                        = 'kasir/supplier/index';

// Laporan Penjualan Kasir
$route['kasir/laporan']                         = 'kasir/laporan_kasir/index';
$route['kasir/laporan/cetak']                   = 'kasir/laporan_kasir/cetak';

// Riwayat Transaksi Kasir
$route['kasir/riwayat']                         = 'kasir/riwayat/index';
$route['kasir/riwayat/detail/(:num)']           = 'kasir/riwayat/detail/$1';

