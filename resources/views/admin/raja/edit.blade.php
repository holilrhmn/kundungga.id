@extends('layouts.dashboard.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Kerajaan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.raja.update',$raja)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for=""@error('Nama_Raja') class="text-danger" @enderror >Nama Raja</label>
                    <input type="text" name="Nama_Raja" class="form-control @error('Nama_Raja') form-control is-invalid @enderror"
                    placeholder="Masukkan Nama Raja" value="{{ $raja->Nama_Raja ?? old('Nama_Raja') }}">
                    @error('Nama_Raja')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group @error('kerajaan_id') has-error @enderror ">
                    <label for=""@error('kategori_id') class="text-danger" @enderror >Kerajaan</label>
                    <select name="kerajaan_id" class="form-control select2" >
                        @foreach ($kerajaan as $k)
                        <option value="{{ $k->id }}"
                            @if ($k->id == $raja->kerajaan_id)
                                selected
                            @endif
                        >
                            {{ $k->nama_kerajaan }}</option>
                        @endforeach
                    </select>
                    @error('kerajaan_id')
                        <span  class="help-block"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('deskripsi') class="text-danger" @enderror >Deskripsi</label>
                    <textarea name="deskripsi" id="" rows="3" class="form-control deskripsi @error('deskripsi') form-control is-invalid @enderror"
                    placeholder="Masukkan Deskripsi Kerajaan"> {{$raja->deskripsi}} </textarea>
                    @error('deskripsi')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('masa_jabatan') class="text-danger" @enderror >Tahun Lahir</label>
                    <input type="text" name="masa_jabatan" class="form-control @error('masa_jabatan') form-control is-invalid @enderror"
                    placeholder="Masukkan Masa Jabatan" value="{{ $raja->masa_jabatan ?? old('masa_jabatan') }}">
                    @error('masa_jabatan')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('Foto_Raja') class="text-danger" @enderror >Foto Raja</label>
                    <input type="file" name="Foto_Raja" class="form-control">
                    @error('foto')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                    <b><p class="">Format Foto : JPG,JPEG,PNG</p></b>
                </div>
                <div class="form-group">
                    <input type="submit" value="Tambah" class="btn btn-primary mt-3">
                </div>
            </form>
        </div>
    </div>
@endsection

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea.deskripsi',
        width: 900,
        height: 300
    });
</script>
