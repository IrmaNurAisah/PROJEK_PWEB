<?php
namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'booking_cek';  // Nama tabel disesuaikan

    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'nama', 'tanggal', 'jam_mulai', 'jumlah_sesi', 'total_biaya', 'jam_selesai'
    ];

    protected $useTimestamps = true;  // jika ada kolom created_at dan updated_at

    public function getLaporanPendapatan()
{
    return $this->select("DATE(tanggal) AS tanggal, COUNT(*) AS jumlah_booking, SUM(total_biaya) AS total_pendapatan")
                ->groupBy("DATE(tanggal)")
                ->findAll();
}
public function getTotalTransaksi()
{
    return $this->selectCount('id')->first(); // Hitung jumlah semua transaksi
}

}
