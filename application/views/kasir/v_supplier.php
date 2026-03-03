<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path) { font-family: 'DM Sans','Segoe UI',sans-serif; }
    .page-title-row { padding: 24px 28px 0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
    .page-title-row h1 { font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 3px; letter-spacing: -0.3px; }
    .page-title-row p  { font-size: 12.5px; color: #9ca3af; margin: 0; }
    .supplier-stats { padding: 16px 24px 0; display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
    .sstat-card { background: #fff; border-radius: 12px; border: 1px solid #e8ecf0; padding: 16px 18px; display: flex; align-items: center; gap: 14px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
    .sstat-icon { width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; }
    .sstat-value { font-size: 22px; font-weight: 800; color: #111827; line-height: 1; }
    .sstat-label { font-size: 11.5px; color: #9ca3af; font-weight: 500; margin-top: 3px; }
    .main-card { margin: 16px 24px 28px; background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); overflow: hidden; }
    .card-toolbar { padding: 14px 20px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; }
    .count-badge { display: inline-flex; align-items: center; gap: 5px; background: #eff6ff; color: #1a56db; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 20px; }
    .search-box { display: flex; align-items: center; gap: 8px; background: #f8fafc; border: 1.5px solid #e8ecf0; border-radius: 8px; padding: 7px 12px; transition: border-color 0.15s; }
    .search-box:focus-within { border-color: #1a56db; background: #fff; }
    .search-box i { color: #9ca3af; font-size: 12px; }
    .search-box input { border: none; background: transparent; font-size: 13px; color: #374151; outline: none; width: 220px; font-family: 'DM Sans', sans-serif; }
    .data-table { width: 100%; border-collapse: collapse; }
    .data-table th { font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #9ca3af; padding: 11px 20px; text-align: left; background: #fafafa; border-bottom: 1px solid #f1f3f5; white-space: nowrap; }
    .data-table td { padding: 13px 20px; font-size: 13px; color: #374151; border-bottom: 1px solid #f7f8f9; vertical-align: middle; }
    .data-table tr:last-child td { border-bottom: none; }
    .data-table tr:hover td { background: #fafbff; }
    .sup-avatar { width: 36px; height: 36px; border-radius: 10px; display: inline-flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 700; color: white; background: linear-gradient(135deg, #0d3fa6, #1a56db); flex-shrink: 0; }
    .sup-wrap { display: flex; align-items: center; gap: 10px; }
    .sup-name { font-size: 13px; font-weight: 600; color: #111827; display: block; }
    .sup-kode { font-size: 11px; color: #9ca3af; display: block; font-family: 'Courier New', monospace; }
    .kontak-wrap .kontak-nama { font-size: 13px; font-weight: 500; color: #374151; display: block; }
    .kontak-wrap .kontak-telp { font-size: 11.5px; color: #9ca3af; display: block; margin-top: 1px; }
    .btn-action { display: inline-flex; align-items: center; gap: 5px; font-size: 11.5px; font-weight: 600; padding: 5px 10px; border-radius: 7px; border: none; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: background 0.15s; text-decoration: none; }
    .btn-detail { background: #f0fdf4; color: #16a34a; }
    .btn-detail:hover { background: #dcfce7; color: #16a34a; }
    .no-data-row td { text-align: center; padding: 48px 20px; color: #9ca3af; font-size: 13px; }
    .no-data-icon { width: 52px; height: 52px; background: #f3f4f6; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 22px; color: #d1d5db; margin: 0 auto 12px; }
    .pagination-wrap { padding: 14px 20px; border-top: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; }
    .pagination-info { font-size: 12.5px; color: #9ca3af; font-weight: 500; }
    .pagination-info strong { color: #374151; }
    .pagination-controls { display: flex; align-items: center; gap: 4px; }
    .page-btn { width: 32px; height: 32px; border: 1.5px solid #e5e7eb; border-radius: 8px; background: #fff; color: #374151; font-size: 12.5px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; transition: all 0.15s; font-family: 'DM Sans', sans-serif; }
    .page-btn:hover:not(:disabled) { background: #eff6ff; border-color: #bfdbfe; color: #1a56db; }
    .page-btn.active { background: #1a56db; border-color: #1a56db; color: #fff; }
    .page-btn:disabled { opacity: 0.35; cursor: not-allowed; }
    .page-btn.nav-btn { width: auto; padding: 0 10px; font-size: 12px; }
    .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.45); z-index: 99999; align-items: center; justify-content: center; padding: 20px; backdrop-filter: blur(3px); }
    .modal-overlay.show { display: flex; }
    .modal-box { background: #fff; border-radius: 16px; width: 100%; max-width: 480px; box-shadow: 0 20px 60px rgba(0,0,0,0.2); overflow: hidden; animation: modalIn 0.2s ease; }
    @keyframes modalIn { from { opacity: 0; transform: translateY(-16px) scale(0.97); } to { opacity: 1; transform: translateY(0) scale(1); } }
    .modal-header { padding: 18px 22px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; }
    .modal-header h4 { font-size: 15px; font-weight: 700; color: #111827; margin: 0; }
    .modal-close { width: 30px; height: 30px; background: #f3f4f6; border: none; border-radius: 7px; cursor: pointer; color: #6b7280; font-size: 13px; display: flex; align-items: center; justify-content: center; }
    .modal-close:hover { background: #e5e7eb; }
    .modal-body { padding: 20px 22px; }
    .modal-footer { padding: 14px 22px; border-top: 1px solid #f1f3f5; display: flex; justify-content: flex-end; gap: 10px; }
    .btn-cancel { padding: 9px 18px; border: 1.5px solid #e5e7eb; border-radius: 9px; background: #fff; color: #6b7280; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; }
    .detail-header-box { background: linear-gradient(135deg, #1a56db, #0d3fa6); border-radius: 12px; padding: 18px; display: flex; align-items: center; gap: 14px; margin-bottom: 18px; }
    .detail-avatar { width: 50px; height: 50px; background: rgba(255,255,255,0.2); border: 2px solid rgba(255,255,255,0.3); border-radius: 13px; display: flex; align-items: center; justify-content: center; font-size: 22px; font-weight: 700; color: #fff; flex-shrink: 0; }
    .detail-nama { font-size: 15px; font-weight: 700; color: #fff; display: block; }
    .detail-kode { font-size: 11.5px; color: rgba(255,255,255,0.75); font-family: 'Courier New', monospace; display: block; margin-top: 3px; }
    .detail-row { display: flex; align-items: flex-start; gap: 10px; padding: 10px 0; border-bottom: 1px solid #f1f3f5; }
    .detail-row:last-child { border-bottom: none; }
    .detail-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 12px; flex-shrink: 0; margin-top: 1px; }
    .detail-label { font-size: 11px; color: #9ca3af; font-weight: 500; display: block; }
    .detail-value { font-size: 13px; color: #111827; font-weight: 600; display: block; margin-top: 2px; word-break: break-word; }
    .alert-custom { margin: 16px 24px 0; padding: 11px 16px; border-radius: 10px; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 9px; }
    .alert-custom.success { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
    .alert-custom.error   { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }
    @media (max-width: 900px) { .supplier-stats { grid-template-columns: 1fr; } .page-title-row, .supplier-stats { padding-left: 16px; padding-right: 16px; } .main-card { margin: 16px 14px 24px; } }
</style>

    <div class="page-title-row">
        <div>
            <h1>Data Supplier</h1>
            <p>Daftar supplier PT Pordjo Steelindo Perkasa (read-only)</p>
        </div>
    </div>

    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert-custom error"><i class="fas fa-exclamation-circle"></i><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <?php $total_sup = count($suppliers); ?>
    <div class="supplier-stats">
        <div class="sstat-card">
            <div class="sstat-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-truck"></i></div>
            <div><div class="sstat-value"><?= $total_sup ?></div><div class="sstat-label">Total Supplier</div></div>
        </div>
        <div class="sstat-card">
            <div class="sstat-icon" style="background:#f0fdf4; color:#16a34a;"><i class="fas fa-check-circle"></i></div>
            <div>
                <?php $lengkap = count(array_filter($suppliers, fn($s) => !empty($s['nama_kontak']) && !empty($s['no_telp']))); ?>
                <div class="sstat-value"><?= $lengkap ?></div><div class="sstat-label">Data Kontak Lengkap</div>
            </div>
        </div>
        <div class="sstat-card">
            <div class="sstat-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-calendar-plus"></i></div>
            <div>
                <?php $bulan_ini = count(array_filter($suppliers, fn($s) => date('Y-m', strtotime($s['created_at'])) === date('Y-m'))); ?>
                <div class="sstat-value"><?= $bulan_ini ?></div><div class="sstat-label">Ditambah Bulan Ini</div>
            </div>
        </div>
    </div>

    <div class="main-card">
        <div class="card-toolbar">
            <div style="display:flex; align-items:center; gap:10px;">
                <span style="font-size:14px; font-weight:700; color:#111827;">Daftar Supplier</span>
                <span class="count-badge"><i class="fas fa-truck" style="font-size:10px;"></i><?= $total_sup ?> supplier</span>
            </div>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchSup" placeholder="Cari nama, kode, kontak..." onkeyup="filterTable()">
            </div>
        </div>

        <table class="data-table" id="supTable">
            <thead>
                <tr><th>#</th><th>Supplier</th><th>Kontak</th><th>Email</th><th>Alamat</th><th>Aksi</th></tr>
            </thead>
            <tbody>
                <?php if (!empty($suppliers)): ?>
                    <?php foreach ($suppliers as $i => $s): ?>
                    <tr>
                        <td style="color:#9ca3af; font-size:12px; width:40px;"><?= $i + 1 ?></td>
                        <td><div class="sup-wrap"><div class="sup-avatar"><?= strtoupper(substr($s['nama_supplier'], 0, 1)) ?></div><div><span class="sup-name"><?= htmlspecialchars($s['nama_supplier']) ?></span><span class="sup-kode"><?= htmlspecialchars($s['kode_supplier']) ?></span></div></div></td>
                        <td><div class="kontak-wrap"><span class="kontak-nama"><?= htmlspecialchars($s['nama_kontak'] ?: '-') ?></span><span class="kontak-telp"><?= !empty($s['no_telp']) ? '<i class="fas fa-phone" style="font-size:10px; margin-right:4px;"></i>' . htmlspecialchars($s['no_telp']) : '-' ?></span></div></td>
                        <td style="font-size:12.5px; color:#6b7280;"><?= !empty($s['email']) ? '<a href="mailto:'.htmlspecialchars($s['email']).'" style="color:#1a56db; text-decoration:none;">'.htmlspecialchars($s['email']).'</a>' : '<span style="color:#d1d5db;">—</span>' ?></td>
                        <td style="font-size:12.5px; color:#6b7280; max-width:160px;"><span style="display:block; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:160px;" title="<?= htmlspecialchars($s['alamat'] ?: '') ?>"><?= !empty($s['alamat']) ? htmlspecialchars($s['alamat']) : '<span style="color:#d1d5db;">—</span>' ?></span></td>
                        <td>
                            <button class="btn-action btn-detail" onclick="openDetail(<?= htmlspecialchars(json_encode($s), ENT_QUOTES) ?>)">
                                <i class="fas fa-eye"></i> Detail
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="no-data-row"><td colspan="6"><div class="no-data-icon"><i class="fas fa-truck"></i></div><div>Belum ada data supplier yang terdaftar.</div></td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="pagination-wrap"><div class="pagination-info" id="paginationInfo"></div><div class="pagination-controls" id="paginationControls"></div></div>
    </div>

    <!-- MODAL DETAIL -->
    <div class="modal-overlay" id="modalDetail">
        <div class="modal-box">
            <div class="modal-header">
                <h4><i class="fas fa-info-circle" style="color:#16a34a; margin-right:8px;"></i>Detail Supplier</h4>
                <button class="modal-close" onclick="closeModal('modalDetail')"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="detail-header-box"><div class="detail-avatar" id="det_avatar"></div><div><span class="detail-nama" id="det_nama"></span><span class="detail-kode" id="det_kode"></span></div></div>
                <div class="detail-row"><div class="detail-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-user"></i></div><div><span class="detail-label">Nama Kontak / PIC</span><span class="detail-value" id="det_kontak"></span></div></div>
                <div class="detail-row"><div class="detail-icon" style="background:#f0fdf4; color:#16a34a;"><i class="fas fa-phone"></i></div><div><span class="detail-label">No. Telepon</span><span class="detail-value" id="det_telp"></span></div></div>
                <div class="detail-row"><div class="detail-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-envelope"></i></div><div><span class="detail-label">Email</span><span class="detail-value" id="det_email"></span></div></div>
                <div class="detail-row"><div class="detail-icon" style="background:#fdf4ff; color:#9333ea;"><i class="fas fa-map-marker-alt"></i></div><div><span class="detail-label">Alamat</span><span class="detail-value" id="det_alamat"></span></div></div>
                <div class="detail-row"><div class="detail-icon" style="background:#f8fafc; color:#6b7280;"><i class="fas fa-sticky-note"></i></div><div><span class="detail-label">Keterangan</span><span class="detail-value" id="det_keterangan"></span></div></div>
            </div>
            <div class="modal-footer"><button type="button" class="btn-cancel" onclick="closeModal('modalDetail')">Tutup</button></div>
        </div>
    </div>

<script>
    function openModal(id){document.getElementById(id).classList.add('show');}
    function closeModal(id){document.getElementById(id).classList.remove('show');}
    function openDetail(s){document.getElementById('det_avatar').textContent=s.nama_supplier.charAt(0).toUpperCase();document.getElementById('det_nama').textContent=s.nama_supplier;document.getElementById('det_kode').textContent=s.kode_supplier;document.getElementById('det_kontak').textContent=s.nama_kontak||'—';document.getElementById('det_telp').textContent=s.no_telp||'—';document.getElementById('det_email').textContent=s.email||'—';document.getElementById('det_alamat').textContent=s.alamat||'—';document.getElementById('det_keterangan').textContent=s.keterangan||'—';openModal('modalDetail');}
    document.querySelectorAll('.modal-overlay').forEach(function(o){o.addEventListener('click',function(e){if(e.target===o)o.classList.remove('show');});});
    document.addEventListener('keydown',function(e){if(e.key==='Escape')document.querySelectorAll('.modal-overlay.show').forEach(function(m){m.classList.remove('show');});});
    var ROWS_PER_PAGE=10,currentPage=1,allRows=[],filteredRows=[];
    function initPagination(){allRows=Array.from(document.querySelectorAll('#supTable tbody tr:not(.no-data-row)'));filteredRows=allRows.slice();renderPage(1);}
    function renderPage(page){currentPage=page;var total=filteredRows.length,pages=Math.ceil(total/ROWS_PER_PAGE)||1;var start=(page-1)*ROWS_PER_PAGE,end=Math.min(start+ROWS_PER_PAGE,total);allRows.forEach(function(r){r.style.display='none';});filteredRows.forEach(function(r,i){r.style.display=(i>=start&&i<end)?'':'none';});document.getElementById('paginationInfo').innerHTML=total===0?'Tidak ada data':'Menampilkan <strong>'+(start+1)+'–'+end+'</strong> dari <strong>'+total+'</strong> supplier';var ctrl=document.getElementById('paginationControls');ctrl.innerHTML='';var prev=document.createElement('button');prev.className='page-btn nav-btn';prev.innerHTML='<i class="fas fa-chevron-left"></i> Prev';prev.disabled=(page<=1);prev.onclick=function(){renderPage(currentPage-1);};ctrl.appendChild(prev);var sp=Math.max(1,page-2),ep=Math.min(pages,sp+4);if(ep-sp<4)sp=Math.max(1,ep-4);for(var p=sp;p<=ep;p++){(function(pg){var b=document.createElement('button');b.className='page-btn'+(pg===page?' active':'');b.textContent=pg;b.onclick=function(){renderPage(pg);};ctrl.appendChild(b);})(p);}var next=document.createElement('button');next.className='page-btn nav-btn';next.innerHTML='Next <i class="fas fa-chevron-right"></i>';next.disabled=(page>=pages);next.onclick=function(){renderPage(currentPage+1);};ctrl.appendChild(next);}
    function filterTable(){var kw=document.getElementById('searchSup').value.toLowerCase();filteredRows=allRows.filter(function(r){return r.textContent.toLowerCase().includes(kw);});renderPage(1);}
    document.addEventListener('DOMContentLoaded',function(){initPagination();});
</script>
</div>
