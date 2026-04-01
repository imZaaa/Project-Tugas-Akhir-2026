<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif; overflow-x:hidden;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');

    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path) {
        font-family: 'DM Sans', 'Segoe UI', sans-serif;
    }

    .content-wrapper {
        overflow-x: hidden;
        box-sizing: border-box;
    }

    /* Grid children tidak boleh overflow */
    .kasir-main > div,
    .kasir-right > div,
    .kasir-stats-grid > div {
        min-width: 0;
    }

    .kasir-cards-section,
    .kasir-main {
        box-sizing: border-box;
        max-width: 100%;
    }

    /* ===== CARDS ===== */
    .kasir-cards-section {
        padding: 0 24px;
        margin-top: 16px;
    }

    .kasir-stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .k-stat-card {
        background: #ffffff;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.07);
        border: 1px solid rgba(0,0,0,0.04);
        display: flex;
        flex-direction: column;
        gap: 12px;
        transition: transform 0.2s, box-shadow 0.2s;
        animation: fadeSlideUp 0.4s ease both;
    }

    .k-stat-card:nth-child(1) { animation-delay: 0.05s; }
    .k-stat-card:nth-child(2) { animation-delay: 0.10s; }
    .k-stat-card:nth-child(3) { animation-delay: 0.15s; }

    .k-stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 28px rgba(0,0,0,0.1);
    }

    .k-stat-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
    }

    .k-stat-icon {
        width: 44px;
        height: 44px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .k-stat-value {
        font-size: 28px;
        font-weight: 800;
        color: #111827;
        letter-spacing: -1px;
        line-height: 1;
    }

    .k-stat-value.money {
        font-size: 20px;
        letter-spacing: -0.5px;
    }

    .k-stat-label {
        font-size: 12px;
        color: #9ca3af;
        font-weight: 500;
        margin-top: 3px;
    }

    .k-badge {
        font-size: 10.5px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 20px;
    }

    /* ===== MAIN LAYOUT ===== */
    .kasir-main {
        padding: 20px 24px 28px;
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 20px;
    }

    /* ===== CARD BASE ===== */
    .k-card {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #e8ecf0;
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        overflow: hidden;
    }

    .k-card-header {
        padding: 16px 20px;
        border-bottom: 1px solid #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .k-card-header h3 {
        font-size: 14px;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }

    .k-card-header p {
        font-size: 12px;
        color: #9ca3af;
        margin: 0;
    }

    .btn-k-action {
        font-size: 12px;
        font-weight: 600;
        color: #1a56db;
        background: #eff6ff;
        border: none;
        padding: 5px 12px;
        border-radius: 6px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: background 0.15s;
    }

    .btn-k-action:hover {
        background: #dbeafe;
        color: #1a56db;
        text-decoration: none;
    }

    /* ===== NEW TRANSACTION BUTTON (hero) ===== */
    .btn-new-transaction {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        margin: 16px;
        padding: 16px;
        background: linear-gradient(135deg, #1a56db, #0d3fa6);
        color: white;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 700;
        text-decoration: none;
        transition: opacity 0.2s, transform 0.2s;
        box-shadow: 0 4px 14px rgba(26,86,219,0.3);
        box-sizing: border-box;
    }

    .btn-new-transaction:hover {
        opacity: 0.93;
        transform: translateY(-1px);
        color: white;
        text-decoration: none;
    }

    .btn-new-transaction i {
        font-size: 20px;
    }

    /* ===== TABLE ===== */
    .k-table {
        width: 100%;
        border-collapse: collapse;
    }

    .k-table th {
        font-size: 10.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #9ca3af;
        padding: 10px 20px;
        text-align: left;
        background: #fafafa;
        border-bottom: 1px solid #f1f3f5;
    }

    .k-table td {
        padding: 12px 20px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #f7f8f9;
        vertical-align: middle;
    }

    .k-table tr:last-child td { border-bottom: none; }
    .k-table tr:hover td { background: #f0f4ff; }

    .trx-code {
        font-size: 12px;
        font-weight: 700;
        color: #1a56db;
        font-family: 'Courier New', monospace;
    }

    .trx-amount {
        font-weight: 700;
        color: #111827;
    }

    .k-badge-status {
        display: inline-block;
        font-size: 11px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
        background: #eff6ff;
        color: #1a56db;
    }

    /* ===== RIGHT COLUMN ===== */
    .kasir-right { display: flex; flex-direction: column; gap: 20px; }

    /* ===== PRODUK SEARCH ===== */
    .search-produk-wrap {
        padding: 14px 20px 16px;
    }

    .search-input-box {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f5f7fa;
        border: 1.5px solid #e8ecf0;
        border-radius: 9px;
        padding: 8px 14px;
        transition: border-color 0.15s;
    }

    .search-input-box:focus-within {
        border-color: #1a56db;
    }

    .search-input-box i {
        color: #9ca3af;
        font-size: 13px;
    }

    .search-input-box input {
        border: none;
        background: transparent;
        font-size: 13px;
        color: #374151;
        width: 100%;
        outline: none;
        font-family: 'DM Sans', sans-serif;
    }

    .search-input-box input::placeholder { color: #d1d5db; }

    /* ===== ITEM LIST (stok cek) ===== */
    .stock-check-list { padding: 0; }

    .stock-check-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 11px 20px;
        border-bottom: 1px solid #f7f8f9;
        transition: background 0.1s;
    }

    .stock-check-item:last-child { border-bottom: none; }
    .stock-check-item:hover { background: #f0f4ff; }

    .sci-icon {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        background: #eff6ff;
        color: #1a56db;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        flex-shrink: 0;
    }

    .sci-name {
        flex: 1;
        font-size: 12.5px;
        font-weight: 600;
        color: #374151;
        display: block;
    }

    .sci-cat {
        font-size: 11px;
        color: #9ca3af;
        font-weight: 400;
    }

    .sci-stok {
        font-size: 12.5px;
        font-weight: 700;
        text-align: right;
    }

    .sci-stok.ok   { color: #1a56db; }
    .sci-stok.warn { color: #d97706; }
    .sci-stok.low  { color: #dc2626; }

    /* ===== ANIMATION ===== */
    @keyframes fadeSlideUp {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1000px) {
        .kasir-stats-grid { grid-template-columns: repeat(2, 1fr); }
        .kasir-main { grid-template-columns: 1fr; }
    }

    @media (max-width: 600px) {
        .kasir-stats-grid { grid-template-columns: 1fr; }
        .kasir-cards-section { padding: 0 14px; }
        .kasir-main { padding: 16px 14px 24px; }
    }
</style>

    <!-- ===== PAGE HEADER ===== -->
    <div style="padding: 24px 28px 0; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:12px;">
        <div>
            <h1 style="font-size:20px; font-weight:700; color:#111827; margin:0 0 3px; letter-spacing:-0.3px;">Dashboard Kasir</h1>
            <p style="font-size:12.5px; color:#9ca3af; margin:0;">Halo, <?= $this->session->userdata('nama') ?: 'Kasir' ?>. Selamat bertugas melayani transaksi hari ini.</p>
        </div>
        <div style="display:flex; align-items:center; gap:10px;">
            <div style="display:inline-flex; align-items:center; gap:7px; background:#eff6ff; border:1px solid #bfdbfe; border-radius:8px; padding:7px 14px; color:#1a56db; font-size:13px; font-weight:600;">
                <i class="far fa-clock"></i>
                <span id="kasirClock">--:--:--</span>
            </div>
            <div style="background:#f3f4f6; border:1px solid #e5e7eb; border-radius:8px; padding:7px 14px; color:#6b7280; font-size:12.5px; font-weight:500;">
                <i class="far fa-calendar-alt" style="margin-right:5px;"></i><?= date('d F Y') ?>
            </div>
        </div>
    </div>

    <!-- ===== STAT CARDS ===== -->
    <div class="kasir-cards-section">
        <div class="kasir-stats-grid">

            <div class="k-stat-card">
                <div class="k-stat-top">
                    <div class="k-stat-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-receipt"></i></div>
                    <span class="k-badge" style="background:#eff6ff; color:#1a56db;">Hari Ini</span>
                </div>
                <div>
                    <div class="k-stat-value"><?= $my_trx_hari ?? '0' ?></div>
                    <div class="k-stat-label">Transaksi Saya Hari Ini</div>
                </div>
            </div>

            <div class="k-stat-card">
                <div class="k-stat-top">
                    <div class="k-stat-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-money-bill-wave"></i></div>
                    <span class="k-badge" style="background:#eff6ff; color:#1a56db;">Total</span>
                </div>
                <div>
                    <div class="k-stat-value money">Rp <?= number_format($my_omzet_hari ?? 0, 0, ',', '.') ?></div>
                    <div class="k-stat-label">Omzet Saya Hari Ini</div>
                </div>
            </div>

            <div class="k-stat-card">
                <div class="k-stat-top">
                    <div class="k-stat-icon" style="background:#fdf4ff; color:#9333ea;"><i class="fas fa-boxes"></i></div>
                    <span class="k-badge" style="background:#f3f4f6; color:#6b7280;">Stok</span>
                </div>
                <div>
                    <div class="k-stat-value"><?= $total_produk_tersedia ?? '0' ?></div>
                    <div class="k-stat-label">Jenis Produk Tersedia</div>
                </div>
            </div>

        </div>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="kasir-main">

        <!-- LEFT -->
        <div style="display:flex; flex-direction:column; gap:20px;">

            <!-- Hero Action Button -->
            <div class="k-card" style="overflow:visible;">
                <div class="k-card-header">
                    <div>
                        <h3>Transaksi Penjualan</h3>
                        <p>Buat transaksi baru atau lihat riwayat</p>
                    </div>
                </div>
                <a href="<?= site_url('kasir/penjualan/create') ?>" class="btn-new-transaction">
                    <i class="fas fa-plus-circle"></i>
                    <span>Buat Transaksi Baru</span>
                </a>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px; padding:0 16px 16px;">
                    <a href="<?= site_url('kasir/penjualan') ?>"
                       style="display:flex;align-items:center;gap:8px;padding:10px 14px;background:#f5f7fa;border-radius:9px;text-decoration:none;color:#374151;font-size:12.5px;font-weight:600;transition:background 0.15s;"
                       onmouseover="this.style.background='#e8ecf0'" onmouseout="this.style.background='#f5f7fa'">
                        <i class="fas fa-history" style="color:#6b7280;"></i> Riwayat Transaksi
                    </a>
                    <a href="<?= site_url('kasir/penjualan?filter=today') ?>"
                       style="display:flex;align-items:center;gap:8px;padding:10px 14px;background:#eff6ff;border-radius:9px;text-decoration:none;color:#1a56db;font-size:12.5px;font-weight:600;transition:background 0.15s;"
                       onmouseover="this.style.background='#dbeafe'" onmouseout="this.style.background='#eff6ff'">
                        <i class="fas fa-calendar-day"></i> Transaksi Hari Ini
                    </a>
                </div>
            </div>

            <!-- Tabel Transaksi Saya Hari Ini -->
            <div class="k-card">
                <div class="k-card-header">
                    <div>
                        <h3>Transaksi Saya Hari Ini</h3>
                        <p><?= date('d F Y') ?></p>
                    </div>
                    <a href="<?= site_url('kasir/penjualan') ?>" class="btn-k-action">Semua</a>
                </div>
                <table class="k-table">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Waktu</th>
                            <th>Item</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($my_transaksi_hari)): ?>
                            <?php foreach ($my_transaksi_hari as $t): ?>
                            <tr>
                                <td><span class="trx-code"><?= htmlspecialchars($t['kode_transaksi']) ?></span></td>
                                <td><?= date('H:i', strtotime($t['tgl_jual'])) ?></td>
                                <td><?= $t['jumlah_item'] ?> item</td>
                                <td class="trx-amount">Rp <?= number_format($t['total_harga'], 0, ',', '.') ?></td>
                                <td>
                                    <?php if (($t['status'] ?? '') === 'Lunas'): ?>
                                        <span class="k-badge-status">Lunas</span>
                                    <?php else: ?>
                                        <span class="k-badge-status" style="background:#fef2f2; color:#dc2626;">Batal</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" style="text-align:center; padding:32px 20px; color:#9ca3af;">
                                    <div style="width:48px; height:48px; background:#f3f4f6; border-radius:12px; display:flex; align-items:center; justify-content:center; margin:0 auto 10px; font-size:20px; color:#d1d5db;">
                                        <i class="fas fa-receipt"></i>
                                    </div>
                                    <div style="font-size:13px; font-weight:600; color:#6b7280;">Belum ada transaksi hari ini</div>
                                    <div style="font-size:11.5px; color:#9ca3af; margin-top:3px;">Mulai buat transaksi baru!</div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- RIGHT -->
        <div class="kasir-right">

            <!-- Cek Stok -->
            <div class="k-card">
                <div class="k-card-header">
                    <div>
                        <h3>Cek Stok</h3>
                        <p>Pantau ketersediaan stok produk</p>
                    </div>
                </div>
                <?php $produk_habis_list = $produk_habis ?? []; ?>
                <?php if (!empty($produk_habis_list)): ?>
                <div style="margin:0 16px 8px; padding:12px 16px; background:#fef2f2; border:1px solid #fecaca; border-radius:10px; display:flex; align-items:flex-start; gap:10px;">
                    <i class="fas fa-exclamation-circle" style="color:#dc2626; font-size:16px; margin-top:2px; flex-shrink:0;"></i>
                    <div style="flex:1;">
                        <div style="font-size:12.5px; font-weight:700; color:#dc2626; margin-bottom:4px;">
                            <?= count($produk_habis_list) ?> Produk Stok Habis
                        </div>
                        <div style="font-size:11.5px; color:#991b1b; line-height:1.5;">
                            <?php foreach (array_slice($produk_habis_list, 0, 3) as $ph): ?>
                                <span style="display:inline-block; background:#fee2e2; padding:2px 8px; border-radius:5px; margin:2px 2px; font-weight:600;"><?= htmlspecialchars($ph['nama_produk']) ?></span>
                            <?php endforeach; ?>
                            <?php if (count($produk_habis_list) > 3): ?>
                                <span style="font-weight:600; color:#b91c1c;">+<?= count($produk_habis_list) - 3 ?> lainnya</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="search-produk-wrap">
                    <div class="search-input-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Cari nama produk..." id="searchProdukKasir">
                    </div>
                </div>
                <div class="stock-check-list" id="stockCheckList">
                    <?php if (!empty($daftar_produk)): ?>
                        <?php foreach (array_slice($daftar_produk, 0, 6) as $p): ?>
                        <div class="stock-check-item">
                            <div class="sci-icon"><i class="fas fa-cube"></i></div>
                            <div style="flex:1;">
                                <span class="sci-name"><?= $p['nama_produk'] ?></span>
                                <span class="sci-cat"><?= $p['nama_kategori'] ?></span>
                            </div>
                            <div class="sci-stok <?= $p['stok'] <= 3 ? 'low' : ($p['stok'] <= 10 ? 'warn' : 'ok') ?>">
                                <?= $p['stok'] ?> <small style="font-size:10px;font-weight:500;"><?= $p['satuan'] ?></small>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div style="text-align:center; padding:28px 20px; color:#9ca3af;">
                            <div style="width:44px; height:44px; background:#f3f4f6; border-radius:12px; display:flex; align-items:center; justify-content:center; margin:0 auto 10px; font-size:18px; color:#d1d5db;">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div style="font-size:12.5px; font-weight:600; color:#6b7280;">Semua stok aman</div>
                            <div style="font-size:11px; color:#9ca3af; margin-top:2px;">Tidak ada produk dengan stok menipis</div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Info Shift -->
            <div class="k-card">
                <div class="k-card-header">
                    <h3>Info Shift Anda</h3>
                </div>
                <div style="padding:16px 20px; display:flex; flex-direction:column; gap:10px;">
                    <div style="display:flex;justify-content:space-between;align-items:center;padding:10px 14px;background:#f8fafc;border-radius:9px;">
                        <span style="font-size:12.5px;color:#6b7280;font-weight:500;"><i class="fas fa-user-tie mr-2" style="color:#1a56db;"></i>Nama</span>
                        <span style="font-size:13px;font-weight:700;color:#111827;"><?= $this->session->userdata('nama') ?: 'Kasir' ?></span>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;padding:10px 14px;background:#f8fafc;border-radius:9px;">
                        <span style="font-size:12.5px;color:#6b7280;font-weight:500;"><i class="fas fa-clock mr-2" style="color:#1a56db;"></i>Login Sejak</span>
                        <span style="font-size:13px;font-weight:700;color:#111827;" id="kasirLoginTime"><?= date('H:i') ?></span>
                    </div>
                    <div style="display:flex;justify-content:space-between;align-items:center;padding:10px 14px;background:#f8fafc;border-radius:9px;">
                        <span style="font-size:12.5px;color:#6b7280;font-weight:500;"><i class="fas fa-calendar-day mr-2" style="color:#1a56db;"></i>Tanggal</span>
                        <span style="font-size:13px;font-weight:700;color:#111827;"><?= date('d/m/Y') ?></span>
                    </div>
                    <a href="javascript:void(0)"
                       onclick="document.getElementById('modalLogout').classList.add('show')"
                       style="display:flex;align-items:center;justify-content:center;gap:8px;margin-top:4px;padding:10px;background:#fef2f2;border-radius:9px;color:#dc2626;font-size:12.5px;font-weight:600;text-decoration:none;transition:background 0.15s;cursor:pointer;"
                       onmouseover="this.style.background='#fee2e2'" onmouseout="this.style.background='#fef2f2'">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>

        </div>
    </div>

</div>

<script>
// Live clock
function updateKasirClock() {
    var now = new Date();
    var h = String(now.getHours()).padStart(2,'0');
    var m = String(now.getMinutes()).padStart(2,'0');
    var s = String(now.getSeconds()).padStart(2,'0');
    var el = document.getElementById('kasirClock');
    if (el) el.textContent = h + ':' + m + ':' + s;
}
updateKasirClock();
setInterval(updateKasirClock, 1000);
</script>