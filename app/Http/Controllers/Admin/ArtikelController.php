<?php

namespace App\Http\Controllers\Admin;

use App\Artikel;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Kerajaan;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = User::get()->all();
        $kerajaan = Kerajaan::all();
        $kategori = Kategori::all();
        $artikel = Artikel::latest()->get();
        return view('admin.artikel.index',compact('kerajaan','kategori','artikel','author'))
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
        $tags = Tag::all();
        return view('admin.artikel.create',compact('kerajaan','author','kategori','tags'),[
            'title' =>'Tambah Artikel']);
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
            'judul' => 'required|min:5',
            'kerajaan_id' => 'required',
            'kategori_id' => 'required',
            'deskripsi' => 'required|min:20',
            'file' => 'required',
            'author_id' => 'required',
            // 'published' => 'required',
        ]);

        $image = $request->file('file');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/artikel');
        $image->move($destinationPath,$name);

        $artikel = Artikel::create([

         'judul' => $request->judul,
         'kerajaan_id' => $request->kerajaan_id,
         'kategori_id' => $request->kategori_id,
         'deskripsi' => $request->deskripsi,
         'slug' => SlugService::createSlug(Artikel::class, 'slug', $request->judul),
         'file'   => $name,
         'author_id' => $request->author_id,
        //  'published' => $request->published,
        ]);

        $artikel->tag()->attach($request->tag_id);

         if($artikel) {
            session()->flash('success', 'Data saved successfully');
        } else {
            session()->flash('error', 'Data failed to save');
        }

         return redirect()->route('admin.artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        $kerajaan= Kerajaan::all();
        $kategori= Kategori::all();
        $author= User::all();
        $tags = Tag::all();
        return view('admin.artikel.edit',compact('kerajaan','author','kategori','tags'), [
            'title' => 'Edit Data Artikel',
            'artikel' => $artikel,
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
            'judul' => 'required|min:5',
            'kerajaan_id' => 'required',
            'kategori_id' => 'required',
            'deskripsi' => 'required|min:20',

            'foto' => 'required',
            'author_id' => 'required',
            // 'published' => 'required',
        ]);


        $artikel = Artikel::find($id);
        $name = $artikel->file;

        if($request->hasFile('file')){
            $image = $request->file('file');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/artikel');
            $image->move($destinationPath,$name);
        }
        $artikel->title = $request->get('judul');
        $artikel->kerajaan_id = $request->get('kerajaan_id');
        $artikel->deskripsi = $request->get('deskripsi');
        $artikel->author_id = $request->get('author_id');
        $artikel->kategori_id = $request->get('kategori_id');
        // $artikel->published = $request->get('published');
        $artikel->file = $name;
        $artikel->save();

        if($artikel) {
            session()->flash('success', 'Data Galeri Berhasil Diperbarui');
        } else {
            session()->flash('error', 'Data GaleriGagal Disimpan');
        }

         return redirect()->route('admin.artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        return redirect()->route('admin.artikel.index')
            ->with('danger', 'Data Galeri Berhasil dihapus');
    }

}
