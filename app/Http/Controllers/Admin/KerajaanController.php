<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kerajaan;
use Cviebrock\EloquentSluggable\Services\SlugService;

class KerajaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $kerajaan = Kerajaan::latest()->get();

        return view('admin.kerajaan.index',compact('kerajaan'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kerajaan.create',[
            'title' =>'Tambah Kerajaan']);
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
            'nama_kerajaan' => 'required|min:5',
            'deskripsi' => 'required|min:20',
            'pemerintahan' => 'required|min:20',
            'foto' => 'required|image',
            'tradisi_lisan' => 'required',
            'adat_istiadat' => 'required',
            'ritus' => 'required',
            'seni' => 'required',
            'bahasa' => 'required',
            'cagar_budaya' => 'required',
        ]);

        $image = $request->file('foto');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/kerajaan');
        $image->move($destinationPath,$name);

        $kerajaan = kerajaan::create([
            'nama_kerajaan' => $request->nama_kerajaan,
            'deskripsi' => $request->deskripsi,
            'pemerintahan' => $request->pemerintahan,
            'tradisi_lisan' => $request->tradisi_lisan,
            'adat_istiadat' => $request->adat_istiadat,
            'ritus' => $request->ritus,
            'seni' => $request->seni,
            'bahasa' => $request->bahasa,
            'cagar_budaya' => $request->cagar_budaya,
            'slug' => SlugService::createSlug(Kerajaan::class, 'slug', $request->nama_kerajaan),
            'foto'   => $name,
        ]);

         if($kerajaan) {
            session()->flash('success', 'Data Kerajaan Berhasil DItambahkan');
        } else {
            session()->flash('error', 'Data gagal untuk ditambahkan');
        }

         return redirect()->route('admin.kerajaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kerajaan= Kerajaan::find($id);
        return view('admin.kerajaan.show',compact('kerajaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kerajaan $kerajaan)
    {
        return view('admin.kerajaan.edit', [
            'title' => 'Edit Data Kerajaan',
            'kerajaan' => $kerajaan,
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
            'nama_kerajaan' => 'required|min:5',
            'deskripsi' => 'required|min:20',
            'pemerintahan' => 'required|min:20',
            'foto' => 'required|image',
            'tradisi_lisan' => 'required',
            'adat_istiadat' => 'required',
            'ritus' => 'required',
            'seni' => 'required',
            'bahasa' => 'required',
            'cagar_budaya' => 'required',

        ]);

        $kerajaan = Kerajaan::find($id);
        $name = $kerajaan->foto;

        if($request->hasFile('foto')){
            $image = $request->file('foto');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/kerajaan');
            $image->move($destinationPath,$name);
        }

        $kerajaan->nama_kerajaan = $request->get('nama_kerajaan');
        $kerajaan->deskripsi = $request->get('deskripsi');
        $kerajaan->pemerintahan = $request->get('pemerintahan');
        $kerajaan->tradisi_lisan = $request->get('tradisi_lisan');
        $kerajaan->adat_istiadat = $request->get('adat_istiadat');
        $kerajaan->ritus = $request->get('ritus');
        $kerajaan->seni = $request->get('seni');
        $kerajaan->bahasa = $request->get('bahasa');
        $kerajaan->cagar_budaya = $request->get('cagar_budaya');
        $kerajaan->foto = $name;
        $kerajaan->save();

        if($kerajaan) {
           session()->flash('success', 'Data Kerajaan Berhasil Diperbarui');
       } else {
           session()->flash('error', 'Data Kerajaan Gagal Disimpan');
       }

        return redirect()->route('admin.kerajaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kerajaan $kerajaan)
    {
        $kerajaan->delete();

        return redirect()->route('admin.kerajaan.index')
            ->with('danger', 'Data Kerajaan Berhasil dihapus');
    }
}
