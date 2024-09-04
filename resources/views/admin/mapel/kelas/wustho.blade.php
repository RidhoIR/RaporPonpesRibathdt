@extends('layouts.template')

@section('content')
    <div class="">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 text-uppercase">Mata Pelajaran</h2>
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">+ Add Mata
                Pelajaran</button>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <table id="example2" class="table table-striped table-bordered" style="">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Keterangan</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mapels as $mapel)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mapel->nama }}</td>
                                <td>{{ $mapel->classroom->nama }}</td>
                                <td>{{ $mapel->keterangan }}</td>
                                <td>{{ $mapel->type }}</td>
                                <td>
                                    <div class="d-flex justify-content-start">
                                        <button class="btn btn-outline-info me-2" title="Lihat">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $mapel->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal{{ $mapel->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="confirmDeleteModal{{ $mapel->id }}" tabindex="-1"
                                aria-labelledby="confirmDeleteModalLabel{{ $mapel->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $mapel->id }}">
                                                Konfirmasi Hapus Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus data ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <form id="deleteForm" action="{{ route('mapel.destroy', $mapel->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $mapel->id }}" tabindex="-1"
                                aria-labelledby="editModalLabel{{ $mapel->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $mapel->id }}">Edit Mata
                                                Pelajaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('mapel.update', ['mapel' => $mapel->id]) }}"
                                                id="editForm{{ $mapel->id }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="editmata_pelajaran{{ $mapel->id }}"
                                                        class="form-label">Mata Pelajaran</label>
                                                    <input type="text" class="form-control"
                                                        id="editmata_pelajaran{{ $mapel->id }}" name="nama"
                                                        value="{{ $mapel->nama }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editKeterangan{{ $mapel->id }}"
                                                        class="form-label">Keterangan</label>
                                                    <input type="text" class="form-control"
                                                        id="editKeterangan{{ $mapel->id }}" name="keterangan"
                                                        value="{{ $mapel->keterangan }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="type" class="form-label">Type</label>
                                                    <select class="form-control" id="type" name="type" required>
                                                        <option value="Mapel"
                                                            {{ $mapel->type == 'Mapel' ? 'selected' : '' }}>Mapel</option>
                                                        <option value="Ekskul"
                                                            {{ $mapel->type == 'Ekskul' ? 'selected' : '' }}>Ekskul
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Kelas</label>
                                                    <select class="form-control" name="id_classroom" required>
                                                        @foreach ($classrooms as $classroom)
                                                            <option value="{{ $classroom->id }}"
                                                                {{ $classroom->id == $mapel->id_classroom ? 'selected' : '' }}>
                                                                {{ $classroom->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('id_classroom')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Mata Pelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mapel.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="Mapel">Mapel</option>
                                <option value="Ekskul">Ekskul</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <select class="form-control" name="id_classroom" required>
                                <option value="" selected disabled>-- Pilih Kelas --</option>
                                @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
