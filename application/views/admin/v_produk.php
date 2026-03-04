<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path) { font-family: 'DM Sans','Segoe UI',sans-serif; }

    /* ===== PAGE HEADER ===== */
    .ap-header { padding: 28px 28px 0; display: flex; align-items: flex-start; justify-content: space-between; flex-wrap: wrap; gap: 16px; }
    .ap-header h1 { font-size: 22px; font-weight: 800; color: #111827; margin: 0 0 3px; letter-spacing: -0.3px; }
    .ap-header p  { font-size: 13px; color: #9ca3af; margin: 0; }
    .ap-header-actions { display: flex; align-items: center; gap: 10px; }

    .btn-primary-custom { display: inline-flex; align-items: center; gap: 7px; background: linear-gradient(135deg, #1a56db, #0d3fa6); color: #fff !important; border: none; padding: 10px 20px; border-radius: 10px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; box-shadow: 0 4px 14px rgba(26,86,219,0.3); transition: all 0.15s; font-family: 'DM Sans', sans-serif; }
    .btn-primary-custom:hover { opacity: 0.9; transform: translateY(-1px); box-shadow: 0 6px 18px rgba(26,86,219,0.35); }
    .btn-back { display: inline-flex; align-items: center; gap: 7px; background: #f3f4f6; color: #374151 !important; border: none; padding: 10px 16px; border-radius: 10px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; transition: all 0.15s; font-family: 'DM Sans', sans-serif; }
    .btn-back:hover { background: #e5e7eb; }

    /* ===== STAT CARDS ===== */
    .ap-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; padding: 18px 28px 0; }
    .ap-stat-card { background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; padding: 16px 18px; display: flex; align-items: center; gap: 14px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); transition: transform 0.15s, box-shadow 0.15s; }
    .ap-stat-card:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,0,0,0.06); }
    .ap-stat-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 17px; flex-shrink: 0; }
    .ap-stat-value { font-size: 22px; font-weight: 800; color: #111827; line-height: 1; }
    .ap-stat-label { font-size: 11.5px; color: #9ca3af; font-weight: 500; margin-top: 3px; }

    /* ===== OUT-OF-STOCK ALERT ===== */
    .ap-oos-alert { margin: 16px 28px 0; padding: 14px 18px; background: linear-gradient(135deg, #fef2f2, #fff1f2); border: 1px solid #fecaca; border-radius: 12px; display: flex; align-items: flex-start; gap: 12px; animation: pulseAlert 2s ease-in-out infinite; }
    @keyframes pulseAlert { 0%, 100% { box-shadow: 0 0 0 0 rgba(220,38,38,0); } 50% { box-shadow: 0 0 0 4px rgba(220,38,38,0.08); } }
    .ap-oos-icon { width: 38px; height: 38px; background: #fee2e2; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #dc2626; font-size: 16px; flex-shrink: 0; }
    .ap-oos-title { font-size: 13px; font-weight: 700; color: #dc2626; margin-bottom: 4px; }
    .ap-oos-products { display: flex; flex-wrap: wrap; gap: 4px; margin-top: 4px; }
    .ap-oos-pill { display: inline-flex; align-items: center; gap: 4px; background: #fee2e2; color: #991b1b; font-size: 11px; font-weight: 600; padding: 3px 10px; border-radius: 20px; }

    /* ===== FILTER ===== */
    .ap-filter-bar { margin: 14px 28px 0; display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
    .ap-filter-badge { display: inline-flex; align-items: center; gap: 6px; background: #eff6ff; border: 1px solid #bfdbfe; color: #1a56db; font-size: 12.5px; font-weight: 600; padding: 5px 14px; border-radius: 20px; }
    .ap-filter-badge a { color: #1a56db; margin-left: 4px; text-decoration: none; font-size: 11px; opacity: 0.7; }
    .ap-filter-badge a:hover { opacity: 1; }

    /* ===== ALERTS ===== */
    .alert-custom { margin: 16px 28px 0; padding: 11px 16px; border-radius: 10px; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 9px; }
    .alert-custom.success { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
    .alert-custom.error   { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

    /* ===== MAIN CARD ===== */
    .ap-card { margin: 16px 28px 28px; background: #fff; border-radius: 16px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); overflow: hidden; }
    .ap-toolbar { padding: 16px 22px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; }
    .ap-toolbar-title { font-size: 15px; font-weight: 700; color: #111827; }
    .ap-count-badge { display: inline-flex; align-items: center; gap: 5px; background: #eff6ff; color: #1a56db; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 20px; margin-left: 10px; }
    .ap-search { display: flex; align-items: center; gap: 8px; background: #f8fafc; border: 1.5px solid #e8ecf0; border-radius: 10px; padding: 8px 14px; transition: all 0.2s; }
    .ap-search:focus-within { border-color: #1a56db; background: #fff; box-shadow: 0 0 0 3px rgba(26,86,219,0.06); }
    .ap-search i { color: #9ca3af; font-size: 13px; }
    .ap-search input { border: none; background: transparent; font-size: 13px; color: #374151; outline: none; width: 220px; font-family: 'DM Sans', sans-serif; }
    .ap-search input::placeholder { color: #d1d5db; }

    /* ===== TABLE ===== */
    .ap-table { width: 100%; border-collapse: collapse; }
    .ap-table th { font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.6px; color: #9ca3af; padding: 12px 22px; text-align: left; background: #fafbfc; border-bottom: 1px solid #f1f3f5; white-space: nowrap; }
    .ap-table td { padding: 14px 22px; font-size: 13px; color: #374151; border-bottom: 1px solid #f7f8f9; vertical-align: middle; }
    .ap-table tr:last-child td { border-bottom: none; }
    .ap-table tr { transition: background 0.15s; }
    .ap-table tr:hover td { background: #fafbff; }
    .ap-table tr.stok-habis-row td { background: #fefce8; }
    .ap-table tr.stok-habis-row:hover td { background: #fef9c3; }

    /* Product cell */
    .ap-produk-cell { display: flex; align-items: center; gap: 12px; }
    .ap-produk-avatar { width: 38px; height: 38px; border-radius: 10px; display: inline-flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 800; color: white; flex-shrink: 0; }
    .ap-produk-avatar.a { background: linear-gradient(135deg, #6366f1, #4f46e5); }
    .ap-produk-avatar.b { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .ap-produk-avatar.c { background: linear-gradient(135deg, #14b8a6, #0d9488); }
    .ap-produk-avatar.d { background: linear-gradient(135deg, #3b82f6, #2563eb); }
    .ap-produk-avatar.e { background: linear-gradient(135deg, #ec4899, #db2777); }
    .ap-produk-name { font-size: 13.5px; font-weight: 600; color: #111827; display: block; line-height: 1.3; }

    /* Category pill */
    .ap-kat-pill { display: inline-flex; align-items: center; gap: 4px; background: #f5f3ff; color: #7c3aed; font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 20px; }

    /* Price */
    .ap-price { font-weight: 700; color: #111827; font-size: 13.5px; white-space: nowrap; }

    /* Stok indicator */
    .ap-stok-wrap { display: flex; align-items: center; gap: 8px; }
    .ap-stok-bar-bg { width: 60px; height: 6px; background: #f1f3f5; border-radius: 3px; overflow: hidden; flex-shrink: 0; }
    .ap-stok-bar-fill { height: 100%; border-radius: 3px; transition: width 0.3s; }
    .ap-stok-bar-fill.ok { background: linear-gradient(90deg, #22c55e, #16a34a); }
    .ap-stok-bar-fill.warn { background: linear-gradient(90deg, #f59e0b, #d97706); }
    .ap-stok-bar-fill.critical { background: linear-gradient(90deg, #ef4444, #dc2626); }
    .ap-stok-num { font-size: 13px; font-weight: 700; min-width: 28px; }
    .ap-stok-num.ok { color: #16a34a; }
    .ap-stok-num.warn { color: #d97706; }
    .ap-stok-num.critical { color: #dc2626; }
    .ap-stok-num.habis { color: #9ca3af; }
    .ap-stok-satuan { font-size: 11px; color: #9ca3af; font-weight: 500; }
    .ap-stok-habis-badge { display: inline-flex; align-items: center; gap: 4px; background: #fef2f2; color: #dc2626; font-size: 10.5px; font-weight: 700; padding: 3px 8px; border-radius: 20px; letter-spacing: 0.3px; }

    /* Actions */
    .ap-actions { display: flex; gap: 6px; flex-wrap: wrap; }
    .ap-btn { display: inline-flex; align-items: center; gap: 5px; font-size: 12px; font-weight: 600; padding: 7px 12px; border-radius: 9px; border: none; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: all 0.15s; text-decoration: none; }
    .ap-btn-stok { background: linear-gradient(135deg, #ecfdf5, #d1fae5); color: #059669; }
    .ap-btn-stok:hover { background: linear-gradient(135deg, #d1fae5, #a7f3d0); transform: translateY(-1px); box-shadow: 0 3px 10px rgba(5,150,105,0.15); }
    .ap-btn-edit { background: #eff6ff; color: #1a56db; }
    .ap-btn-edit:hover { background: #dbeafe; transform: translateY(-1px); box-shadow: 0 3px 10px rgba(26,86,219,0.12); }
    .ap-btn-delete { background: #fef2f2; color: #dc2626; }
    .ap-btn-delete:hover { background: #fee2e2; transform: translateY(-1px); box-shadow: 0 3px 10px rgba(220,38,38,0.12); }

    /* Empty state */
    .ap-empty { text-align: center; padding: 56px 20px; color: #9ca3af; }
    .ap-empty-icon { width: 64px; height: 64px; background: linear-gradient(135deg, #f3f4f6, #e5e7eb); border-radius: 18px; display: flex; align-items: center; justify-content: center; font-size: 26px; color: #d1d5db; margin: 0 auto 14px; }

    /* Pagination */
    .ap-pagination { padding: 14px 22px; border-top: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; }
    .ap-pagination-info { font-size: 12.5px; color: #9ca3af; font-weight: 500; }
    .ap-pagination-info strong { color: #374151; }
    .ap-pagination-controls { display: flex; align-items: center; gap: 4px; }
    .ap-page-btn { width: 34px; height: 34px; border: 1.5px solid #e5e7eb; border-radius: 9px; background: #fff; color: #374151; font-size: 12.5px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; transition: all 0.15s; font-family: 'DM Sans', sans-serif; }
    .ap-page-btn:hover:not(:disabled) { background: #eff6ff; border-color: #bfdbfe; color: #1a56db; }
    .ap-page-btn.active { background: #1a56db; border-color: #1a56db; color: #fff; box-shadow: 0 2px 8px rgba(26,86,219,0.3); }
    .ap-page-btn:disabled { opacity: 0.35; cursor: not-allowed; }
    .ap-page-btn.nav-btn { width: auto; padding: 0 12px; gap: 5px; font-size: 12px; }

    /* ===== MODAL ===== */
    .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.45); z-index: 99999; align-items: center; justify-content: center; padding: 20px; backdrop-filter: blur(4px); }
    .modal-overlay.show { display: flex; }
    .modal-box { background: #fff; border-radius: 18px; width: 100%; max-width: 460px; box-shadow: 0 24px 60px rgba(0,0,0,0.22); overflow: hidden; animation: modalIn 0.25s ease; }
    .modal-box.modal-sm { max-width: 400px; }
    @keyframes modalIn { from { opacity: 0; transform: translateY(-20px) scale(0.96); } to { opacity: 1; transform: translateY(0) scale(1); } }
    .modal-header { padding: 20px 24px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; }
    .modal-header h4 { font-size: 16px; font-weight: 700; color: #111827; margin: 0; display: flex; align-items: center; }
    .modal-close { width: 32px; height: 32px; background: #f3f4f6; border: none; border-radius: 8px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #6b7280; font-size: 14px; transition: all 0.15s; }
    .modal-close:hover { background: #e5e7eb; }
    .modal-body { padding: 22px 24px; }
    .modal-footer { padding: 16px 24px; border-top: 1px solid #f1f3f5; display: flex; justify-content: flex-end; gap: 10px; }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
    .form-group-custom { margin-bottom: 16px; }
    .form-group-custom:last-child { margin-bottom: 0; }
    .form-label-custom { display: block; font-size: 12.5px; font-weight: 600; color: #374151; margin-bottom: 6px; }
    .form-label-custom span { color: #dc2626; }
    .input-wrap { position: relative; }
    .input-icon { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); font-size: 13px; color: #9ca3af; pointer-events: none; }
    .form-control-custom { width: 100%; padding: 11px 14px 11px 38px; border: 1.5px solid #e5e7eb; border-radius: 10px; font-size: 14px; font-family: 'DM Sans', sans-serif; color: #111827; background: #fafafa; outline: none; transition: all 0.15s; }
    .form-control-custom:focus { border-color: #1a56db; background: #fff; box-shadow: 0 0 0 3px rgba(26,86,219,0.08); }
    .form-control-custom::placeholder { color: #d1d5db; }
    select.form-control-custom { cursor: pointer; }
    .btn-cancel { padding: 10px 20px; border: 1.5px solid #e5e7eb; border-radius: 10px; background: #fff; color: #6b7280; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: all 0.15s; }
    .btn-cancel:hover { background: #f9fafb; border-color: #d1d5db; }
    .btn-submit { padding: 10px 22px; border: none; border-radius: 10px; background: linear-gradient(135deg, #1a56db, #0d3fa6); color: #fff; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; box-shadow: 0 4px 14px rgba(26,86,219,0.3); display: flex; align-items: center; gap: 7px; transition: all 0.15s; }
    .btn-submit:hover { opacity: 0.9; transform: translateY(-1px); }
    .btn-submit-green { background: linear-gradient(135deg, #059669, #047857); box-shadow: 0 4px 14px rgba(5,150,105,0.3); }
    .stok-current-box { background: linear-gradient(135deg, #f8fafc, #f1f5f9); border: 1px solid #e2e8f0; border-radius: 12px; padding: 14px 16px; margin-bottom: 18px; display: flex; align-items: center; justify-content: space-between; }
    .stok-current-box .label { font-size: 12.5px; color: #6b7280; font-weight: 500; display: flex; align-items: center; }
    .stok-current-box .value { font-size: 24px; font-weight: 800; color: #111827; }
    .delete-modal-body { padding: 28px 24px; text-align: center; }
    .delete-icon { width: 60px; height: 60px; background: #fef2f2; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 26px; color: #dc2626; margin: 0 auto 16px; }
    .delete-modal-body h5 { font-size: 16px; font-weight: 700; color: #111827; margin-bottom: 8px; }
    .delete-modal-body p { font-size: 13px; color: #6b7280; margin: 0; line-height: 1.6; }
    .btn-delete-confirm { padding: 10px 22px; border: none; border-radius: 10px; background: linear-gradient(135deg, #dc2626, #b91c1c); color: #fff; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; box-shadow: 0 4px 14px rgba(220,38,38,0.3); display: flex; align-items: center; gap: 7px; transition: all 0.15s; }
    .btn-delete-confirm:hover { transform: translateY(-1px); box-shadow: 0 6px 18px rgba(220,38,38,0.35); }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) { .ap-stats { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 768px) {
        .ap-header, .ap-filter-bar { padding-left: 16px; padding-right: 16px; }
        .ap-stats { padding: 14px 16px 0; grid-template-columns: repeat(2, 1fr); gap: 10px; }
        .ap-card { margin: 14px 14px 24px; }
        .ap-oos-alert { margin: 14px 16px 0; }
        .alert-custom { margin: 14px 16px 0; }
        .form-row { grid-template-columns: 1fr; }
    }
    @media (max-width: 480px) { .ap-stats { grid-template-columns: 1fr; } }
</style>

    <?php
        // Hitung statistik
        $total_produk   = count($produk);
        $stok_aman      = count(array_filter($produk, fn($p) => (int)$p['stok'] > 10));
        $stok_menipis_c = count(array_filter($produk, fn($p) => (int)$p['stok'] > 0 && (int)$p['stok'] <= 10));
        $stok_habis_c   = count(array_filter($produk, fn($p) => (int)$p['stok'] === 0));
        $produk_habis_list = array_filter($produk, fn($p) => (int)$p['stok'] === 0);
    ?>

    <!-- PAGE HEADER -->
    <div class="ap-header">
        <div>
            <h1><i class="fas fa-boxes" style="color:#1a56db; margin-right:6px; font-size:20px;"></i>Stok Produk</h1>
            <p>Kelola seluruh produk baja dan besi — Gudang PT Pordjo</p>
        </div>
        <div class="ap-header-actions">
            <a href="<?= site_url('admin/kategori') ?>" class="btn-back">
                <i class="fas fa-tag"></i> Kategori
            </a>
            <button class="btn-primary-custom" onclick="openModal('modalTambah')">
                <i class="fas fa-plus"></i> Tambah Produk
            </button>
        </div>
    </div>

    <!-- STAT CARDS -->
    <div class="ap-stats">
        <div class="ap-stat-card">
            <div class="ap-stat-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-cube"></i></div>
            <div>
                <div class="ap-stat-value"><?= $total_produk ?></div>
                <div class="ap-stat-label">Total Produk</div>
            </div>
        </div>
        <div class="ap-stat-card">
            <div class="ap-stat-icon" style="background:#f0fdf4; color:#16a34a;"><i class="fas fa-check-circle"></i></div>
            <div>
                <div class="ap-stat-value" style="color:#16a34a;"><?= $stok_aman ?></div>
                <div class="ap-stat-label">Stok Aman</div>
            </div>
        </div>
        <div class="ap-stat-card">
            <div class="ap-stat-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-exclamation-triangle"></i></div>
            <div>
                <div class="ap-stat-value" style="color:#d97706;"><?= $stok_menipis_c ?></div>
                <div class="ap-stat-label">Stok Menipis</div>
            </div>
        </div>
        <div class="ap-stat-card">
            <div class="ap-stat-icon" style="background:#fef2f2; color:#dc2626;"><i class="fas fa-times-circle"></i></div>
            <div>
                <div class="ap-stat-value" style="color:#dc2626;"><?= $stok_habis_c ?></div>
                <div class="ap-stat-label">Stok Habis</div>
            </div>
        </div>
    </div>

    <!-- OUT-OF-STOCK ALERT -->
    <?php if (!empty($produk_habis_list)): ?>
    <div class="ap-oos-alert">
        <div class="ap-oos-icon"><i class="fas fa-exclamation-circle"></i></div>
        <div style="flex:1;">
            <div class="ap-oos-title"><i class="fas fa-bell" style="margin-right:4px;"></i> <?= count($produk_habis_list) ?> Produk Stok Habis — Segera Lakukan Restok</div>
            <div class="ap-oos-products">
                <?php foreach (array_slice($produk_habis_list, 0, 5) as $ph): ?>
                    <span class="ap-oos-pill"><i class="fas fa-times-circle" style="font-size:9px;"></i> <?= htmlspecialchars($ph['nama_produk']) ?></span>
                <?php endforeach; ?>
                <?php if (count($produk_habis_list) > 5): ?>
                    <span class="ap-oos-pill" style="background:#fecaca;">+<?= count($produk_habis_list) - 5 ?> lainnya</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- FILTER BADGE -->
    <?php if (!empty($filter_kategori)): ?>
    <div class="ap-filter-bar">
        <span class="ap-filter-badge">
            <i class="fas fa-filter" style="font-size:10px;"></i>
            Filter: <?= htmlspecialchars($filter_kategori) ?>
            <a href="<?= site_url('admin/produk') ?>">✕</a>
        </span>
    </div>
    <?php endif; ?>

    <!-- FLASH MESSAGES -->
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert-custom success"><i class="fas fa-check-circle"></i><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert-custom error"><i class="fas fa-exclamation-circle"></i><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <!-- MAIN TABLE -->
    <div class="ap-card">
        <div class="ap-toolbar">
            <div style="display:flex; align-items:center;">
                <span class="ap-toolbar-title">Daftar Produk</span>
                <span class="ap-count-badge"><i class="fas fa-box" style="font-size:10px;"></i><?= $total_produk ?> produk</span>
            </div>
            <div class="ap-search">
                <i class="fas fa-search"></i>
                <input type="text" id="searchProduk" placeholder="Cari nama produk..." onkeyup="filterTable()">
            </div>
        </div>

        <table class="ap-table" id="produkTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($produk)): ?>
                    <?php foreach ($produk as $i => $p): ?>
                    <?php
                        $stok = (int) $p['stok'];
                        if ($stok === 0)      { $stokClass = 'habis';    $barPct = 0; }
                        elseif ($stok <= 3)    { $stokClass = 'critical'; $barPct = min(($stok/20)*100, 100); }
                        elseif ($stok <= 10)   { $stokClass = 'warn';    $barPct = min(($stok/20)*100, 100); }
                        else                   { $stokClass = 'ok';      $barPct = min(($stok/50)*100, 100); }
                        $avatarColors = ['a','b','c','d','e'];
                        $avatarClass = $avatarColors[$i % 5];
                    ?>
                    <tr class="<?= $stok === 0 ? 'stok-habis-row' : '' ?>">
                        <td style="color:#9ca3af; font-size:12px; width:40px;"><?= $i + 1 ?></td>
                        <td>
                            <div class="ap-produk-cell">
                                <div class="ap-produk-avatar <?= $avatarClass ?>"><?= strtoupper(substr($p['nama_produk'], 0, 1)) ?></div>
                                <div>
                                    <span class="ap-produk-name"><?= htmlspecialchars($p['nama_produk']) ?></span>
                                </div>
                            </div>
                        </td>
                        <td><span class="ap-kat-pill"><i class="fas fa-tag" style="font-size:8px;"></i><?= htmlspecialchars($p['nama_kategori']) ?></span></td>
                        <td><span class="ap-price">Rp <?= number_format($p['harga_jual'], 0, ',', '.') ?></span></td>
                        <td>
                            <?php if ($stok === 0): ?>
                                <div class="ap-stok-wrap">
                                    <span class="ap-stok-habis-badge"><i class="fas fa-times-circle" style="font-size:9px;"></i> HABIS</span>
                                </div>
                            <?php else: ?>
                                <div class="ap-stok-wrap">
                                    <div class="ap-stok-bar-bg">
                                        <div class="ap-stok-bar-fill <?= $stokClass ?>" style="width:<?= $barPct ?>%"></div>
                                    </div>
                                    <span class="ap-stok-num <?= $stokClass ?>"><?= $stok ?></span>
                                    <span class="ap-stok-satuan"><?= htmlspecialchars($p['satuan']) ?>/pcs</span>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="ap-actions">
                                <button class="ap-btn ap-btn-stok"
                                    onclick="openModalEditStok('<?= $p['id_product'] ?>', '<?= htmlspecialchars($p['nama_produk'], ENT_QUOTES) ?>', '<?= $p['stok'] ?>', '<?= htmlspecialchars($p['satuan'], ENT_QUOTES) ?>')">
                                    <i class="fas fa-cubes"></i> Stok
                                </button>
                                <button class="ap-btn ap-btn-edit"
                                    onclick="openModalEdit(
                                        '<?= $p['id_product'] ?>',
                                        '<?= htmlspecialchars($p['nama_produk'], ENT_QUOTES) ?>',
                                        '<?= $p['id_category'] ?>',
                                        '<?= $p['harga_jual'] ?>',
                                        '<?= $p['stok'] ?>',
                                        '<?= htmlspecialchars($p['satuan'], ENT_QUOTES) ?>'
                                    )">
                                    <i class="fas fa-pen"></i> Edit
                                </button>
                                <button class="ap-btn ap-btn-delete"
                                    onclick="openModalDelete('<?= $p['id_product'] ?>', '<?= htmlspecialchars($p['nama_produk'], ENT_QUOTES) ?>')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="no-data-row">
                        <td colspan="6">
                            <div class="ap-empty">
                                <div class="ap-empty-icon"><i class="fas fa-box-open"></i></div>
                                <div style="font-size:14px; font-weight:600; color:#6b7280; margin-bottom:4px;">Belum terdapat data produk<?= !empty($filter_kategori) ? ' di kategori ini' : '' ?>.</div>
                                <div style="font-size:12px; color:#9ca3af;">Klik tombol "Tambah Produk" untuk menambahkan produk baru.</div>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="ap-pagination">
            <div class="ap-pagination-info" id="paginationInfo"></div>
            <div class="ap-pagination-controls" id="paginationControls"></div>
        </div>
    </div>

    <!-- MODAL TAMBAH -->
    <div class="modal-overlay" id="modalTambah">
        <div class="modal-box">
            <div class="modal-header">
                <h4><i class="fas fa-plus-circle" style="color:#1a56db; margin-right:8px;"></i>Tambah Produk</h4>
                <button class="modal-close" onclick="closeModal('modalTambah')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/produk/tambah') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group-custom">
                        <label class="form-label-custom">Nama Produk <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-box input-icon"></i>
                            <input type="text" name="nama_produk" class="form-control-custom" placeholder="Contoh: Besi Beton 10mm" required>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Kategori <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-tag input-icon"></i>
                            <select name="id_category" class="form-control-custom" required>
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id_category'] ?>"><?= htmlspecialchars($k['nama_kategori']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group-custom">
                            <label class="form-label-custom">Harga Jual <span>*</span></label>
                            <div class="input-wrap">
                                <i class="fas fa-money-bill input-icon"></i>
                                <input type="number" name="harga_jual" class="form-control-custom" placeholder="0" min="0" required>
                            </div>
                        </div>
                        <div class="form-group-custom">
                            <label class="form-label-custom">Stok Awal <span>*</span></label>
                            <div class="input-wrap">
                                <i class="fas fa-cubes input-icon"></i>
                                <input type="number" name="stok" class="form-control-custom" placeholder="0" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Satuan <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-ruler input-icon"></i>
                            <input type="text" name="satuan" class="form-control-custom" placeholder="Contoh: batang, lembar, pcs, kg" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modalTambah')">Batal</button>
                    <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div class="modal-overlay" id="modalEdit">
        <div class="modal-box">
            <div class="modal-header">
                <h4><i class="fas fa-pen" style="color:#1a56db; margin-right:8px;"></i>Edit Produk</h4>
                <button class="modal-close" onclick="closeModal('modalEdit')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/produk/update') ?>" method="post">
                <input type="hidden" name="id_product" id="edit_id">
                <div class="modal-body">
                    <div class="form-group-custom">
                        <label class="form-label-custom">Nama Produk <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-box input-icon"></i>
                            <input type="text" name="nama_produk" id="edit_nama" class="form-control-custom" required>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Kategori <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-tag input-icon"></i>
                            <select name="id_category" id="edit_kat" class="form-control-custom" required>
                                <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id_category'] ?>"><?= htmlspecialchars($k['nama_kategori']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group-custom">
                            <label class="form-label-custom">Harga Jual <span>*</span></label>
                            <div class="input-wrap">
                                <i class="fas fa-money-bill input-icon"></i>
                                <input type="number" name="harga_jual" id="edit_harga" class="form-control-custom" min="0" required>
                            </div>
                        </div>
                        <div class="form-group-custom">
                            <label class="form-label-custom">Stok <span>*</span></label>
                            <div class="input-wrap">
                                <i class="fas fa-cubes input-icon"></i>
                                <input type="number" name="stok" id="edit_stok" class="form-control-custom" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Satuan <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-ruler input-icon"></i>
                            <input type="text" name="satuan" id="edit_satuan" class="form-control-custom" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modalEdit')">Batal</button>
                    <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL DELETE -->
    <div class="modal-overlay" id="modalDelete">
        <div class="modal-box modal-sm">
            <div class="modal-header">
                <h4><i class="fas fa-trash" style="color:#dc2626; margin-right:8px;"></i>Hapus Produk</h4>
                <button class="modal-close" onclick="closeModal('modalDelete')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/produk/hapus') ?>" method="post">
                <input type="hidden" name="id_product" id="del_id">
                <div class="delete-modal-body">
                    <div class="delete-icon"><i class="fas fa-exclamation-triangle"></i></div>
                    <h5>Apakah Anda yakin ingin menghapus produk ini?</h5>
                    <p>Data produk <strong id="del_nama"></strong> akan dihapus secara permanen.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modalDelete')">Batal</button>
                    <button type="submit" class="btn-delete-confirm"><i class="fas fa-trash"></i> Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT STOK -->
    <div class="modal-overlay" id="modalEditStok">
        <div class="modal-box modal-sm">
            <div class="modal-header">
                <h4><i class="fas fa-cubes" style="color:#059669; margin-right:8px;"></i>Edit Stok</h4>
                <button class="modal-close" onclick="closeModal('modalEditStok')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/produk/update_stok') ?>" method="post">
                <input type="hidden" name="id_product" id="stok_id">
                <div class="modal-body">
                    <div class="stok-current-box">
                        <span class="label"><i class="fas fa-box" style="margin-right:6px; color:#d97706;"></i><span id="stok_nama_display"></span></span>
                        <div style="text-align:right;">
                            <span class="label">Stok saat ini</span>
                            <div class="value" id="stok_current_display">0</div>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Stok Baru <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-cubes input-icon"></i>
                            <input type="number" name="stok" id="stok_new" class="form-control-custom" placeholder="Masukkan jumlah stok baru" min="0" required>
                        </div>
                        <span style="font-size:11px; color:#9ca3af; margin-top:4px; display:block;" id="stok_satuan_hint"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modalEditStok')">Batal</button>
                    <button type="submit" class="btn-submit btn-submit-green"><i class="fas fa-save"></i> Update Stok</button>
                </div>
            </form>
        </div>
    </div>

<script>
    var ROWS_PER_PAGE = 10, currentPage = 1, allRows = [], filteredRows = [];

    function initPagination() {
        allRows = Array.from(document.querySelectorAll('#produkTable tbody tr:not(.no-data-row)'));
        filteredRows = allRows.slice();
        renderPage(1);
    }

    function renderPage(page) {
        currentPage = page;
        var total = filteredRows.length, pages = Math.ceil(total / ROWS_PER_PAGE) || 1;
        var start = (page - 1) * ROWS_PER_PAGE, end = Math.min(start + ROWS_PER_PAGE, total);

        allRows.forEach(function(r) { r.style.display = 'none'; });
        filteredRows.forEach(function(r, i) { r.style.display = (i >= start && i < end) ? '' : 'none'; });

        document.getElementById('paginationInfo').innerHTML = total === 0
            ? 'Tidak ada data'
            : 'Menampilkan <strong>' + (start + 1) + '–' + end + '</strong> dari <strong>' + total + '</strong> produk';

        var ctrl = document.getElementById('paginationControls');
        ctrl.innerHTML = '';

        var prev = document.createElement('button');
        prev.className = 'ap-page-btn nav-btn';
        prev.innerHTML = '<i class="fas fa-chevron-left"></i> Prev';
        prev.disabled = (page <= 1);
        prev.onclick = function() { renderPage(currentPage - 1); };
        ctrl.appendChild(prev);

        var sp = Math.max(1, page - 2), ep = Math.min(pages, sp + 4);
        if (ep - sp < 4) sp = Math.max(1, ep - 4);
        for (var p = sp; p <= ep; p++) {
            (function(pg) {
                var b = document.createElement('button');
                b.className = 'ap-page-btn' + (pg === page ? ' active' : '');
                b.textContent = pg;
                b.onclick = function() { renderPage(pg); };
                ctrl.appendChild(b);
            })(p);
        }

        var next = document.createElement('button');
        next.className = 'ap-page-btn nav-btn';
        next.innerHTML = 'Next <i class="fas fa-chevron-right"></i>';
        next.disabled = (page >= pages);
        next.onclick = function() { renderPage(currentPage + 1); };
        ctrl.appendChild(next);
    }

    function filterTable() {
        var kw = document.getElementById('searchProduk').value.toLowerCase();
        filteredRows = allRows.filter(function(r) { return r.textContent.toLowerCase().includes(kw); });
        renderPage(1);
    }

    document.addEventListener('DOMContentLoaded', function() { initPagination(); });

    function openModal(id) { document.getElementById(id).classList.add('show'); }
    function closeModal(id) { document.getElementById(id).classList.remove('show'); }

    function openModalEdit(id, nama, katId, harga, stok, satuan) {
        document.getElementById('edit_id').value     = id;
        document.getElementById('edit_nama').value   = nama;
        document.getElementById('edit_kat').value    = katId;
        document.getElementById('edit_harga').value  = harga;
        document.getElementById('edit_stok').value   = stok;
        document.getElementById('edit_satuan').value = satuan;
        openModal('modalEdit');
    }

    function openModalDelete(id, nama) {
        document.getElementById('del_id').value          = id;
        document.getElementById('del_nama').textContent  = nama;
        openModal('modalDelete');
    }

    function openModalEditStok(id, nama, stok, satuan) {
        document.getElementById('stok_id').value                   = id;
        document.getElementById('stok_nama_display').textContent   = nama;
        document.getElementById('stok_current_display').textContent = stok;
        document.getElementById('stok_new').value                  = stok;
        document.getElementById('stok_satuan_hint').textContent    = 'Satuan: ' + satuan;
        openModal('modalEditStok');
    }

    document.querySelectorAll('.modal-overlay').forEach(function(o) {
        o.addEventListener('click', function(e) { if (e.target === o) o.classList.remove('show'); });
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') document.querySelectorAll('.modal-overlay.show').forEach(function(m) { m.classList.remove('show'); });
    });
</script>
</div>