@extends('dashboard.layout.new_main')
@section('menu', 'Penilaian')
@section('submenu', 'Buat Rata-Rata')
@section('content')

<div class="col-6">

    @if ($errors->any)

        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach

    @endif

    <form action="{{ route('avg_nilai_store', $guru_mapel->id) }}" method="post">
    @csrf
    @foreach ($guru_mapel->nama_nilai as $nn)

    @if ($nn->nilai_siswa->isEmpty())
        
    @else
        
    <input type="hidden" name="nama_nilai_id[]" value="{{ $nn->id }}">

    <div class="input-group input-group-sm mb-1 col-md-8">
        <label for="" class="col-form-label col-md-7">{{ $nn->nama }}</label>
        <input type="number" name="persentase[]" class="form-control ml-2 col-md-5" min="1" max="100">
        <span class="input-group-text" id="inputGroup-sizing-sm"><b>%</b></span>
    </div>

    @endif

    @endforeach

    <div class="mt-3">
        <a href="/guru/penilaian/data_nilai_siswa/{{ $guru_mapel->kelas_id }}" class="btn btn-danger">Kembali</a>
        <button class="btn btn-success">Hitung</button>
    </div>
    

    </form>

</div>



@endsection