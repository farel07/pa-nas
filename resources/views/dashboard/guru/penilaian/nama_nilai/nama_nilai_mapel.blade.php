
    <h5 class="mt-1">List Penilaian</h5>

@if ($nama_penilaian->isEmpty())
    <p class="mt-2">Belum ada penilaian</p>
@else
    
@foreach ($nama_penilaian as $np)
<div class="card">
    <div class="card-body">
      <h5 class="card-title">{{ $np->nama }}</h5>
      <form action="" method="post">
      <a href="#" class="btn btn-sm btn-primary">Tambah nilai siswa</a>
        @method('delete')
        <button href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
      </form>
    </div>
  </div>
  @endforeach
@endif

