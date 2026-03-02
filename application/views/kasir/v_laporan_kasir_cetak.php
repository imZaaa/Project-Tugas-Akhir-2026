<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Setoran — <?= htmlspecialchars($nama_kasir) ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'DM Sans','Segoe UI',sans-serif; background:#fff; color:#111827; font-size:12px; }
        .container { max-width:600px; margin:0 auto; padding:24px; }
        .report-header { text-align:center; border-bottom:3px solid #111827; padding-bottom:16px; margin-bottom:20px; }
        .report-header h1 { font-size:16px; font-weight:800; margin-bottom:2px; }
        .report-header h2 { font-size:14px; font-weight:600; color:#1a56db; margin-bottom:4px; }
        .report-header p { font-size:11px; color:#6b7280; }
        .periode-badge { display:inline-block; background:#f3f4f6; border:1px solid #e5e7eb; border-radius:6px; padding:6px 14px; font-size:12px; font-weight:600; color:#374151; margin-top:10px; }
        .kasir-info { background:#f8fafc; border:1.5px solid #e8ecf0; border-radius:10px; padding:14px; margin-bottom:20px; display:flex; justify-content:space-between; align-items:center; }
        .kasir-info .label { font-size:11px; color:#6b7280; }
        .kasir-info .value { font-size:14px; font-weight:700; color:#111827; }
        .setoran-box { background:linear-gradient(135deg,#1a56db,#0d3fa6); border-radius:10px; padding:18px; color:#fff; text-align:center; margin-bottom:20px; }
        .setoran-box .label { font-size:12px; opacity:0.85; }
        .setoran-box .value { font-size:28px; font-weight:800; margin-top:4px; }
        .setoran-box .note { font-size:11px; opacity:0.65; margin-top:4px; }
        .section-title { font-size:13px; font-weight:700; color:#111827; margin:18px 0 8px; padding-bottom:4px; border-bottom:2px solid #e5e7eb; display:flex; align-items:center; gap:6px; }
        table { width:100%; border-collapse:collapse; margin-bottom:14px; }
        th { font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.5px; color:#6b7280; padding:8px 10px; text-align:left; background:#f9fafb; border-bottom:1.5px solid #e5e7eb; }
        td { padding:7px 10px; font-size:11.5px; color:#374151; border-bottom:1px solid #f3f4f6; }
        .text-right { text-align:right; }
        .bold { font-weight:700; }
        .total-row { border-top:2px solid #111827; }
        .total-row td { font-weight:800; font-size:13px; color:#111827; padding-top:10px; }
        .report-footer { margin-top:28px; padding-top:16px; border-top:1px solid #e5e7eb; display:flex; justify-content:space-between; align-items:flex-start; }
        .report-footer .generated { font-size:10px; color:#9ca3af; }
        .signature-box { text-align:center; width:180px; }
        .signature-box .line { border-bottom:1px solid #374151; margin-top:50px; margin-bottom:6px; }
        .signature-box .name { font-size:11px; font-weight:600; }
        .signature-box .title { font-size:10px; color:#6b7280; }
        @media print { .no-print{display:none!important;} .container{padding:0;max-width:100%;} @page{margin:1.5cm;} }
        .print-actions { text-align:center; margin-bottom:20px; }
        .btn-print-action { display:inline-flex; align-items:center; gap:6px; padding:10px 20px; border:none; border-radius:9px; font-size:13px; font-weight:600; cursor:pointer; font-family:'DM Sans',sans-serif; text-decoration:none; margin:0 4px; }
        .btn-print { background:linear-gradient(135deg,#1a56db,#0d3fa6); color:#fff; box-shadow:0 3px 10px rgba(26,86,219,0.3); }
        .btn-close { background:#f3f4f6; color:#374151; border:1px solid #e5e7eb; }
    </style>
</head>
<body>
    <div class="container">
        <div class="print-actions no-print">
            <button class="btn-print-action btn-print" onclick="window.print()"><i class="fas fa-print"></i> Cetak</button>
            <button class="btn-print-action btn-close" onclick="window.close()">Tutup</button>
        </div>

        <div class="report-header">
            <h1>PT PORDJO STEELINDO PERKASA</h1>
            <p>Jl. Kaliabang, Bekasi</p>
            <h2>LAPORAN SETORAN KASIR</h2>
            <div class="periode-badge">
                <i class="fas fa-calendar-alt" style="margin-right:4px;"></i>
                <?= date('d M Y', strtotime($tgl_awal)) ?><?= ($tgl_awal !== $tgl_akhir) ? ' — ' . date('d M Y', strtotime($tgl_akhir)) : '' ?>
            </div>
        </div>

        <div class="kasir-info">
            <div><span class="label">Nama Kasir</span><div class="value"><?= htmlspecialchars($nama_kasir) ?></div></div>
            <div style="text-align:right;"><span class="label">Total Transaksi</span><div class="value"><?= $total_trx ?> trx</div></div>
        </div>

        <div class="setoran-box">
            <div class="label"><i class="fas fa-wallet" style="margin-right:4px;"></i>Total Setoran</div>
            <div class="value">Rp <?= number_format($total_omzet, 0, ',', '.') ?></div>
            <div class="note">Jumlah ini harus sesuai dengan uang fisik di laci kasir</div>
        </div>

        <?php if (!empty($top_produk)): ?>
        <div class="section-title"><i class="fas fa-box" style="color:#d97706;"></i> Ringkasan Produk Terjual</div>
        <table>
            <thead><tr><th>#</th><th>Produk</th><th class="text-right">Qty</th><th class="text-right">Pendapatan</th></tr></thead>
            <tbody>
                <?php foreach ($top_produk as $i => $tp): ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td class="bold"><?= htmlspecialchars($tp['nama_produk']) ?></td>
                    <td class="text-right bold"><?= $tp['total_qty'] ?> <?= $tp['satuan'] ?></td>
                    <td class="text-right bold">Rp <?= number_format($tp['total_pendapatan'], 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <div class="section-title"><i class="fas fa-list" style="color:#1a56db;"></i> Daftar Transaksi (<?= count($sales) ?>)</div>
        <table>
            <thead><tr><th>#</th><th>Kode</th><th>Waktu</th><th class="text-right">Total</th><th class="text-right">Bayar</th><th class="text-right">Kembali</th></tr></thead>
            <tbody>
                <?php if (!empty($sales)): ?>
                    <?php foreach ($sales as $i => $s): ?>
                    <tr>
                        <td><?= $i+1 ?></td>
                        <td class="bold" style="font-family:'Courier New',monospace; color:#1a56db; font-size:10.5px;"><?= htmlspecialchars($s['kode_transaksi']) ?></td>
                        <td><?= date('H:i', strtotime($s['tgl_jual'])) ?></td>
                        <td class="text-right bold">Rp <?= number_format($s['total_harga'], 0, ',', '.') ?></td>
                        <td class="text-right">Rp <?= number_format($s['bayar'] ?? 0, 0, ',', '.') ?></td>
                        <td class="text-right">Rp <?= number_format($s['kembalian'] ?? 0, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr class="total-row">
                        <td colspan="3" class="text-right">TOTAL</td>
                        <td class="text-right" style="color:#1a56db;">Rp <?= number_format($total_omzet, 0, ',', '.') ?></td>
                        <td colspan="2"></td>
                    </tr>
                <?php else: ?>
                    <tr><td colspan="6" style="text-align:center; padding:20px; color:#9ca3af;">Tidak ada transaksi</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="report-footer">
            <div class="generated">
                <p>Dicetak: <?= date('d M Y H:i:s') ?></p>
                <p>Sistem PT Pordjo Steelindo</p>
            </div>
            <div class="signature-box">
                <div class="line"></div>
                <div class="name"><?= htmlspecialchars($nama_kasir) ?></div>
                <div class="title">Kasir</div>
            </div>
        </div>
    </div>
</body>
</html>
