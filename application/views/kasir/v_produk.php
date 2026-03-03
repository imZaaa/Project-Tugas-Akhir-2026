<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path) { font-family: 'DM Sans','Segoe UI',sans-serif; }
    .page-title-row { padding: 24px 28px 0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
    .page-title-row h1 { font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 3px; letter-spacing: -0.3px; }
    .page-title-row p  { font-size: 12.5px; color: #9ca3af; margin: 0; }
    .filter-bar { margin: 14px 24px 0; display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
    .filter-badge { display: inline-flex; align-items: center; gap: 6px; background: #eff6ff; border: 1px solid #bfdbfe; color: #1a56db; font-size: 12.5px; font-weight: 600; padding: 5px 12px; border-radius: 20px; }
    .filter-badge a { color: #1a56db; margin-left: 4px; text-decoration: none; font-size: 11px; }
    .main-card { margin: 16px 24px 28px; background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); overflow: hidden; }
    .card-toolbar { padding: 14px 20px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; }
    .count-badge { display: inline-flex; align-items: center; gap: 5px; background: #eff6ff; color: #1a56db; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 20px; }
    .search-box { display: flex; align-items: center; gap: 8px; background: #f8fafc; border: 1.5px solid #e8ecf0; border-radius: 8px; padding: 7px 12px; transition: border-color 0.15s; }
    .search-box:focus-within { border-color: #1a56db; background: #fff; }
    .search-box i { color: #9ca3af; font-size: 12px; }
    .search-box input { border: none; background: transparent; font-size: 13px; color: #374151; outline: none; width: 200px; font-family: 'DM Sans', sans-serif; }
    .search-box input::placeholder { color: #d1d5db; }
    .data-table { width: 100%; border-collapse: collapse; }
    .data-table th { font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #9ca3af; padding: 11px 20px; text-align: left; background: #fafafa; border-bottom: 1px solid #f1f3f5; white-space: nowrap; }
    .data-table td { padding: 12px 20px; font-size: 13px; color: #374151; border-bottom: 1px solid #f7f8f9; vertical-align: middle; }
    .data-table tr:last-child td { border-bottom: none; }
    .data-table tr:hover td { background: #fafbff; }
    .produk-icon { width: 34px; height: 34px; border-radius: 9px; display: inline-flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 700; color: white; background: linear-gradient(135deg, #d97706, #b45309); flex-shrink: 0; }
    .produk-wrap { display: flex; align-items: center; gap: 10px; }
    .produk-name { font-size: 13px; font-weight: 600; color: #111827; display: block; }
    .kat-pill { display: inline-block; background: #fffbeb; color: #d97706; font-size: 11px; font-weight: 600; padding: 3px 9px; border-radius: 20px; }
    .harga-text { font-weight: 700; color: #111827; font-size: 13px; }
    .satuan-text { font-size: 11px; color: #9ca3af; font-weight: 500; }
    .stok-badge { display: inline-flex; align-items: center; gap: 5px; font-size: 12.5px; font-weight: 700; padding: 3px 10px; border-radius: 20px; }
    .stok-badge.ok { background: #f0fdf4; color: #16a34a; }
    .stok-badge.warning { background: #fffbeb; color: #d97706; }
    .stok-badge.critical { background: #fef2f2; color: #dc2626; }
    .btn-action { display: inline-flex; align-items: center; gap: 5px; font-size: 11.5px; font-weight: 600; padding: 5px 10px; border-radius: 7px; border: none; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: background 0.15s; text-decoration: none; }
    .btn-stok { background: #ecfdf5; color: #059669; }
    .btn-stok:hover { background: #d1fae5; color: #059669; }
    .no-data-row td { text-align: center; padding: 48px 20px; color: #9ca3af; font-size: 13px; }
    .no-data-icon { width: 52px; height: 52px; background: #f3f4f6; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 22px; color: #d1d5db; margin: 0 auto 12px; }
    .pagination-wrap { padding: 14px 20px; border-top: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; }
    .pagination-info { font-size: 12.5px; color: #9ca3af; font-weight: 500; }
    .pagination-info strong { color: #374151; }
    .pagination-controls { display: flex; align-items: center; gap: 4px; }
    .page-btn { width: 32px; height: 32px; border: 1.5px solid #e5e7eb; border-radius: 8px; background: #fff; color: #374151; font-size: 12.5px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; transition: all 0.15s; font-family: 'DM Sans', sans-serif; }
    .page-btn:hover:not(:disabled) { background: #eff6ff; border-color: #bfdbfe; color: #1a56db; }
    .page-btn.active { background: #1a56db; border-color: #1a56db; color: #fff; box-shadow: 0 2px 8px rgba(26,86,219,0.3); }
    .page-btn:disabled { opacity: 0.35; cursor: not-allowed; }
    .page-btn.nav-btn { width: auto; padding: 0 10px; gap: 5px; font-size: 12px; }
    .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.45); z-index: 99999; align-items: center; justify-content: center; padding: 20px; backdrop-filter: blur(3px); }
    .modal-overlay.show { display: flex; }
    .modal-box { background: #fff; border-radius: 16px; width: 100%; max-width: 380px; box-shadow: 0 20px 60px rgba(0,0,0,0.2); overflow: hidden; animation: modalIn 0.2s ease; }
    @keyframes modalIn { from { opacity: 0; transform: translateY(-16px) scale(0.97); } to { opacity: 1; transform: translateY(0) scale(1); } }
    .modal-header { padding: 18px 22px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; }
    .modal-header h4 { font-size: 15px; font-weight: 700; color: #111827; margin: 0; }
    .modal-close { width: 30px; height: 30px; background: #f3f4f6; border: none; border-radius: 7px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #6b7280; font-size: 13px; }
    .modal-close:hover { background: #e5e7eb; }
    .modal-body { padding: 20px 22px; }
    .modal-footer { padding: 14px 22px; border-top: 1px solid #f1f3f5; display: flex; justify-content: flex-end; gap: 10px; }
    .form-group-custom { margin-bottom: 16px; }
    .form-group-custom:last-child { margin-bottom: 0; }
    .form-label-custom { display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px; }
    .form-label-custom span { color: #dc2626; }
    .input-wrap { position: relative; }
    .input-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); font-size: 12px; color: #9ca3af; pointer-events: none; }
    .form-control-custom { width: 100%; padding: 10px 12px 10px 36px; border: 1.5px solid #e5e7eb; border-radius: 9px; font-size: 13px; font-family: 'DM Sans', sans-serif; color: #111827; background: #fafafa; outline: none; transition: border-color 0.15s, box-shadow 0.15s; }
    .form-control-custom:focus { border-color: #1a56db; background: #fff; box-shadow: 0 0 0 3px rgba(26,86,219,0.08); }
    .btn-cancel { padding: 9px 18px; border: 1.5px solid #e5e7eb; border-radius: 9px; background: #fff; color: #6b7280; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; }
    .btn-cancel:hover { background: #f9fafb; }
    .btn-submit-green { padding: 9px 20px; border: none; border-radius: 9px; background: linear-gradient(135deg, #059669, #047857); color: #fff; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; box-shadow: 0 3px 10px rgba(5,150,105,0.3); display: flex; align-items: center; gap: 6px; }
    .stok-current-box { background: #f8fafc; border: 1px solid #e8ecf0; border-radius: 10px; padding: 12px 14px; margin-bottom: 16px; display: flex; align-items: center; justify-content: space-between; }
    .stok-current-box .label { font-size: 12px; color: #6b7280; font-weight: 500; }
    .stok-current-box .value { font-size: 20px; font-weight: 800; color: #111827; }
    .alert-custom { margin: 16px 24px 0; padding: 11px 16px; border-radius: 10px; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 9px; }
    .alert-custom.success { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
    .alert-custom.error   { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }
    @media (max-width: 768px) { .page-title-row, .filter-bar { padding-left: 16px; padding-right: 16px; } .main-card { margin: 16px 14px 24px; } }
</style>

    <div class="page-title-row">
        <div>
            <h1>Stok Produk</h1>
            <p>Lihat dan perbarui stok produk</p>
        </div>
    </div>

    <?php if (!empty($filter_kategori)): ?>
    <div class="filter-bar">
        <span class="filter-badge">
            <i class="fas fa-filter" style="font-size:10px;"></i>
            Filter: <?= htmlspecialchars($filter_kategori) ?>
            <a href="<?= site_url('kasir/produk') ?>">✕ Hapus filter</a>
        </span>
    </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert-custom success"><i class="fas fa-check-circle"></i><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert-custom error"><i class="fas fa-exclamation-circle"></i><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <div class="main-card">
        <div class="card-toolbar">
            <div style="display:flex; align-items:center; gap:10px;">
                <span style="font-size:14px; font-weight:700; color:#111827;">Daftar Produk</span>
                <span class="count-badge"><i class="fas fa-box" style="font-size:10px;"></i><?= count($produk) ?> produk</span>
            </div>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchProduk" placeholder="Cari nama produk..." onkeyup="filterTable()">
            </div>
        </div>

        <table class="data-table" id="produkTable">
            <thead>
                <tr><th>#</th><th>Nama Produk</th><th>Kategori</th><th>Harga Jual</th><th>Stok</th><th>Satuan</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                <?php if (!empty($produk)): ?>
                    <?php foreach ($produk as $i => $p): ?>
                    <?php
                        $stokClass = 'ok';
                        if ($p['stok'] <= 3) $stokClass = 'critical';
                        elseif ($p['stok'] <= 10) $stokClass = 'warning';
                    ?>
                    <tr>
                        <td style="color:#9ca3af; font-size:12px;"><?= $i + 1 ?></td>
                        <td><div class="produk-wrap"><div class="produk-icon"><?= strtoupper(substr($p['nama_produk'], 0, 1)) ?></div><span class="produk-name"><?= htmlspecialchars($p['nama_produk']) ?></span></div></td>
                        <td><span class="kat-pill"><?= htmlspecialchars($p['nama_kategori']) ?></span></td>
                        <td><span class="harga-text">Rp <?= number_format($p['harga_jual'], 0, ',', '.') ?></span></td>
                        <td><span class="stok-badge <?= $stokClass ?>"><?= $p['stok'] ?></span></td>
                        <td><span class="satuan-text"><?= htmlspecialchars($p['satuan']) ?></span></td>
                        <td>
                            <button class="btn-action btn-stok"
                                onclick="openModalEditStok('<?= $p['id_product'] ?>', '<?= htmlspecialchars($p['nama_produk'], ENT_QUOTES) ?>', '<?= $p['stok'] ?>', '<?= htmlspecialchars($p['satuan'], ENT_QUOTES) ?>')">
                                <i class="fas fa-cubes"></i> Edit Stok
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="no-data-row"><td colspan="7"><div class="no-data-icon"><i class="fas fa-box-open"></i></div><div>Belum terdapat data produk<?= !empty($filter_kategori) ? ' di kategori ini' : '' ?>.</div></td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="pagination-wrap"><div class="pagination-info" id="paginationInfo"></div><div class="pagination-controls" id="paginationControls"></div></div>
    </div>

    <!-- MODAL EDIT STOK -->
    <div class="modal-overlay" id="modalEditStok">
        <div class="modal-box">
            <div class="modal-header">
                <h4><i class="fas fa-cubes" style="color:#059669; margin-right:8px;"></i>Edit Stok</h4>
                <button class="modal-close" onclick="closeModal('modalEditStok')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('kasir/produk/update_stok') ?>" method="post">
                <input type="hidden" name="id_product" id="stok_id">
                <div class="modal-body">
                    <div class="stok-current-box">
                        <span class="label"><i class="fas fa-box" style="margin-right:6px; color:#d97706;"></i><span id="stok_nama_display"></span></span>
                        <div style="text-align:right;"><span class="label">Stok saat ini</span><div class="value" id="stok_current_display">0</div></div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Stok Baru <span>*</span></label>
                        <div class="input-wrap"><i class="fas fa-cubes input-icon"></i><input type="number" name="stok" id="stok_new" class="form-control-custom" placeholder="Masukkan jumlah stok baru" min="0" required></div>
                        <span style="font-size:11px; color:#9ca3af; margin-top:4px; display:block;" id="stok_satuan_hint"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modalEditStok')">Batal</button>
                    <button type="submit" class="btn-submit-green"><i class="fas fa-save"></i> Update Stok</button>
                </div>
            </form>
        </div>
    </div>

<script>
    var ROWS_PER_PAGE = 10, currentPage = 1, allRows = [], filteredRows = [];
    function initPagination() { allRows = Array.from(document.querySelectorAll('#produkTable tbody tr:not(.no-data-row)')); filteredRows = allRows.slice(); renderPage(1); }
    function renderPage(page) {
        currentPage = page; var total = filteredRows.length, pages = Math.ceil(total/ROWS_PER_PAGE)||1;
        var start=(page-1)*ROWS_PER_PAGE, end=Math.min(start+ROWS_PER_PAGE,total);
        allRows.forEach(function(r){r.style.display='none';}); filteredRows.forEach(function(r,i){r.style.display=(i>=start&&i<end)?'':'none';});
        document.getElementById('paginationInfo').innerHTML = total===0?'Tidak ada data':'Menampilkan <strong>'+(start+1)+'–'+end+'</strong> dari <strong>'+total+'</strong> produk';
        var ctrl=document.getElementById('paginationControls');ctrl.innerHTML='';
        var prev=document.createElement('button');prev.className='page-btn nav-btn';prev.innerHTML='<i class="fas fa-chevron-left"></i> Prev';prev.disabled=(page<=1);prev.onclick=function(){renderPage(currentPage-1);};ctrl.appendChild(prev);
        var sp=Math.max(1,page-2),ep=Math.min(pages,sp+4);if(ep-sp<4)sp=Math.max(1,ep-4);
        for(var p=sp;p<=ep;p++){(function(pg){var b=document.createElement('button');b.className='page-btn'+(pg===page?' active':'');b.textContent=pg;b.onclick=function(){renderPage(pg);};ctrl.appendChild(b);})(p);}
        var next=document.createElement('button');next.className='page-btn nav-btn';next.innerHTML='Next <i class="fas fa-chevron-right"></i>';next.disabled=(page>=pages);next.onclick=function(){renderPage(currentPage+1);};ctrl.appendChild(next);
    }
    function filterTable(){var kw=document.getElementById('searchProduk').value.toLowerCase();filteredRows=allRows.filter(function(r){return r.textContent.toLowerCase().includes(kw);});renderPage(1);}
    document.addEventListener('DOMContentLoaded', function(){initPagination();});
    function openModal(id){document.getElementById(id).classList.add('show');}
    function closeModal(id){document.getElementById(id).classList.remove('show');}
    function openModalEditStok(id,nama,stok,satuan){document.getElementById('stok_id').value=id;document.getElementById('stok_nama_display').textContent=nama;document.getElementById('stok_current_display').textContent=stok;document.getElementById('stok_new').value=stok;document.getElementById('stok_satuan_hint').textContent='Satuan: '+satuan;openModal('modalEditStok');}
    document.querySelectorAll('.modal-overlay').forEach(function(o){o.addEventListener('click',function(e){if(e.target===o)o.classList.remove('show');});});
    document.addEventListener('keydown',function(e){if(e.key==='Escape')document.querySelectorAll('.modal-overlay.show').forEach(function(m){m.classList.remove('show');});});
</script>
</div>
