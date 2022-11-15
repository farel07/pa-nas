@extends('dashboard.layout.new_main')
@section('menu', 'Penilaian')
@section('submenu', 'Edit Nilai')
@section('content')
 
<form action="/guru/penilaian/data_nilai_siswa/{{ $nama_nilai->id }}" method="post">
    @csrf
    @method('put')

@foreach ($nama_nilai->nilai_siswa as $ns)

{{ $ns->user->name }} 
{{ $ns->nilai }}
<input type="text" name="nilai[]" value="{{ $ns->nilai }}">
<input type="hidden" name="user_id[]" value="{{ $ns->user->id }}">

<br>
    
@endforeach

<button class="btn btn-primary">Perbarui</button>
</form>

@endsection