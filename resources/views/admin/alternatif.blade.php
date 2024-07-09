@extends('layout.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                    <h1>Data Alternatif</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Alternatif</li>
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
                        <h3>Alternatif</h3>
                    </div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-2 text-right">
                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#tambahDataModal" style="color: #20c997;">
                            <i class="fas fa-plus"></i> Tambah Data
                        </button>
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
                            <th class="text-center" style="background-color: #20c997; color: white;">No</th>
                            <th class="text-center" style="background-color: #20c997; color: white;">Nama</th>
                            <th class="text-center" style="background-color: #20c997; color: white;">Kode</th>
                            <th class="text-center" style="background-color: #20c997; color: white;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatif as $c)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->code }}</td>
                            <td class="text-left">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#editDataModal{{$c->id}}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('admin.alternatif.destroy', $c->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
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


@foreach ($alternatif as $c)
<div class="modal fade" id="editDataModal{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="editDataModal{{$c->id}}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataModal{{$c->id}}Label">Edit Data Alternatif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.alternatif.update', $c->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_nama{{$c->id}}">Nama:</label>
                        <input type="text" class="form-control" id="edit_nama{{$c->id}}" name="name" value="{{ $c->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_kode{{$c->id}}">Kode:</label>
                        <input type="text" class="form-control" id="edit_kode{{$c->id}}" name="code" value="{{ $c->code }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Alternatif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.alternatif.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode:</label>
                        <input type="text" class="form-control" id="kode" name="code" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
