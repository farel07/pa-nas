@extends('dashboard.layout.new_main')
@section('menu', 'Admin')
@section('submenu', 'Dashboard')
@section('content')

<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card pull-up ecom-card-1" style="background-color: rgb(244, 250, 194)">
            <a href="/admin/master/user/siswa">
            <div class="card-content ecom-card2 height-180">
                <h5 class="text-muted danger position-absolute p-1">SISWA</h5>
                <div>
                    <i class="ft-users danger font-large-1 float-right p-1"></i>
                </div>
                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                    <div class="h5 mb-0 pt-3 font-weight-bold text-center text-gray-800">
                        <h3>{{ count($siswa) }}</h3>
                    </div>
                        </div>
                </div>
            </a>
            </div>
        </div>
        
    <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card pull-up ecom-card-1" style="background-color: rgb(244, 250, 194)">
            <a href="/admin/master/user/guru">
            <div class="card-content ecom-card2 height-180">
                <h5 class="text-muted danger position-absolute p-1">GURU</h5>
                <div>
                    <i class="fas fa-chalkboard-teacher danger font-large-1 float-right p-1"></i>
                </div>
                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                    <div class="h5 mb-0 pt-3 font-weight-bold text-center text-gray-800">
                        <h3>{{ count($guru) }}</h3>
                    </div>
                        </div>
                </div>
            </a>
            </div>
        </div>

    <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card pull-up ecom-card-1" style="background-color: rgb(244, 250, 194)">
            <a href="/admin/master/kelas">
            <div class="card-content ecom-card2 height-180">
                <h5 class="text-muted danger position-absolute p-1">KELAS</h5>
                <div>
                    <i class="fas fa-window-maximize danger font-large-1 float-right p-1"></i>
                </div>
                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                    <div class="h5 mb-0 pt-3 font-weight-bold text-center text-gray-800">
                        <h3>{{ count($kelas) }}</h3>
                    </div>
                        </div>
                </div>
            </a>
            </div>
        </div>

    <div class="col-xl-3 col-lg-6 col-md-12">
        <div class="card pull-up ecom-card-1" style="background-color: rgb(244, 250, 194)">
            <a href="/admin/master/mapel">
            <div class="card-content ecom-card2 height-180">
                <h5 class="text-muted danger position-absolute p-1">MAPEL</h5>
                <div>
                    {{-- <i class="ft-users danger font-large-1 float-right p-1"></i> --}}
                    <i class="fas fa-book danger font-large-1 float-right p-1"></i>
                </div>
                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                    <div class="h5 mb-0 pt-3 font-weight-bold text-center text-gray-800">
                        <h3>{{ count($mapel) }}</h3>
                    </div>
                        </div>
                </div>
            </a>
            </div>
        </div>
    </div>

  <br>

@endsection



  
