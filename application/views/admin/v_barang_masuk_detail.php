<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path) { font-family: 'DM Sans','Segoe UI',sans-serif; }
    .page-title-row { padding: 24px 28px 0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
    .page-title-row h1 { font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 3px; }
    .btn-back { display: inline-flex; align-items: center; gap: 7px; background: #f3f4f6; color: #374151 !important; border: none; padding: 9px 16px; border-radius: 9px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; transition: background 0.15s; }
    .btn-back:hover { background: #e5e7eb; }

    .detail-layout { margin: 20px 24px 28px; display: grid; grid-template-columns: 1fr 300px; gap: 20px; align-items: start; }
    .det-card { background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); overflow: hidden; }
    .det-card-header { padding: 16px 20px; border-bottom: 1px solid #f1f3f5; }
    .det-card-header h3 { font-size: 14px; font-weight: 700; color: #111827; margin: 0; }

    /* NOTA HEADER */
    .nota-banner { background: linear-gradient(135deg, #1a56db, #0d3fa6); padding: 20px 24px; display: flex; align-items: center; justify-content: space-between; }
    .nota-badge { font-family: 'Courier New', monospace; font-size: 18px; font-weight: 800; color: #fff; letter-spacing: 1px; }
    .nota-date { font-size: 12px; color: rgba(255,255,255,0.8); margin-top: 4px; }
    .nota-total-label { font-size: 11px; color: rgba(255,255,255,0.75); text-align: right; }
    .nota-total-value { font-size: 22px; font-weight: 800; color: #fff; text-align: right; }

    .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0; }
    .info-cell { padding: 14px 20px; border-bottom: 1px solid #f7f8f9; border-right: 1px solid #f7f8f9; }
    .info-cell:nth-child(2n) { border-right: none; }
    .info-cell:last-child, .info-cell:nth-last-child(2) { border-bottom: none; }
    .info-label { font-size: 11px; color: #9ca3af; font-weight: 500; display: block; margin-bottom: 4px; }
    .info-value { font-size: 13px; font-weight: 600; color: #111827; display: block; }

    /* ITEMS TABLE */
    .items-table { width: 100%; border-collapse: collapse; }
    .items-table th { font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #9ca3af; padding: 11px 20px; text-align: left; background: #fafafa; border-bottom: 1px solid #f1f3f5; }
    .items-table td { padding: 13px 20px; font-size: 13px; color: #374151; border-bottom: 1px solid #f7f8f9; vertical-align: middle; }
    .items-table tr:last-child td { border-bottom: none; }
    .prod-name { font-weight: 600; color: #111827; display: block; }
    .prod-kat  { font-size: 11.5px; color: #9ca3af; display: block; margin-top: 2px; }
    .qty-badge { display: inline-flex; align-items: center; gap: 4px; background: #eff6ff; color: #1a56db; font-size: 12px; font-weight: 700; padding: 3px 9px; border-radius: 20px; }
    .subtotal-text { font-weight: 700; color: #111827; }

    /* SIDEBAR */
    .side-info-row { display: flex; align-items: center; gap: 10px; padding: 13px 20px; border-bottom: 1px solid #f7f8f9; }
    .side-info-row:last-child { border-bottom: none; }
    .side-icon { width: 34px; height: 34px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 12px; flex-shrink: 0; }
    .side-label { font-size: 11px; color: #9ca3af; font-weight: 500; display: block; }
    .side-value { font-size: 13px; font-weight: 600; color: #111827; display: block; margin-top: 1px; }

    .total-footer { padding: 16px 20px; background: #f8fafc; border-top: 2px solid #e8ecf0; display: flex; align-items: center; justify-content: space-between; }
    .total-footer .label { font-size: 13px; color: #6b7280; font-weight: 500; }
    .total-footer .value { font-size: 18px; font-weight: 800; color: #1a56db; }

    @media (max-width: 900px) {
        .detail-layout { grid-template-columns: 1fr; margin: 16px 14px 24px; }
        .info-grid { grid-template-columns: 1fr; }
        .info-cell { border-right: none; }
        .page-title-row { padding-left: 16px; padding-right: 16px; }
    }
</style>

    <div class="page-title-row">
        <div>
            <h1>Detail Barang Masuk</h1>
            <p>Rincian transaksi penerimaan barang</p>
        </div>
        <a href="<?= site_url('admin/barang_masuk') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="detail-layout">

        <!-- LEFT -->
        <div style="display:flex; flex-direction:column; gap:18px;">

            <!-- NOTA BANNER -->
            <div class="det-card">
                <div class="nota-banner">
                    <div>
                        <div class="nota-badge"><?= htmlspecialchars($header['no_faktur']) ?></div>
                        <div class="nota-date"><i class="fas fa-calendar-alt" style="margin-right:5px;"></i><?= date('d F Y', strtotime($header['tgl_beli'])) ?></div>
                    </div>
                    <div style="text-align:right;">
                        <div class="nota-total-label">Total Bayar</div>
                        <div class="nota-total-value">Rp <?= number_format($header['total_bayar'], 0, ',', '.') ?></div>
                    </div>
                </div>
                <div class="info-grid">
                    <div class="info-cell">
                        <span class="info-label"><i class="fas fa-truck" style="margin-right:4px;"></i>Supplier</span>
                        <span class="info-value"><?= htmlspecialchars($header['nama_supplier'] ?? '-') ?></span>
                    </div>
                    <div class="info-cell">
                        <span class="info-label"><i class="fas fa-barcode" style="margin-right:4px;"></i>Kode Supplier</span>
                        <span class="info-value" style="font-family:'Courier New',monospace; color:#1a56db;"><?= htmlspecialchars($header['kode_supplier'] ?? '-') ?></span>
                    </div>
                    <div class="info-cell">
                        <span class="info-label"><i class="fas fa-user" style="margin-right:4px;"></i>Diinput Oleh</span>
                        <span class="info-value"><?= htmlspecialchars($header['nama_kasir'] ?? '-') ?></span>
                    </div>
                    <div class="info-cell">
                        <span class="info-label"><i class="fas fa-clock" style="margin-right:4px;"></i>Waktu Input</span>
                        <span class="info-value"><?= date('d M Y, H:i', strtotime($header['created_at'])) ?></span>
                    </div>
                    <?php if (!empty($header['keterangan'])): ?>
                    <div class="info-cell" style="grid-column:1/-1;">
                        <span class="info-label"><i class="fas fa-sticky-note" style="margin-right:4px;"></i>Keterangan</span>
                        <span class="info-value"><?= htmlspecialchars($header['keterangan']) ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- ITEMS -->
            <div class="det-card">
                <div class="det-card-header" style="display:flex; align-items:center; justify-content:space-between;">
                    <h3>Daftar Produk</h3>
                    <span style="background:#eff6ff; color:#1a56db; font-size:12px; font-weight:600; padding:4px 10px; border-radius:20px;">
                        <?= count($detail) ?> item
                    </span>
                </div>
                <table class="items-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Harga Beli</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detail as $i => $d): ?>
                        <tr>
                            <td style="color:#9ca3af; font-size:12px;"><?= $i + 1 ?></td>
                            <td>
                                <span class="prod-name"><?= htmlspecialchars($d['nama_produk']) ?></span>
                                <span class="prod-kat"><?= htmlspecialchars($d['nama_kategori']) ?></span>
                            </td>
                            <td>
                                <span class="qty-badge"><?= $d['qty'] ?> <?= htmlspecialchars($d['satuan']) ?></span>
                            </td>
                            <td style="font-size:12.5px;">Rp <?= number_format($d['purchase_price'], 0, ',', '.') ?></td>
                            <td><span class="subtotal-text">Rp <?= number_format($d['subtotal'], 0, ',', '.') ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="total-footer">
                    <span class="label">Total Bayar</span>
                    <span class="value">Rp <?= number_format($header['total_bayar'], 0, ',', '.') ?></span>
                </div>
            </div>

        </div>

        <!-- RIGHT SIDEBAR -->
        <div>
            <div class="det-card">
                <div class="det-card-header"><h3>Info Transaksi</h3></div>
                <div class="side-info-row">
                    <div class="side-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-receipt"></i></div>
                    <div>
                        <span class="side-label">No. Faktur</span>
                        <span class="side-value" style="font-family:'Courier New',monospace; font-size:12px; color:#1a56db;"><?= htmlspecialchars($header['no_faktur']) ?></span>
                    </div>
                </div>
                <div class="side-info-row">
                    <div class="side-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-boxes"></i></div>
                    <div>
                        <span class="side-label">Total Item Produk</span>
                        <span class="side-value"><?= count($detail) ?> jenis produk</span>
                    </div>
                </div>
                <div class="side-info-row">
                    <div class="side-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-cubes"></i></div>
                    <div>
                        <span class="side-label">Total Qty Masuk</span>
                        <span class="side-value"><?= array_sum(array_column($detail, 'qty')) ?> unit</span>
                    </div>
                </div>
                <div class="side-info-row">
                    <div class="side-icon" style="background:#fdf4ff; color:#9333ea;"><i class="fas fa-calendar-plus"></i></div>
                    <div>
                        <span class="side-label">Tanggal Beli</span>
                        <span class="side-value"><?= date('d M Y', strtotime($header['tgl_beli'])) ?></span>
                    </div>
                </div>
                <div class="side-info-row">
                    <div class="side-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-check-circle"></i></div>
                    <div>
                        <span class="side-label">Status Stok</span>
                        <span class="side-value" style="color:#1a56db;">Sudah Diperbarui ✓</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>