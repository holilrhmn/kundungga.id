<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeline = Timeline::latest()->get();

        return view('admin.timeline.index', compact('timeline'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.timeline.create',[
            'title' =>'Tambah Timeline']);
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
            'deskripsi' => 'required|min:20',
            'tahun' => 'required|min:2',
            'foto' => 'required|image',
        ]);

        $image = $request->file('foto');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/timeline');

        $image->move($destinationPath,$name);
        $timeline = Timeline::create([
         'title' => $request->title,
         'deskripsi' => $request->deskripsi,
         'tahun' => $request->tahun,
         'foto'   => $name,
        ]);

         if($timeline) {
            session()->flash('success', 'Data saved successfully');
        } else {
            session()->flash('error', 'Data failed to save');
        }

         return redirect()->route('admin.timeline.index');
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
    public function edit(Timeline $timeline)
    {
        
        return view('admin.timeline.edit', [
            'title' => 'Edit Data Timeline',
            'timeline' => $timeline,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'deskripsi' => 'required|min:20',
            'tahun' => 'required|min:2',
            'foto' => 'required|image',
        ]);

        $timeline = Timeline::find($id);
        $name = $timeline->foto;

        if($request->hasFile('foto')){
            $image = $request->file('foto');
            $name= time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/timeline');
            $image->move($destinationPath,$name);
        }
        
        $timeline->title = $request->get('title');
        $timeline->deskripsi = $request->get('deskripsi');
        $timeline->tahun = $request->get('tahun');
        $timeline->foto = $name;
        $timeline->save();

        if($timeline) {
            session()->flash('success', 'Data Raja Berhasil Diperbarui');
        } else {
            session()->flash('error', 'Data Raja Gagal Disimpan');
        }

         return redirect()->route('admin.timeline.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timeline $timeline)
    {
        $timeline->delete();
        return redirect()->route('admin.timeline.index')
            ->with('danger', 'Data Timeline Berhasil dihapus');
    }
}
