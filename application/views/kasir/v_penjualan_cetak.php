<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nota Penjualan — <?= htmlspecialchars($header['kode_transaksi']) ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'DM Sans', 'Segoe UI', sans-serif; background: #f5f7fa; color: #111827; }

        .nota-container {
            max-width: 380px;
            margin: 20px auto;
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        /* HEADER */
        .nota-header {
            background: linear-gradient(135deg, #1a56db, #0d3fa6);
            padding: 24px 20px;
            text-align: center;
            color: #fff;
        }
        .nota-header img { height: 40px; margin-bottom: 10px; }
        .nota-header h2 { font-size: 16px; font-weight: 700; margin-bottom: 2px; }
        .nota-header p { font-size: 11px; opacity: 0.8; line-height: 1.5; }

        /* KODE TRX */
        .nota-kode {
            padding: 14px 20px;
            border-bottom: 1px dashed #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .nota-kode .label { font-size: 11px; color: #9ca3af; font-weight: 600; text-transform: uppercase; }
        .nota-kode .value { font-size: 13px; font-weight: 700; color: #1a56db; font-family: 'Courier New', monospace; }

        /* INFO */
        .nota-info {
            padding: 12px 20px;
            border-bottom: 1px dashed #e5e7eb;
        }
        .nota-info-row {
            display: flex;
            justify-content: space-between;
            padding: 4px 0;
            font-size: 12px;
        }
        .nota-info-row .label { color: #6b7280; }
        .nota-info-row .value { font-weight: 600; color: #111827; }

        /* ITEMS */
        .nota-items {
            padding: 14px 20px;
            border-bottom: 1px dashed #e5e7eb;
        }
        .nota-item {
            padding: 8px 0;
            border-bottom: 1px solid #f7f8f9;
        }
        .nota-item:last-child { border-bottom: none; }
        .nota-item-name { font-size: 12.5px; font-weight: 600; color: #111827; }
        .nota-item-detail { display: flex; justify-content: space-between; font-size: 11.5px; color: #6b7280; margin-top: 3px; }
        .nota-item-detail .subtotal { font-weight: 700; color: #111827; }

        /* TOTALS */
        .nota-totals {
            padding: 14px 20px;
            border-bottom: 1px dashed #e5e7eb;
        }
        .nota-total-row {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
            font-size: 13px;
        }
        .nota-total-row .label { color: #6b7280; font-weight: 500; }
        .nota-total-row .value { font-weight: 700; color: #111827; }
        .nota-total-row.grand { font-size: 16px; padding: 10px 0 4px; border-top: 2px solid #111827; margin-top: 6px; }
        .nota-total-row.grand .label { color: #111827; font-weight: 700; }
        .nota-total-row.grand .value { color: #1a56db; }

        /* FOOTER */
        .nota-footer {
            padding: 18px 20px;
            text-align: center;
        }
        .nota-footer p { font-size: 11px; color: #9ca3af; line-height: 1.6; }
        .nota-footer .thanks { font-size: 13px; font-weight: 700; color: #1a56db; margin-bottom: 6px; }

        /* PRINT STYLES */
        @media print {
            body { background: #fff; }
            .nota-container { box-shadow: none; border-radius: 0; margin: 0; max-width: 100%; }
            .no-print { display: none !important; }
        }

        /* PRINT BUTTONS */
        .print-actions {
            max-width: 380px;
            margin: 0 auto 20px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }
        .btn-print-action { display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px; border: none; border-radius: 9px; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: opacity 0.15s; text-decoration: none; }
        .btn-print { background: linear-gradient(135deg, #1a56db, #0d3fa6); color: #fff; box-shadow: 0 3px 10px rgba(26,86,219,0.3); }
        .btn-close-nota { background: #f3f4f6; color: #374151; border: 1px solid #e5e7eb; }
    </style>
</head>
<body>

    <!-- PRINT ACTIONS (hidden on print) -->
    <div class="print-actions no-print" style="margin-top:20px;">
        <button class="btn-print-action btn-print" onclick="window.print()">
            <i class="fas fa-print" style="font-family:'Font Awesome 5 Free'; font-weight:900;"></i> Cetak Nota
        </button>
        <button class="btn-print-action btn-close-nota" onclick="window.close()">
            Tutup
        </button>
    </div>

    <div class="nota-container">

        <!-- HEADER -->
        <div class="nota-header">
            <h2>PT PORDJO STEELINDO PERKASA</h2>
            <p>Jl. Kaliabang, Bekasi<br>Telp: (021) XXXX-XXXX</p>
        </div>

        <!-- KODE TRX -->
        <div class="nota-kode">
            <span class="label">Kode Transaksi</span>
            <span class="value"><?= htmlspecialchars($header['kode_transaksi']) ?></span>
        </div>

        <!-- INFO -->
        <div class="nota-info">
            <div class="nota-info-row">
                <span class="label">Tanggal</span>
                <span class="value"><?= date('d/m/Y H:i', strtotime($header['tgl_jual'])) ?></span>
            </div>
            <div class="nota-info-row">
                <span class="label">Kasir</span>
                <span class="value"><?= htmlspecialchars($header['nama_kasir'] ?? '-') ?></span>
            </div>
            <?php if (!empty($header['nama_pelanggan'])): ?>
            <div class="nota-info-row">
                <span class="label">Pelanggan</span>
                <span class="value"><?= htmlspecialchars($header['nama_pelanggan']) ?></span>
            </div>
            <?php endif; ?>
            <div class="nota-info-row">
                <span class="label">Status</span>
                <span class="value" style="color:<?= $header['status'] === 'Lunas' ? '#059669' : '#dc2626' ?>;"><?= $header['status'] ?></span>
            </div>
        </div>

        <!-- ITEMS -->
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
                <span class="label">Bayar</span>
                <span class="value">Rp <?= number_format($header['bayar'] ?? 0, 0, ',', '.') ?></span>
            </div>
            <div class="nota-total-row">
                <span class="label">Kembalian</span>
                <span class="value" style="color:#059669;">Rp <?= number_format($header['kembalian'] ?? 0, 0, ',', '.') ?></span>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="nota-footer">
            <p class="thanks">Terima Kasih!</p>
            <p>Barang yang sudah dibeli<br>tidak dapat dikembalikan.</p>
        </div>

    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html>
