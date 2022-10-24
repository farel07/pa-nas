@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'Kelas')
@section('content')

<div class="row">
<div class="col-md-8">

  <div class="mb-3">
    <a href="/admin/master/kelas/create" class="btn btn-primary">Create</a>
  </div>
  
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

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
                    <a href="/admin/master/kelas/{{ $k->id }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                    <a href="/admin/master/kelas/{{ $k->id }}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a> {{-- edit --}}
                    <form action="/admin/master/kelas/{{ $k->id }}" method="POST" class="d-inline"> {{-- delete --}}
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