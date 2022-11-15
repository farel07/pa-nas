@extends('dashboard.layout.new_main')
@section('menu', 'Penilaian')
@section('submenu', 'Show Penilaian')
@section('content')

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