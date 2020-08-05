@extends('layouts.dashboard.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Kategori</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kategori.update',$kategori)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for=""@error('nama') class="text-danger" @enderror >Nama Kategori</label>
                    <input type="text" name="nama" class="form-control @error('nama') form-control is-invalid @enderror"
                    placeholder="Masukkan Nama Kategori" value="{{$kategori->nama ?? old('nama') }}">
                    @error('nama')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="Tambah" class="btn btn-primary mt-3">
                </div>
            </form>
        </div>
    </div>
@endsection
