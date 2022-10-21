@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'Mapel')
@section('content')

@foreach ($mapel as $m)

{{ $m }}
    
@endforeach

@endsection