<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BookingModel;
use CodeIgniter\Controller;

class AdminLogin extends Controller
{
    public function index()
    {
        return view('admin/login'); // Pastikan file ini ada di app/Views/admin/login.php
    }

    public function auth()
    {
        $session = session();
        $model = new AdminModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $model->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            $session->set([
                'admin_id' => $admin['id'],
                'admin_username' => $admin['username'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah');
        }
    }

    public function logout()
{
    session()->destroy();
    return redirect()->to(base_url('admin/login')); // ✅ Benar
}


    private function isLoggedIn()
    {
        return session()->get('isLoggedIn') === true;
    }

    public function booking()
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/admin/login');
        }

        $model = new BookingModel();
        $data['bookingList'] = $model->findAll();
        return view('admin/list_booking', $data);
    }

    public function edit($id)
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/admin/login');
        }

        $model = new BookingModel();
        $data['booking'] = $model->find($id);

        if (!$data['booking']) {
            return redirect()->to('/admin/booking')->with('error', 'Data tidak ditemukan');
        }

        return view('admin/edit_booking', $data);
    }

    public function update($id)
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/admin/login');
        }

        $model = new BookingModel();

        $data = [
            'nama'         => $this->request->getPost('nama'),
            'tanggal'      => $this->request->getPost('tanggal'),
            'jam_mulai'    => $this->request->getPost('jam_mulai'),
            'jam_selesai'  => $this->request->getPost('jam_selesai'),
            'jumlah_sesi'  => $this->request->getPost('jumlah_sesi'),
            'total_biaya'  => $this->request->getPost('total_biaya')
        ];

        $model->update($id, $data);
        return redirect()->to('/admin/booking')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        if (! $this->isLoggedIn()) {
            return redirect()->to('/admin/login');
        }

        $model = new BookingModel();
        $model->delete($id);
        return redirect()->to('/admin/booking')->with('success', 'Data berhasil dihapus');
    }

 
    public function dashboard()
{
    if (! $this->isLoggedIn()) {
        return redirect()->to('/admin/login');
    }

    $model = new BookingModel();
    $today = date('Y-m-d');
    $thisMonth = date('Y-m');

    // Ambil data booking hari ini
    $bookingList = $model->where('tanggal', $today)->findAll();

    $totalBookingHariIni = count($bookingList);
    $studioAktif = 0;
    $totalPenghasilan = 0;

    $now = strtotime(date('Y-m-d H:i'));

    foreach ($bookingList as $b) {
        $start = strtotime($b['tanggal'] . ' ' . $b['jam_mulai']);
        $end   = strtotime($b['tanggal'] . ' ' . $b['jam_selesai']);

        if ($now >= $start && $now < $end) {
            $studioAktif++;
        }

        $totalPenghasilan += (int)$b['total_biaya'];
    }

    return view('admin/dashboard', [
        'totalBookingHariIni' => $totalBookingHariIni,
        'studioAktif'         => $studioAktif,
        'totalPenghasilan'    => $totalPenghasilan,
        'bookingList'         => $bookingList
    ]);
}


public function laporan()
{
    $model = new BookingModel();
    $today = date('Y-m-d');
    $bulanIni = date('Y-m');

    $totalHariIni = $model->where('tanggal', $today)->countAllResults();
    $totalBulanIni = $model->like('tanggal', $bulanIni, 'after')->countAllResults();

    // Contoh data dummy untuk grafik
    $bulanList = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'];
    $jumlahBookingList = [5, 8, 4, 10, 6, 7];

    return view('admin/laporan_booking', [
        'totalHariIni' => $totalHariIni,
        'totalBulanIni' => $totalBulanIni,
        'bulanList' => $bulanList,
        'jumlahBookingList' => $jumlahBookingList
    ]);
}
public function setting()
{
    if (! $this->isLoggedIn()) {
        return redirect()->to('/admin/login');
    }

    return view('admin/setting');
}

public function formCreate()
{
    return view('admin/create'); // jika file form berada di app/Views/admin/create.php
}


}