@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'List Mapel - Assign Guru - ' . $mapel_kelas->kelas->nama_kelas)
@section('content')

<div class="row">

    <div class="col-8">

        <form action="/admin/master/kelas_mapel/assign/{{ $mapel_kelas->id }}" method="post">
            @method('put')
            @csrf

            <input type="hidden" name="kelas_id" value="{{ $mapel_kelas->kelas_id }}">

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                <select class="form-select" id="inputGroupSelect01" name="user_id">
                  <option selected>Choose...</option>
                  @foreach ($guru as $g)
                    <option value="{{ $g->id }}">{{ $g->name }}</option>
                  @endforeach
                </select>
            </div>

            <a href="/admin/master/kelas_mapel/{{ $mapel_kelas->kelas->id }}" class="btn btn-danger">Back</a>
            <button type="submit" class="btn btn-primary">Tambah</button>

        </form>
    </div>    

</div>

@endsection