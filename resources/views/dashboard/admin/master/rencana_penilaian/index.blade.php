@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'Mapel')
@section('content')

<button onclick="addRencanaPenilaian()" class="btn btn-primary mb-2"><i class="fas fa-plus"></i></button>
<div class="row">
    <div class="col-md-7">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @error('nama')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        @error('teknik_nilai_id')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        <table class="table">
            <thead>
                <tr class="table-primary">
                    <th scope="col">No</th>
                    <th scope="col">Nama Nilai</th>
                    <th scope="col">Teknik Nilai</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nama_nilai as $nn)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $nn->nama }}</td>
                    <td>{{ $nn->teknik_nilai->teknik }}</td>
                    <td>
                        <form action="/admin/master/rencana_penilaian/{{ $nn->id }}" method="POST">
                            <button type="button" class="btn btn-success btn-sm" onclick="UpdateRencanaPenialaian({{ $nn->id }})"><i class="far fa-edit"></i></button>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Syur kh?')"><i class="fas fa-trash-alt"></i>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="col-md-5">
        <div class="cont">

        </div>
    </div>
</div>


<script>
    
    function addRencanaPenilaian() {
        $.get('/admin/master/rencana_penilaian/create', function(data) {
            $('.cont').html(data);
        })
    }

    function UpdateRencanaPenialaian(id) {
        $.get('/admin/master/rencana_penilaian/' + id + '/edit', function(data) {
            $('.cont').html(data);
        })
    }

</script>

@endsection