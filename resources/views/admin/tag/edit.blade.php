@extends('layouts.dashboard.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Tag</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.tag.update',$tag)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for=""@error('name') class="text-danger" @enderror >Nama Tag</label>
                    <input type="text" name="name" class="form-control @error('name') form-control is-invalid @enderror"
                    placeholder="Masukkan Nama Kategori" value="{{$tag->name ?? old('name') }}">
                    @error('name')
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
