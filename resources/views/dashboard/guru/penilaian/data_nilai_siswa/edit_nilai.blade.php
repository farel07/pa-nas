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
                                <button class="btn btn-info btn-sm ml-1"><i class="far fa-edit"></i></button>
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

@endsection

