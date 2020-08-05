<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kerajaan;
use App\Galeri;
use App\User;
use App\Kategori;
use Cviebrock\EloquentSluggable\Services\SlugService;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galeri::get()->all();
        $kerajaan = Kerajaan::all();
        $user = User::all();
        $kategori = Kategori::all();

        return view('admin.galeri.index',compact('kerajaan','galeri','kategori'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kerajaan = Kerajaan::select('id','nama_kerajaan')->get();
        $kategori = Kategori::select('id','nama')->get();
        $author = User::select('id','name')->get();
        return view('admin.galeri.create',compact('kerajaan','author','kategori'),[
            'title' =>'Tambah Galeri']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'kerajaan_id' => 'required',
            'kategori_id' => 'required',
            'deskripsi' => 'required|min:20',
            'dimensi' => 'required',
            'tanggal' => 'required',
            'lokasi' => 'required',
            'foto' => 'required|image',
            'author_id' => 'required',
        ]);

        $image = $request->file('foto');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/galeri');
        $image->move($destinationPath,$name);

        $galeri = Galeri::create([
         'title' => $request->title,
         'kerajaan_id' => $request->kerajaan_id,
         'kategori_id' => $request->kategori_id,
         'deskripsi' => $request->deskripsi,
         'dimensi' => $request->dimensi,
         'slug' => SlugService::createSlug(Galeri::class, 'slug', $request->title),
         'tanggal' => $request->tanggal,
         'lokasi' => $request->lokasi,
         'foto'   => $name,
         'author_id' => $request->author_id,
        ]);

         if($galeri) {
            session()->flash('success', 'Data saved successfully');
        } else {
            session()->flash('error', 'Data failed to save');
        }

         return redirect()->route('admin.galeri.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galeri= Galeri::find($id);
        $kerajaan= Kerajaan::all();

        return view('admin.galeri.show',compact('kerajaan','galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        $kerajaan = Kerajaan::select('id','nama_kerajaan')->get();
        $kategori = Kategori::select('id','nama')->get();
        $author = User::all();
        return view('admin.galeri.edit',compact('kerajaan','author','kategori'), [
            'title' => 'Edit Data Galeri',
            'galeri' => $galeri,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'kerajaan_id' => 'required',
            'kategori_id' => 'required',
            'deskripsi' => 'required|min:20',
            'dimensi' => 'required',
            'tanggal' => 'required',
            'lokasi' => 'required',
            'foto' => 'required|image',
            'author_id' => 'required',
        ]);


        $galeri = Galeri::find($id);
        $name = $galeri->foto;

        if($request->hasFile('foto')){
            $image = $request->file('foto');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/galeri');
            $image->move($destinationPath,$name);
        }
        $galeri->title = $request->get('title');
        $galeri->kerajaan_id = $request->get('kerajaan_id');
        $galeri->dimensi = $request->get('dimensi');
        $galeri->deskripsi = $request->get('deskripsi');
        $galeri->tanggal = $request->get('tanggal');
        $galeri->lokasi = $request->get('lokasi');
        $galeri->kategori_id = $request->get('kategori_id');
        $galeri->foto = $name;
        $galeri->author_id = $request->get('author_id');
        $galeri->save();

        if($galeri) {
            session()->flash('success', 'Data Galeri Berhasil Diperbarui');
        } else {
            session()->flash('error', 'Data GaleriGagal Disimpan');
        }

         return redirect()->route('admin.galeri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        $galeri->delete();
        return redirect()->route('admin.galeri.index')
            ->with('danger', 'Data Galeri Berhasil dihapus');
    }
}
