@extends('dashboard.layout.new_main')
@section('menu', 'Penilaian')
@section('submenu', 'Penilaian Siswa - Tambah Nilai - ' . $kelas->nama_kelas)
@section('content')

@if ($errors->any)

        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach

@endif

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

<div class="col-md-6">

    <form action="/guru/penilaian/nilai_siswa" method="post">
        @csrf
        <label for="exampleFormControlTextarea1" class="form-label">Mapel</label>
        <select class="form-select mb-3" aria-label="Default select example" onchange="show_nama_nilai(this)" name="guru_mapel_id">
            <option selected>Open this select menu</option>
            @foreach ($mapel as $m)  
            <option value="{{ $m->id }}">{{ $m->mapel->nama_mapel }}</option>
            @endforeach
          </select>
          
          <label for="exampleFormControlTextarea1" class="form-label">Rencana penilaian</label>
          <div class="select-nama-nilai">
            
          </div>


    </form>

</div>

<script>

    function show_nama_nilai(obj){
        var id = obj.value;
        $.get('/guru/penilaian/nilai_siswa/nama_nilai/' + id, function(data){
            console.log(data);
            $('.select-nama-nilai').html(data)
        })
    }

    

</script>

@endsection