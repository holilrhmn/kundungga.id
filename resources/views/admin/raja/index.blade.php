@extends('layouts.dashboard.app')
@section('content')

<div class="card card-outline card-primary">
    <div class="row">
        <div class="container">
            <div class="col-lg-12 margin-tb">

                <div class="pull-left ">

                    <h2>Data Raja</h2>

                </div>

                <div class="pull-right mt-1 mb-3">

                    <a class="btn btn-primary" href="{{ route('admin.raja.create') }}"><i class="fas fa-plus-circle"></i>  Tambah Data Raja</a>

                </div>

            </div>
        </div>


    </div>
    @if ($message = Session::get('success'))
    <div class="card-body">
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
        {{ $message }}
      </div>
    </div>
    @elseif ($message = Session::get('errors'))
    <div class="alert alert-secondary alert-dismissible show fade">
        <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        {{ $message }}
        </div>
    </div>
    @endif
    <div class="container">
        <div class="table-responsive">
        <table id="table" class="table table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Raja</th>
                    <th>Kerajaan</th>
                    <th>Deskripsi</th>
                    <th>Masa Jabatan</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach($raja as $r)

                   <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $r->Nama_Raja }}</td>
                        <td>{{ $r->Kerajaan->nama_kerajaan }}</td>
                        <td>{!! $r->deskripsi !!}</td>
                        <td>{{ $r->masa_jabatan }}</td>
                        <td><img style="height: 80px;width:100" src="{{asset('Foto_Raja')}}/{{$r->Foto_Raja}}"></td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.raja.edit',$r->id) }}"><i class="fas fa-edit"></i>Edit</a>
                            <button href="{{route('admin.raja.destroy', $r->id)}}" class="btn btn-danger btn" id="delete"><i class="fas fa-trash"></i> Hapus</button>
                        </td>
                   </tr>

                @endforeach

             </tbody>
        </table>
    </div>

    <br/>

    {{-- {{ $category->links() }} --}}
    </div>
    </div>

</div>

<form action="" method="post" id="deleteForm">
@csrf
@method("DELETE")
<input type="submit" value="Hapus" style="display:none">
</form>
@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
$('button#delete').on('click', function(e){
  e.preventDefault();

  var href = $(this).attr('href');

  Swal.fire({
      title: 'Apakah Kamu yakin akan menghapus data ini?',
      text: "Data yang sudah dihapus tidak dapat dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!'
      }).then((result) => {
      if (result.value) {
          document.getElementById('deleteForm').action = href;
          document.getElementById('deleteForm').submit();
              Swal.fire(
              'Berhasi Dihapus!',
              'Data Kamu Berhasil Dihapus.',
              'success'
              )
          }
      })


})
</script>
<script>
    $(document).ready(function() {
      $('#table').DataTable();
  } );
   </script>
@endpush
@endsection
