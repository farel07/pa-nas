@extends('dashboard.layout.main')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Master User</h1>
</div>

<div class="container mt-5">

<div class="row justify-content-center d-flex">

        <div class="col-lg-4">
            <i class="fas fa-users fa-3x"></i>
          <h2 class="fw-normal mt-2">Siswa</h2>
          <p><a class="btn btn-secondary" href="user/siswa">Show &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        
        <div class="col-lg-4">
            <i class="fas fa-chalkboard-teacher fa-3x"></i>
          <h2 class="fw-normal mt-2">Guru</h2>
          <p><a class="btn btn-secondary" href="user/guru">Show &raquo;</a></p>
        </div><!-- /.col-lg-4 -->

</div>
</div>

@endsection



  
