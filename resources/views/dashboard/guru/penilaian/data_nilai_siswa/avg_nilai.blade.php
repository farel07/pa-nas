@extends('dashboard.layout.new_main')
@section('menu', 'Penilaian')
@section('submenu', 'Buat Rata-Rata')
@section('content')

<div class="col-9">

    @if ($errors->any)

        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach

@endif

@if (session()->has('error'))
    <div class="alert alert-dangers alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <form action="{{ route('avg_nilai_store', $guru_mapel->id) }}" method="post">
    @csrf
    <table class="table">
        <thead>
            <th class="col-3">Pengetahuan</th>
            <th scope="row"></th>
            <th class="col-3">Keterampilan</th>
            <th scope="row"></th>
        </thead>
        <tbody>

            @foreach ($guru_mapel->nama_nilai as $nn)

    @if ($nn->nilai_siswa->isEmpty())
        
    @else

        @if ($nn->teknik_nilai->kategori_nilai->id == 1)
         
        <tr>
            <input type="hidden" name="nama_nilai_id_1[]" value="{{ $nn->id }}">
            <td>
                <label for="" class="col-form-label">{{ $nn->nama }}</label>
            </td>
            <td>
                <div class="input-group input-group-sm mb-1">
                
                    <input type="text" name="persentase_1[]" class="form-control col-7">
                    <span class="input-group-text" id="inputGroup-sizing-sm"><b>%</b></span>
                </div>
            </td>
           

        @elseif($nn->teknik_nilai->kategori_nilai->id == 2)
         
            <input type="hidden" name="nama_nilai_id_2[]" value="{{ $nn->id }}">
            <td> <label for="" class="col-form-label">{{ $nn->nama }}</label></td>
            <td>
                <div class="input-group input-group-sm mb-1">
                    <input type="text" name="persentase_2[]" class="form-control col-7">
                    <span class="input-group-text" id="inputGroup-sizing-sm"><b>%</b></span>
                </div>
            </td>
        </tr>
        

        @endif
        

    @endif

    @endforeach
            
        </tbody>
    </table>
    

    <button class="btn btn-success mt-2">Hitung</button>

    </form>

</div>



@endsection