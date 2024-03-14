@extends('dashboard.layouts.main')

@section('container')
<div class="pagetitle">
    <h1>Data User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Keloal Ruangan</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datatables</h5>
                    @if(session()->has('success'))
                    <div class="alert alert-success col-lg-12 alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <a href="/dashboard/ruangans/create" class="btn btn-primary mb-3 mt-1">Tambah Data</a>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Ruangan</th>
                                <th>Kapasitas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kelas as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->kode_ruangan}}</td>
                                <td>{{$data->kapasitas}}</td>
                                <td>
                                    <a href="/dashboard/ruangans/{{ $data->id }}/edit" class="badge bg-warning"><span data-feather="edit-2"></span>Edit</a>
                                    <form action="{{ route('delete-ruangan', $data->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('are you sure ?')"><span data-feather="x-circle"></span>Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>
@endsection