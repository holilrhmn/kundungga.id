<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Manuskrip;
use Illuminate\Http\Request;
use App\Kerajaan;
class ManuskripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manuskrip = Manuskrip::get()->all();
        $kerajaan = Kerajaan::all();
        return view('admin.manuskrip.index', compact('manuskrip','kerajaan'))
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
        return view('admin.manuskrip.create',compact('kerajaan'),[
            'title' =>'Tambah Manuskrip']);
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
            'deskripsi' => 'required|min:20',
            'foto' => 'required|image',
            'sumber' => 'required',
        ]);

        $image = $request->file('foto');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/manuskrip/foto');
        $image->move($destinationPath,$name);

        // $file = $request->file('file_manuskrip');
        // $pdf = time().'.'.$file->getClientOriginalExtension();
        // $path = public_path('/manuskrip/file');
        // $file->move($path, $pdf);

        $manuskrip = Manuskrip::create([

         'title' => $request->title,
         'kerajaan_id' => $request->kerajaan_id,
         'deskripsi' => $request->deskripsi,
         'foto' =>  $name,
        //  'file_manuskrip' => $pdf,
         'sumber'   => $request->sumber,
        ]);

         if($manuskrip) {
            session()->flash('success', 'Data saved successfully');
        } else {
            session()->flash('error', 'Data failed to save');
        }

         return redirect()->route('admin.manuskrip.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manuskrip= Manuskrip::find($id);
        return view('admin.manuskrip.show',compact('manuskrip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Manuskrip $manuskrip)
    {
        $kerajaan = Kerajaan::select('id','nama_kerajaan')->get();
        $k = Kerajaan::all();
        return view('admin.manuskrip.edit',compact('kerajaan','k'), [
            'title' => 'Edit Data Manuskrip',
            'manuskrip' => $manuskrip,
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
            'deskripsi' => 'required|min:20',
            'sumber' => 'required',
            'foto' => 'required|image',
        ]);

        $manuskrip = Manuskrip::find($id);
        $name = $manuskrip->foto;

        if($request->hasFile('foto')){
            $image = $request->file('foto');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/manuskrip/foto');
            $image->move($destinationPath,$name);
        }
        $manuskrip->title = $request->get('title');
        $manuskrip->deskripsi = $request->get('deskripsi');
        $manuskrip->sumber = $request->get('sumber');
        $manuskrip->kerajaan_id = $request->get('kerajaan_id');
        $manuskrip->foto = $name;
        $manuskrip->save();

        if($manuskrip) {
            session()->flash('success', 'Data Manuskrip Berhasil Diperbarui');
        } else {
            session()->flash('error', 'Data Manuskrip Gagal Disimpan');
        }

         return redirect()->route('admin.manuskrip.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manuskrip $manuskrip)
    {
        $manuskrip->delete();
        return redirect()->route('admin.manuskrip.index')
        ->with('danger', 'Data Manuskrip Berhasil dihapus');
    }
}
