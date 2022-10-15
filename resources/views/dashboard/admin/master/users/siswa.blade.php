@extends('dashboard.layout.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Master User : Siswa</h1>
</div>

<a href="/admin/master/user" class="btn btn-primary mb-3">Kembali</a>
<a href="/admin/master/user/siswa/create_siswa" class="btn btn-primary mb-3">Tambah Data Siswa</a>

<div class="col-md-6">
@if (session()->has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

</div>

<div class="row">
    <div class="col-md-12">

        <table class="table">
            <thead>
              <tr class="table-primary">
                <th scope="col">NO</th>
                <th scope="col">NISN</th>
                <th scope="col">NAMA</th>
                <th scope="col">TEMPAT, TANGGAL LAHIR</th>
                <th scope="col">KELAS</th>
                <th scope="col">ACTION</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $s)
                    
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $s->nisn_npsn }}</td>
                  <td>{{ $s->name }}</td>
                  <td>{{ $s->tempat_lahir . ', ' . $s->tanggal_lahir}}</td>
                  <td>{{ $s->kelas_user->kelas->nama_kelas }}</td>
                  <td></td>
                </tr>

                @endforeach
            </tbody>
          </table>

    </div>
</div>

@endsection