<h5 class="mb-3">Menambah Rencana Penilaian</h5>

<form action="/admin/master/rencana_penilaian" method="POST">
    @csrf
    <div class="mb-2">
        <label class="form-label">Teknik Penilaian</label>
        <input type="text" class="form-control" name="teknik">
    </div>
    <div class="mb-2">
        <label for="form-label">Kategori Penilaian</label>
        <select name="kategori_nilai_id" class="form-select">
            @foreach ($kategori_nilai as $kn)
                <option value="{{ $kn->id }}">{{ $kn->kategori }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
</form>