# Dokumentasi Sistem Manajemen Barang PT Pordjo Steelindo Perkasa

> **Tugas Akhir** — Sistem Informasi Manajemen Stok & Penjualan Berbasis Web  
> **Studi Kasus:** PT Pordjo Steelindo Perkasa (Distributor Baja & Besi)

---

## 1. Gambaran Umum Sistem

### 1.1 Apa Itu Sistem Ini?

Sistem ini adalah **aplikasi Point of Sale (POS) berbasis web** yang dirancang khusus untuk mengelola operasional harian PT Pordjo Steelindo Perkasa, sebuah perusahaan distributor baja dan besi. Sistem ini mencakup:

- **Manajemen Stok** — Pencatatan produk, kategori, stok masuk, dan penyesuaian stok (opname)
- **Transaksi Penjualan** — Pemrosesan kasir dengan validasi stok real-time, perhitungan PPN 11%, dan pencetakan nota
- **Barang Masuk (Restocking)** — Pencatatan pembelian dari supplier dengan perhitungan Average Cost otomatis
- **Laporan Penjualan** — Analisis omzet, produk terlaris, performa kasir, dan chart visualisasi
- **Kelola Akun** — Manajemen user dengan dua role (Admin & Kasir)

### 1.2 Teknologi yang Digunakan

| Komponen | Teknologi |
|---|---|
| **Framework** | CodeIgniter 3 (PHP MVC) |
| **Database** | MySQL |
| **Frontend** | HTML5, CSS3 (Vanilla), JavaScript |
| **UI Framework** | AdminLTE 3.2 (layout dasar) |
| **Font** | DM Sans (Google Fonts) |
| **Icon** | Font Awesome 5 |
| **Server Lokal** | Laragon (Apache + MySQL) |

### 1.3 Arsitektur MVC

```
application/
├── controllers/
│   ├── Auth.php                    ← Login & Logout
│   ├── admin/                      ← 8 controller khusus Admin
│   │   ├── Admin.php               ← Dashboard Admin
│   │   ├── Kategori.php            ← CRUD Kategori Produk
│   │   ├── Produk.php              ← CRUD Produk + Opname Stok
│   │   ├── Supplier.php            ← CRUD Supplier
│   │   ├── Barang_masuk.php        ← CRUD Barang Masuk
│   │   ├── Penjualan.php           ← CRUD Penjualan + Cetak Nota
│   │   ├── Laporan.php             ← Laporan Global
│   │   └── Users.php               ← CRUD Kelola Akun
│   └── kasir/                      ← 7 controller khusus Kasir
│       ├── Kasir.php               ← Dashboard Kasir
│       ├── Produk.php              ← Lihat + Update Stok
│       ├── Supplier.php            ← Read-Only Supplier
│       ├── Barang_masuk.php        ← Input Barang Masuk (data sendiri)
│       ├── Penjualan.php           ← Input Penjualan + Cetak Nota
│       ├── Laporan_kasir.php       ← Laporan Penjualan Sendiri
│       └── Riwayat.php             ← Riwayat Transaksi Sendiri
├── models/
│   ├── M_auth.php                  ← Cek login
│   └── admin/                      ← Model shared (dipakai Admin & Kasir)
│       ├── M_produk.php            ← Query produk, stok, audit trail
│       ├── M_kategori.php          ← Query kategori
│       ├── M_supplier.php          ← Query supplier
│       ├── M_sale.php              ← Query penjualan (atomic transaction)
│       ├── M_purchase.php          ← Query barang masuk (atomic transaction)
│       └── M_users.php             ← Query kelola akun
└── views/
    ├── login.php                   ← Halaman login
    ├── layout/
    │   ├── header.php              ← Navbar + Profile Dropdown
    │   ├── sidebar.php             ← Sidebar navigasi (role-aware)
    │   └── footer.php              ← Footer + script global
    ├── admin/                      ← View halaman Admin
    └── kasir/                      ← View halaman Kasir
```

### 1.4 Struktur Database

| Tabel | Fungsi | Relasi |
|---|---|---|
| `users` | Akun pengguna (admin/kasir) | → `sales`, `purchases` |
| `categories` | Kategori produk | → `products` |
| `products` | Master data produk | → `sale_details`, `purchase_details` |
| `suppliers` | Data supplier/pemasok | → `purchases` |
| `sales` | Header transaksi penjualan | → `sale_details` |
| `sale_details` | Detail item per transaksi jual | FK: `sales`, `products` |
| `purchases` | Header transaksi barang masuk | → `purchase_details` |
| `purchase_details` | Detail item per barang masuk | FK: `purchases`, `products` |
| `stok_log` | Audit trail perubahan stok manual | FK: `products`, `users` |
| `harga_log` | Audit trail perubahan harga | FK: `products`, `users` |

---

## 2. Alur Kerja Sistem

### 2.1 Alur Login & Autentikasi

```
User buka aplikasi → Halaman Login
    ↓
Input username & password
    ↓
Auth Controller → M_auth->cek_login()
    ↓
[Cek 1] User ditemukan? → Tidak → "Username tidak ditemukan"
    ↓ Ya
[Cek 2] Status nonaktif? → Ya → "Akun telah dinonaktifkan"
    ↓ Tidak
[Cek 3] Password cocok? → Tidak → "Password salah"
    ↓ Ya
Set Session (id_user, username, nama, role, logged_in, login_time)
    ↓
[Role = admin] → redirect ke Dashboard Admin
[Role = kasir] → redirect ke Dashboard Kasir
```

**Session Guard:** Setiap controller memiliki 2 lapis penjagaan di `__construct()`:
1. **Cek login** — Jika belum login, redirect ke halaman `auth`
2. **Cek role** — Jika role tidak sesuai, redirect ke halaman role-nya sendiri

### 2.2 Alur Transaksi Penjualan (Jantung POS)

```
Kasir/Admin buka form "Transaksi Baru"
    ↓
Sistem generate Kode Transaksi otomatis (TRX-YYYYMMDD-001)
    ↓
Kasir pilih produk → Sistem tampilkan stok & harga dari database
    ↓
Kasir input qty, isi data pelanggan, pilih metode bayar
    ↓
Submit form → Controller simpan()
    ↓
[VALIDASI 1] Kode transaksi & bayar tidak kosong?
[VALIDASI 2] Keranjang tidak kosong?
[VALIDASI 3] Per-item:
   ├── Qty > 0? (Anti quantity negatif)
   ├── Stok cukup? (Real-time check ke DB)
   └── Harga jual > harga beli? (Anti jual rugi)
    ↓
Hitung: Subtotal → Total → PPN 11% → Grand Total
    ↓
[VALIDASI 4] Bayar >= Grand Total?
    ↓
Hitung Kembalian = Bayar - Grand Total
    ↓
M_sale->simpan_transaksi() [ATOMIC TRANSACTION]
   ├── trans_start()
   ├── INSERT sales (header nota)
   ├── Ambil insert_id()
   ├── FOREACH item:
   │   ├── INSERT sale_details (keranjang)
   │   └── UPDATE products SET stok = stok - qty (pengurangan otomatis)
   ├── trans_complete()
   └── Return: id_sale atau FALSE
    ↓
Redirect ke halaman Detail / Cetak Nota
```

### 2.3 Alur Barang Masuk (Restocking)

```
Admin/Kasir buka form "Tambah Barang Masuk"
    ↓
Sistem generate No. Faktur otomatis (BMK-YYYYMMDD-001)
    ↓
Pilih supplier, tanggal, isi produk + qty + harga beli
    ↓
[VALIDASI] No. faktur unik? Supplier & tanggal diisi? Minimal 1 produk?
    ↓
Upload Surat Jalan (opsional, max 5MB, jpg/png/pdf)
    ↓
M_purchase->simpan_transaksi() [ATOMIC TRANSACTION]
   ├── trans_start()
   ├── INSERT purchases (header faktur)
   ├── FOREACH item:
   │   ├── INSERT purchase_details
   │   ├── Ambil data produk lama (stok & harga beli lama)
   │   ├── Hitung AVERAGE COST:
   │   │   (Stok Lama × Modal Lama + Qty Masuk × Modal Baru) / Total Stok Baru
   │   ├── Log perubahan harga ke harga_log (jika berubah)
   │   └── UPDATE products: stok + qty, harga_beli = rata-rata
   ├── trans_complete()
   └── Return: id_purchase atau FALSE
```

### 2.4 Alur Hapus Data (Soft Delete)

Sistem menggunakan mekanisme **soft delete** untuk menjaga integritas data transaksi:

```
Admin klik "Hapus" pada Produk/Supplier/User
    ↓
Controller hapus() → Model has_transaksi($id)
    ↓
[Cek] Apakah data ini punya riwayat transaksi?
    ↓
├── TIDAK ADA transaksi → DELETE permanen dari database
│
└── ADA transaksi → SOFT DELETE
    ├── UPDATE status = 'nonaktif'
    ├── Data tetap tersimpan di database
    ├── Tidak muncul di form transaksi baru
    ├── Tampil di section "Nonaktif" dengan styling khusus
    └── Bisa diaktifkan kembali oleh Admin
```

**Berlaku untuk 3 modul:** Produk, Supplier, dan User (Kelola Akun)

---

## 3. Hak Akses (Role-Based Access Control)

### 3.1 Ringkasan Peran

| Aspek | Admin (Superuser) | Kasir (Operator) |
|---|---|---|
| **Scope Data** | **Global** — semua data sistem | **Personal** — hanya data milik sendiri |
| **Dashboard** | Statistik global + chart + monitoring | Statistik personal hari ini |
| **Kategori** | Full CRUD | ❌ Tidak ada akses |
| **Produk** | Full CRUD + opname | Lihat + opname stok saja |
| **Supplier** | Full CRUD | Read-only (lihat saja) |
| **Barang Masuk** | Lihat semua + input + hapus | Input + lihat milik sendiri |
| **Penjualan** | Lihat semua + input + cetak | Input + cetak (hari ini, milik sendiri) |
| **Laporan** | Laporan global semua kasir | Laporan penjualan sendiri |
| **Kelola Akun** | Full CRUD | ❌ Tidak ada akses |
| **Riwayat** | ❌ (menggunakan Penjualan) | ✅ Fitur eksklusif kasir |

### 3.2 Perbedaan Query Data

| Fitur | Admin | Kasir |
|---|---|---|
| List Penjualan | `get_all()` — semua | `get_today_by_kasir($id)` — hari ini saja |
| List Barang Masuk | `get_all()` — semua | `get_by_user($id)` — milik sendiri |
| Detail Barang Masuk | Bebas akses | Validasi kepemilikan (cek `id_user`) |
| Laporan | `get_laporan()` — global | `get_laporan_kasir($id)` — personal |
| Top Produk | `get_top_produk()` — 5 global | `get_top_produk_kasir($id)` — 10 personal |

### 3.3 Menu Sidebar

**Admin:** Dashboard, Kategori Produk, Stok Produk, Data Supplier, Barang Masuk, Penjualan Offline, Laporan Penjualan, Kelola Akun, Logout

**Kasir:** Dashboard, Stok Produk, Data Supplier (read-only), Barang Masuk, Penjualan Offline, Laporan Penjualan (personal), Riwayat Transaksi, Logout

---

## 4. Fitur Keamanan & Integritas Data

### 4.1 Proteksi Transaksi (Atomic Transaction)

Penjualan dan Barang Masuk menggunakan **Database Transaction** (`trans_start()` / `trans_complete()`). Jika ada error di tengah proses (misal: mati lampu saat menyimpan item ke-3 dari 5), maka **seluruh data dibatalkan** (rollback) — tidak ada data "setengah masuk".

### 4.2 Validasi Stok Real-Time

Sebelum menyimpan penjualan, sistem mengecek stok **langsung ke database** untuk setiap item di keranjang. Jika stok kurang, **seluruh transaksi ditolak** dan kasir diberi tahu produk mana yang habis.

### 4.3 Anti Jual Rugi

Sistem menolak transaksi jika harga jual ≤ harga beli (modal). Berlaku di form tambah produk dan form penjualan.

### 4.4 Anti Quantity Negatif

Input qty ≤ 0 pada form penjualan akan ditolak oleh controller.

### 4.5 Audit Trail

| Tabel Log | Mencatat |
|---|---|
| `stok_log` | Setiap perubahan stok manual: siapa, kapan, dari berapa, ke berapa |
| `harga_log` | Setiap perubahan harga beli otomatis dari Average Cost |

### 4.6 Supplier Snapshot

Saat barang masuk disimpan, nama supplier saat itu di-snapshot ke kolom `nama_supplier_snapshot`. Jika supplier diedit di kemudian hari, **riwayat transaksi lama tidak berubah**.

### 4.7 Proteksi Tambahan

- **Duplikasi faktur dicegah** — No. faktur harus unik
- **Admin tidak bisa hapus dirinya sendiri** — Proteksi di controller Users
- **Kategori tidak bisa dihapus** jika masih ada produk terkait
- **User nonaktif tidak bisa login** — Dicek di Auth controller
- **XSS Protection** — Semua input menggunakan `$this->input->post('field', TRUE)`

---

## 5. Fitur Bisnis Utama

### 5.1 Perhitungan PPN 11%

Setiap transaksi penjualan menghitung PPN secara otomatis:
```
Grand Total = Subtotal Produk + (Subtotal × 11%)
```

### 5.2 Average Cost (Rata-Rata Harga Modal)

Saat barang masuk dengan harga beli yang berbeda dari harga lama, sistem menghitung harga modal baru:
```
Harga Beli Baru = (Stok Lama × Harga Lama + Qty Masuk × Harga Masuk) / Total Stok Baru
```

### 5.3 Metode Pembayaran

Sistem mendukung dua metode:
- **Cash** — Kasir input nominal bayar, sistem hitung kembalian
- **Transfer** — Nominal bayar otomatis = grand total, dengan field nomor referensi dan upload bukti transfer

### 5.4 Generate Kode Otomatis

| Entitas | Format | Contoh |
|---|---|---|
| Kode Transaksi | `TRX-YYYYMMDD-NNN` | TRX-20260518-001 |
| No. Faktur Barang Masuk | `BMK-YYYYMMDD-NNN` | BMK-20260518-001 |
| Kode Supplier | `SUP-NNN` | SUP-001 |
| Kode Produk | `[3 HURUF KATEGORI]-NNNN` | BAJ-0001 |

Semua kode menggunakan loop anti-bentrok (`while exists → next++`).

### 5.5 Laporan & Analitik

**Admin mendapatkan:**
- Filter tanggal: Hari Ini, Minggu Ini, Bulan Ini, Bulan Lalu, Tahun Ini, Custom
- Chart omzet harian
- Top 5 produk terlaris
- Performa per kasir (jumlah transaksi & omzet)
- Cetak laporan (print-friendly)

**Kasir mendapatkan:**
- Filter tanggal: Hari Ini, Minggu Ini, Bulan Ini, Custom
- Top 10 produk terlaris (personal)
- Cetak laporan setoran
- Halaman riwayat transaksi lengkap

---

## 6. Desain Tampilan (UI/UX)

### 6.1 Tema & Estetika

- **Warna utama:** Biru (`#1a56db`, `#2563eb`) — profesional dan terpercaya
- **Font:** DM Sans — modern, bersih, mudah dibaca
- **Layout:** AdminLTE 3 dengan sidebar collapsible
- **Desain kartu:** Border radius 14px, shadow halus, spacing konsisten
- **Login page:** Split-screen dengan animasi partikel, gradient sweep, dan floating logo

### 6.2 Komponen UI Khas

- **Section Nonaktif** — Border dashed merah, background kuning muda, badge "Nonaktif"
- **Profile Dropdown** — Popup glassmorphism dengan avatar, role badge, dan info sesi
- **Flash Message** — Alert inline dengan animasi shake
- **Stat Cards** — Badge warna-warni dengan ikon dan angka real-time
- **Dark Mode** — Tersedia (toggle di header, disimpan di localStorage)

---

## 7. Daftar Halaman Sistem

### Admin (11 halaman)
1. Login
2. Dashboard Admin
3. Kategori Produk
4. Detail Kategori
5. Stok Produk + Cetak
6. Data Supplier
7. Barang Masuk (list + form + detail)
8. Penjualan Offline (list + form + detail + cetak nota)
9. Laporan Penjualan + Cetak
10. Kelola Akun
11. Logout

### Kasir (10 halaman)
1. Login (shared)
2. Dashboard Kasir
3. Stok Produk
4. Data Supplier (read-only)
5. Barang Masuk (list + form + detail)
6. Penjualan Offline (list + form + detail + cetak nota)
7. Laporan Penjualan Saya + Cetak Setoran
8. Riwayat Transaksi
9. Logout

---

## 8. Tips untuk Sidang

### Alur Demo yang Disarankan
1. **Login** sebagai Admin → tunjukkan dashboard
2. **Tambah Produk** baru → tunjukkan generate kode otomatis
3. **Barang Masuk** → tunjukkan stok bertambah + average cost
4. **Transaksi Penjualan** → tunjukkan validasi stok + PPN + cetak nota
5. **Hapus Produk** yang punya transaksi → tunjukkan soft delete
6. **Laporan** → tunjukkan filter + chart + cetak
7. **Login** sebagai Kasir → tunjukkan perbedaan menu & scope data
8. **Kelola Akun** → tunjukkan nonaktifkan user → coba login → ditolak

### Pertanyaan yang Mungkin Ditanyakan
- *"Bagaimana jika stok habis saat transaksi?"* → Sistem menolak otomatis dengan pesan error
- *"Bagaimana jika admin hapus produk yang punya transaksi?"* → Soft delete, nonaktifkan saja
- *"Bagaimana menghindari data rusak saat mati lampu?"* → Atomic Transaction (rollback otomatis)
- *"Bagaimana keamanan antar role?"* → Session guard 2 lapis di setiap controller
- *"Bagaimana audit trail stok?"* → Tercatat di tabel stok_log dan harga_log

---

> **Dokumen ini dibuat pada:** 18 Mei 2026  
> **Sistem:** Manajemen Barang PT Pordjo Steelindo Perkasa v1.0  
> **Framework:** CodeIgniter 3 + MySQL
