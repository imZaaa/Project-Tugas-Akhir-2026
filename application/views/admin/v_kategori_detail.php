<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path) { font-family: 'DM Sans','Segoe UI',sans-serif; }

    /* ===== HEADER ROW ===== */
    .page-title-row { padding: 24px 28px 0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
    .page-title-row h1 { font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 3px; letter-spacing: -0.3px; }
    .page-title-row p  { font-size: 12.5px; color: #9ca3af; margin: 0; }
    .btn-back { display: inline-flex; align-items: center; gap: 7px; background: #f3f4f6; color: #374151 !important; border: none; padding: 9px 16px; border-radius: 9px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; transition: background 0.15s; }
    .btn-back:hover { background: #e5e7eb; }

    /* ===== STAT CARDS ===== */
    .kd-stats { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; padding: 20px 28px 0; }
    .kd-stat { background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; padding: 16px 18px; display: flex; align-items: center; gap: 14px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); transition: transform 0.15s, box-shadow 0.15s; }
    .kd-stat:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,0,0,0.07); }
    .kd-stat-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 17px; flex-shrink: 0; }
    .kd-stat-value { font-size: 22px; font-weight: 800; color: #111827; line-height: 1; }
    .kd-stat-label { font-size: 11.5px; color: #9ca3af; font-weight: 500; margin-top: 3px; }

    /* ===== LAYOUT ===== */
    .detail-layout { margin: 18px 24px 28px; display: grid; grid-template-columns: 1fr 300px; gap: 20px; align-items: start; }

    /* ===== CARDS ===== */
    .det-card { background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); overflow: hidden; }
    .det-card-header { padding: 15px 20px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; gap: 10px; }
    .det-card-header-left { display: flex; align-items: center; gap: 10px; }
    .det-card-header h3 { font-size: 14px; font-weight: 700; color: #111827; margin: 0; }
    .det-hdr-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 13px; flex-shrink: 0; }

    /* ===== KAT BANNER ===== */
    .kat-banner { background: linear-gradient(135deg, #1a56db, #0d3fa6); padding: 22px 24px; display: flex; align-items: center; gap: 18px; }
    .kat-banner-icon { width: 56px; height: 56px; border-radius: 16px; background: rgba(255,255,255,0.15); display: flex; align-items: center; justify-content: center; font-size: 24px; font-weight: 800; color: #fff; flex-shrink: 0; backdrop-filter: blur(4px); border: 1.5px solid rgba(255,255,255,0.2); }
    .kat-banner-name { font-size: 22px; font-weight: 800; color: #fff; letter-spacing: -0.3px; }
    .kat-banner-sub  { font-size: 12.5px; color: rgba(255,255,255,0.7); margin-top: 4px; }
    .kat-banner-id   { font-family: 'Courier New', monospace; font-size: 11px; color: rgba(255,255,255,0.5); margin-top: 3px; letter-spacing: 0.5px; }

    /* ===== ITEMS TABLE ===== */
    .items-table { width: 100%; border-collapse: collapse; }
    .items-table th { font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #9ca3af; padding: 11px 20px; text-align: left; background: #fafafa; border-bottom: 1px solid #f1f3f5; white-space: nowrap; }
    .items-table td { padding: 13px 20px; font-size: 13px; color: #374151; border-bottom: 1px solid #f7f8f9; vertical-align: middle; }
    .items-table tr:last-child td { border-bottom: none; }
    .items-table tr:hover td { background: #fafbff; }
    .items-table tr.stok-habis-row td { background: #fefce8; }
    .items-table tr.stok-habis-row:hover td { background: #fef9c3; }

    .prod-avatar { width: 36px; height: 36px; border-radius: 10px; display: inline-flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 800; color: white; flex-shrink: 0; }
    .prod-name-wrap { display: flex; align-items: center; gap: 10px; }
    .prod-name { font-size: 13.5px; font-weight: 600; color: #111827; }
    .prod-satuan { font-size: 11px; color: #9ca3af; margin-top: 2px; display: block; }

    .price-text { font-weight: 700; color: #111827; font-size: 13.5px; white-space: nowrap; }

    .stok-ok    { display: inline-flex; align-items: center; gap: 5px; background: #f0fdf4; color: #16a34a; font-size: 12px; font-weight: 700; padding: 4px 10px; border-radius: 20px; }
    .stok-warn  { display: inline-flex; align-items: center; gap: 5px; background: #fffbeb; color: #d97706; font-size: 12px; font-weight: 700; padding: 4px 10px; border-radius: 20px; }
    .stok-habis { display: inline-flex; align-items: center; gap: 5px; background: #fef2f2; color: #dc2626; font-size: 12px; font-weight: 700; padding: 4px 10px; border-radius: 20px; }

    .stok-bar-wrap { display: flex; align-items: center; gap: 8px; }
    .stok-bar-bg   { width: 60px; height: 6px; background: #f1f3f5; border-radius: 3px; overflow: hidden; flex-shrink: 0; }
    .stok-bar-fill { height: 100%; border-radius: 3px; }
    .stok-bar-fill.ok       { background: linear-gradient(90deg, #22c55e, #16a34a); }
    .stok-bar-fill.warn     { background: linear-gradient(90deg, #f59e0b, #d97706); }
    .stok-bar-fill.critical { background: linear-gradient(90deg, #ef4444, #dc2626); }

    /* ===== EMPTY STATE ===== */
    .empty-state { text-align: center; padding: 60px 20px; }
    .empty-icon { width: 64px; height: 64px; background: #f5f3ff; border-radius: 18px; display: flex; align-items: center; justify-content: center; font-size: 26px; color: #c4b5fd; margin: 0 auto 14px; }

    /* ===== SIDEBAR ===== */
    .side-info-row { display: flex; align-items: center; gap: 12px; padding: 14px 20px; border-bottom: 1px solid #f7f8f9; }
    .side-info-row:last-child { border-bottom: none; }
    .side-icon { width: 36px; height: 36px; border-radius: 9px; display: flex; align-items: center; justify-content: center; font-size: 13px; flex-shrink: 0; }
    .side-label { font-size: 11px; color: #9ca3af; font-weight: 500; display: block; margin-bottom: 2px; }
    .side-value { font-size: 13px; font-weight: 700; color: #111827; display: block; }

    .sidebar-total { background: linear-gradient(135deg, #1a56db, #0d3fa6); padding: 16px 20px; margin: 0; }
    .sidebar-total .s-label { font-size: 11.5px; color: rgba(255,255,255,0.75); font-weight: 500; margin-bottom: 4px; }
    .sidebar-total .s-value { font-size: 22px; font-weight: 800; color: #fff; }

    .btn-action-lg { display: flex; align-items: center; justify-content: center; gap: 8px; padding: 11px 16px; border-radius: 9px; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; text-decoration: none !important; transition: opacity 0.15s, transform 0.15s; border: none; }
    .btn-action-lg:hover { opacity: 0.9; transform: translateY(-1px); }
    .btn-produk { background: linear-gradient(135deg, #1a56db, #0d3fa6); color: #fff !important; box-shadow: 0 3px 10px rgba(26,86,219,0.3); }
    .btn-kembali { background: #f3f4f6; color: #374151 !important; border: 1px solid #e5e7eb; }
    .btn-kembali:hover { background: #e5e7eb; transform: none; }

    /* ===== STOK HABIS WARNING ===== */
    .habis-alert { margin: 16px 28px 0; padding: 13px 18px; background: linear-gradient(135deg, #fef2f2, #fff1f2); border: 1px solid #fecaca; border-radius: 12px; display: flex; align-items: center; gap: 12px; }
    .habis-alert-icon { width: 38px; height: 38px; background: #fee2e2; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #dc2626; font-size: 15px; flex-shrink: 0; }
    .habis-alert-title { font-size: 13px; font-weight: 700; color: #dc2626; margin-bottom: 3px; }
    .habis-alert-pills { display: flex; flex-wrap: wrap; gap: 4px; margin-top: 4px; }
    .habis-pill { display: inline-flex; align-items: center; gap: 3px; background: #fee2e2; color: #991b1b; font-size: 11px; font-weight: 600; padding: 2px 8px; border-radius: 20px; }

    @media (max-width: 1024px) {
        .kd-stats { grid-template-columns: repeat(2, 1fr); }
        .detail-layout { grid-template-columns: 1fr; }
    }
    @media (max-width: 768px) {
        .kd-stats { padding: 16px 16px 0; gap: 10px; }
        .detail-layout { margin: 14px 14px 24px; }
        .page-title-row { padding-left: 16px; padding-right: 16px; }
        .habis-alert { margin-left: 16px; margin-right: 16px; }
    }
    @media (max-width: 480px) { .kd-stats { grid-template-columns: 1fr 1fr; } }
</style>

<?php
    // Hitung statistik
    $total_produk    = count($produk);
    $stok_aman_c     = count(array_filter($produk, fn($p) => (int)$p['stok'] > 10));
    $stok_menipis_c  = count(array_filter($produk, fn($p) => (int)$p['stok'] > 0 && (int)$p['stok'] <= 10));
    $stok_habis_c    = count(array_filter($produk, fn($p) => (int)$p['stok'] === 0));
    $total_stok      = array_sum(array_column($produk, 'stok'));
    $produk_habis    = array_filter($produk, fn($p) => (int)$p['stok'] === 0);
    $harga_rata      = $total_produk > 0 ? array_sum(array_column($produk, 'harga_jual')) / $total_produk : 0;
?>

    <!-- PAGE TITLE -->
    <div class="page-title-row">
        <div>
            <h1><i class="fas fa-tag" style="color:#1a56db; margin-right:6px; font-size:18px;"></i>Detail Kategori</h1>
            <p>Informasi lengkap dan daftar produk — <?= htmlspecialchars($kategori['nama_kategori']) ?></p>
        </div>
        <a href="<?= site_url('admin/kategori') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali ke Kategori
        </a>
    </div>

    <!-- STAT CARDS -->
    <div class="kd-stats">
        <div class="kd-stat">
            <div class="kd-stat-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-cube"></i></div>
            <div>
                <div class="kd-stat-value"><?= $total_produk ?></div>
                <div class="kd-stat-label">Total Produk</div>
            </div>
        </div>
        <div class="kd-stat">
            <div class="kd-stat-icon" style="background:#f0fdf4; color:#16a34a;"><i class="fas fa-check-circle"></i></div>
            <div>
                <div class="kd-stat-value" style="color:#16a34a;"><?= $stok_aman_c ?></div>
                <div class="kd-stat-label">Stok Aman</div>
            </div>
        </div>
        <div class="kd-stat">
            <div class="kd-stat-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-exclamation-triangle"></i></div>
            <div>
                <div class="kd-stat-value" style="color:#d97706;"><?= $stok_menipis_c ?></div>
                <div class="kd-stat-label">Stok Menipis</div>
            </div>
        </div>
        <div class="kd-stat">
            <div class="kd-stat-icon" style="background:#fef2f2; color:#dc2626;"><i class="fas fa-times-circle"></i></div>
            <div>
                <div class="kd-stat-value" style="color:#dc2626;"><?= $stok_habis_c ?></div>
                <div class="kd-stat-label">Stok Habis</div>
            </div>
        </div>
    </div>

    <!-- STOK HABIS ALERT -->
    <?php if (!empty($produk_habis)): ?>
    <div class="habis-alert">
        <div class="habis-alert-icon"><i class="fas fa-exclamation-circle"></i></div>
        <div style="flex:1;">
            <div class="habis-alert-title"><i class="fas fa-bell" style="margin-right:4px;"></i><?= count($produk_habis) ?> produk stok habis — Segera lakukan restok!</div>
            <div class="habis-alert-pills">
                <?php foreach (array_slice($produk_habis, 0, 5) as $ph): ?>
                    <span class="habis-pill"><i class="fas fa-times-circle" style="font-size:9px;"></i><?= htmlspecialchars($ph['nama_produk']) ?></span>
                <?php endforeach; ?>
                <?php if (count($produk_habis) > 5): ?>
                    <span class="habis-pill" style="background:#fecaca;">+<?= count($produk_habis) - 5 ?> lainnya</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- MAIN LAYOUT -->
    <div class="detail-layout">

        <!-- LEFT: BANNER + TABEL PRODUK -->
        <div style="display:flex; flex-direction:column; gap:18px;">

            <!-- KATEGORI BANNER -->
            <div class="det-card">
                <div class="kat-banner">
                    <div class="kat-banner-icon"><?= strtoupper(substr($kategori['nama_kategori'], 0, 1)) ?></div>
                    <div>
                        <div class="kat-banner-name"><?= htmlspecialchars($kategori['nama_kategori']) ?></div>
                        <div class="kat-banner-sub"><?= $total_produk ?> produk terdaftar di kategori ini</div>
                        <div class="kat-banner-id">ID KATEGORI: #<?= str_pad($kategori['id_category'], 4, '0', STR_PAD_LEFT) ?></div>
                    </div>
                </div>
            </div>

            <!-- TABEL PRODUK -->
            <div class="det-card">
                <div class="det-card-header">
                    <div class="det-card-header-left">
                        <div class="det-hdr-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-list"></i></div>
                        <h3>Daftar Produk</h3>
                    </div>
                    <span style="background:#eff6ff; color:#1a56db; font-size:12px; font-weight:600; padding:4px 12px; border-radius:20px;">
                        <i class="fas fa-box" style="font-size:10px;"></i> <?= $total_produk ?> produk
                    </span>
                </div>

                <?php if (!empty($produk)): ?>
                <table class="items-table">
                    <thead>
                        <tr>
                            <th style="width:40px;">#</th>
                            <th>Produk</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $avatarColors = [
                            ['#6366f1','#4f46e5'], ['#f59e0b','#d97706'], ['#14b8a6','#0d9488'],
                            ['#3b82f6','#2563eb'], ['#0ea5e9','#0284c7'], ['#1a56db','#0d3fa6'],
                            ['#ef4444','#dc2626'], ['#10b981','#059669'], ['#f97316','#ea580c'],
                        ];
                        foreach ($produk as $i => $p):
                            $stok = (int)$p['stok'];
                            if ($stok === 0)     { $stokClass = 'critical'; $barPct = 0; }
                            elseif ($stok <= 3)  { $stokClass = 'critical'; $barPct = min(($stok/20)*100, 100); }
                            elseif ($stok <= 10) { $stokClass = 'warn';     $barPct = min(($stok/20)*100, 100); }
                            else                 { $stokClass = 'ok';       $barPct = min(($stok/50)*100, 100); }
                            $clr = $avatarColors[$i % count($avatarColors)];
                        ?>
                        <tr class="<?= $stok === 0 ? 'stok-habis-row' : '' ?>">
                            <td style="color:#9ca3af; font-size:12px;"><?= $i + 1 ?></td>
                            <td>
                                <div class="prod-name-wrap">
                                    <div class="prod-avatar" style="background:linear-gradient(135deg,<?= $clr[0] ?>,<?= $clr[1] ?>);"><?= strtoupper(substr($p['nama_produk'], 0, 1)) ?></div>
                                    <div>
                                        <span class="prod-name"><?= htmlspecialchars($p['nama_produk']) ?></span>
                                        <span class="prod-satuan">Satuan: <?= htmlspecialchars($p['satuan']) ?></span>
                                    </div>
                                </div>
                            </td>
                            <td><span class="price-text">Rp <?= number_format($p['harga_jual'], 0, ',', '.') ?></span></td>
                            <td>
                                <?php if ($stok === 0): ?>
                                    <span class="stok-habis"><i class="fas fa-times-circle" style="font-size:10px;"></i> Habis</span>
                                <?php else: ?>
                                    <div class="stok-bar-wrap">
                                        <div class="stok-bar-bg">
                                            <div class="stok-bar-fill <?= $stokClass ?>" style="width:<?= $barPct ?>%"></div>
                                        </div>
                                        <span style="font-size:13px; font-weight:700; color:<?= $stokClass === 'ok' ? '#16a34a' : ($stokClass === 'warn' ? '#d97706' : '#dc2626') ?>;"><?= $stok ?></span>
                                        <span style="font-size:11px; color:#9ca3af;"><?= htmlspecialchars($p['satuan']) ?></span>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($stok === 0): ?>
                                    <span class="stok-habis"><i class="fas fa-times-circle" style="font-size:10px;"></i> Stok Habis</span>
                                <?php elseif ($stok <= 10): ?>
                                    <span class="stok-warn"><i class="fas fa-exclamation-triangle" style="font-size:10px;"></i> Menipis</span>
                                <?php else: ?>
                                    <span class="stok-ok"><i class="fas fa-check-circle" style="font-size:10px;"></i> Aman</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <div class="empty-state">
                    <div class="empty-icon"><i class="fas fa-box-open"></i></div>
                    <div style="font-size:14px; font-weight:600; color:#6b7280; margin-bottom:4px;">Belum ada produk di kategori ini</div>
                    <div style="font-size:12px; color:#9ca3af;">Tambahkan produk dan pilih kategori <strong><?= htmlspecialchars($kategori['nama_kategori']) ?></strong>.</div>
                </div>
                <?php endif; ?>
            </div>

        </div>

        <!-- RIGHT SIDEBAR -->
        <div>
            <div class="det-card" style="position:sticky; top:20px;">

                <!-- TOTAL STOK BANNER -->
                <div class="sidebar-total">
                    <div class="s-label"><i class="fas fa-cubes" style="margin-right:5px;"></i>Total Stok Tersedia</div>
                    <div class="s-value"><?= number_format($total_stok, 0, ',', '.') ?> unit</div>
                </div>

                <!-- INFO ROWS -->
                <div class="side-info-row">
                    <div class="side-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-tag"></i></div>
                    <div>
                        <span class="side-label">Nama Kategori</span>
                        <span class="side-value"><?= htmlspecialchars($kategori['nama_kategori']) ?></span>
                    </div>
                </div>
                <div class="side-info-row">
                    <div class="side-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-cube"></i></div>
                    <div>
                        <span class="side-label">Total Jenis Produk</span>
                        <span class="side-value"><?= $total_produk ?> produk</span>
                    </div>
                </div>
                <div class="side-info-row">
                    <div class="side-icon" style="background:#f0fdf4; color:#16a34a;"><i class="fas fa-check-circle"></i></div>
                    <div>
                        <span class="side-label">Stok Aman</span>
                        <span class="side-value" style="color:#16a34a;"><?= $stok_aman_c ?> produk</span>
                    </div>
                </div>
                <div class="side-info-row">
                    <div class="side-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-exclamation-triangle"></i></div>
                    <div>
                        <span class="side-label">Stok Menipis (≤10)</span>
                        <span class="side-value" style="color:#d97706;"><?= $stok_menipis_c ?> produk</span>
                    </div>
                </div>
                <div class="side-info-row">
                    <div class="side-icon" style="background:#fef2f2; color:#dc2626;"><i class="fas fa-times-circle"></i></div>
                    <div>
                        <span class="side-label">Stok Habis</span>
                        <span class="side-value" style="color:#dc2626;"><?= $stok_habis_c ?> produk</span>
                    </div>
                </div>
                <div class="side-info-row">
                    <div class="side-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-money-bill-wave"></i></div>
                    <div>
                        <span class="side-label">Rata-rata Harga Jual</span>
                        <span class="side-value">Rp <?= $total_produk > 0 ? number_format($harga_rata, 0, ',', '.') : '0' ?></span>
                    </div>
                </div>

                <!-- BUTTONS -->
                <div style="padding: 16px 20px; display:flex; flex-direction:column; gap:8px; border-top: 1px solid #f1f3f5;">
                    <a href="<?= site_url('admin/produk?id_category=' . $kategori['id_category']) ?>" class="btn-action-lg btn-produk">
                        <i class="fas fa-boxes"></i> Kelola Produk Ini
                    </a>
                    <a href="<?= site_url('admin/kategori') ?>" class="btn-action-lg btn-kembali">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
