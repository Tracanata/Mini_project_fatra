@extends('dashboard.layouts.main')

@section('container')
<div class="pagetitle">
    <h1>Form Tambah Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/materi"></a>Data Materi</li>
            <li class="breadcrumb-item active">Tambah Data Materi</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Data Materi</h1>
        </div>

        <div class="col-lg-8">
            <form method="post" action="{{ route('update-materi', $materi->id) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nama_materi" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('name_materi') is-invalid @enderror" id="nama_materi" name="nama_materi" value="{{ old('nama_materi', $materi->nama_materi) }}">
                    @error('nama_materi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-3">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection