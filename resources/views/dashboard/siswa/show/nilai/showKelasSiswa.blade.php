@extends('dashboard.layout.new_main')
@section('menu', 'Siswa')
@section('submenu', 'Mapel Kelas')
@section('content')

    <div class="row">
        <div class="col-md-8">
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
                        <a href="/siswa/show/nilai/{{ $km->id }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                      </td>
                      {{-- <td>
                        {{ $guru_mapel($km->id, $kelas->id)->nama_nilai }}
                      </td> --}}
                    </tr>
    
                  @endforeach
              </tbody>
            </table>
        </div>

        {{-- <div class="col-6">
            <table class="table">
              <thead>
                <th>Penilaian</th>
                <th>Nilai</th>
              </thead>
              <tbody class="nilai-table">
                
              </tbody>
            </table>
        </div> --}}

    </div>

@endsection

<script>
  function show_get_nilai_siswa(mapel_id){
    $.get('/siswa/show/nilai/nilai_siswa/' + mapel_id, function(nilai_siswa){
        $('.nilai-table').html(nilai_siswa)
    })
  }
</script>