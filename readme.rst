# 🏗️ SIPordjo — Sistem Informasi Manajemen PT Pordjo Steelindo Perkasa

<div align="center">

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-3.x-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![AdminLTE](https://img.shields.io/badge/AdminLTE-3.x-3C8DBC?style=for-the-badge)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

**Sistem manajemen inventori & penjualan offline berbasis web untuk distributor besi & baja.**

[Demo](#) · [Laporan Bug](#) · [Request Fitur](#)

</div>

---

## 📋 Daftar Isi

- [Tentang Proyek](#-tentang-proyek)
- [Fitur Utama](#-fitur-utama)
- [Hak Akses (RBAC)](#-hak-akses-rbac)
- [Tech Stack](#-tech-stack)
- [Struktur Database](#-struktur-database)
- [Cara Instalasi](#-cara-instalasi)
- [Struktur Direktori](#-struktur-direktori)
- [Alur Sistem](#-alur-sistem)
- [Screenshot](#-screenshot)
- [Kontributor](#-kontributor)

---

## 🏢 Tentang Proyek

**SIPordjo** adalah sistem informasi manajemen yang dirancang khusus untuk kebutuhan operasional **PT Pordjo Steelindo Perkasa**, sebuah distributor material besi dan baja yang berlokasi di Kaliabang. Sistem ini dibangun sebagai Tugas Akhir (TA) untuk mendigitalisasi proses pencatatan barang masuk, penjualan offline, manajemen stok, dan pelaporan yang sebelumnya dilakukan secara manual.

### Latar Belakang

Sebelum sistem ini ada, pencatatan transaksi dilakukan secara manual menggunakan buku besar, yang rentan terhadap kesalahan hitung, kehilangan data, dan lambatnya proses rekap laporan. SIPordjo hadir sebagai solusi digital yang terintegrasi dan real-time.

---

## ✨ Fitur Utama

### 📊 Dashboard
- **Dashboard Admin** — Ringkasan harian: total penjualan, omzet, stok menipis, barang masuk hari ini dengan monitoring real-time
- **Dashboard Kasir** — Ringkasan transaksi pribadi kasir hari ini, target harian, dan shortcut aksi cepat
- Grafik penjualan 7 hari terakhir
- Notifikasi barang masuk otomatis

### 📦 Manajemen Stok
- CRUD kategori produk
- CRUD produk dengan tracking stok real-time
- Indikator stok menipis (warning saat stok ≤ 10)
- Pencarian & filter produk

### 🚚 Barang Masuk
- Input nota pembelian dari supplier (khusus Kasir)
- Multi-item per nota transaksi
- Stok otomatis bertambah saat nota disimpan (atomic transaction)
- Riwayat barang masuk dengan detail per faktur
- Fitur hapus dengan rollback stok otomatis (khusus Admin)

### 🛒 Penjualan Offline (POS)
- Form transaksi bergaya Point of Sale (POS)
- Pilih produk via grid dengan info stok real-time
- Keranjang belanja dinamis (tambah/kurang qty)
- Kalkulasi kembalian otomatis + quick amount buttons
- Validasi stok sebelum simpan (dua lapis: frontend + backend)
- Database transaction atomik (semua atau tidak sama sekali)
- Cetak struk/nota setelah transaksi berhasil
- Fitur Edit & Void transaksi (khusus Admin, dengan rollback stok)

### 👥 Manajemen Pengguna
- CRUD akun pengguna
- Pembagian role: Admin & Kasir
- Keamanan: password di-hash, session-based authentication

### 🏭 Data Supplier
- CRUD data supplier lengkap
- Riwayat pembelian per supplier

### 📈 Laporan
- Laporan penjualan harian / bulanan / tahunan
- Export data transaksi

---

## 🔐 Hak Akses (RBAC)

| Fitur | Kasir | Admin | Keterangan |
|---|:---:|:---:|---|
| Dashboard | ✅ | ✅ | Kasir hanya lihat data milik sendiri |
| Input Barang Masuk | ✅ | ❌ | Admin hanya bisa monitor, tidak input |
| Hapus Barang Masuk | ❌ | ✅ | Dengan rollback stok otomatis |
| Input Penjualan | ✅ | ✅ | Keduanya bisa melayani pelanggan |
| Edit Transaksi Penjualan | ❌ | ✅ | Mencegah manipulasi data oleh kasir |
| Void / Hapus Penjualan | ❌ | ✅ | Dengan rollback stok otomatis |
| Riwayat Penjualan | ⚠️ | ✅ | Kasir hanya lihat riwayat hari ini |
| Kelola Produk & Kategori | ❌ | ✅ | Master data hanya Admin |
| Kelola Supplier | ❌ | ✅ | Master data hanya Admin |
| Kelola Akun Pengguna | ❌ | ✅ | Manajemen user hanya Admin |
| Laporan Lengkap | ❌ | ✅ | Kasir hanya laporan pribadi |

---

## 🛠️ Tech Stack

| Layer | Teknologi |
|---|---|
| **Backend Framework** | CodeIgniter 3.x (PHP) |
| **Frontend Template** | AdminLTE 3.x |
| **Database** | MySQL 8.0 |
| **CSS** | Custom CSS + Bootstrap 4 |
| **Icons** | Font Awesome 5 |
| **Font** | Plus Jakarta Sans, DM Sans |
| **Server** | Apache (XAMPP / Laragon) |

---

## 🗄️ Struktur Database

```
┌─────────────┐    ┌──────────────────┐    ┌─────────────────┐
│    users    │    │     products     │    │   categories    │
│─────────────│    │──────────────────│    │─────────────────│
│ id_user     │    │ id_product       │    │ id_category     │
│ username    │    │ id_category  ────┼────│ nama_kategori   │
│ password    │    │ nama_produk      │    │ created_at      │
│ nama_lengkap│    │ satuan           │    └─────────────────┘
│ role        │    │ harga_beli       │
│ created_at  │    │ harga_jual       │    ┌─────────────────┐
└──────┬──────┘    │ stok             │    │    suppliers    │
       │           │ created_at       │    │─────────────────│
       │           └────────┬─────────┘    │ id_supplier     │
       │                    │              │ kode_supplier   │
       │           ┌────────▼─────────┐    │ nama_supplier   │
       │           │  purchase_details│    │ no_telp         │
       │           │──────────────────│    │ alamat          │
       │           │ id_detail        │    │ created_at      │
       │  ┌────────│ id_purchase  ────┤    └────────┬────────┘
       │  │        │ id_product       │             │
       │  │        │ qty              │    ┌────────▼────────┐
       │  │        │ purchase_price   │    │    purchases    │
       │  │        │ subtotal         │    │─────────────────│
       │  │        └──────────────────┘    │ id_purchase     │
       │  │                                │ id_supplier  ───┘
       │  └────────────────────────────────│ id_user      ───┐
       │                                   │ no_faktur       │
       │           ┌──────────────────┐    │ tgl_beli        │
       └───────────│      sales       │    │ total_bayar     │
                   │──────────────────│    │ keterangan      │
                   │ id_sale          │    │ created_at      │
                   │ id_user      ────┘    └─────────────────┘
                   │ kode_transaksi
                   │ nama_pelanggan
                   │ tgl_jual
                   │ total_harga
                   │ bayar
                   │ kembalian
                   │ catatan
                   │ status
                   │ created_at
                   └────────┬─────────
                            │
                   ┌────────▼─────────┐
                   │   sale_details   │
                   │──────────────────│
                   │ id_detail        │
                   │ id_sale          │
                   │ id_product       │
                   │ qty              │
                   │ harga_jual       │
                   │ subtotal         │
                   └──────────────────┘
```

---

## 🚀 Cara Instalasi

### Prasyarat
- PHP >= 7.4
- MySQL >= 8.0
- Apache (XAMPP, Laragon, atau WAMP)
- Git

### Langkah Instalasi

**1. Clone repository**
```bash
git clone https://github.com/username/sipordjo.git
cd sipordjo
```

**2. Pindahkan ke htdocs / www**
```bash
# XAMPP
cp -r sipordjo/ C:/xampp/htdocs/sipordjo

# Laragon
cp -r sipordjo/ C:/laragon/www/sipordjo
```

**3. Import database**

Buka phpMyAdmin, buat database baru:
```sql
CREATE DATABASE db_pordjo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
Lalu import file `database/db_pordjo.sql` yang ada di repository.

Jika ingin menambahkan kolom baru untuk modul penjualan, jalankan:
```sql
-- Lihat file database/penjualan_schema.sql
ALTER TABLE `sales`
    ADD COLUMN `nama_pelanggan` VARCHAR(100) NULL DEFAULT NULL AFTER `id_user`,
    ADD COLUMN `catatan` TEXT NULL DEFAULT NULL AFTER `kembalian`;
```

**4. Konfigurasi database**

Edit file `application/config/database.php`:
```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',         // sesuaikan
    'password' => '',             // sesuaikan
    'database' => 'db_pordjo',
    'dbdriver' => 'mysqli',
    // ...
);
```

**5. Konfigurasi base URL**

Edit file `application/config/config.php`:
```php
$config['base_url'] = 'http://localhost/sipordjo/';
```

**6. Akun default**

Setelah import database, akun bawaan untuk login:

| Role | Username | Password |
|---|---|---|
| Admin | `admin` | `admin123` |
| Kasir | `kasir01` | `kasir123` |

> ⚠️ **Segera ganti password default setelah pertama login!**

**7. Jalankan aplikasi**

Buka browser dan akses:
```
http://localhost/sipordjo/
```

---

## 📁 Struktur Direktori

```
sipordjo/
├── application/
│   ├── config/
│   │   ├── config.php          # Konfigurasi utama CI
│   │   ├── database.php        # Konfigurasi koneksi DB
│   │   └── routes.php          # Routing URL
│   ├── controllers/
│   │   ├── admin/
│   │   │   ├── Admin.php       # Dashboard Admin
│   │   │   ├── Penjualan.php   # Modul penjualan (admin)
│   │   │   ├── Barang_masuk.php
│   │   │   ├── Produk.php
│   │   │   ├── Kategori.php
│   │   │   ├── Supplier.php
│   │   │   └── Users.php
│   │   ├── kasir/
│   │   │   ├── Kasir.php       # Dashboard Kasir
│   │   │   └── Penjualan.php   # Modul penjualan (kasir)
│   │   └── Auth.php            # Login & logout
│   ├── models/
│   │   └── admin/
│   │       ├── M_sale.php      # Model transaksi penjualan
│   │       ├── M_purchase.php  # Model barang masuk
│   │       ├── M_produk.php    # Model produk
│   │       ├── M_supplier.php  # Model supplier
│   │       ├── M_kategori.php  # Model kategori
│   │       └── M_users.php     # Model pengguna
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
│   ├── images/
│   │   └── logo.png
│   ├── css/
│   └── js/
├── database/
│   ├── db_pordjo.sql           # SQL dump lengkap
│   └── penjualan_schema.sql    # Patch kolom tambahan
└── README.md
```

---

## 🔄 Alur Sistem

### Alur Penjualan Offline

```
Kasir/Admin
    │
    ▼
[Buka Form Transaksi]
    │  Generate kode TRX otomatis
    │  Tampilkan grid produk + stok real-time
    │
    ▼
[Pilih Produk & Qty]
    │  Validasi stok (frontend)
    │  Kalkulasi total otomatis
    │
    ▼
[Input Bayar]
    │  Kalkulasi kembalian otomatis
    │
    ▼
[Klik Simpan Transaksi]
    │
    ├──▶ Validasi stok ulang (backend, cegah race condition)
    │
    ├──▶ trans_start()
    │       │
    │       ├── INSERT ke tabel sales
    │       ├── INSERT ke tabel sale_details (loop per item)
    │       └── UPDATE stok products (stok - qty)
    │
    └──▶ trans_complete()
            │
            ├── Sukses ──▶ Redirect ke halaman Struk/Nota
            └── Gagal  ──▶ Rollback semua, tampilkan error
```

### Alur Barang Masuk

```
Kasir
    │
    ▼
[Buka Form Barang Masuk]
    │  Generate no. faktur otomatis (BMK-YYYYMMDD-XXX)
    │
    ▼
[Pilih Supplier & Input Item]
    │
    ▼
[Simpan Nota]
    │
    ├──▶ trans_start()
    │       │
    │       ├── INSERT ke tabel purchases
    │       ├── INSERT ke tabel purchase_details (loop per item)
    │       └── UPDATE stok products (stok + qty)
    │
    └──▶ trans_complete()

Admin (jika perlu hapus)
    │
    ▼
    ├──▶ trans_start()
    │       │
    │       ├── UPDATE stok products (stok - qty) — rollback
    │       ├── DELETE purchase_details
    │       └── DELETE purchases
    │
    └──▶ trans_complete()
```

---

## 📸 Screenshot

> *Screenshot akan ditambahkan setelah deployment.*

| Halaman | Preview |
|---|---|
| Login | *(coming soon)* |
| Dashboard Admin | *(coming soon)* |
| Dashboard Kasir | *(coming soon)* |
| Form POS Penjualan | *(coming soon)* |
| Struk Transaksi | *(coming soon)* |
| Riwayat Barang Masuk | *(coming soon)* |

---

## ⚙️ Konfigurasi Tambahan

### Timezone

Semua model menggunakan `Asia/Jakarta`. Pastikan PHP server mendukung:
```php
// Sudah ditangani di setiap model:
date_default_timezone_set('Asia/Jakarta');
```

### CSRF Protection

Aktif secara default di CodeIgniter. Semua form POST sudah menyertakan token CSRF:
```php
<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>"
       value="<?= $this->security->get_csrf_hash() ?>">
```

### Session

Konfigurasi session di `application/config/config.php`:
```php
$config['sess_driver']          = 'files';
$config['sess_cookie_name']     = 'ci_session';
$config['sess_expiration']      = 7200;  // 2 jam
$config['sess_save_path']       = NULL;
$config['sess_match_ip']        = FALSE;
$config['sess_time_to_update']  = 300;
$config['sess_regenerate_destroy'] = FALSE;
```

---

## 🐛 Diketahui: Bug & Limitasi

- Belum ada fitur export laporan ke PDF/Excel
- Belum ada fitur pencarian produk via barcode scanner
- Belum responsive sempurna di layar < 768px untuk halaman form POS
- Belum ada fitur backup database via UI

---

## 🤝 Kontributor

<table>
  <tr>
    <td align="center">
      <b>Nama Mahasiswa</b><br/>
      <sub>NIM: XXXXXXXXXX</sub><br/>
      <sub>Universitas / Program Studi</sub>
    </td>
  </tr>
</table>

**Dosen Pembimbing:** *Nama Dosen Pembimbing*

---

## 📄 Lisensi

Proyek ini dibuat untuk keperluan **Tugas Akhir** dan bersifat **open source** di bawah lisensi [MIT](LICENSE).

---

<div align="center">

Dibuat dengan ☕ dan 🔥 untuk PT Pordjo Steelindo Perkasa

**[⬆ Kembali ke Atas](#)**

</div>
