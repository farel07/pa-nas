@extends('dashboard.layout.new_main')
@section('menu', 'Siswa')
@section('submenu', 'Mapel Kelas')
@section('content')

<div class="col-10">

<table class="table table-bordered">
    <thead>
        <th>#</th>
        <th>Nama Peilaian</th>
        <th>Nilai</th>
    </thead>
    <tbody>

        @php
            $no = 0;
        @endphp

        @foreach ($guru_mapel($mapel->id, auth()->user()->kelas_user->id)->nama_nilai as $nn)
<tr>
    @php
        $no = $loop->iteration;
    @endphp
    <td>{{ $loop->iteration }}</td>
    <td>{{ $nn->nama }}</td>

    @if($nilai_siswa(auth()->user()->id, $nn->id)->isEmpty())

    <td>0</td>

    @else

    <td>
    @foreach ($nilai_siswa(auth()->user()->id, $nn->id) as $ns)
    
    {{ $ns->nilai }} <br>

    @endforeach
    </td>

    @endif
</tr>
@endforeach

<tfoot>
    <td><b>#</b></td>
    <td><b>Rata-Rata</b></td>
    <td>
        <b>
            @if (!$avg($guru_mapel($mapel->id, auth()->user()->kelas_user->id)->id))
                Belum Ada Rata-Rata
            @else 
                {{ $avg($guru_mapel($mapel->id, auth()->user()->kelas_user->id)->id)->avg_nilai }}
            @endif
        </b>
    </td>
</tfoot>

    </tbody>
</table>

<a href="/siswa/show/nilai" class="btn btn-danger btn-sm">Kembali</a>

</div>

@endsection