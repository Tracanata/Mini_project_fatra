@extends('dashboard.layouts.main')

@section('container')
<div class="pagetitle">
    <h1>Form Tambah Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/ruangans"></a>Data Ruangan</li>
            <li class="breadcrumb-item active">Tambah Data Ruangan</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Data Ruangan</h1>
        </div>

        <div class="col-lg-8">
            <form method="post" action="{{ route('input-ruangan') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="kapasitas" class="form-label">Kapasitas Ruangan</label>
                    <input type="number" class="form-control @error('kapasitas') is-invalid @enderror" id="kapasitas" name="kapasitas" value="{{ old('kapasitas') }}">
                    @error('kapasitas')
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