@extends('layouts.dashboard.app')


@section('content')

<div class="card card-outline card-primary">
    <div class="row">
        <div class="container">
            <div class="col-lg-12 margin-tb">

                <div class="pull-left">

                    <h2>Manajemen Users</h2>

                </div>
                {{-- notifikasi form validasi --}}
                @if ($errors->has('file'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
                @endif

                {{-- notifikasi sukses --}}
                @if ($sukses = Session::get('sukses'))
                <div class="card-body">
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        {{ $sukses }}
                      </div>
                    </div>
                @endif

                <div class="pull-right mt-1">

                    <a class="btn btn-primary mb-3" href="{{ route('admin.users.create') }}"> <i class="fas fa-plus-circle"></i> Tambah User</a>
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#importExcel">
                        IMPORT EXCEL
                    </button>
                    <!-- Import Excel -->
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="#" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                </div>
                                <div class="modal-body">

                                    {{ csrf_field() }}

                                    <label>Pilih file excel</label>
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))

    <div class="alert alert-success">

      <p>{{ $message }}</p>

    </div>

    @endif

    <div class="container">
        <table id="table" class="table table-bordered">
            <thead>
                <tr>

                    <th>No</th>

                    <th>Nama</th>

                    <th>Email</th>

                    <th>Roles</th>

                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $user)

                <tr>

                    <td>{{ ++$i }}</td>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>

                      @if(!empty($user->getRoleNames()))

                        @foreach($user->getRoleNames() as $v)
                            @if ($v === 'Admin')
                            <label class="badge badge-primary">{{ $v }}</label>
                            @elseif ($v === 'Unit-Kerja')
                                <label class="badge badge-success">{{ $v }}</label>
                            @else
                                <span class="badge badge-info">{{ $v }}</span>
                            @endif

                        @endforeach

                      @endif

                    </td>

                    <td>

                       <a class="btn btn-info" href="{{ route('admin.users.show',$user->id) }}"><i class="fas fa-eye"></i>Show</a>

                       <a class="btn btn-primary" href="{{ route('admin.users.edit',$user->id) }}"><i class="fas fa-edit"></i>Edit</a>

                       <button href="{{route('admin.users.destroy', $user->id)}}" class="btn btn-danger btn" id="delete"><i class="fas fa-trash"></i> Hapus</button>

                    </td>

                  </tr>
                  @endforeach
            </tbody>

        </table>
    </div>


</div>


{{-- {!! $data->render() !!} --}}
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
