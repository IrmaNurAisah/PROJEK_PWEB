<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h2><?= $title ?? 'Daftar Booking' ?></h2>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 20px;">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Jumlah Sesi</th>
            <th>Total Biaya</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($bookingList)): ?>
            <?php foreach ($bookingList as $i => $booking): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($booking['nama']) ?></td>
                    <td><?= esc($booking['tanggal']) ?></td>
                    <td><?= esc($booking['jam_mulai']) ?> - <?= esc($booking['jam_selesai']) ?></td>
                    <td><?= esc($booking['jumlah_sesi']) ?></td>
                    <td>Rp <?= number_format($booking['total_biaya'], 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6" style="text-align:center;">Data tidak ditemukan</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
