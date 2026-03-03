<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path) { font-family: 'DM Sans','Segoe UI',sans-serif; }

    .page-title-row { padding: 24px 28px 0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
    .page-title-row h1 { font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 3px; letter-spacing: -0.3px; }
    .page-title-row p  { font-size: 12.5px; color: #9ca3af; margin: 0; }

    .btn-primary-custom {
        display: inline-flex; align-items: center; gap: 7px;
        background: linear-gradient(135deg, #1a56db, #0d3fa6);
        color: #fff !important; border: none; padding: 9px 18px;
        border-radius: 9px; font-size: 13px; font-weight: 600;
        cursor: pointer; text-decoration: none !important;
        box-shadow: 0 3px 10px rgba(26,86,219,0.3);
        transition: opacity 0.15s, transform 0.15s;
    }
    .btn-primary-custom:hover { opacity: 0.9; transform: translateY(-1px); }

    .main-card { margin: 20px 24px 28px; background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); overflow: hidden; }

    .card-toolbar { padding: 14px 20px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; }
    .count-badge { display: inline-flex; align-items: center; gap: 5px; background: #eff6ff; color: #1a56db; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 20px; }
    .search-box { display: flex; align-items: center; gap: 8px; background: #f8fafc; border: 1.5px solid #e8ecf0; border-radius: 8px; padding: 7px 12px; transition: border-color 0.15s; }
    .search-box:focus-within { border-color: #1a56db; background: #fff; }
    .search-box i { color: #9ca3af; font-size: 12px; }
    .search-box input { border: none; background: transparent; font-size: 13px; color: #374151; outline: none; width: 200px; font-family: 'DM Sans', sans-serif; }
    .search-box input::placeholder { color: #d1d5db; }

    .data-table { width: 100%; border-collapse: collapse; }
    .data-table th { font-size: 10.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #9ca3af; padding: 11px 20px; text-align: left; background: #fafafa; border-bottom: 1px solid #f1f3f5; }
    .data-table td { padding: 13px 20px; font-size: 13px; color: #374151; border-bottom: 1px solid #f7f8f9; vertical-align: middle; }
    .data-table tr:last-child td { border-bottom: none; }
    .data-table tr:hover td { background: #fafbff; }

    .kat-icon { width: 36px; height: 36px; border-radius: 9px; display: inline-flex; align-items: center; justify-content: center; font-size: 15px; font-weight: 700; color: white; background: linear-gradient(135deg, #1a56db, #0d3fa6); flex-shrink: 0; }
    .kat-name-wrap { display: flex; align-items: center; gap: 10px; }
    .kat-name-text { font-size: 13px; font-weight: 600; color: #111827; }

    .btn-action { display: inline-flex; align-items: center; gap: 5px; font-size: 11.5px; font-weight: 600; padding: 5px 10px; border-radius: 7px; border: none; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: background 0.15s; text-decoration: none; }
    .btn-edit   { background: #eff6ff; color: #1a56db; }
    .btn-edit:hover   { background: #dbeafe; color: #1a56db; }
    .btn-delete { background: #fef2f2; color: #dc2626; }
    .btn-delete:hover { background: #fee2e2; color: #dc2626; }
    .btn-stok   { background: #ecfdf5; color: #059669; }
    .btn-stok:hover   { background: #d1fae5; color: #059669; }

    .no-data-row td { text-align: center; padding: 48px 20px; color: #9ca3af; font-size: 13px; }
    .no-data-icon { width: 52px; height: 52px; background: #f3f4f6; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 22px; color: #d1d5db; margin: 0 auto 12px; }

    /* MODAL */
    .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.45); z-index: 99999; align-items: center; justify-content: center; padding: 20px; backdrop-filter: blur(3px); }
    .modal-overlay.show { display: flex; }
    .modal-box { background: #fff; border-radius: 16px; width: 100%; max-width: 420px; box-shadow: 0 20px 60px rgba(0,0,0,0.2); overflow: hidden; animation: modalIn 0.2s ease; }
    @keyframes modalIn { from { opacity: 0; transform: translateY(-16px) scale(0.97); } to { opacity: 1; transform: translateY(0) scale(1); } }
    .modal-header { padding: 18px 22px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; }
    .modal-header h4 { font-size: 15px; font-weight: 700; color: #111827; margin: 0; }
    .modal-close { width: 30px; height: 30px; background: #f3f4f6; border: none; border-radius: 7px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #6b7280; font-size: 13px; transition: background 0.15s; }
    .modal-close:hover { background: #e5e7eb; }
    .modal-body { padding: 20px 22px; }
    .form-group-custom { margin-bottom: 16px; }
    .form-label-custom { display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px; }
    .form-label-custom span { color: #dc2626; }
    .input-wrap { position: relative; }
    .input-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); font-size: 12px; color: #9ca3af; pointer-events: none; }
    .form-control-custom { width: 100%; padding: 10px 12px 10px 36px; border: 1.5px solid #e5e7eb; border-radius: 9px; font-size: 13px; font-family: 'DM Sans', sans-serif; color: #111827; background: #fafafa; outline: none; transition: border-color 0.15s, box-shadow 0.15s; }
    .form-control-custom:focus { border-color: #1a56db; background: #fff; box-shadow: 0 0 0 3px rgba(26,86,219,0.08); }
    .modal-footer { padding: 14px 22px; border-top: 1px solid #f1f3f5; display: flex; justify-content: flex-end; gap: 10px; }
    .btn-cancel { padding: 9px 18px; border: 1.5px solid #e5e7eb; border-radius: 9px; background: #fff; color: #6b7280; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: background 0.15s; }
    .btn-cancel:hover { background: #f9fafb; }
    .btn-submit { padding: 9px 20px; border: none; border-radius: 9px; background: linear-gradient(135deg, #1a56db, #0d3fa6); color: #fff; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; box-shadow: 0 3px 10px rgba(26,86,219,0.3); display: flex; align-items: center; gap: 6px; }
    .btn-submit:hover { opacity: 0.9; }
    .delete-modal-body { padding: 24px 22px; text-align: center; }
    .delete-icon { width: 56px; height: 56px; background: #fef2f2; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 24px; color: #dc2626; margin: 0 auto 16px; }
    .delete-modal-body h5 { font-size: 16px; font-weight: 700; color: #111827; margin-bottom: 8px; }
    .delete-modal-body p { font-size: 13px; color: #6b7280; margin: 0; line-height: 1.6; }
    .btn-delete-confirm { padding: 9px 20px; border: none; border-radius: 9px; background: linear-gradient(135deg, #dc2626, #b91c1c); color: #fff; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; box-shadow: 0 3px 10px rgba(220,38,38,0.3); display: flex; align-items: center; gap: 6px; }
    .btn-delete-confirm:hover { opacity: 0.9; }
    .alert-custom { margin: 16px 24px 0; padding: 11px 16px; border-radius: 10px; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 9px; }
    .alert-custom.success { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
    .alert-custom.error   { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }
</style>

    <!-- PAGE TITLE -->
    <div class="page-title-row">
        <div>
            <h1>Kategori Produk</h1>
            <p>Kelola kategori baja dan besi PT Pordjo Steelindo Perkasa</p>
        </div>
        <button class="btn-primary-custom" onclick="openModal('modalTambah')">
            <i class="fas fa-plus"></i> Tambah Kategori
        </button>
    </div>

    <!-- FLASH -->
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert-custom success"><i class="fas fa-check-circle"></i><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert-custom error"><i class="fas fa-exclamation-circle"></i><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <!-- TABLE -->
    <div class="main-card">
        <div class="card-toolbar">
            <div style="display:flex; align-items:center; gap:10px;">
                <span style="font-size:14px; font-weight:700; color:#111827;">Daftar Kategori</span>
                <span class="count-badge"><i class="fas fa-tag" style="font-size:10px;"></i><?= count($kategori) ?> kategori</span>
            </div>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchKat" placeholder="Cari kategori..." onkeyup="filterTable('searchKat','katTable')">
            </div>
        </div>

        <table class="data-table" id="katTable">
            <thead>
                <tr>
                    <th style="width:50px;">#</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($kategori)): ?>
                    <?php foreach ($kategori as $i => $k): ?>
                    <tr>
                        <td style="color:#9ca3af; font-size:12px;"><?= $k['id_category'] ?></td>
                        <td>
                            <div class="kat-name-wrap">
                                <div class="kat-icon"><?= strtoupper(substr($k['nama_kategori'], 0, 1)) ?></div>
                                <span class="kat-name-text"><?= htmlspecialchars($k['nama_kategori']) ?></span>
                            </div>
                        </td>
                        <td>
                            <div style="display:flex; gap:6px; flex-wrap:wrap;">
                                <a href="<?= site_url('admin/produk?id_category=' . $k['id_category']) ?>" class="btn-action btn-stok">
                                    <i class="fas fa-boxes"></i> Lihat Stok
                                </a>
                                <button class="btn-action btn-edit"
                                    onclick="openModalEdit('<?= $k['id_category'] ?>', '<?= htmlspecialchars($k['nama_kategori'], ENT_QUOTES) ?>')">
                                    <i class="fas fa-pen"></i> Edit
                                </button>
                                <button class="btn-action btn-delete"
                                    onclick="openModalDelete('<?= $k['id_category'] ?>', '<?= htmlspecialchars($k['nama_kategori'], ENT_QUOTES) ?>')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="no-data-row">
                        <td colspan="3">
                            <div class="no-data-icon"><i class="fas fa-tag"></i></div>
                            <div>Belum terdapat data kategori.</div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>


    <!-- MODAL TAMBAH -->
    <div class="modal-overlay" id="modalTambah">
        <div class="modal-box">
            <div class="modal-header">
                <h4><i class="fas fa-plus-circle" style="color:#1a56db; margin-right:8px;"></i>Tambah Kategori</h4>
                <button class="modal-close" onclick="closeModal('modalTambah')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/kategori/tambah') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group-custom" style="margin-bottom:0;">
                        <label class="form-label-custom">Nama Kategori <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-tag input-icon"></i>
                            <input type="text" name="nama_kategori" class="form-control-custom" placeholder="Contoh: Besi Beton" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modalTambah')">Batal</button>
                    <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div class="modal-overlay" id="modalEdit">
        <div class="modal-box">
            <div class="modal-header">
                <h4><i class="fas fa-pen" style="color:#1a56db; margin-right:8px;"></i>Edit Kategori</h4>
                <button class="modal-close" onclick="closeModal('modalEdit')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/kategori/update') ?>" method="post">
                <input type="hidden" name="id_category" id="edit_id">
                <div class="modal-body">
                    <div class="form-group-custom" style="margin-bottom:0;">
                        <label class="form-label-custom">Nama Kategori <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-tag input-icon"></i>
                            <input type="text" name="nama_kategori" id="edit_nama" class="form-control-custom" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modalEdit')">Batal</button>
                    <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL DELETE -->
    <div class="modal-overlay" id="modalDelete">
        <div class="modal-box">
            <div class="modal-header">
                <h4><i class="fas fa-trash" style="color:#dc2626; margin-right:8px;"></i>Hapus Kategori</h4>
                <button class="modal-close" onclick="closeModal('modalDelete')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/kategori/hapus') ?>" method="post">
                <input type="hidden" name="id_category" id="delete_id">
                <div class="delete-modal-body">
                    <div class="delete-icon"><i class="fas fa-exclamation-triangle"></i></div>
                    <h5>Hapus Kategori?</h5>
                    <p>Kategori <strong id="delete_nama"></strong> akan dihapus. Pastikan tidak ada produk yang masih menggunakan kategori ini.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modalDelete')">Batal</button>
                    <button type="submit" class="btn-delete-confirm"><i class="fas fa-trash"></i> Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>

<script>
    function openModal(id) { document.getElementById(id).classList.add('show'); }
    function closeModal(id) { document.getElementById(id).classList.remove('show'); }
    function openModalEdit(id, nama) {
        document.getElementById('edit_id').value   = id;
        document.getElementById('edit_nama').value = nama;
        openModal('modalEdit');
    }
    function openModalDelete(id, nama) {
        document.getElementById('delete_id').value          = id;
        document.getElementById('delete_nama').textContent  = nama;
        openModal('modalDelete');
    }
    document.querySelectorAll('.modal-overlay').forEach(function(o) {
        o.addEventListener('click', function(e) { if (e.target === o) o.classList.remove('show'); });
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') document.querySelectorAll('.modal-overlay.show').forEach(function(m) { m.classList.remove('show'); });
    });
    function filterTable(searchId, tableId) {
        var kw   = document.getElementById(searchId).value.toLowerCase();
        var rows = document.querySelectorAll('#' + tableId + ' tbody tr:not(.no-data-row)');
        rows.forEach(function(r) { r.style.display = r.textContent.toLowerCase().includes(kw) ? '' : 'none'; });
    }
</script>
</div>