<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Setoran — <?= htmlspecialchars($nama_kasir) ?></title>
    <style>
        @page { size: A4; margin: 10mm; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: "Arial", sans-serif; font-size: 11px; background: #525659; -webkit-print-color-adjust: exact; print-color-adjust: exact; }

        .page {
            max-width: 210mm;
            min-height: 297mm;
            padding: 15mm;
            margin: 10mm auto;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            position: relative;
        }

        /* ===== KOP SURAT ===== */
        .header { display: flex; justify-content: space-between; margin-bottom: 20px; }
        .header-left { display: flex; align-items: center; width: 60%; }
        .logo { width: 100px; height: auto; margin-right: 15px; }
        .company-info h1 { font-size: 16px; margin: 0 0 2px; color: #000; font-weight: bold; }
        .company-info h2 { font-size: 18px; margin: 0 0 2px; color: #0056b3; font-weight: 800; letter-spacing: -0.5px; }
        .company-info .sub { font-size: 10px; font-style: italic; margin-bottom: 3px; }
        .company-info .desc { font-size: 10px; font-weight: bold; }
        .company-info .web { font-size: 12px; font-weight: bold; font-style: italic; margin-top: 2px; }

        .header-right { width: 35%; text-align: center; }
        .header-right h3 { font-size: 14px; margin: 0 0 5px; font-weight: bold; word-spacing: 2px; }
        .info-box {
            border: 1px dashed #000;
            padding: 5px;
            text-align: left;
            font-size: 10px;
            line-height: 1.4;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5px;
        }
        .info-box div { border-right: 1px dashed #000; padding-right: 5px; }
        .info-box div:nth-child(even) { border-right: none; padding-right: 0; padding-left: 5px; }
        .info-box .label { margin-bottom: 2px; font-weight: bold; }
        .info-box .value { font-weight: normal; margin-bottom: 5px; }

        /* ===== GARIS ===== */
        .divider { border-top: 2px solid #000; margin: 14px 0 12px; }

        /* ===== KASIR INFO ===== */
        .kasir-info {
            border: 1px dashed #000;
            border-radius: 4px;
            padding: 10px 14px;
            margin-bottom: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 11px;
        }
        .kasir-info .ki-label { font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; color: #555; }
        .kasir-info .ki-value { font-size: 14px; font-weight: 800; color: #000; margin-top: 3px; }

        /* ===== SETORAN BOX ===== */
        .setoran-box {
            border: 2px solid #000;
            border-radius: 4px;
            padding: 16px;
            text-align: center;
            margin-bottom: 16px;
            background: #f9f9f9;
        }
        .setoran-box .s-label { font-size: 10px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.5px; color: #555; }
        .setoran-box .s-value { font-size: 28px; font-weight: 800; color: #0056b3; margin-top: 4px; letter-spacing: -0.5px; }
        .setoran-box .s-note { font-size: 9.5px; color: #777; margin-top: 6px; font-style: italic; }

        /* ===== SECTION ===== */
        .section-title {
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #000;
            margin: 16px 0 6px;
            padding-bottom: 4px;
            border-bottom: 1px solid #000;
        }

        /* ===== TABLE ===== */
        table { width: 100%; border-collapse: collapse; margin-bottom: 12px; font-size: 10.5px; }
        th { font-size: 10px; font-weight: bold; text-align: left; padding: 5px 6px; background: #f0f0f0; border-top: 1px solid #000; border-bottom: 1px solid #000; }
        td { padding: 4px 6px; border-bottom: 1px dashed #ccc; vertical-align: top; }
        tr:last-child td { border-bottom: none; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .bold { font-weight: bold; }
        .total-row td { font-weight: bold; font-size: 11px; border-top: 1px solid #000; border-bottom: 2px solid #000; padding-top: 5px; padding-bottom: 5px; }

        /* ===== TANDA TANGAN ===== */
        .signatures {
            display: flex;
            justify-content: space-between;
            text-align: center;
            font-size: 11px;
            margin-top: 36px;
        }
        .sign-box { width: 28%; }
        .sign-box p { margin: 0; }
        .sign-box .sign-name { font-weight: bold; text-decoration: underline; margin-top: 4px; }
        .sign-space { height: 60px; }

        .footer-note {
            text-align: center;
            font-size: 9px;
            font-family: monospace;
            border-top: 1px dashed #000;
            margin-top: 20px;
            padding-top: 5px;
            position: absolute;
            bottom: 15mm;
            left: 15mm;
            right: 15mm;
        }

        /* ===== PRINT BUTTONS ===== */
        .print-actions { text-align: center; margin-bottom: 16px; }
        .btn-print-action {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 10px 22px; border: none; border-radius: 8px;
            font-size: 13px; font-weight: 600; cursor: pointer;
            font-family: Arial, sans-serif; margin: 0 4px;
        }
        .btn-print { background: #0056b3; color: #fff; }
        .btn-close  { background: #f3f4f6; color: #374151; border: 1px solid #e5e7eb; }

        @media print {
            body { background: #fff; margin: 0; }
            .page { box-shadow: none; margin: 0; padding: 10mm; min-height: auto; max-width: 100%; }
            .no-print { display: none !important; }
            .footer-note { position: fixed; bottom: 10mm; left: 10mm; right: 10mm; }
        }
    </style>
</head>
<body>

    <!-- PRINT BUTTONS (tidak tercetak) -->
    <div class="print-actions no-print">
        <button class="btn-print-action btn-print" onclick="window.print()">&#x1F5A8; Cetak Laporan</button>
        <button class="btn-print-action btn-close" onclick="window.close()">&#x2715; Tutup</button>
    </div>

    <div class="page">

        <!-- KOP SURAT -->
        <div class="header">
            <div class="header-left">
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo" class="logo" onerror="this.style.display='none'">
                <div class="company-info">
                    <h1>Distributor Atap, Besi &amp; Baja</h1>
                    <div class="sub">Atap Zincalume &amp; Colorbond, Atap Lengkung, Atap Transparan<br>Wiremash, Bondek, Besi Beton, Unp, WF, Acesories DLL.</div>
                    <h2>PT PORDJO<br>STEELINDO PERKASA</h2>
                    <div class="desc">Distributor &amp; Supply</div>
                    <div class="web">www.pordjosteelindoperkasa.com</div>
                </div>
            </div>
            <div class="header-right">
                <h3>LAPORAN SETORAN KASIR</h3>
                <div class="info-box">
                    <div>
                        <div class="label">Periode</div>
                        <div class="value"><?= date('d M Y', strtotime($tgl_awal)) ?></div>
                        <div class="label">s/d</div>
                        <div class="value"><?= date('d M Y', strtotime($tgl_akhir)) ?></div>
                    </div>
                    <div>
                        <div class="label">Dicetak</div>
                        <div class="value"><?= date('d M Y') ?></div>
                        <div class="label">Kasir</div>
                        <div class="value"><?= htmlspecialchars($nama_kasir) ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="divider"></div>

        <!-- INFO KASIR -->
        <div class="kasir-info">
            <div>
                <div class="ki-label">Nama Kasir</div>
                <div class="ki-value"><?= htmlspecialchars($nama_kasir) ?></div>
            </div>
            <div style="text-align:right;">
                <div class="ki-label">Total Transaksi</div>
                <div class="ki-value"><?= $total_trx ?> trx</div>
            </div>
        </div>

        <!-- SETORAN BOX -->
        <div class="setoran-box">
            <div class="s-label">Total Setoran</div>
            <div class="s-value">Rp <?= number_format($total_omzet, 0, ',', '.') ?></div>
            <div class="s-note">Jumlah ini harus sesuai dengan uang fisik di laci kasir</div>
        </div>

        <!-- RINGKASAN PRODUK -->
        <?php if (!empty($top_produk)): ?>
        <div class="section-title">&#x1F4E6; Ringkasan Produk Terjual</div>
        <table>
            <thead>
                <tr>
                    <th style="width:28px;">#</th>
                    <th>Produk</th>
                    <th class="text-right">Qty</th>
                    <th class="text-right">Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($top_produk as $i => $tp): ?>
                <tr>
                    <td class="text-center"><?= $i + 1 ?></td>
                    <td class="bold"><?= htmlspecialchars($tp['nama_produk']) ?></td>
                    <td class="text-right bold"><?= $tp['total_qty'] ?> <?= $tp['satuan'] ?></td>
                    <td class="text-right bold">Rp <?= number_format($tp['total_pendapatan'], 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        <!-- DAFTAR TRANSAKSI -->
        <div class="section-title">&#x1F4CB; Daftar Transaksi (<?= count($sales) ?>)</div>
        <table>
            <thead>
                <tr>
                    <th style="width:28px;">#</th>
                    <th>Kode Transaksi</th>
                    <th>Waktu</th>
                    <th class="text-right">Total</th>
                    <th class="text-right">Bayar</th>
                    <th class="text-right">Kembali</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sales)): ?>
                    <?php foreach ($sales as $i => $s): ?>
                    <tr>
                        <td class="text-center"><?= $i + 1 ?></td>
                        <td class="bold" style="font-family:'Courier New',monospace; color:#0056b3; font-size:10px;"><?= htmlspecialchars($s['kode_transaksi']) ?></td>
                        <td><?= date('d/m H:i', strtotime($s['tgl_jual'])) ?></td>
                        <td class="text-right bold">Rp <?= number_format($s['total_harga'], 0, ',', '.') ?></td>
                        <td class="text-right">Rp <?= number_format($s['bayar'] ?? 0, 0, ',', '.') ?></td>
                        <td class="text-right">Rp <?= number_format($s['kembalian'] ?? 0, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr class="total-row">
                        <td colspan="3" class="text-right">TOTAL SETORAN</td>
                        <td class="text-right" style="color:#0056b3;">Rp <?= number_format($total_omzet, 0, ',', '.') ?></td>
                        <td colspan="2"></td>
                    </tr>
                <?php else: ?>
                    <tr><td colspan="6" class="text-center" style="padding:20px; color:#9ca3af;">Tidak ada transaksi</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- TANDA TANGAN -->
        <div class="signatures">
            <div class="sign-box">
                <p>Mengetahui,</p>
                <div class="sign-space"></div>
                <div class="sign-name">Pimpinan</div>
                <div style="font-size:10px; color:#555;">PT. Pordjo Steelindo Perkasa</div>
            </div>
            <div class="sign-box">
                <p>Bekasi, <?= date('d M Y') ?></p>
                <div class="sign-space"></div>
                <div class="sign-name"><?= htmlspecialchars($nama_kasir) ?></div>
                <div style="font-size:10px; color:#555;">Kasir</div>
            </div>
        </div>

        <!-- FOOTER NOTE -->
        <div class="footer-note">
            Jl. KH. Yakub Ghani, Babelan, Kab Bekasi &nbsp;&nbsp; Phone : 021-888-940-48 &nbsp;&nbsp; Wa: 0812-5555-4867<br>
            email: pordjosteelindoperkasa@gmail.com
        </div>

    </div>

</body>
</html>
