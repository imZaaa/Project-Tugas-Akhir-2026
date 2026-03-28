<div class="content-wrapper" style="background:#f5f7fa; font-family:'DM Sans','Segoe UI',sans-serif;">

<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&display=swap');
    .content-wrapper, .content-wrapper *:not(i):not(svg):not(path) {
        font-family: 'DM Sans', 'Segoe UI', sans-serif;
    }

    /* PAGE TITLE */
    .page-title-row {
        padding: 24px 28px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }
    .page-title-row h1 { font-size: 20px; font-weight: 700; color: #111827; margin: 0 0 3px; letter-spacing: -0.3px; }
    .page-title-row p  { font-size: 12.5px; color: #9ca3af; margin: 0; }

    .btn-primary-custom {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: linear-gradient(135deg, #1a56db, #0d3fa6);
        color: #ffffff !important;
        border: none;
        padding: 9px 18px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none !important;
        box-shadow: 0 3px 10px rgba(26,86,219,0.3);
        transition: opacity 0.15s, transform 0.15s;
    }
    .btn-primary-custom:hover { opacity: 0.9; transform: translateY(-1px); }

    /* MAIN CARD */
    .users-card {
        margin: 20px 24px 28px;
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #e8ecf0;
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        overflow: hidden;
    }

    /* TOOLBAR */
    .card-toolbar {
        padding: 14px 20px;
        border-bottom: 1px solid #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
    }

    .user-count-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: #eff6ff;
        color: #1a56db;
        font-size: 12px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 20px;
    }

    .search-box {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #f8fafc;
        border: 1.5px solid #e8ecf0;
        border-radius: 8px;
        padding: 7px 12px;
        transition: border-color 0.15s;
    }
    .search-box:focus-within { border-color: #1a56db; background: #fff; }
    .search-box i { color: #9ca3af; font-size: 12px; }
    .search-box input {
        border: none; background: transparent;
        font-size: 13px; color: #374151;
        outline: none; width: 200px;
        font-family: 'DM Sans', sans-serif;
    }
    .search-box input::placeholder { color: #d1d5db; }

    /* TABLE */
    .users-table { width: 100%; border-collapse: collapse; }
    .users-table th {
        font-size: 10.5px; font-weight: 700;
        text-transform: uppercase; letter-spacing: 0.5px;
        color: #9ca3af; padding: 11px 20px;
        text-align: left; background: #fafafa;
        border-bottom: 1px solid #f1f3f5;
        white-space: nowrap;
    }
    .users-table td {
        padding: 13px 20px; font-size: 13px;
        color: #374151; border-bottom: 1px solid #f7f8f9;
        vertical-align: middle;
    }
    .users-table tr:last-child td { border-bottom: none; }
    .users-table tr:hover td { background: #fafbff; }

    /* AVATAR */
    .table-avatar {
        width: 34px; height: 34px; border-radius: 9px;
        display: inline-flex; align-items: center; justify-content: center;
        font-size: 13px; font-weight: 700; color: white; flex-shrink: 0;
    }
    .table-avatar.admin { background: linear-gradient(135deg, #1a56db, #0d3fa6); }
    .table-avatar.kasir { background: linear-gradient(135deg, #059669, #047857); }

    .user-name-wrap { display: flex; align-items: center; gap: 10px; }
    .user-name-text { font-size: 13px; font-weight: 600; color: #111827; display: block; }
    .user-username-text { font-size: 11.5px; color: #9ca3af; display: block; }

    /* ROLE BADGE */
    .role-badge {
        display: inline-flex; align-items: center; gap: 5px;
        font-size: 11.5px; font-weight: 600;
        padding: 3px 10px; border-radius: 20px;
    }
    .role-badge.admin { background: #eff6ff; color: #1a56db; }
    .role-badge.kasir { background: #ecfdf5; color: #059669; }
    .role-dot { width: 5px; height: 5px; border-radius: 50%; }
    .role-badge.admin .role-dot { background: #1a56db; }
    .role-badge.kasir .role-dot { background: #059669; }

    /* ACTION BUTTONS */
    .btn-action {
        display: inline-flex; align-items: center; gap: 5px;
        font-size: 11.5px; font-weight: 600;
        padding: 5px 10px; border-radius: 7px;
        border: none; cursor: pointer;
        font-family: 'DM Sans', sans-serif;
        transition: background 0.15s;
        text-decoration: none;
    }
    .btn-detail { background: #f0fdf4; color: #059669; }
    .btn-detail:hover { background: #dcfce7; color: #059669; }
    .btn-edit   { background: #eff6ff; color: #1a56db; }
    .btn-edit:hover  { background: #dbeafe; color: #1a56db; }
    .btn-delete { background: #fef2f2; color: #dc2626; }
    .btn-delete:hover { background: #fee2e2; color: #dc2626; }

    /* DETAIL MODAL */
    .detail-profile-header {
        background: linear-gradient(135deg, #1a56db 0%, #0d3fa6 100%);
        padding: 28px 22px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 14px;
        position: relative;
        overflow: hidden;
    }
    .detail-profile-header::before {
        content: '';
        position: absolute;
        top: -30px; right: -30px;
        width: 100px; height: 100px;
        background: rgba(255,255,255,0.06);
        border-radius: 50%;
    }
    .detail-profile-header::after {
        content: '';
        position: absolute;
        bottom: -20px; left: -20px;
        width: 80px; height: 80px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
    }
    .detail-avatar {
        width: 72px; height: 72px;
        border-radius: 18px;
        display: flex; align-items: center; justify-content: center;
        font-size: 28px; font-weight: 800; color: #ffffff;
        background: rgba(255,255,255,0.18);
        border: 3px solid rgba(255,255,255,0.3);
        box-shadow: 0 4px 16px rgba(0,0,0,0.15);
        position: relative; z-index: 1;
    }
    .detail-name {
        font-size: 18px; font-weight: 700; color: #ffffff;
        text-align: center; letter-spacing: -0.3px;
        position: relative; z-index: 1;
    }
    .detail-username {
        font-size: 13px; color: rgba(255,255,255,0.7);
        margin-top: -6px; position: relative; z-index: 1;
    }
    .detail-role-badge {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 4px 14px; border-radius: 20px;
        font-size: 12px; font-weight: 600;
        position: relative; z-index: 1;
    }
    .detail-role-badge.admin {
        background: rgba(255,255,255,0.18);
        border: 1px solid rgba(255,255,255,0.25);
        color: rgba(255,255,255,0.95);
    }
    .detail-role-badge.kasir {
        background: rgba(74,222,128,0.2);
        border: 1px solid rgba(74,222,128,0.35);
        color: #bbf7d0;
    }
    .detail-role-dot {
        width: 7px; height: 7px; border-radius: 50%;
    }
    .detail-role-badge.admin .detail-role-dot { background: #93c5fd; }
    .detail-role-badge.kasir .detail-role-dot { background: #4ade80; }
    .detail-info-body { padding: 20px 22px; }
    .detail-info-item {
        display: flex; align-items: center; gap: 12px;
        padding: 12px 14px; border-radius: 10px;
        transition: background 0.12s;
        margin-bottom: 4px;
    }
    .detail-info-item:hover { background: #f8fafc; }
    .detail-info-icon {
        width: 38px; height: 38px; min-width: 38px;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 14px;
    }
    .detail-info-label {
        font-size: 11px; color: #9ca3af; font-weight: 500;
        display: block; line-height: 1;
    }
    .detail-info-value {
        font-size: 13.5px; color: #111827; font-weight: 600;
        display: block; margin-top: 3px;
    }
    .detail-footer {
        padding: 14px 22px;
        border-top: 1px solid #f1f3f5;
        display: flex; justify-content: center;
    }
    .btn-detail-close {
        padding: 9px 28px;
        border: 1.5px solid #e5e7eb;
        border-radius: 9px;
        background: #ffffff;
        color: #6b7280;
        font-size: 13px; font-weight: 600;
        cursor: pointer; font-family: 'DM Sans', sans-serif;
        transition: background 0.15s;
    }
    .btn-detail-close:hover { background: #f9fafb; }

    /* NO DATA */
    .no-data-row td {
        text-align: center;
        padding: 48px 20px;
        color: #9ca3af;
        font-size: 13px;
    }
    .no-data-icon {
        width: 52px; height: 52px;
        background: #f3f4f6; border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 22px; color: #d1d5db;
        margin: 0 auto 12px;
    }

    /* ===== MODAL OVERLAY ===== */
    .modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.45);
        z-index: 99999;
        align-items: center;
        justify-content: center;
        padding: 20px;
        backdrop-filter: blur(3px);
    }
    .modal-overlay.show { display: flex; }

    .modal-box {
        background: #ffffff;
        border-radius: 16px;
        width: 100%;
        max-width: 440px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.2);
        overflow: hidden;
        animation: modalIn 0.2s ease;
    }

    @keyframes modalIn {
        from { opacity: 0; transform: translateY(-16px) scale(0.97); }
        to   { opacity: 1; transform: translateY(0) scale(1); }
    }

    .modal-header {
        padding: 18px 22px;
        border-bottom: 1px solid #f1f3f5;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .modal-header h4 { font-size: 15px; font-weight: 700; color: #111827; margin: 0; }
    .modal-close {
        width: 30px; height: 30px;
        background: #f3f4f6; border: none; border-radius: 7px;
        display: flex; align-items: center; justify-content: center;
        cursor: pointer; color: #6b7280; font-size: 13px;
        transition: background 0.15s;
    }
    .modal-close:hover { background: #e5e7eb; }

    .modal-body { padding: 20px 22px; }

    /* FORM FIELDS */
    .form-group-custom { margin-bottom: 16px; }
    .form-label-custom {
        display: block;
        font-size: 12px; font-weight: 600;
        color: #374151; margin-bottom: 6px;
        letter-spacing: 0.2px;
    }
    .form-label-custom span { color: #dc2626; }

    .input-wrap { position: relative; }
    .input-wrap .input-icon {
        position: absolute; left: 12px; top: 50%;
        transform: translateY(-50%);
        font-size: 12px; color: #9ca3af; pointer-events: none;
    }
    .input-wrap .toggle-pw {
        position: absolute; right: 12px; top: 50%;
        transform: translateY(-50%);
        font-size: 12px; color: #9ca3af;
        cursor: pointer; pointer-events: all;
        transition: color 0.15s;
    }
    .input-wrap .toggle-pw:hover { color: #1a56db; }

    .form-control-custom {
        width: 100%;
        padding: 10px 12px 10px 36px;
        border: 1.5px solid #e5e7eb;
        border-radius: 9px;
        font-size: 13px;
        font-family: 'DM Sans', sans-serif;
        color: #111827;
        background: #fafafa;
        outline: none;
        transition: border-color 0.15s, box-shadow 0.15s, background 0.15s;
    }
    .form-control-custom.has-toggle { padding-right: 36px; }
    .form-control-custom:focus {
        border-color: #1a56db;
        background: #ffffff;
        box-shadow: 0 0 0 3px rgba(26,86,219,0.08);
    }
    .form-control-custom::placeholder { color: #d1d5db; }

    select.form-control-custom { padding-left: 36px; cursor: pointer; }

    .form-hint { font-size: 11px; color: #9ca3af; margin-top: 4px; display: block; }

    .modal-footer {
        padding: 14px 22px;
        border-top: 1px solid #f1f3f5;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .btn-cancel {
        padding: 9px 18px;
        border: 1.5px solid #e5e7eb;
        border-radius: 9px;
        background: #ffffff;
        color: #6b7280;
        font-size: 13px; font-weight: 600;
        cursor: pointer; font-family: 'DM Sans', sans-serif;
        transition: background 0.15s;
    }
    .btn-cancel:hover { background: #f9fafb; }

    .btn-submit {
        padding: 9px 20px;
        border: none;
        border-radius: 9px;
        background: linear-gradient(135deg, #1a56db, #0d3fa6);
        color: #ffffff;
        font-size: 13px; font-weight: 600;
        cursor: pointer; font-family: 'DM Sans', sans-serif;
        box-shadow: 0 3px 10px rgba(26,86,219,0.3);
        transition: opacity 0.15s;
        display: flex; align-items: center; gap: 6px;
    }
    .btn-submit:hover { opacity: 0.9; }

    /* DELETE MODAL */
    .delete-modal-body { padding: 24px 22px; text-align: center; }
    .delete-icon {
        width: 56px; height: 56px;
        background: #fef2f2; border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 24px; color: #dc2626;
        margin: 0 auto 16px;
    }
    .delete-modal-body h5 { font-size: 16px; font-weight: 700; color: #111827; margin-bottom: 8px; }
    .delete-modal-body p  { font-size: 13px; color: #6b7280; margin: 0; line-height: 1.6; }

    .btn-delete-confirm {
        padding: 9px 20px;
        border: none; border-radius: 9px;
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        color: #ffffff;
        font-size: 13px; font-weight: 600;
        cursor: pointer; font-family: 'DM Sans', sans-serif;
        box-shadow: 0 3px 10px rgba(220,38,38,0.3);
        transition: opacity 0.15s;
        display: flex; align-items: center; gap: 6px;
    }
    .btn-delete-confirm:hover { opacity: 0.9; }

    /* ALERT */
    .alert-custom {
        margin: 16px 24px 0;
        padding: 11px 16px;
        border-radius: 10px;
        font-size: 13px; font-weight: 500;
        display: flex; align-items: center; gap: 9px;
    }
    .alert-custom.success { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
    .alert-custom.error   { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .page-title-row { padding: 18px 16px 0; }
        .users-card { margin: 16px 14px 24px; }
        .search-box input { width: 140px; }
        .users-table th:nth-child(4),
        .users-table td:nth-child(4) { display: none; }
    }
</style>

    <!-- ===== PAGE TITLE ===== -->
    <div class="page-title-row">
        <div>
            <h1>Kelola Akun</h1>
            <p>Manajemen akun Admin dan Kasir PT Pordjo Steelindo Perkasa</p>
        </div>
        <button class="btn-primary-custom" onclick="openModalTambah()">
            <i class="fas fa-plus"></i> Tambah User
        </button>
    </div>

    <!-- ===== FLASH MESSAGE ===== -->
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert-custom success">
        <i class="fas fa-check-circle"></i>
        <?= $this->session->flashdata('success') ?>
    </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert-custom error">
        <i class="fas fa-exclamation-circle"></i>
        <?= $this->session->flashdata('error') ?>
    </div>
    <?php endif; ?>

    <!-- ===== TABLE CARD ===== -->
    <div class="users-card">
        <div class="card-toolbar">
            <div class="card-toolbar-left">
                <span style="font-size:14px; font-weight:700; color:#111827;">Daftar User</span>
                <span class="user-count-badge">
                    <i class="fas fa-users" style="font-size:10px;"></i>
                    <?= count($users) ?> akun
                </span>
            </div>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchUser" placeholder="Cari nama atau username..." onkeyup="filterTable()">
            </div>
        </div>

        <table class="users-table" id="usersTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama / Username</th>
                    <th>Role</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $i => $u): ?>
                    <tr>
                        <td style="color:#9ca3af; font-size:12px; width:40px;"><?= $i + 1 ?></td>
                        <td>
                            <div class="user-name-wrap">
                                <div class="table-avatar <?= $u['role'] ?>">
                                    <?= strtoupper(substr($u['nama_lengkap'], 0, 1)) ?>
                                </div>
                                <div>
                                    <span class="user-name-text"><?= htmlspecialchars($u['nama_lengkap']) ?></span>
                                    <span class="user-username-text">@<?= htmlspecialchars($u['username']) ?></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="role-badge <?= $u['role'] ?>">
                                <span class="role-dot"></span>
                                <?= ucfirst($u['role']) ?>
                            </span>
                        </td>
                        <td style="color:#9ca3af; font-size:12px;">
                            <?= date('d M Y', strtotime($u['created_at'])) ?>
                        </td>
                        <td>
                            <div style="display:flex; gap:6px; flex-wrap:wrap;">
                                <button class="btn-action btn-detail"
                                    onclick="openModalDetail(
                                        '<?= htmlspecialchars($u['nama_lengkap'], ENT_QUOTES) ?>',
                                        '<?= htmlspecialchars($u['username'], ENT_QUOTES) ?>',
                                        '<?= $u['role'] ?>',
                                        '<?= date('d F Y, H:i', strtotime($u['created_at'])) ?>',
                                        '<?= $u['id_user'] ?>'
                                    )">
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                                <button class="btn-action btn-edit"
                                    onclick="openModalEdit(
                                        '<?= $u['id_user'] ?>',
                                        '<?= htmlspecialchars($u['nama_lengkap'], ENT_QUOTES) ?>',
                                        '<?= htmlspecialchars($u['username'], ENT_QUOTES) ?>',
                                        '<?= $u['role'] ?>'
                                    )">
                                    <i class="fas fa-pen"></i> Edit
                                </button>
                                <button class="btn-action btn-delete"
                                    onclick="openModalDelete('<?= $u['id_user'] ?>', '<?= htmlspecialchars($u['nama_lengkap'], ENT_QUOTES) ?>')"> 
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="no-data-row">
                        <td colspan="5">
                            <div class="no-data-icon"><i class="fas fa-users"></i></div>
                            <div>Belum ada pengguna yang terdaftar.</div>
                            <div style="margin-top:4px; font-size:12px;">Silakan klik "Tambah User" untuk menambahkan akun baru.</div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>


    <!-- ===== MODAL TAMBAH ===== -->
    <div class="modal-overlay" id="modalTambah">
        <div class="modal-box">
            <div class="modal-header">
                <h4><i class="fas fa-user-plus" style="color:#1a56db; margin-right:8px;"></i>Tambah User Baru</h4>
                <button class="modal-close" onclick="closeModal('modalTambah')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/users/tambah') ?>" method="post">
                <div class="modal-body">

                    <div class="form-group-custom">
                        <label class="form-label-custom">Nama Lengkap <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-id-card input-icon"></i>
                            <input type="text" name="nama_lengkap" class="form-control-custom" placeholder="Contoh: Budi Santoso" required>
                        </div>
                    </div>

                    <div class="form-group-custom">
                        <label class="form-label-custom">Username <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-at input-icon"></i>
                            <input type="text" name="username" class="form-control-custom" placeholder="Contoh: budi_santoso" required>
                        </div>
                    </div>

                    <div class="form-group-custom">
                        <label class="form-label-custom">Password <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" name="password" id="pw_tambah" class="form-control-custom has-toggle" placeholder="Masukkan password" required>
                            <i class="fas fa-eye toggle-pw" onclick="togglePw('pw_tambah', this)"></i>
                        </div>
                        <span class="form-hint">Minimal 6 karakter</span>
                    </div>

                    <div class="form-group-custom" style="margin-bottom:0;">
                        <label class="form-label-custom">Role <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-shield-alt input-icon"></i>
                            <select name="role" class="form-control-custom" required>
                                <option value="" disabled selected>-- Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modalTambah')">Batal</button>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- ===== MODAL EDIT ===== -->
    <div class="modal-overlay" id="modalEdit">
        <div class="modal-box">
            <div class="modal-header">
                <h4><i class="fas fa-user-edit" style="color:#1a56db; margin-right:8px;"></i>Edit User</h4>
                <button class="modal-close" onclick="closeModal('modalEdit')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/users/update') ?>" method="post">
                <input type="hidden" name="id_user" id="edit_id">
                <div class="modal-body">

                    <div class="form-group-custom">
                        <label class="form-label-custom">Nama Lengkap <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-id-card input-icon"></i>
                            <input type="text" name="nama_lengkap" id="edit_nama" class="form-control-custom" required>
                        </div>
                    </div>

                    <div class="form-group-custom">
                        <label class="form-label-custom">Username <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-at input-icon"></i>
                            <input type="text" name="username" id="edit_username" class="form-control-custom" required>
                        </div>
                    </div>

                    <div class="form-group-custom">
                        <label class="form-label-custom">Password Baru</label>
                        <div class="input-wrap">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" name="password" id="pw_edit" class="form-control-custom has-toggle" placeholder="Kosongkan jika tidak ingin ganti">
                            <i class="fas fa-eye toggle-pw" onclick="togglePw('pw_edit', this)"></i>
                        </div>
                        <span class="form-hint">Biarkan kosong jika tidak ingin mengubah password</span>
                    </div>

                    <div class="form-group-custom" style="margin-bottom:0;">
                        <label class="form-label-custom">Role <span>*</span></label>
                        <div class="input-wrap">
                            <i class="fas fa-shield-alt input-icon"></i>
                            <select name="role" id="edit_role" class="form-control-custom" required>
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modalEdit')">Batal</button>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- ===== MODAL DELETE ===== -->
    <div class="modal-overlay" id="modalDelete">
        <div class="modal-box">
            <div class="modal-header">
                <h4><i class="fas fa-trash" style="color:#dc2626; margin-right:8px;"></i>Hapus User</h4>
                <button class="modal-close" onclick="closeModal('modalDelete')"><i class="fas fa-times"></i></button>
            </div>
            <form action="<?= site_url('admin/users/hapus') ?>" method="post">
                <input type="hidden" name="id_user" id="delete_id">
                <div class="delete-modal-body">
                    <div class="delete-icon"><i class="fas fa-exclamation-triangle"></i></div>
                    <h5>Apakah Anda yakin ingin menghapus akun ini?</h5>
                    <p>Akun <strong id="delete_nama"></strong> akan dihapus secara permanen dan tidak dapat dipulihkan kembali.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal('modalDelete')">Batal</button>
                    <button type="submit" class="btn-delete-confirm">
                        <i class="fas fa-trash"></i> Ya, Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>


    <!-- ===== MODAL DETAIL ===== -->
    <div class="modal-overlay" id="modalDetail">
        <div class="modal-box" style="max-width:400px;">
            <div class="detail-profile-header">
                <div class="detail-avatar" id="detail_avatar">A</div>
                <div class="detail-name" id="detail_nama">-</div>
                <div class="detail-username" id="detail_username">@-</div>
                <span class="detail-role-badge admin" id="detail_role_badge">
                    <span class="detail-role-dot"></span>
                    <span id="detail_role_text">Admin</span>
                </span>
            </div>
            <div class="detail-info-body">
                <div class="detail-info-item">
                    <div class="detail-info-icon" style="background:#eff6ff; color:#1a56db;">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <span class="detail-info-label">Username</span>
                        <span class="detail-info-value" id="detail_info_username">-</span>
                    </div>
                </div>
                <div class="detail-info-item">
                    <div class="detail-info-icon" style="background:#f0fdf4; color:#059669;">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div>
                        <span class="detail-info-label">Role / Jabatan</span>
                        <span class="detail-info-value" id="detail_info_role">-</span>
                    </div>
                </div>
                <div class="detail-info-item">
                    <div class="detail-info-icon" style="background:#fffbeb; color:#d97706;">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div>
                        <span class="detail-info-label">Tanggal Dibuat</span>
                        <span class="detail-info-value" id="detail_info_created">-</span>
                    </div>
                </div>
                <div class="detail-info-item">
                    <div class="detail-info-icon" style="background:#fdf4ff; color:#9333ea;">
                        <i class="fas fa-fingerprint"></i>
                    </div>
                    <div>
                        <span class="detail-info-label">ID User</span>
                        <span class="detail-info-value" id="detail_info_id">-</span>
                    </div>
                </div>
            </div>
            <div class="detail-footer">
                <button class="btn-detail-close" onclick="closeModal('modalDetail')">
                    <i class="fas fa-times" style="margin-right:5px;"></i> Tutup
                </button>
            </div>
        </div>
    </div>


<script>
    // ===== MODAL FUNCTIONS =====
    function openModalTambah() {
        document.getElementById('modalTambah').classList.add('show');
    }

    function openModalDetail(nama, username, role, created, id) {
        document.getElementById('detail_avatar').textContent = nama.charAt(0).toUpperCase();
        document.getElementById('detail_nama').textContent = nama;
        document.getElementById('detail_username').textContent = '@' + username;
        document.getElementById('detail_info_username').textContent = username;
        document.getElementById('detail_info_role').textContent = role.charAt(0).toUpperCase() + role.slice(1);
        document.getElementById('detail_info_created').textContent = created;
        document.getElementById('detail_info_id').textContent = '#' + id;

        var badge = document.getElementById('detail_role_badge');
        badge.className = 'detail-role-badge ' + role;
        document.getElementById('detail_role_text').textContent = role.charAt(0).toUpperCase() + role.slice(1);

        document.getElementById('modalDetail').classList.add('show');
    }

    function openModalEdit(id, nama, username, role) {
        document.getElementById('edit_id').value      = id;
        document.getElementById('edit_nama').value    = nama;
        document.getElementById('edit_username').value = username;
        document.getElementById('edit_role').value    = role;
        document.getElementById('pw_edit').value      = '';
        document.getElementById('modalEdit').classList.add('show');
    }

    function openModalDelete(id, nama) {
        document.getElementById('delete_id').value   = id;
        document.getElementById('delete_nama').textContent = nama;
        document.getElementById('modalDelete').classList.add('show');
    }

    function closeModal(id) {
        document.getElementById(id).classList.remove('show');
    }

    // Close on overlay click
    document.querySelectorAll('.modal-overlay').forEach(function(overlay) {
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) overlay.classList.remove('show');
        });
    });

    // Close on Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay.show').forEach(function(m) {
                m.classList.remove('show');
            });
        }
    });

    // ===== TOGGLE PASSWORD =====
    function togglePw(inputId, icon) {
        var input = document.getElementById(inputId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }

    // ===== SEARCH/FILTER =====
    function filterTable() {
        var keyword = document.getElementById('searchUser').value.toLowerCase();
        var rows    = document.querySelectorAll('#usersTable tbody tr:not(.no-data-row)');
        rows.forEach(function(row) {
            var text = row.textContent.toLowerCase();
            row.style.display = text.includes(keyword) ? '' : 'none';
        });
    }
</script>

</div>