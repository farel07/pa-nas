@extends('dashboard.layout.new_main')
@section('menu', 'Penilaian')
@section('submenu', 'Show Penilaian')
@section('content')

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="col-md-4">
    <div class="input-group mb-3">
        <select class="form-select" id="inputGroupSelect01" onchange="show_nama_nilai(this)">
            <option selected>Choose mapel...</option>
            @foreach ($mapel as $m)
                
            <option value="{{ $m->id }}">{{ $m->mapel->nama_mapel }}</option>
            
            @endforeach
        </select>
    </div>
</div>



<div class="show-nama-penilaian">

</div>

<div class="col-md-4 mt-3">
    <a href="/guru/penilaian/data_nilai_siswa" class="btn btn-danger">Kembali</a>
</div>

<script>
    function show_nama_nilai(obj){
        var id = obj.value;
        $.get('/guru/penilaian/data_nilai_siswa/' + id + '/show_nama_nilai', function(data){
            console.log(data);
            $('.show-nama-penilaian').html(data)
        })
    }
</script>

@endsection