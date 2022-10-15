@extends('dashboard.layout.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="" class="text-decoration-none">
            <div class="card shadow h-100 py-2 border-secondary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                SISWA</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($siswa) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
 </div>
 
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="" class="text-decoration-none">
     <div class="card shadow h-100 py-2 border-secondary">
         <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                         GURU</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($guru) }}</div>
                 </div>
                 <div class="col-auto">
                    <i class="fas fa-chalkboard-teacher fa-2x"></i>
                 </div>
             </div>
         </div>
     </div>
        </a>
 </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <a href="/admin/master/kelas" class="text-decoration-none">
            <div class="card shadow h-100 py-2 border-secondary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                KELAS</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($kelas) }}</div>
                        </div>
                        <div class="col-auto">
                           <i class="fas fa-window-maximize fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
 </div>
 
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="" class="text-decoration-none">
     <div class="card shadow h-100 py-2 border-secondary">
         <div class="card-body">
             <div class="row no-gutters align-items-center">
                 <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                         MAPEL</div>
                     <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($mapel) }}</div>
                 </div>
                 <div class="col-auto">
                    <i class="fas fa-book fa-2x"></i>
                 </div>
             </div>
         </div>
     </div>
    </a>
 </div>
 
 </div>

  <br>

@endsection



  
