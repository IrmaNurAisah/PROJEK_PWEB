<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Setting Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f4f6f9;
    }

    .sidebar {
      width: 250px;
      position: fixed;
      left: -250px;
      top: 0;
      bottom: 0;
      background: #2c3e50;
      color: white;
      padding-top: 60px;
      transition: left 0.3s ease;
      z-index: 1000;
    }

    .sidebar.active {
      left: 0;
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

    .content {
      padding: 20px;
      margin-left: 20px;
      transition: margin-left 0.3s ease;
    }

    body.sidebar-open .content {
      margin-left: 250px;
    }

    .setting-box {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      max-width: 500px;
    }

    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: 4px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button {
      margin-top: 15px;
      background: #2980b9;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 4px;
      cursor: pointer;
    }

    h2 {
      margin-top: 0;
    }
  </style>
</head>
<body>

<!-- Tombol Toggle -->
<button id="menu-toggle">
  <i class="fas fa-bars"></i>
</button>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <h2><i class="fa-solid fa-headphones"></i> <span>Studio</span></h2>
  <a href="<?= base_url('admin/dashboard') ?>">🏠 Home</a>
  <a href="<?= base_url('admin/booking') ?>">📅 Booking</a>
  <a href="<?= base_url('admin/laporan_booking') ?>">📈 Laporan</a>
  <a href="<?= base_url('admin/setting') ?>">⚙️ Setting</a>
  <a href="<?= base_url('admin/logout') ?>">🔓 Logout</a>
</div>

<!-- Konten -->
<div class="content" id="mainContent">
  <h2>⚙️ Pengaturan Admin</h2>
  <div class="setting-box">
    <form method="post" action="#">
      <label for="password">Ganti Password</label>
      <input type="password" id="password" name="password" placeholder="Password baru">

      <label for="confirm">Konfirmasi Password</label>
      <input type="password" id="confirm" name="confirm" placeholder="Ulangi password">

      <button type="submit">Simpan Perubahan</button>
    </form>
  </div>
</div>

<!-- Script Toggle Sidebar -->
<script>
  const sidebar = document.getElementById("sidebar");
  const toggleBtn = document.getElementById("menu-toggle");
  const icon = toggleBtn.querySelector("i");

  toggleBtn.addEventListener("click", function () {
    sidebar.classList.toggle("active");
    document.body.classList.toggle("sidebar-open");
    toggleBtn.classList.toggle("active");

    // Ganti ikon
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
