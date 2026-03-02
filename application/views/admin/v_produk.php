<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path) { font-family: 'DM Sans','Segoe UI',sans-serif; }

    .page-title-row { padding: 24px 28px 0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
    .page-title-row h1 { font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 3px; letter-spacing: -0.3px; }
    .page-title-row p  { font-size: 12.5px; color: #9ca3af; margin: 0; }

    .btn-primary-custom { display: inline-flex; align-items: center; gap: 7px; background: linear-gradient(135deg, #1a56db, #0d3fa6); color: #fff !important; border: none; padding: 9px 18px; border-radius: 9px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; box-shadow: 0 3px 10px rgba(26,86,219,0.3); transition: opacity 0.15s, transform 0.15s; }
    .btn-primary-custom:hover { opacity: 0.9; transform: translateY(-1px); }
    .btn-back { display: inline-flex; align-items: center; gap: 7px; background: #f3f4f6; color: #374151 !important; border: none; padding: 9px 16px; border-radius: 9px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; transition: background 0.15s; }
    .btn-back:hover { background: #e5e7eb; }

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
    .produk-kat  { font-size: 11.5px; color: #9ca3af; display: block; }

    .kat-pill { display: inline-block; background: #fffbeb; color: #d97706; font-size: 11px; font-weight: 600; padding: 3px 9px; border-radius: 20px; }
    .harga-text { font-weight: 700; color: #111827; font-size: 13px; }
    .satuan-text { font-size: 11px; color: #9ca3af; font-weight: 500; }

    /* STOK BADGE */
    .stok-badge { display: inline-flex; align-items: center; gap: 5px; font-size: 12.5px; font-weight: 700; padding: 3px 10px; border-radius: 20px; }
    .stok-badge.ok       { background: #f0fdf4; color: #16a34a; }
    .stok-badge.warning  { background: #fffbeb; color: #d97706; }
    .stok-badge.critical { background: #fef2f2; color: #dc2626; }

    .btn-action { display: inline-flex; align-items: center; gap: 5px; font-size: 11.5px; font-weight: 600; padding: 5px 10px; border-radius: 7px; border: none; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: background 0.15s; text-decoration: none; }
    .btn-edit   { background: #eff6ff; color: #1a56db; }
    .btn-edit:hover   { background: #dbeafe; color: #1a56db; }
    .btn-stok   { background: #ecfdf5; color: #059669; }
    .btn-stok:hover   { background: #d1fae5; color: #059669; }
    .btn-delete { background: #fef2f2; color: #dc2626; }
    .btn-delete:hover { background: #fee2e2; color: #dc2626; }

    .no-data-row td { text-align: center; padding: 48px 20px; color: #9ca3af; font-size: 13px; }
    .no-data-icon { width: 52px; height: 52px; background: #f3f4f6; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 22px; color: #d1d5db; margin: 0 auto 12px; }

    /* MODAL */
    .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.45); z-index: 99999; align-items: center; justify-content: center; padding: 20px; backdrop-filter: blur(3px); }
    .modal-overlay.show { display: flex; }
    .modal-box { background: #fff; border-radius: 16px; width: 100%; max-width: 460px; box-shadow: 0 20px 60px rgba(0,0,0,0.2); overflow: hidden; animation: modalIn 0.2s ease; }
    .modal-box.modal-sm { max-width: 380px; }
    @keyframes modalIn { from { opacity: 0; transform: translateY(-16px) scale(0.97); } to { opacity: 1; transform: translateY(0) scale(1); } }
    .modal-header { padding: 18px 22px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; }
    .modal-header h4 { font-size: 15px; font-weight: 700; color: #111827; margin: 0; }
    .modal-close { width: 30px; height: 30px; background: #f3f4f6; border: none; border-radius: 7px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #6b7280; font-size: 13px; transition: background 0.15s; }
    .modal-close:hover { background: #e5e7eb; }
    .modal-body { padding: 20px 22px; }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
    .form-group-custom { margin-bottom: 16px; }
    .form-group-custom:last-child { margin-bottom: 0; }
    .form-label-custom { display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px; }
    .form-label-custom span { color: #dc2626; }
    .input-wrap { position: relative; }
    .input-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); font-size: 12px; color: #9ca3af; pointer-events: none; }
    .form-control-custom { width: 100%; padding: 10px 12px 10px 36px; border: 1.5px solid #e5e7eb; border-radius: 9px; font-size: 13px; font-family: 'DM Sans', sans-serif; color: #111827; background: #fafafa; outline: none; transition: border-color 0.15s, box-shadow 0.15s; }
    .form-control-custom:focus { border-color: #1a56db; background: #fff; box-shadow: 0 0 0 3px rgba(26,86,219,0.08); }
    .form-control-custom::placeholder { color: #d1d5db; }
    select.form-control-custom { cursor: pointer; }
    .modal-footer { padding: 14px 22px; border-top: 1px solid #f1f3f5; display: flex; justify-content: flex-end; gap: 10px; }
    .btn-cancel { padding: 9px 18px; border: 1.5px solid #e5e7eb; border-radius: 9px; background: #fff; color: #6b7280; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; transition: background 0.15s; }
    .btn-cancel:hover { background: #f9fafb; }
    .btn-submit { padding: 9px 20px; border: none; border-radius: 9px; background: linear-gradient(135deg, #1a56db, #0d3fa6); color: #fff; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; box-shadow: 0 3px 10px rgba(26,86,219,0.3); display: flex; align-items: center; gap: 6px; }
    .btn-submit-green { background: linear-gradient(135deg, #059669, #047857); box-shadow: 0 3px 10px rgba(5,150,105,0.3); }
    .btn-submit:hover { opacity: 0.9; }
    .delete-modal-body { padding: 24px 22px; text-align: center; }
    .delete-icon { width: 56px; height: 56px; background: #fef2f2; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 24px; color: #dc2626; margin: 0 auto 16px; }
    .delete-modal-body h5 { font-size: 16px; font-weight: 700; color: #111827; margin-bottom: 8px; }
    .delete-modal-body p { font-size: 13px; color: #6b7280; margin: 0; line-height: 1.6; }
    .btn-delete-confirm { padding: 9px 20px; border: none; border-radius: 9px; background: linear-gradient(135deg, #dc2626, #b91c1c); color: #fff; font-size: 13px; font-weight: 600; cursor: pointer; font-family: 'DM Sans', sans-serif; box-shadow: 0 3px 10px rgba(220,38,38,0.3); display: flex; align-items: center; gap: 6px; }

    /* stok highlight di modal edit stok */
    .stok-current-box { background: #f8fafc; border: 1px solid #e8ecf0; border-radius: 10px; padding: 12px 14px; margin-bottom: 16px; display: flex; align-items: center; justify-content: space-between; }
    .stok-current-box .label { font-size: 12px; color: #6b7280; font-weight: 500; }
    .stok-current-box .value { font-size: 20px; font-weight: 800; color: #111827; }

    .alert-custom { margin: 16px 24px 0; padding: 11px 16px; border-radius: 10px; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 9px; }
    .alert-custom.success { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
    .alert-custom.error   { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

    /* ===== PAGINATION ===== */
    .pagination-wrap {
        padding: 14px 20px;
        border-top: 1px solid #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }

    .pagination-info {
        font-size: 12.5px;
        color: #9ca3af;
        font-weight: 500;
    }

    .pagination-info strong {
        color: #374151;
    }

    .pagination-controls {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .page-btn {
        width: 32px;
        height: 32px;
        border: 1.5px solid #e5e7eb;
        border-radius: 8px;
        background: #ffffff;
        color: #374151;
        font-size: 12.5px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.15s;
        font-family: 'DM Sans', sans-serif;
    }

    .page-btn:hover:not(:disabled) {
        background: #eff6ff;
        border-color: #bfdbfe;
        color: #1a56db;
    }

    .page-btn.active {
        background: #1a56db;
        border-color: #1a56db;
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(26,86,219,0.3);
    }

    .page-btn:disabled {
        opacity: 0.35;
        cursor: not-allowed;
    }

    .page-btn.nav-btn {
        width: auto;
        padding: 0 10px;
        gap: 5px;
        font-size: 12px;
    }

    @media (max-width: 768px) {
        .page-title-row, .filter-bar { padding-left: 16px; padding-right: 16px; }
        .main-card { margin: 16px 14px 24px; }
        .form-row { grid-template-columns: 1fr; }
        .data-table th:nth-child(2), .data-table td:nth-child(2) { display: none; }
    }
</style>

    <!-- PAGE TITLE -->
    <div class="page-title-row">
        <div>
            <h1>Stok Produk</h1>
            <p>
                <?php if ($this->session->userdata('role') === 'admin'): ?>
                    Kelola seluruh produk baja dan besi
                <?php else: ?>
                    Lihat dan perbarui stok produk
                <?php endif; ?>
            </p>
        </div>
        <div style="display:flex; gap:10px; align-items:center;">
            <a href="<?= site_url('admin/kategori') ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kategori
            </a>
            <?php if ($this->session->userdata('role') === 'admin'): ?>
            <button class="btn-primary-custom" onclick="openModal('modalTambah')">
                <i class="fas fa-plus"></i> Tambah Produk
            </button>
            <?php endif; ?>
        </div>
    </div>

    <!-- FILTER AKTIF -->
    <?php if (!empty($filter_kategori)): ?>
    <div class="filter-bar">
        <span class="filter-badge">
            <i class="fas fa-filter" style="font-size:10px;"></i>
            Filter: <?= htmlspecialchars($filter_kategori) ?>
            <a href="<?= site_url('admin/produk') ?>">✕ Hapus filter</a>
        </span>
    </div>
    <?php endif; ?>

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
                <span style="font-size:14px; font-weight:700; color:#111827;">Daftar Produk</span>
                <span class="count-badge"><i class="fas fa-box" style="font-size:10px;"></i><?= count($produk) ?> produk</span>
            </div>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchProduk" placeholder="Cari nama produk..." onkeyup="filterTable('searchProduk','produkTable')">
            </div>
        </div>

        <table class="data-table" id="produkTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($produk)): ?>
                    <?php foreach ($produk as $i => $p): ?>
                    <?php
                        $stokClass = 'ok';
                        if ($p['stok'] <= 3)  $stokClass = 'critical';
                        elseif ($p['stok'] <= 10) $stokClass = 'warning';
                    ?>
                    <tr>
                        <td style="color:#9ca3af; font-size:12px;"><?= $i + 1 ?></td>
                        <td>
                            <div class="produk-wrap">
                                <div class="produk-icon"><?= strtoupper(substr($p['nama_produk'], 0, 1)) ?></div>
                                <span class="produk-name"><?= htmlspecialchars($p['nama_produk']) ?></span>
                            </div>
                        </td>
                        <td><span class="kat-pill"><?= htmlspecialchars($p['nama_kategori']) ?></span></td>
                        <td><span class="harga-text">Rp <?= number_format($p['harga_jual'], 0, ',', '.') ?></span></td>
                        <td><span class="stok-badge <?= $stokClass ?>"><?= $p['stok'] ?></span></td>
                        <td><span class="satuan-text"><?= htmlspecialchars($p['satuan']) ?></span></td>
                        <td>
                            <div style="display:flex; gap:6px; flex-wrap:wrap;">
                                <!-- Kasir hanya bisa edit stok -->
                                <button class="btn-action btn-stok"
                                    onclick="openModalEditStok('<?= $p['id_product'] ?>', '<?= htmlspecialchars($p['nama_produk'], ENT_QUOTES) ?>', '<?= $p['stok'] ?>', '<?= htmlspecialchars($p['satuan'], ENT_QUOTES) ?>')">
                                    <i class="fas fa-cubes"></i> Edit Stok
                                </button>
                                <?php if ($this->session->userdata('role') === 'admin'): ?>
                                <button class="btn-action btn-edit"
                                    onclick="openModalEdit(
                                        '<?= $p['id_product'] ?>',
                                        '<?= htmlspecialchars($p['nama_produk'], ENT_QUOTES) ?>',
                                        '<?= $p['id_category'] ?>',
                                        '<?= $p['harga_jual'] ?>',
                                        '<?= $p['stok'] ?>',
                                        '<?= htmlspecialchars($p['satuan'], ENT_QUOTES) ?>'
                                    )">
                                    <i class="fas fa-pen"></i> Edit
                                </button>
                                <button class="btn-action btn-delete"
                                    onclick="openModalDelete('<?= $p['id_product'] ?>', '<?= htmlspecialchars($p['nama_produk'], ENT_QUOTES) ?>')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="no-data-row">
                        <td colspan="7">
                            <div class="no-data-icon"><i class="fas fa-box-open"></i></div>
                            <div>Belum ada produk<?= !empty($filter_kategori) ? ' di kategori ini' : '' ?></div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- PAGINATION -->
        <div class="pagination-wrap" id="paginationWrap">
            <div class="pagination-info" id="paginationInfo"></div>
            <div class="pagination-controls" id="paginationControls"></div>
        </div>
    </div>


    <!-- MODAL TAMBAH (admin only) -->
    <?php if ($this->session->userdata('role') === 'admin'): ?>
    <div class="modal-overlay" id="modalTambah">
        <div class="modal-box">
            <div class="modal-header">
                <h4><i class="fas fa-plus-circle" style="color:#1a56db; margin-right:8px;"></i>Tambah Produk</h4>
                <button class="modal-close" onclick="closeModal('modalTambah')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/produk/tambah') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group-custom">
                        <label class="form-label-custom">Nama Produk <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-box input-icon"></i>
                            <input type="text" name="nama_produk" class="form-control-custom" placeholder="Contoh: Besi Beton 10mm" required>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Kategori <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-tag input-icon"></i>
                            <select name="id_category" class="form-control-custom" required>
                                <option value="" disabled selected>-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id_category'] ?>"><?= htmlspecialchars($k['nama_kategori']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group-custom">
                            <label class="form-label-custom">Harga Jual <span>*</span></label>
                            <div class="input-wrap">
                                <i class="fas fa-money-bill input-icon"></i>
                                <input type="number" name="harga_jual" class="form-control-custom" placeholder="0" min="0" required>
                            </div>
                        </div>
                        <div class="form-group-custom">
                            <label class="form-label-custom">Stok Awal <span>*</span></label>
                            <div class="input-wrap">
                                <i class="fas fa-cubes input-icon"></i>
                                <input type="number" name="stok" class="form-control-custom" placeholder="0" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Satuan <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-ruler input-icon"></i>
                            <input type="text" name="satuan" class="form-control-custom" placeholder="Contoh: batang, lembar, pcs, kg" required>
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

    <!-- MODAL EDIT FULL (admin only) -->
    <div class="modal-overlay" id="modalEdit">
        <div class="modal-box">
            <div class="modal-header">
                <h4><i class="fas fa-pen" style="color:#1a56db; margin-right:8px;"></i>Edit Produk</h4>
                <button class="modal-close" onclick="closeModal('modalEdit')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/produk/update') ?>" method="post">
                <input type="hidden" name="id_product" id="edit_id">
                <div class="modal-body">
                    <div class="form-group-custom">
                        <label class="form-label-custom">Nama Produk <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-box input-icon"></i>
                            <input type="text" name="nama_produk" id="edit_nama" class="form-control-custom" required>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Kategori <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-tag input-icon"></i>
                            <select name="id_category" id="edit_kat" class="form-control-custom" required>
                                <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id_category'] ?>"><?= htmlspecialchars($k['nama_kategori']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group-custom">
                            <label class="form-label-custom">Harga Jual <span>*</span></label>
                            <div class="input-wrap">
                                <i class="fas fa-money-bill input-icon"></i>
                                <input type="number" name="harga_jual" id="edit_harga" class="form-control-custom" min="0" required>
                            </div>
                        </div>
                        <div class="form-group-custom">
                            <label class="form-label-custom">Stok <span>*</span></label>
                            <div class="input-wrap">
                                <i class="fas fa-cubes input-icon"></i>
                                <input type="number" name="stok" id="edit_stok" class="form-control-custom" min="0" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Satuan <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-ruler input-icon"></i>
                            <input type="text" name="satuan" id="edit_satuan" class="form-control-custom" required>
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

    <!-- MODAL DELETE (admin only) -->
    <div class="modal-overlay" id="modalDelete">
        <div class="modal-box modal-sm">
            <div class="modal-header">
                <h4><i class="fas fa-trash" style="color:#dc2626; margin-right:8px;"></i>Hapus Produk</h4>
                <button class="modal-close" onclick="closeModal('modalDelete')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/produk/hapus') ?>" method="post">
                <input type="hidden" name="id_product" id="del_id">
                <div class="delete-modal-body">
                    <div class="delete-icon"><i class="fas fa-exclamation-triangle"></i></div>
                    <h5>Hapus Produk?</h5>
                    <p>Produk <strong id="del_nama"></strong> akan dihapus permanen.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modalDelete')">Batal</button>
                    <button type="submit" class="btn-delete-confirm"><i class="fas fa-trash"></i> Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>


    <!-- MODAL EDIT STOK (admin & kasir) -->
    <div class="modal-overlay" id="modalEditStok">
        <div class="modal-box modal-sm">
            <div class="modal-header">
                <h4><i class="fas fa-cubes" style="color:#059669; margin-right:8px;"></i>Edit Stok</h4>
                <button class="modal-close" onclick="closeModal('modalEditStok')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url($this->session->userdata('role') === 'admin' ? 'admin/produk/update_stok' : 'kasir/produk/update_stok') ?>" method="post">
                <input type="hidden" name="id_product" id="stok_id">
                <div class="modal-body">
                    <div class="stok-current-box">
                        <span class="label"><i class="fas fa-box" style="margin-right:6px; color:#d97706;"></i><span id="stok_nama_display"></span></span>
                        <div style="text-align:right;">
                            <span class="label">Stok saat ini</span>
                            <div class="value" id="stok_current_display">0</div>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Stok Baru <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-cubes input-icon"></i>
                            <input type="number" name="stok" id="stok_new" class="form-control-custom" placeholder="Masukkan jumlah stok baru" min="0" required>
                        </div>
                        <span style="font-size:11px; color:#9ca3af; margin-top:4px; display:block;" id="stok_satuan_hint"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modalEditStok')">Batal</button>
                    <button type="submit" class="btn-submit btn-submit-green"><i class="fas fa-save"></i> Update Stok</button>
                </div>
            </form>
        </div>
    </div>


<script>
    // ===== PAGINATION =====
    var ROWS_PER_PAGE = 10;
    var currentPage  = 1;
    var allRows      = [];
    var filteredRows = [];

    function initPagination() {
        allRows      = Array.from(document.querySelectorAll('#produkTable tbody tr:not(.no-data-row)'));
        filteredRows = allRows.slice();
        renderPage(1);
    }

    function renderPage(page) {
        currentPage = page;
        var total   = filteredRows.length;
        var pages   = Math.ceil(total / ROWS_PER_PAGE) || 1;
        var start   = (page - 1) * ROWS_PER_PAGE;
        var end     = Math.min(start + ROWS_PER_PAGE, total);

        // Show/hide rows
        allRows.forEach(function(r) { r.style.display = 'none'; });
        filteredRows.forEach(function(r, i) {
            r.style.display = (i >= start && i < end) ? '' : 'none';
        });

        // Info text
        var info = document.getElementById('paginationInfo');
        if (total === 0) {
            info.innerHTML = 'Tidak ada data';
        } else {
            info.innerHTML = 'Menampilkan <strong>' + (start + 1) + '–' + end + '</strong> dari <strong>' + total + '</strong> produk';
        }

        // Buttons
        var ctrl = document.getElementById('paginationControls');
        ctrl.innerHTML = '';

        // Prev button
        var prev = document.createElement('button');
        prev.className = 'page-btn nav-btn';
        prev.innerHTML = '<i class="fas fa-chevron-left"></i> Prev';
        prev.disabled  = (page <= 1);
        prev.onclick   = function() { renderPage(currentPage - 1); };
        ctrl.appendChild(prev);

        // Page number buttons (show max 5 pages)
        var startPage = Math.max(1, page - 2);
        var endPage   = Math.min(pages, startPage + 4);
        if (endPage - startPage < 4) startPage = Math.max(1, endPage - 4);

        for (var p = startPage; p <= endPage; p++) {
            (function(pg) {
                var btn = document.createElement('button');
                btn.className = 'page-btn' + (pg === page ? ' active' : '');
                btn.textContent = pg;
                btn.onclick = function() { renderPage(pg); };
                ctrl.appendChild(btn);
            })(p);
        }

        // Next button
        var next = document.createElement('button');
        next.className = 'page-btn nav-btn';
        next.innerHTML = 'Next <i class="fas fa-chevron-right"></i>';
        next.disabled  = (page >= pages);
        next.onclick   = function() { renderPage(currentPage + 1); };
        ctrl.appendChild(next);
    }

    // ===== SEARCH dengan pagination =====
    function filterTable(searchId, tableId) {
        var kw = document.getElementById(searchId).value.toLowerCase();
        filteredRows = allRows.filter(function(r) {
            return r.textContent.toLowerCase().includes(kw);
        });
        renderPage(1);
    }

    // Init setelah DOM siap
    document.addEventListener('DOMContentLoaded', function() { initPagination(); });

    // ===== MODAL FUNCTIONS =====
    function openModal(id) { document.getElementById(id).classList.add('show'); }
    function closeModal(id) { document.getElementById(id).classList.remove('show'); }

    function openModalEdit(id, nama, katId, harga, stok, satuan) {
        document.getElementById('edit_id').value     = id;
        document.getElementById('edit_nama').value   = nama;
        document.getElementById('edit_kat').value    = katId;
        document.getElementById('edit_harga').value  = harga;
        document.getElementById('edit_stok').value   = stok;
        document.getElementById('edit_satuan').value = satuan;
        openModal('modalEdit');
    }

    function openModalDelete(id, nama) {
        document.getElementById('del_id').value          = id;
        document.getElementById('del_nama').textContent  = nama;
        openModal('modalDelete');
    }

    function openModalEditStok(id, nama, stok, satuan) {
        document.getElementById('stok_id').value                   = id;
        document.getElementById('stok_nama_display').textContent   = nama;
        document.getElementById('stok_current_display').textContent = stok;
        document.getElementById('stok_new').value                  = stok;
        document.getElementById('stok_satuan_hint').textContent    = 'Satuan: ' + satuan;
        openModal('modalEditStok');
    }

    document.querySelectorAll('.modal-overlay').forEach(function(o) {
        o.addEventListener('click', function(e) { if (e.target === o) o.classList.remove('show'); });
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') document.querySelectorAll('.modal-overlay.show').forEach(function(m) { m.classList.remove('show'); });
    });
</script>
</div>