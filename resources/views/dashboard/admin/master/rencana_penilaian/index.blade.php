@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'Mapel')
@section('content')

@foreach ($nama_nilai as $nn)
    
{{ $nn }}  <br>

@endforeach

@endsection