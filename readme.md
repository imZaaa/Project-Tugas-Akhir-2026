# SIPordjo — Sistem Informasi Manajemen PT Pordjo Steelindo Perkasa

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-3.x-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![AdminLTE](https://img.shields.io/badge/AdminLTE-3.x-3C8DBC?style=for-the-badge)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

> Sistem manajemen inventori & penjualan offline berbasis web untuk distributor besi & baja — PT Pordjo Steelindo Perkasa.

---

## Daftar Isi

- [Tentang Proyek](#tentang-proyek)
- [Fitur Utama](#fitur-utama)
- [Hak Akses RBAC](#hak-akses-rbac)
- [Tech Stack](#tech-stack)
- [Struktur Database](#struktur-database)
- [Cara Instalasi](#cara-instalasi)
- [Struktur Direktori](#struktur-direktori)
- [Alur Sistem](#alur-sistem)
- [Screenshot](#screenshot)
- [Kontributor](#kontributor)

---

## Tentang Proyek

**SIPordjo** adalah sistem informasi manajemen yang dirancang khusus untuk kebutuhan operasional PT Pordjo Steelindo Perkasa, sebuah distributor material besi dan baja yang berlokasi di Kaliabang.

Sistem ini dibangun sebagai **Tugas Akhir (TA)** untuk mendigitalisasi proses pencatatan barang masuk, penjualan offline, manajemen stok, dan pelaporan yang sebelumnya dilakukan secara manual menggunakan buku besar.

---

## Fitur Utama

### Dashboard

- Dashboard Admin: ringkasan harian (total penjualan, omzet, stok menipis, monitoring barang masuk real-time)
- Dashboard Kasir: ringkasan transaksi pribadi hari ini dan shortcut aksi cepat
- Grafik penjualan 7 hari terakhir
- Notifikasi barang masuk otomatis

### Manajemen Stok

- CRUD kategori produk
- CRUD produk dengan tracking stok real-time
- Indikator visual stok menipis (warning saat stok ≤ 10)
- Pencarian dan filter produk

### Barang Masuk

- Input nota pembelian dari supplier (khusus Kasir)
- Multi-item per nota transaksi
- Stok bertambah otomatis saat nota disimpan (atomic transaction)
- Riwayat barang masuk dengan detail per faktur
- Hapus nota dengan rollback stok otomatis (khusus Admin)

### Penjualan Offline (POS)

- Form transaksi bergaya Point of Sale (POS)
- Grid produk dengan info stok real-time
- Keranjang belanja dinamis — tambah / kurang qty
- Kalkulasi kembalian otomatis + quick amount buttons
- Validasi stok dua lapis: frontend + backend (cegah race condition)
- Database transaction atomik — semua berhasil atau semua dibatalkan
- Cetak struk/nota setelah transaksi berhasil
- Fitur Edit & Void transaksi dengan rollback stok (khusus Admin)

### Manajemen Pengguna

- CRUD akun pengguna
- Pembagian role: Admin dan Kasir
- Password di-hash, autentikasi berbasis session

### Data Supplier

- CRUD data supplier lengkap
- Riwayat pembelian per supplier

### Laporan

- Laporan penjualan harian, bulanan, dan tahunan
- Export data transaksi

---

## Hak Akses RBAC

| Fitur | Kasir | Admin | Keterangan |
|---|:---:|:---:|---|
| Dashboard | ✅ | ✅ | Kasir hanya lihat data milik sendiri |
| Input Barang Masuk | ✅ | ❌ | Admin hanya monitor, tidak input |
| Hapus Barang Masuk | ❌ | ✅ | Rollback stok otomatis |
| Input Penjualan | ✅ | ✅ | Keduanya bisa melayani pelanggan |
| Edit Transaksi Penjualan | ❌ | ✅ | Mencegah manipulasi data oleh kasir |
| Void / Hapus Penjualan | ❌ | ✅ | Rollback stok otomatis |
| Riwayat Penjualan | ⚠️ | ✅ | Kasir hanya lihat riwayat hari ini |
| Kelola Produk & Kategori | ❌ | ✅ | Master data hanya Admin |
| Kelola Supplier | ❌ | ✅ | Master data hanya Admin |
| Kelola Akun Pengguna | ❌ | ✅ | Manajemen user hanya Admin |
| Laporan Lengkap | ❌ | ✅ | Kasir hanya laporan pribadi |

---

## Tech Stack

| Layer | Teknologi |
|---|---|
| Backend Framework | CodeIgniter 3.x (PHP) |
| Frontend Template | AdminLTE 3.x |
| Database | MySQL 8.0 |
| CSS | Custom CSS + Bootstrap 4 |
| Icons | Font Awesome 5 |
| Font | Plus Jakarta Sans, DM Sans |
| Server | Apache — XAMPP / Laragon |

---

## Struktur Database

```
users           products          categories
─────────       ──────────        ──────────
id_user    ─── id_product ─────── id_category
username        id_category       nama_kategori
password        nama_produk
role            satuan
                harga_beli        suppliers
                harga_jual        ──────────
                stok              id_supplier
                                  kode_supplier
                                  nama_supplier
                                  no_telp
purchases ─────────────────────── id_supplier
─────────
id_purchase
id_supplier
id_user ────── users
no_faktur
tgl_beli
total_bayar

purchase_details        sales
────────────────        ─────
id_detail               id_sale
id_purchase             id_user ─── users
id_product              kode_transaksi
qty                     nama_pelanggan
purchase_price          tgl_jual
subtotal                total_harga
                        bayar
                        kembalian
                        catatan
                        status

                sale_details
                ────────────
                id_detail
                id_sale ─── sales
                id_product
                qty
                harga_jual
                subtotal
```

---

## Cara Instalasi

### Prasyarat

- PHP >= 7.4
- MySQL >= 8.0
- Apache — XAMPP, Laragon, atau WAMP
- Git

### Langkah-langkah

**1. Clone repository**

```bash
git clone https://github.com/username/sipordjo.git
cd sipordjo
```

**2. Pindahkan ke folder server**

```bash
# XAMPP
cp -r sipordjo/ C:/xampp/htdocs/sipordjo

# Laragon
cp -r sipordjo/ C:/laragon/www/sipordjo
```

**3. Import database**

Buka phpMyAdmin, buat database baru:

```sql
CREATE DATABASE db_pordjo
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

Kemudian import file `database/db_pordjo.sql`.

Jika perlu menambahkan kolom untuk modul penjualan, jalankan juga:

```sql
ALTER TABLE `sales`
    ADD COLUMN `nama_pelanggan` VARCHAR(100) NULL DEFAULT NULL AFTER `id_user`,
    ADD COLUMN `catatan` TEXT NULL DEFAULT NULL AFTER `kembalian`;
```

**4. Konfigurasi database**

Edit `application/config/database.php`:

```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'db_pordjo',
    'dbdriver' => 'mysqli',
);
```

**5. Konfigurasi base URL**

Edit `application/config/config.php`:

```php
$config['base_url'] = 'http://localhost/sipordjo/';
```

**6. Akun default**

| Role | Username | Password |
|---|---|---|
| Admin | `admin` | `admin123` |
| Kasir | `kasir01` | `kasir123` |

> ⚠️ Segera ganti password default setelah pertama kali login.

**7. Buka aplikasi**

```
http://localhost/sipordjo/
```

---

## Struktur Direktori

```
sipordjo/
├── application/
│   ├── config/
│   │   ├── config.php
│   │   ├── database.php
│   │   └── routes.php
│   ├── controllers/
│   │   ├── admin/
│   │   │   ├── Admin.php
│   │   │   ├── Penjualan.php
│   │   │   ├── Barang_masuk.php
│   │   │   ├── Produk.php
│   │   │   ├── Kategori.php
│   │   │   ├── Supplier.php
│   │   │   └── Users.php
│   │   ├── kasir/
│   │   │   ├── Kasir.php
│   │   │   └── Penjualan.php
│   │   └── Auth.php
│   ├── models/
│   │   └── admin/
│   │       ├── M_sale.php
│   │       ├── M_purchase.php
│   │       ├── M_produk.php
│   │       ├── M_supplier.php
│   │       ├── M_kategori.php
│   │       └── M_users.php
│   └── views/
│       ├── admin/
│       │   ├── dashboard_admin.php
│       │   ├── v_penjualan.php
│       │   ├── v_penjualan_form.php
│       │   ├── v_penjualan_detail.php
│       │   ├── v_penjualan_struk.php
│       │   ├── v_barang_masuk.php
│       │   ├── v_barang_masuk_form.php
│       │   ├── v_barang_masuk_detail.php
│       │   ├── v_produk.php
│       │   ├── v_kategori.php
│       │   ├── v_supplier.php
│       │   └── v_users.php
│       ├── kasir/
│       │   ├── dashboard_kasir.php
│       │   ├── v_penjualan.php
│       │   ├── v_penjualan_form.php
│       │   └── v_penjualan_struk.php
│       ├── templates/
│       │   ├── header.php
│       │   ├── sidebar.php
│       │   └── footer.php
│       └── auth/
│           └── login.php
├── assets/
│   └── images/
│       └── logo.png
├── database/
│   ├── db_pordjo.sql
│   └── penjualan_schema.sql
└── README.md
```

---

## Alur Sistem

### Alur Penjualan Offline

```
Kasir / Admin
     │
     ▼
Buka Form Transaksi
(kode TRX otomatis, grid produk + stok real-time)
     │
     ▼
Pilih Produk & Masukkan Qty
(validasi stok di frontend)
     │
     ▼
Input Jumlah Bayar
(kembalian terhitung otomatis)
     │
     ▼
Klik Simpan Transaksi
     │
     ├── Validasi stok ulang di backend
     │
     ├── trans_start()
     │     ├── INSERT → sales
     │     ├── INSERT → sale_details (loop per item)
     │     └── UPDATE stok products (stok - qty)
     │
     └── trans_complete()
           ├── Sukses → halaman Struk / Nota
           └── Gagal  → rollback semua, tampilkan error
```

### Alur Barang Masuk

```
Kasir
     │
     ▼
Buka Form Barang Masuk
(no. faktur otomatis: BMK-YYYYMMDD-XXX)
     │
     ▼
Pilih Supplier + Input Item
     │
     ▼
Simpan Nota
     │
     ├── trans_start()
     │     ├── INSERT → purchases
     │     ├── INSERT → purchase_details (loop per item)
     │     └── UPDATE stok products (stok + qty)
     │
     └── trans_complete()

Admin (jika perlu hapus)
     │
     ├── trans_start()
     │     ├── UPDATE stok products (rollback: stok - qty)
     │     ├── DELETE purchase_details
     │     └── DELETE purchases
     │
     └── trans_complete()
```

---

## Screenshot

> Screenshot akan ditambahkan setelah deployment.

| Halaman | Preview |
|---|---|
| Login | coming soon |
| Dashboard Admin | coming soon |
| Dashboard Kasir | coming soon |
| Form POS Penjualan | coming soon |
| Struk Transaksi | coming soon |
| Riwayat Barang Masuk | coming soon |

---

## Dibuat oleh

| Nama | Instagram | Study |
---
| Rheza Rifalsya Hermawan | @zx_zaaa | Management Informathics |

**Instansi:**

Politeknik LP3i Jakarta

## Lisensi

Proyek ini dibuat untuk keperluan Tugas Akhir dan bersifat open source di bawah lisensi [MIT](LICENSE).
