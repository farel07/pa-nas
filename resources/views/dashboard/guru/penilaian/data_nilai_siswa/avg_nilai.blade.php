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

    <div class="input-group input-group-sm mb-1 col-4">
        <label for="" class="col-form-label">{{ $nn->nama }}</label>
        <input type="text" name="persentase[]" class="form-control">
        <span class="input-group-text" id="inputGroup-sizing-sm"><b>%</b></span>
    </div>

    @endif

    @endforeach

    <button class="btn btn-success mt-2">Hitung</button>

    </form>

</div>



@endsection