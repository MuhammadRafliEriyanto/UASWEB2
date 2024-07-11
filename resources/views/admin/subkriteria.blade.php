@extends('layout.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kriteria</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kriteria</li>
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
                        <h3>Kriteria</h3>
                    </div>
                    <div class="col-sm-6 text-right">
                        <!-- <button type="button" class="btn btn-light" data-toggle="modal" data-target="#tambahDataModal" style="color: #20c997;">
                            <i class="fas fa-plus"></i> Tambah Data
                        </button> -->
                    </div>
                </div>
            </div>
            <div class="card-content p-3">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr style="background-color: #20c997; color: white;">
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th class="text-center">Jenis Kriteria</th>
                            <th class="text-center">Bobot</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subkriteria as $c)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $c->code }}</td>
                                <td>{{ $c->name }}</td>
                                <td class="text-center">{{ $c->attribute }}</td>
                                <td class="text-center">{{ $c->bobot }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#editDataModal{{ $c->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form action="{{ route('admin.subkriteria.destroy', $c->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <!-- <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button> -->
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

@foreach ($subkriteria as $c)
<!-- Modal Edit Data -->
<div class="modal fade" id="editDataModal{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="editDataModal{{ $c->id }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataModal{{ $c->id }}Label">Edit Data Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.subkriteria.update', $c->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_code{{ $c->id }}">Kode Kriteria:</label>
                        <input type="text" class="form-control" id="edit_code{{ $c->id }}" name="code" value="{{ $c->code }}" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_name{{ $c->id }}">Nama Kriteria:</label>
                        <input type="text" class="form-control" id="edit_name{{ $c->id }}" name="name" value="{{ $c->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_attribute{{ $c->id }}">Jenis Kriteria:</label>
                        <select class="form-control" id="edit_attribute{{ $c->id }}" name="attribute" required>
                            <option value="" disabled selected>~pilih~</option>
                            <option value="Benefit" {{ $c->attribute == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                            <option value="Cost" {{ $c->attribute == 'Cost' ? 'selected' : '' }}>Cost</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_bobot{{ $c->id }}">Bobot:</label>
                        <input type="text" class="form-control" id="edit_bobot{{ $c->id }}" name="bobot" value="{{ $c->bobot }}" required>
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

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.subkriteria.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="code">Kode Kriteria:</label>
                        <input type="text" class="form-control" id="code" name="code" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Kriteria:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="attribute">Jenis Kriteria:</label>
                        <select class="form-control" id="attribute" name="attribute" required>
                            <option value="" disabled selected>~pilih~</option>
                            <option value="Benefit">Benefit</option>
                            <option value="Cost">Cost</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot:</label>
                        <input type="text" class="form-control" id="bobot" name="bobot" required>
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
