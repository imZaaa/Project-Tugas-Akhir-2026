<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
    .content-wrapper,
    .content-wrapper *:not(i):not(svg):not(path) {
        font-family: 'DM Sans', 'Segoe UI', sans-serif;
    }

    /* ===== PAGE TITLE ===== */
    .page-title-row {
        padding: 24px 28px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }

    .page-title-row h1 {
        font-size: 20px;
        font-weight: 700;
        color: #111827;
        margin: 0 0 3px;
    }

    .page-title-row p {
        font-size: 12.5px;
        color: #9ca3af;
        margin: 0;
    }

    /* ===== FILTER BAR ===== */
    .filter-bar {
        margin: 16px 24px 0;
        background: #fff;
        border-radius: 14px;
        border: 1px solid #e8ecf0;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
        padding: 16px 20px;
        display: flex;
        align-items: flex-end;
        gap: 14px;
        flex-wrap: wrap;
    }

    .filter-group {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .filter-label {
        font-size: 11px;
        font-weight: 600;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .filter-input {
        padding: 9px 12px;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        font-size: 13px;
        font-family: 'DM Sans', sans-serif;
        color: #111827;
        background: #fafafa;
        outline: none;
        transition: border-color 0.15s;
    }

    .filter-input:focus {
        border-color: #1a56db;
        background: #fff;
    }

    .preset-chips {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .preset-chip {
        padding: 7px 14px;
        border: 1.5px solid #e5e7eb;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        color: #6b7280;
        background: #fff;
        cursor: pointer;
        font-family: 'DM Sans', sans-serif;
        text-decoration: none !important;
        transition: all 0.15s;
    }

    .preset-chip:hover {
        border-color: #93c5fd;
        color: #1a56db;
        background: #eff6ff;
    }

    .preset-chip.active {
        background: #1a56db;
        border-color: #1a56db;
        color: #fff;
        box-shadow: 0 2px 8px rgba(26, 86, 219, 0.3);
    }

    .btn-filter {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 9px 18px;
        background: linear-gradient(135deg, #1a56db, #0d3fa6);
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        font-family: 'DM Sans', sans-serif;
        box-shadow: 0 3px 10px rgba(26, 86, 219, 0.3);
    }

    .btn-cetak-lap {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 9px 16px;
        background: #ecfdf5;
        color: #059669;
        border: 1.5px solid #a7f3d0;
        border-radius: 8px;
        font-size: 12.5px;
        font-weight: 600;
        cursor: pointer;
        font-family: 'DM Sans', sans-serif;
        text-decoration: none !important;
        transition: background 0.15s;
    }

    .btn-cetak-lap:hover {
        background: #d1fae5;
        color: #059669;
    }

    /* ===== STAT CARDS ===== */
    .lap-stats {
        padding: 16px 24px 0;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
    }

    .lap-stat-card {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #e8ecf0;
        padding: 16px 18px;
        display: flex;
        align-items: center;
        gap: 14px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .lap-stat-icon {
        width: 42px;
        height: 42px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        flex-shrink: 0;
    }

    .lap-stat-value {
        font-size: 22px;
        font-weight: 800;
        color: #111827;
        line-height: 1;
    }

    .lap-stat-label {
        font-size: 11.5px;
        color: #9ca3af;
        font-weight: 500;
        margin-top: 3px;
    }

    /* ===== SETORAN BOX ===== */
    .setoran-card {
        margin: 16px 24px 0;
        background: linear-gradient(135deg, #1a56db, #0d3fa6);
        border-radius: 14px;
        padding: 24px 28px;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 4px 20px rgba(26, 86, 219, 0.3);
    }

    .setoran-card .setoran-label {
        font-size: 14px;
        font-weight: 500;
        opacity: 0.85;
    }

    .setoran-card .setoran-value {
        font-size: 32px;
        font-weight: 800;
        margin-top: 6px;
        letter-spacing: -0.5px;
    }

    .setoran-card .setoran-note {
        font-size: 12px;
        opacity: 0.65;
        margin-top: 4px;
    }

    /* ===== MAIN CARD ===== */
    .main-card {
        margin: 16px 24px 0;
        background: #fff;
        border-radius: 14px;
        border: 1px solid #e8ecf0;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
        overflow: hidden;
    }

    .main-card:last-child {
        margin-bottom: 28px;
    }

    .card-header-custom {
        padding: 16px 20px;
        border-bottom: 1px solid #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .card-header-custom h3 {
        font-size: 14px;
        font-weight: 700;
        color: #111827;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .card-header-custom .header-icon {
        width: 30px;
        height: 30px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
    }

    .count-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #eff6ff;
        color: #1a56db;
        font-size: 12px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 20px;
    }

    /* ===== DATA TABLE ===== */
    .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th {
        font-size: 10.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #9ca3af;
        padding: 11px 16px;
        text-align: left;
        background: #fafafa;
        border-bottom: 1px solid #f1f3f5;
        white-space: nowrap;
    }

    .data-table td {
        padding: 12px 16px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #f7f8f9;
        vertical-align: middle;
    }

    .data-table tr:last-child td {
        border-bottom: none;
    }

    .data-table tr:hover td {
        background: #f8fbff;
    }

    .trx-code {
        font-size: 12px;
        font-weight: 700;
        color: #1a56db;
        font-family: 'Courier New', monospace;
    }

    .total-text {
        font-weight: 700;
        color: #111827;
        font-size: 13px;
    }

    /* ===== TOP PRODUK ===== */
    .rank-badge {
        width: 26px;
        height: 26px;
        border-radius: 7px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 700;
    }

    .rank-1 {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #fff;
    }

    .rank-2 {
        background: linear-gradient(135deg, #9ca3af, #6b7280);
        color: #fff;
    }

    .rank-3 {
        background: linear-gradient(135deg, #d97706, #b45309);
        color: #fff;
    }

    .rank-other {
        background: #f3f4f6;
        color: #6b7280;
    }

    .progress-bar-wrap {
        background: #f3f4f6;
        border-radius: 4px;
        height: 6px;
        width: 100%;
        overflow: hidden;
    }

    .progress-bar-fill {
        height: 100%;
        border-radius: 4px;
        background: linear-gradient(90deg, #1a56db, #3b82f6);
        transition: width 0.5s ease;
    }

    /* ===== 2 COLUMN GRID ===== */
    .grid-2col {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin: 16px 24px 0;
    }

    /* ===== CARD TOOLBAR ===== */
    .card-toolbar {
        padding: 14px 20px;
        border-bottom: 1px solid #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
    }

    .search-box {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #f8fafc;
        border: 1.5px solid #e8ecf0;
        border-radius: 8px;
        padding: 7px 12px;
    }

    .search-box:focus-within {
        border-color: #1a56db;
        background: #fff;
    }

    .search-box i {
        color: #9ca3af;
        font-size: 12px;
    }

    .search-box input {
        border: none;
        background: transparent;
        font-size: 13px;
        color: #374151;
        outline: none;
        width: 200px;
        font-family: 'DM Sans', sans-serif;
    }

    /* ===== PAGINATION ===== */
    .pagination-wrap {
        padding: 14px 20px;
        border-top: 1px solid #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }

    .pagination-info {
        font-size: 12.5px;
        color: #9ca3af;
        font-weight: 500;
    }

    .pagination-info strong {
        color: #374151;
    }

    .pagination-controls {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .page-btn {
        width: 32px;
        height: 32px;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        background: #fff;
        color: #374151;
        font-size: 12.5px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.15s;
        font-family: 'DM Sans', sans-serif;
    }

    .page-btn:hover:not(:disabled) {
        background: #eff6ff;
        border-color: #93c5fd;
        color: #1a56db;
    }

    .page-btn.active {
        background: #1a56db;
        border-color: #1a56db;
        color: #fff;
    }

    .page-btn:disabled {
        opacity: 0.35;
        cursor: not-allowed;
    }

    .page-btn.nav-btn {
        width: auto;
        padding: 0 10px;
        font-size: 12px;
    }

    /* ===== EMPTY STATE ===== */
    .no-data-msg {
        text-align: center;
        padding: 40px 20px;
        color: #9ca3af;
        font-size: 13px;
    }

    .no-data-msg i {
        font-size: 32px;
        color: #d1d5db;
        display: block;
        margin-bottom: 10px;
    }

    @media (max-width: 1024px) { .grid-2col { grid-template-columns: 1fr; } }
    @media (max-width: 768px) {
        .lap-stats { grid-template-columns: 1fr; padding: 12px 14px 0; }
        .filter-bar, .main-card, .setoran-card, .grid-2col { margin-left: 14px; margin-right: 14px; }
        .page-title-row { padding-left: 16px; padding-right: 16px; }
    }
</style>

    <?php
        $tgl_awal_fmt  = date('d M Y', strtotime($tgl_awal));
        $tgl_akhir_fmt = date('d M Y', strtotime($tgl_akhir));
        $is_same_day   = ($tgl_awal === $tgl_akhir);
        $periode_label = $is_same_day ? $tgl_awal_fmt : $tgl_awal_fmt . ' — ' . $tgl_akhir_fmt;
        $nama_kasir    = $this->session->userdata('nama') ?: $this->session->userdata('username');
    ?>

    <!-- PAGE TITLE -->
    <div class="page-title-row">
        <div>
            <h1><i class="fas fa-file-invoice-dollar" style="color:#1a56db; margin-right:6px;"></i>Laporan Penjualan Saya</h1>
            <p>Hai, <?= htmlspecialchars($nama_kasir) ?>! Periode: <?= $periode_label ?></p>
        </div>
        <a href="<?= site_url('kasir/laporan/cetak?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir) ?>" class="btn-cetak-lap" target="_blank">
            <i class="fas fa-print"></i> Cetak Setoran
        </a>
    </div>

    <!-- FILTER -->
    <div class="filter-bar">
        <div class="filter-group" style="flex:1;">
            <span class="filter-label">Filter Cepat</span>
            <div class="preset-chips">
                <a href="<?= site_url('kasir/laporan?preset=hari_ini') ?>" class="preset-chip <?= ($preset === 'hari_ini') ? 'active' : '' ?>">Hari Ini</a>
                <a href="<?= site_url('kasir/laporan?preset=minggu_ini') ?>" class="preset-chip <?= ($preset === 'minggu_ini') ? 'active' : '' ?>">Minggu Ini</a>
                <a href="<?= site_url('kasir/laporan?preset=bulan_ini') ?>" class="preset-chip <?= ($preset === 'bulan_ini') ? 'active' : '' ?>">Bulan Ini</a>
            </div>
        </div>
        <form method="get" action="<?= site_url('kasir/laporan') ?>" style="display:flex; align-items:flex-end; gap:10px; flex-wrap:wrap;">
            <input type="hidden" name="preset" value="custom">
            <div class="filter-group">
                <span class="filter-label">Dari</span>
                <input type="date" name="tgl_awal" class="filter-input" value="<?= $tgl_awal ?>">
            </div>
            <div class="filter-group">
                <span class="filter-label">Sampai</span>
                <input type="date" name="tgl_akhir" class="filter-input" value="<?= $tgl_akhir ?>">
            </div>
            <button type="submit" class="btn-filter"><i class="fas fa-filter"></i> Terapkan</button>
        </form>
    </div>

    <!-- SETORAN CARD -->
    <div class="setoran-card">
        <div>
            <div class="setoran-label"><i class="fas fa-cash-register" style="margin-right:6px;"></i>Total Setoran <?= $is_same_day ? 'Hari Ini' : 'Periode Ini' ?></div>
            <div class="setoran-value">Rp <?= number_format($total_omzet, 0, ',', '.') ?></div>
            <div class="setoran-note">Dari <?= $total_trx ?> transaksi lunas · Rata-rata Rp <?= number_format($rata_rata, 0, ',', '.') ?>/trx</div>
        </div>
        <div style="text-align:right;">
            <div style="font-size:48px; opacity:0.15;"><i class="fas fa-wallet"></i></div>
        </div>
    </div>

    <!-- STAT CARDS -->
    <div class="lap-stats">
        <div class="lap-stat-card">
            <div class="lap-stat-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-receipt"></i></div>
            <div>
                <div class="lap-stat-value"><?= $total_trx ?></div>
                <div class="lap-stat-label">Total Transaksi</div>
            </div>
        </div>
        <div class="lap-stat-card">
            <div class="lap-stat-icon" style="background:#ecfdf5; color:#059669;"><i class="fas fa-money-bill-wave"></i></div>
            <div>
                <div class="lap-stat-value" style="font-size:16px;">Rp <?= number_format($total_omzet, 0, ',', '.') ?></div>
                <div class="lap-stat-label">Total Omzet</div>
            </div>
        </div>
        <div class="lap-stat-card">
            <div class="lap-stat-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-calculator"></i></div>
            <div>
                <div class="lap-stat-value" style="font-size:16px;">Rp <?= number_format($rata_rata, 0, ',', '.') ?></div>
                <div class="lap-stat-label">Rata-rata / Trx</div>
            </div>
        </div>
    </div>

    <!-- TOP PRODUK & TABEL TRX -->
    <div class="grid-2col">
        <!-- TOP PRODUK -->
        <div class="main-card" style="margin:0;">
            <div class="card-header-custom">
                <h3><span class="header-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-trophy"></i></span>Produk Terlaris Saya</h3>
                <span class="count-badge">Top <?= count($top_produk) ?></span>
            </div>
            <?php if (!empty($top_produk)): ?>
            <?php $max_qty = (int)($top_produk[0]['total_qty'] ?? 1); ?>
            <table class="data-table">
                <thead><tr><th>#</th><th>Produk</th><th>Terjual</th><th>Pendapatan</th></tr></thead>
                <tbody>
                    <?php foreach ($top_produk as $i => $tp): ?>
                    <tr>
                        <td>
                            <?php $rc = ($i===0?'rank-1':($i===1?'rank-2':($i===2?'rank-3':'rank-other'))); ?>
                            <span class="rank-badge <?= $rc ?>"><?= $i+1 ?></span>
                        </td>
                        <td>
                            <strong style="color:#111827; font-size:12.5px;"><?= htmlspecialchars($tp['nama_produk']) ?></strong>
                            <span style="display:block; font-size:11px; color:#9ca3af;"><?= htmlspecialchars($tp['nama_kategori'] ?? '') ?></span>
                            <div class="progress-bar-wrap" style="margin-top:4px;">
                                <div class="progress-bar-fill" style="width:<?= round(($tp['total_qty'] / $max_qty) * 100) ?>%;"></div>
                            </div>
                        </td>
                        <td style="font-weight:700;"><?= $tp['total_qty'] ?> <?= $tp['satuan'] ?></td>
                        <td style="font-weight:700; color:#059669; font-size:12.5px;">Rp <?= number_format($tp['total_pendapatan'], 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <div class="no-data-msg"><i class="fas fa-trophy"></i>Belum terdapat data.</div>
            <?php endif; ?>
        </div>

        <!-- INFO KASIR -->
        <div class="main-card" style="margin:0;">
            <div class="card-header-custom">
                <h3><span class="header-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-user"></i></span>Info Kasir</h3>
            </div>
            <div style="padding:20px;">
                <div style="display:flex; align-items:center; gap:14px; margin-bottom:20px;">
                    <div style="width:52px; height:52px; border-radius:12px; background:linear-gradient(135deg,#1a56db,#0d3fa6); display:flex; align-items:center; justify-content:center; color:#fff; font-size:20px; font-weight:700;">
                        <?= strtoupper(substr($nama_kasir, 0, 1)) ?>
                    </div>
                    <div>
                        <div style="font-size:16px; font-weight:700; color:#111827;"><?= htmlspecialchars($nama_kasir) ?></div>
                        <div style="font-size:12px; color:#9ca3af;">Kasir · PT Pordjo Steelindo</div>
                    </div>
                </div>
                <div style="background:#f8fafc; border:1px solid #e8ecf0; border-radius:10px; padding:14px;">
                    <div style="display:flex; justify-content:space-between; padding:6px 0; border-bottom:1px solid #f1f3f5;">
                        <span style="font-size:12px; color:#6b7280;">Periode</span>
                        <span style="font-size:12px; font-weight:600; color:#111827;"><?= $periode_label ?></span>
                    </div>
                    <div style="display:flex; justify-content:space-between; padding:6px 0; border-bottom:1px solid #f1f3f5;">
                        <span style="font-size:12px; color:#6b7280;">Transaksi</span>
                        <span style="font-size:12px; font-weight:600; color:#111827;"><?= $total_trx ?> trx</span>
                    </div>
                    <div style="display:flex; justify-content:space-between; padding:6px 0;">
                        <span style="font-size:12px; color:#6b7280;">Total Setoran</span>
                        <span style="font-size:12px; font-weight:700; color:#059669;">Rp <?= number_format($total_omzet, 0, ',', '.') ?></span>
                    </div>
                </div>
                <a href="<?= site_url('kasir/laporan/cetak?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir) ?>" target="_blank"
                   style="display:flex; align-items:center; justify-content:center; gap:8px; margin-top:14px; padding:11px; border-radius:9px; background:linear-gradient(135deg,#1a56db,#0d3fa6); color:#fff; font-size:13px; font-weight:600; text-decoration:none; box-shadow:0 3px 10px rgba(26,86,219,0.3);">
                    <i class="fas fa-print"></i> Cetak Laporan Setoran
                </a>
            </div>
        </div>
    </div>

    <!-- TABEL TRANSAKSI -->
    <div class="main-card" style="margin-bottom:28px;">
        <div class="card-toolbar">
            <div style="display:flex; align-items:center; gap:10px;">
                <span style="font-size:14px; font-weight:700; color:#111827;">Daftar Transaksi</span>
                <span class="count-badge"><i class="fas fa-receipt" style="font-size:10px;"></i><?= count($sales) ?></span>
            </div>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchLap" placeholder="Cari kode transaksi..." onkeyup="filterTable()">
            </div>
        </div>

        <table class="data-table" id="lapTable">
            <thead>
                <tr><th>#</th><th>Kode Transaksi</th><th>Tanggal</th><th>Total Harga</th><th>Bayar</th><th>Kembalian</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                <?php if (!empty($sales)): ?>
                    <?php foreach ($sales as $i => $s): ?>
                    <tr>
                        <td style="color:#9ca3af; font-size:12px;"><?= $i+1 ?></td>
                        <td><span class="trx-code"><?= htmlspecialchars($s['kode_transaksi']) ?></span></td>
                        <td style="font-size:12.5px;"><?= date('d M Y H:i', strtotime($s['tgl_jual'])) ?></td>
                        <td><span class="total-text">Rp <?= number_format($s['total_harga'], 0, ',', '.') ?></span></td>
                        <td style="font-size:12.5px;">Rp <?= number_format($s['bayar'] ?? 0, 0, ',', '.') ?></td>
                        <td style="font-size:12.5px;">Rp <?= number_format($s['kembalian'] ?? 0, 0, ',', '.') ?></td>
                        <td>
                            <a href="<?= site_url('kasir/penjualan/detail/' . $s['id_sale']) ?>" style="display:inline-flex; align-items:center; gap:4px; font-size:11.5px; font-weight:600; padding:5px 10px; border-radius:7px; background:#eff6ff; color:#1a56db; text-decoration:none;">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            <a href="<?= site_url('kasir/penjualan/cetak/' . $s['id_sale']) ?>" target="_blank" style="display:inline-flex; align-items:center; gap:4px; font-size:11.5px; font-weight:600; padding:5px 10px; border-radius:7px; background:#ecfdf5; color:#059669; text-decoration:none; margin-left:4px;">
                                <i class="fas fa-print"></i> Nota
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7" class="no-data-msg"><i class="fas fa-file-alt"></i>Tidak ada transaksi di periode ini</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if (!empty($sales)): ?>
        <div style="padding:14px 20px; border-top:2px solid #e5e7eb; background:#fafafa; display:flex; justify-content:space-between; align-items:center;">
            <span style="font-size:14px; font-weight:700; color:#111827;">TOTAL SETORAN</span>
            <span style="font-size:18px; font-weight:800; color:#1a56db;">Rp <?= number_format($total_omzet, 0, ',', '.') ?></span>
        </div>
        <?php endif; ?>

        <div class="pagination-wrap">
            <div class="pagination-info" id="paginationInfo"></div>
            <div class="pagination-controls" id="paginationControls"></div>
        </div>
    </div>

</div>

<script>
    var ROWS_PER_PAGE = 15, currentPage = 1, allRows = [], filteredRows = [];
    function initPagination() { allRows = Array.from(document.querySelectorAll('#lapTable tbody tr:not(.no-data-row)')); filteredRows = allRows.slice(); renderPage(1); }
    function renderPage(page) {
        currentPage = page;
        var total = filteredRows.length, pages = Math.ceil(total / ROWS_PER_PAGE) || 1;
        var start = (page-1) * ROWS_PER_PAGE, end = Math.min(start + ROWS_PER_PAGE, total);
        allRows.forEach(function(r) { r.style.display = 'none'; });
        filteredRows.forEach(function(r, i) { r.style.display = (i >= start && i < end) ? '' : 'none'; });
        document.getElementById('paginationInfo').innerHTML = total === 0 ? '' : 'Menampilkan <strong>' + (start+1) + '–' + end + '</strong> dari <strong>' + total + '</strong>';
        var ctrl = document.getElementById('paginationControls'); ctrl.innerHTML = '';
        var prev = document.createElement('button'); prev.className='page-btn nav-btn'; prev.innerHTML='<i class="fas fa-chevron-left"></i> Prev'; prev.disabled=(page<=1); prev.onclick=function(){renderPage(currentPage-1);}; ctrl.appendChild(prev);
        var sp=Math.max(1,page-2),ep=Math.min(pages,sp+4); if(ep-sp<4)sp=Math.max(1,ep-4);
        for(var p=sp;p<=ep;p++){(function(pg){var b=document.createElement('button');b.className='page-btn'+(pg===page?' active':'');b.textContent=pg;b.onclick=function(){renderPage(pg);};ctrl.appendChild(b);})(p);}
        var next=document.createElement('button');next.className='page-btn nav-btn';next.innerHTML='Next <i class="fas fa-chevron-right"></i>';next.disabled=(page>=pages);next.onclick=function(){renderPage(currentPage+1);};ctrl.appendChild(next);
    }
    function filterTable() { var kw=document.getElementById('searchLap').value.toLowerCase(); filteredRows=allRows.filter(function(r){return r.textContent.toLowerCase().includes(kw);}); renderPage(1); }
    document.addEventListener('DOMContentLoaded', function() { initPagination(); });
</script>
