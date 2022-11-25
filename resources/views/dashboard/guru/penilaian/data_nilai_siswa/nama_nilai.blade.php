{{-- {{ $nama_nilai }} --}}

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($nama_nilai as $s)
          
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $s->nama }}</td>
        <td>
            <a href="/guru/penilaian/data_nilai_siswa/nilai_siswa/{{ $s->id }}/edit" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a><
        </td>
      </tr>

      @endforeach
    </tbody>
  </table>