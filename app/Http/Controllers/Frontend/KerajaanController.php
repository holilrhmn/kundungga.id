<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Kerajaan;
use App\Manuskrip;
use Illuminate\Http\Request;
use App\Raja;
use App\User;

class KerajaanController extends Controller
{
    public function home(){
        $kerajaan = Kerajaan::all();
        return view('welcome',compact('kerajaan'));
    }

    public function show($slug)
    {
        $kerajaan = Kerajaan::where('slug', $slug)->firstOrFail();
        $raja = Raja::all();
        $manuskrip = Manuskrip::where('kerajaan_id',$kerajaan->id)->get();

        return view('frontend.kerajaan.detail',compact('kerajaan', 'raja','manuskrip'));
    }

    public function index()
    {
        $kerajaan = Kerajaan::all();
        $author = User::all();
        $manuskrip = Manuskrip::all();
        $raja =Raja::all();

        return view('frontend.kerajaan.index',compact('kerajaan','author','manuskrip','raja'));
    }


}
