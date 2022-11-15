<select class="form-select mb-3" aria-label="Default select example" name="nama_nilai_id">
    @if($nama_nilai->isEmpty())
        
    <option selected>Belum ada rencana penilaian terbaru</option>

    @else
        
    @foreach ($nama_nilai as $nn)  
    <option value="{{ $nn->id }}">{{ $nn->nama }}</option>
    @endforeach

    @endif
  </select>

  @if(!$nama_nilai->isEmpty())


  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Nilai</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($siswa as $s)
          
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $s->user->name }}</td>
        <input type="hidden" name="user_id[]" value="{{ $s->user->id }}">
        <td><input type="text" class="form-control col-4" name="nilai[]" id="exampleFormControlInput1"></td>
      </tr>

      @endforeach
    </tbody>
  </table>

  <button type="submit" class="btn btn-success">Submit</button>


@endif
