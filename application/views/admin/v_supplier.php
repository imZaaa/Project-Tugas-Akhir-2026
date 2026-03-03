<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path) { font-family: 'DM Sans','Segoe UI',sans-serif; }

    .page-title-row { padding: 24px 28px 0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px; }
    .page-title-row h1 { font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 3px; letter-spacing: -0.3px; }
    .page-title-row p  { font-size: 12.5px; color: #9ca3af; margin: 0; }

    .btn-primary-custom { display: inline-flex; align-items: center; gap: 7px; background: linear-gradient(135deg, #1a56db, #0d3fa6); color: #fff !important; border: none; padding: 9px 18px; border-radius: 9px; font-size: 13px; font-weight: 600; cursor: pointer; text-decoration: none !important; box-shadow: 0 3px 10px rgba(26,86,219,0.3); transition: opacity 0.15s, transform 0.15s; }
    .btn-primary-custom:hover { opacity: 0.9; transform: translateY(-1px); }

    /* STAT CARDS */
    .supplier-stats { padding: 16px 24px 0; display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
    .sstat-card { background: #fff; border-radius: 12px; border: 1px solid #e8ecf0; padding: 16px 18px; display: flex; align-items: center; gap: 14px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
    .sstat-icon { width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; }
    .sstat-value { font-size: 22px; font-weight: 800; color: #111827; line-height: 1; }
    .sstat-label { font-size: 11.5px; color: #9ca3af; font-weight: 500; margin-top: 3px; }

    /* MAIN CARD */
    .main-card { margin: 16px 24px 28px; background: #fff; border-radius: 14px; border: 1px solid #e8ecf0; box-shadow: 0 2px 12px rgba(0,0,0,0.04); overflow: hidden; }
    .card-toolbar { padding: 14px 20px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; }
    .count-badge { display: inline-flex; align-items: center; gap: 5px; background: #eff6ff; color: #1a56db; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 20px; }
    .search-box { display: flex; align-items: center; gap: 8px; background: #f8fafc; border: 1.5px solid #e8ecf0; border-radius: 8px; padding: 7px 12px; transition: border-color 0.15s; }
    .search-box:focus-within { border-color: #1a56db; background: #fff; }
    .search-box i { color: #9ca3af; font-size: 12px; }
    .search-box input { border: none; background: transparent; font-size: 13px; color: #374151; outline: none; width: 220px; font-family: 'DM Sans', sans-serif; }
    .search-box input::placeholder { color: #d1d5db; }

    /* TABLE */
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
    .btn-edit   { background: #eff6ff; color: #1a56db; }
    .btn-edit:hover   { background: #dbeafe; color: #1a56db; }
    .btn-detail { background: #f0fdf4; color: #16a34a; }
    .btn-detail:hover { background: #dcfce7; color: #16a34a; }
    .btn-delete { background: #fef2f2; color: #dc2626; }
    .btn-delete:hover { background: #fee2e2; color: #dc2626; }

    .no-data-row td { text-align: center; padding: 48px 20px; color: #9ca3af; font-size: 13px; }
    .no-data-icon { width: 52px; height: 52px; background: #f3f4f6; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 22px; color: #d1d5db; margin: 0 auto 12px; }

    /* PAGINATION */
    .pagination-wrap { padding: 14px 20px; border-top: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; }
    .pagination-info { font-size: 12.5px; color: #9ca3af; font-weight: 500; }
    .pagination-info strong { color: #374151; }
    .pagination-controls { display: flex; align-items: center; gap: 4px; }
    .page-btn { width: 32px; height: 32px; border: 1.5px solid #e5e7eb; border-radius: 8px; background: #fff; color: #374151; font-size: 12.5px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; justify-content: center; transition: all 0.15s; font-family: 'DM Sans', sans-serif; }
    .page-btn:hover:not(:disabled) { background: #eff6ff; border-color: #bfdbfe; color: #1a56db; }
    .page-btn.active { background: #1a56db; border-color: #1a56db; color: #fff; box-shadow: 0 2px 8px rgba(26,86,219,0.3); }
    .page-btn:disabled { opacity: 0.35; cursor: not-allowed; }
    .page-btn.nav-btn { width: auto; padding: 0 10px; gap: 5px; font-size: 12px; }

    /* MODAL */
    .modal-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.45); z-index: 99999; align-items: center; justify-content: center; padding: 20px; backdrop-filter: blur(3px); }
    .modal-overlay.show { display: flex; }
    .modal-box { background: #fff; border-radius: 16px; width: 100%; max-width: 520px; box-shadow: 0 20px 60px rgba(0,0,0,0.2); overflow: hidden; animation: modalIn 0.2s ease; max-height: 90vh; overflow-y: auto; }
    .modal-box.modal-sm { max-width: 380px; overflow-y: visible; }
    .modal-box.modal-detail { max-width: 480px; }
    @keyframes modalIn { from { opacity: 0; transform: translateY(-16px) scale(0.97); } to { opacity: 1; transform: translateY(0) scale(1); } }
    .modal-header { padding: 18px 22px; border-bottom: 1px solid #f1f3f5; display: flex; align-items: center; justify-content: space-between; position: sticky; top: 0; background: #fff; z-index: 1; }
    .modal-header h4 { font-size: 15px; font-weight: 700; color: #111827; margin: 0; }
    .modal-close { width: 30px; height: 30px; background: #f3f4f6; border: none; border-radius: 7px; display: flex; align-items: center; justify-content: center; cursor: pointer; color: #6b7280; font-size: 13px; transition: background 0.15s; flex-shrink: 0; }
    .modal-close:hover { background: #e5e7eb; }
    .modal-body { padding: 20px 22px; }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
    .form-group-custom { margin-bottom: 14px; }
    .form-group-custom:last-child { margin-bottom: 0; }
    .form-label-custom { display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px; }
    .form-label-custom span { color: #dc2626; }
    .input-wrap { position: relative; }
    .input-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); font-size: 12px; color: #9ca3af; pointer-events: none; }
    .input-icon.top { top: 14px; transform: none; }
    .form-control-custom { width: 100%; padding: 10px 12px 10px 36px; border: 1.5px solid #e5e7eb; border-radius: 9px; font-size: 13px; font-family: 'DM Sans', sans-serif; color: #111827; background: #fafafa; outline: none; transition: border-color 0.15s, box-shadow 0.15s; }
    .form-control-custom:focus { border-color: #1a56db; background: #fff; box-shadow: 0 0 0 3px rgba(26,86,219,0.08); }
    .form-control-custom::placeholder { color: #d1d5db; }
    textarea.form-control-custom { padding-top: 10px; resize: vertical; min-height: 80px; }
    .modal-footer { padding: 14px 22px; border-top: 1px solid #f1f3f5; display: flex; justify-content: flex-end; gap: 10px; position: sticky; bottom: 0; background: #fff; }
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

    /* DETAIL MODAL */
    .detail-header-box { background: linear-gradient(135deg, #1a56db, #0d3fa6); border-radius: 12px; padding: 18px; display: flex; align-items: center; gap: 14px; margin-bottom: 18px; }
    .detail-avatar { width: 50px; height: 50px; background: rgba(255,255,255,0.2); border: 2px solid rgba(255,255,255,0.3); border-radius: 13px; display: flex; align-items: center; justify-content: center; font-size: 22px; font-weight: 700; color: #fff; flex-shrink: 0; }
    .detail-nama { font-size: 15px; font-weight: 700; color: #fff; display: block; }
    .detail-kode { font-size: 11.5px; color: rgba(255,255,255,0.75); font-family: 'Courier New', monospace; display: block; margin-top: 3px; }
    .detail-row { display: flex; align-items: flex-start; gap: 10px; padding: 10px 0; border-bottom: 1px solid #f1f3f5; }
    .detail-row:last-child { border-bottom: none; }
    .detail-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 12px; flex-shrink: 0; margin-top: 1px; }
    .detail-label { font-size: 11px; color: #9ca3af; font-weight: 500; display: block; }
    .detail-value { font-size: 13px; color: #111827; font-weight: 600; display: block; margin-top: 2px; word-break: break-word; }

    /* ALERT */
    .alert-custom { margin: 16px 24px 0; padding: 11px 16px; border-radius: 10px; font-size: 13px; font-weight: 500; display: flex; align-items: center; gap: 9px; }
    .alert-custom.success { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
    .alert-custom.error   { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

    @media (max-width: 900px) {
        .supplier-stats { grid-template-columns: 1fr; }
        .form-row { grid-template-columns: 1fr; }
        .page-title-row, .supplier-stats { padding-left: 16px; padding-right: 16px; }
        .main-card { margin: 16px 14px 24px; }
    }
</style>

    <!-- PAGE TITLE -->
    <div class="page-title-row">
        <div>
            <h1>Data Supplier</h1>
            <p>Kelola data supplier PT Pordjo Steelindo Perkasa</p>
        </div>
        <button class="btn-primary-custom" onclick="openModal('modalTambah')">
            <i class="fas fa-plus"></i> Tambah Supplier
        </button>
    </div>

    <!-- FLASH -->
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert-custom success"><i class="fas fa-check-circle"></i><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert-custom error"><i class="fas fa-exclamation-circle"></i><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <!-- STAT CARDS -->
    <?php
        $total_sup   = count($suppliers);
        $lengkap     = count(array_filter($suppliers, fn($s) => !empty($s['nama_kontak']) && !empty($s['no_telp']) && !empty($s['email']) && !empty($s['alamat'])));
        $tidak_lengkap = $total_sup - $lengkap;
        $bulan_ini   = count(array_filter($suppliers, fn($s) => date('Y-m', strtotime($s['created_at'])) === date('Y-m')));
    ?>
    <div class="supplier-stats">
        <div class="sstat-card">
            <div class="sstat-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-truck"></i></div>
            <div>
                <div class="sstat-value"><?= $total_sup ?></div>
                <div class="sstat-label">Total Supplier</div>
            </div>
        </div>
        <div class="sstat-card">
            <div class="sstat-icon" style="background:#f0fdf4; color:#16a34a;"><i class="fas fa-check-circle"></i></div>
            <div>
                <div class="sstat-value"><?= $lengkap ?></div>
                <div class="sstat-label">Data Lengkap</div>
            </div>
            <div style="margin-left:auto; font-size:11px; color:#9ca3af; text-align:right; line-height:1.6;">
                <?php if ($tidak_lengkap > 0): ?>
                <span style="color:#f97316; font-weight:600;"><?= $tidak_lengkap ?> belum lengkap</span>
                <?php else: ?>
                <span style="color:#16a34a; font-weight:600;">Semua lengkap ✓</span>
                <?php endif; ?>
            </div>
        </div>
        <div class="sstat-card">
            <div class="sstat-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-calendar-plus"></i></div>
            <div>
                <div class="sstat-value"><?= $bulan_ini ?></div>
                <div class="sstat-label">Ditambah Bulan Ini</div>
            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="main-card">
        <div class="card-toolbar">
            <div style="display:flex; align-items:center; gap:10px;">
                <span style="font-size:14px; font-weight:700; color:#111827;">Daftar Supplier</span>
                <span class="count-badge"><i class="fas fa-truck" style="font-size:10px;"></i><?= count($suppliers) ?> supplier</span>
            </div>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchSup" placeholder="Cari nama, kode, kontak..." onkeyup="filterTable()">
            </div>
        </div>

        <table class="data-table" id="supTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Supplier</th>
                    <th>Kontak</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($suppliers)): ?>
                    <?php foreach ($suppliers as $i => $s): ?>
                    <tr>
                        <td style="color:#9ca3af; font-size:12px; width:40px;"><?= $i + 1 ?></td>
                        <td>
                            <div class="sup-wrap">
                                <div class="sup-avatar"><?= strtoupper(substr($s['nama_supplier'], 0, 1)) ?></div>
                                <div>
                                    <span class="sup-name"><?= htmlspecialchars($s['nama_supplier']) ?></span>
                                    <span class="sup-kode"><?= htmlspecialchars($s['kode_supplier']) ?></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="kontak-wrap">
                                <span class="kontak-nama"><?= htmlspecialchars($s['nama_kontak'] ?: '-') ?></span>
                                <span class="kontak-telp"><?= !empty($s['no_telp']) ? '<i class="fas fa-phone" style="font-size:10px; margin-right:4px;"></i>' . htmlspecialchars($s['no_telp']) : '-' ?></span>
                            </div>
                        </td>
                        <td style="font-size:12.5px; color:#6b7280;">
                            <?= !empty($s['email']) ? '<a href="mailto:'.htmlspecialchars($s['email']).'" style="color:#1a56db; text-decoration:none;">'.htmlspecialchars($s['email']).'</a>' : '<span style="color:#d1d5db;">—</span>' ?>
                        </td>
                        <td style="font-size:12.5px; color:#6b7280; max-width:160px;">
                            <span style="display:block; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:160px;" title="<?= htmlspecialchars($s['alamat'] ?: '') ?>">
                                <?= !empty($s['alamat']) ? htmlspecialchars($s['alamat']) : '<span style="color:#d1d5db;">—</span>' ?>
                            </span>
                        </td>
                        <td>
                            <div style="display:flex; gap:6px; flex-wrap:wrap;">
                                <button class="btn-action btn-detail" onclick="openDetail(<?= htmlspecialchars(json_encode($s), ENT_QUOTES) ?>)">
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                                <button class="btn-action btn-edit" onclick="openEdit(<?= htmlspecialchars(json_encode($s), ENT_QUOTES) ?>)">
                                    <i class="fas fa-pen"></i> Edit
                                </button>
                                <button class="btn-action btn-delete"
                                    onclick="openDelete('<?= $s['id_supplier'] ?>', '<?= htmlspecialchars($s['nama_supplier'], ENT_QUOTES) ?>')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="no-data-row">
                        <td colspan="6">
                            <div class="no-data-icon"><i class="fas fa-truck"></i></div>
                            <div>Belum ada data supplier yang terdaftar.</div>
                            <div style="margin-top:4px; font-size:12px;">Klik "Tambah Supplier" untuk menambahkan data baru</div>
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


    <!-- ===== MODAL TAMBAH ===== -->
    <div class="modal-overlay" id="modalTambah">
        <div class="modal-box">
            <div class="modal-header">
                <h4><i class="fas fa-plus-circle" style="color:#1a56db; margin-right:8px;"></i>Tambah Supplier</h4>
                <button class="modal-close" onclick="closeModal('modalTambah')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/supplier/tambah') ?>" method="post">
                <div class="modal-body">
                    <!-- Kode supplier generate otomatis -->
                    <div class="form-group-custom">
                        <label class="form-label-custom">Kode Supplier</label>
                        <div class="input-wrap">
                            <i class="fas fa-barcode input-icon"></i>
                            <input type="text" class="form-control-custom" value="Generate otomatis (SUP-XXX)" disabled style="color:#9ca3af; background:#f3f4f6; cursor:not-allowed;">
                        </div>
                        <span style="font-size:11px; color:#9ca3af; margin-top:4px; display:block;"><i class="fas fa-info-circle" style="margin-right:3px;"></i>Kode akan dibuat otomatis setelah disimpan</span>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Nama Supplier <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-building input-icon"></i>
                            <input type="text" name="nama_supplier" class="form-control-custom" placeholder="Nama perusahaan" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group-custom">
                            <label class="form-label-custom">Nama Kontak</label>
                            <div class="input-wrap">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" name="nama_kontak" class="form-control-custom" placeholder="Nama PIC">
                            </div>
                        </div>
                        <div class="form-group-custom">
                            <label class="form-label-custom">No. Telp</label>
                            <div class="input-wrap">
                                <i class="fas fa-phone input-icon"></i>
                                <input type="text" name="no_telp" class="form-control-custom" placeholder="08xx-xxxx-xxxx">
                            </div>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Email</label>
                        <div class="input-wrap">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" name="email" class="form-control-custom" placeholder="supplier@email.com">
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Alamat</label>
                        <div class="input-wrap">
                            <i class="fas fa-map-marker-alt input-icon top"></i>
                            <textarea name="alamat" class="form-control-custom" placeholder="Alamat lengkap supplier"></textarea>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Keterangan</label>
                        <div class="input-wrap">
                            <i class="fas fa-sticky-note input-icon top"></i>
                            <textarea name="keterangan" class="form-control-custom" placeholder="Catatan tambahan (opsional)"></textarea>
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


    <!-- ===== MODAL EDIT ===== -->
    <div class="modal-overlay" id="modalEdit">
        <div class="modal-box">
            <div class="modal-header">
                <h4><i class="fas fa-pen" style="color:#1a56db; margin-right:8px;"></i>Edit Supplier</h4>
                <button class="modal-close" onclick="closeModal('modalEdit')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/supplier/update') ?>" method="post">
                <input type="hidden" name="id_supplier" id="edit_id">
                <div class="modal-body">
                    <div class="form-group-custom">
                        <label class="form-label-custom">Kode Supplier</label>
                        <div class="input-wrap">
                            <i class="fas fa-barcode input-icon"></i>
                            <input type="text" id="edit_kode" class="form-control-custom" disabled style="color:#6b7280; background:#f3f4f6; cursor:not-allowed; font-family:'Courier New',monospace; font-weight:700;">
                            <!-- Tetap kirim kode ke server via hidden input -->
                            <input type="hidden" name="kode_supplier" id="edit_kode_hidden">
                        </div>
                        <span style="font-size:11px; color:#9ca3af; margin-top:4px; display:block;"><i class="fas fa-lock" style="margin-right:3px;"></i>Kode supplier tidak dapat diubah</span>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Nama Supplier <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-building input-icon"></i>
                            <input type="text" name="nama_supplier" id="edit_nama" class="form-control-custom" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group-custom">
                            <label class="form-label-custom">Nama Kontak</label>
                            <div class="input-wrap">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" name="nama_kontak" id="edit_kontak" class="form-control-custom">
                            </div>
                        </div>
                        <div class="form-group-custom">
                            <label class="form-label-custom">No. Telp</label>
                            <div class="input-wrap">
                                <i class="fas fa-phone input-icon"></i>
                                <input type="text" name="no_telp" id="edit_telp" class="form-control-custom">
                            </div>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Email</label>
                        <div class="input-wrap">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" name="email" id="edit_email" class="form-control-custom">
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Alamat</label>
                        <div class="input-wrap">
                            <i class="fas fa-map-marker-alt input-icon top"></i>
                            <textarea name="alamat" id="edit_alamat" class="form-control-custom"></textarea>
                        </div>
                    </div>
                    <div class="form-group-custom">
                        <label class="form-label-custom">Keterangan</label>
                        <div class="input-wrap">
                            <i class="fas fa-sticky-note input-icon top"></i>
                            <textarea name="keterangan" id="edit_keterangan" class="form-control-custom"></textarea>
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


    <!-- ===== MODAL DETAIL ===== -->
    <div class="modal-overlay" id="modalDetail">
        <div class="modal-box modal-detail">
            <div class="modal-header">
                <h4><i class="fas fa-info-circle" style="color:#16a34a; margin-right:8px;"></i>Detail Supplier</h4>
                <button class="modal-close" onclick="closeModal('modalDetail')"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="detail-header-box">
                    <div class="detail-avatar" id="det_avatar"></div>
                    <div>
                        <span class="detail-nama" id="det_nama"></span>
                        <span class="detail-kode" id="det_kode"></span>
                    </div>
                </div>
                <div class="detail-row">
                    <div class="detail-icon" style="background:#eff6ff; color:#1a56db;"><i class="fas fa-user"></i></div>
                    <div><span class="detail-label">Nama Kontak / PIC</span><span class="detail-value" id="det_kontak"></span></div>
                </div>
                <div class="detail-row">
                    <div class="detail-icon" style="background:#f0fdf4; color:#16a34a;"><i class="fas fa-phone"></i></div>
                    <div><span class="detail-label">No. Telepon</span><span class="detail-value" id="det_telp"></span></div>
                </div>
                <div class="detail-row">
                    <div class="detail-icon" style="background:#fffbeb; color:#d97706;"><i class="fas fa-envelope"></i></div>
                    <div><span class="detail-label">Email</span><span class="detail-value" id="det_email"></span></div>
                </div>
                <div class="detail-row">
                    <div class="detail-icon" style="background:#fdf4ff; color:#9333ea;"><i class="fas fa-map-marker-alt"></i></div>
                    <div><span class="detail-label">Alamat</span><span class="detail-value" id="det_alamat"></span></div>
                </div>
                <div class="detail-row">
                    <div class="detail-icon" style="background:#f8fafc; color:#6b7280;"><i class="fas fa-sticky-note"></i></div>
                    <div><span class="detail-label">Keterangan</span><span class="detail-value" id="det_keterangan"></span></div>
                </div>
                <div class="detail-row">
                    <div class="detail-icon" style="background:#f8fafc; color:#6b7280;"><i class="fas fa-calendar-plus"></i></div>
                    <div><span class="detail-label">Terdaftar</span><span class="detail-value" id="det_created"></span></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeModal('modalDetail')">Tutup</button>
            </div>
        </div>
    </div>


    <!-- ===== MODAL DELETE ===== -->
    <div class="modal-overlay" id="modalDelete">
        <div class="modal-box modal-sm">
            <div class="modal-header">
                <h4><i class="fas fa-trash" style="color:#dc2626; margin-right:8px;"></i>Hapus Supplier</h4>
                <button class="modal-close" onclick="closeModal('modalDelete')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/supplier/hapus') ?>" method="post">
                <input type="hidden" name="id_supplier" id="del_id">
                <div class="delete-modal-body">
                    <div class="delete-icon"><i class="fas fa-exclamation-triangle"></i></div>
                    <h5>Apakah Anda yakin ingin menghapus data supplier ini?</h5>
                    <p>Data supplier <strong id="del_nama"></strong> akan dihapus secara permanen dan tidak dapat dipulihkan kembali.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modalDelete')">Batal</button>
                    <button type="submit" class="btn-delete-confirm"><i class="fas fa-trash"></i> Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>


<script>
    // ===== MODAL =====
    function openModal(id) { document.getElementById(id).classList.add('show'); }
    function closeModal(id) { document.getElementById(id).classList.remove('show'); }

    function openEdit(s) {
        document.getElementById('edit_id').value              = s.id_supplier;
        document.getElementById('edit_kode').value            = s.kode_supplier;
        document.getElementById('edit_kode_hidden').value     = s.kode_supplier;
        document.getElementById('edit_nama').value       = s.nama_supplier;
        document.getElementById('edit_kontak').value     = s.nama_kontak  || '';
        document.getElementById('edit_telp').value       = s.no_telp      || '';
        document.getElementById('edit_email').value      = s.email        || '';
        document.getElementById('edit_alamat').value     = s.alamat       || '';
        document.getElementById('edit_keterangan').value = s.keterangan   || '';
        openModal('modalEdit');
    }

    function openDetail(s) {
        document.getElementById('det_avatar').textContent     = s.nama_supplier.charAt(0).toUpperCase();
        document.getElementById('det_nama').textContent       = s.nama_supplier;
        document.getElementById('det_kode').textContent       = s.kode_supplier;
        document.getElementById('det_kontak').textContent     = s.nama_kontak  || '—';
        document.getElementById('det_telp').textContent       = s.no_telp      || '—';
        document.getElementById('det_email').textContent      = s.email        || '—';
        document.getElementById('det_alamat').textContent     = s.alamat       || '—';
        document.getElementById('det_keterangan').textContent = s.keterangan   || '—';
        document.getElementById('det_created').textContent    = s.created_at   || '—';
        openModal('modalDetail');
    }

    function openDelete(id, nama) {
        document.getElementById('del_id').value          = id;
        document.getElementById('del_nama').textContent  = nama;
        openModal('modalDelete');
    }

    document.querySelectorAll('.modal-overlay').forEach(function(o) {
        o.addEventListener('click', function(e) { if (e.target === o) o.classList.remove('show'); });
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') document.querySelectorAll('.modal-overlay.show').forEach(function(m) { m.classList.remove('show'); });
    });

    // ===== PAGINATION =====
    var ROWS_PER_PAGE = 10;
    var currentPage  = 1;
    var allRows      = [];
    var filteredRows = [];

    function initPagination() {
        allRows      = Array.from(document.querySelectorAll('#supTable tbody tr:not(.no-data-row)'));
        filteredRows = allRows.slice();
        renderPage(1);
    }

    function renderPage(page) {
        currentPage = page;
        var total   = filteredRows.length;
        var pages   = Math.ceil(total / ROWS_PER_PAGE) || 1;
        var start   = (page - 1) * ROWS_PER_PAGE;
        var end     = Math.min(start + ROWS_PER_PAGE, total);

        allRows.forEach(function(r) { r.style.display = 'none'; });
        filteredRows.forEach(function(r, i) {
            r.style.display = (i >= start && i < end) ? '' : 'none';
        });

        var info = document.getElementById('paginationInfo');
        info.innerHTML = total === 0
            ? 'Tidak ada data'
            : 'Menampilkan <strong>' + (start + 1) + '–' + end + '</strong> dari <strong>' + total + '</strong> supplier';

        var ctrl = document.getElementById('paginationControls');
        ctrl.innerHTML = '';

        var prev = document.createElement('button');
        prev.className = 'page-btn nav-btn';
        prev.innerHTML = '<i class="fas fa-chevron-left"></i> Prev';
        prev.disabled  = (page <= 1);
        prev.onclick   = function() { renderPage(currentPage - 1); };
        ctrl.appendChild(prev);

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

        var next = document.createElement('button');
        next.className = 'page-btn nav-btn';
        next.innerHTML = 'Next <i class="fas fa-chevron-right"></i>';
        next.disabled  = (page >= pages);
        next.onclick   = function() { renderPage(currentPage + 1); };
        ctrl.appendChild(next);
    }

    function filterTable() {
        var kw = document.getElementById('searchSup').value.toLowerCase();
        filteredRows = allRows.filter(function(r) {
            return r.textContent.toLowerCase().includes(kw);
        });
        renderPage(1);
    }

    document.addEventListener('DOMContentLoaded', function() { initPagination(); });
</script>
</div>