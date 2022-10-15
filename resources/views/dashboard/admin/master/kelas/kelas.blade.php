@extends('dashboard.layout.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Master User : Kelas</h1>
</div>

<div class="row">
<div class="col-md-12">

    <a href="/admin/master/kelas/create" class="btn btn-primary mb-4">Create</a>

        <table class="table">
            <thead>
              <tr class="table-primary">
                <th scope="col">NO</th>
                <th scope="col">NAMA KELAS</th>
                <th scope="col">ACTION</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $k)
                    
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $k->nama_kelas }}</td>
                  <td>
                    <a href="/admin/master/kelas/{{ $k->id }}" class="btn btn-info"><i class="fas fa-eye"></i></a> {{-- edit --}}
                    <a href="/admin/master/kelas/{{ $k->id }}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a> {{-- edit --}}
                    <form action="/admin/master/kelas{{ $k->id }}" method="POST" class="d-inline"> {{-- delete --}}
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Kidz?')"><i class="fas fa-backspace"></i></button>
                    </form>
                  </td>
                </tr>

                @endforeach
            </tbody>
          </table>

    </div>
</div>

@endsection