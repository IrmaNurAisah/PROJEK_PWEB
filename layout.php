<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body { font-family: Arial, sans-serif; background-color: #f4f6f9; }
    .sidebar { width: 250px; background-color: #343a40; height: 100vh; color: white; position: fixed; top: 0; left: 0; padding: 20px 0; }
    .sidebar a { color: white; display: block; padding: 10px 20px; text-decoration: none; }
    .sidebar a:hover { background-color: #495057; }
    .content { margin-left: 250px; padding: 20px; }
    .header { background-color: #007bff; color: white; padding: 15px 20px; }
  </style>
</head>
<body>
  <div class="sidebar">
    <div class="text-center mb-4">
      <img src="<?= base_url('assets/img/user.png') ?>" class="rounded-circle" width="80"><br>
      <strong><?= session('nama') ?></strong>
      <div class="text-success">Online</div>
    </div>
    <a href="<?= base_url('/admin/home') ?>"><i class="fa fa-home"></i> Home</a>
    <a href="<?= base_url('/admin/booking') ?>"><i class="fa fa-calendar-check"></i> Booking</a>
    <a href="<?= base_url('/admin/laporan') ?>"><i class="fa fa-chart-bar"></i> Laporan</a>
    <a href="<?= base_url('/admin/user') ?>"><i class="fa fa-users"></i> Users</a>
    <a href="<?= base_url('/logout') ?>"><i class="fa fa-sign-out-alt"></i> Logout</a>
  </div>

  <div class="content">
    <div class="header">
      Selamat Datang, <?= session('nama') ?>
    </div>
    <?= $this->renderSection('content') ?>
  </div>
</body>
</html>
