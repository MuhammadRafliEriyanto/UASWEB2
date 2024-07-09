@extends('layout.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Nilai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Nilai</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Nilai</h3>
                    </div>
                    <div class="col-sm-6 text-right">
                        {{-- Uncomment below if you want to add "Tambah Data" button --}}
                        <!-- <button type="button" class="btn btn-light" data-toggle="modal" data-target="#tambahDataModal"
                            style="color: #20c997;">
                            <i class="fas fa-plus"></i> Tambah Data
                        </button> -->
                    </div>
                </div>
            </div>
            <div class="card-content p-3">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center bg-success text-white">No</th>
                            <th class="text-center bg-success text-white" style="width: 10%;">Nama</th>
                            <th class="text-center bg-success text-white">Jumlah Clock Prosesor</th>
                            <th class="text-center bg-success text-white">Jumlah Inti (Cores)</th>
                            <th class="text-center bg-success text-white">Jumlah Thread</th>
                            <th class="text-center bg-success text-white">Kinerja Grafis CPU</th>
                            <th class="text-center bg-success text-white">Harga</th>
                            <th class="text-center bg-success text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chipsets as $c)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $c->alternatif->name }}</td>
                            <td class="text-center">{{ $c->jumlah_clock_prosesor }}</td>
                            <td class="text-center">{{ $c->jumlah_inti_cores }}</td>
                            <td class="text-center">{{ $c->jumlah_thread }}</td>
                            <td class="text-center">{{ $c->kinerja_grafis_cpu }}</td>
                            <td class="text-center">{{ $c->harga }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editDataModal{{$c->id}}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@foreach ($chipsets as $c)
<div class="modal fade" id="editDataModal{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="editDataModal{{$c->id}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataModal{{$c->id}}Label">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.kriteria.update', $c->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="alternatif_id">Nama</label>
                        <input type="text" name="alternatif_id" class="form-control" value="{{ $c->alternatif_id }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_clock_prosesor">Jumlah Clock Prosesor</label>
                        <input type="number" name="jumlah_clock_prosesor" class="form-control" value="{{ $c->jumlah_clock_prosesor }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_inti_cores">Jumlah Inti (Cores)</label>
                        <input type="number" name="jumlah_inti_cores" class="form-control" value="{{ $c->jumlah_inti_cores }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_thread">Jumlah Thread</label>
                        <input type="number" name="jumlah_thread" class="form-control" value="{{ $c->jumlah_thread }}">
                    </div>
                    <div class="form-group">
                        <label for="kinerja_grafis_cpu">Kinerja Grafis CPU</label>
                        <input type="number" name="kinerja_grafis_cpu" class="form-control" value="{{ $c->kinerja_grafis_cpu }}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" class="form-control" value="{{ $c->harga }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.kriteria.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="alternatif_id">Nama</label>
                        <input type="text" name="alternatif_id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_clock_prosesor">Jumlah Clock Prosesor</label>
                        <input type="text" name="jumlah_clock_prosesor" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_inti_cores">Jumlah Inti (Cores)</label>
                        <input type="text" name="jumlah_inti_cores" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_thread">Jumlah Thread</label>
                        <input type="text" name="jumlah_thread" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kinerja_grafis_cpu">Kinerja Grafis CPU</label>
                        <input type="text" name="kinerja_grafis_cpu" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" name="harga" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
@endsection
