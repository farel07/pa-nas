@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'Kelas - Create')
@section('content')

<div class="row">
    <div class="col-8">

        <form action="/admin/master/kelas/" method="post">
            @csrf

            <div class="form-group mb-3">
                <label for="project_name">Nama Kelas</label>
                <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas">
                @error('nama_kelas')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <a href="/admin/master/kelas" class="btn btn-danger">Back</a>
            <button type="submit" class="btn btn-primary">Tambah</button>

            </form>
    </div>
</div>

@endsection