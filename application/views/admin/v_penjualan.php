<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path) { font-family: 'DM Sans','Segoe UI',sans-serif; }
    .page-title-row { padding: 24px 28px 0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
    .page-title-row h1 { font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 3px; }
    .page-title-row p  { font-size: 12.5px; color: #9ca3af; margin: 0; }
    .btn-primary-custom { display: inline-flex; align-items: center; gap: 7px; background: linear-gradient(135deg, #1a56db, #0d3fa6); color: #fff !important; border: none; padding: 9px 18px; border-radius: 9px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; box-shadow: 0 3px 10px rgba(26,86,219,0.3); transition: opacity 0.15s, transform 0.15s; }
    .btn-primary-custom:hover { opacity: 0.9; transform: translateY(-1px); }

    /* STAT CARDS */
    .pj-stats { padding: 16px 24px 0; display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
    .pj-stat-card { background: #fff; border-radius: 12px; border: 1px solid #e8ecf0; padding: 16px 18px; display: flex; align-items: center; gap: 14px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
    .pj-stat-icon { width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; }
    .pj-stat-value { font-size: 22px; font-weight: 800; color: #111827; line-height: 1; }
    .pj-stat-label { font-size: 11.5px; color: #9ca3af; font-weight: 500; margin-top: 3px; }

    /* TABLE */
    .main-card { margin: 16px 24px 28px; background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); overflow: hidden; }
    .card-toolbar { padding: 14px 20px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; }
    .count-badge { display: inline-flex; align-items: center; gap: 5px; background: #eff6ff; color: #1a56db; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 20px; }
    .search-box { display: flex; align-items: center; gap: 8px; background: #f8fafc; border: 1.5px solid #e8ecf0; border-radius: 8px; padding: 7px 12px; transition: border-color 0.15s; }
    .search-box:focus-within { border-color: #1a56db; background: #fff; }
    .search-box i { color: #9ca3af; font-size: 12px; }
    .search-box input { border: none; background: transparent; font-size: 13px; color: #374151; outline: none; width: 220px; font-family: 'DM Sans', sans-serif; }
    .search-box input::placeholder { color: #d1d5db; }

    .data-table { width: 100%; border-collapse: collapse; }
    .data-table th { font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #9ca3af; padding: 11px 16px; text-align: left; background: #fafafa; border-bottom: 1px solid #f1f3f5; white-space: nowrap; }
    .data-table td { padding: 12px 16px; font-size: 13px; color: #374151; border-bottom: 1px solid #f7f8f9; vertical-align: middle; }
    .data-table tr:last-child td { border-bottom: none; }
    .data-table tr:hover td { background: #f8fbff; }

    .trx-code { font-size: 12px; font-weight: 700; color: #1a56db; font-family: 'Courier New', monospace; }
    .status-badge { display: inline-flex; align-items: center; gap: 4px; font-size: 11px; font-weight: 600; padding: 3px 10px; border-radius: 20px; }
    .status-lunas { background: #ecfdf5; color: #059669; }
    .status-batal { background: #fef2f2; color: #dc2626; }
    .total-text { font-weight: 700; color: #111827; font-size: 13px; }

    .btn-action { display: inline-flex; align-items: center; gap: 5px; font-size: 11.5px; font-weight: 600; padding: 5px 10px; border-radius: 7px; border: none; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: background 0.15s; text-decoration: none; }
    .btn-detail { background: #eff6ff; color: #1a56db; }
    .btn-detail:hover { background: #dbeafe; color: #1a56db; }
    .btn-print { background: #ecfdf5; color: #059669; }
    .btn-print:hover { background: #d1fae5; color: #059669; }
    .btn-void { background: #fef2f2; color: #dc2626; }
    .btn-void:hover { background: #fee2e2; color: #dc2626; }

    .no-data-row td { text-align: center; padding: 48px 20px; color: #9ca3af; font-size: 13px; }
    .no-data-icon { width: 52px; height: 52px; background: #f3f4f6; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 22px; color: #d1d5db; margin: 0 auto 12px; }

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

    /* MODAL VOID */
    .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.45); z-index: 99999; align-items: center; justify-content: center; padding: 20px; backdrop-filter: blur(3px); }
    .modal-overlay.show { display: flex; }
    .modal-box { background: #fff; border-radius: 16px; width: 100%; max-width: 380px; box-shadow: 0 20px 60px rgba(0,0,0,0.2); overflow: hidden; animation: modalIn 0.2s ease; }
    @keyframes modalIn { from { opacity: 0; transform: translateY(-16px) scale(0.97); } to { opacity: 1; transform: translateY(0) scale(1); } }
    .modal-header-custom { padding: 18px 22px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; }
    .modal-header-custom h4 { font-size: 15px; font-weight: 700; color: #111827; margin: 0; }
    .modal-close { width: 30px; height: 30px; background: #f3f4f6; border: none; border-radius: 7px; cursor: pointer; color: #6b7280; font-size: 13px; display: flex; align-items: center; justify-content: center; }
    .modal-close:hover { background: #e5e7eb; }
    .void-modal-body { padding: 24px 22px; text-align: center; }
    .void-icon { width: 56px; height: 56px; background: #fef2f2; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 24px; color: #dc2626; margin: 0 auto 14px; }
    .void-modal-body h5 { font-size: 15px; font-weight: 700; color: #111827; margin: 0 0 8px; }
    .void-modal-body p { font-size: 12.5px; color: #6b7280; margin: 0; line-height: 1.6; }
    .modal-footer-custom { padding: 14px 22px; border-top: 1px solid #f1f3f5; display: flex; justify-content: flex-end; gap: 10px; }
    .btn-cancel { padding: 9px 18px; border: 1.5px solid #e5e7eb; border-radius: 9px; background: #fff; color: #6b7280; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; }
    .btn-cancel:hover { background: #f9fafb; }
    .btn-void-confirm { padding: 9px 20px; border: none; border-radius: 9px; background: linear-gradient(135deg, #dc2626, #b91c1c); color: #fff; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; display: flex; align-items: center; gap: 6px; }

    .alert-custom { margin: 16px 24px 0; padding: 11px 16px; border-radius: 10px; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 9px; }
    .alert-custom.success { background: #eff6ff; color: #1a56db; border: 1px solid #bfdbfe; }
    .alert-custom.error   { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

    @media (max-width: 768px) {
        .pj-stats { grid-template-columns: 1fr; }
        .page-title-row, .main-card { margin-left: 14px; margin-right: 14px; }
        .pj-stats { padding-left: 14px; padding-right: 14px; }
    }
</style>



    <div class="page-title-row">
        <div>
            <h1><i class="fas fa-shopping-cart" style="color:#1a56db; margin-right:6px;"></i>Penjualan Offline</h1>
            <p>Seluruh riwayat transaksi penjualan</p>
        </div>
        <a href="<?= site_url('admin/penjualan/create') ?>" class="btn-primary-custom">
            <i class="fas fa-plus"></i> Transaksi Baru
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
        $total_trx   = count($sales);
        $total_nilai = array_sum(array_column($sales, 'total_harga'));
        $trx_lunas   = count(array_filter($sales, fn($s) => ($s['status'] ?? '') === 'Lunas'));
    ?>
    <div class="pj-stats">
        <div class="pj-stat-card">
            <div class="pj-stat-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-receipt"></i></div>
            <div>
                <div class="pj-stat-value"><?= $total_trx ?></div>
                <div class="pj-stat-label">Total Transaksi</div>
            </div>
        </div>
        <div class="pj-stat-card">
            <div class="pj-stat-icon" style="background:#ecfdf5; color:#059669;"><i class="fas fa-money-bill-wave"></i></div>
            <div>
                <div class="pj-stat-value" style="font-size:16px;">Rp <?= number_format($omzet_hari ?? 0, 0, ',', '.') ?></div>
                <div class="pj-stat-label">Omzet Hari Ini</div>
            </div>
        </div>
        <div class="pj-stat-card">
            <div class="pj-stat-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-check-circle"></i></div>
            <div>
                <div class="pj-stat-value"><?= $trx_lunas ?></div>
                <div class="pj-stat-label">Transaksi Lunas</div>
            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="main-card">
        <div class="card-toolbar">
            <div style="display:flex; align-items:center; gap:10px;">
                <span style="font-size:14px; font-weight:700; color:#111827;">Riwayat Penjualan</span>
                <span class="count-badge"><i class="fas fa-shopping-cart" style="font-size:10px;"></i><?= $total_trx ?> transaksi</span>
            </div>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchPj" placeholder="Cari kode transaksi, kasir..." onkeyup="filterTable()">
            </div>
        </div>

        <table class="data-table" id="pjTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Transaksi</th>
                    <th>Tanggal</th>
                    <th>Kasir</th>
                    <th>Total Harga</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sales)): ?>
                    <?php foreach ($sales as $i => $s): ?>
                    <tr>
                        <td style="color:#9ca3af; font-size:12px;"><?= $i + 1 ?></td>
                        <td><span class="trx-code"><?= htmlspecialchars($s['kode_transaksi']) ?></span></td>
                        <td style="font-size:12.5px;"><?= date('d M Y H:i', strtotime($s['tgl_jual'])) ?></td>
                        <td style="font-size:12.5px; color:#6b7280;"><?= htmlspecialchars($s['nama_kasir'] ?? $s['id_user'] ?? '-') ?></td>
                        <td><span class="total-text">Rp <?= number_format($s['total_harga'], 0, ',', '.') ?></span></td>
                        <td style="font-size:12.5px;">Rp <?= number_format($s['bayar'] ?? 0, 0, ',', '.') ?></td>
                        <td style="font-size:12.5px;">Rp <?= number_format($s['kembalian'] ?? 0, 0, ',', '.') ?></td>
                        <td>
                            <?php if (($s['status'] ?? '') === 'Lunas'): ?>
                                <span class="status-badge status-lunas"><i class="fas fa-check-circle" style="font-size:9px;"></i> Lunas</span>
                            <?php else: ?>
                                <span class="status-badge status-batal"><i class="fas fa-times-circle" style="font-size:9px;"></i> Batal</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div style="display:flex; gap:5px; flex-wrap:wrap;">
                                <a href="<?= site_url('admin/penjualan/detail/' . $s['id_sale']) ?>" class="btn-action btn-detail">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="<?= site_url('admin/penjualan/cetak/' . $s['id_sale']) ?>" class="btn-action btn-print" target="_blank">
                                    <i class="fas fa-print"></i> Nota
                                </a>
                                <?php if (($s['status'] ?? '') === 'Lunas'): ?>
                                <button class="btn-action btn-void" onclick="openVoid('<?= $s['id_sale'] ?>', '<?= htmlspecialchars($s['kode_transaksi'], ENT_QUOTES) ?>')">
                                    <i class="fas fa-ban"></i> Batalkan
                                </button>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="no-data-row">
                        <td colspan="9">
                            <div class="no-data-icon"><i class="fas fa-shopping-cart"></i></div>
                            <div>Belum terdapat data transaksi penjualan.</div>
                            <div style="margin-top:6px;">
                                <a href="<?= site_url('admin/penjualan/create') ?>" class="btn-primary-custom" style="margin:0 auto; display:inline-flex;">
                                    <i class="fas fa-plus"></i> Buat Transaksi Baru
                                </a>
                            </div>
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

    <!-- MODAL VOID -->
    <div class="modal-overlay" id="modalVoid">
        <div class="modal-box">
            <div class="modal-header-custom">
                <h4><i class="fas fa-ban" style="color:#dc2626; margin-right:8px;"></i>Batalkan Transaksi</h4>
                <button class="modal-close" onclick="document.getElementById('modalVoid').classList.remove('show')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/penjualan/void') ?>" method="post">
                <input type="hidden" name="id_sale" id="void_id">
                <div class="void-modal-body">
                    <div class="void-icon"><i class="fas fa-exclamation-triangle"></i></div>
                    <h5>Batalkan Transaksi?</h5>
                    <p>Transaksi <strong id="void_kode"></strong> akan dibatalkan.<br>
                    <span style="color:#dc2626; font-weight:600;">⚠ Stok produk akan dikembalikan sesuai qty transaksi ini.</span></p>
                </div>
                <div class="modal-footer-custom">
                    <button type="button" class="btn-cancel" onclick="document.getElementById('modalVoid').classList.remove('show')">Kembali</button>
                    <button type="submit" class="btn-void-confirm"><i class="fas fa-ban"></i> Ya, Batalkan</button>
                </div>
            </form>
        </div>
    </div>

<script>
    function openVoid(id, kode) {
        document.getElementById('void_id').value = id;
        document.getElementById('void_kode').textContent = kode;
        document.getElementById('modalVoid').classList.add('show');
    }
    document.querySelectorAll('.modal-overlay').forEach(function(o) {
        o.addEventListener('click', function(e) { if (e.target === o) o.classList.remove('show'); });
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') document.querySelectorAll('.modal-overlay.show').forEach(function(m) { m.classList.remove('show'); });
    });

    // PAGINATION
    var ROWS_PER_PAGE = 10, currentPage = 1, allRows = [], filteredRows = [];
    function initPagination() {
        allRows      = Array.from(document.querySelectorAll('#pjTable tbody tr:not(.no-data-row)'));
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
        var kw = document.getElementById('searchPj').value.toLowerCase();
        filteredRows = allRows.filter(function(r) { return r.textContent.toLowerCase().includes(kw); });
        renderPage(1);
    }
    document.addEventListener('DOMContentLoaded', function() { initPagination(); });
</script>
</div>
