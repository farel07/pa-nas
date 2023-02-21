@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'List Mapel - ' . $kelas->nama_kelas)
@section('content')

<div class="row">

    <div class="mb-3">
        <a href="/admin/master/mapel" class="btn btn-warning">Back</a>
        <a href="/admin/master/kelas_mapel/create/{{ $kelas->id }}" class="btn btn-success">Tambah Mapel</a>
    </div>
    
    <div class="col-md-12">

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    
            <table class="table">
                <thead>
                  <tr class="table">
                    <th scope="col">NO</th>
                    <th scope="col">NAMA MAPEL</th>
                    <th scope="col">GURU</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>
                    
                    @foreach ($mapel_kelas as $km)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $km->mapel->nama_mapel }}</td>
                      <td>{{ ($km->user) ? $km->user->name : '_' }}</td>
                      <td>
                        @if ($km->user)

                        <form action="/admin/master/kelas_mapel/unassign/{{ $km->id }}" method="POST" class="d-inline"> {{-- delete --}}
                          @method('put')
                          @csrf
                          <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                          <button type="submit" class="btn btn-sm" style="background-color: rgb(230, 113, 18)" onclick="return confirm('Yakin Kidz?')"><i class="fas fa-user-slash"></i></button>
                      </form>

                        @else
                            
                        <a href="/admin/master/kelas_mapel/assign/{{ $km->id }}" class="btn btn-success btn-sm"><i class="fas fa-user-plus"></i></a>

                        @endif

                        <form action="/admin/master/kelas_mapel/{{ $km->id }}" method="POST" class="d-inline"> {{-- delete --}}
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Kidz?')"><i class="fas fa-backspace"></i></button>
                        </form>
                      </td>
                    </tr>
    
                    @endforeach
                </tbody>
            </table>
    
    </div>

</div>

@endsection