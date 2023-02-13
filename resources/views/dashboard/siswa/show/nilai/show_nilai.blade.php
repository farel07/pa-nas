@extends('dashboard.layout.new_main')
@section('menu', 'Siswa')
@section('submenu', 'Mapel Kelas')
@section('content')

<div class="col-10">

<table class="table table-bordered">
    <thead>
        <th>#</th>
        <th>Nama Peilaian</th>
        <th>Kategori Penilaian</th>
        <th>Nilai</th>
    </thead>
    <tbody>

        @php
            $no = 0;
        @endphp

        @if ($guru_mapel($mapel->id, auth()->user()->kelas_user->kelas_id)->nama_nilai->isEmpty())
            
        <tr>
            <td></td>
            <td>Belum ada nilai</td>
            <td></td>
            <td></td>
        </tr>

        @else
            
        @foreach ($guru_mapel($mapel->id, auth()->user()->kelas_user->kelas_id)->nama_nilai as $nn)


<tr>
    @php
        $no = $loop->iteration;
    @endphp
    <td>{{ $loop->iteration }}</td>
    <td>{{ $nn->nama }}</td>
    <td>{{ $nn->teknik_nilai->kategori_nilai->kategori }}</td>

    @if($nilai_siswa(auth()->user()->id, $nn->id)->isEmpty())

    <td>-</td>

    @else

    <td>
    @foreach ($nilai_siswa(auth()->user()->id, $nn->id) as $ns)
    
    {{ $ns->nilai }} <br>

    @endforeach
    </td>

    @endif
</tr>


@endforeach

@endif
    

<tfoot>

{{-- @dd($avg_1($guru_mapel($mapel->id, auth()->user()->kelas_user->kelas_id)->id)) --}}
    @if (!$avg_1($guru_mapel($mapel->id, auth()->user()->kelas_user->kelas_id)->id))
        <tr>
            <td></td>
            <td>Belum ada rata-rata</td>
        </tr>
    @else
        
    <tr>
        <td><b>#</b></td>
        <td></td>
        <td><b>Rata-Rata Pengetahuan</b></td>
        <td><b>{{ $avg_1($guru_mapel($mapel->id, auth()->user()->kelas_user->kelas_id)->id)->avg_nilai }}</b></td>
    </tr>

    <tr>
        <td><b>#</b></td>
        <td></td>
        <td><b>Rata-Rata Keterampilan</b></td>
        <td><b>{{ $avg_2($guru_mapel($mapel->id, auth()->user()->kelas_user->kelas_id)->id)->avg_nilai }}</b></td>
    </tr>
    
    <tr>
        <td><b>#</b></td>
        <td></td>
        <td><b>Rata-Rata Keseluruhan</b></td>
        <td><b>{{ ($avg_2($guru_mapel($mapel->id, auth()->user()->kelas_user->kelas_id)->id)->avg_nilai + $avg_1($guru_mapel($mapel->id, auth()->user()->kelas_user->kelas_id)->id)->avg_nilai) / 2}}</b></td>
    </tr>

    @endif
    
</tfoot>

    </tbody>
</table>

<a href="/siswa/show/nilai" class="btn btn-danger btn-sm">Kembali</a>

</div>

@endsection