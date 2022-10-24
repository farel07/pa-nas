@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'List Mapel')
@section('content')

<div class="row">

    <div class="mb-3">
        <a href="/admin/master/mapel" class="btn btn-warning">Back</a>
        <a href="/admin/master/mapel/create" class="btn btn-primary">Create</a>
    </div>
    
    @if (session()->has('success'))
    <div class="col-6">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
    @endif

    <div class="col-md-7">

    
            <table class="table">
                <thead>
                  <tr class="table-primary">
                    <th scope="col">NO</th>
                    <th scope="col">NAMA MAPEL</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($mapel as $m)
                        
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $m->nama_mapel }}</td>
                      <td>
                        <a onclick="edit({{ $m->id }})" class="btn btn-success">
                            <i class="fas fa-edit"></i>
                        </a> {{-- edit --}}
                        <form action="/admin/master/mapel/{{ $m->id }}" method="POST" class="d-inline"> {{-- delete --}}
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Kidz?')"><i class="fas fa-backspace"></i></button>
                        </form>
                      </td>
                    </tr>
    
                    @endforeach
                </tbody>
            </table>
    
    </div>

    <div class="col-md-5">
        <div class="card shadow mb-4">
            <div class="card-body" id="mapel">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Klik Tombol Update</h6>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function edit(id) {
            $.get('/admin/master/mapel/' + id + '/edit', function(mapel) {
                $('#mapel').html(mapel);
            })
        }
</script>

@endsection