<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path) { font-family: 'DM Sans','Segoe UI',sans-serif; }

    .page-title-row { padding: 24px 28px 0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
    .page-title-row h1 { font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 3px; }
    .page-title-row p  { font-size: 12.5px; color: #9ca3af; margin: 0; }
    .btn-back { display: inline-flex; align-items: center; gap: 7px; background: #f3f4f6; color: #374151 !important; border: none; padding: 9px 16px; border-radius: 9px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; transition: background 0.15s; }
    .btn-back:hover { background: #e5e7eb; }

    .form-layout { margin: 20px 24px 28px; display: grid; grid-template-columns: 1fr 340px; gap: 20px; align-items: start; }

    /* CARD */
    .form-card { background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); overflow: hidden; }
    .form-card-header { padding: 16px 20px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; gap: 10px; }
    .form-card-header h3 { font-size: 14px; font-weight: 700; color: #111827; margin: 0; }
    .form-card-header .header-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 13px; }
    .form-card-body { padding: 20px; }

    /* FORM ELEMENTS */
    .form-row-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
    .form-row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px; }
    .form-group { margin-bottom: 16px; }
    .form-group:last-child { margin-bottom: 0; }
    .form-label { display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px; }
    .form-label span { color: #dc2626; }
    .input-wrap { position: relative; }
    .input-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); font-size: 12px; color: #9ca3af; pointer-events: none; }
    .form-control { width: 100%; padding: 10px 12px 10px 36px; border: 1.5px solid #e5e7eb; border-radius: 9px; font-size: 13px; font-family: 'DM Sans', sans-serif; color: #111827; background: #fafafa; outline: none; transition: border-color 0.15s, box-shadow 0.15s; box-sizing: border-box; }
    .form-control:focus { border-color: #1a56db; background: #fff; box-shadow: 0 0 0 3px rgba(26,86,219,0.08); }
    .form-control::placeholder { color: #d1d5db; }
    .form-control.readonly { background: #f3f4f6; color: #6b7280; cursor: not-allowed; font-family: 'Courier New', monospace; font-weight: 700; }

    /* ITEMS TABLE */
    .items-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 14px; }
    .items-header h4 { font-size: 13px; font-weight: 700; color: #111827; margin: 0; }
    .btn-add-item { display: inline-flex; align-items: center; gap: 6px; background: #eff6ff; color: #1a56db; border: 1.5px dashed #93c5fd; padding: 7px 14px; border-radius: 8px; font-size: 12.5px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: background 0.15s; }
    .btn-add-item:hover { background: #dbeafe; }

    .items-table-wrap { border: 1.5px solid #e5e7eb; border-radius: 10px; overflow: hidden; }
    .items-table { width: 100%; border-collapse: collapse; }
    .items-table th { font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #9ca3af; padding: 10px 14px; text-align: left; background: #fafafa; border-bottom: 1px solid #f1f3f5; white-space: nowrap; }
    .items-table td { padding: 10px 14px; border-bottom: 1px solid #f7f8f9; vertical-align: middle; }
    .items-table tr:last-child td { border-bottom: none; }
    .item-select, .item-input { width: 100%; padding: 8px 10px; border: 1.5px solid #e5e7eb; border-radius: 7px; font-size: 12.5px; font-family: 'DM Sans', sans-serif; color: #111827; background: #fafafa; outline: none; transition: border-color 0.15s; box-sizing: border-box; }
    .item-select:focus, .item-input:focus { border-color: #1a56db; background: #fff; box-shadow: 0 0 0 2px rgba(26,86,219,0.08); }
    .item-subtotal { font-size: 12.5px; font-weight: 700; color: #111827; white-space: nowrap; }
    .btn-remove { width: 28px; height: 28px; background: #fef2f2; border: none; border-radius: 7px; color: #dc2626; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 11px; transition: background 0.15s; flex-shrink: 0; }
    .btn-remove:hover { background: #fee2e2; }
    .stok-hint { font-size: 10.5px; color: #059669; font-weight: 600; margin-top: 3px; display: block; }
    .stok-hint.warning { color: #d97706; }
    .stok-hint.danger { color: #dc2626; }

    /* SUMMARY */
    .summary-card { background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); overflow: hidden; position: sticky; top: 20px; }
    .summary-header { padding: 16px 20px; border-bottom: 1px solid #f1f3f5; }
    .summary-header h3 { font-size: 14px; font-weight: 700; color: #111827; margin: 0; }
    .summary-body { padding: 16px 20px; }
    .summary-row { display: flex; align-items: center; justify-content: space-between; padding: 9px 0; border-bottom: 1px solid #f7f8f9; font-size: 13px; }
    .summary-row:last-child { border-bottom: none; }
    .summary-row .label { color: #6b7280; font-weight: 500; }
    .summary-row .value { font-weight: 700; color: #111827; }
    .summary-total { background: linear-gradient(135deg, #1a56db, #0d3fa6); border-radius: 10px; padding: 14px 16px; margin-top: 14px; }
    .summary-total .label { font-size: 12px; color: rgba(255,255,255,0.8); font-weight: 500; }
    .summary-total .value { font-size: 20px; font-weight: 800; color: #fff; margin-top: 4px; }

    .bayar-group { margin-top: 16px; }
    .bayar-group label { display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px; }
    .bayar-input { width: 100%; padding: 12px 14px; border: 2px solid #e5e7eb; border-radius: 10px; font-size: 16px; font-weight: 700; font-family: 'DM Sans', sans-serif; color: #111827; outline: none; transition: border-color 0.15s; box-sizing: border-box; text-align: right; }
    .bayar-input:focus { border-color: #1a56db; box-shadow: 0 0 0 3px rgba(26,86,219,0.08); }
    .kembalian-box { margin-top: 10px; background: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 10px; padding: 12px 14px; display: flex; align-items: center; justify-content: space-between; }
    .kembalian-box .label { font-size: 12px; color: #059669; font-weight: 600; }
    .kembalian-box .value { font-size: 18px; font-weight: 800; color: #059669; }
    .kembalian-box.kurang { background: #fef2f2; border-color: #fecaca; }
    .kembalian-box.kurang .label, .kembalian-box.kurang .value { color: #dc2626; }

    .btn-bayar { width: 100%; margin-top: 14px; padding: 13px; border: none; border-radius: 10px; background: linear-gradient(135deg, #1a56db, #0d3fa6); color: #fff; font-size: 15px; font-weight: 700; cursor: pointer; font-family: 'DM Sans', sans-serif; box-shadow: 0 4px 14px rgba(26,86,219,0.35); display: flex; align-items: center; justify-content: center; gap: 8px; transition: opacity 0.15s, transform 0.15s; }
    .btn-bayar:hover { opacity: 0.9; transform: translateY(-1px); }
    .btn-bayar:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }

    .empty-items { text-align: center; padding: 28px; color: #9ca3af; font-size: 13px; }
    .empty-items i { font-size: 28px; color: #d1d5db; display: block; margin-bottom: 8px; }

    .alert-custom { margin: 0 0 16px; padding: 11px 16px; border-radius: 10px; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 9px; }
    .alert-custom.error { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

    @media (max-width: 1024px) {
        .form-layout { grid-template-columns: 1fr; }
        .summary-card { position: static; }
    }
    @media (max-width: 768px) {
        .form-layout { margin: 16px 14px 24px; }
        .page-title-row { padding-left: 16px; padding-right: 16px; }
        .form-row-2, .form-row-3 { grid-template-columns: 1fr; }
    }
</style>



    <div class="page-title-row">
        <div>
            <h1><i class="fas fa-cash-register" style="color:#1a56db; margin-right:6px;"></i>Transaksi Baru</h1>
            <p>Input penjualan offline — Gudang PT Pordjo Kaliabang</p>
        </div>
        <a href="<?= site_url('admin/penjualan') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <form action="<?= site_url('admin/penjualan/simpan') ?>" method="post" id="formPenjualan">
    <div class="form-layout">

        <!-- LEFT: FORM -->
        <div style="display:flex; flex-direction:column; gap:18px;">

            <!-- FLASH ERROR -->
            <?php if ($this->session->flashdata('error')): ?>
            <div class="alert-custom error" style="margin:0;"><i class="fas fa-exclamation-circle"></i><?= $this->session->flashdata('error') ?></div>
            <?php endif; ?>

            <!-- IDENTITAS TRANSAKSI -->
            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-header header-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-file-invoice"></i></div>
                    <h3>Identitas Transaksi</h3>
                </div>
                <div class="form-card-body">
                    <div class="form-row-3">
                        <div class="form-group">
                            <label class="form-label">Kode Transaksi</label>
                            <div class="input-wrap">
                                <i class="fas fa-barcode input-icon"></i>
                                <input type="text" name="kode_transaksi" value="<?= $kode ?>" class="form-control readonly" readonly>
                            </div>
                            <span style="font-size:11px; color:#9ca3af; margin-top:4px; display:block;"><i class="fas fa-info-circle" style="margin-right:3px;"></i>Generate otomatis</span>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal</label>
                            <div class="input-wrap">
                                <i class="fas fa-calendar input-icon"></i>
                                <input type="text" class="form-control readonly" value="<?= date('d M Y H:i') ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Pelanggan</label>
                            <div class="input-wrap">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" name="nama_pelanggan" class="form-control" placeholder="Opsional (untuk nota)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KERANJANG BELANJA -->
            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-header header-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-shopping-basket"></i></div>
                    <h3>Keranjang Belanja</h3>
                </div>
                <div class="form-card-body">
                    <div class="items-header">
                        <h4>Item Produk <span id="item-count-badge" style="display:inline-block; background:#eff6ff; color:#1a56db; font-size:11px; font-weight:600; padding:2px 8px; border-radius:20px; margin-left:6px;">0 item</span></h4>
                        <button type="button" class="btn-add-item" onclick="addItem()">
                            <i class="fas fa-plus"></i> Tambah Item
                        </button>
                    </div>

                    <div class="items-table-wrap">
                        <table class="items-table">
                            <thead>
                                <tr>
                                    <th style="width:35%;">Produk</th>
                                    <th style="width:12%;">Stok</th>
                                    <th style="width:12%;">Qty</th>
                                    <th style="width:18%;">Harga Jual</th>
                                    <th style="width:18%;">Subtotal</th>
                                    <th style="width:5%;"></th>
                                </tr>
                            </thead>
                            <tbody id="itemsBody">
                                <tr id="emptyRow">
                                    <td colspan="6" class="empty-items">
                                        <i class="fas fa-shopping-basket"></i>
                                        Keranjang kosong. Klik "+ Tambah Item" untuk mulai.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- RIGHT: SUMMARY & BAYAR -->
        <div>
            <div class="summary-card">
                <div class="summary-header">
                    <h3><i class="fas fa-calculator" style="color:#1a56db; margin-right:6px;"></i>Ringkasan Pembayaran</h3>
                </div>
                <div class="summary-body">
                    <div class="summary-row">
                        <span class="label">Kode Transaksi</span>
                        <span class="value" style="font-family:'Courier New', monospace; font-size:12px; color:#1a56db;"><?= $kode ?></span>
                    </div>
                    <div class="summary-row">
                        <span class="label">Kasir</span>
                        <span class="value" style="font-size:12px;"><?= $this->session->userdata('nama') ?: 'Kasir' ?></span>
                    </div>
                    <div class="summary-row">
                        <span class="label">Jumlah Item</span>
                        <span class="value" id="sum-items">0 item</span>
                    </div>
                    <div class="summary-row">
                        <span class="label">Total Qty</span>
                        <span class="value" id="sum-qty">0</span>
                    </div>

                    <div class="summary-total">
                        <div class="label">Total Belanja</div>
                        <div class="value" id="sum-total">Rp 0</div>
                    </div>

                    <!-- BAYAR & KEMBALIAN -->
                    <div class="bayar-group">
                        <label>Jumlah Bayar <span style="color:#dc2626;">*</span></label>
                        <input type="number" name="bayar" id="inputBayar" class="bayar-input" placeholder="0" min="0" oninput="updateKembalian()">
                    </div>

                    <div class="kembalian-box" id="kembalianBox">
                        <span class="label">Kembalian</span>
                        <span class="value" id="kembalianValue">Rp 0</span>
                    </div>

                    <button type="submit" class="btn-bayar" id="btnBayar" disabled>
                        <i class="fas fa-cash-register"></i> Bayar & Simpan Transaksi
                    </button>

                    <div style="margin-top:10px; padding:10px; background:#eff6ff; border-radius:8px; font-size:11.5px; color:#1a56db; display:flex; gap:7px; align-items:flex-start;">
                        <i class="fas fa-info-circle" style="margin-top:1px; flex-shrink:0;"></i>
                        <span>Stok produk akan otomatis berkurang setelah transaksi disimpan.</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </form>

<!-- DATA PRODUK UNTUK JS -->
<script>
    var produkData = <?= json_encode(array_map(function($p) {
        return [
            'id_product'    => $p['id_product'],
            'nama_produk'   => $p['nama_produk'],
            'satuan'        => $p['satuan'],
            'nama_kategori' => $p['nama_kategori'],
            'stok'          => (int)$p['stok'],
            'harga_jual'    => (float)$p['harga_jual'],
        ];
    }, $produk)) ?>;

    var grandTotal = 0;

    function addItem() {
        var emptyRow = document.getElementById('emptyRow');
        if (emptyRow) emptyRow.remove();

        var idx = Date.now();
        var options = produkData.map(function(p) {
            return '<option value="' + p.id_product + '" data-stok="' + p.stok + '" data-harga="' + p.harga_jual + '" data-satuan="' + p.satuan + '">' +
                   p.nama_produk + ' (' + p.satuan + ')</option>';
        }).join('');

        var row = document.createElement('tr');
        row.id  = 'item-row-' + idx;
        row.innerHTML = `
            <td>
                <select name="id_product[]" class="item-select" onchange="onSelectProduk(${idx})" required>
                    <option value="" disabled selected>-- Pilih Produk --</option>
                    ${options}
                </select>
            </td>
            <td>
                <span id="stok-${idx}" class="stok-hint" style="font-size:13px; color:#9ca3af;">—</span>
            </td>
            <td>
                <input type="number" name="qty[]" id="qty-${idx}" class="item-input" placeholder="0" min="1" style="width:80px;" oninput="updateRow(${idx})" required>
            </td>
            <td>
                <input type="number" name="harga_jual[]" id="harga-${idx}" class="item-input" placeholder="0" min="0" oninput="updateRow(${idx})" required>
            </td>
            <td><span id="subtotal-${idx}" class="item-subtotal" style="color:#9ca3af;">Rp 0</span></td>
            <td>
                <button type="button" class="btn-remove" onclick="removeItem(${idx})">
                    <i class="fas fa-times"></i>
                </button>
            </td>
        `;
        document.getElementById('itemsBody').appendChild(row);
        updateSummary();
    }

    function onSelectProduk(idx) {
        var select = document.querySelector('#item-row-' + idx + ' select');
        var opt    = select.options[select.selectedIndex];
        var stok   = parseInt(opt.getAttribute('data-stok')) || 0;
        var harga  = parseFloat(opt.getAttribute('data-harga')) || 0;

        // Update stok display
        var stokEl = document.getElementById('stok-' + idx);
        stokEl.textContent = stok + ' ' + (opt.getAttribute('data-satuan') || '');
        stokEl.className = 'stok-hint' + (stok <= 0 ? ' danger' : stok <= 10 ? ' warning' : '');

        // Auto-fill harga jual
        var hargaEl = document.getElementById('harga-' + idx);
        hargaEl.value = harga;

        // Set max qty
        var qtyEl = document.getElementById('qty-' + idx);
        qtyEl.setAttribute('max', stok);

        updateRow(idx);
    }

    function removeItem(idx) {
        var row = document.getElementById('item-row-' + idx);
        if (row) row.remove();
        var rows = document.querySelectorAll('#itemsBody tr:not(#emptyRow)');
        if (rows.length === 0) {
            var emptyRow = document.createElement('tr');
            emptyRow.id = 'emptyRow';
            emptyRow.innerHTML = '<td colspan="6" class="empty-items"><i class="fas fa-shopping-basket"></i>Keranjang kosong. Klik "+ Tambah Item" untuk mulai.</td>';
            document.getElementById('itemsBody').appendChild(emptyRow);
        }
        updateSummary();
    }

    function updateRow(idx) {
        var qty   = parseInt(document.getElementById('qty-' + idx)?.value) || 0;
        var harga = parseFloat(document.getElementById('harga-' + idx)?.value) || 0;
        var subtotal = qty * harga;

        var el = document.getElementById('subtotal-' + idx);
        if (el) {
            el.textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
            el.style.color = subtotal > 0 ? '#111827' : '#9ca3af';
        }

        // Cek stok
        var select = document.querySelector('#item-row-' + idx + ' select');
        if (select && select.value) {
            var opt  = select.options[select.selectedIndex];
            var stok = parseInt(opt.getAttribute('data-stok')) || 0;
            var satuan = opt.getAttribute('data-satuan') || '';
            var stokEl = document.getElementById('stok-' + idx);
            if (qty > stok) {
                stokEl.textContent = '⚠ Stok: ' + stok + ' (melebihi batas)';
                stokEl.className = 'stok-hint danger';
            } else {
                stokEl.textContent = stok + ' ' + satuan;
                stokEl.className = 'stok-hint' + (stok <= 0 ? ' danger' : stok <= 10 ? ' warning' : '');
            }
        }

        updateSummary();
    }

    function updateSummary() {
        var rows     = document.querySelectorAll('#itemsBody tr:not(#emptyRow)');
        var total    = 0, totalQty = 0, valid = true;

        rows.forEach(function(row) {
            var sel   = row.querySelector('select');
            var qty   = parseInt(row.querySelector('input[name="qty[]"]')?.value) || 0;
            var harga = parseFloat(row.querySelector('input[name="harga_jual[]"]')?.value) || 0;
            total    += qty * harga;
            totalQty += qty;

            // Cek stok limit
            if (sel && sel.value) {
                var opt  = sel.options[sel.selectedIndex];
                var stok = parseInt(opt.getAttribute('data-stok')) || 0;
                if (qty > stok) valid = false;
            }
            if (!sel?.value || !qty || !harga) valid = false;
        });

        grandTotal = total;
        document.getElementById('sum-items').textContent = rows.length + ' item';
        document.getElementById('sum-qty').textContent   = totalQty;
        document.getElementById('sum-total').textContent = 'Rp ' + total.toLocaleString('id-ID');
        document.getElementById('item-count-badge').textContent = rows.length + ' item';

        // Auto-fill jumlah bayar sesuai total
        var bayarEl = document.getElementById('inputBayar');
        if (total > 0) {
            bayarEl.value = total;
        } else {
            bayarEl.value = '';
        }

        updateKembalian();
    }

    function updateKembalian() {
        var bayar     = parseFloat(document.getElementById('inputBayar').value) || 0;
        var kembalian = bayar - grandTotal;
        var box       = document.getElementById('kembalianBox');
        var valEl     = document.getElementById('kembalianValue');

        if (bayar > 0 && kembalian < 0) {
            box.className = 'kembalian-box kurang';
            valEl.textContent = 'Kurang Rp ' + Math.abs(kembalian).toLocaleString('id-ID');
        } else {
            box.className = 'kembalian-box';
            valEl.textContent = 'Rp ' + Math.max(0, kembalian).toLocaleString('id-ID');
        }

        // Enable/disable tombol bayar
        var rows  = document.querySelectorAll('#itemsBody tr:not(#emptyRow)');
        var stokOk = true;
        rows.forEach(function(row) {
            var sel = row.querySelector('select');
            var qty = parseInt(row.querySelector('input[name="qty[]"]')?.value) || 0;
            if (sel && sel.value) {
                var stok = parseInt(sel.options[sel.selectedIndex].getAttribute('data-stok')) || 0;
                if (qty > stok) stokOk = false;
            }
        });

        var canSubmit = rows.length > 0 && grandTotal > 0 && bayar >= grandTotal && stokOk;
        document.getElementById('btnBayar').disabled = !canSubmit;
    }

    // Validasi sebelum submit
    document.getElementById('formPenjualan').addEventListener('submit', function(e) {
        var rows = document.querySelectorAll('#itemsBody tr:not(#emptyRow)');
        if (rows.length === 0) {
            e.preventDefault();
            alert('Keranjang masih kosong! Tambahkan minimal 1 produk.');
            return;
        }
        var valid = true, stokOk = true;
        rows.forEach(function(row) {
            var sel   = row.querySelector('select');
            var qty   = row.querySelector('input[name="qty[]"]');
            var harga = row.querySelector('input[name="harga_jual[]"]');
            if (!sel?.value || !qty?.value || !harga?.value) valid = false;

            // Cek stok
            if (sel && sel.value) {
                var opt  = sel.options[sel.selectedIndex];
                var stok = parseInt(opt.getAttribute('data-stok')) || 0;
                if (parseInt(qty.value) > stok) stokOk = false;
            }
        });
        if (!valid) {
            e.preventDefault();
            alert('Lengkapi semua data produk (pilih produk, qty, dan harga jual)!');
            return;
        }
        if (!stokOk) {
            e.preventDefault();
            alert('Ada produk yang qty-nya melebihi stok! Periksa kembali.');
            return;
        }
        var bayar = parseFloat(document.getElementById('inputBayar').value) || 0;
        if (bayar < grandTotal) {
            e.preventDefault();
            alert('Jumlah bayar kurang dari total belanja!');
            return;
        }
    });
</script>
</div>
