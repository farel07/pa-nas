@extends('dashboard.layout.new_main')
@section('menu', 'Master')
@section('submenu', 'Kelas - List Siswa - ' . $kelas->nama_kelas)
@section('content')

<div class="row">
<div class="col-md-12">

        <table class="table">
            <thead>
              <tr class="table-primary">
                <th scope="col">NO</th>
                <th scope="col">NISN</th>
                <th scope="col">NAMA</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($kelas->user_kelas as $ku)
                    
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $ku->user->nisn_npsn }}</td>
                  <td>{{ $ku->user->name }}</td>
                </tr>

                @endforeach
            </tbody>
          </table>

          <a href="/admin/master/kelas" class="btn btn-primary">Back</a>

    </div>
</div>

@endsection