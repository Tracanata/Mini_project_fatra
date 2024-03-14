@extends('dashboard.layouts.main')

@section('container')
<div class="pagetitle">
    <h1>Form Tambah Data</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="/dashboard/datausers"></a>Data User</li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Data User</h1>
        </div>

        <div class="col-lg-8">
            <form method="post" action="{{ route('input-user') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">username</label>
                    <input type="number" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="roles" class="form-label">Jabatan</label>
                    <select class="form-select" name="roles">
                        <option selected disabled>--Pilih Jenis Kelamin--</option>
                        <option value="admin" {{ old('roles')=='admin' ? 'selected' : '' }}>Admin</option>
                        <option value="pj" {{ old('roles')=='pj' ? 'selected' : '' }}>PJ</option>
                        <option value="asisten" {{ old('roles')=='asisten' ? 'selected' : '' }}>Asisten</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-3">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection