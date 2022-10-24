@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'Kelas - Update')
@section('content')

<div class="row">
    <div class="col-8">

        <form action="/admin/master/kelas/{{ $kelas->id }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="project_name">Nama Kelas</label>
                <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas" value="{{ $kelas->nama_kelas }}">
                @error('nama_kelas')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <a href="/admin/master/kelas" class="btn btn-danger">Back</a>
            <button type="submit" class="btn btn-primary">Update</button>

            </form>
    </div>
</div>

@endsection