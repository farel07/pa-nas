<h5 class="mb-3">Edit Rencana Penilaian</h5>

<form action="/admin/master/rencana_penilaian/{{ $nama_nilai->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label class="form-label">Nama Penilaian</label>
        <input type="text" class="form-control" name="nama" value="{{ $nama_nilai->nama }}">
    </div>
    <div class="mb-2">
        <select name="teknik_nilai_id" class="form-select">
            @foreach ($teknik as $t)
                @if ($t->id == $nama_nilai->teknik_nilai_id)
                    <option value="{{ $t->id }}" selected>{{ $t->teknik }}</option>
                @else
                    <option value="{{ $t->id }}">{{ $t->teknik }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
</form>