@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'Kelas')
@section('content')

<div class="row">
<div class="col-md-12">

  <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal2" onclick="btn_create_kelas()">Create</button>

  @error('nama_kelas')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @enderror
  
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

        <table class="table">
            <thead>
              <tr class="table">
                <th scope="col">NO</th>
                <th scope="col">NAMA KELAS</th>
                <th scope="col">ACTION</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($kelas as $k)
                    
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $k->nama_kelas }}</td>
                  <td>
                    <a href="/admin/master/kelas/{{ $k->id }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="btn_edit_kelas({{ $k->id }})">
                      <i class="fas fa-edit"></i>
                    </button>
                    <form action="/admin/master/kelas/{{ $k->id }}" method="POST" class="d-inline"> {{-- delete --}}
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Kidz?')"><i class="fas fa-backspace"></i></button>
                    </form>
                  </td>
                </tr>

              @endforeach
          </tbody>
        </table>
    </div>
</div>

<!-- Modal create -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="" id="route-create" method="POST">
          @csrf

          <div class="form-group mb-3" id="form-create">

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="" id="route-edit" method="POST">
          @csrf
          @method('PUT')

          <div class="form-group mb-3" id="form-edit">

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<script>
  function btn_edit_kelas(id) {
    $.get('/admin/master/kelas/' + id + '/edit', function(data) {
      $('#form-edit').html(data);
      $('#route-edit').attr('action', '/admin/master/kelas/' + id);
    })
  }

  function btn_create_kelas() {
    $.get('/admin/master/kelas/create', function(data) {
      $('#form-create').html(data);
      $('#route-create').attr('action', '/admin/master/kelas');
    })
  }
</script>

@endsection