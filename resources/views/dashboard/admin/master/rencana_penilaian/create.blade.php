<h5 class="mb-3">Menambah Rencana Penilaian</h5>

<form action="/admin/master/rencana_penilaian" method="POST">
    @csrf
    <div class="mb-2">
        <label class="form-label">Nama Penilaian</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="mb-2">
        <select name="teknik_nilai_id" class="form-select">
            <option value="">Pilih Teknik Penilaian</option>
            @foreach ($teknik as $t)
                <option value="{{ $t->id }}">{{ $t->teknik}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
</form>