@extends('dashboard.layout.new_main')
@section('menu', 'Siswa')
@section('submenu', 'Mapel Kelas')
@section('content')

    <div class="row">
        <div class="col-md-6">
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
                        <button onclick="show_get_nilai_siswa()" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                      </td>
                    </tr>
    
                  @endforeach
              </tbody>
            </table>
        </div>

        <div class="col-6">
            <div class="cont">
                
            </div>
        </div>

    </div>

@endsection