<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard Admin</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css " />
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f4f6f9;
      transition: margin-left 0.3s ease;
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

    .laporan-box {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }

    .laporan-info {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
    }

    .info-card {
      flex: 1;
      background: #3498db;
      color: white;
      padding: 20px;
      border-radius: 8px;
      text-align: center;
    }

    canvas {
      background: white;
      padding: 10px;
      border-radius: 10px;
    }
  </style>
</head>

<body>

<!-- Tombol Menu -->
<button id="menu-toggle">
  <i class="fas fa-bars"></i>
</button>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
  <h2 style="text-align: center;">
    <i class="fa-solid fa-headphones"></i>
    <span style="margin-left: 8px;">Studio</span>
  </h2>
  <a href="<?= base_url('admin/dashboard') ?>">🏠 Home</a>
  <a href="<?= base_url('admin/booking') ?>">📅 Booking</a>
  <a href="<?= base_url('admin/laporan_booking') ?>">📈 Laporan</a>
  <a href="<?= base_url('admin/setting') ?>">⚙ Setting</a>
  <a href="<?= base_url('admin/logout') ?>">🔒 Logout</a>
</div>

<!-- Konten Utama -->
<div class="content">
  <div class="laporan-box">
    <h2>📈 Laporan Booking</h2>
    <div class="laporan-info">
      <div class="info-card">
        <h3>Hari Ini</h3>
        <p><?= $totalHariIni ?> Booking</p>
      </div>
      <div class="info-card" style="background: #2ecc71;">
        <h3>Bulan Ini</h3>
        <p><?= $totalBulanIni ?> Booking</p>
      </div>
    </div>

    <canvas id="grafikBooking" height="100"></canvas>
  </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('grafikBooking').getContext('2d');

const grafik = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode($bulanList) ?>,
    datasets: [{
      label: 'Jumlah Booking per Bulan',
      data: <?= json_encode($jumlahBookingList) ?>,
      backgroundColor: 'rgba(52, 152, 219, 0.7)',
      borderColor: 'rgba(41, 128, 185, 1)',
      borderWidth: 1,
      borderRadius: 5
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: { display: false },
      tooltip: { enabled: true }
    },
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
          stepSize: 1
        }
      }
    }
  }
});

</script>

<!-- Sidebar toggle -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');

    if (menuToggle && sidebar) {
      menuToggle.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        document.body.classList.toggle('sidebar-open');
        menuToggle.classList.toggle('active');

        const icon = menuToggle.querySelector('i');
        icon.classList.toggle('fa-bars');
        icon.classList.toggle('fa-times');
      });
    }
  });
</script>

</body>
</html>
