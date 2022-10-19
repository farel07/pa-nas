@extends('dashboard.layout.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Guru</h1>
</div>

<div class="row">
    <div class="col-8">

        <form action="/admin/master/user/{{ $user->id }}" method="post">
            @csrf
            @method('put')

            <input type="hidden" name="is_guru" value=true>
            
            <div class="form-group mb-3">
                <label for="project_name">Nama</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nama" value="{{ old('name', $user->name) }}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

            <div class="form-group mb-3">
                <label for="project_name">NPSN</label>
                <input type="number" class="form-control" name="nisn_npsn" id="nisn_npsn" placeholder="NPSN" value="{{ old('nisn_npsn', $user->nisn_npsn) }}">
                @error('nisn_npsn')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

            <div class="form-group mb-3">
                <label for="project_name">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat lahir" value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
                @error('tempat_lahir')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

            <div class="form-group mb-3">
                <label for="project_name">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                @error('tanggal_lahir')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              
              <button type="submit" class="btn btn-primary">Update</button>
            </form>

            
            

    </div>
</div>
@endsection