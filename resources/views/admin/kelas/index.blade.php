@extends('layouts.template')

@section('content')
    <div class="">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0 text-uppercase">Kelas</h2>
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">+ Add Kelas</button>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Tahun Ajaran</th>
                            {{-- <th>Tahun Ajaran Hijriyah</th> --}}
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classrooms as $classroom)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $classroom->nama }}</td>
                                <td>{{ $classroom->tahun_ajaran }}</td>
                                {{-- <td>{{ $classroom->tahun_ajaran_hijriah }}</td> --}}
                                <td>
                                    <div class="d-flex justify-content-start">
                                        <button class="btn btn-outline-info me-2"
                                            onclick="window.location.href='{{ route('classroom.show', $classroom->id) }}'">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $classroom->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal{{ $classroom->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="confirmDeleteModal{{ $classroom->id }}" tabindex="-1"
                                aria-labelledby="confirmDeleteModalLabel{{ $classroom->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $classroom->id }}">
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
                                            <form id="deleteForm" action="{{ route('classroom.destroy', $classroom->id) }}"
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
                            <div class="modal fade" id="editModal{{ $classroom->id }}" tabindex="-1"
                                aria-labelledby="editModalLabel{{ $classroom->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $classroom->id }}">Edit Kelas</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('classroom.update', ['classroom' => $classroom->id]) }}"
                                                id="editForm{{ $classroom->id }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="editkelas{{ $classroom->id }}" class="form-label">Nama Kelas</label>
                                                    <input type="text" class="form-control"
                                                        id="editkelas{{ $classroom->id }}" name="nama"
                                                        value="{{ $classroom->nama }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editTahunMasehi{{ $classroom->id }}"
                                                        class="form-label">Tahun Ajaran</label>
                                                    <input type="text" class="form-control"
                                                        id="editTahunMasehi{{ $classroom->id }}" name="tahun_ajaran"
                                                        value="{{ $classroom->tahun_ajaran }}">
                                                </div>
                                                {{-- <div class="mb-3">
                                                    <label for="editTahunHijriah{{ $classroom->id }}"
                                                        class="form-label">Tahun Ajaran Hijriyah</label>
                                                    <input type="text" class="form-control"
                                                        id="editTahunHijriah{{ $classroom->id }}"
                                                        name="tahun_ajaran_hijriah"
                                                        value="{{ $classroom->tahun_ajaran_hijriah }}">
                                                </div> --}}
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
                    <h5 class="modal-title" id="addModalLabel">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('classroom.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                            <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
