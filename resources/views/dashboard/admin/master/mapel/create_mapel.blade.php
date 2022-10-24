@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'Mapel - Create')
@section('content')

<div class="row">
    <div class="col-8">

        <form action="/admin/master/mapel" method="post">
            @csrf

            <div class="form-group mb-3">
                <label for="project_name">Nama Mapel</label>
                <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" placeholder="Nama Mapel">
                @error('nama_mapel')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <a href="/admin/master/list_mapel" class="btn btn-danger">Back</a>
            <button type="submit" class="btn btn-primary">Tambah</button>

        </form>
    </div>
</div>

@endsection