@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'Mapel - Tambah Mapel - ' .  $kelas->nama_kelas)
@section('content')

<div class="row">
    <div class="col-8">

        <form action="/admin/master/kelas_mapel" method="post">
            @csrf

            <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                <select class="form-select" id="inputGroupSelect01" name="mapel_id">
                  <option selected>Choose...</option>
                  @foreach ($mapel as $m)
                    <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                  @endforeach
                </select>
            </div>

            <a href="/admin/master/kelas_mapel/{{ $kelas->id }}" class="btn btn-danger">Back</a>
            <button type="submit" class="btn btn-primary">Tambah</button>

        </form>
    </div>
</div>

@endsection