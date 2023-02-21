@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'Mapel')
@section('content')

    <div class="row">
        <div class="col-md-12">
        
            <div class="mb-3">
                <a href="/admin/master/list_mapel" class="btn btn-primary">List Mapel</a>
            </div>
          
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        
                <table class="table">
                    <thead>
                      <tr class="table">
                        <th scope="col">NO</th>
                        <th scope="col">NAMA KELAS</th>
                        <th scope="col">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $k)
                            
                        <tr>
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>{{ $k->nama_kelas }}</td>
                          <td>
                            <a href="/admin/master/kelas_mapel/{{ $k->id }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                          </td>
                        </tr>
        
                        @endforeach
                    </tbody>
                  </table>
        
            </div>
        </div>

@endsection