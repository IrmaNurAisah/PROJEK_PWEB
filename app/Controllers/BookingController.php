<?php

namespace App\Controllers;

use App\Models\BookingModel;

class BookingController extends BaseController
{
    // Tampilkan semua data booking
    public function index()
    {
        $model = new BookingModel();
        $data['booking_cek'] = $model->findAll();
        return view('booking/index', $data);
    }

    // Tampilkan form untuk membuat booking baru
    public function create()
    {
        return view('booking/create');
    }

    // Simpan booking dari JSON (misalnya dari frontend JS)
    public function simpan()
    {
        $json = $this->request->getJSON();

        $tanggal = $json->tanggal;
        $jamMulai = $json->mulai;
        $jumlahSesi = (int) $json->sesi;

        $start = new \DateTimeImmutable("$tanggal $jamMulai");
        $end = $start->modify("+{$jumlahSesi} hours");

        // Cek bentrok
        if ($this->isBookingConflict($tanggal, $start, $end)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Waktu booking bentrok dengan jadwal yang sudah ada.'
            ]);
        }

        $data = [
            'nama'        => $json->nama,
            'tanggal'     => $tanggal,
            'jam_mulai'   => $start->format('H:i'),
            'jam_selesai' => $end->format('H:i'),
            'jumlah_sesi' => $jumlahSesi,
            'total_biaya' => $json->total,
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ];

        $db = \Config\Database::connect();
        $builder = $db->table('booking_cek');

        if ($builder->insert($data)) {
            return $this->response->setJSON(['status' => 'success']);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $db->error()['message']
            ]);
        }
    }

    // Simpan booking dari form biasa
    public function store()
    {
        $nama = $this->request->getPost('nama');
        $tanggal = $this->request->getPost('tanggal');
        $jamMulai = $this->request->getPost('jam_mulai');
        $jumlahSesi = (int) $this->request->getPost('jumlah_sesi');

        $start = new \DateTimeImmutable("$tanggal $jamMulai");
        $end = $start->modify("+{$jumlahSesi} hours");
        $jamSelesai = $end->format('H:i');

        // Cek bentrok
        if ($this->isBookingConflict($tanggal, $start, $end)) {
            return redirect()->back()->withInput()->with('error', 'Waktu ini sudah dibooking orang lain!');
        }

        $hargaPerSesi = 40000;
        $totalBiaya = $jumlahSesi * $hargaPerSesi;

        $model = new BookingModel();
        $model->save([
            'nama' => $nama,
            'tanggal' => $tanggal,
            'jam_mulai' => $start->format('H:i'),
            'jam_selesai' => $jamSelesai,
            'jumlah_sesi' => $jumlahSesi,
            'total_biaya' => $totalBiaya,
        ]);

        return view('booking/struk', [
            'nama' => $nama,
            'tanggal' => $tanggal,
            'jam_mulai' => $start->format('H:i'),
            'jam_selesai' => $jamSelesai,
            'jumlah_sesi' => $jumlahSesi,
            'total_biaya' => $totalBiaya
        ]);
    }

    // Fungsi pengecekan bentrok
    private function isBookingConflict($tanggal, \DateTimeImmutable $start, \DateTimeImmutable $end): bool
    {
        $model = new BookingModel();
        $bookings = $model->where('tanggal', $tanggal)->findAll();

        foreach ($bookings as $b) {
            $existingStart = new \DateTimeImmutable("$tanggal {$b['jam_mulai']}");
            $existingEnd = new \DateTimeImmutable("$tanggal {$b['jam_selesai']}");

            if ($start < $existingEnd && $end > $existingStart) {
                return true; // Ada bentrok
            }
        }

        return false; // Tidak ada bentrok

    }
    public function cekjadwal()
{
    $model = new BookingModel();
    $data['jadwal'] = $model->orderBy('tanggal', 'ASC')->findAll();

    return view('booking/cek_jadwal', $data);
}
public function laporan_booking()
{
    $db = \Config\Database::connect();
    $builder = $db->table('booking_cek');

    // Ambil jumlah booking per bulan
    $builder->select("MONTH(tanggal) AS bulan, COUNT(*) AS jumlah");
    $builder->groupBy("MONTH(tanggal)");
    $builder->orderBy("bulan", "ASC");

    $query = $builder->get();

    $bulanList = [];
    $jumlahBookingList = [];

    foreach ($query->getResult() as $row) {
        $bulanNama = date('F', mktime(0, 0, 0, $row->bulan, 1));
        $bulanList[] = $bulanNama;
        $jumlahBookingList[] = (int)$row->jumlah;
    }

    // Booking hari ini
    $totalHariIni = $db->table('booking_cek')
        ->where('DATE(tanggal)', date('Y-m-d'))
        ->countAllResults();

    // Booking bulan ini
    $totalBulanIni = $db->table('booking_cek')
        ->where('MONTH(tanggal)', date('m'))
        ->where('YEAR(tanggal)', date('Y'))
        ->countAllResults();

    return view('admin/laporan_booking', [
        'bulanList' => $bulanList,
        'jumlahBookingList' => $jumlahBookingList,
        'totalHariIni' => $totalHariIni,
        'totalBulanIni' => $totalBulanIni
    ]);
}

}