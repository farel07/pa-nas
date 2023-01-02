<form action="/guru/penilaian/data_nilai_siswa/{{ $nilai_siswa->id }}" method="POST">
    @method('PUT')
    @csrf
    <h5><b>{{ $nilai_siswa->user->name }}</b></h5>
    <input type="number" class="form-control col-4" name="nilai" value="{{ $nilai_siswa->nilai }}">

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>