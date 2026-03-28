<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Setoran — <?= htmlspecialchars($nama_kasir) ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'DM Sans', 'Segoe UI', sans-serif; background: #fff; color: #111827; font-size: 12px; -webkit-print-color-adjust: exact; print-color-adjust: exact; }

        .container { max-width: 600px; margin: 0 auto; padding: 24px; }

        /* ===== HEADER ===== */
        .report-header {
            display: flex;
            align-items: center;
            gap: 14px;
            border-bottom: 3px solid #1a56db;
            padding-bottom: 16px;
            margin-bottom: 20px;
        }
        .report-logo {
            height: 50px;
            flex-shrink: 0;
        }
        .report-header-text { flex: 1; }
        .report-header-text h1 {
            font-size: 15px;
            font-weight: 800;
            color: #0f2b5e;
            margin-bottom: 1px;
        }
        .report-header-text .tagline {
            font-size: 10px;
            color: #6b7280;
            font-weight: 500;
            margin-bottom: 6px;
        }
        .report-title-badge {
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
        .report-periode {
            text-align: right;
            flex-shrink: 0;
        }
        .periode-label {
            font-size: 10px;
            color: #9ca3af;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .periode-value {
            font-size: 12px;
            font-weight: 700;
            color: #111827;
            margin-top: 2px;
        }

        /* ===== KASIR INFO ===== */
        .kasir-info {
            background: #f8fafc;
            border: 1.5px solid #e8ecf0;
            border-radius: 10px;
            padding: 14px 18px;
            margin-bottom: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .kasir-info .label { font-size: 10px; color: #6b7280; text-transform: uppercase; font-weight: 600; letter-spacing: 0.3px; }
        .kasir-info .value { font-size: 14px; font-weight: 700; color: #111827; margin-top: 2px; }

        /* ===== SETORAN BOX ===== */
        .setoran-box {
            background: linear-gradient(135deg, #0f2b5e 0%, #1a56db 50%, #2563eb 100%);
            border-radius: 12px;
            padding: 20px;
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }
        .setoran-box .label { font-size: 12px; opacity: 0.8; font-weight: 500; }
        .setoran-box .value { font-size: 30px; font-weight: 800; margin-top: 4px; letter-spacing: -0.5px; }
        .setoran-box .note { font-size: 10.5px; opacity: 0.6; margin-top: 6px; }

        /* ===== SECTION ===== */
        .section-title {
            font-size: 13px;
            font-weight: 700;
            color: #111827;
            margin: 20px 0 10px;
            padding-bottom: 6px;
            border-bottom: 2px solid #e5e7eb;
            display: flex;
            align-items: center;
            gap: 7px;
        }
        .section-icon {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
        }

        /* ===== TABLE ===== */
        table { width: 100%; border-collapse: collapse; margin-bottom: 14px; }
        th {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6b7280;
            padding: 9px 10px;
            text-align: left;
            background: #f9fafb;
            border-bottom: 1.5px solid #e5e7eb;
        }
        td {
            padding: 8px 10px;
            font-size: 11.5px;
            color: #374151;
            border-bottom: 1px solid #f3f4f6;
        }
        .text-right { text-align: right; }
        .bold { font-weight: 700; }
        .total-row { border-top: 2px solid #111827; }
        .total-row td { font-weight: 800; font-size: 13px; color: #111827; padding-top: 10px; }

        /* ===== FOOTER ===== */
        .report-footer {
            margin-top: 30px;
            padding-top: 18px;
            border-top: 2px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .report-footer .generated {
            font-size: 10px;
            color: #9ca3af;
            line-height: 1.6;
        }
        .signature-box { text-align: center; width: 180px; }
        .signature-box .line { border-bottom: 1.5px solid #374151; margin-top: 54px; margin-bottom: 6px; }
        .signature-box .name { font-size: 11px; font-weight: 700; color: #111827; }
        .signature-box .title { font-size: 10px; color: #6b7280; font-weight: 500; }

        /* ===== PRINT ===== */
        @media print {
            .no-print { display: none !important; }
            .container { padding: 0; max-width: 100%; }
            @page { margin: 1.5cm; }
        }

        /* ===== PRINT BUTTONS ===== */
        .print-actions { text-align: center; margin-bottom: 20px; }
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
            margin: 0 4px;
        }
        .btn-print-action:hover { transform: translateY(-1px); }
        .btn-print { background: linear-gradient(135deg, #1a56db, #0d3fa6); color: #fff; box-shadow: 0 4px 14px rgba(26,86,219,0.3); }
        .btn-close { background: #f3f4f6; color: #374151; border: 1px solid #e5e7eb; }
    </style>
</head>
<body>
    <div class="container">

        <!-- PRINT ACTIONS -->
        <div class="print-actions no-print">
            <button class="btn-print-action btn-print" onclick="window.print()"><i class="fas fa-print"></i> Cetak</button>
            <button class="btn-print-action btn-close" onclick="window.close()"><i class="fas fa-times"></i> Tutup</button>
        </div>

        <!-- HEADER -->
        <div class="report-header">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo PT Pordjo" class="report-logo">
            <div class="report-header-text">
                <h1>PT PORDJO STEELINDO PERKASA</h1>
                <div class="tagline">Distributor &amp; Supply Baja</div>
                <div class="report-title-badge">
                    <i class="fas fa-wallet"></i> Laporan Setoran Kasir
                </div>
            </div>
            <div class="report-periode">
                <div class="periode-label">Periode</div>
                <div class="periode-value">
                    <?= date('d M Y', strtotime($tgl_awal)) ?><?= ($tgl_awal !== $tgl_akhir) ? '<br>s/d ' . date('d M Y', strtotime($tgl_akhir)) : '' ?>
                </div>
            </div>
        </div>

        <!-- KASIR INFO -->
        <div class="kasir-info">
            <div>
                <span class="label">Nama Kasir</span>
                <div class="value"><?= htmlspecialchars($nama_kasir) ?></div>
            </div>
            <div style="text-align:right;">
                <span class="label">Total Transaksi</span>
                <div class="value"><?= $total_trx ?> trx</div>
            </div>
        </div>

        <!-- SETORAN BOX -->
        <div class="setoran-box">
            <div class="label"><i class="fas fa-wallet" style="margin-right:4px;"></i>Total Setoran</div>
            <div class="value">Rp <?= number_format($total_omzet, 0, ',', '.') ?></div>
            <div class="note">Jumlah ini harus sesuai dengan uang fisik di laci kasir</div>
        </div>

        <!-- PRODUK TERJUAL -->
        <?php if (!empty($top_produk)): ?>
        <div class="section-title">
            <span class="section-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-box"></i></span>
            Ringkasan Produk Terjual
        </div>
        <table>
            <thead><tr><th style="width:30px;">#</th><th>Produk</th><th class="text-right">Qty</th><th class="text-right">Pendapatan</th></tr></thead>
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

        <!-- DAFTAR TRANSAKSI -->
        <div class="section-title">
            <span class="section-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-list"></i></span>
            Daftar Transaksi (<?= count($sales) ?>)
        </div>
        <table>
            <thead><tr><th style="width:30px;">#</th><th>Kode</th><th>Waktu</th><th class="text-right">Total</th><th class="text-right">Bayar</th><th class="text-right">Kembali</th></tr></thead>
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

        <!-- FOOTER -->
        <div class="report-footer">
            <div class="generated">
                <p>Dicetak: <?= date('d M Y H:i:s') ?></p>
                <p>Sistem Manajemen Barang — PT Pordjo Steelindo Perkasa</p>
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
