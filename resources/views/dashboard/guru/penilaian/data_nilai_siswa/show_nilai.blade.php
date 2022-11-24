@extends('dashboard.layout.new_main')
@section('menu', 'Penilaian')
@section('submenu', 'Edit Nilai')
@section('content')

@foreach ($nama_nilai->nilai_siswa as $nn)

{{ $nn->user }} <br><br>
{{ $nn }} <hr>
    
@endforeach

@endsection