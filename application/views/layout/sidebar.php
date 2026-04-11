<aside class="main-sidebar" style="
    background: #ffffff !important;
    border-right: 1px solid #e8ecf0;
    box-shadow: 2px 0 12px rgba(0,0,0,0.06);
">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');
    .main-sidebar, .main-header, .sb-label, .sb-section-label, .brand-name, .brand-sub, .user-name, .user-greeting, .nav-link { font-family: 'DM Sans', 'Segoe UI', sans-serif !important; }
    .fas, .far, .fab, .fa { font-family: "Font Awesome 5 Free" !important; font-weight: 900; }
    .main-sidebar { position: fixed !important; top: 0; bottom: 0; left: 0; height: 100vh !important; overflow-y: auto; z-index: 1038; transition: width 0.4s cubic-bezier(0.2, 0.8, 0.2, 1), transform 0.4s cubic-bezier(0.2, 0.8, 0.2, 1), margin-left 0.4s cubic-bezier(0.2, 0.8, 0.2, 1) !important; }
    .main-sidebar::-webkit-scrollbar { width: 4px; }
    .main-sidebar::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 4px; }
    .sidebar-brand-wrapper { display: flex; align-items: center; justify-content: center; padding: 15px; border-bottom: 1px solid #e8ecf0 !important; text-decoration: none !important; background: #ffffff !important; min-height: 100px; transition: all 0.4s cubic-bezier(0.2, 0.8, 0.2, 1) !important; }
    .sidebar-logo-icon { height: 70px; display: flex; align-items: center; justify-content: center; transition: all 0.4s cubic-bezier(0.2, 0.8, 0.2, 1) !important; }
    .sidebar-logo-icon img { height: 100%; width: auto; max-width: 180px; object-fit: contain; transition: all 0.4s cubic-bezier(0.2, 0.8, 0.2, 1) !important; }
    .sidebar { background: #ffffff !important; display: flex !important; flex-direction: column; height: calc(100vh - 100px) !important; }
    nav.mt-1 { display: flex; flex-direction: column; flex: 1; padding-bottom: 10px; }
    .sb-section-label { display: block; padding: 14px 18px 5px; font-size: 9.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #9ca3af; }
    .sb-nav-list { list-style: none; padding: 0 8px !important; margin: 0 !important; }
    .sb-nav-list .nav-item { margin-bottom: 1px; }
    .main-sidebar .sb-nav-list .nav-link { display: flex !important; align-items: center !important; gap: 12px !important; padding: 10px 12px !important; margin-bottom: 4px !important; border-radius: 10px !important; color: #4b5563 !important; font-size: 13.5px !important; font-weight: 500 !important; text-decoration: none !important; transition: background-color 0.25s ease, color 0.25s ease, padding-left 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.25s ease !important; background: transparent !important; width: 100%; border-left: 3px solid transparent !important; }
    .main-sidebar .sb-nav-list .nav-link:hover { background: rgba(248,250,252,0.8) !important; color: #1a56db !important; padding-left: 16px !important; }
    .main-sidebar .sb-nav-list .nav-link.active { background: linear-gradient(90deg, #f0f4ff 0%, #ffffff 100%) !important; color: #1a56db !important; font-weight: 600 !important; box-shadow: 0 4px 14px rgba(26,86,219,0.06) !important; border-left: 3px solid #1a56db !important; padding-left: 12px !important; }
    .sb-icon { width: 30px; height: 30px; min-width: 30px; background: #f1f5f9; border-radius: 8px; display: flex !important; align-items: center; justify-content: center; font-size: 13px; color: #94a3b8; transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1), background-color 0.25s ease, box-shadow 0.25s ease; }
    .main-sidebar .sb-nav-list .nav-link:hover .sb-icon { background: #e0e7ff; color: #1a56db; transform: scale(1.08); }
    .main-sidebar .sb-nav-list .nav-link.active .sb-icon { background: linear-gradient(135deg, #1a56db, #3b82f6); color: #ffffff; box-shadow: 0 6px 14px rgba(26,86,219,0.3); }
    .sb-arrow { margin-left: auto; font-size: 10px; color: #cbd5e1; transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1); flex-shrink: 0; }
    .menu-open > .nav-link .sb-arrow, .nav-item.has-treeview.menu-is-opening > .nav-link .sb-arrow { transform: rotate(90deg); color: #1a56db; }
    .sb-label { flex: 1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .sb-submenu { list-style: none !important; margin: 4px 0 8px 18px !important; padding: 0 0 0 10px !important; border-left: 2px solid #e2e8f0 !important; }
    .main-sidebar .sb-submenu .nav-link { gap: 10px !important; padding: 8px 12px !important; font-size: 13px !important; color: #64748b !important; border: none !important; margin-bottom: 2px !important; transition: padding-left 0.3s cubic-bezier(0.4, 0, 0.2, 1), color 0.25s ease, background-color 0.25s ease !important; }
    .main-sidebar .sb-submenu .nav-link:hover { padding-left: 17px !important; color: #1a56db !important; background: transparent !important; }
    .sb-dot { width: 6px; height: 6px; min-width: 6px; background: #cbd5e1; border-radius: 50%; transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1), background-color 0.25s ease, box-shadow 0.25s ease; }
    .main-sidebar .sb-submenu .nav-link:hover .sb-dot { background: #1a56db; }
    .main-sidebar .sb-submenu .nav-link.active { color: #1a56db !important; font-weight: 600 !important; background: transparent !important; border: none !important; padding-left: 12px !important; }
    .main-sidebar .sb-submenu .nav-link.active .sb-dot { background: #1a56db; transform: scale(1.4); box-shadow: 0 0 8px rgba(26,86,219,0.4); }
    .sb-divider { border: none; border-top: 1px dashed #e2e8f0; margin-top: auto !important; margin-bottom: 14px; margin-left: 14px; margin-right: 14px; }
    .main-sidebar .sb-logout-link { display: flex !important; align-items: center !important; gap: 12px !important; padding: 10px 12px !important; margin: 0 8px 16px !important; border-radius: 10px !important; color: #dc2626 !important; font-size: 13.5px !important; font-weight: 600 !important; text-decoration: none !important; transition: background-color 0.25s ease, color 0.25s ease, padding-left 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.25s ease !important; background: transparent !important; width: calc(100% - 16px); }
    .main-sidebar .sb-logout-link:hover { background: #fff1f2 !important; padding-left: 16px !important; }
    .sb-icon-red { width: 30px; height: 30px; min-width: 30px; background: #fee2e2; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 13px; color: #dc2626; transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1), background-color 0.25s ease; }
    .main-sidebar .sb-logout-link:hover .sb-icon-red { transform: scale(1.08); background: #fecaca; }
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
            <a href="javascript:void(0)" onclick="document.getElementById('modalLogout').classList.add('show')" class="sb-logout-link">
                <span class="sb-icon-red"><i class="fas fa-sign-out-alt"></i></span>
                <span class="sb-label">Logout</span>
            </a>
            
        </nav>
    </div>
</aside>

<!-- MODAL LOGOUT CONFIRMATION -->
<style>
    .logout-modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.45); z-index: 99999; align-items: center; justify-content: center; padding: 20px; backdrop-filter: blur(3px); }
    .logout-modal-overlay.show { display: flex; }
    .logout-modal-box { background: #fff; border-radius: 16px; width: 100%; max-width: 380px; box-shadow: 0 20px 60px rgba(0,0,0,0.2); overflow: hidden; animation: logoutModalIn 0.2s ease; }
    @keyframes logoutModalIn { from { opacity: 0; transform: translateY(-16px) scale(0.97); } to { opacity: 1; transform: translateY(0) scale(1); } }
    .logout-modal-header { padding: 18px 22px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; }
    .logout-modal-header h4 { font-size: 15px; font-weight: 700; color: #111827; margin: 0; font-family: 'DM Sans', sans-serif; }
    .logout-modal-close { width: 30px; height: 30px; background: #f3f4f6; border: none; border-radius: 7px; cursor: pointer; color: #6b7280; font-size: 13px; display: flex; align-items: center; justify-content: center; }
    .logout-modal-close:hover { background: #e5e7eb; }
    .logout-modal-body { padding: 24px 22px; text-align: center; }
    .logout-modal-icon { width: 56px; height: 56px; background: #fffbeb; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 24px; color: #d97706; margin: 0 auto 14px; }
    .logout-modal-body h5 { font-size: 15px; font-weight: 700; color: #111827; margin: 0 0 8px; font-family: 'DM Sans', sans-serif; }
    .logout-modal-body p { font-size: 12.5px; color: #6b7280; margin: 0; line-height: 1.6; font-family: 'DM Sans', sans-serif; }
    .logout-modal-footer { padding: 14px 22px; border-top: 1px solid #f1f3f5; display: flex; justify-content: flex-end; gap: 10px; }
    .logout-modal-btn-cancel { padding: 9px 18px; border: 1.5px solid #e5e7eb; border-radius: 9px; background: #fff; color: #6b7280; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; }
    .logout-modal-btn-cancel:hover { background: #f9fafb; }
    .logout-modal-btn-confirm { padding: 9px 20px; border: none; border-radius: 9px; background: linear-gradient(135deg, #d97706, #b45309); color: #fff; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; display: flex; align-items: center; gap: 6px; text-decoration: none; box-shadow: 0 3px 10px rgba(217,119,6,0.3); }
    .logout-modal-btn-confirm:hover { opacity: 0.9; color: #fff; text-decoration: none; }
</style>

<div class="logout-modal-overlay" id="modalLogout">
    <div class="logout-modal-box">
        <div class="logout-modal-header">
            <h4><i class="fas fa-sign-out-alt" style="color:#d97706; margin-right:8px;"></i>Konfirmasi Logout</h4>
            <button class="logout-modal-close" onclick="document.getElementById('modalLogout').classList.remove('show')"><i class="fas fa-times"></i></button>
        </div>
        <div class="logout-modal-body">
            <div class="logout-modal-icon"><i class="fas fa-exclamation-triangle"></i></div>
            <h5>Yakin ingin logout?</h5>
            <p>Anda akan keluar dari sistem.<br>Pastikan semua pekerjaan sudah tersimpan sebelum keluar.</p>
        </div>
        <div class="logout-modal-footer">
            <button type="button" class="logout-modal-btn-cancel" onclick="document.getElementById('modalLogout').classList.remove('show')">Batal</button>
            <a href="<?= site_url('auth/logout') ?>" class="logout-modal-btn-confirm"><i class="fas fa-sign-out-alt"></i> Ya, Logout</a>
        </div>
    </div>
</div>

<script>
(function(){
    var overlay = document.getElementById('modalLogout');
    if(overlay){
        overlay.addEventListener('click', function(e){ if(e.target === overlay) overlay.classList.remove('show'); });
    }
    document.addEventListener('keydown', function(e){
        if(e.key === 'Escape' && document.getElementById('modalLogout')) document.getElementById('modalLogout').classList.remove('show');
    });
})();
</script>