@extends('dashboard.layout.new_main')
@section('menu', 'System')
@section('submenu', 'Configuration')
@section('content')

        <div class="col-md-6">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @endif
        </div>
            
            <div class="mb-2">
                <label class="form-label">Logo Aplikasi</label>
                <input class="form-control" type="file" id="logo" name="app_logo">
                <p class="mt-2">Logo Saat Ini: </p> <img src="{{ asset('storage/' . $system->app_logo) }}" alt="" width="100" class="">
                @if ($system->app_logo != 'system-logo/default.png')
                    <form action="/admin/system_hapus_gambar" method="POST" class="mt-1 ml-1 d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="app_logo" value="{{ $system->app_logo }}">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Kidz?')">Hapus Gambar</button>
                    </form>
                @endif
            </div>

            <form action="/admin/system/1" method="POST" enctype="multipart/form-data" class="mt-3">
                @csrf
                @method('PUT')

                <div class="mb-2">
                    <label for="" class="form-label">Nama Aplikasi</label>
                    <input type="text" class="form-control" name="app_name" value="{{ $system->app_name }}">
                </div>

                <div class="mb-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>


        <script src="{{ asset('ijaboCropTool/ijaboCropTool.min.js') }}"></script>
        <script>
            $('#logo').ijaboCropTool({

            processUrl:'{{ route("app_logo") }}',
            buttonsText:['SAVE','CANCEL'],
            withCSRF:['_token','{{ csrf_token() }}'],
            onSuccess:function(message, element, status){
                alert(message);
                document.location.href = 'http://127.0.0.1:8000/admin/system/1/edit'
            },
            onError:function(message, element, status){
                alert('Maximum image size is 6mb');
            }

            });
        </script>

@endsection