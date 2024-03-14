@extends('dashboard.layouts.main')

@section('container')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-body">
        <h3 class="mt-4">Selamat Datang {{ auth()->user()->name}}</h3>
    </div>
</div>


<section class="section profile">
    <div class="row">
        <div class="col-xl-5">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <div id="clock" style="font-size: 36px; font-weight: bold;"></div>
                    <script>
                        function updateClock() {
                            var now = new Date();
                            var hours = ('0' + now.getHours()).slice(-2);
                            var minutes = ('0' + now.getMinutes()).slice(-2);
                            var seconds = ('0' + now.getSeconds()).slice(-2);
                            var timeString = hours + ':' + minutes + ':' + seconds;
                            document.getElementById('clock').textContent = timeString;
                        }

                        setInterval(updateClock, 1000); // Update setiap 1 detik
                    </script>
                    <form method="post" action="{{ route('make-kode') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-danger">Buat Kode</button>
                        </div>
                    </form>
                    <h1 class="card-title">Kode yang tersedia :</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Kode</td>
                                <td>Status</td>
                                <td>Make By</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($codes as $code)
                            <tr>
                                <td><b>{{ $code->kode }}</b></td>
                                <td><b>{{ $code->status}}</b></td>
                                <td><b>{{ $code->User->name}}</b></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-7">

            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            @if(session()->has('success'))
                            <div class="alert alert-success  alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            @if(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <h1 class="card-title">ABSEN</h1>

                            <label for="username" class="form-label col-lg-3 col-md-4 label">username</label>
                            <input type="number" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ auth()->user()->username }}" disabled>

                            <label for="name" class="form-label col-lg-3 col-md-4 label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ auth()->user()->name }}" disabled>
                            <form method="post" action="{{ route('make-absen') }}" enctype="multipart/form-data">
                                @csrf
                                <label for="kelas" class="form-label col-lg-3 col-md-4 label">Kelas</label>
                                <select class="form-select" name="kelas">
                                    <option selected disabled>--Pilih Ruangan--</option>
                                    @foreach ($kelas as $data)
                                    @if(old('kelas') == $data->id)
                                    <option value="{{ $data->id }}" selected>{{ $data->kode_ruangan }}</option>
                                    @else
                                    <option value="{{ $data->id }}">{{ $data->kode_ruangan }}</option>
                                    @endif
                                    @endforeach
                                </select>

                                <label for="nama_materi" class="form-label col-lg-3 col-md-4 label">Materi</label>
                                <select class="form-select" name="nama_materi">
                                    <option selected disabled>--Pilih Materi--</option>
                                    @foreach ($materis as $data)
                                    @if(old('nama_materi') == $data->id)
                                    <option value="{{ $data->id }}" selected>{{ $data->nama_materi }}</option>
                                    @else
                                    <option value="{{ $data->id }}">{{ $data->nama_materi }}</option>
                                    @endif
                                    @endforeach
                                </select>

                                <label for="kode" class="form-label col-lg-3 col-md-4 label">Token</label>
                                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode') }}">
                                @error('kode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary">Clock On</button>
                                </div>
                            </form>
                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>

@endsection