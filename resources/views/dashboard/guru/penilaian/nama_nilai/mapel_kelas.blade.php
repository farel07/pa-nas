@extends('dashboard.layout.new_main')
@section('menu', 'Penilaian')
@section('submenu', 'Nama Penilaian - Mapel Kelas')
@section('content')

<div class="row">
    <div class="col-6">

      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Mapel</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($mapel as $m)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $m->mapel->nama_mapel }}</td>
                <td>
                    <button onclick="add_nama_penilaian({{ $m->id }})" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
                    <button onclick="show_nama_penilaian({{ $m->id }})" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
                </td>
              </tr>               
              @endforeach
            </tbody>
          </table>
    </div>

    <div class="col-6">
        <div class="cont">
            
        </div>
    </div>

</div>


<script>
    function show_nama_penilaian(id){
        $.get('/guru/penilaian/nama_nilai/mapel_kelas/' + id, function(data){
            $('.cont').html(data);
        })
    }

    function add_nama_penilaian(id) {
      $.get('/guru/penilaian/nama_nilai/mapel_kelas/' + id + '/create', function(data) {
        $('.cont').html(data); 
      })
    }
</script>
    
@endsection