@extends('dashboard.layout.new_main')
@section('menu', 'Siswa')
@section('submenu', 'Dashboard')
@section('content')

<style>
    
    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .href-pisan:hover .imgPisan {
        opacity: 0.5;
    }

    .href-pisan:hover .middle {
        opacity: 1.0;
    }

    .text {
        background-color: #04AA6D;
        color: white;
        font-size: 14px;
        padding: 4px 16px;
    }

</style>

<div class="row">

    @error('password')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror

    @error('img')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
     
    <section class="text-center">
        @if (!$user->img)
            <a class="href-pisan" href="" data-bs-toggle="modal" data-bs-target="#modalAdd">
                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" width="200" class="imgPisan img-fluid rounded-circle shadow mb-2">
                <div class="middle">
                    <p class="text">Change Picture</p>
                </div>
            </a>
        @else
            <a class="href-pisan" href="" data-bs-toggle="modal" data-bs-target="#modalEdit">
                <img src="{{ asset('storage/' . $user->img) }}" width="200" class="imgPisan img-fluid rounded-circle shadow mb-2">
                <div class="middle">
                    <p class="text">Change Picture</p>
                </div>
            </a>
        @endif

        <h3 class="display-7">Nama Siswa: {{ $user->name }}</h3>
        <h3 class="display-7">Username untuk Login: {{ $user->username }}</h3>
        <h3 class="display-7 mb-2">Kelas: {{ $kelas->nama_kelas }}</h3>

        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#gantiPassword">Ganti Password?</button>
    </section>

{{-- @endforeach --}}

</div>

<!-- Modal ganti password -->
<div class="modal fade" id="gantiPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="/siswa/dashboard/newPw/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="mb-2">
                    <label for="exampleFormControlInput1" class="form-label">Masukkan Password Baru:</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="New Password" name="password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>

      </div>
    </div>
  </div>

<!-- Modal add picture -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Picture</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="/siswa/dashboard" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-2">
                    <img src="{{ asset('storage/default.jpg') }}" class="img-fluid d-block img-preview" width="100">
                    <input class="form-control mt-1" type="file" id="image" name="img">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>

      </div>
    </div>
</div>

<!-- Modal change picture -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Picture</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="/siswa/dashboard/{{ $user->id }}" method="POST" class="ml-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm mt-1" type="submit" onclick="return confirm('Yakin Dihapus Banh?')">Hapus Gambar</button>
        </form>

        <form action="/siswa/dashboard/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $user->img) }}" class="img-fluid d-block img-preview2" width="100">
                    <input class="form-control mt-1" type="file" id="image2" name="img" onchange="previewImage2()">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>

      </div>
    </div>
</div>

{{-- ijabo crop tool --}}
<script src="{{ asset('ijaboCropTool/ijaboCropTool.min.js') }}"></script>
<script>
    function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        $('#image').ijaboCropTool({

            processUrl:'{{ route("change_profile") }}',
            buttonsText:['SAVE','CANCEL'],
            withCSRF:['_token','{{ csrf_token() }}'],
            onSuccess:function(message, element, status){
                alert(message);
                document.location.href = 'http://127.0.0.1:8000/siswa/dashboard'
            },
            onError:function(message, element, status){
                alert('Maximum image size is 2mb');
            }

            });

    function previewImage2() {
            const image = document.querySelector('#image2');
            const imgPreview = document.querySelector('.img-preview2');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
</script>

{{-- komentar --}}

@endsection