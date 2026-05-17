<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Data Produk <?= !empty($filter_kategori) ? ' - ' . htmlspecialchars($filter_kategori) : '' ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap">
    <style>
        @page { size: A4; margin: 10mm; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'DM Sans', 'Segoe UI', "Arial", sans-serif; font-size: 11.5px; background: #525659; -webkit-print-color-adjust: exact; print-color-adjust: exact; }

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
        .header-right h3 { font-size: 14px; margin: 0 0 5px; font-weight: bold; word-spacing: 2px; text-transform: uppercase; }
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

        /* ===== GARIS PEMISAH ===== */
        .divider { border-top: 2px solid #000; margin: 14px 0 10px; }

        /* ===== TABLE ===== */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; margin-bottom: 20px; font-size: 11px; }
        th { font-size: 10px; font-weight: 700; text-align: left; padding: 10px 8px; background: #f8fafc; border-top: 1px solid #cbd5e1; border-bottom: 2px solid #cbd5e1; color: #475569; text-transform: uppercase; letter-spacing: 0.5px; }
        td { padding: 9px 8px; border-bottom: 1px solid #e2e8f0; vertical-align: middle; color: #1e293b; }
        tr:last-child td { border-bottom: 2px solid #cbd5e1; }
        tr:nth-child(even) td { background: #fafaf9; }
        
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .bold { font-weight: 700; color: #0f172a; }
        .kode { font-family: 'Courier New', monospace; font-weight: bold; color: #1a56db; font-size: 11px; }
        .stok-warning { color: #d97706; font-weight: bold; }
        .stok-habis { color: #dc2626; font-weight: bold; }

        /* ===== FOOTER / TANDA TANGAN ===== */
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
            margin-top: 50px;
            padding-top: 5px;
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
                <h3>Katalog & Stok Produk</h3>
                <div class="info-box">
                    <div>
                        <div class="label">Kategori</div>
                        <div class="value"><?= !empty($filter_kategori) ? htmlspecialchars($filter_kategori) : 'Semua Kategori' ?></div>
                        <div class="label">Total Item</div>
                        <div class="value"><?= count($produk) ?> Produk</div>
                    </div>
                    <div>
                        <div class="label">Dicetak</div>
                        <div class="value"><?= date('d M Y') ?></div>
                        <div class="label">Oleh</div>
                        <div class="value">Admin</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="divider"></div>

        <!-- MAIN TABLE -->
        <table>
            <thead>
                <tr>
                    <th class="text-center" style="width: 30px;">No</th>
                    <th style="width: 80px;">Kode</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th class="text-right">Harga Beli (Rp)</th>
                    <th class="text-right">Harga Jual (Rp)</th>
                    <th class="text-center">Stok</th>
                    <th>Satuan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($produk)): ?>
                    <?php 
                    $no = 1;
                    $total_aset = 0;
                    foreach ($produk as $p): 
                        $stok = (int) $p['stok'];
                        $total_aset += ($stok * (float)$p['harga_beli']);
                        
                        $stok_class = '';
                        if ($stok === 0) $stok_class = 'stok-habis';
                        elseif ($stok <= 10) $stok_class = 'stok-warning';
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="kode"><?= htmlspecialchars($p['kode_produk'] ?? '-') ?></td>
                        <td class="bold"><?= htmlspecialchars($p['nama_produk']) ?></td>
                        <td><?= htmlspecialchars($p['nama_kategori'] ?? '-') ?></td>
                        <td class="text-right"><?= number_format($p['harga_beli'], 0, ',', '.') ?></td>
                        <td class="text-right bold">
                            <?php if ($p['harga_jual'] > 0): ?>
                                <?= number_format($p['harga_jual'], 0, ',', '.') ?>
                            <?php else: ?>
                                <span style="color:#9ca3af; font-weight:normal; font-style:italic;">Belum Diatur</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center <?= $stok_class ?>"><?= $stok ?></td>
                        <td><?= htmlspecialchars($p['satuan']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="8" class="text-center" style="padding:20px; color:#9ca3af;">Data produk kosong.</td></tr>
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
                <div class="sign-name">Admin Gudang</div>
                <div style="font-size:10px; color:#555;">Sistem Terpadu</div>
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
