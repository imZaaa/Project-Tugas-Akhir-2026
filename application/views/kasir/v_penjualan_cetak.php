<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Nota Penjualan - <?= htmlspecialchars($header['kode_transaksi']) ?></title>
    <style>
        @page { size: A4; margin: 10mm; }
        body { font-family: "Arial", sans-serif; font-size: 11px; margin: 0; padding: 0; background: #525659; }
        * { box-sizing: border-box; }
        
        .page {
            max-width: 210mm;
            min-height: 297mm;
            padding: 15mm;
            margin: 10mm auto;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            position: relative;
        }

        .header { display: flex; justify-content: space-between; margin-bottom: 20px; }
        .header-left { display: flex; align-items: center; width: 60%; }
        .logo { width: 100px; height: auto; margin-right: 15px; }
        .company-info { font-family: "Arial", sans-serif; }
        .company-info h1 { font-size: 16px; margin: 0 0 2px 0; color: #000; font-weight: bold; }
        .company-info h2 { font-size: 18px; margin: 0 0 2px 0; color: #0056b3; font-weight: 800; letter-spacing: -0.5px; }
        .company-info .sub { font-size: 10px; font-style: italic; margin-bottom: 3px; }
        .company-info .desc { font-size: 10px; font-weight: bold; }
        .company-info .web { font-size: 12px; font-weight: bold; font-style: italic; margin-top: 2px; }

        .header-right { width: 35%; text-align: center; }
        .header-right h3 { font-size: 14px; margin: 0 0 5px 0; font-weight: bold; word-spacing: 2px; }
        .info-box { border: 1px dashed #000; padding: 5px; text-align: left; font-size: 10px; line-height: 1.4; display: grid; grid-template-columns: 1fr 1fr; gap: 5px; }
        .info-box div { border-right: 1px dashed #000; padding-right: 5px; }
        .info-box div:nth-child(even) { border-right: none; padding-right: 0; padding-left: 5px; }
        .info-box .label { margin-bottom: 2px; }
        .info-box .value { font-weight: normal; margin-bottom: 5px; }

        .kepada { margin-bottom: 15px; font-size: 11px; line-height: 1.4; }
        .kepada span { display: inline-block; width: 60px; }

        table.items { width: 100%; border-collapse: collapse; margin-bottom: 15px; font-size: 11px; }
        table.items th, table.items td { padding: 4px 2px; text-align: right; vertical-align: top; }
        table.items th { border-bottom: 1px solid #000; border-top: 1px solid #000; font-weight: normal; }
        table.items th:nth-child(1), table.items td:nth-child(1) { text-align: left; width: 15%; }
        table.items th:nth-child(2), table.items td:nth-child(2) { text-align: center; width: 5%; }
        table.items th:nth-child(3), table.items td:nth-child(3) { text-align: left; width: 45%; }
        table.items th:nth-child(4), table.items td:nth-child(4) { text-align: center; width: 10%; }
        table.items th:nth-child(5), table.items td:nth-child(5) { width: 10%; }
        table.items th:nth-child(6), table.items td:nth-child(6) { width: 15%; }

        .totals-container { display: flex; justify-content: flex-end; margin-bottom: 20px; font-size: 11px; }
        .totals { width: 40%; }
        .totals-row { display: flex; justify-content: space-between; padding: 3px 0; }
        .totals-row.grand { border-bottom: 2px solid #000; border-top: 1px solid #000; margin-top: 2px; font-weight: bold; }
        
        .terbilang { display: flex; font-size: 11px; margin-bottom: 30px; }
        .terbilang .label { width: 60px; }
        .terbilang .value { flex: 1; margin-left: 5px; }

        .signatures { display: flex; justify-content: space-between; text-align: center; font-size: 11px; margin-top: 30px; }
        .sign-box { width: 30%; }
        .sign-box p { margin: 0; }
        .sign-box.left { margin-left: 20px; }
        .sign-box.right { margin-right: 20px; }
        .sign-box .name { font-weight: bold; text-decoration: underline; }

        .footer { text-align: center; font-size: 10px; font-family: monospace; border-top: 1px dashed #000; margin-top: 20px; padding-top: 5px; position: absolute; bottom: 15mm; left: 15mm; right: 15mm; }

        @media print {
            body { background: #fff; margin: 0; }
            .page { box-shadow: none; margin: 0; padding: 10mm; min-height: auto; max-width: 100%; }
            .footer { position: fixed; bottom: 10mm; left: 10mm; right: 10mm; }
        }

        <?php 
            $grand_total = $header['total_harga'];
            $sub_total = $grand_total / 1.11;
            $ppn = $grand_total - $sub_total;

            function penyebut($nilai) {
                $nilai = abs($nilai);
                $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
                $temp = "";
                if ($nilai < 12) {
                    $temp = " ". $huruf[$nilai];
                } else if ($nilai <20) {
                    $temp = penyebut($nilai - 10). " belas";
                } else if ($nilai < 100) {
                    $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
                } else if ($nilai < 200) {
                    $temp = " seratus" . penyebut($nilai - 100);
                } else if ($nilai < 1000) {
                    $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
                } else if ($nilai < 2000) {
                    $temp = " seribu" . penyebut($nilai - 1000);
                } else if ($nilai < 1000000) {
                    $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
                } else if ($nilai < 1000000000) {
                    $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
                } else if ($nilai < 1000000000000) {
                    $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
                } else if ($nilai < 1000000000000000) {
                    $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
                }     
                return $temp;
            }
         
            function terbilang($nilai) {
                if($nilai<0) {
                    $hasil = "minus ". trim(penyebut($nilai));
                } else {
                    $hasil = trim(penyebut($nilai));
                }           
                return ucfirst($hasil) . " rupiah";
            }
        ?>
    </style>
</head>
<body>

    <div class="page">
        <!-- HEADER -->
        <div class="header">
            <div class="header-left">
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo" class="logo" onerror="this.style.display='none'">
                <div class="company-info">
                    <h1>Distributor Atap, Besi & Baja</h1>
                    <div class="sub">Atap Zincalume & Colorbond, Atap Lengkung, Atap Transparan<br>Wiremash, Bondek, Besi Beton, Unp, WF, Acesories DLL.</div>
                    <h2>PT PORDJO<br>STEELINDO PERKASA</h2>
                    <div class="desc">Distributor & Supply</div>
                    <div class="web">www.pordjosteelindoperkasa.com</div>
                </div>
            </div>
            <div class="header-right">
                <h3>KONFIRMASI PENJUALAN</h3>
                <div class="info-box">
                    <div>
                        <div class="label">Tanggal</div>
                        <div class="value"><?= date('d M Y', strtotime($header['tgl_jual'])) ?></div>
                        <div class="label">T.O.P</div>
                        <div class="value">C.O.D</div>
                    </div>
                    <div>
                        <div class="label">Nomor Kontrak</div>
                        <div class="value">SO.<?= htmlspecialchars($header['kode_transaksi']) ?></div>
                        <div class="label">PO No</div>
                        <div class="value">-</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- KEPADA -->
        <div class="kepada">
            <div><span>Kepada :</span> <strong><?= htmlspecialchars(!empty($header['nama_pelanggan']) ? $header['nama_pelanggan'] : 'UMUM') ?></strong></div>
            <div style="margin-left: 60px;">-</div>
        </div>

        <!-- ITEMS -->
        <table class="items">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Kts.</th>
                    <th>@Harga</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($detail as $d): ?>
                <tr>
                    <td><?= htmlspecialchars($d['kode_barang'] ?? 'BRG-'.str_pad($no, 3, '0', STR_PAD_LEFT)) ?></td>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($d['nama_produk'] ?? '-') ?></td>
                    <td><?= $d['qty'] ?></td>
                    <td><?= number_format($d['harga_jual'], 0, ',', '.') ?></td>
                    <td><?= number_format($d['subtotal'], 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- TOTALS & TERBILANG -->
        <div class="totals-container">
            <div class="totals">
                <div class="totals-row">
                    <span>Sub Total</span>
                    <span><?= number_format($sub_total, 0, ',', '.') ?></span>
                </div>
                <div class="totals-row">
                    <span>PPN (11%)</span>
                    <span><?= number_format($ppn, 0, ',', '.') ?></span>
                </div>
                <div class="totals-row grand">
                    <span>Total</span>
                    <span><?= number_format($grand_total, 0, ',', '.') ?></span>
                </div>
            </div>
        </div>

        <div class="terbilang">
            <div class="label">Terbilang :</div>
            <div class="value"><?= terbilang($grand_total) ?></div>
        </div>

        <!-- SIGNATURES -->
        <div class="signatures">
            <div class="sign-box left">
                <p>Disetujui,</p>
                <div style="height: 70px;"></div>
                <div class="name">Pihak Pertama</div>
            </div>
            <div class="sign-box right">
                <p style="margin-bottom: 5px;">PT. Pordjo Steelindo Perkasa</p>
                <div style="height: 70px; display: flex; justify-content: center; align-items: center;">
                    <img src="<?= base_url('assets/images/logo.png') ?>" style="max-height: 70px; opacity: 0.8;" alt="Stamp" onerror="this.style.display='none'">
                </div>
                <div class="name">Eki Erma Yunisa</div>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            Jl. KH. Yakub Ghani, Babelan, Kab Bekasi &nbsp;&nbsp; Phone : 021-888-940-48 &nbsp;&nbsp; Wa: 0812-5555-4867<br>
            email: pordjosteelindoperkasa@gmail.com
        </div>
    </div>

</body>
</html>
