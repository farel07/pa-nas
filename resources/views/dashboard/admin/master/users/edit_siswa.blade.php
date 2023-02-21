@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'User - Siswa - Edit')
@section('content')

<div class="row">
    <div class="col-8">

        <form action="/admin/master/user/{{ $user->id }}" method="post">
            @csrf
            @method('put')

            <input type="hidden" name="is_siswa" value=true>
            
            <div class="form-group mb-3">
                <label for="project_name">Nama</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nama" value="{{ old('name', $user->name) }}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

            <div class="form-group mb-3">
                <label for="project_name">NISN</label>
                <input type="number" class="form-control" name="nisn_npsn" id="nisn_npsn" placeholder="NISN" value="{{ old('nisn_npsn', $user->nisn_npsn) }}">
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

              <div class="form-group mb-3">
                <label>Kelas</label>
                <select class="form-control" name="kelas_id" id="inputGroupSelect04" aria-label="Example select with button addon" value="{{ old('kelas_id') }}">
                  <option selected value="">Pilih kelas...</option>
                  @foreach ($kelas as $k)
                  @if (!$user->kelas_user)
                  <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                  @else
                      
                  @if (old('kelas_id', $user->kelas_user->kelas_id) == $k->id)
                    <option value="{{ $k->id }}" selected>{{ $k->nama_kelas }}</option>
                  @else  
                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                  @endif

                  @endif
                  @endforeach
                </select>
                @error('kelas_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>

              {{-- <div class="form-gorup mb-3">
                <label for="userName">Username</label>
                <input type="text" class="form-control" name="username" id="userName" placeholder="userName" value="{{ $user->username }}">
                @error('username')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div> --}}

              <div class="form-gorup mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              </div>
{{-- 
              <input type="hidden" name="password" value="{{ $user->password }}"> --}}

              <a href="/admin/master/user/siswa" class="btn btn-warning">Kembali</a> 
              <button type="submit" class="btn btn-primary">Edit</button>
              
            </form>

            
            

    </div>
</div>
@endsection

