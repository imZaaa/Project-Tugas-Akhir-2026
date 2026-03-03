<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');

    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path) {
        font-family: 'DM Sans', 'Segoe UI', sans-serif;
    }

    /* ===== NOTIFICATION BAR ===== */
    .notif-bar {
        margin: 20px 24px 0;
        background: linear-gradient(135deg, #f0fdf4, #dcfce7);
        border: 1.5px solid #86efac;
        border-radius: 12px;
        padding: 14px 18px;
        display: flex;
        align-items: center;
        gap: 14px;
        cursor: pointer;
        transition: box-shadow 0.2s;
        text-decoration: none;
    }

    .notif-bar:hover {
        box-shadow: 0 4px 16px rgba(22, 163, 74, 0.15);
        text-decoration: none;
    }

    .notif-pulse {
        width: 38px;
        height: 38px;
        background: #16a34a;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        color: #fff;
        flex-shrink: 0;
        position: relative;
    }

    .notif-pulse::after {
        content: '';
        position: absolute;
        inset: -3px;
        border-radius: 13px;
        border: 2px solid #16a34a;
        opacity: 0.5;
        animation: pulseRing 2s ease infinite;
    }

    @keyframes pulseRing {
        0%   { transform: scale(1);   opacity: 0.5; }
        70%  { transform: scale(1.2); opacity: 0; }
        100% { transform: scale(1);   opacity: 0; }
    }

    .notif-bar-text strong {
        font-size: 13.5px;
        font-weight: 700;
        color: #14532d;
        display: block;
    }

    .notif-bar-text span {
        font-size: 12px;
        color: #16a34a;
        font-weight: 500;
    }

    .notif-bar-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin-left: auto;
    }

    .notif-tag {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: rgba(22, 163, 74, 0.12);
        border: 1px solid #86efac;
        color: #15803d;
        font-size: 11.5px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
        white-space: nowrap;
    }

    .notif-bar-arrow {
        color: #16a34a;
        font-size: 14px;
        flex-shrink: 0;
        transition: transform 0.2s;
    }

    .notif-bar:hover .notif-bar-arrow {
        transform: translateX(4px);
    }

    /* EMPTY notif (hari ini belum ada) */
    .notif-bar-empty {
        margin: 20px 24px 0;
        background: #f8fafc;
        border: 1.5px dashed #e2e8f0;
        border-radius: 12px;
        padding: 11px 18px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 12.5px;
        color: #94a3b8;
        font-weight: 500;
    }

    /* ===== PAGE TITLE ===== */
    .dash-page-title {
        padding: 24px 28px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .dash-page-title h1 {
        font-size: 20px;
        font-weight: 700;
        color: #111827;
        margin: 0 0 3px;
        letter-spacing: -0.3px;
    }

    .dash-page-title p {
        font-size: 12.5px;
        color: #9ca3af;
        margin: 0;
        font-weight: 400;
    }

    .dash-date-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 6px 12px;
        font-size: 12.5px;
        color: #6b7280;
        font-weight: 500;
    }

    .dash-date-pill i { color: #1a56db; font-size: 12px; }

    /* ===== STAT CARDS ===== */
    .dash-cards-section {
        padding: 20px 24px 0;
    }

    .dash-stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }

    .stat-card {
        background: #ffffff;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.05);
        border: 1px solid #e8ecf0;
        display: flex;
        flex-direction: column;
        gap: 12px;
        transition: transform 0.2s, box-shadow 0.2s;
        animation: fadeSlideUp 0.4s ease both;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.09);
    }

    .stat-card:nth-child(1) { animation-delay: 0.05s; }
    .stat-card:nth-child(2) { animation-delay: 0.10s; }
    .stat-card:nth-child(3) { animation-delay: 0.15s; }
    .stat-card:nth-child(4) { animation-delay: 0.20s; }

    .stat-card-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }

    .stat-icon {
        width: 44px;
        height: 44px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .stat-icon.blue   { background: #eff6ff; color: #1a56db; }
    .stat-icon.green  { background: #f0fdf4; color: #16a34a; }
    .stat-icon.amber  { background: #fffbeb; color: #d97706; }
    .stat-icon.red    { background: #fef2f2; color: #dc2626; }

    .stat-badge {
        font-size: 10.5px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 20px;
    }

    .stat-badge.up      { background: #f0fdf4; color: #16a34a; }
    .stat-badge.down    { background: #fef2f2; color: #dc2626; }
    .stat-badge.neutral { background: #f3f4f6; color: #6b7280; }

    .stat-value {
        font-size: 28px;
        font-weight: 800;
        color: #111827;
        letter-spacing: -1px;
        line-height: 1;
    }

    .stat-label {
        font-size: 12px;
        color: #9ca3af;
        font-weight: 500;
        margin-top: 3px;
    }

    /* ===== MAIN SECTION ===== */
    .dash-main-section {
        padding: 20px 24px 28px;
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 20px;
    }

    .dash-card {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #e8ecf0;
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        overflow: hidden;
    }

    .dash-card-header {
        padding: 16px 20px;
        border-bottom: 1px solid #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .dash-card-header h3 {
        font-size: 14px;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }

    .dash-card-header p {
        font-size: 12px;
        color: #9ca3af;
        margin: 0;
    }

    .btn-card-action {
        font-size: 12px;
        font-weight: 600;
        color: #1a56db;
        background: #eff6ff;
        border: none;
        padding: 5px 12px;
        border-radius: 6px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: background 0.15s;
    }

    .btn-card-action:hover {
        background: #dbeafe;
        color: #1a56db;
        text-decoration: none;
    }

    /* ===== CHART ===== */
    .chart-container {
        padding: 16px 20px 20px;
        height: 220px;
        position: relative;
    }

    .chart-bars {
        display: flex;
        align-items: flex-end;
        gap: 10px;
        height: 160px;
        padding-bottom: 30px;
        position: relative;
    }

    .chart-bars::after {
        content: '';
        position: absolute;
        bottom: 30px; left: 0; right: 0;
        height: 1px;
        background: #f1f3f5;
    }

    .chart-bar-wrap {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%;
        justify-content: flex-end;
    }

    .chart-bar {
        width: 100%;
        background: #dbeafe;
        border-radius: 6px 6px 0 0;
        position: relative;
        min-height: 4px;
        transition: background 0.2s;
        cursor: pointer;
    }

    .chart-bar.active, .chart-bar:hover { background: #1a56db; }

    .chart-bar-tooltip {
        position: absolute;
        top: -28px; left: 50%;
        transform: translateX(-50%);
        background: #111827;
        color: white;
        font-size: 9.5px;
        font-weight: 600;
        padding: 3px 6px;
        border-radius: 4px;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.15s;
    }

    .chart-bar:hover .chart-bar-tooltip { opacity: 1; }

    .chart-bar-label {
        font-size: 10px;
        color: #9ca3af;
        font-weight: 500;
        position: absolute;
        bottom: 8px;
    }

    /* ===== TABLE ===== */
    .dash-table { width: 100%; border-collapse: collapse; }

    .dash-table th {
        font-size: 10.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #9ca3af;
        padding: 10px 20px;
        text-align: left;
        background: #fafafa;
        border-bottom: 1px solid #f1f3f5;
    }

    .dash-table td {
        padding: 12px 20px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #f7f8f9;
        vertical-align: middle;
    }

    .dash-table tr:last-child td { border-bottom: none; }
    .dash-table tr:hover td { background: #fafbff; }

    .badge-status {
        display: inline-block;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
    }

    .badge-status.lunas { background: #f0fdf4; color: #16a34a; }

    .trans-code {
        font-size: 12px;
        font-weight: 700;
        color: #1a56db;
        font-family: 'Courier New', monospace;
    }

    .trans-amount { font-weight: 700; color: #111827; }

    /* ===== RIGHT COL ===== */
    .dash-right-col { display: flex; flex-direction: column; gap: 20px; }

    .quick-stat-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 13px 20px;
        border-bottom: 1px solid #f7f8f9;
    }

    .quick-stat-item:last-child { border-bottom: none; }

    .qs-icon {
        width: 36px;
        height: 36px;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
    }

    .qs-label { flex: 1; font-size: 12.5px; color: #6b7280; font-weight: 500; }
    .qs-value { font-size: 14px; font-weight: 700; color: #111827; }

    /* ===== MONITORING CARD ===== */
    .monitoring-card {
        background: #ffffff;
        border-radius: 14px;
        border: 1.5px solid #86efac;
        box-shadow: 0 2px 16px rgba(22, 163, 74, 0.08);
        overflow: hidden;
    }

    .monitoring-header {
        padding: 14px 18px;
        background: linear-gradient(135deg, #f0fdf4, #dcfce7);
        border-bottom: 1px solid #bbf7d0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .monitoring-header-icon {
        width: 34px;
        height: 34px;
        background: #16a34a;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        color: #fff;
        flex-shrink: 0;
    }

    .monitoring-header-text strong {
        font-size: 13px;
        font-weight: 700;
        color: #14532d;
        display: block;
    }

    .monitoring-header-text span {
        font-size: 11.5px;
        color: #16a34a;
        font-weight: 500;
    }

    .monitoring-header-count {
        margin-left: auto;
        background: #16a34a;
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 20px;
        white-space: nowrap;
    }

    .bm-item {
        display: flex;
        align-items: flex-start;
        gap: 11px;
        padding: 12px 18px;
        border-bottom: 1px solid #f0fdf4;
        transition: background 0.15s;
    }

    .bm-item:last-child { border-bottom: none; }
    .bm-item:hover { background: #f8fffb; }

    .bm-item-icon {
        width: 32px;
        height: 32px;
        background: #f0fdf4;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        color: #16a34a;
        flex-shrink: 0;
        margin-top: 1px;
    }

    .bm-produk-name {
        font-size: 12.5px;
        font-weight: 700;
        color: #111827;
        display: block;
    }

    .bm-produk-meta {
        font-size: 11px;
        color: #9ca3af;
        display: block;
        margin-top: 2px;
    }

    .bm-produk-supplier {
        font-size: 11px;
        color: #16a34a;
        font-weight: 600;
        display: block;
        margin-top: 1px;
    }

    .bm-qty-badge {
        margin-left: auto;
        text-align: right;
        flex-shrink: 0;
    }

    .bm-qty-val {
        font-size: 15px;
        font-weight: 800;
        color: #16a34a;
        display: block;
        line-height: 1;
    }

    .bm-qty-unit {
        font-size: 10.5px;
        color: #9ca3af;
        font-weight: 500;
    }

    .bm-time-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #16a34a;
        font-size: 10px;
        font-weight: 600;
        padding: 2px 7px;
        border-radius: 10px;
        margin-top: 4px;
    }

    /* Transaksi row (in purchases list) */
    .bm-trx-row {
        padding: 11px 18px;
        border-bottom: 1px solid #f0fdf4;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: background 0.15s;
    }

    .bm-trx-row:hover { background: #f8fffb; }
    .bm-trx-row:last-child { border-bottom: none; }

    .bm-faktur {
        font-family: 'Courier New', monospace;
        font-size: 11.5px;
        font-weight: 700;
        color: #16a34a;
    }

    .bm-trx-supplier {
        font-size: 12px;
        color: #374151;
        font-weight: 500;
        flex: 1;
    }

    .bm-trx-total {
        font-size: 12.5px;
        font-weight: 700;
        color: #111827;
        text-align: right;
        white-space: nowrap;
    }

    .bm-trx-time {
        font-size: 11px;
        color: #9ca3af;
        white-space: nowrap;
    }

    .bm-empty {
        padding: 28px 20px;
        text-align: center;
        color: #9ca3af;
        font-size: 12.5px;
    }

    .bm-empty i {
        font-size: 28px;
        color: #d1d5db;
        display: block;
        margin-bottom: 8px;
    }

    .monitoring-footer {
        padding: 10px 18px;
        border-top: 1px solid #bbf7d0;
        background: #f0fdf4;
    }

    /* ===== STOK MENIPIS ===== */
    .low-stock-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 20px;
        border-bottom: 1px solid #f7f8f9;
    }

    .low-stock-item:last-child { border-bottom: none; }
    .low-stock-bar-wrap { flex: 1; }
    .low-stock-name { font-size: 12.5px; font-weight: 600; color: #374151; display: block; }
    .low-stock-sub  { font-size: 11px; color: #9ca3af; display: block; margin-top: 2px; }
    .low-stock-count { font-size: 13px; font-weight: 700; color: #dc2626; white-space: nowrap; }

    .progress-mini {
        width: 60px; height: 5px;
        background: #f3f4f6;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 5px;
    }

    .progress-mini-fill { height: 100%; border-radius: 10px; background: #f97316; }
    .progress-mini-fill.critical { background: #dc2626; }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1100px) {
        .dash-stats-grid { grid-template-columns: repeat(2, 1fr); }
        .dash-main-section { grid-template-columns: 1fr; }
    }

    @media (max-width: 600px) {
        .dash-stats-grid { grid-template-columns: 1fr; }
        .dash-cards-section, .dash-main-section { padding: 16px 14px 0; }
        .dash-page-title { padding: 18px 14px 0; flex-direction: column; align-items: flex-start; gap: 10px; }
        .notif-bar, .notif-bar-empty { margin: 16px 14px 0; }
        .notif-bar-tags { display: none; }
    }

    @keyframes fadeSlideUp {
        from { opacity: 0; transform: translateY(14px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>

    <!-- ===== PAGE TITLE ===== -->
    <div class="dash-page-title">
        <div>
            <h1>Dashboard Admin</h1>
            <p>PT Pordjo Steelindo Perkasa — Pusat kendali stok, transaksi, dan laporan</p>
        </div>
        <div class="dash-date-pill">
            <i class="far fa-calendar-alt"></i>
            <?= date('d F Y') ?>
        </div>
    </div>

    <!-- ===== NOTIFIKASI REAL-TIME BARANG MASUK ===== -->
    <?php
        $bm_hari_ini    = $barang_masuk_hari_ini ?? [];
        $bm_items_today = $barang_masuk_items    ?? [];
        $bm_count       = count($bm_hari_ini);
        $bm_qty_total   = $barang_masuk_qty_total ?? 0;
        // Kumpulkan supplier unik hari ini
        $suppliers_unik = array_unique(array_column($bm_hari_ini, 'nama_supplier'));
    ?>

    <?php if ($bm_count > 0): ?>
    <a href="<?= site_url('admin/barang_masuk') ?>" class="notif-bar">
        <div class="notif-pulse"><i class="fas fa-arrow-circle-down"></i></div>
        <div class="notif-bar-text">
            <strong>
                <?= $bm_count ?> pengiriman barang masuk hari ini &mdash; <?= $bm_qty_total ?> unit total
            </strong>
            <span>
                <i class="fas fa-circle" style="font-size:6px;vertical-align:middle;margin-right:4px;"></i>
                Terakhir pukul <?= date('H:i', strtotime($bm_hari_ini[0]['created_at'])) ?> &nbsp;&bull;&nbsp;
                Klik untuk lihat detail lengkap
            </span>
        </div>
        <div class="notif-bar-tags">
            <?php foreach (array_slice($suppliers_unik, 0, 3) as $sup): ?>
            <span class="notif-tag"><i class="fas fa-truck" style="font-size:9px;"></i><?= htmlspecialchars($sup) ?></span>
            <?php endforeach; ?>
            <?php if (count($suppliers_unik) > 3): ?>
            <span class="notif-tag">+<?= count($suppliers_unik)-3 ?> lainnya</span>
            <?php endif; ?>
        </div>
        <i class="fas fa-chevron-right notif-bar-arrow"></i>
    </a>
    <?php else: ?>
    <div class="notif-bar-empty">
        <i class="fas fa-inbox" style="font-size:18px;"></i>
        Belum terdapat data barang masuk hari ini.
    </div>
    <?php endif; ?>

    <!-- ===== STAT CARDS ===== -->
    <div class="dash-cards-section">
        <div class="dash-stats-grid">

            <div class="stat-card">
                <div class="stat-card-top">
                    <div class="stat-icon blue"><i class="fas fa-boxes"></i></div>
                    <span class="stat-badge neutral">Produk</span>
                </div>
                <div>
                    <div class="stat-value"><?= $total_produk ?? '0' ?></div>
                    <div class="stat-label">Total Jenis Produk</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-top">
                    <div class="stat-icon green"><i class="fas fa-shopping-cart"></i></div>
                    <span class="stat-badge up">↑ Hari ini</span>
                </div>
                <div>
                    <div class="stat-value"><?= $total_penjualan_hari ?? '0' ?></div>
                    <div class="stat-label">Transaksi Penjualan Hari Ini</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-top">
                    <div class="stat-icon amber"><i class="fas fa-truck"></i></div>
                    <span class="stat-badge neutral">Supplier</span>
                </div>
                <div>
                    <div class="stat-value"><?= $total_supplier ?? '0' ?></div>
                    <div class="stat-label">Total Supplier Aktif</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-card-top">
                    <div class="stat-icon red"><i class="fas fa-exclamation-triangle"></i></div>
                    <span class="stat-badge down">Perhatian</span>
                </div>
                <div>
                    <div class="stat-value"><?= $stok_menipis ?? '0' ?></div>
                    <div class="stat-label">Produk Stok Menipis</div>
                </div>
            </div>

        </div>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="dash-main-section">

        <div style="display:flex; flex-direction:column; gap:20px;">

            <!-- Chart -->
            <div class="dash-card">
                <div class="dash-card-header">
                    <div>
                        <h3>Grafik Penjualan</h3>
                        <p>7 hari terakhir</p>
                    </div>
                    <a href="<?= site_url('admin/laporan') ?>" class="btn-card-action">Lihat Laporan</a>
                </div>
                <div class="chart-container">
                    <div class="chart-bars">
                        <?php
                            $chart_days = $chart_labels ?? ['Sen','Sel','Rab','Kam','Jum','Sab','Min'];
                            $chart_vals = $chart_values ?? [0, 0, 0, 0, 0, 0, 0];
                            $max_val    = max($chart_vals) ?: 1;
                            foreach ($chart_vals as $i => $val):
                                $height  = round(($val / $max_val) * 100);
                                $isToday = ($i === count($chart_vals) - 1);
                        ?>
                        <div class="chart-bar-wrap">
                            <div class="chart-bar <?= $isToday ? 'active' : '' ?>" style="height:<?= $height ?>%;">
                                <div class="chart-bar-tooltip"><?= $val ?> transaksi</div>
                            </div>
                            <div class="chart-bar-label"><?= $chart_days[$i] ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- MONITORING BARANG MASUK HARI INI — main area -->
            <div class="monitoring-card">
                <div class="monitoring-header">
                    <div class="monitoring-header-icon"><i class="fas fa-arrow-circle-down"></i></div>
                    <div class="monitoring-header-text">
                        <strong>Monitoring Stok Masuk Hari Ini</strong>
                        <span><?= date('d F Y') ?> — Update real-time</span>
                    </div>
                    <?php if ($bm_count > 0): ?>
                    <div class="monitoring-header-count"><?= $bm_qty_total ?> unit masuk</div>
                    <?php endif; ?>
                    <a href="<?= site_url('admin/barang_masuk') ?>" class="btn-card-action" style="margin-left:<?= $bm_count > 0 ? '8px' : 'auto' ?>;">Semua →</a>
                </div>

                <?php if (!empty($bm_items_today)): ?>
                    <!-- Toggle view: Per Item / Per Transaksi -->
                    <div style="padding:10px 18px; border-bottom:1px solid #f0fdf4; display:flex; align-items:center; gap:8px;">
                        <button onclick="toggleBMView('items')" id="btnItems" class="filter-bm-btn active-bm-btn" style="font-size:11.5px;font-weight:600;padding:5px 12px;border-radius:20px;border:1.5px solid #86efac;background:#16a34a;color:#fff;cursor:pointer;font-family:'DM Sans',sans-serif;transition:all 0.15s;">
                            <i class="fas fa-cubes"></i> Per Produk
                        </button>
                        <button onclick="toggleBMView('trx')" id="btnTrx" style="font-size:11.5px;font-weight:600;padding:5px 12px;border-radius:20px;border:1.5px solid #e5e7eb;background:#fff;color:#6b7280;cursor:pointer;font-family:'DM Sans',sans-serif;transition:all 0.15s;">
                            <i class="fas fa-receipt"></i> Per Transaksi
                        </button>
                        <span style="margin-left:auto;font-size:11.5px;color:#9ca3af;">
                            <?= count($bm_items_today) ?> jenis produk · <?= $bm_count ?> faktur
                        </span>
                    </div>

                    <!-- VIEW: PER ITEM / PRODUK -->
                    <div id="viewItems">
                        <?php foreach (array_slice($bm_items_today, 0, 8) as $item): ?>
                        <div class="bm-item">
                            <div class="bm-item-icon"><i class="fas fa-cube"></i></div>
                            <div style="flex:1;min-width:0;">
                                <span class="bm-produk-name"><?= htmlspecialchars($item['nama_produk']) ?></span>
                                <span class="bm-produk-meta"><?= htmlspecialchars($item['nama_kategori']) ?></span>
                                <span class="bm-produk-supplier"><i class="fas fa-truck" style="font-size:9px;margin-right:3px;"></i><?= htmlspecialchars($item['nama_supplier']) ?></span>
                                <span class="bm-time-badge">
                                    <i class="fas fa-clock" style="font-size:8px;"></i>
                                    <?= date('H:i', strtotime($item['created_at'])) ?>
                                    &bull; <?= htmlspecialchars($item['no_faktur']) ?>
                                </span>
                            </div>
                            <div class="bm-qty-badge">
                                <span class="bm-qty-val">+<?= number_format($item['qty'], 0, ',', '.') ?></span>
                                <span class="bm-qty-unit"><?= htmlspecialchars($item['satuan']) ?></span>
                            </div>
                        </div>
                        <?php endforeach; ?>

                        <?php if (count($bm_items_today) > 8): ?>
                        <div style="padding:10px 18px;text-align:center;">
                            <a href="<?= site_url('admin/barang_masuk') ?>" style="font-size:12px;color:#16a34a;font-weight:600;text-decoration:none;">
                                +<?= count($bm_items_today) - 8 ?> produk lainnya — Lihat Semua <i class="fas fa-arrow-right" style="font-size:10px;"></i>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- VIEW: PER TRANSAKSI/FAKTUR -->
                    <div id="viewTrx" style="display:none;">
                        <?php foreach ($bm_hari_ini as $trx): ?>
                        <a href="<?= site_url('admin/barang_masuk/detail/'.$trx['id_purchase']) ?>" class="bm-trx-row" style="text-decoration:none;display:flex;">
                            <div style="width:32px;height:32px;background:#f0fdf4;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="fas fa-file-alt" style="font-size:12px;color:#16a34a;"></i>
                            </div>
                            <div style="margin-left:10px;flex:1;min-width:0;">
                                <span class="bm-faktur"><?= htmlspecialchars($trx['no_faktur']) ?></span>
                                <span class="bm-trx-supplier" style="display:block;font-size:11px;margin-top:2px;"><?= htmlspecialchars($trx['nama_supplier']) ?> &bull; by <?= htmlspecialchars($trx['nama_input']) ?></span>
                            </div>
                            <div style="text-align:right;flex-shrink:0;">
                                <span class="bm-trx-total">Rp <?= number_format($trx['total_bayar'],0,',','.') ?></span>
                                <span class="bm-trx-time" style="display:block;margin-top:2px;"><?= date('H:i', strtotime($trx['created_at'])) ?></span>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>

                    <div class="monitoring-footer">
                        <div style="display:flex;align-items:center;justify-content:space-between;">
                            <span style="font-size:12px;color:#16a34a;font-weight:600;">
                                <i class="fas fa-check-circle" style="margin-right:5px;"></i>
                                <?= $bm_count ?> faktur · <?= $bm_qty_total ?> unit · <?= count(array_unique(array_column($bm_hari_ini, 'nama_supplier'))) ?> supplier
                            </span>
                            <a href="<?= site_url('admin/barang_masuk') ?>" style="font-size:12px;color:#16a34a;font-weight:600;text-decoration:none;">
                                Lihat Semua <i class="fas fa-chevron-right" style="font-size:10px;"></i>
                            </a>
                        </div>
                    </div>

                <?php else: ?>
                    <div class="bm-empty">
                        <i class="fas fa-inbox"></i>
                        Belum terdapat data barang masuk hari ini.
                    </div>
                <?php endif; ?>
            </div>

            <!-- Tabel Transaksi Terbaru -->
            <div class="dash-card">
                <div class="dash-card-header">
                    <div>
                        <h3>Transaksi Penjualan Terbaru</h3>
                        <p>10 transaksi terakhir</p>
                    </div>
                    <a href="<?= site_url('admin/penjualan') ?>" class="btn-card-action">Semua Transaksi</a>
                </div>
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Tanggal</th>
                            <th>Kasir</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($transaksi_terbaru)): ?>
                            <?php foreach ($transaksi_terbaru as $t): ?>
                            <tr>
                                <td><span class="trans-code"><?= htmlspecialchars($t['kode_transaksi']) ?></span></td>
                                <td><?= date('d/m/Y H:i', strtotime($t['tgl_jual'])) ?></td>
                                <td><?= htmlspecialchars($t['nama_kasir'] ?? '-') ?></td>
                                <td class="trans-amount">Rp <?= number_format($t['total_harga'], 0, ',', '.') ?></td>
                                <td><span class="badge-status lunas">Lunas</span></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="5" style="text-align:center;padding:32px;color:#9ca3af;font-size:13px;">Belum terdapat data transaksi penjualan.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- RIGHT COLUMN -->
        <div class="dash-right-col">

            <!-- Ringkasan Hari Ini -->
            <div class="dash-card">
                <div class="dash-card-header">
                    <div>
                        <h3>Ringkasan Hari Ini</h3>
                        <p><?= date('d F Y') ?></p>
                    </div>
                </div>
                <div class="quick-stat-item">
                    <div class="qs-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-receipt"></i></div>
                    <span class="qs-label">Total Transaksi</span>
                    <span class="qs-value"><?= $total_trx_hari ?? '0' ?></span>
                </div>
                <div class="quick-stat-item">
                    <div class="qs-icon" style="background:#f0fdf4; color:#16a34a;"><i class="fas fa-money-bill-wave"></i></div>
                    <span class="qs-label">Pendapatan</span>
                    <span class="qs-value" style="font-size:12px;">Rp <?= number_format($pendapatan_hari ?? 0, 0, ',', '.') ?></span>
                </div>
                <div class="quick-stat-item" style="position:relative;">
                    <div class="qs-icon" style="background:#f0fdf4; color:#16a34a;"><i class="fas fa-arrow-circle-down"></i></div>
                    <span class="qs-label">Barang Masuk</span>
                    <span class="qs-value" style="color:<?= $bm_count > 0 ? '#16a34a' : '#9ca3af' ?>;">
                        <?= $bm_count ?> faktur
                        <?php if ($bm_count > 0): ?>
                        <span style="display:block;font-size:10.5px;color:#16a34a;font-weight:500;"><?= $bm_qty_total ?> unit</span>
                        <?php endif; ?>
                    </span>
                    <?php if ($bm_count > 0): ?>
                    <span style="position:absolute;top:12px;right:18px;width:8px;height:8px;background:#16a34a;border-radius:50%;box-shadow:0 0 0 3px rgba(22,163,74,0.2);animation:pulseRing 2s ease infinite;"></span>
                    <?php endif; ?>
                </div>
                <div class="quick-stat-item">
                    <div class="qs-icon" style="background:#fdf4ff; color:#9333ea;"><i class="fas fa-users"></i></div>
                    <span class="qs-label">Total Kasir</span>
                    <span class="qs-value"><?= $kasir_aktif ?? '0' ?></span>
                </div>
            </div>

            <!-- Stok Menipis -->
            <div class="dash-card">
                <div class="dash-card-header">
                    <div>
                        <h3>Stok Menipis</h3>
                        <p>Perlu segera kulakan</p>
                    </div>
                    <a href="<?= site_url('admin/produk') ?>" class="btn-card-action">Kelola</a>
                </div>
                <?php if (!empty($produk_menipis)): ?>
                    <?php foreach (array_slice($produk_menipis, 0, 5) as $p): ?>
                    <div class="low-stock-item">
                        <div class="qs-icon" style="background:#fef2f2; color:#dc2626; flex-shrink:0;"><i class="fas fa-cube"></i></div>
                        <div class="low-stock-bar-wrap">
                            <span class="low-stock-name"><?= htmlspecialchars($p['nama_produk']) ?></span>
                            <span class="low-stock-sub"><?= htmlspecialchars($p['nama_kategori']) ?></span>
                            <div class="progress-mini">
                                <div class="progress-mini-fill <?= $p['stok'] <= 3 ? 'critical' : '' ?>" style="width:<?= min(($p['stok'] / 20) * 100, 100) ?>%"></div>
                            </div>
                        </div>
                        <span class="low-stock-count"><?= $p['stok'] ?> <?= htmlspecialchars($p['satuan'] ?? 'pcs') ?></span>
                    </div>
                    <?php endforeach; ?>
                    <?php if (count($produk_menipis) > 5): ?>
                    <div style="padding:10px 20px 14px;">
                        <a href="<?= site_url('admin/produk') ?>"
                           style="display:flex; align-items:center; justify-content:center; gap:6px; padding:8px 12px; background:#fef2f2; border:1px dashed #fca5a5; border-radius:9px; color:#dc2626; font-size:12px; font-weight:600; text-decoration:none;"
                           onmouseover="this.style.background='#fee2e2'" onmouseout="this.style.background='#fef2f2'">
                            <i class="fas fa-exclamation-circle"></i>
                            +<?= count($produk_menipis) - 5 ?> produk menipis lainnya
                        </a>
                    </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="low-stock-item">
                        <div style="padding:24px;text-align:center;color:#9ca3af;font-size:12.5px;width:100%;">
                            <i class="fas fa-check-circle" style="font-size:24px;color:#16a34a;display:block;margin-bottom:6px;"></i>
                            Semua stok dalam kondisi aman
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Aksi Cepat -->
            <div class="dash-card">
                <div class="dash-card-header">
                    <h3>Aksi Cepat</h3>
                </div>
                <div style="padding:16px; display:grid; grid-template-columns:repeat(2,1fr); gap:10px;">
                    <a href="<?= site_url('admin/penjualan/create') ?>"
                       style="display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;padding:14px 10px;background:#eff6ff;border-radius:10px;text-decoration:none;transition:background 0.15s;"
                       onmouseover="this.style.background='#dbeafe'" onmouseout="this.style.background='#eff6ff'">
                        <i class="fas fa-plus-circle" style="font-size:20px;color:#1a56db;"></i>
                        <span style="font-size:11.5px;font-weight:600;color:#1a56db;text-align:center;">Transaksi Baru</span>
                    </a>
                    <a href="<?= site_url('admin/barang_masuk') ?>"
                       style="display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;padding:14px 10px;background:#f0fdf4;border-radius:10px;text-decoration:none;transition:background 0.15s;"
                       onmouseover="this.style.background='#dcfce7'" onmouseout="this.style.background='#f0fdf4'">
                        <i class="fas fa-history" style="font-size:20px;color:#16a34a;"></i>
                        <span style="font-size:11.5px;font-weight:600;color:#16a34a;text-align:center;">Riwayat Masuk</span>
                    </a>
                    <a href="<?= site_url('admin/produk') ?>"
                       style="display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;padding:14px 10px;background:#fffbeb;border-radius:10px;text-decoration:none;transition:background 0.15s;"
                       onmouseover="this.style.background='#fef9c3'" onmouseout="this.style.background='#fffbeb'">
                        <i class="fas fa-box" style="font-size:20px;color:#d97706;"></i>
                        <span style="font-size:11.5px;font-weight:600;color:#d97706;text-align:center;">Kelola Stok</span>
                    </a>
                    <a href="<?= site_url('admin/laporan') ?>"
                       style="display:flex;flex-direction:column;align-items:center;justify-content:center;gap:8px;padding:14px 10px;background:#fdf4ff;border-radius:10px;text-decoration:none;transition:background 0.15s;"
                       onmouseover="this.style.background='#f3e8ff'" onmouseout="this.style.background='#fdf4ff'">
                        <i class="fas fa-file-invoice-dollar" style="font-size:20px;color:#9333ea;"></i>
                        <span style="font-size:11.5px;font-weight:600;color:#9333ea;text-align:center;">Laporan</span>
                    </a>
                </div>
            </div>

        </div>
    </div>

<script>
    function toggleBMView(view) {
        var items = document.getElementById('viewItems');
        var trx   = document.getElementById('viewTrx');
        var btnI  = document.getElementById('btnItems');
        var btnT  = document.getElementById('btnTrx');

        if (view === 'items') {
            items.style.display = '';
            trx.style.display   = 'none';
            btnI.style.background    = '#16a34a';
            btnI.style.color         = '#fff';
            btnI.style.borderColor   = '#86efac';
            btnT.style.background    = '#fff';
            btnT.style.color         = '#6b7280';
            btnT.style.borderColor   = '#e5e7eb';
        } else {
            items.style.display = 'none';
            trx.style.display   = '';
            btnT.style.background    = '#16a34a';
            btnT.style.color         = '#fff';
            btnT.style.borderColor   = '#86efac';
            btnI.style.background    = '#fff';
            btnI.style.color         = '#6b7280';
            btnI.style.borderColor   = '#e5e7eb';
        }
    }
</script>

</div>