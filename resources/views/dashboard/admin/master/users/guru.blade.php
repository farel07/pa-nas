@extends('dashboard.layout.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Master User : Guru</h1>
</div>

<a href="/admin/master/user/guru/create_guru" class="btn btn-primary mb-3">Tambah Data Siswa</a>

<div class="col-md-6">
    @if (session()->has('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    </div>

<div class="row">
    <div class="col-md-9">

        <table class="table">
            <thead>
              <tr class="table-primary">
                <th scope="col">NO</th>
                <th scope="col">NPSN</th>
                <th scope="col">NAMA</th>
                <th scope="col">TEMPAT TANGGAL LAHIR</th>
                <th scope="col">MAPEL</th>
                <th scope="col">ACTION</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($guru as $g)
                    
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $g->nisn_npsn }}</td>
                  <td>{{ $g->name }}</td>
                  <td>{{ $g->tempat_lahir . ', ' . $g->tanggal_lahir}}</td>
                  <td>
                  {{-- {{ $g->guru_mapel[1] }} --}}
                    @foreach ($g->guru_mapel as $mapel)                
                    {{ $mapel->nama_mapel }} <br>
                    @endforeach
                </td>
                  <td></td>
                </tr>

                @endforeach
            </tbody>
          </table>

    </div>
</div>

@endsection