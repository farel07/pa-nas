<label class="form-label">Nama Penilaian</label>
<input type="text" name="nama" id="nama" class="form-control mb-1" value="{{ $nama_penilaian->nama }}">

<select class="form-select" aria-label="Default select example" name="teknik_nilai_id">
    @foreach ($teknik_nilai as $tn)
      <option value="{{ $tn->id }}" @if ($tn->id == $nama_penilaian->teknik_nilai_id) selected @endif>{{ $tn->teknik }}</option>
    @endforeach
</select>

<input type="hidden" name="guru_mapel_id" value="{{ $nama_penilaian->guru_mapel_id }}">