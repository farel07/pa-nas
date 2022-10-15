@extends('dashboard.layout.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kelas: {{ $kelas->nama_kelas }}</h1>
</div>

<div class="row">
<div class="col-md-12">

        <table class="table">
            <thead>
              <tr class="table-primary">
                <th scope="col">NO</th>
                <th scope="col">NAMA</th>
                <th scope="col">NISN</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($kelas->user_kelas as $ku)
                    
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $ku->user->name }}</td>
                  <td>{{ $ku->user->nisn_npsn }}</td>
                </tr>

                @endforeach
            </tbody>
          </table>

          <a href="/admin/master/kelas" class="btn btn-primary">Back</a>

    </div>
</div>

@endsection