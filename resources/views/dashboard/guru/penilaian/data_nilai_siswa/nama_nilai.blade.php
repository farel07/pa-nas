{{-- {{ $nama_nilai }} --}}
<div class="mb-2 mr-2">
  <a href="/guru/penilaian/data_nilai_siswa/nilai_siswa/avg/{{ $guru_mapel->id }}" class="btn btn-primary">Hitung Rata-Rata</a>
  <a href="/guru/penilaian/data_nilai_siswa/nilai_siswa/export/{{ $guru_mapel->id }}" class="btn btn-success float-end">Export <i class="fas fa-download"></i></a>
</div>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($guru_mapel->nama_nilai as $s)
          
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $s->nama }}</td>
        @if ($s->status == 0)
            <td> Belum ada nilai </td>
        @else      
        <td>
            <a href="/guru/penilaian/data_nilai_siswa/nilai_siswa/{{ $s->id }}/edit" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
        </td>
        @endif
      </tr>

      @endforeach
    </tbody>
  </table>