<?php

namespace App\Http\Controllers\Frontend;

use App\Galeri;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Kerajaan;
use App\Manuskrip;
use App\Raja;
use App\User;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $kerajaan = Kerajaan::all();

        $manuskrip = Manuskrip::all();
        $raja =Raja::all();
        $galeri = Galeri::all();
        $kategori = Kategori::all();
        return view('frontend.galeri.index',compact('kerajaan','manuskrip','galeri'));
    }

    public function show($slug)
    {
        $galeri = Galeri::where('slug', $slug)->firstOrFail();
        $raja = Raja::all();
        $manuskrip = Manuskrip::all();
        $author = User::all();
        $kategori = Kategori::all();
        $kerajaan = Kerajaan::all();
        return view('frontend.galeri.detail',compact('kategori','author','kerajaan', 'raja','manuskrip','galeri'));
    }
}
