@extends('layouts.dashboard.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Data Kerajaan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kerajaan.update',$kerajaan)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <div class="form-group">
                    <label for=""@error('nama_kerajaan') class="text-danger" @enderror >Nama Kerajaan</label>
                    <input type="text" name="nama_kerajaan" class="form-control @error('nama_kerajaan') form-control is-invalid @enderror"
                    placeholder="Masukkan Nama Kerajaan" value="{{ old('nama_kerjaan') }}">
                    @error('nama_kerajaan')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('deskripsi') class="text-danger" @enderror >Sejarah</label>
                    <textarea name="deskripsi" id="" rows="3" class="form-control my-editor @error('deskripsi') form-control is-invalid @enderror"
                    placeholder="Masukkan Deskripsi Kerajaan"> {{$kerajaan->deskripsi}} </textarea>
                    @error('deskripsi')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('pemerintahan') class="text-danger" @enderror >Pemerintahan</label>
                    <textarea name="pemerintahan" id="" rows="3" class="form-control my-editor @error('deskripsi') form-control is-invalid @enderror"
                    placeholder="Masukkan Penjelasan Pemerintahan"> {{$kerajaan->pemerintahan }} </textarea>
                    @error('pemerintahan')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('tradisi_lisan') class="text-danger" @enderror >Tradisi Lisan</label>
                    <textarea name="tradisi_lisan" id="" rows="3" class="form-control my-editor @error('tradisi_lisan') form-control is-invalid @enderror"
                    placeholder="Masukkan Tradisi Lisan"> {{$kerajaan->tradisi_lisan}} </textarea>
                    @error('tradisi_lisan')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('adat_istiadat') class="text-danger" @enderror >Adat Istiadat</label>
                    <textarea name="adat_istiadat" id="" rows="3" class="form-control my-editor @error('adat_istiadat') form-control is-invalid @enderror"
                    placeholder="Masukkan Adat Istiadat"> {{$kerajaan->adat_istiadat}} </textarea>
                    @error('adat_istiadat')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('ritus') class="text-danger" @enderror >Ritus</label>
                    <textarea name="ritus" id="" rows="3" class="form-control my-editor  @error('ritus') form-control is-invalid @enderror"
                    placeholder="Masukkan ritus"> {{$kerajaan->ritus}} </textarea>
                    @error('ritus')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for=""@error('seni') class="text-danger" @enderror >Seni</label>
                    <textarea name="seni" id="" rows="3" class="form-control my-editor @error('seni') form-control is-invalid @enderror"
                    placeholder="Masukkan Seni"> {{$kerajaan->seni }} </textarea>
                    @error('seni')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('bahasa') class="text-danger" @enderror >Bahasa</label>
                    <textarea name="bahasa" id="" rows="3" class="form-control @error('bahasa') form-control is-invalid @enderror"
                    placeholder="Masukkan Bahasa"> {{$kerajaan->bahasa}} </textarea>
                    @error('bahasa')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for=""@error('cagar_budaya') class="text-danger" @enderror >cagar budaya</label>
                    <textarea name="cagar_budaya" id="" rows="3" class="form-control my-editor @error('cagar_budaya') form-control is-invalid @enderror"
                    placeholder="Masukkan Permainan Rakyat"> {{ $kerajaan->cagar_budaya }} </textarea>
                    @error('cagar_budaya')
                        <span  class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for=""@error('foto') class="text-danger" @enderror >Foto Kerajaan</label>
                    <input type="file" name="foto" class="form-control">
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

