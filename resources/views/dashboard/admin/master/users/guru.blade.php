@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'User - Guru')
@section('content')

<a href="/admin/master/user" class="btn btn-warning mb-3">Kembali</a>
<a href="/admin/master/user/guru/create_guru" class="btn btn-primary mb-3">Tambah Data Guru</a>

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
                  <td>
                    <form action="/admin/master/user/{{ $g->id }}" method="post">
                      @csrf
                      @method('delete')
                    <a href="/admin/master/user/{{ $g->id }}/edit" class="btn btn-primary rounded-circle"><i class="fas fa-edit"></i></a>
                      
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