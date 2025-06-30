<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2>Edit Data Booking</h2>
    <form action="<?= base_url('admin/update/' . $booking['id']) ?>" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= esc($booking['nama']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?= esc($booking['tanggal']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="jam_mulai" class="form-label">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" value="<?= esc($booking['jam_mulai']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="jam_selesai" class="form-label">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" value="<?= esc($booking['jam_selesai']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_sesi" class="form-label">Jumlah Sesi</label>
            <input type="number" name="jumlah_sesi" class="form-control" value="<?= esc($booking['jumlah_sesi']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="total_biaya" class="form-label">Total Biaya</label>
            <input type="number" name="total_biaya" class="form-control" value="<?= esc($booking['total_biaya']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?= base_url('admin/booking') ?>" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
