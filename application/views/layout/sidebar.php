<aside class="main-sidebar" style="
    background: #ffffff !important;
    border-right: 1px solid #e8ecf0;
    box-shadow: 2px 0 12px rgba(0,0,0,0.06);
">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');
    .main-sidebar, .main-header, .sb-label, .sb-section-label, .brand-name, .brand-sub, .user-name, .user-greeting, .nav-link { font-family: 'DM Sans', 'Segoe UI', sans-serif !important; }
    .fas, .far, .fab, .fa { font-family: "Font Awesome 5 Free" !important; font-weight: 900; }
    .main-sidebar { position: fixed !important; top: 0; bottom: 0; left: 0; height: 100vh !important; overflow-y: auto; z-index: 1038; }
    .main-sidebar::-webkit-scrollbar { width: 4px; }
    .main-sidebar::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 4px; }
    .sidebar-brand-wrapper { display: flex; align-items: center; justify-content: center; padding: 15px; border-bottom: 1px solid #e8ecf0 !important; text-decoration: none !important; background: #ffffff !important; min-height: 100px; transition: all 0.3s ease-in-out !important; }
    .sidebar-logo-icon { height: 70px; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease-in-out !important; }
    .sidebar-logo-icon img { height: 100%; width: auto; max-width: 180px; object-fit: contain; transition: all 0.3s ease-in-out !important; }
    .sidebar { background: #ffffff !important; display: flex !important; flex-direction: column; height: calc(100vh - 100px) !important; }
    nav.mt-1 { display: flex; flex-direction: column; flex: 1; padding-bottom: 10px; }
    .sb-section-label { display: block; padding: 14px 18px 5px; font-size: 9.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #9ca3af; }
    .sb-nav-list { list-style: none; padding: 0 8px !important; margin: 0 !important; }
    .sb-nav-list .nav-item { margin-bottom: 1px; }
    .main-sidebar .sb-nav-list .nav-link { display: flex !important; align-items: center !important; gap: 10px !important; padding: 8px 10px !important; border-radius: 8px !important; color: #4b5563 !important; font-size: 13px !important; font-weight: 500 !important; text-decoration: none !important; transition: background 0.15s, color 0.15s !important; background: transparent !important; width: 100%; }
    .main-sidebar .sb-nav-list .nav-link:hover { background: #f0f4ff !important; color: #1a56db !important; }
    .main-sidebar .sb-nav-list .nav-link.active { background: #eef2ff !important; color: #1a56db !important; font-weight: 600 !important; }
    .sb-icon { width: 28px; height: 28px; min-width: 28px; background: #f3f4f6; border-radius: 7px; display: flex !important; align-items: center; justify-content: center; font-size: 12px; color: #6b7280; transition: background 0.15s, color 0.15s; }
    .main-sidebar .sb-nav-list .nav-link:hover .sb-icon, .main-sidebar .sb-nav-list .nav-link.active .sb-icon { background: #dbeafe; color: #1a56db; }
    .sb-arrow { margin-left: auto; font-size: 10px; color: #d1d5db; transition: transform 0.2s; flex-shrink: 0; }
    .menu-open > .nav-link .sb-arrow, .nav-item.has-treeview.menu-is-opening > .nav-link .sb-arrow { transform: rotate(90deg); color: #1a56db; }
    .sb-label { flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .sb-submenu { list-style: none !important; margin: 2px 0 4px 16px !important; padding: 0 0 0 10px !important; border-left: 2px solid #e5e7eb !important; }
    .main-sidebar .sb-submenu .nav-link { gap: 8px !important; padding: 6px 10px !important; font-size: 12.5px !important; color: #6b7280 !important; }
    .sb-dot { width: 5px; height: 5px; min-width: 5px; background: #d1d5db; border-radius: 50%; transition: background 0.15s; }
    .main-sidebar .sb-submenu .nav-link:hover .sb-dot, .main-sidebar .sb-submenu .nav-link.active .sb-dot { background: #1a56db; }
    .main-sidebar .sb-submenu .nav-link.active { color: #1a56db !important; font-weight: 600 !important; }
    .sb-divider { border: none; border-top: 1px solid #e8ecf0; margin-top: auto !important; margin-bottom: 8px; margin-left: 12px; margin-right: 12px; }
    .main-sidebar .sb-logout-link { display: flex !important; align-items: center !important; gap: 10px !important; padding: 8px 10px !important; margin: 0 8px !important; border-radius: 8px !important; color: #ef4444 !important; font-size: 13px !important; font-weight: 600 !important; text-decoration: none !important; transition: background 0.15s !important; background: transparent !important; margin-bottom: 16px !important; width: calc(100% - 16px); }
    .main-sidebar .sb-logout-link:hover { background: #fef2f2 !important; }
    .sb-icon-red { width: 28px; height: 28px; min-width: 28px; background: #fee2e2; border-radius: 7px; display: flex; align-items: center; justify-content: center; font-size: 12px; color: #ef4444; }
    .sidebar-mini.sidebar-collapse .main-sidebar:not(:hover) .sidebar-brand-wrapper { padding: 10px 8px; }
    .sidebar-mini.sidebar-collapse .main-sidebar:not(:hover) .sidebar-logo-icon { height: 30px; }
    .sidebar-mini.sidebar-collapse .main-sidebar:not(:hover) .sidebar-logo-icon img { max-width: 35px; }
    .sidebar-mini.sidebar-collapse .main-sidebar:not(:hover) .sb-label, .sidebar-mini.sidebar-collapse .main-sidebar:not(:hover) .sb-section-label, .sidebar-mini.sidebar-collapse .main-sidebar:not(:hover) .sb-arrow { display: none !important; }
    .sidebar-mini.sidebar-collapse .main-sidebar:not(:hover) .sb-nav-list .nav-link, .sidebar-mini.sidebar-collapse .main-sidebar:not(:hover) .sb-logout-link { justify-content: center !important; padding: 9px !important; }
</style>

    <?php 
        $role           = $this->session->userdata('role'); 
        $dashboard_link = ($role == 'admin') ? 'admin/admin' : 'kasir/kasir';
        $current_menu   = $this->uri->segment(2);
        if (empty($current_menu) && $role == 'admin')  $current_menu = 'admin';
        elseif (empty($current_menu) && $role == 'kasir') $current_menu = 'kasir';
    ?>

    <a href="<?= site_url($dashboard_link) ?>" class="brand-link sidebar-brand-wrapper">
        <div class="sidebar-logo-icon">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo PT Pordjo">
        </div>
    </a>

    <div class="sidebar">
        <nav class="mt-1">

            <?php if ($role == 'admin'): ?>
                
                <ul class="sb-nav-list">
                    <li class="nav-item">
                        <a href="<?= site_url('admin/admin') ?>" class="nav-link <?= ($current_menu == 'admin') ? 'active' : '' ?>">
                            <span class="sb-icon"><i class="fas fa-tachometer-alt"></i></span>
                            <span class="sb-label">Dashboard</span>
                        </a>
                    </li>
                </ul>

                <span class="sb-section-label">Master Data</span>
                <?php $is_master_active = ($current_menu == 'kategori' || $current_menu == 'produk') ? 'menu-open menu-is-opening' : ''; ?>
                <ul class="sb-nav-list" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview <?= $is_master_active ?>">
                        <a href="#" class="nav-link <?= ($is_master_active != '') ? 'active' : '' ?>">
                            <span class="sb-icon"><i class="fas fa-box"></i></span>
                            <span class="sb-label">Data Material</span>
                            <i class="fas fa-chevron-right sb-arrow"></i>
                        </a>
                        <ul class="nav nav-treeview sb-submenu" style="<?= ($is_master_active != '') ? 'display: block;' : '' ?>">
                            <li class="nav-item">
                                <a href="<?= site_url('admin/kategori') ?>" class="nav-link <?= ($current_menu == 'kategori') ? 'active' : '' ?>">
                                    <span class="sb-dot"></span>
                                    <span class="sb-label">Kategori Produk</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('admin/produk') ?>" class="nav-link <?= ($current_menu == 'produk') ? 'active' : '' ?>">
                                    <span class="sb-dot"></span>
                                    <span class="sb-label">Stok Produk</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('admin/supplier') ?>" class="nav-link <?= ($current_menu == 'supplier') ? 'active' : '' ?>">
                            <span class="sb-icon"><i class="fas fa-truck"></i></span>
                            <span class="sb-label">Data Supplier</span>
                        </a>
                    </li>
                </ul>

                <span class="sb-section-label">Transaksi</span>
                <ul class="sb-nav-list">
                    <li class="nav-item">
                        <a href="<?= site_url('admin/barang_masuk') ?>" class="nav-link <?= ($current_menu == 'barang_masuk') ? 'active' : '' ?>">
                            <span class="sb-icon"><i class="fas fa-arrow-circle-down"></i></span>
                            <span class="sb-label">Barang Masuk</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('admin/penjualan') ?>" class="nav-link <?= ($current_menu == 'penjualan') ? 'active' : '' ?>">
                            <span class="sb-icon"><i class="fas fa-shopping-cart"></i></span>
                            <span class="sb-label">Penjualan Offline</span>
                        </a>
                    </li>
                </ul>

                <span class="sb-section-label">Pengaturan</span>
                <ul class="sb-nav-list">
                    <li class="nav-item">
                        <a href="<?= site_url('admin/laporan') ?>" class="nav-link <?= ($current_menu == 'laporan') ? 'active' : '' ?>">
                            <span class="sb-icon"><i class="fas fa-file-invoice-dollar"></i></span>
                            <span class="sb-label">Laporan Penjualan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('admin/users') ?>" class="nav-link <?= ($current_menu == 'users') ? 'active' : '' ?>">
                            <span class="sb-icon"><i class="fas fa-users"></i></span>
                            <span class="sb-label">Kelola Akun</span>
                        </a>
                    </li>
                </ul>

            <?php elseif ($role == 'kasir'): ?>

                <ul class="sb-nav-list">
                    <li class="nav-item">
                        <a href="<?= site_url('kasir/kasir') ?>" class="nav-link <?= ($current_menu == 'kasir') ? 'active' : '' ?>">
                            <span class="sb-icon"><i class="fas fa-tachometer-alt"></i></span>
                            <span class="sb-label">Dashboard</span>
                        </a>
                    </li>
                </ul>

                <span class="sb-section-label">Master Data</span>
                <?php $is_master_active_kasir = ($current_menu == 'produk') ? 'menu-open menu-is-opening' : ''; ?>
                <ul class="sb-nav-list" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview <?= $is_master_active_kasir ?>">
                        <a href="#" class="nav-link <?= ($is_master_active_kasir != '') ? 'active' : '' ?>">
                            <span class="sb-icon"><i class="fas fa-box"></i></span>
                            <span class="sb-label">Data Material</span>
                            <i class="fas fa-chevron-right sb-arrow"></i>
                        </a>
                        <ul class="nav nav-treeview sb-submenu" style="<?= ($is_master_active_kasir != '') ? 'display: block;' : '' ?>">
                            <li class="nav-item">
                                <a href="<?= site_url('kasir/produk') ?>" class="nav-link <?= ($current_menu == 'produk') ? 'active' : '' ?>">
                                    <span class="sb-dot"></span>
                                    <span class="sb-label">Stok Produk</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('kasir/supplier') ?>" class="nav-link <?= ($current_menu == 'supplier') ? 'active' : '' ?>">
                            <span class="sb-icon"><i class="fas fa-truck"></i></span>
                            <span class="sb-label">Data Supplier</span>
                        </a>
                    </li>
                </ul>

                <span class="sb-section-label">Transaksi</span>
                <ul class="sb-nav-list">
                    <li class="nav-item">
                        <a href="<?= site_url('kasir/barang_masuk') ?>" class="nav-link <?= ($current_menu == 'barang_masuk') ? 'active' : '' ?>">
                            <span class="sb-icon"><i class="fas fa-arrow-circle-down"></i></span>
                            <span class="sb-label">Barang Masuk</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('kasir/penjualan') ?>" class="nav-link <?= ($current_menu == 'penjualan') ? 'active' : '' ?>">
                            <span class="sb-icon"><i class="fas fa-shopping-cart"></i></span>
                            <span class="sb-label">Penjualan Offline</span>
                        </a>
                    </li>
                </ul>

                <span class="sb-section-label">Laporan</span>
                <ul class="sb-nav-list">
                    <li class="nav-item">
                        <a href="<?= site_url('kasir/laporan') ?>" class="nav-link <?= ($current_menu == 'laporan') ? 'active' : '' ?>">
                            <span class="sb-icon"><i class="fas fa-file-invoice-dollar"></i></span>
                            <span class="sb-label">Laporan Penjualan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('kasir/riwayat') ?>" class="nav-link <?= ($current_menu == 'riwayat') ? 'active' : '' ?>">
                            <span class="sb-icon"><i class="fas fa-history"></i></span>
                            <span class="sb-label">Riwayat Transaksi</span>
                        </a>
                    </li>
                </ul>

            <?php endif; ?>

            <hr class="sb-divider">
            <a href="<?= site_url('auth/logout') ?>" class="sb-logout-link">
                <span class="sb-icon-red"><i class="fas fa-sign-out-alt"></i></span>
                <span class="sb-label">Logout</span>
            </a>
            
        </nav>
    </div>
</aside>