<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Penjualan — <?= date('d M Y', strtotime($tgl_awal)) ?> s/d <?= date('d M Y', strtotime($tgl_akhir)) ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'DM Sans', 'Segoe UI', sans-serif; background: #fff; color: #111827; font-size: 12px; -webkit-print-color-adjust: exact; print-color-adjust: exact; }

        .container { max-width: 800px; margin: 0 auto; padding: 24px; }

        /* ===== HEADER ===== */
        .report-header {
            display: flex;
            align-items: center;
            gap: 16px;
            border-bottom: 3px solid #1a56db;
            padding-bottom: 18px;
            margin-bottom: 22px;
        }
        .report-logo {
            height: 56px;
            flex-shrink: 0;
        }
        .report-header-text { flex: 1; }
        .report-header-text h1 {
            font-size: 17px;
            font-weight: 800;
            color: #0f2b5e;
            margin-bottom: 1px;
            letter-spacing: 0.3px;
        }
        .report-header-text .tagline {
            font-size: 10.5px;
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
            padding: 5px 12px;
            font-size: 11px;
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

        /* ===== STATS ===== */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 22px;
        }
        .stat-box {
            border: 1.5px solid #e5e7eb;
            border-radius: 10px;
            padding: 14px;
            text-align: center;
            background: #fafbfc;
        }
        .stat-box .label {
            font-size: 10px;
            color: #6b7280;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .stat-box .value {
            font-size: 20px;
            font-weight: 800;
            color: #111827;
            margin-top: 4px;
        }
        .stat-box .value.blue { color: #1a56db; }

        /* ===== SECTION ===== */
        .section-title {
            font-size: 13px;
            font-weight: 700;
            color: #111827;
            margin: 22px 0 10px;
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
        table { width: 100%; border-collapse: collapse; margin-bottom: 16px; }
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
        tr:last-child td { border-bottom: none; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .bold { font-weight: 700; }
        .total-row { border-top: 2px solid #111827; }
        .total-row td { font-weight: 800; font-size: 13px; color: #111827; padding-top: 10px; }

        /* ===== FOOTER ===== */
        .report-footer {
            margin-top: 32px;
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
        .signature-box { text-align: center; width: 200px; }
        .signature-box .line { border-bottom: 1.5px solid #374151; margin-top: 54px; margin-bottom: 6px; }
        .signature-box .name { font-size: 11px; font-weight: 700; color: #111827; }
        .signature-box .title { font-size: 10px; color: #6b7280; font-weight: 500; }

        /* ===== PRINT ===== */
        @media print {
            body { background: #fff; }
            .container { padding: 0; max-width: 100%; }
            .no-print { display: none !important; }
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
            <button class="btn-print-action btn-print" onclick="window.print()"><i class="fas fa-print"></i> Cetak Laporan</button>
            <button class="btn-print-action btn-close" onclick="window.close()"><i class="fas fa-times"></i> Tutup</button>
        </div>

        <!-- HEADER -->
        <div class="report-header">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo PT Pordjo" class="report-logo">
            <div class="report-header-text">
                <h1>PT PORDJO STEELINDO PERKASA</h1>
                <div class="tagline">Distributor &amp; Supply Baja</div>
                <div class="report-title-badge">
                    <i class="fas fa-chart-bar"></i> Laporan Penjualan
                </div>
            </div>
            <div class="report-periode">
                <div class="periode-label">Periode Laporan</div>
                <div class="periode-value">
                    <?= date('d M Y', strtotime($tgl_awal)) ?><br>
                    s/d <?= date('d M Y', strtotime($tgl_akhir)) ?>
                </div>
            </div>
        </div>

        <!-- STATS -->
        <div class="stats-row">
            <div class="stat-box">
                <div class="label">Total Transaksi</div>
                <div class="value"><?= $total_trx ?></div>
            </div>
            <div class="stat-box">
                <div class="label">Total Omzet</div>
                <div class="value blue" style="font-size:15px;">Rp <?= number_format($total_omzet, 0, ',', '.') ?></div>
            </div>
            <div class="stat-box">
                <div class="label">Rata-rata / Trx</div>
                <div class="value" style="font-size:15px;">Rp <?= number_format(($total_trx > 0 ? $total_omzet / $total_trx : 0), 0, ',', '.') ?></div>
            </div>
        </div>

        <!-- TOP PRODUK -->
        <?php if (!empty($top_produk)): ?>
        <div class="section-title">
            <span class="section-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-trophy"></i></span>
            Produk Terlaris
        </div>
        <table>
            <thead>
                <tr>
                    <th class="text-center" style="width:35px;">#</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th class="text-right">Qty Terjual</th>
                    <th class="text-right">Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($top_produk as $i => $tp): ?>
                <tr>
                    <td class="text-center bold"><?= $i + 1 ?></td>
                    <td class="bold"><?= htmlspecialchars($tp['nama_produk']) ?></td>
                    <td><?= htmlspecialchars($tp['nama_kategori'] ?? '-') ?></td>
                    <td class="text-right bold"><?= $tp['total_qty'] ?> <?= $tp['satuan'] ?></td>
                    <td class="text-right bold">Rp <?= number_format($tp['total_pendapatan'], 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <!-- PER KASIR -->
        <?php if (!empty($per_kasir)): ?>
        <div class="section-title">
            <span class="section-icon" style="background:#fdf4ff; color:#9333ea;"><i class="fas fa-user-tie"></i></span>
            Kinerja per Kasir
        </div>
        <table>
            <thead>
                <tr>
                    <th>Nama Kasir</th>
                    <th class="text-right">Jumlah Trx</th>
                    <th class="text-right">Total Omzet</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($per_kasir as $pk): ?>
                <tr>
                    <td class="bold"><?= htmlspecialchars($pk['nama_kasir'] ?? '-') ?></td>
                    <td class="text-right"><?= $pk['jumlah_trx'] ?></td>
                    <td class="text-right bold">Rp <?= number_format($pk['total_omzet'], 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <!-- RIWAYAT TRANSAKSI -->
        <div class="section-title">
            <span class="section-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-list"></i></span>
            Riwayat Transaksi (<?= count($sales) ?>)
        </div>
        <table>
            <thead>
                <tr>
                    <th class="text-center" style="width:35px;">#</th>
                    <th>Kode Transaksi</th>
                    <th>Tanggal</th>
                    <th>Kasir</th>
                    <th class="text-right">Total Harga</th>
                    <th class="text-right">Bayar</th>
                    <th class="text-right">Kembalian</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sales)): ?>
                    <?php foreach ($sales as $i => $s): ?>
                    <tr>
                        <td class="text-center"><?= $i + 1 ?></td>
                        <td class="bold" style="font-family:'Courier New',monospace; color:#1a56db;"><?= htmlspecialchars($s['kode_transaksi']) ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($s['tgl_jual'])) ?></td>
                        <td><?= htmlspecialchars($s['nama_kasir'] ?? '-') ?></td>
                        <td class="text-right bold">Rp <?= number_format($s['total_harga'], 0, ',', '.') ?></td>
                        <td class="text-right">Rp <?= number_format($s['bayar'] ?? 0, 0, ',', '.') ?></td>
                        <td class="text-right">Rp <?= number_format($s['kembalian'] ?? 0, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr class="total-row">
                        <td colspan="4" class="text-right">TOTAL OMZET</td>
                        <td class="text-right" style="color:#1a56db;">Rp <?= number_format($total_omzet, 0, ',', '.') ?></td>
                        <td colspan="2"></td>
                    </tr>
                <?php else: ?>
                    <tr><td colspan="7" class="text-center" style="padding:24px; color:#9ca3af;">Tidak ada transaksi di periode ini</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- FOOTER -->
        <div class="report-footer">
            <div class="generated">
                <p>Dicetak pada: <?= date('d M Y H:i:s') ?></p>
                <p>Sistem Manajemen Barang — PT Pordjo Steelindo Perkasa</p>
            </div>
            <div class="signature-box">
                <div class="line"></div>
                <div class="name">Admin</div>
                <div class="title">Penanggungjawab</div>
            </div>
        </div>

    </div>

</body>
</html>
