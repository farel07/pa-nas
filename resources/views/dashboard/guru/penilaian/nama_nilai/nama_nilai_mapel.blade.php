
    <h5 class="mt-1">List Penilaian</h5>

@if ($nama_penilaian->isEmpty())
    <p class="mt-2">Belum ada penilaian</p>
@else
    
@foreach ($nama_penilaian as $np)
  <div class="card">
      <div class="card-body">
        <h4 class="card-title">Teknik Nilai: {{ $np->teknik_nilai->teknik }}</h4>
        <h5 class="card-title">{{ $np->nama }}</h5>

        <form action="/guru/penilaian/nama_nilai/mapel_kelas/{{ $np->id }}" method="post">
          <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="btn_teknik_nilai({{ $np->id }})">
            <i class="fas fa-edit"></i>
          </button>
          @method('delete')
          @csrf
          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Kidz?')">
            <i class="fa fa-trash"></i>
          </button>
        </form>

      </div>
    </div>
@endforeach

@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Teknik Penilaian</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="" id="update_teknikNilai" method="POST">
          @csrf
          @method('PUT')

          <div class="select-teknik-nilai">

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<script>
  function btn_teknik_nilai(id) {
    $.get('/guru/penilaian/nama_nilai/mapel_kelas/' + id + '/edit', function(data) {
      $('.select-teknik-nilai').html(data);
      $('#update_teknikNilai').attr('action', '/guru/penilaian/nama_nilai/mapel_kelas/' + id);
    })
  }
</script>

