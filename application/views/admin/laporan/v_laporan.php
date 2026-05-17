<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path):not(canvas) { font-family: 'DM Sans','Segoe UI',sans-serif; }

    .page-title-row { padding: 24px 28px 0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
    .page-title-row h1 { font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 3px; }
    .page-title-row p  { font-size: 12.5px; color: #9ca3af; margin: 0; }

    /* FILTER BAR */
    .filter-bar { margin: 16px 24px 0; background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); padding: 16px 20px; display: flex; align-items: flex-end; gap: 14px; flex-wrap: wrap; }
    .filter-group { display: flex; flex-direction: column; gap: 5px; }
    .filter-label { font-size: 11px; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.3px; }
    .filter-input { padding: 9px 12px; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 13px; font-family: 'DM Sans', sans-serif; color: #111827; background: #fafafa; outline: none; transition: border-color 0.15s; }
    .filter-input:focus { border-color: #1a56db; background: #fff; }
    .preset-chips { display: flex; gap: 6px; flex-wrap: wrap; }
    .preset-chip { padding: 7px 14px; border: 1.5px solid #e5e7eb; border-radius: 20px; font-size: 12px; font-weight: 600; color: #6b7280; background: #fff; cursor: pointer; font-family: 'DM Sans', sans-serif; text-decoration: none !important; transition: all 0.15s; }
    .preset-chip:hover { border-color: #93c5fd; color: #1a56db; background: #eff6ff; }
    .preset-chip.active { background: #1a56db; border-color: #1a56db; color: #fff; box-shadow: 0 2px 8px rgba(26,86,219,0.3); }
    .btn-filter { display: inline-flex; align-items: center; gap: 6px; padding: 9px 18px; background: linear-gradient(135deg, #1a56db, #0d3fa6); color: #fff; border: none; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; box-shadow: 0 3px 10px rgba(26,86,219,0.3); transition: opacity 0.15s; }
    .btn-filter:hover { opacity: 0.9; }
    .btn-cetak-lap { display: inline-flex; align-items: center; gap: 6px; padding: 9px 16px; background: #ecfdf5; color: #059669; border: 1.5px solid #a7f3d0; border-radius: 8px; font-size: 12.5px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; text-decoration: none !important; transition: background 0.15s; }
    .btn-cetak-lap:hover { background: #d1fae5; color: #059669; }

    /* STAT CARDS */
    .lap-stats { padding: 16px 24px 0; display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
    .lap-stat-card { background: #fff; border-radius: 12px; border: 1px solid #e8ecf0; padding: 16px 18px; display: flex; align-items: center; gap: 14px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
    .lap-stat-icon { width: 42px; height: 42px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 17px; flex-shrink: 0; }
    .lap-stat-value { font-size: 22px; font-weight: 800; color: #111827; line-height: 1; }
    .lap-stat-label { font-size: 11.5px; color: #9ca3af; font-weight: 500; margin-top: 3px; }

    /* CARDS */
    .main-card { margin: 16px 24px 0; background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); overflow: hidden; }
    .main-card:last-child { margin-bottom: 28px; }
    .card-header-custom { padding: 16px 20px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; gap: 12px; }
    .card-header-custom h3 { font-size: 14px; font-weight: 700; color: #111827; margin: 0; display: flex; align-items: center; gap: 8px; }
    .card-header-custom .header-icon { width: 30px; height: 30px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 12px; }
    .card-body-custom { padding: 20px; }

    /* CHART */
    .chart-wrap { position: relative; height: 280px; }

    /* 2-COL GRID */
    .grid-2col { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin: 16px 24px 0; }

    /* TABLE */
    .card-toolbar { padding: 14px 20px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; }
    .count-badge { display: inline-flex; align-items: center; gap: 5px; background: #eff6ff; color: #1a56db; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 20px; }
    .search-box { display: flex; align-items: center; gap: 8px; background: #f8fafc; border: 1.5px solid #e8ecf0; border-radius: 8px; padding: 7px 12px; transition: border-color 0.15s; }
    .search-box:focus-within { border-color: #1a56db; background: #fff; }
    .search-box i { color: #9ca3af; font-size: 12px; }
    .search-box input { border: none; background: transparent; font-size: 13px; color: #374151; outline: none; width: 200px; font-family: 'DM Sans', sans-serif; }
    .search-box input::placeholder { color: #d1d5db; }

    .data-table { width: 100%; border-collapse: collapse; }
    .data-table th { font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #9ca3af; padding: 11px 16px; text-align: left; background: #fafafa; border-bottom: 1px solid #f1f3f5; white-space: nowrap; }
    .data-table td { padding: 12px 16px; font-size: 13px; color: #374151; border-bottom: 1px solid #f7f8f9; vertical-align: middle; }
    .data-table tr:last-child td { border-bottom: none; }
    .data-table tr:hover td { background: #f8fbff; }
    .trx-code { font-size: 12px; font-weight: 700; color: #1a56db; font-family: 'Courier New', monospace; }
    .total-text { font-weight: 700; color: #111827; font-size: 13px; }

    /* TOP PRODUK */
    .rank-badge { width: 26px; height: 26px; border-radius: 7px; display: inline-flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700; }
    .rank-1 { background: linear-gradient(135deg, #f59e0b, #d97706); color: #fff; }
    .rank-2 { background: linear-gradient(135deg, #9ca3af, #6b7280); color: #fff; }
    .rank-3 { background: linear-gradient(135deg, #d97706, #b45309); color: #fff; }
    .rank-other { background: #f3f4f6; color: #6b7280; }
    .progress-bar-wrap { background: #f3f4f6; border-radius: 4px; height: 6px; width: 100%; overflow: hidden; }
    .progress-bar-fill { height: 100%; border-radius: 4px; background: linear-gradient(90deg, #1a56db, #3b82f6); transition: width 0.5s ease; }

    /* KASIR TABLE */
    .kasir-avatar { width: 32px; height: 32px; border-radius: 8px; background: linear-gradient(135deg, #1a56db, #0d3fa6); display: inline-flex; align-items: center; justify-content: center; color: #fff; font-size: 12px; font-weight: 700; }

    /* PAGINATION */
    .pagination-wrap { padding: 14px 20px; border-top: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; }
    .pagination-info { font-size: 12.5px; color: #9ca3af; font-weight: 500; }
    .pagination-info strong { color: #374151; }
    .pagination-controls { display: flex; align-items: center; gap: 4px; }
    .page-btn { width: 32px; height: 32px; border: 1.5px solid #e5e7eb; border-radius: 8px; background: #fff; color: #374151; font-size: 12.5px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; transition: all 0.15s; font-family: 'DM Sans', sans-serif; }
    .page-btn:hover:not(:disabled) { background: #eff6ff; border-color: #93c5fd; color: #1a56db; }
    .page-btn.active { background: #1a56db; border-color: #1a56db; color: #fff; box-shadow: 0 2px 8px rgba(26,86,219,0.3); }
    .page-btn:disabled { opacity: 0.35; cursor: not-allowed; }
    .page-btn.nav-btn { width: auto; padding: 0 10px; font-size: 12px; }

    .no-data-msg { text-align: center; padding: 40px 20px; color: #9ca3af; font-size: 13px; }
    .no-data-msg i { font-size: 32px; color: #d1d5db; display: block; margin-bottom: 10px; }

    @media (max-width: 1024px) {
        .lap-stats { grid-template-columns: repeat(2, 1fr); }
        .grid-2col { grid-template-columns: 1fr; }
    }
    @media (max-width: 768px) {
        .lap-stats { grid-template-columns: 1fr; padding: 12px 14px 0; }
        .filter-bar { margin: 12px 14px 0; flex-direction: column; align-items: stretch; }
        .page-title-row, .main-card, .grid-2col { margin-left: 14px; margin-right: 14px; }
    }
</style>

    <?php
        $tgl_awal_fmt  = date('d M Y', strtotime($tgl_awal));
        $tgl_akhir_fmt = date('d M Y', strtotime($tgl_akhir));
        $is_same_day   = ($tgl_awal === $tgl_akhir);
        $periode_label = $is_same_day ? $tgl_awal_fmt : $tgl_awal_fmt . ' — ' . $tgl_akhir_fmt;
    ?>

    <!-- PAGE TITLE -->
    <div class="page-title-row">
        <div>
            <h1><i class="fas fa-file-invoice-dollar" style="color:#1a56db; margin-right:6px;"></i>Laporan Penjualan</h1>
            <p>Periode: <?= $periode_label ?></p>
        </div>
        <div style="display:flex; gap:8px;">
            <a href="<?= site_url('admin/laporan/cetak?tgl_awal=' . $tgl_awal . '&tgl_akhir=' . $tgl_akhir) ?>" class="btn-cetak-lap" target="_blank">
                <i class="fas fa-print"></i> Cetak Laporan
            </a>
        </div>
    </div>

    <!-- FILTER BAR -->
    <div class="filter-bar">
        <div class="filter-group" style="flex:1;">
            <span class="filter-label">Filter Cepat</span>
            <div class="preset-chips">
                <a href="<?= site_url('admin/laporan?preset=hari_ini') ?>" class="preset-chip <?= ($preset === 'hari_ini') ? 'active' : '' ?>">Hari Ini</a>
                <a href="<?= site_url('admin/laporan?preset=minggu_ini') ?>" class="preset-chip <?= ($preset === 'minggu_ini') ? 'active' : '' ?>">Minggu Ini</a>
                <a href="<?= site_url('admin/laporan?preset=bulan_ini') ?>" class="preset-chip <?= ($preset === 'bulan_ini') ? 'active' : '' ?>">Bulan Ini</a>
                <a href="<?= site_url('admin/laporan?preset=bulan_lalu') ?>" class="preset-chip <?= ($preset === 'bulan_lalu') ? 'active' : '' ?>">Bulan Lalu</a>
                <a href="<?= site_url('admin/laporan?preset=tahun_ini') ?>" class="preset-chip <?= ($preset === 'tahun_ini') ? 'active' : '' ?>">Tahun Ini</a>
            </div>
        </div>
        <form method="get" action="<?= site_url('admin/laporan') ?>" style="display:flex; align-items:flex-end; gap:10px; flex-wrap:wrap;">
            <input type="hidden" name="preset" value="custom">
            <div class="filter-group">
                <span class="filter-label">Dari Tanggal</span>
                <input type="date" name="tgl_awal" class="filter-input" value="<?= $tgl_awal ?>">
            </div>
            <div class="filter-group">
                <span class="filter-label">Sampai Tanggal</span>
                <input type="date" name="tgl_akhir" class="filter-input" value="<?= $tgl_akhir ?>">
            </div>
            <button type="submit" class="btn-filter"><i class="fas fa-filter"></i> Terapkan</button>
        </form>
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
                <div class="lap-stat-label">Rata-rata / Transaksi</div>
            </div>
        </div>
        <div class="lap-stat-card">
            <div class="lap-stat-icon" style="background:#fdf4ff; color:#9333ea;"><i class="fas fa-users"></i></div>
            <div>
                <div class="lap-stat-value"><?= count($per_kasir) ?></div>
                <div class="lap-stat-label">Kasir Aktif</div>
            </div>
        </div>
    </div>

    <!-- CHART OMZET PER HARI -->
    <div class="main-card" style="margin-top:16px;">
        <div class="card-header-custom">
            <h3>
                <span class="header-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-chart-line"></i></span>
                Grafik Omzet Harian
            </h3>
            <span style="font-size:12px; color:#9ca3af;"><?= $periode_label ?></span>
        </div>
        <div class="card-body-custom">
            <?php if (!empty($chart_labels)): ?>
            <div class="chart-wrap">
                <canvas id="omzetChart"></canvas>
            </div>
            <?php else: ?>
            <div class="no-data-msg"><i class="fas fa-chart-bar"></i>Belum terdapat data untuk grafik.</div>
            <?php endif; ?>
        </div>
    </div>

    <!-- TOP PRODUK & PER KASIR (2 col) -->
    <div class="grid-2col">
        <!-- TOP PRODUK TERLARIS -->
        <div class="main-card" style="margin:0;">
            <div class="card-header-custom">
                <h3>
                    <span class="header-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-trophy"></i></span>
                    Produk Terlaris
                </h3>
                <span class="count-badge"><i class="fas fa-box" style="font-size:10px;"></i>Top <?= count($top_produk) ?></span>
            </div>
            <?php if (!empty($top_produk)): ?>
            <?php $max_qty = (int)($top_produk[0]['total_qty'] ?? 1); ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Produk</th>
                        <th>Terjual</th>
                        <th>Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($top_produk as $i => $tp): ?>
                    <tr>
                        <td>
                            <?php
                                $rank_class = 'rank-other';
                                if ($i === 0) $rank_class = 'rank-1';
                                elseif ($i === 1) $rank_class = 'rank-2';
                                elseif ($i === 2) $rank_class = 'rank-3';
                            ?>
                            <span class="rank-badge <?= $rank_class ?>"><?= $i + 1 ?></span>
                        </td>
                        <td>
                            <strong style="color:#111827; font-size:12.5px;"><?= htmlspecialchars($tp['nama_produk']) ?></strong>
                            <span style="display:block; font-size:11px; color:#9ca3af;"><?= htmlspecialchars($tp['nama_kategori'] ?? '') ?></span>
                            <div class="progress-bar-wrap" style="margin-top:4px;">
                                <div class="progress-bar-fill" style="width:<?= round(($tp['total_qty'] / $max_qty) * 100) ?>%;"></div>
                            </div>
                        </td>
                        <td style="font-weight:700; color:#111827;"><?= $tp['total_qty'] ?> <span style="font-weight:500; color:#9ca3af; font-size:11px;"><?= $tp['satuan'] ?></span></td>
                        <td style="font-weight:700; color:#059669; font-size:12.5px;">Rp <?= number_format($tp['total_pendapatan'], 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <div class="no-data-msg"><i class="fas fa-trophy"></i>Belum terdapat data produk.</div>
            <?php endif; ?>
        </div>

        <!-- PER KASIR -->
        <div class="main-card" style="margin:0;">
            <div class="card-header-custom">
                <h3>
                    <span class="header-icon" style="background:#fdf4ff; color:#9333ea;"><i class="fas fa-user-tie"></i></span>
                    Kinerja per Kasir
                </h3>
            </div>
            <?php if (!empty($per_kasir)): ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Kasir</th>
                        <th>Jumlah Trx</th>
                        <th>Total Omzet</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($per_kasir as $pk): ?>
                    <tr>
                        <td>
                            <div style="display:flex; align-items:center; gap:10px;">
                                <span class="kasir-avatar"><?= strtoupper(substr($pk['nama_kasir'] ?? 'K', 0, 1)) ?></span>
                                <strong style="font-size:13px; color:#111827;"><?= htmlspecialchars($pk['nama_kasir'] ?? '-') ?></strong>
                            </div>
                        </td>
                        <td style="font-weight:600;"><?= $pk['jumlah_trx'] ?> trx</td>
                        <td style="font-weight:700; color:#059669;">Rp <?= number_format($pk['total_omzet'], 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
            <div class="no-data-msg"><i class="fas fa-users"></i>Belum terdapat data kasir.</div>
            <?php endif; ?>
        </div>
    </div>

    <!-- TABEL RIWAYAT TRANSAKSI -->
    <div class="main-card" style="margin-bottom:28px;">
        <div class="card-toolbar">
            <div style="display:flex; align-items:center; gap:10px;">
                <span style="font-size:14px; font-weight:700; color:#111827;">Riwayat Transaksi</span>
                <span class="count-badge"><i class="fas fa-receipt" style="font-size:10px;"></i><?= count($sales) ?> transaksi</span>
            </div>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchLaporan" placeholder="Cari kode transaksi, kasir..." onkeyup="filterTable()">
            </div>
        </div>

        <table class="data-table" id="laporanTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Transaksi</th>
                    <th>Tanggal</th>
                    <th>Kasir</th>
                    <th>Total Harga</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sales)): ?>
                    <?php foreach ($sales as $i => $s): ?>
                    <tr>
                        <td style="color:#9ca3af; font-size:12px;"><?= $i + 1 ?></td>
                        <td><span class="trx-code"><?= htmlspecialchars($s['kode_transaksi']) ?></span></td>
                        <td style="font-size:12.5px;"><?= date('d M Y H:i', strtotime($s['tgl_jual'])) ?></td>
                        <td style="font-size:12.5px; color:#6b7280;"><?= htmlspecialchars($s['nama_kasir'] ?? '-') ?></td>
                        <td><span class="total-text">Rp <?= number_format($s['total_harga'], 0, ',', '.') ?></span></td>
                        <td style="font-size:12.5px;">Rp <?= number_format($s['bayar'] ?? 0, 0, ',', '.') ?></td>
                        <td style="font-size:12.5px;">Rp <?= number_format($s['kembalian'] ?? 0, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="no-data-row">
                        <td colspan="7" class="no-data-msg">
                            <i class="fas fa-file-alt"></i>
                            Tidak ada transaksi di periode ini
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- TOTAL ROW -->
        <?php if (!empty($sales)): ?>
        <div style="padding:14px 20px; border-top:2px solid #e5e7eb; background:#fafafa; display:flex; justify-content:space-between; align-items:center;">
            <span style="font-size:14px; font-weight:700; color:#111827;">TOTAL OMZET</span>
            <span style="font-size:18px; font-weight:800; color:#1a56db;">Rp <?= number_format($total_omzet, 0, ',', '.') ?></span>
        </div>
        <?php endif; ?>

        <div class="pagination-wrap">
            <div class="pagination-info" id="paginationInfo"></div>
            <div class="pagination-controls" id="paginationControls"></div>
        </div>
    </div>

</div>

<!-- CHART.JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<script>
    // ===== CHART OMZET HARIAN =====
    <?php if (!empty($chart_labels)): ?>
    (function() {
        var ctx = document.getElementById('omzetChart').getContext('2d');
        var labels = <?= json_encode(array_map(function($d) { return date('d M', strtotime($d)); }, $chart_labels)) ?>;
        var values = <?= json_encode($chart_values) ?>;

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Omzet (Rp)',
                    data: values,
                    borderColor: '#1a56db',
                    backgroundColor: 'rgba(26, 86, 219, 0.08)',
                    borderWidth: 2.5,
                    fill: true,
                    tension: 0.35,
                    pointRadius: 4,
                    pointBackgroundColor: '#1a56db',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointHoverRadius: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#111827',
                        titleFont: { family: 'DM Sans', size: 12, weight: '600' },
                        bodyFont: { family: 'DM Sans', size: 12 },
                        padding: 10,
                        cornerRadius: 8,
                        callbacks: {
                            label: function(ctx) {
                                return 'Rp ' + ctx.parsed.y.toLocaleString('id-ID');
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { font: { family: 'DM Sans', size: 11 }, color: '#9ca3af' }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f3f4f6' },
                        ticks: {
                            font: { family: 'DM Sans', size: 11 },
                            color: '#9ca3af',
                            callback: function(v) {
                                if (v >= 1000000) return 'Rp ' + (v/1000000).toFixed(1) + 'jt';
                                if (v >= 1000) return 'Rp ' + (v/1000).toFixed(0) + 'rb';
                                return 'Rp ' + v;
                            }
                        }
                    }
                }
            }
        });
    })();
    <?php endif; ?>

    // ===== PAGINATION =====
    var ROWS_PER_PAGE = 15, currentPage = 1, allRows = [], filteredRows = [];
    function initPagination() {
        allRows      = Array.from(document.querySelectorAll('#laporanTable tbody tr:not(.no-data-row)'));
        filteredRows = allRows.slice();
        renderPage(1);
    }
    function renderPage(page) {
        currentPage = page;
        var total = filteredRows.length, pages = Math.ceil(total / ROWS_PER_PAGE) || 1;
        var start = (page - 1) * ROWS_PER_PAGE, end = Math.min(start + ROWS_PER_PAGE, total);
        allRows.forEach(function(r) { r.style.display = 'none'; });
        filteredRows.forEach(function(r, i) { r.style.display = (i >= start && i < end) ? '' : 'none'; });
        document.getElementById('paginationInfo').innerHTML = total === 0 ? 'Tidak ada data'
            : 'Menampilkan <strong>' + (start+1) + '–' + end + '</strong> dari <strong>' + total + '</strong> transaksi';
        var ctrl = document.getElementById('paginationControls');
        ctrl.innerHTML = '';
        var prev = document.createElement('button'); prev.className = 'page-btn nav-btn';
        prev.innerHTML = '<i class="fas fa-chevron-left"></i> Prev'; prev.disabled = (page <= 1);
        prev.onclick = function() { renderPage(currentPage - 1); }; ctrl.appendChild(prev);
        var sp = Math.max(1, page-2), ep = Math.min(pages, sp+4);
        if (ep-sp < 4) sp = Math.max(1, ep-4);
        for (var p = sp; p <= ep; p++) {
            (function(pg) {
                var btn = document.createElement('button');
                btn.className = 'page-btn' + (pg===page?' active':'');
                btn.textContent = pg; btn.onclick = function() { renderPage(pg); };
                ctrl.appendChild(btn);
            })(p);
        }
        var next = document.createElement('button'); next.className = 'page-btn nav-btn';
        next.innerHTML = 'Next <i class="fas fa-chevron-right"></i>'; next.disabled = (page >= pages);
        next.onclick = function() { renderPage(currentPage + 1); }; ctrl.appendChild(next);
    }
    function filterTable() {
        var kw = document.getElementById('searchLaporan').value.toLowerCase();
        filteredRows = allRows.filter(function(r) { return r.textContent.toLowerCase().includes(kw); });
        renderPage(1);
    }
    document.addEventListener('DOMContentLoaded', function() { initPagination(); });
</script>
