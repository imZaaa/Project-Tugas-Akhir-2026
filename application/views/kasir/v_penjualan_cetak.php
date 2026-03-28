<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nota Penjualan — <?= htmlspecialchars($header['kode_transaksi']) ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'DM Sans', 'Segoe UI', sans-serif; background: #f0f2f5; color: #111827; -webkit-print-color-adjust: exact; print-color-adjust: exact; }

        .nota-container {
            max-width: 400px;
            margin: 24px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.10), 0 2px 8px rgba(0,0,0,0.04);
            overflow: hidden;
        }

        /* ===== HEADER ===== */
        .nota-header {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 22px 24px 18px;
            border-bottom: 3px solid #1a56db;
        }
        .nota-logo {
            height: 52px;
            flex-shrink: 0;
        }
        .nota-header-text { flex: 1; }
        .nota-header-text h2 {
            font-size: 14px;
            font-weight: 800;
            color: #0f2b5e;
            letter-spacing: 0.3px;
            margin-bottom: 1px;
        }
        .nota-header-text .subtitle {
            font-size: 10px;
            color: #6b7280;
            font-weight: 500;
            margin-bottom: 6px;
        }
        .nota-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: linear-gradient(135deg, #1a56db, #0d3fa6);
            color: #fff;
            border-radius: 6px;
            padding: 4px 11px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        /* ===== KODE TRANSAKSI ===== */
        .nota-kode {
            padding: 16px 24px;
            border-bottom: 1px dashed #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .nota-kode .label { font-size: 10px; color: #9ca3af; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
        .nota-kode .value { font-size: 13px; font-weight: 700; color: #1a56db; font-family: 'Courier New', monospace; letter-spacing: 0.5px; }

        /* ===== INFO ===== */
        .nota-info {
            padding: 14px 24px;
            border-bottom: 1px dashed #e5e7eb;
        }
        .nota-info-row {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
            font-size: 12px;
        }
        .nota-info-row .label { color: #6b7280; font-weight: 500; }
        .nota-info-row .value { font-weight: 600; color: #111827; }

        /* ===== ITEMS ===== */
        .nota-items-header {
            padding: 12px 24px 6px;
            font-size: 10px;
            font-weight: 700;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex;
            justify-content: space-between;
        }
        .nota-items {
            padding: 0 24px 14px;
            border-bottom: 1px dashed #e5e7eb;
        }
        .nota-item {
            padding: 10px 0;
            border-bottom: 1px solid #f3f4f6;
        }
        .nota-item:last-child { border-bottom: none; }
        .nota-item-name {
            font-size: 12.5px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 3px;
        }
        .nota-item-detail {
            display: flex;
            justify-content: space-between;
            font-size: 11.5px;
            color: #6b7280;
        }
        .nota-item-detail .subtotal { font-weight: 700; color: #111827; }

        /* ===== TOTALS ===== */
        .nota-totals {
            padding: 16px 24px;
        }
        .nota-total-row {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
            font-size: 12.5px;
        }
        .nota-total-row .label { color: #6b7280; font-weight: 500; }
        .nota-total-row .value { font-weight: 700; color: #111827; }
        .nota-total-row.grand {
            font-size: 17px;
            padding: 12px 0 6px;
            border-top: 2px solid #111827;
            margin-top: 8px;
        }
        .nota-total-row.grand .label { color: #111827; font-weight: 800; }
        .nota-total-row.grand .value { color: #1a56db; font-weight: 800; }
        .nota-total-row.change .value { color: #059669; }

        /* ===== STATUS ===== */
        .nota-status {
            margin: 0 24px;
            padding: 10px 16px;
            border-radius: 10px;
            text-align: center;
            font-size: 12px;
            font-weight: 700;
        }
        .nota-status.lunas {
            background: #ecfdf5;
            color: #059669;
            border: 1px solid #a7f3d0;
        }
        .nota-status.batal {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        /* ===== FOOTER ===== */
        .nota-footer {
            padding: 20px 24px 24px;
            text-align: center;
        }
        .nota-footer .thanks {
            font-size: 14px;
            font-weight: 800;
            color: #1a56db;
            margin-bottom: 6px;
        }
        .nota-footer p {
            font-size: 10.5px;
            color: #9ca3af;
            line-height: 1.6;
        }
        .nota-footer .divider {
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, #1a56db, #2563eb);
            border-radius: 2px;
            margin: 12px auto;
        }

        /* ===== PRINT ===== */
        @media print {
            body { background: #fff; }
            .nota-container { box-shadow: none; border-radius: 0; margin: 0; max-width: 100%; }
            .no-print { display: none !important; }
            @page { margin: 5mm; }
        }

        /* ===== PRINT BUTTONS ===== */
        .print-actions {
            max-width: 400px;
            margin: 0 auto 16px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .btn-print-action {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 11px 22px;
            border: none;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: all 0.15s;
            text-decoration: none;
        }
        .btn-print-action:hover { transform: translateY(-1px); }
        .btn-print { background: linear-gradient(135deg, #1a56db, #0d3fa6); color: #fff; box-shadow: 0 4px 14px rgba(26,86,219,0.3); }
        .btn-close-nota { background: #f3f4f6; color: #374151; border: 1px solid #e5e7eb; }
    </style>
</head>
<body>

    <!-- PRINT ACTIONS -->
    <div class="print-actions no-print" style="margin-top:24px;">
        <button class="btn-print-action btn-print" onclick="window.print()">
            <i class="fas fa-print"></i> Cetak Nota
        </button>
        <button class="btn-print-action btn-close-nota" onclick="window.close()">
            <i class="fas fa-times"></i> Tutup
        </button>
    </div>

    <div class="nota-container">

        <!-- HEADER -->
        <div class="nota-header">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo PT Pordjo" class="nota-logo">
            <div class="nota-header-text">
                <h2>PT PORDJO STEELINDO PERKASA</h2>
                <div class="subtitle">Distributor &amp; Supply Baja</div>
                <div class="nota-badge"><i class="fas fa-receipt" style="margin-right:4px;"></i> Nota Penjualan</div>
            </div>
        </div>

        <!-- KODE TRANSAKSI -->
        <div class="nota-kode">
            <span class="label">No. Transaksi</span>
            <span class="value"><?= htmlspecialchars($header['kode_transaksi']) ?></span>
        </div>

        <!-- INFO -->
        <div class="nota-info">
            <div class="nota-info-row">
                <span class="label"><i class="far fa-calendar-alt" style="margin-right:4px; font-size:11px;"></i>Tanggal</span>
                <span class="value"><?= date('d/m/Y H:i', strtotime($header['tgl_jual'])) ?></span>
            </div>
            <div class="nota-info-row">
                <span class="label"><i class="far fa-user" style="margin-right:4px; font-size:11px;"></i>Kasir</span>
                <span class="value"><?= htmlspecialchars($header['nama_kasir'] ?? '-') ?></span>
            </div>
            <?php if (!empty($header['nama_pelanggan'])): ?>
            <div class="nota-info-row">
                <span class="label"><i class="far fa-address-card" style="margin-right:4px; font-size:11px;"></i>Pelanggan</span>
                <span class="value"><?= htmlspecialchars($header['nama_pelanggan']) ?></span>
            </div>
            <?php endif; ?>
        </div>

        <!-- ITEMS -->
        <div class="nota-items-header">
            <span>Daftar Produk</span>
            <span>Subtotal</span>
        </div>
        <div class="nota-items">
            <?php foreach ($detail as $d): ?>
            <div class="nota-item">
                <div class="nota-item-name"><?= htmlspecialchars($d['nama_produk'] ?? '-') ?></div>
                <div class="nota-item-detail">
                    <span><?= $d['qty'] ?> × Rp <?= number_format($d['harga_jual'], 0, ',', '.') ?></span>
                    <span class="subtotal">Rp <?= number_format($d['subtotal'], 0, ',', '.') ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- TOTALS -->
        <div class="nota-totals">
            <div class="nota-total-row">
                <span class="label">Subtotal (<?= count($detail) ?> item)</span>
                <span class="value">Rp <?= number_format($header['total_harga'], 0, ',', '.') ?></span>
            </div>
            <div class="nota-total-row grand">
                <span class="label">TOTAL</span>
                <span class="value">Rp <?= number_format($header['total_harga'], 0, ',', '.') ?></span>
            </div>
            <div class="nota-total-row">
                <span class="label">Tunai</span>
                <span class="value">Rp <?= number_format($header['bayar'] ?? 0, 0, ',', '.') ?></span>
            </div>
            <div class="nota-total-row change">
                <span class="label">Kembalian</span>
                <span class="value">Rp <?= number_format($header['kembalian'] ?? 0, 0, ',', '.') ?></span>
            </div>
        </div>

        <!-- STATUS -->
        <div class="nota-status <?= $header['status'] === 'Lunas' ? 'lunas' : 'batal' ?>">
            <i class="fas <?= $header['status'] === 'Lunas' ? 'fa-check-circle' : 'fa-times-circle' ?>" style="margin-right:4px;"></i>
            Status: <?= $header['status'] ?>
        </div>

        <!-- FOOTER -->
        <div class="nota-footer">
            <div class="divider"></div>
            <p class="thanks">Terima Kasih Atas Kunjungan Anda!</p>
            <p>Barang yang sudah dibeli tidak dapat dikembalikan.<br>Simpan nota ini sebagai bukti transaksi.</p>
        </div>

    </div>

</body>
</html>
