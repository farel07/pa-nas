@extends('dashboard.layout.new_main')
@section('menu', 'Penilaian')
@section('submenu', 'Nilai Siswa')
@section('content')
 

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="mb-2 mr-2 d-flex justify-content-end">
    <a href="#" class="btn btn-success">Export to Excel</a>
</div>

    <div class="table-responsive">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nama_nilai->nilai_siswa as $ns)
                    <tr class="">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ns->user->name }}</td>
                        <td>
                            {{-- <input type="number" class="form-control col-5 col-sm-2" name="nilai[]" value="{{ $ns->nilai }}">
                            <input type="hidden" name="user_id[]" value="{{ $ns->user->id }}"> --}}
                            <div class="">
                                {{ $ns->nilai }} 
                                <a onclick="edit({{ $ns->id }})" class="btn btn-info btn-sm ml-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fas fa-edit"></i>
                                </a> {{-- edit --}}
                            </div>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-2">
        <a href="/guru/penilaian/data_nilai_siswa/{{ $nama_nilai->guru_mapel->kelas_id }}" class="btn btn-danger">Kembali</a>
    </div>

  
  <!-- Edit Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Nilai</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="edit_nilai">
            
        </div>
      </div>
    </div>
  </div>

  <script>
    function edit(id) {
            $.get('/guru/penilaian/data_nilai_siswa/form_edit_nilai/' + id + '/edit', function(form_nilai) {
                $('#edit_nilai').html(form_nilai);
            })
        }
    </script>

@endsection

