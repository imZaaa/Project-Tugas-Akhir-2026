<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path) { font-family: 'DM Sans','Segoe UI',sans-serif; }

    .page-title-row { padding: 24px 28px 0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
    .page-title-row h1 { font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 3px; }
    .page-title-row p  { font-size: 12.5px; color: #9ca3af; margin: 0; }
    .btn-back { display: inline-flex; align-items: center; gap: 7px; background: #f3f4f6; color: #374151 !important; border: none; padding: 9px 16px; border-radius: 9px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; transition: background 0.15s; }
    .btn-back:hover { background: #e5e7eb; }

    .detail-layout { margin: 20px 24px 28px; display: grid; grid-template-columns: 1fr 320px; gap: 20px; align-items: start; }

    .detail-card { background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); overflow: hidden; }
    .detail-card-header { padding: 16px 20px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; gap: 10px; }
    .detail-card-header h3 { font-size: 14px; font-weight: 700; color: #111827; margin: 0; }
    .detail-card-header .header-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 13px; }
    .detail-card-body { padding: 20px; }

    .info-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; }
    .info-item { }
    .info-label { font-size: 11px; font-weight: 600; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px; }
    .info-value { font-size: 14px; font-weight: 600; color: #111827; }
    .info-value.code { font-family: 'Courier New', monospace; color: #1a56db; }

    .status-badge { display: inline-flex; align-items: center; gap: 4px; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 20px; }
    .status-lunas { background: #ecfdf5; color: #059669; }
    .status-batal { background: #fef2f2; color: #dc2626; }

    .items-table { width: 100%; border-collapse: collapse; margin-top: 16px; }
    .items-table th { font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #9ca3af; padding: 10px 14px; text-align: left; background: #fafafa; border-bottom: 1px solid #f1f3f5; white-space: nowrap; }
    .items-table td { padding: 12px 14px; font-size: 13px; color: #374151; border-bottom: 1px solid #f7f8f9; vertical-align: middle; }
    .items-table tr:last-child td { border-bottom: none; }
    .items-table tr:hover td { background: #f8fbff; }
    .items-table .total-row td { font-weight: 700; color: #111827; background: #fafafa; border-top: 2px solid #e5e7eb; }

    /* SUMMARY SIDEBAR */
    .summary-card { background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); overflow: hidden; position: sticky; top: 20px; }
    .summary-header { padding: 16px 20px; border-bottom: 1px solid #f1f3f5; }
    .summary-header h3 { font-size: 14px; font-weight: 700; color: #111827; margin: 0; }
    .summary-body { padding: 16px 20px; }
    .summary-row { display: flex; align-items: center; justify-content: space-between; padding: 9px 0; border-bottom: 1px solid #f7f8f9; font-size: 13px; }
    .summary-row:last-child { border-bottom: none; }
    .summary-row .label { color: #6b7280; font-weight: 500; }
    .summary-row .value { font-weight: 700; color: #111827; }
    .summary-total { border-radius: 10px; padding: 14px 16px; margin-top: 14px; }
    .summary-total .label { font-size: 12px; font-weight: 500; }
    .summary-total .value { font-size: 20px; font-weight: 800; margin-top: 4px; }

    .btn-action-lg { display: flex; align-items: center; justify-content: center; gap: 8px; width: 100%; padding: 11px; border: none; border-radius: 9px; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; text-decoration: none !important; margin-top: 10px; transition: opacity 0.15s; }
    .btn-action-lg:hover { opacity: 0.9; }
    .btn-cetak { background: linear-gradient(135deg, #1a56db, #0d3fa6); color: #fff !important; box-shadow: 0 3px 10px rgba(26,86,219,0.3); }
    .btn-kembali { background: #f3f4f6; color: #374151 !important; border: 1px solid #e5e7eb; }

    .alert-custom { margin: 16px 24px 0; padding: 11px 16px; border-radius: 10px; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 9px; }
    .alert-custom.success { background: #eff6ff; color: #1a56db; border: 1px solid #bfdbfe; }
    .alert-custom.error   { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

    @media (max-width: 1024px) {
        .detail-layout { grid-template-columns: 1fr; }
        .summary-card { position: static; }
    }
    @media (max-width: 768px) {
        .detail-layout { margin: 16px 14px 24px; }
        .page-title-row { padding-left: 16px; padding-right: 16px; }
        .info-grid { grid-template-columns: 1fr; }
    }
</style>



    <div class="page-title-row">
        <div>
            <h1><i class="fas fa-file-invoice-dollar" style="color:#1a56db; margin-right:6px;"></i>Detail Transaksi</h1>
            <p>Detail penjualan — <?= htmlspecialchars($header['kode_transaksi']) ?></p>
        </div>
        <a href="<?= site_url('admin/penjualan') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali ke Riwayat
        </a>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert-custom success"><i class="fas fa-check-circle"></i><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert-custom error"><i class="fas fa-exclamation-circle"></i><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <div class="detail-layout">

        <!-- LEFT: DETAIL INFO & ITEMS -->
        <div style="display:flex; flex-direction:column; gap:18px;">

            <!-- INFO TRANSAKSI -->
            <div class="detail-card">
                <div class="detail-card-header">
                    <div class="detail-card-header header-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-info-circle"></i></div>
                    <h3>Informasi Transaksi</h3>
                </div>
                <div class="detail-card-body">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Kode Transaksi</div>
                            <div class="info-value code"><?= htmlspecialchars($header['kode_transaksi']) ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Tanggal</div>
                            <div class="info-value"><?= date('d M Y — H:i', strtotime($header['tgl_jual'])) ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Nama Pelanggan</div>
                            <div class="info-value"><?= htmlspecialchars(!empty($header['nama_pelanggan']) ? $header['nama_pelanggan'] : 'Umum') ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Kasir</div>
                            <div class="info-value"><?= htmlspecialchars($header['nama_kasir'] ?? '-') ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Status</div>
                            <div>
                                <?php if ($header['status'] === 'Lunas'): ?>
                                    <span class="status-badge status-lunas"><i class="fas fa-check-circle" style="font-size:10px;"></i> Lunas</span>
                                <?php else: ?>
                                    <span class="status-badge status-batal"><i class="fas fa-times-circle" style="font-size:10px;" ></i> Batal</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DAFTAR ITEM -->
            <div class="detail-card">
                <div class="detail-card-header">
                    <div class="detail-card-header header-icon" style="background:#ecfdf5; color:#059669;"><i class="fas fa-list"></i></div>
                    <h3>Daftar Item (<?= count($detail) ?> produk)</h3>
                </div>
                <div class="detail-card-body" style="padding:0;">
                    <table class="items-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produk</th>
                                <th>Kategori</th>
                                <th>Harga Jual</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detail as $i => $d): ?>
                            <tr>
                                <td style="color:#9ca3af; font-size:12px;"><?= $i + 1 ?></td>
                                <td>
                                    <strong style="color:#111827;"><?= htmlspecialchars($d['nama_produk'] ?? '-') ?></strong>
                                    <span style="font-size:11px; color:#9ca3af; margin-left:4px;">(<?= $d['satuan'] ?? '' ?>)</span>
                                </td>
                                <td style="font-size:12.5px; color:#6b7280;"><?= htmlspecialchars($d['nama_kategori'] ?? '-') ?></td>
                                <td style="font-size:12.5px;">Rp <?= number_format($d['harga_jual'], 0, ',', '.') ?></td>
                                <td style="font-weight:600;"><?= $d['qty'] ?></td>
                                <td style="font-weight:700; color:#111827;">Rp <?= number_format($d['subtotal'], 0, ',', '.') ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr class="total-row">
                                <td colspan="5" style="text-align:right; padding-right:20px;">TOTAL</td>
                                <td style="font-size:15px;">Rp <?= number_format($header['total_harga'], 0, ',', '.') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- RIGHT: SUMMARY SIDEBAR -->
        <div>
            <div class="summary-card">
                <div class="summary-header">
                    <h3><i class="fas fa-receipt" style="color:#1a56db; margin-right:6px;"></i>Ringkasan</h3>
                </div>
                <div class="summary-body">
                    <div class="summary-row">
                        <span class="label">Total Item</span>
                        <span class="value"><?= count($detail) ?> produk</span>
                    </div>
                    <div class="summary-row">
                        <span class="label">Total Qty</span>
                        <span class="value"><?= array_sum(array_column($detail, 'qty')) ?></span>
                    </div>

                    <div class="summary-total" style="background: linear-gradient(135deg, #1a56db, #0d3fa6);">
                        <div class="label" style="color:rgba(255,255,255,0.8);">Total Harga</div>
                        <div class="value" style="color:#fff;">Rp <?= number_format($header['total_harga'], 0, ',', '.') ?></div>
                    </div>

                    <div class="summary-row" style="margin-top:14px;">
                        <span class="label">Bayar</span>
                        <span class="value" style="color:#059669;">Rp <?= number_format($header['bayar'] ?? 0, 0, ',', '.') ?></span>
                    </div>
                    <div class="summary-row">
                        <span class="label">Kembalian</span>
                        <span class="value" style="color:#059669;">Rp <?= number_format($header['kembalian'] ?? 0, 0, ',', '.') ?></span>
                    </div>

                    <a href="<?= site_url('admin/penjualan/cetak/' . $header['id_sale']) ?>" class="btn-action-lg btn-cetak" target="_blank">
                        <i class="fas fa-print"></i> Cetak Nota
                    </a>
                    <a href="<?= site_url('admin/penjualan') ?>" class="btn-action-lg btn-kembali">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
