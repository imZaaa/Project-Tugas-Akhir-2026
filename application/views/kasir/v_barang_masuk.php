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

    .btn-primary-custom {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: linear-gradient(135deg, #059669, #047857);
        color: #fff !important;
        border: none;
        padding: 9px 18px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none !important;
        box-shadow: 0 3px 10px rgba(5, 150, 105, 0.3);
        transition: opacity 0.15s, transform 0.15s;
    }

    .btn-primary-custom:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    /* ===== STAT CARDS ===== */
    .bm-stats {
        padding: 16px 24px 0;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
    }

    .bm-stat-card {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #e8ecf0;
        padding: 16px 18px;
        display: flex;
        align-items: center;
        gap: 14px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .bm-stat-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
    }

    .bm-stat-value {
        font-size: 22px;
        font-weight: 800;
        color: #111827;
        line-height: 1;
    }

    .bm-stat-label {
        font-size: 11.5px;
        color: #9ca3af;
        font-weight: 500;
        margin-top: 3px;
    }

    /* ===== MAIN TABLE CARD ===== */
    .main-card {
        margin: 16px 24px 28px;
        background: #fff;
        border-radius: 14px;
        border: 1px solid #e8ecf0;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
        overflow: hidden;
    }

    .card-toolbar {
        padding: 14px 20px;
        border-bottom: 1px solid #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
    }

    .count-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #ecfdf5;
        color: #059669;
        font-size: 12px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 20px;
    }

    .search-box {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #f8fafc;
        border: 1.5px solid #e8ecf0;
        border-radius: 8px;
        padding: 7px 12px;
        transition: border-color 0.15s;
    }

    .search-box:focus-within {
        border-color: #059669;
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
        width: 220px;
        font-family: 'DM Sans', sans-serif;
    }

    .search-box input::placeholder {
        color: #d1d5db;
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
        padding: 11px 20px;
        text-align: left;
        background: #fafafa;
        border-bottom: 1px solid #f1f3f5;
        white-space: nowrap;
    }

    .data-table td {
        padding: 13px 20px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #f7f8f9;
        vertical-align: middle;
    }

    .data-table tr:last-child td {
        border-bottom: none;
    }

    .data-table tr:hover td {
        background: #f0fdf9;
    }

    .faktur-code {
        font-size: 12px;
        font-weight: 700;
        color: #059669;
        font-family: 'Courier New', monospace;
    }

    .sup-pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #eff6ff;
        color: #1a56db;
        font-size: 11.5px;
        font-weight: 600;
        padding: 3px 9px;
        border-radius: 20px;
    }

    .total-text {
        font-weight: 700;
        color: #111827;
        font-size: 13px;
    }

    .items-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: #f3f4f6;
        color: #6b7280;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 20px;
    }

    /* ===== ACTION BUTTONS ===== */
    .btn-action {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11.5px;
        font-weight: 600;
        padding: 5px 10px;
        border-radius: 7px;
        border: none;
        cursor: pointer;
        font-family: 'DM Sans', sans-serif;
        transition: background 0.15s;
        text-decoration: none;
    }

    .btn-detail {
        background: #f0fdf4;
        color: #059669;
    }

    .btn-detail:hover {
        background: #dcfce7;
        color: #059669;
    }

    .btn-delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #fee2e2;
        color: #dc2626;
    }

    /* ===== EMPTY STATE ===== */
    .no-data-row td {
        text-align: center;
        padding: 48px 20px;
        color: #9ca3af;
        font-size: 13px;
    }

    .no-data-icon {
        width: 52px;
        height: 52px;
        background: #f3f4f6;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        color: #d1d5db;
        margin: 0 auto 12px;
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
        background: #ecfdf5;
        border-color: #6ee7b7;
        color: #059669;
    }

    .page-btn.active {
        background: #059669;
        border-color: #059669;
        color: #fff;
        box-shadow: 0 2px 8px rgba(5, 150, 105, 0.3);
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

    /* ===== MODAL DELETE ===== */
    .modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        z-index: 99999;
        align-items: center;
        justify-content: center;
        padding: 20px;
        backdrop-filter: blur(3px);
    }

    .modal-overlay.show {
        display: flex;
    }

    .modal-box {
        background: #fff;
        border-radius: 16px;
        width: 100%;
        max-width: 380px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        animation: modalIn 0.2s ease;
    }

    @keyframes modalIn {
        from {
            opacity: 0;
            transform: translateY(-16px) scale(0.97);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .modal-header {
        padding: 18px 22px;
        border-bottom: 1px solid #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .modal-header h4 {
        font-size: 15px;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }

    .modal-close {
        width: 30px;
        height: 30px;
        background: #f3f4f6;
        border: none;
        border-radius: 7px;
        cursor: pointer;
        color: #6b7280;
        font-size: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-close:hover {
        background: #e5e7eb;
    }

    .delete-modal-body {
        padding: 24px 22px;
        text-align: center;
    }

    .delete-icon {
        width: 56px;
        height: 56px;
        background: #fef2f2;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: #dc2626;
        margin: 0 auto 14px;
    }

    .delete-modal-body h5 {
        font-size: 15px;
        font-weight: 700;
        color: #111827;
        margin: 0 0 8px;
    }

    .delete-modal-body p {
        font-size: 12.5px;
        color: #6b7280;
        margin: 0;
        line-height: 1.6;
    }

    .modal-footer {
        padding: 14px 22px;
        border-top: 1px solid #f1f3f5;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .btn-cancel {
        padding: 9px 18px;
        border: 1.5px solid #e5e7eb;
        border-radius: 9px;
        background: #fff;
        color: #6b7280;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        font-family: 'DM Sans', sans-serif;
    }

    .btn-cancel:hover {
        background: #f9fafb;
    }

    .btn-delete-confirm {
        padding: 9px 20px;
        border: none;
        border-radius: 9px;
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        font-family: 'DM Sans', sans-serif;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* ===== ALERT ===== */
    .alert-custom {
        margin: 16px 24px 0;
        padding: 11px 16px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .alert-custom.success {
        background: #f0fdf4;
        color: #16a34a;
        border: 1px solid #bbf7d0;
    }

    .alert-custom.error {
        background: #fef2f2;
        color: #dc2626;
        border: 1px solid #fecaca;
    }
</style>

    <div class="page-title-row">
        <div>
            <h1>Barang Masuk</h1>
            <p>Histori transaksi pembelian & penerimaan barang</p>
        </div>
        <a href="<?= site_url($this->session->userdata('role') === 'admin' ? 'admin/barang_masuk/create' : 'kasir/barang_masuk/create') ?>" class="btn-primary-custom">
            <i class="fas fa-plus"></i> Input Barang Masuk
        </a>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert-custom success"><i class="fas fa-check-circle"></i><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert-custom error"><i class="fas fa-exclamation-circle"></i><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <!-- STAT CARDS -->
    <?php
        $total_trx    = count($purchases);
        $total_nilai  = array_sum(array_column($purchases, 'total_bayar'));
        $bulan_ini    = count(array_filter($purchases, fn($p) => date('Y-m', strtotime($p['created_at'])) === date('Y-m')));
    ?>
    <div class="bm-stats">
        <div class="bm-stat-card">
            <div class="bm-stat-icon" style="background:#ecfdf5; color:#059669;"><i class="fas fa-arrow-circle-down"></i></div>
            <div>
                <div class="bm-stat-value"><?= $total_trx ?></div>
                <div class="bm-stat-label">Total Transaksi</div>
            </div>
        </div>
        <div class="bm-stat-card">
            <div class="bm-stat-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-money-bill-wave"></i></div>
            <div>
                <div class="bm-stat-value" style="font-size:16px;">Rp <?= number_format($total_nilai, 0, ',', '.') ?></div>
                <div class="bm-stat-label">Total Nilai Pembelian</div>
            </div>
        </div>
        <div class="bm-stat-card">
            <div class="bm-stat-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-calendar-alt"></i></div>
            <div>
                <div class="bm-stat-value"><?= $bulan_ini ?></div>
                <div class="bm-stat-label">Transaksi Bulan Ini</div>
            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="main-card">
        <div class="card-toolbar">
            <div style="display:flex; align-items:center; gap:10px;">
                <span style="font-size:14px; font-weight:700; color:#111827;">Histori Barang Masuk</span>
                <span class="count-badge"><i class="fas fa-box" style="font-size:10px;"></i><?= $total_trx ?> transaksi</span>
            </div>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchBm" placeholder="Cari no faktur, supplier..." onkeyup="filterTable()">
            </div>
        </div>

        <table class="data-table" id="bmTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>No Faktur</th>
                    <th>Tanggal</th>
                    <th>Supplier</th>
                    <th>Input Oleh</th>
                    <th>Total Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($purchases)): ?>
                    <?php foreach ($purchases as $i => $p): ?>
                    <tr>
                        <td style="color:#9ca3af; font-size:12px;"><?= $i + 1 ?></td>
                        <td><span class="faktur-code"><?= htmlspecialchars($p['no_faktur']) ?></span></td>
                        <td style="font-size:12.5px;"><?= date('d M Y', strtotime($p['tgl_beli'])) ?></td>
                        <td>
                            <span class="sup-pill">
                                <i class="fas fa-truck" style="font-size:9px;"></i>
                                <?= htmlspecialchars($p['nama_supplier'] ?? '-') ?>
                            </span>
                        </td>
                        <td style="font-size:12.5px; color:#6b7280;"><?= htmlspecialchars($p['nama_kasir'] ?? '-') ?></td>
                        <td><span class="total-text">Rp <?= number_format($p['total_bayar'], 0, ',', '.') ?></span></td>
                        <td>
                            <div style="display:flex; gap:6px;">
                                <a href="<?= site_url(($this->session->userdata('role') === 'admin' ? 'admin' : 'kasir') . '/barang_masuk/detail/' . $p['id_purchase']) ?>" class="btn-action btn-detail">
                                    <i class="fas fa-eye"></i> Detail
                                </a>

                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="no-data-row">
                        <td colspan="7">
                            <div class="no-data-icon"><i class="fas fa-truck-loading"></i></div>
                            <div>Belum terdapat data transaksi barang masuk.</div>
                            <div style="margin-top:6px;"><a href="<?= site_url(($this->session->userdata('role') === 'admin' ? 'admin' : 'kasir') . '/barang_masuk/create') ?>" class="btn-primary-custom" style="margin:0 auto; display:inline-flex;"><i class="fas fa-plus"></i> Input Sekarang</a></div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="pagination-wrap">
            <div class="pagination-info" id="paginationInfo"></div>
            <div class="pagination-controls" id="paginationControls"></div>
        </div>
    </div>



<script>

    document.querySelectorAll('.modal-overlay').forEach(function(o) {
        o.addEventListener('click', function(e) { if (e.target === o) o.classList.remove('show'); });
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') document.querySelectorAll('.modal-overlay.show').forEach(function(m) { m.classList.remove('show'); });
    });

    // PAGINATION
    var ROWS_PER_PAGE = 10, currentPage = 1, allRows = [], filteredRows = [];
    function initPagination() {
        allRows      = Array.from(document.querySelectorAll('#bmTable tbody tr:not(.no-data-row)'));
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
        var kw = document.getElementById('searchBm').value.toLowerCase();
        filteredRows = allRows.filter(function(r) { return r.textContent.toLowerCase().includes(kw); });
        renderPage(1);
    }
    document.addEventListener('DOMContentLoaded', function() { initPagination(); });
</script>
</div>