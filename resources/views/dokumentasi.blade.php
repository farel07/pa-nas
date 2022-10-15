@extends('dashboard.layout.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dokumentasi</h1>
  </div>


  <br>

{{-- {{ $users[0]->guru_mapel }} --}}
@foreach ($users[1]->guru_mapel as $mapel)
    Mapel : {{ $mapel->nama_mapel }} <br>
    @foreach ($mapel->nama_nilai as $nl)
        teknik : {{ $nl->teknik }} <br>
        nama penilaian : {{ $nl->pivot->nama }} <br>
        {{-- nama penilaian : {{  }} --}}
    @endforeach
    <hr>
    {{-- {{ $mapel->nama_nilai }} --}}
    {{-- {{ $mapel->nama_nilai }} --}}
@endforeach

@foreach ($users[1]->nilai_siswa as $n)
    {{ $users[1]->name }}
     {{ $n->nilai }}
     {{ $n->mapel->nama_mapel }}
     {{ $n->nama_nilai->nama }}
     {{ $n->nama_nilai->guru_mapel->user->name }}
     {{-- {{ $n->mapel->nama_nilai }} --}}
@endforeach

<br>
<br>
<hr>
@foreach ($nilai as $nilai_siswa)
    {{ $nilai_siswa->nilai }}
    {{ $nilai_siswa->user->name }}
    {{ $nilai_siswa->nama_nilai }}
    {{ $nilai_siswa->nama_nilai->guru_mapel->user->name }}
@endforeach

<br>
<br>
<hr>
{{-- @foreach ($kelas[0]->user_kelas as $as)

{{ $as->user->name }}
    
@endforeach --}}

{{ $kelas->user_kelas }}

  <p>test</p>
@endsection



  
