@extends('layouts.dashboard.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Manuskrip</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.manuskrip.update',$manuskrip)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for=""@error('title') class="text-danger" @enderror >Title</label>
                    <input type="text" name="title" class="form-control @error('title') form-control is-invalid @enderror"
                    placeholder="Masukkan Nama Judul Manuskrip" value="{{ $manuskrip->title ?? old('title') }}">
                    @error('title')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group @error('kerajaan_id') has-error @enderror ">
                    <label for=""@error('kategori_id') class="text-danger" @enderror >Kerajaan</label>
                    <select name="kerajaan_id" class="form-control select2" >
                        @foreach ($kerajaan as $k)
                        <option value="{{ $k->id }}"
                            @if ($k->id == $manuskrip->kerajaan_id)
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
                    <label for=""@error('deskripsi') class="text-danger" @enderror >Deskripsi Manuskrip</label>
                    <textarea name="deskripsi" id="" rows="3" class="form-control my-editor @error('deskripsi') form-control is-invalid @enderror"
                    placeholder="Masukkan Deskripsi Manuskrip"> {{ $manuskrip->deskripsi  }} </textarea>
                    @error('deskripsi')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('file_manuskrip') class="text-danger" @enderror >File Manuskrip Digital</label>
                    <input type="file" name="file_manuskrip" class="form-control @error('file_manuskrip') form-control is-invalid @enderror"
                    placeholder="Masukkan Masa Jabatan" value="{{ old('file_manuskrip') }}">
                    @error('file_manuskrip')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('foto') class="text-danger" @enderror >Foto Sampul</label>
                    <input type="file" name="foto" class="form-control">
                    @error('foto')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                    <b><p class="">Format Foto : JPG,JPEG,PNG</p></b>
                </div>
                <div class="form-group">
                    <label for=""@error('sumber') class="text-danger" @enderror >Sumber</label>
                    <input type="text" name="sumber" class="form-control my-editor @error('sumber') form-control is-invalid @enderror"
                    placeholder="Masukkan Sumber Manuskrip" value="{{ $manuskrip->sumber ?? old('sumber') }}">
                    @error('sumber')
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

