<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | PT Pordjo</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@600&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --blue:          #2563eb;
      --blue-dark:     #1d4ed8;
      --blue-light:    #3b82f6;
      --blue-glow:     rgba(37,99,235,0.35);
      --text:          #111827;
      --sub:           #6b7280;
      --border:        #e5e7eb;
      --input-bg:      #fafafa;
    }

    html, body { height: 100%; }

    body {
      font-family: 'DM Sans', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: stretch;
      overflow: hidden;
    }

    /* ===== PARTICLE CANVAS ===== */
    #particles {
      position: fixed;
      inset: 0;
      pointer-events: none;
      z-index: 0;
    }

    /* ===== LEFT PANEL ===== */
    .login-left {
      width: 46%;
      background: linear-gradient(155deg, #0d3fa6 0%, #1a56db 55%, #2563eb 100%);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 60px 50px;
      position: relative;
      overflow: hidden;
      flex-shrink: 0;
      z-index: 1;
    }

    /* Animated gradient sweep */
    .login-left::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, transparent 30%, rgba(255,255,255,0.04) 50%, transparent 70%);
      background-size: 200% 200%;
      animation: sweep 6s ease infinite;
    }

    @keyframes sweep {
      0%   { background-position: 0% 0%; }
      50%  { background-position: 100% 100%; }
      100% { background-position: 0% 0%; }
    }

    /* Decorative rings */
    .deco-ring {
      position: absolute;
      border-radius: 50%;
      border: 1px solid rgba(255,255,255,0.08);
      animation: pulse-ring 4s ease-in-out infinite;
      pointer-events: none;
    }
    .deco-ring:nth-child(1) { width: 420px; height: 420px; top: -120px; right: -140px; animation-delay: 0s; }
    .deco-ring:nth-child(2) { width: 280px; height: 280px; bottom: -80px; left: -80px; animation-delay: 1.5s; }
    .deco-ring:nth-child(3) { width: 180px; height: 180px; top: 40%; left: -60px; animation-delay: 3s; opacity: 0.05; }

    @keyframes pulse-ring {
      0%, 100% { opacity: 0.08; transform: scale(1); }
      50%       { opacity: 0.18; transform: scale(1.05); }
    }

    /* Dot grid */
    .left-dot-grid {
      position: absolute;
      bottom: 60px; right: 40px;
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 8px;
      opacity: 0.15;
    }

    .left-dot-grid span {
      width: 4px; height: 4px;
      background: #ffffff;
      border-radius: 50%;
      display: block;
      animation: dot-blink 3s ease infinite;
    }
    .left-dot-grid span:nth-child(odd)  { animation-delay: 0.5s; }
    .left-dot-grid span:nth-child(3n)   { animation-delay: 1.2s; }
    .left-dot-grid span:nth-child(5n)   { animation-delay: 0.8s; }

    @keyframes dot-blink {
      0%, 100% { opacity: 0.5; }
      50%       { opacity: 1; }
    }

    .left-inner {
      position: relative;
      z-index: 2;
      text-align: center;
      max-width: 340px;
    }

    /* Logo */
    .left-logo-wrap {
      width: 250px;
      height: 180px;
      background: rgba(255,255,255,0.12);
      border: 1.5px solid rgba(255,255,255,0.2);
      border-radius: 28px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 28px;
      backdrop-filter: blur(8px);
      box-shadow: 0 8px 32px rgba(0,0,0,0.15);
      animation: float-logo 5s ease-in-out infinite, fadeSlideUp 0.7s ease 0.2s both;
    }

    @keyframes float-logo {
      0%, 100% { transform: translateY(0px); }
      50%       { transform: translateY(-8px); }
    }

    .left-logo-wrap img {
      width: 200px; height: 200px;
      object-fit: contain;
    }

    .left-logo-wrap .logo-fallback {
      font-size: 48px;
      color: #ffffff;
    }

    .left-tagline {
      font-family: 'Playfair Display', serif;
      font-size: 26px;
      color: #ffffff;
      line-height: 1.25;
      letter-spacing: -0.3px;
      margin-bottom: 14px;
      animation: fadeSlideUp 0.7s ease 0.35s both;
    }

    .left-desc {
      font-size: 13.5px;
      color: rgba(255,255,255,0.65);
      line-height: 1.7;
      animation: fadeSlideUp 0.7s ease 0.5s both;
    }

    .left-divider {
      width: 40px; height: 2px;
      background: rgba(255,255,255,0.3);
      border-radius: 2px;
      margin: 22px auto;
      animation: expand-line 0.8s ease 0.5s both;
    }

    @keyframes expand-line {
      from { width: 0; opacity: 0; }
      to   { width: 40px; opacity: 1; }
    }

    .left-badge-row {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 20px;
      margin-top: 24px;
      animation: fadeSlideUp 0.7s ease 0.65s both;
    }

    .left-badge {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 5px;
      transition: transform 0.3s;
    }
    .left-badge:hover { transform: translateY(-4px); }

    .left-badge i {
      font-size: 18px;
      color: rgba(255,255,255,0.7);
      transition: color 0.3s;
    }
    .left-badge:hover i { color: #ffffff; }

    .left-badge span {
      font-size: 10.5px;
      color: rgba(255,255,255,0.5);
      font-weight: 500;
      letter-spacing: 0.3px;
    }

    /* ===== RIGHT PANEL ===== */
    .login-right {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 48px 40px;
      background: #ffffff;
      position: relative;
      z-index: 1;
    }

    /* Animated shimmer top bar */
    .login-right::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--blue-dark), var(--blue-light), #93c5fd, var(--blue-dark));
      background-size: 200% 100%;
      animation: shimmer-bar 3s linear infinite;
    }

    @keyframes shimmer-bar {
      0%   { background-position: 200% 0; }
      100% { background-position: -200% 0; }
    }

    /* Subtle dot bg */
    .login-right::after {
      content: '';
      position: absolute;
      inset: 0;
      opacity: 0.018;
      background-image: radial-gradient(circle, #2563eb 1px, transparent 1px);
      background-size: 28px 28px;
      pointer-events: none;
    }

    .login-form-wrap {
      width: 100%;
      max-width: 360px;
      position: relative;
      z-index: 1;
      animation: fadeSlideUp 0.6s ease 0.4s both;
    }

    /* Mobile logo */
    .mobile-logo {
      display: none;
      flex-direction: column;
      align-items: center;
      margin-bottom: 32px;
    }
    .mobile-logo img { width: 110px; height: 110px; object-fit: contain; }

    /* Form header */
    .form-eyebrow {
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      color: var(--blue);
      margin-bottom: 8px;
    }

    .form-title {
      font-size: 26px;
      font-weight: 700;
      color: var(--text);
      letter-spacing: -0.5px;
      margin-bottom: 6px;
    }

    .form-sub {
      font-size: 13.5px;
      color: var(--sub);
      margin-bottom: 32px;
      line-height: 1.5;
    }

    /* Flash message */
    .flash-msg {
      padding: 10px 14px;
      border-radius: 9px;
      font-size: 13px;
      font-weight: 500;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 8px;
      animation: shake 0.4s ease;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      20%       { transform: translateX(-6px); }
      40%       { transform: translateX(6px); }
      60%       { transform: translateX(-4px); }
      80%       { transform: translateX(4px); }
    }

    .flash-msg.error {
      background: #fef2f2;
      color: #dc2626;
      border: 1px solid #fecaca;
    }

    .flash-msg.success {
      background: #f0fdf4;
      color: #16a34a;
      border: 1px solid #bbf7d0;
    }

    /* Input fields */
    .input-group-custom { margin-bottom: 16px; }

    .input-label {
      display: block;
      font-size: 12px;
      font-weight: 600;
      color: #374151;
      margin-bottom: 7px;
      letter-spacing: 0.2px;
    }

    .input-field-wrap { position: relative; }

    .input-field-wrap i {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 13px;
      color: #9ca3af;
      pointer-events: none;
      transition: color 0.2s, transform 0.2s;
    }

    .input-field-wrap input {
      width: 100%;
      padding: 12px 14px 12px 40px;
      border: 1.5px solid var(--border);
      border-radius: 10px;
      font-size: 14px;
      font-family: 'DM Sans', sans-serif;
      color: var(--text);
      background: var(--input-bg);
      outline: none;
      transition: border-color 0.2s, background 0.2s, box-shadow 0.2s;
    }

    .input-field-wrap input::placeholder { color: #d1d5db; }

    .input-field-wrap input:focus {
      border-color: var(--blue);
      background: #ffffff;
      box-shadow: 0 0 0 4px rgba(37,99,235,0.08);
    }

    .input-field-wrap:focus-within i {
      color: var(--blue);
      transform: translateY(-50%) scale(1.1);
    }

    /* Fix icon positions */
    .input-field-wrap .icon-left  { left: 14px; right: auto; }
    .input-field-wrap .icon-right {
      left: auto; right: 14px;
      pointer-events: all;
      cursor: pointer;
    }
    .input-field-wrap:focus-within .icon-right {
      transform: translateY(-50%) scale(1); /* don't scale the eye icon */
    }

    /* ===== SUBMIT BUTTON ===== */
    .btn-login {
      width: 100%;
      padding: 13px;
      margin-top: 24px;
      background: linear-gradient(135deg, var(--blue-light) 0%, var(--blue-dark) 100%);
      color: #ffffff;
      border: none;
      border-radius: 10px;
      font-size: 14.5px;
      font-weight: 700;
      font-family: 'DM Sans', sans-serif;
      cursor: pointer;
      letter-spacing: 0.2px;
      box-shadow: 0 4px 16px rgba(37,99,235,0.35);
      transition: transform 0.2s, box-shadow 0.2s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      position: relative;
      overflow: hidden;
    }

    /* Shimmer sweep on button */
    .btn-login::after {
      content: '';
      position: absolute;
      top: 0; left: -70%;
      width: 50%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transform: skewX(-20deg);
      animation: btn-shimmer 3.5s ease-in-out infinite;
    }

    @keyframes btn-shimmer {
      0%   { left: -70%; }
      55%  { left: 130%; }
      100% { left: 130%; }
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(37,99,235,0.45);
    }

    .btn-login:active {
      transform: translateY(0);
      box-shadow: 0 3px 10px rgba(37,99,235,0.3);
    }

    .btn-login #btnArrow {
      transition: transform 0.2s;
    }
    .btn-login:hover #btnArrow { transform: translateX(4px); }

    /* Loading state */
    .btn-login .spinner {
      display: none;
      width: 16px; height: 16px;
      border: 2px solid rgba(255,255,255,0.4);
      border-top-color: white;
      border-radius: 50%;
      animation: spin 0.6s linear infinite;
      flex-shrink: 0;
    }

    /* Footer */
    .form-footer {
      margin-top: 32px;
      text-align: center;
      font-size: 12px;
      color: #9ca3af;
      line-height: 1.6;
    }

    .form-footer strong { color: #6b7280; }

    .login-copyright {
      position: absolute;
      bottom: 20px;
      font-size: 11.5px;
      color: #d1d5db;
      text-align: center;
      z-index: 1;
    }

    /* ===== GLOBAL KEYFRAMES ===== */
    @keyframes spin { to { transform: rotate(360deg); } }

    @keyframes fadeSlideUp {
      from { opacity: 0; transform: translateY(22px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
      body { flex-direction: column; overflow: auto; }
      .login-left { display: none; }
      .login-right { flex: 1; padding: 48px 28px 32px; justify-content: center; }
      .mobile-logo { display: flex; }
      .login-copyright { position: static; margin-top: 28px; }
    }
  </style>
</head>

<body>

  <canvas id="particles"></canvas>

  <!-- ===== LEFT PANEL ===== -->
  <div class="login-left">

    <div class="deco-ring"></div>
    <div class="deco-ring"></div>
    <div class="deco-ring"></div>

    <div class="left-dot-grid">
      <?php for ($i = 0; $i < 25; $i++): ?>
        <span></span>
      <?php endfor; ?>
    </div>

    <div class="left-inner">

      <!-- Logo -->
      <div class="left-logo-wrap">
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo PT Pordjo"
             onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
        <i class="fas fa-chart-bar logo-fallback" style="display:none;"></i>
      </div>

      <h2 class="left-tagline">Sistem Manajemen<br>Stok &amp; Penjualan</h2>

      <div class="left-divider"></div>

      <p class="left-desc">
        Platform terpadu untuk mengelola stok baja dan besi,<br>
        transaksi penjualan, serta laporan keuangan<br>
        PT Pordjo Steelindo Perkasa.
      </p>

      <div class="left-badge-row">
        <div class="left-badge">
          <i class="fas fa-boxes"></i>
          <span>Stok Real-time</span>
        </div>
        <div class="left-badge">
          <i class="fas fa-file-invoice-dollar"></i>
          <span>Laporan Otomatis</span>
        </div>
        <div class="left-badge">
          <i class="fas fa-shield-alt"></i>
          <span>Data Aman</span>
        </div>
      </div>

    </div>
  </div>

  <!-- ===== RIGHT PANEL (FORM) ===== -->
  <div class="login-right">

    <div class="login-form-wrap">

      <!-- Mobile logo -->
      <div class="mobile-logo">
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo PT Pordjo"
             onerror="this.style.display='none'">
      </div>

      <h1 class="form-title">Selamat Datang</h1>
      <p class="form-sub">Masukkan kredensial Anda untuk mengakses sistem.</p>

      <!-- Flash message — TIDAK DIUBAH -->
      <?php $pesan = $this->session->flashdata('pesan'); ?>
      <?php if ($pesan): ?>
        <div class="flash-msg error">
          <i class="fas fa-exclamation-circle"></i>
          <?= $pesan ?>
        </div>
      <?php endif; ?>

      <!-- Form — action TIDAK DIUBAH -->
      <form action="<?= site_url('auth/proses') ?>" method="post" id="loginForm">

        <div class="input-group-custom">
          <label class="input-label" for="username">Username</label>
          <div class="input-field-wrap">
            <i class="fas fa-user icon-left"></i>
            <input
              type="text"
              id="username"
              name="username"
              placeholder="Masukkan username"
              required
              autofocus
              autocomplete="username"
            >
          </div>
        </div>

        <div class="input-group-custom">
          <label class="input-label" for="password">Password</label>
          <div class="input-field-wrap">
            <i class="fas fa-lock icon-left"></i>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Masukkan password"
              required
              autocomplete="current-password"
            >
            <i class="fas fa-eye icon-right" id="togglePassword" title="Tampilkan password"></i>
          </div>
        </div>

        <button type="submit" class="btn-login" id="btnLogin">
          <span class="spinner" id="btnSpinner"></span>
          <span id="btnText">Masuk ke Sistem</span>
          <i class="fas fa-arrow-right" id="btnArrow"></i>
        </button>

      </form>

      <div class="form-footer">
        <strong>PT Pordjo Steelindo Perkasa</strong><br>
        Sistem Manajemen Stok &amp; Penjualan
      </div>

    </div>

    <p class="login-copyright">© <?= date('Y') ?> PT Pordjo Steelindo Perkasa. All rights reserved.</p>

  </div>

</body>

<script>
  /* ── Floating particles (left panel only) ── */
  (function () {
    const canvas = document.getElementById('particles');
    const ctx    = canvas.getContext('2d');
    let W, H, particles = [];

    function resize() {
      W = canvas.width  = window.innerWidth;
      H = canvas.height = window.innerHeight;
    }

    function Particle() { this.reset(true); }

    Particle.prototype.reset = function (preAge) {
      const leftW = W * 0.46;
      this.x      = Math.random() * leftW;
      this.y      = Math.random() * H;
      this.r      = Math.random() * 1.6 + 0.4;
      this.vx     = (Math.random() - 0.5) * 0.35;
      this.vy     = -Math.random() * 0.55 - 0.1;
      this.alpha  = Math.random() * 0.35 + 0.1;
      this.life   = preAge ? Math.floor(Math.random() * 180) : 0;
      this.maxLife = Math.random() * 180 + 100;
    };

    function init() {
      particles = [];
      for (let i = 0; i < 50; i++) particles.push(new Particle());
    }

    function draw() {
      ctx.clearRect(0, 0, W, H);
      particles.forEach(p => {
        p.life++;
        if (p.life > p.maxLife) { p.reset(false); return; }

        const t = p.life / p.maxLife;
        const a = t < 0.2 ? (t / 0.2) * p.alpha
                : t > 0.8 ? ((1 - t) / 0.2) * p.alpha
                : p.alpha;

        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(147,197,253,${a})`;
        ctx.fill();

        p.x += p.vx;
        p.y += p.vy;
      });
      requestAnimationFrame(draw);
    }

    resize();
    init();
    draw();
    window.addEventListener('resize', () => { resize(); init(); });
  })();

  /* ── Toggle password visibility — TIDAK DIUBAH ── */
  document.getElementById('togglePassword').addEventListener('click', function () {
    var input = document.getElementById('password');
    var icon  = this;
    if (input.type === 'password') {
      input.type = 'text';
      icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
      input.type = 'password';
      icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
  });

  /* ── Loading state on submit — TIDAK DIUBAH ── */
  document.getElementById('loginForm').addEventListener('submit', function () {
    var btn     = document.getElementById('btnLogin');
    var spinner = document.getElementById('btnSpinner');
    var text    = document.getElementById('btnText');
    var arrow   = document.getElementById('btnArrow');

    btn.disabled          = true;
    btn.style.opacity     = '0.85';
    spinner.style.display = 'block';
    text.textContent      = 'Memproses...';
    arrow.style.display   = 'none';
  });
</script>

</html>