<h5 class="mb-3">Edit Rencana Penilaian</h5>

<form action="/admin/master/rencana_penilaian/{{ $teknik_nilai->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label class="form-label">Teknik Penilaian</label>
        <input type="text" class="form-control" name="teknik" value="{{ $teknik_nilai->teknik }}">
    </div>
    <div class="mb-2">
        <label for="form-label">Kategori Penilaian</label>
        <select name="kategori_nilai_id" class="form-select">
            @foreach ($kategori_nilai as $kn)
                @if ($kn->id == $teknik_nilai->kategori_nilai->id)
                    <option value="{{ $kn->id }}" selected>{{ $kn->kategori }}</option>
                @else
                    <option value="{{ $kn->id }}">{{ $kn->kategori }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
</form>