@extends('layouts.dashboard.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Kategori</h3>
        </div>
        <div class="card-body">
            <form  action="{{ route('admin.kategori.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for=""@error('nama') class="text-danger" @enderror >Nama Kategori</label>
                    <input type="text" name="nama" class="form-control @error('nama') form-control is-invalid @enderror"
                    placeholder="Masukkan Nama Kategori" value="{{ old('nama') }}">
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



