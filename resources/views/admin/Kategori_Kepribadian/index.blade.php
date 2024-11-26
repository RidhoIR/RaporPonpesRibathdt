@extends('layouts.template')
@section('title', 'Indikator Kepribadian')
@section('content')
    <div class="">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-uppercase mb-0">Indikator Kepribadian</h2>
            {{-- <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">+ Add Santri</button> --}}
        </div>
        <hr />

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table-striped table-bordered table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Indikator Kepribadian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoris as $kategori)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kategori->indikator_kepribadian }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            {{-- <a href="{{ route('kategori.show', ['kategori' => $kategori->id]) }}"
                                                style="text-decoration: none; color: inherit;">
                                                <button class="btn btn-outline-info me-2" title="Lihat">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </a> --}}
                                            <button class="btn btn-outline-primary me-2" title="Edit"
                                                data-bs-toggle="modal" data-bs-target="#editModal{{ $kategori->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-danger" title="Hapus" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal{{ $kategori->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    @foreach ($kategoris as $kategori)
        <div class="modal fade" id="editModal{{ $kategori->id }}" tabindex="-1"
            aria-labelledby="editModalLabel{{ $kategori->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $kategori->id }}">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('indikator-kepribadian.update', $kategori->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="indikator_kepribadian"
                                    value="{{ $kategori->indikator_kepribadian }}"required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="confirmDeleteModal{{ $kategori->id }}" tabindex="-1"
            aria-labelledby="confirmDeleteModalLabel{{ $kategori->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel{{ $kategori->id }}">
                            Konfirmasi Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form id="deleteForm" action="{{ route('indikator-kepribadian.destroy', $kategori->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
