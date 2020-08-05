<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kerajaan;
use App\Raja;

class RajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kerajaan = Kerajaan::all();
        $raja = Raja::latest()->get();

        return view('admin.raja.index',compact('kerajaan','raja'))
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
        return view('admin.raja.create',compact('kerajaan'),[
            'title' =>'Tambah Raja']);
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
            'Nama_Raja' => 'required|min:5',
            'deskripsi' => 'required|min:20',
            'masa_jabatan' => 'required',
            'Foto_Raja' => 'required|image',
            'kerajaan_id' => 'required',
        ]);

        $image = $request->file('Foto_Raja');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/Foto_Raja');
        $image->move($destinationPath,$name);

        $raja = Raja::create([
         'Nama_Raja' => $request->Nama_Raja,
         'kerajaan_id' => $request->kerajaan_id,
         'deskripsi' => $request->deskripsi,
         'masa_jabatan' => $request->masa_jabatan,
         'Foto_Raja'   => $name,
        ]);

         if($raja) {
            session()->flash('success', 'Data saved successfully');
        } else {
            session()->flash('error', 'Data failed to save');
        }

         return redirect()->route('admin.raja.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $raja= Raja::find($id);
        $kerajaan= Kerajaan::all();
        return view('admin.kerajaan.show',compact('kerajaan','raja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Raja $raja)
    {
        $kerajaan = Kerajaan::select('id','nama_kerajaan')->get();
        return view('admin.raja.edit',compact('kerajaan'), [
            'title' => 'Edit Data Raja',
            'raja' => $raja,
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
            'Nama_Raja' => 'required|min:5',
            'deskripsi' => 'required|min:20',
            'masa_jabatan' => 'required',
            'kerajaan_id' => 'required',
            'Foto_Raja' => 'required|image',
        ]);

        $raja = Raja::find($id);
        $name = $raja->Foto_Raja;
        if($request->hasFile('Foto_Raja')){
            $image = $request->file('Foto_Raja');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/Foto_Raja');
            $image->move($destinationPath,$name);
        }

        $raja->Nama_Raja = $request->get('Nama_Raja');
        $raja->kerajaan_id = $request->get('kerajaan_id');
        $raja->deskripsi  = $request->get('deskripsi');
        $raja->masa_jabatan = $request->get('masa_jabatan');
        $raja->Foto_Raja = $name;
        $raja->save();

        if($raja) {
            session()->flash('success', 'Data Raja Berhasil Diperbarui');
        } else {
            session()->flash('error', 'Data Raja Gagal Disimpan');
        }

         return redirect()->route('admin.raja.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Raja $raja)
    {
        $raja->delete();
        return redirect()->route('admin.raja.index')
            ->with('danger', 'Data Raja Berhasil dihapus');
    }
}
