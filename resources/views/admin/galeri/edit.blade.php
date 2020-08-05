@extends('layouts.dashboard.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Kerajaan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.galeri.update',$galeri)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for=""@error('title') class="text-danger" @enderror >Judul</label>
                    <input type="text" name="title" class="form-control @error('title') form-control is-invalid @enderror"
                    placeholder="Masukkan Judul" value="{{ $galeri->title ?? old('title') }}">
                    @error('title')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group @error('kerajaan_id') has-error @enderror ">
                    <label for=""@error('kerajaan_id') class="text-danger" @enderror >Asal</label>
                    <select name="kerajaan_id" class="form-control select2" >
                        @foreach ($kerajaan as $k)
                        <option value="{{ $k->id }}"
                            @if ($k->id == $galeri->kerajaan_id)
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
                <div class="form-group @error('kategori_id') has-error @enderror ">
                    <label for=""@error('kategori_id') class="text-danger" @enderror >Kategori</label>
                    <select name="kategori_id" class="form-control select2" >
                        @foreach ($kategori as $k)
                        <option value="{{ $k->id }}"
                            @if ($k->id == $galeri->kategori_id)
                                selected
                            @endif
                        >
                            {{ $k->nama }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <span  class="help-block"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('deskripsi') class="text-danger" @enderror >Deskripsi</label>
                    <textarea name="deskripsi" id="" rows="3" class="form-control my-editor @error('deskripsi') form-control is-invalid @enderror"
                    placeholder="Masukkan Deskripsi Kerajaan"> {{$galeri->deskripsi}} </textarea>
                    @error('deskripsi')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('tanggal') class="text-danger" @enderror >Tanggal</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') form-control is-invalid @enderror"
                    placeholder="Masukkan Tanggal" value="{{$galeri->tanggal ?? old('tanggal') }}">
                    @error('tanggal')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('dimensi') class="text-danger" @enderror >Dimensi</label>
                    <input type="text" name="dimensi" class="form-control @error('dimensi') form-control is-invalid @enderror"
                    placeholder="Masukkan Ukuran Dimensi" value="{{ old('dimensi') }}">
                    @error('dimensi')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('lokasi') class="text-danger" @enderror >Lokasi</label>
                    <input type="text" name="lokasi" class="form-control @error('lokasi') form-control is-invalid @enderror"
                    placeholder="Masukkan Lokasi" value="{{ $galeri->lokasi ?? old('lokasi') }}">
                    @error('lokasi')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('foto') class="text-danger" @enderror >Foto Galeri</label>
                    <input type="file" name="foto" class="form-control">
                    @error('foto')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                    <b><p class="">Format Foto : JPG,JPEG,PNG</p></b>
                </div>
                <div class="form-group @error('author_id') has-error @enderror ">
                    <select name="author_id" class="form-control select2" >
                        @foreach ($author as $a)
                        <option value="{{ $a->id }}"
                            @if ($a->id == $galeri->author_id)
                                selected
                            @endif
                        >
                            {{ $a->name }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <span  class="help-block"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="Tambah" class="btn btn-primary mt-3">
                </div>
            </form>
        </div>
    </div>
@endsection
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
