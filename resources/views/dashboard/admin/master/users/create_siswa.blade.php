@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'User - Siswa - Create')
@section('content')

<div class="row">
    <div class="col-8">

        <form action="/admin/master/user/" method="post">
            @csrf

            <input type="hidden" name="is_siswa" value=true>
            
            <div class="form-group mb-3">
                <label for="project_name">Nama</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nama" value="{{ old('name') }}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

            <div class="form-group mb-3">
                <label for="project_name">NISN</label>
                <input type="number" class="form-control" name="nisn_npsn" id="nisn_npsn" placeholder="NISN" value="{{ old('nisn_nps') }}">
                @error('nisn_npsn')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

            <div class="form-group mb-3">
                <label for="project_name">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat lahir" value="{{ old('tempat_lahir') }}">
                @error('tempat_lahir')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

            <div class="form-group mb-3">
                <label for="project_name">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') }}">
                @error('tanggal_lahir')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

              <div class="form-group mb-3">
                <label>Kelas</label>
                <select class="form-control" name="kelas_id" id="inputGroupSelect04" aria-label="Example select with button addon" value="{{ old('kelas_id') }}">
                  <option selected value="">Pilih kelas...</option>
                  @foreach ($kelas as $k)
                  <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                  @endforeach
                </select>
                @error('kelas_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

            <div class="form-group mb-3">
                <label for="project_name">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
                @error('username')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

            <div class="form-group mb-3">
                <label for="project_name">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              
              <a href="/admin/master/user/siswa" class="btn btn-warning">Kembali</a>
              <button type="submit" class="btn btn-primary">Tambah</button>
            
            </form>

            
            

    </div>
</div>
@endsection