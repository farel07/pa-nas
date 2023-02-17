@extends('dashboard.layout.new_main')
@section('menu', 'Guru')
@section('submenu', 'Dashboard')
@section('content')

<div class="row">
 @foreach ($user->kelas_mapel as $km)
     
    <div class="col-xl-3 col-lg-6 col-md-12">
    <div class="card pull-up ecom-card-1" style="background-color: rgb(244, 250, 194)">
        <a href="/guru/penilaian/nama_nilai/{{ $km->kelas->id }}">
        <div class="card-content ecom-card2 height-180">
            <h5 class="text-muted danger position-absolute p-1">{{ $km->mapel->nama_mapel }}</h5>
            <div>
                <i class="fas fa-chalkboard-teacher danger font-large-1 float-right p-1"></i>
            </div><br>
            <h5 class="text-muted danger position-absolute p-1">{{ $km->kelas->nama_kelas }}</h5>
            <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                <div class="h5 mb-0 pt-3 font-weight-bold text-center text-gray-800">
                    <h3><i class="fas fa-user danger font-large-0 p-0"></i> <b>{{ count($km->kelas->user_kelas) }}</b></h3>
                </div>
                    </div>
            </div>
        </a>
        </div>
    </div>

    @endforeach

</div>


@endsection