<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css') ?>">

  <style>
    /* ===== GREETING CARD TRIGGER ===== */
    .account-dropdown-wrap {
      position: relative;
    }

    .navbar-greeting-card {
      display: flex;
      align-items: center;
      gap: 10px;
      background: #f8fafc;
      border: 1px solid #e8ecf0;
      border-radius: 9px;
      padding: 6px 12px 6px 8px;
      margin-right: 12px;
      cursor: pointer;
      user-select: none;
      transition: background 0.15s, border-color 0.15s, box-shadow 0.15s;
    }

    .navbar-greeting-card:hover {
      background: #eff6ff;
      border-color: #bfdbfe;
      box-shadow: 0 2px 10px rgba(26,86,219,0.1);
    }

    .navbar-greeting-card.active {
      background: #eff6ff;
      border-color: #93c5fd;
      box-shadow: 0 2px 14px rgba(26,86,219,0.14);
    }

    .greeting-caret {
      font-size: 10px;
      color: #9ca3af;
      margin-left: 2px;
      transition: transform 0.2s, color 0.2s;
    }

    .navbar-greeting-card.active .greeting-caret {
      transform: rotate(180deg);
      color: #1a56db;
    }

    /* ===== POPUP ===== */
    .account-popup {
      position: absolute;
      top: calc(100% + 10px);
      right: 12px;
      width: 284px;
      background: #ffffff;
      border: 1px solid #e5e7eb;
      border-radius: 14px;
      box-shadow: 0 12px 40px rgba(0,0,0,0.13), 0 2px 8px rgba(0,0,0,0.05);
      z-index: 9999;
      overflow: hidden;

      opacity: 0;
      transform: translateY(-8px) scale(0.97);
      pointer-events: none;
      transition: opacity 0.18s ease, transform 0.18s ease;
      transform-origin: top right;
    }

    .account-popup.show {
      opacity: 1;
      transform: translateY(0) scale(1);
      pointer-events: all;
    }

    /* Popup arrow */
    .account-popup::before {
      content: '';
      position: absolute;
      top: -6px;
      right: 22px;
      width: 12px;
      height: 12px;
      background: #1a56db; /* matches header gradient start */
      border-radius: 2px;
      transform: rotate(45deg);
    }

    /* ===== POPUP HEADER ===== */
    .popup-header {
      background: linear-gradient(135deg, #1a56db 0%, #0d3fa6 100%);
      padding: 18px 20px 20px;
      display: flex;
      align-items: center;
      gap: 14px;
      position: relative;
    }

    .popup-avatar {
      width: 50px;
      height: 50px;
      min-width: 50px;
      background: rgba(255,255,255,0.18);
      border: 2px solid rgba(255,255,255,0.3);
      border-radius: 13px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #ffffff;
      font-size: 22px;
      font-weight: 700;
      font-family: 'DM Sans', sans-serif;
    }

    .popup-name {
      font-size: 15px;
      font-weight: 700;
      color: #ffffff;
      display: block;
      letter-spacing: -0.2px;
      line-height: 1.2;
    }

    .popup-role-badge {
      display: inline-flex;
      align-items: center;
      gap: 4px;
      margin-top: 5px;
      background: rgba(255,255,255,0.16);
      border: 1px solid rgba(255,255,255,0.22);
      color: rgba(255,255,255,0.9);
      font-size: 10.5px;
      font-weight: 600;
      padding: 2px 9px;
      border-radius: 20px;
      letter-spacing: 0.2px;
    }

    .popup-role-dot {
      width: 6px;
      height: 6px;
      background: #4ade80;
      border-radius: 50%;
    }

    /* ===== POPUP BODY ===== */
    .popup-body {
      padding: 12px 14px;
    }

    .popup-info-row {
      display: flex;
      align-items: center;
      gap: 11px;
      padding: 9px 10px;
      border-radius: 9px;
      transition: background 0.12s;
    }

    .popup-info-row:hover {
      background: #f8fafc;
    }

    .popup-info-icon {
      width: 32px;
      height: 32px;
      min-width: 32px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12.5px;
    }

    .popup-info-label {
      font-size: 10.5px;
      color: #9ca3af;
      font-weight: 500;
      display: block;
      line-height: 1;
      font-family: 'DM Sans', sans-serif;
    }

    .popup-info-value {
      font-size: 13px;
      color: #111827;
      font-weight: 600;
      display: block;
      margin-top: 2px;
      font-family: 'DM Sans', sans-serif;
    }

    /* ===== POPUP DIVIDER ===== */
    .popup-divider {
      border: none;
      border-top: 1px solid #f1f3f5;
      margin: 4px 14px;
    }

    /* ===== POPUP FOOTER ===== */
    .popup-footer {
      padding: 8px 14px 14px;
    }

    .popup-logout-btn {
      display: flex;
      align-items: center;
      gap: 8px;
      width: 100%;
      padding: 10px 14px;
      background: #fef2f2;
      border: 1px solid #fecaca;
      border-radius: 9px;
      color: #dc2626;
      font-size: 13px;
      font-weight: 600;
      font-family: 'DM Sans', sans-serif;
      cursor: pointer;
      text-decoration: none;
      transition: background 0.15s, border-color 0.15s;
    }

    .popup-logout-btn:hover {
      background: #fee2e2;
      border-color: #fca5a5;
      color: #dc2626;
      text-decoration: none;
    }

    .popup-logout-btn i { font-size: 13px; }

    .popup-logout-btn span { flex: 1; }
  </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light"
       style="border-bottom:1px solid #e8ecf0 !important; box-shadow:0 1px 6px rgba(0,0,0,0.04) !important; background:#ffffff !important; min-height:57px; display:flex; align-items:center;">

    <!-- Sidebar Toggle -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="display:flex; align-items:center;">
          <i class="fas fa-bars" style="color:#6b7280; font-size:16px;"></i>
        </a>
      </li>
    </ul>

    <!-- System Title -->
    <span class="d-none d-md-block"
          style="font-family:'DM Sans',sans-serif; font-size:14px; color:#4b5563; font-weight:500; padding-left:8px; letter-spacing:0.2px;">
      Sistem Manajemen Barang PT Pordjo Steelindo Perkasa
    </span>

    <!-- Greeting Card -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item" style="display:flex; align-items:center;">

        <div class="account-dropdown-wrap">

          <!-- TRIGGER -->
          <div class="navbar-greeting-card" id="greetingCard" title="Lihat info akun">

            <div style="width:32px; height:32px; background:linear-gradient(135deg,#1a56db,#0d3fa6); border-radius:7px; display:flex; align-items:center; justify-content:center; color:white; font-size:13px; font-weight:700; font-family:'DM Sans',sans-serif; box-shadow:0 2px 6px rgba(26,86,219,0.25); flex-shrink:0;">
              <?= strtoupper(substr($this->session->userdata('nama') ?: 'A', 0, 1)); ?>
            </div>

            <div style="display:flex; flex-direction:column; justify-content:center;">
              <small style="font-size:10px; color:#9ca3af; font-weight:500; line-height:1.2; font-family:'DM Sans',sans-serif;">Selamat datang,</small>
              <strong style="font-size:13px; color:#111827; font-weight:700; font-family:'DM Sans',sans-serif; letter-spacing:-0.2px; white-space:nowrap;">
                <?= $this->session->userdata('nama') ?: 'Admin'; ?>
              </strong>
            </div>

            <i class="fas fa-chevron-down greeting-caret"></i>
          </div>

          <!-- POPUP DROPDOWN -->
          <div class="account-popup" id="accountPopup">

            <!-- Header -->
            <div class="popup-header">
              <div class="popup-avatar">
                <?= strtoupper(substr($this->session->userdata('nama') ?: 'A', 0, 1)); ?>
              </div>
              <div>
                <span class="popup-name"><?= $this->session->userdata('nama') ?: 'Admin'; ?></span>
                <span class="popup-role-badge">
                  <span class="popup-role-dot"></span>
                  <?= ucfirst($this->session->userdata('role') ?: 'admin'); ?>
                </span>
              </div>
            </div>

            <!-- Info Rows -->
            <div class="popup-body">

              <div class="popup-info-row">
                <div class="popup-info-icon" style="background:#eff6ff; color:#1a56db;">
                  <i class="fas fa-user"></i>
                </div>
                <div>
                  <span class="popup-info-label">Username</span>
                  <span class="popup-info-value"><?= $this->session->userdata('username') ?: '-'; ?></span>
                </div>
              </div>

              <div class="popup-info-row">
                <div class="popup-info-icon" style="background:#f0fdf4; color:#16a34a;">
                  <i class="fas fa-id-badge"></i>
                </div>
                <div>
                  <span class="popup-info-label">Role / Jabatan</span>
                  <span class="popup-info-value"><?= ucfirst($this->session->userdata('role') ?: '-'); ?></span>
                </div>
              </div>

              <div class="popup-info-row">
                <div class="popup-info-icon" style="background:#fffbeb; color:#d97706;">
                  <i class="fas fa-clock"></i>
                </div>
                <div>
                  <span class="popup-info-label">Waktu Login</span>
                  <span class="popup-info-value"><?= $this->session->userdata('login_time') ?: '-'; ?></span>
                </div>
              </div>

              <div class="popup-info-row">
                <div class="popup-info-icon" style="background:#fdf4ff; color:#9333ea;">
                  <i class="fas fa-building"></i>
                </div>
                <div>
                  <span class="popup-info-label">Perusahaan</span>
                  <span class="popup-info-value">PT Pordjo Steelindo</span>
                </div>
              </div>

            </div>

            <hr class="popup-divider">

          </div><!-- /account-popup -->

        </div><!-- /account-dropdown-wrap -->

      </li>
    </ul>

  </nav>

  <script>
    (function () {
      var card  = document.getElementById('greetingCard');
      var popup = document.getElementById('accountPopup');

      // Klik untuk toggle
      card.addEventListener('click', function (e) {
        e.stopPropagation();
        popup.classList.contains('show') ? closePopup() : openPopup();
      });

      // Klik di luar = tutup
      document.addEventListener('click', function (e) {
        if (!card.contains(e.target) && !popup.contains(e.target)) {
          closePopup();
        }
      });

      // Tekan Escape = tutup
      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closePopup();
      });

      function openPopup()  {
        popup.classList.add('show');
        card.classList.add('active');
      }

      function closePopup() {
        popup.classList.remove('show');
        card.classList.remove('active');
      }
    })();
  </script>

