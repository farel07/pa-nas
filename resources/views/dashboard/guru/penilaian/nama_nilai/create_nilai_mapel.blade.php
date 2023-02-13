
<h5 class="mt-1">Menambah Penilaian</h5>


    <form action="/guru/penilaian/nama_nilai/mapel_kelas" method="POST">
        @csrf
        <div class="mb-2">
            <label class="form-label">Nama Penilaian</label>
            <input type="text" class="form-control" name="nama">
        </div>

        <select class="form-select mb-2" name="teknik_nilai_id">
            @foreach ($teknik_penilaian as $tp)
                <option value="{{ $tp->id }}">{{ $tp->teknik }} - {{ $tp->kategori_nilai->kategori }}</option>
            @endforeach
        </select>

        <input type="hidden" name="guru_mapel_id" value="{{ $guru_mapel_id }}">
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    
    