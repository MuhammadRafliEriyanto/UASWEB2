@extends('layout.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- Card Alternatif -->
            <div class="col-xl-4 col-md-6 mb-4">
                <a href="{{ route('admin.alternatif') }}" class="text-white text-decoration-none">
                    <div class="card bg-success shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-white">Alternatif</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card Kriteria -->
            <div class="col-xl-4 col-md-6 mb-4">
                <a href="{{ route('admin.subkriteria') }}" class="text-white text-decoration-none">
                    <div class="card bg-success shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-white">Kriteria</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-cube fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card Nilai -->
            <div class="col-xl-4 col-md-6 mb-4">
                <a href="{{ route('admin.kriteria') }}" class="text-white text-decoration-none">
                    <div class="card bg-success shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-white">Nilai</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-cubes fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card Akun -->
            <div class="col-xl-4 col-md-6 mb-4">
                <a href="{{ route('admin.akun') }}" class="text-white text-decoration-none">
                    <div class="card bg-success shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-white">Akun</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
