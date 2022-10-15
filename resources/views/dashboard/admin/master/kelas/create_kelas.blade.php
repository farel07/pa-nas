@extends('dashboard.layout.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Kelas</h1>
</div>

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