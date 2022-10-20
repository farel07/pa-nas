@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'User - Siswa')
@section('content')

<a href="/admin/master/user" class="btn btn-warning mb-3">Kembali</a>
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
                  <td>
                    <form action="/admin/master/user/{{ $s->id }}" method="post">
                      @csrf
                      @method('delete')
                      <a href="/admin/master/user/{{ $s->id }}/edit" class="btn btn-primary rounded-circle"><i class="fas fa-edit"></i></a>
                      
                    <button class="btn btn-danger rounded-circle" type="submit" onclick="return confirm('affkh anda yakin >/<')"><i class="fas fa-trash"></i></button>

                  </form>
                  </td>
                </tr>

                @endforeach
            </tbody>
          </table>

    </div>
</div>

@endsection