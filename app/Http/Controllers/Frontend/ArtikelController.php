<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Artikel;
use App\User;
use App\Kerajaan;
use App\Kategori;

class ArtikelController extends Controller
{
    public function index()
    {
        $kerajaan = Kerajaan::all();
        $author = User::all();
        $kategori = Kategori::all();
        $artikel = Artikel::latest()->paginate(8);
        $artikel_terlaris = Artikel::orderByViews('asc')->paginate(5);
        return view('frontend.artikel.index',compact('kerajaan','author','kategori','artikel','artikel_terlaris'));
    }


    public function show($slug)
    {

        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        views($artikel)->record();
        views($artikel)->count();
        $kerajaan= Kerajaan::all();
        $kategori = Kategori::all();
        $artikel_terkait= Artikel::where('kategori_id', '=', $artikel->kategori->id)->where('id', '!=', $artikel->id)->get();
        return view('frontend.artikel.detail',compact('kerajaan','artikel','kategori','artikel_terkait'));
    }
}
