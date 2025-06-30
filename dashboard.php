<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f4f6f9;
    }
    .sidebar {
      position: fixed;
      width: 220px;
      height: 100%;
      background-color: #2c3e50;
      color: white;
      padding-top: 20px;
      transition: all 0.3s;
      z-index: 1000;
    }
    .sidebar.collapsed {
      width: 0;
      overflow: hidden;
    }
    .sidebar h2 {
      text-align: center;
      margin: 0;
      padding: 0 16px;
      font-size: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      transition: opacity 0.3s;
    }
    .sidebar a {
      display: block;
      padding: 12px 20px;
      color: white;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color:rgb(94, 52, 52);
    }
    .toggle-btn {
      position: fixed;
      top: 15px;
      left: 15px;
      font-size: 20px;
      background-color: #3498db;
      color: white;
      padding: 8px 12px;
      border-radius: 4px;
      cursor: pointer;
      z-index: 1100;
    }
        .content {
      padding: 20px;
      margin-left: 20px;
      transition: margin-left 0.3s ease;
    }

    body.sidebar-open .content {
      margin-left: 250px;
    }

    .sidebar {
      width: 250px;
      position: fixed;
      left: -250px; /* Awalnya disembunyikan */
      top: 0;
      bottom: 0;
      background: #2c3e50;
      color: white;
      padding-top: 60px;
      transition: left 0.3s ease;
      z-index: 1000;
    }

    .sidebar.active {
      left: 0; /* Muncul saat aktif */
    }

    .sidebar a {
      display: block;
      padding: 12px 20px;
      color: white;
      text-decoration: none;
    }

    .sidebar a:hover {
      background-color: #444;
    }

    #menu-toggle.active i {
  color: red;
}


    #menu-toggle {
  position: fixed;
  top: 15px;
  left: 15px;
  z-index: 1100;
  background: none;
  border: none;
  padding: 0;
  font-size: 24px;
  cursor: pointer;
  color: #2c3e50;
  display: flex;
  align-items: center;
  gap: 6px;
  transition: color 0.3s ease;
}

#menu-toggle.active {
  color: white;
}

#menu-toggle.active i {
  color: red;
}
    .content.collapsed {
      margin-left: 0;
    }
    .header {
      background-color: #3498db;
      color: white;
      padding: 15px;
    }
    .welcome-box {
      background-color: #e74c3c;
      color: white;
      padding: 20px;
      margin-top: 20px;
      font-size: 18px;
      border-radius: 6px;
    }
    .time-now {
      font-size: 36px;
      font-weight: bold;
    }
    .panel-container {
      display: flex;
      gap: 20px;
      margin-top: 20px;
      flex-wrap: wrap;
    }
    .panel {
      flex: 1;
      background: white;
      padding: 15px;
      border-radius: 6px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      min-width: 250px;
    }
    .panel h3 {
      margin-top: 0;
    }
    .footer {
      text-align: center;
      font-size: 12px;
      color: gray;
      margin-top: 40px;
    }
  </style>
</head>
<body>

<!-- Tombol Menu -->
  <button id="menu-toggle">
    <i class="fas fa-bars"></i>
  </button>


<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <h2>
    <i class="fa-solid fa-headphones"></i> <span>Studio</span>
  </h2>
  <a href="<?= base_url('admin/dashboard') ?>">🏠 Home</a>
  <a href="<?= base_url('admin/booking') ?>">📅 Booking</a>
  <a href="<?= base_url('admin/laporan_booking') ?>">📈 Laporan</a>
  <a href="<?= base_url('admin/s') ?>">🔓 Logout</a>
</div>etting') ?>">⚙ Setting</a>
  <a href="<?= base_url('admin/logout

<!-- Konten -->
<div class="content" id="mainContent">
  <div class="header">
    <strong>Home</strong>
  </div>

  <div class="welcome-box">
    Selamat <?= (date('H') >= 12 ? 'sore' : 'pagi') ?>!
    <div class="time-now" id="jamSekarang">00:00:00</div>
  </div>

  <div class="panel-container">
    <div class="panel">
      <h3>PENDAHULUAN</h3>
      <p>Bintang Music Studio menyediakan penjualan alat musik dan layanan sewa studio latihan musik secara praktis dan nyaman.</p>
    </div>
    <div class="panel">
      <h3>KINERJA SISTEM</h3>
      <p>Sistem memudahkan pengelolaan data booking, laporan penghasilan, dan penyewaan studio.</p>
    </div>
    <div class="panel">
      <h3>INFORMASI</h3>
      <p>Pastikan data booking diisi lengkap dan benar. Hubungi admin jika ada kendala.</p>
    </div>
  </div>

  <div class="footer">
    Copyright &copy; <?= date('Y') ?>. All rights reserved. | Version 1.0.0
  </div>
</div>

<!-- Script Jam + Toggle -->
<script>
  function updateTime() {
    const now = new Date();
    const jam = now.toLocaleTimeString('id-ID');
    document.getElementById("jamSekarang").innerText = jam;
  }
  setInterval(updateTime, 1000);
  updateTime();

  // Toggle Sidebar
  const sidebar = document.getElementById("sidebar");
  const toggleBtn = document.getElementById("menu-toggle");
  const icon = toggleBtn.querySelector("i");

  toggleBtn.addEventListener("click", function () {
    sidebar.classList.toggle("active");
    document.body.classList.toggle("sidebar-open");
    toggleBtn.classList.toggle("active");

    // Ganti icon menu
    if (sidebar.classList.contains("active")) {
      icon.classList.remove("fa-bars");
      icon.classList.add("fa-xmark");
    } else {
      icon.classList.remove("fa-xmark");
      icon.classList.add("fa-bars");
    }
  });
</script>

</body>
</html>