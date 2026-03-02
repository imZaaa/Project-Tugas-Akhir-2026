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
    .form-group { margin-bottom: 16px; }
    .form-group:last-child { margin-bottom: 0; }
    .form-label { display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px; }
    .form-label span { color: #dc2626; }
    .input-wrap { position: relative; }
    .input-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); font-size: 12px; color: #9ca3af; pointer-events: none; }
    .form-control { width: 100%; padding: 10px 12px 10px 36px; border: 1.5px solid #e5e7eb; border-radius: 9px; font-size: 13px; font-family: 'DM Sans', sans-serif; color: #111827; background: #fafafa; outline: none; transition: border-color 0.15s, box-shadow 0.15s; }
    .form-control:focus { border-color: #059669; background: #fff; box-shadow: 0 0 0 3px rgba(5,150,105,0.08); }
    .form-control::placeholder { color: #d1d5db; }
    .form-control.readonly { background: #f3f4f6; color: #6b7280; cursor: not-allowed; font-family: 'Courier New', monospace; font-weight: 700; }
    select.form-control { cursor: pointer; }
    textarea.form-control { resize: vertical; min-height: 70px; padding-top: 10px; }

    /* ITEMS TABLE */
    .items-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 14px; }
    .items-header h4 { font-size: 13px; font-weight: 700; color: #111827; margin: 0; }
    .btn-add-item { display: inline-flex; align-items: center; gap: 6px; background: #ecfdf5; color: #059669; border: 1.5px dashed #6ee7b7; padding: 7px 14px; border-radius: 8px; font-size: 12.5px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: background 0.15s; }
    .btn-add-item:hover { background: #d1fae5; }

    .items-table-wrap { border: 1.5px solid #e5e7eb; border-radius: 10px; overflow: hidden; }
    .items-table { width: 100%; border-collapse: collapse; }
    .items-table th { font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #9ca3af; padding: 10px 14px; text-align: left; background: #fafafa; border-bottom: 1px solid #f1f3f5; white-space: nowrap; }
    .items-table td { padding: 10px 14px; border-bottom: 1px solid #f7f8f9; vertical-align: middle; }
    .items-table tr:last-child td { border-bottom: none; }
    .item-select, .item-input { width: 100%; padding: 8px 10px; border: 1.5px solid #e5e7eb; border-radius: 7px; font-size: 12.5px; font-family: 'DM Sans', sans-serif; color: #111827; background: #fafafa; outline: none; transition: border-color 0.15s; }
    .item-select:focus, .item-input:focus { border-color: #059669; background: #fff; box-shadow: 0 0 0 2px rgba(5,150,105,0.08); }
    .item-subtotal { font-size: 12.5px; font-weight: 700; color: #111827; white-space: nowrap; }
    .btn-remove { width: 28px; height: 28px; background: #fef2f2; border: none; border-radius: 7px; color: #dc2626; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 11px; transition: background 0.15s; flex-shrink: 0; }
    .btn-remove:hover { background: #fee2e2; }

    /* SUMMARY */
    .summary-card { background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); overflow: hidden; position: sticky; top: 20px; }
    .summary-header { padding: 16px 20px; border-bottom: 1px solid #f1f3f5; }
    .summary-header h3 { font-size: 14px; font-weight: 700; color: #111827; margin: 0; }
    .summary-body { padding: 16px 20px; }
    .summary-row { display: flex; align-items: center; justify-content: space-between; padding: 9px 0; border-bottom: 1px solid #f7f8f9; font-size: 13px; }
    .summary-row:last-child { border-bottom: none; }
    .summary-row .label { color: #6b7280; font-weight: 500; }
    .summary-row .value { font-weight: 700; color: #111827; }
    .summary-total { background: linear-gradient(135deg, #059669, #047857); border-radius: 10px; padding: 14px 16px; margin-top: 14px; }
    .summary-total .label { font-size: 12px; color: rgba(255,255,255,0.8); font-weight: 500; }
    .summary-total .value { font-size: 20px; font-weight: 800; color: #fff; margin-top: 4px; }

    .btn-simpan { width: 100%; margin-top: 14px; padding: 12px; border: none; border-radius: 10px; background: linear-gradient(135deg, #059669, #047857); color: #fff; font-size: 14px; font-weight: 700; cursor: pointer; font-family: 'DM Sans', sans-serif; box-shadow: 0 4px 14px rgba(5,150,105,0.35); display: flex; align-items: center; justify-content: center; gap: 8px; transition: opacity 0.15s, transform 0.15s; }
    .btn-simpan:hover { opacity: 0.9; transform: translateY(-1px); }
    .btn-simpan:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }

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
        .form-row-2 { grid-template-columns: 1fr; }
    }
</style>

    <div class="page-title-row">
        <div>
            <h1>Input Barang Masuk</h1>
            <p>Catat penerimaan barang dari supplier</p>
        </div>
        <a href="<?= site_url($this->session->userdata('role') === 'admin' ? 'admin/barang_masuk' : 'kasir/barang_masuk') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <form action="<?= site_url($this->session->userdata('role') === 'admin' ? 'admin/barang_masuk/simpan' : 'kasir/barang_masuk/simpan') ?>" method="post" id="formBarangMasuk">
    <div class="form-layout">

        <!-- LEFT: FORM -->
        <div style="display:flex; flex-direction:column; gap:18px;">

            <!-- FLASH ERROR -->
            <?php if ($this->session->flashdata('error')): ?>
            <div class="alert-custom error" style="margin:0;"><i class="fas fa-exclamation-circle"></i><?= $this->session->flashdata('error') ?></div>
            <?php endif; ?>

            <!-- IDENTITAS NOTA -->
            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-header header-icon" style="background:#ecfdf5; color:#059669;"><i class="fas fa-file-invoice"></i></div>
                    <h3>Identitas Nota</h3>
                </div>
                <div class="form-card-body">
                    <div class="form-row-2">
                        <div class="form-group">
                            <label class="form-label">No. Faktur</label>
                            <div class="input-wrap">
                                <i class="fas fa-barcode input-icon"></i>
                                <input type="text" name="no_faktur" value="<?= $no_faktur ?>" class="form-control readonly" readonly>
                            </div>
                            <span style="font-size:11px; color:#9ca3af; margin-top:4px; display:block;"><i class="fas fa-info-circle" style="margin-right:3px;"></i>Generate otomatis</span>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal Beli <span>*</span></label>
                            <div class="input-wrap">
                                <i class="fas fa-calendar input-icon"></i>
                                <input type="date" name="tgl_beli" class="form-control" value="<?= date('Y-m-d') ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Supplier <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-truck input-icon"></i>
                            <select name="id_supplier" class="form-control" required onchange="updateSummary()">
                                <option value="" disabled selected>-- Pilih Supplier --</option>
                                <?php foreach ($suppliers as $s): ?>
                                <option value="<?= $s['id_supplier'] ?>"><?= htmlspecialchars($s['nama_supplier']) ?> (<?= $s['kode_supplier'] ?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Keterangan</label>
                        <div class="input-wrap">
                            <i class="fas fa-sticky-note input-icon" style="top:14px; transform:none;"></i>
                            <textarea name="keterangan" class="form-control" placeholder="Catatan tambahan (opsional)"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DAFTAR PRODUK -->
            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-header header-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-boxes"></i></div>
                    <h3>Daftar Produk</h3>
                </div>
                <div class="form-card-body">
                    <div class="items-header">
                        <h4>Item Barang <span id="item-count-badge" style="display:inline-block; background:#eff6ff; color:#1a56db; font-size:11px; font-weight:600; padding:2px 8px; border-radius:20px; margin-left:6px;">0 item</span></h4>
                        <button type="button" class="btn-add-item" onclick="addItem()">
                            <i class="fas fa-plus"></i> Tambah Item
                        </button>
                    </div>

                    <div class="items-table-wrap">
                        <table class="items-table">
                            <thead>
                                <tr>
                                    <th style="width:35%;">Produk</th>
                                    <th style="width:15%;">Qty</th>
                                    <th style="width:22%;">Harga Beli/Satuan</th>
                                    <th style="width:20%;">Subtotal</th>
                                    <th style="width:8%;"></th>
                                </tr>
                            </thead>
                            <tbody id="itemsBody">
                                <tr id="emptyRow">
                                    <td colspan="5" class="empty-items">
                                        <i class="fas fa-box-open"></i>
                                        Belum ada item. Klik "+ Tambah Item" untuk mulai.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- RIGHT: SUMMARY -->
        <div>
            <div class="summary-card">
                <div class="summary-header">
                    <h3>Ringkasan Transaksi</h3>
                </div>
                <div class="summary-body">
                    <div class="summary-row">
                        <span class="label">No. Faktur</span>
                        <span class="value" style="font-family:'Courier New', monospace; font-size:12px; color:#059669;"><?= $no_faktur ?></span>
                    </div>
                    <div class="summary-row">
                        <span class="label">Supplier</span>
                        <span class="value" id="sum-supplier" style="font-size:12px;">—</span>
                    </div>
                    <div class="summary-row">
                        <span class="label">Tanggal</span>
                        <span class="value" id="sum-tgl" style="font-size:12px;"><?= date('d M Y') ?></span>
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
                        <div class="label">Total Bayar</div>
                        <div class="value" id="sum-total">Rp 0</div>
                    </div>

                    <button type="submit" class="btn-simpan" id="btnSimpan" disabled>
                        <i class="fas fa-save"></i> Simpan Transaksi
                    </button>

                    <div style="margin-top:10px; padding:10px; background:#fffbeb; border-radius:8px; font-size:11.5px; color:#d97706; display:flex; gap:7px; align-items:flex-start;">
                        <i class="fas fa-bolt" style="margin-top:1px; flex-shrink:0;"></i>
                        <span>Stok produk akan otomatis bertambah setelah transaksi disimpan.</span>
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
            'id_product'   => $p['id_product'],
            'nama_produk'  => $p['nama_produk'],
            'satuan'       => $p['satuan'],
            'nama_kategori'=> $p['nama_kategori'],
            'stok'         => $p['stok'],
        ];
    }, $produk)) ?>;

    var supplierData = <?= json_encode(array_map(function($s) {
        return ['id_supplier' => $s['id_supplier'], 'nama_supplier' => $s['nama_supplier']];
    }, $suppliers)) ?>;

    var itemCount = 0;

    function addItem() {
        var emptyRow = document.getElementById('emptyRow');
        if (emptyRow) emptyRow.remove();

        itemCount++;
        var idx = Date.now(); // unik per row
        var options = produkData.map(function(p) {
            return '<option value="' + p.id_product + '" data-satuan="' + p.satuan + '">' +
                   p.nama_produk + ' (' + p.satuan + ') — stok: ' + p.stok + '</option>';
        }).join('');

        var row = document.createElement('tr');
        row.id  = 'item-row-' + idx;
        row.innerHTML = `
            <td>
                <select name="id_product[]" class="item-select" onchange="updateRow(${idx})" required>
                    <option value="" disabled selected>-- Pilih Produk --</option>
                    ${options}
                </select>
            </td>
            <td>
                <input type="number" name="qty[]" id="qty-${idx}" class="item-input" placeholder="0" min="1" style="width:80px;" oninput="updateRow(${idx})" required>
                <span id="satuan-${idx}" style="font-size:11px; color:#9ca3af; margin-left:4px;"></span>
            </td>
            <td>
                <input type="number" name="purchase_price[]" id="price-${idx}" class="item-input" placeholder="0" min="0" oninput="updateRow(${idx})" required>
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

    function removeItem(idx) {
        var row = document.getElementById('item-row-' + idx);
        if (row) row.remove();
        var rows = document.querySelectorAll('#itemsBody tr:not(#emptyRow)');
        if (rows.length === 0) {
            var emptyRow = document.createElement('tr');
            emptyRow.id = 'emptyRow';
            emptyRow.innerHTML = '<td colspan="5" class="empty-items"><i class="fas fa-box-open"></i>Belum ada item. Klik "+ Tambah Item" untuk mulai.</td>';
            document.getElementById('itemsBody').appendChild(emptyRow);
        }
        updateSummary();
    }

    function updateRow(idx) {
        var qty   = parseFloat(document.getElementById('qty-' + idx)?.value) || 0;
        var price = parseFloat(document.getElementById('price-' + idx)?.value) || 0;
        var subtotal = qty * price;
        var el = document.getElementById('subtotal-' + idx);
        if (el) {
            el.textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
            el.style.color = subtotal > 0 ? '#111827' : '#9ca3af';
        }
        // Update satuan hint
        var select = document.querySelector('#item-row-' + idx + ' select');
        var satuanEl = document.getElementById('satuan-' + idx);
        if (select && satuanEl) {
            var opt = select.options[select.selectedIndex];
            satuanEl.textContent = opt ? opt.getAttribute('data-satuan') || '' : '';
        }
        updateSummary();
    }

    function updateSummary() {
        var rows     = document.querySelectorAll('#itemsBody tr:not(#emptyRow)');
        var total    = 0, totalQty = 0;
        rows.forEach(function(row) {
            var sel   = row.querySelector('select');
            var qty   = parseFloat(row.querySelector('input[name="qty[]"]')?.value) || 0;
            var price = parseFloat(row.querySelector('input[name="purchase_price[]"]')?.value) || 0;
            total    += qty * price;
            totalQty += qty;
        });

        document.getElementById('sum-items').textContent = rows.length + ' item';
        document.getElementById('sum-qty').textContent   = totalQty;
        document.getElementById('sum-total').textContent = 'Rp ' + total.toLocaleString('id-ID');
        document.getElementById('item-count-badge').textContent = rows.length + ' item';

        // Update tanggal & supplier di summary
        var tgl = document.querySelector('input[name="tgl_beli"]')?.value;
        if (tgl) {
            var d = new Date(tgl);
            document.getElementById('sum-tgl').textContent = d.toLocaleDateString('id-ID', {day:'2-digit', month:'short', year:'numeric'});
        }
        var supSel = document.querySelector('select[name="id_supplier"]');
        if (supSel && supSel.value) {
            var supOpt = supSel.options[supSel.selectedIndex];
            document.getElementById('sum-supplier').textContent = supOpt.text.split(' (')[0];
        } else {
            document.getElementById('sum-supplier').textContent = '—';
        }

        // Enable/disable tombol simpan
        var supOk  = document.querySelector('select[name="id_supplier"]')?.value;
        var hasItem = rows.length > 0;
        document.getElementById('btnSimpan').disabled = !(supOk && hasItem && total > 0);
    }

    // Update summary live saat tanggal berubah
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('input[name="tgl_beli"]')?.addEventListener('change', updateSummary);
    });

    // Validasi sebelum submit
    document.getElementById('formBarangMasuk').addEventListener('submit', function(e) {
        var rows = document.querySelectorAll('#itemsBody tr:not(#emptyRow)');
        if (rows.length === 0) {
            e.preventDefault();
            alert('Minimal 1 produk harus ditambahkan!');
            return;
        }
        var valid = true;
        rows.forEach(function(row) {
            var sel   = row.querySelector('select');
            var qty   = row.querySelector('input[name="qty[]"]');
            var price = row.querySelector('input[name="purchase_price[]"]');
            if (!sel?.value || !qty?.value || !price?.value) valid = false;
        });
        if (!valid) {
            e.preventDefault();
            alert('Lengkapi semua data produk (pilih produk, qty, dan harga beli)!');
        }
    });
</script>
</div>