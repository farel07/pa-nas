<div class="card shadow col">

    <form action="/admin/master/mapel/{{ $mapel->id }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="project_name">Nama Mapel Yang Ingin DiUpdate</label>
            <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" placeholder="Nama Mapel" value="{{ $mapel->nama_mapel }}">
            @error('nama_mapel')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <a href="/admin/master/list_mapel" class="btn btn-danger">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>

    </form>

</div>