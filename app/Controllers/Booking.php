<?php

namespace App\Controllers;

use App\Models\BookingModel;

class Booking extends BaseController
{
    public function adminIndex()
    {
        // Cek apakah admin sudah login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('admin/login'));

        }

        // Ambil data booking
        $model = new BookingModel();
        $data['bookingList'] = $model->findAll();

        // Tampilkan ke view
        return view('admin_booking', $data); // atau 'admin/admin_booking' jika pakai folder
    }
    
}
