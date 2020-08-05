@extends('layouts.dashboard.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Artikel</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.artikel.update',$artikel)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for=""@error('judul') class="text-danger" @enderror >Judul</label>
                    <input type="text" name="judul" class="form-control @error('judul') form-control is-invalid @enderror"
                    placeholder="Masukkan Judul artikel" value="{{ $artikel->judul ?? old('judul') }}">
                    @error('judul')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group @error('kerajaan_id') has-error @enderror ">
                    <label for=""@error('kerajaan_id') class="text-danger" @enderror >Kerajaan</label>
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
                            <option value="pilih_kategori">Kategori</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->nama}}</option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <span  class="help-block"> {{ $message }} </span>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label>Pilih Tags</label>
                    <select class="form-control select2" multiple="" name="tags[]">
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"
                        @foreach($post->tags as $value)
                            @if($tag->id == $value->id)
                            selected
                            @endif
                        @endforeach
                            >{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group">
                    <label for=""@error('deskripsi') id="content class="text-danger" @enderror >Deskripsi</label>
                    <textarea name="deskripsi" id="" rows="3" class="form-control my-editor @error('deskripsi') form-control is-invalid @enderror"
                    placeholder="Masukkan Deskripsi Kerajaan"> {{$artikel->deskripsi }} </textarea>
                    @error('deskripsi')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for=""@error('file') class="text-danger" @enderror >File Artikel</label>
                    <input type="file" name="file" class="form-control">
                    @error('foto')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                    <b><p class="">Format File : JPG,JPEG,PNG, mp4</p></b>
                </div>

                <div class="form-group @error('author_id') has-error @enderror ">
                    <label for=""@error('author_id') class="text-danger" @enderror >Penulis</label>
                    <select name="author_id" class="form-control select2" >
                        @foreach ($author as $a)
                        <option value="{{ $a->id }}"
                            @if ($a->id == $a->author_id)
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

