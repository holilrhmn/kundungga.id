<?php

namespace App\Http\Controllers\Admin;

use App\Artikel;
use App\Galeri;
use App\Http\Controllers\Controller;
use App\Kerajaan;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    public function index(){
        $jumlah_user = User::all()->count();
        $jumlah_artikel = Artikel::all()->count();
        $jumlah_kerajaan = Kerajaan::all()->count();
        $jumlah_galeri = Galeri::all()->count();
        return view ('admin.home')->with([
            'jumlah_user' => $jumlah_user,
            // 'notifUser' => $userNotif,
            'jumlah_artikel' => $jumlah_artikel,
            'jumlah_kerajaan' => $jumlah_kerajaan,
            'jumlah_galeri' => $jumlah_galeri,
        ]);

    }
}
