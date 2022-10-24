@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'List Mapel - ' . $kelas->nama_kelas)
@section('content')

<div class="row">

    <div class="mb-3">
        <a href="/admin/master/mapel" class="btn btn-warning">Back</a>
    </div>
    
    <div class="col-md-8">

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    
            <table class="table">
                <thead>
                  <tr class="table-primary">
                    <th scope="col">NO</th>
                    <th scope="col">NAMA MAPEL</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>
                    
                    @foreach ($kelas->mapel as $km)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $km->nama_mapel }}</td>
                      <td>
                        <form action="/admin/master/kelas_mapel/{{ $km->pivot->id }}" method="POST" class="d-inline"> {{-- delete --}}
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Kidz?')"><i class="fas fa-backspace"></i></button>
                        </form>
                      </td>
                    </tr>
    
                    @endforeach
                </tbody>
            </table>
    
    </div>

</div>

@endsection