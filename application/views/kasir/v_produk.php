<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path) { font-family: 'DM Sans','Segoe UI',sans-serif; }

    /* ===== PAGE HEADER ===== */
    .kp-header { padding: 28px 28px 0; display: flex; align-items: flex-start; justify-content: space-between; flex-wrap: wrap; gap: 16px; }
    .kp-header h1 { font-size: 22px; font-weight: 800; color: #111827; margin: 0 0 3px; letter-spacing: -0.3px; }
    .kp-header p  { font-size: 13px; color: #9ca3af; margin: 0; }
    .kp-header-right { display: flex; align-items: center; gap: 10px; }

    /* ===== STOK SUMMARY CARDS ===== */
    .kp-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; padding: 18px 28px 0; }
    .kp-stat-card { background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; padding: 16px 18px; display: flex; align-items: center; gap: 14px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); transition: transform 0.15s, box-shadow 0.15s; }
    .kp-stat-card:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,0,0,0.06); }
    .kp-stat-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 17px; flex-shrink: 0; }
    .kp-stat-value { font-size: 22px; font-weight: 800; color: #111827; line-height: 1; }
    .kp-stat-label { font-size: 11.5px; color: #9ca3af; font-weight: 500; margin-top: 3px; }

    /* ===== OUT-OF-STOCK ALERT ===== */
    .kp-oos-alert { margin: 16px 28px 0; padding: 14px 18px; background: linear-gradient(135deg, #fef2f2, #fff1f2); border: 1px solid #fecaca; border-radius: 12px; display: flex; align-items: flex-start; gap: 12px; animation: pulseAlert 2s ease-in-out infinite; }
    @keyframes pulseAlert { 0%, 100% { box-shadow: 0 0 0 0 rgba(220,38,38,0); } 50% { box-shadow: 0 0 0 4px rgba(220,38,38,0.08); } }
    .kp-oos-icon { width: 38px; height: 38px; background: #fee2e2; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #dc2626; font-size: 16px; flex-shrink: 0; }
    .kp-oos-title { font-size: 13px; font-weight: 700; color: #dc2626; margin-bottom: 4px; }
    .kp-oos-products { display: flex; flex-wrap: wrap; gap: 4px; margin-top: 4px; }
    .kp-oos-pill { display: inline-flex; align-items: center; gap: 4px; background: #fee2e2; color: #991b1b; font-size: 11px; font-weight: 600; padding: 3px 10px; border-radius: 20px; }

    /* ===== FILTER ===== */
    .kp-filter-bar { margin: 14px 28px 0; display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
    .kp-filter-badge { display: inline-flex; align-items: center; gap: 6px; background: #eff6ff; border: 1px solid #bfdbfe; color: #1a56db; font-size: 12.5px; font-weight: 600; padding: 5px 14px; border-radius: 20px; }
    .kp-filter-badge a { color: #1a56db; margin-left: 4px; text-decoration: none; font-size: 11px; opacity: 0.7; }
    .kp-filter-badge a:hover { opacity: 1; }

    /* ===== ALERTS ===== */
    .alert-custom { margin: 16px 28px 0; padding: 11px 16px; border-radius: 10px; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 9px; }
    .alert-custom.success { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
    .alert-custom.error   { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

    /* ===== MAIN TABLE CARD ===== */
    .kp-card { margin: 16px 28px 28px; background: #fff; border-radius: 16px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); overflow: hidden; }
    .kp-toolbar { padding: 16px 22px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; }
    .kp-toolbar-title { font-size: 15px; font-weight: 700; color: #111827; }
    .kp-count-badge { display: inline-flex; align-items: center; gap: 5px; background: #eff6ff; color: #1a56db; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 20px; margin-left: 10px; }
    .kp-search { display: flex; align-items: center; gap: 8px; background: #f8fafc; border: 1.5px solid #e8ecf0; border-radius: 10px; padding: 8px 14px; transition: all 0.2s; }
    .kp-search:focus-within { border-color: #1a56db; background: #fff; box-shadow: 0 0 0 3px rgba(26,86,219,0.06); }
    .kp-search i { color: #9ca3af; font-size: 13px; }
    .kp-search input { border: none; background: transparent; font-size: 13px; color: #374151; outline: none; width: 220px; font-family: 'DM Sans', sans-serif; }
    .kp-search input::placeholder { color: #d1d5db; }

    /* ===== TABLE ===== */
    .kp-table { width: 100%; border-collapse: collapse; }
    .kp-table th { font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.6px; color: #9ca3af; padding: 12px 22px; text-align: left; background: #fafbfc; border-bottom: 1px solid #f1f3f5; white-space: nowrap; }
    .kp-table td { padding: 14px 22px; font-size: 13px; color: #374151; border-bottom: 1px solid #f7f8f9; vertical-align: middle; }
    .kp-table tr:last-child td { border-bottom: none; }
    .kp-table tr { transition: background 0.15s; }
    .kp-table tr:hover td { background: #fafbff; }
    .kp-table tr.stok-habis-row td { background: #fefce8; }
    .kp-table tr.stok-habis-row:hover td { background: #fef9c3; }

    /* Product cell */
    .kp-produk-cell { display: flex; align-items: center; gap: 12px; }
    .kp-produk-avatar { width: 38px; height: 38px; border-radius: 10px; display: inline-flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 800; color: white; flex-shrink: 0; }
    .kp-produk-avatar.a { background: linear-gradient(135deg, #6366f1, #4f46e5); }
    .kp-produk-avatar.b { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .kp-produk-avatar.c { background: linear-gradient(135deg, #14b8a6, #0d9488); }
    .kp-produk-avatar.d { background: linear-gradient(135deg, #3b82f6, #2563eb); }
    .kp-produk-avatar.e { background: linear-gradient(135deg, #ec4899, #db2777); }
    .kp-produk-name { font-size: 13.5px; font-weight: 600; color: #111827; display: block; line-height: 1.3; }
    .kp-produk-id { font-size: 10.5px; color: #9ca3af; font-weight: 500; }

    /* Category pill */
    .kp-kat-pill { display: inline-flex; align-items: center; gap: 4px; background: #f5f3ff; color: #7c3aed; font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 20px; }

    /* Price */
    .kp-price { font-weight: 700; color: #111827; font-size: 13.5px; white-space: nowrap; }

    /* Stok indicator */
    .kp-stok-wrap { display: flex; align-items: center; gap: 8px; }
    .kp-stok-bar-bg { width: 60px; height: 6px; background: #f1f3f5; border-radius: 3px; overflow: hidden; flex-shrink: 0; }
    .kp-stok-bar-fill { height: 100%; border-radius: 3px; transition: width 0.3s; }
    .kp-stok-bar-fill.ok { background: linear-gradient(90deg, #22c55e, #16a34a); }
    .kp-stok-bar-fill.warn { background: linear-gradient(90deg, #f59e0b, #d97706); }
    .kp-stok-bar-fill.critical { background: linear-gradient(90deg, #ef4444, #dc2626); }
    .kp-stok-bar-fill.habis { background: #e5e7eb; }
    .kp-stok-num { font-size: 13px; font-weight: 700; min-width: 28px; }
    .kp-stok-num.ok { color: #16a34a; }
    .kp-stok-num.warn { color: #d97706; }
    .kp-stok-num.critical { color: #dc2626; }
    .kp-stok-num.habis { color: #9ca3af; }
    .kp-stok-satuan { font-size: 11px; color: #9ca3af; font-weight: 500; }
    .kp-stok-habis-badge { display: inline-flex; align-items: center; gap: 4px; background: #fef2f2; color: #dc2626; font-size: 10.5px; font-weight: 700; padding: 3px 8px; border-radius: 20px; letter-spacing: 0.3px; }

    /* Actions */
    .kp-btn-stok { display: inline-flex; align-items: center; gap: 5px; font-size: 12px; font-weight: 600; padding: 7px 14px; border-radius: 9px; border: none; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: all 0.15s; background: linear-gradient(135deg, #ecfdf5, #d1fae5); color: #059669; text-decoration: none; }
    .kp-btn-stok:hover { background: linear-gradient(135deg, #d1fae5, #a7f3d0); transform: translateY(-1px); box-shadow: 0 3px 10px rgba(5,150,105,0.15); }

    /* Empty state */
    .kp-empty { text-align: center; padding: 56px 20px; color: #9ca3af; }
    .kp-empty-icon { width: 64px; height: 64px; background: linear-gradient(135deg, #f3f4f6, #e5e7eb); border-radius: 18px; display: flex; align-items: center; justify-content: center; font-size: 26px; color: #d1d5db; margin: 0 auto 14px; }

    /* Pagination */
    .kp-pagination { padding: 14px 22px; border-top: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; }
    .kp-pagination-info { font-size: 12.5px; color: #9ca3af; font-weight: 500; }
    .kp-pagination-info strong { color: #374151; }
    .kp-pagination-controls { display: flex; align-items: center; gap: 4px; }
    .kp-page-btn { width: 34px; height: 34px; border: 1.5px solid #e5e7eb; border-radius: 9px; background: #fff; color: #374151; font-size: 12.5px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; transition: all 0.15s; font-family: 'DM Sans', sans-serif; }
    .kp-page-btn:hover:not(:disabled) { background: #eff6ff; border-color: #bfdbfe; color: #1a56db; }
    .kp-page-btn.active { background: #1a56db; border-color: #1a56db; color: #fff; box-shadow: 0 2px 8px rgba(26,86,219,0.3); }
    .kp-page-btn:disabled { opacity: 0.35; cursor: not-allowed; }
    .kp-page-btn.nav-btn { width: auto; padding: 0 12px; gap: 5px; font-size: 12px; }

    /* ===== MODAL ===== */
    .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.45); z-index: 99999; align-items: center; justify-content: center; padding: 20px; backdrop-filter: blur(4px); }
    .modal-overlay.show { display: flex; }
    .modal-box { background: #fff; border-radius: 18px; width: 100%; max-width: 400px; box-shadow: 0 24px 60px rgba(0,0,0,0.22); overflow: hidden; animation: modalIn 0.25s ease; }
    @keyframes modalIn { from { opacity: 0; transform: translateY(-20px) scale(0.96); } to { opacity: 1; transform: translateY(0) scale(1); } }
    .modal-header { padding: 20px 24px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; }
    .modal-header h4 { font-size: 16px; font-weight: 700; color: #111827; margin: 0; display: flex; align-items: center; }
    .modal-close { width: 32px; height: 32px; background: #f3f4f6; border: none; border-radius: 8px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #6b7280; font-size: 14px; transition: all 0.15s; }
    .modal-close:hover { background: #e5e7eb; }
    .modal-body { padding: 22px 24px; }
    .modal-footer { padding: 16px 24px; border-top: 1px solid #f1f3f5; display: flex; justify-content: flex-end; gap: 10px; }
    .stok-current-box { background: linear-gradient(135deg, #f8fafc, #f1f5f9); border: 1px solid #e2e8f0; border-radius: 12px; padding: 14px 16px; margin-bottom: 18px; display: flex; align-items: center; justify-content: space-between; }
    .stok-current-box .label { font-size: 12.5px; color: #6b7280; font-weight: 500; display: flex; align-items: center; }
    .stok-current-box .value { font-size: 24px; font-weight: 800; color: #111827; }
    .form-group-custom { margin-bottom: 16px; }
    .form-label-custom { display: block; font-size: 12.5px; font-weight: 600; color: #374151; margin-bottom: 6px; }
    .form-label-custom span { color: #dc2626; }
    .input-wrap { position: relative; }
    .input-icon { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); font-size: 13px; color: #9ca3af; pointer-events: none; }
    .form-control-custom { width: 100%; padding: 11px 14px 11px 38px; border: 1.5px solid #e5e7eb; border-radius: 10px; font-size: 14px; font-family: 'DM Sans', sans-serif; color: #111827; background: #fafafa; outline: none; transition: all 0.15s; }
    .form-control-custom:focus { border-color: #1a56db; background: #fff; box-shadow: 0 0 0 3px rgba(26,86,219,0.08); }
    .btn-cancel { padding: 10px 20px; border: 1.5px solid #e5e7eb; border-radius: 10px; background: #fff; color: #6b7280; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: all 0.15s; }
    .btn-cancel:hover { background: #f9fafb; border-color: #d1d5db; }
    .btn-submit-green { padding: 10px 22px; border: none; border-radius: 10px; background: linear-gradient(135deg, #059669, #047857); color: #fff; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; box-shadow: 0 4px 14px rgba(5,150,105,0.3); display: flex; align-items: center; gap: 7px; transition: all 0.15s; }
    .btn-submit-green:hover { background: linear-gradient(135deg, #047857, #065f46); transform: translateY(-1px); box-shadow: 0 6px 18px rgba(5,150,105,0.35); }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) { .kp-stats { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 768px) {
        .kp-header, .kp-filter-bar { padding-left: 16px; padding-right: 16px; }
        .kp-stats { padding: 14px 16px 0; grid-template-columns: repeat(2, 1fr); gap: 10px; }
        .kp-card { margin: 14px 14px 24px; }
        .kp-oos-alert { margin: 14px 16px 0; }
        .alert-custom { margin: 14px 16px 0; }
    }
    @media (max-width: 480px) { .kp-stats { grid-template-columns: 1fr; } }
</style>

    <?php
        // Hitung statistik
        $total_produk   = count($produk);
        $stok_aman      = count(array_filter($produk, fn($p) => (int)$p['stok'] > 10));
        $stok_menipis   = count(array_filter($produk, fn($p) => (int)$p['stok'] > 0 && (int)$p['stok'] <= 10));
        $stok_habis     = count(array_filter($produk, fn($p) => (int)$p['stok'] === 0));
        $produk_habis_list = array_filter($produk, fn($p) => (int)$p['stok'] === 0);
    ?>

    <!-- PAGE HEADER -->
    <div class="kp-header">
        <div>
            <h1><i class="fas fa-boxes" style="color:#1a56db; margin-right:6px; font-size:20px;"></i>Stok Produk</h1>
            <p>Pantau dan perbarui stok produk — Gudang PT Pordjo</p>
        </div>
    </div>

    <!-- STAT CARDS -->
    <div class="kp-stats">
        <div class="kp-stat-card">
            <div class="kp-stat-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-cube"></i></div>
            <div>
                <div class="kp-stat-value"><?= $total_produk ?></div>
                <div class="kp-stat-label">Total Produk</div>
            </div>
        </div>
        <div class="kp-stat-card">
            <div class="kp-stat-icon" style="background:#f0fdf4; color:#16a34a;"><i class="fas fa-check-circle"></i></div>
            <div>
                <div class="kp-stat-value" style="color:#16a34a;"><?= $stok_aman ?></div>
                <div class="kp-stat-label">Stok Aman</div>
            </div>
        </div>
        <div class="kp-stat-card">
            <div class="kp-stat-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-exclamation-triangle"></i></div>
            <div>
                <div class="kp-stat-value" style="color:#d97706;"><?= $stok_menipis ?></div>
                <div class="kp-stat-label">Stok Menipis</div>
            </div>
        </div>
        <div class="kp-stat-card">
            <div class="kp-stat-icon" style="background:#fef2f2; color:#dc2626;"><i class="fas fa-times-circle"></i></div>
            <div>
                <div class="kp-stat-value" style="color:#dc2626;"><?= $stok_habis ?></div>
                <div class="kp-stat-label">Stok Habis</div>
            </div>
        </div>
    </div>

    <!-- OUT-OF-STOCK ALERT -->
    <?php if (!empty($produk_habis_list)): ?>
    <div class="kp-oos-alert">
        <div class="kp-oos-icon"><i class="fas fa-exclamation-circle"></i></div>
        <div style="flex:1;">
            <div class="kp-oos-title"><i class="fas fa-bell" style="margin-right:4px;"></i> <?= count($produk_habis_list) ?> Produk Stok Habis — Segera Lakukan Restok</div>
            <div class="kp-oos-products">
                <?php foreach (array_slice($produk_habis_list, 0, 5) as $ph): ?>
                    <span class="kp-oos-pill"><i class="fas fa-times-circle" style="font-size:9px;"></i> <?= htmlspecialchars($ph['nama_produk']) ?></span>
                <?php endforeach; ?>
                <?php if (count($produk_habis_list) > 5): ?>
                    <span class="kp-oos-pill" style="background:#fecaca;">+<?= count($produk_habis_list) - 5 ?> lainnya</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- FILTER BADGE -->
    <?php if (!empty($filter_kategori)): ?>
    <div class="kp-filter-bar">
        <span class="kp-filter-badge">
            <i class="fas fa-filter" style="font-size:10px;"></i>
            Filter: <?= htmlspecialchars($filter_kategori) ?>
            <a href="<?= site_url('kasir/produk') ?>">✕</a>
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
    <div class="kp-card">
        <div class="kp-toolbar">
            <div style="display:flex; align-items:center;">
                <span class="kp-toolbar-title">Daftar Produk</span>
                <span class="kp-count-badge"><i class="fas fa-box" style="font-size:10px;"></i><?= $total_produk ?> produk</span>
            </div>
            <div class="kp-search">
                <i class="fas fa-search"></i>
                <input type="text" id="searchProduk" placeholder="Cari nama produk..." onkeyup="filterTable()">
            </div>
        </div>

        <table class="kp-table" id="produkTable">
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
                            <div class="kp-produk-cell">
                                <div class="kp-produk-avatar <?= $avatarClass ?>"><?= strtoupper(substr($p['nama_produk'], 0, 1)) ?></div>
                                <div>
                                    <span class="kp-produk-name"><?= htmlspecialchars($p['nama_produk']) ?></span>
                                </div>
                            </div>
                        </td>
                        <td><span class="kp-kat-pill"><i class="fas fa-tag" style="font-size:8px;"></i><?= htmlspecialchars($p['nama_kategori']) ?></span></td>
                        <td><span class="kp-price">Rp <?= number_format($p['harga_jual'], 0, ',', '.') ?></span></td>
                        <td>
                            <?php if ($stok === 0): ?>
                                <div class="kp-stok-wrap">
                                    <span class="kp-stok-habis-badge"><i class="fas fa-times-circle" style="font-size:9px;"></i> HABIS</span>
                                </div>
                            <?php else: ?>
                                <div class="kp-stok-wrap">
                                    <div class="kp-stok-bar-bg">
                                        <div class="kp-stok-bar-fill <?= $stokClass ?>" style="width:<?= $barPct ?>%"></div>
                                    </div>
                                    <span class="kp-stok-num <?= $stokClass ?>"><?= $stok ?></span>
                                    <span class="kp-stok-satuan"><?= htmlspecialchars($p['satuan']) ?>/pcs</span>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td style="text-align:center;">
                            <button class="kp-btn-stok"
                                onclick="openModalEditStok('<?= $p['id_product'] ?>', '<?= htmlspecialchars($p['nama_produk'], ENT_QUOTES) ?>', '<?= $p['stok'] ?>', '<?= htmlspecialchars($p['satuan'], ENT_QUOTES) ?>')">
                                <i class="fas fa-pen"></i> Edit Stok
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="no-data-row">
                        <td colspan="6">
                            <div class="kp-empty">
                                <div class="kp-empty-icon"><i class="fas fa-box-open"></i></div>
                                <div style="font-size:14px; font-weight:600; color:#6b7280; margin-bottom:4px;">Belum terdapat data produk<?= !empty($filter_kategori) ? ' di kategori ini' : '' ?>.</div>
                                <div style="font-size:12px; color:#9ca3af;">Silakan hubungi admin untuk menambahkan produk.</div>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="kp-pagination">
            <div class="kp-pagination-info" id="paginationInfo"></div>
            <div class="kp-pagination-controls" id="paginationControls"></div>
        </div>
    </div>

    <!-- MODAL EDIT STOK -->
    <div class="modal-overlay" id="modalEditStok">
        <div class="modal-box">
            <div class="modal-header">
                <h4><i class="fas fa-cubes" style="color:#059669; margin-right:8px;"></i>Edit Stok</h4>
                <button class="modal-close" onclick="closeModal('modalEditStok')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('kasir/produk/update_stok') ?>" method="post">
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
                    <button type="submit" class="btn-submit-green"><i class="fas fa-save"></i> Update Stok</button>
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
        prev.className = 'kp-page-btn nav-btn';
        prev.innerHTML = '<i class="fas fa-chevron-left"></i> Prev';
        prev.disabled = (page <= 1);
        prev.onclick = function() { renderPage(currentPage - 1); };
        ctrl.appendChild(prev);

        var sp = Math.max(1, page - 2), ep = Math.min(pages, sp + 4);
        if (ep - sp < 4) sp = Math.max(1, ep - 4);
        for (var p = sp; p <= ep; p++) {
            (function(pg) {
                var b = document.createElement('button');
                b.className = 'kp-page-btn' + (pg === page ? ' active' : '');
                b.textContent = pg;
                b.onclick = function() { renderPage(pg); };
                ctrl.appendChild(b);
            })(p);
        }

        var next = document.createElement('button');
        next.className = 'kp-page-btn nav-btn';
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

    function openModalEditStok(id, nama, stok, satuan) {
        document.getElementById('stok_id').value = id;
        document.getElementById('stok_nama_display').textContent = nama;
        document.getElementById('stok_current_display').textContent = stok;
        document.getElementById('stok_new').value = stok;
        document.getElementById('stok_satuan_hint').textContent = 'Satuan: ' + satuan;
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
