@extends('layouts.template')
@section('title', 'Kepribadian')
@section('content')
    <div class="">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-uppercase mb-0">Kepribadian</h2>
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">+ Tambah Data</button>
        </div>
        <hr />

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table-striped table-bordered table">
                        <thead>
                            <tr>
                                <th>Indikator Kepribadian</th>
                                <th>Sub Indikator</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $previousKategori = null;
                                $count = 1;
                            @endphp
                            @foreach ($kepribadians->groupBy('kategori.id') as $kategoriId => $items)
                                @foreach ($items as $index => $kepribadian)
                                    <tr>
                                        @if ($index === 0)
                                            <td rowspan="{{ count($items) }}">
                                                {{ $kepribadian->kategori->indikator_kepribadian ?? 'Tidak ada kategori' }}
                                            </td>
                                        @endif
                                        <td>
                                            {{ $kepribadian->sub_indikator }}
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                {{-- <a href="{{ route('kepribadian.show', ['kepribadian' => $kepribadian->id]) }}"
                                                style="text-decoration: none; color: inherit;">
                                                <button class="btn btn-outline-info me-2" title="Lihat">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </a> --}}
                                                <button class="btn btn-outline-primary me-2" title="Edit"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $kepribadian->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-outline-danger" title="Hapus" data-bs-toggle="modal"
                                                    data-bs-target="#confirmDeleteModal{{ $kepribadian->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Edit Modal --}}
        @foreach ($kepribadians as $kepribadian)
            <div class="modal fade" id="editModal{{ $kepribadian->id }}" tabindex="-1"
                aria-labelledby="editModalLabel{{ $kepribadian->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $kepribadian->id }}">Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('indikator-kepribadian.update', $kepribadian->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label">Indikator Kepribadian</label>
                                    <select name="id_kategori" id="id_kategori" required>
                                        @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ $kategori->id == $kepribadian->id_kategori ? 'selected' : '' }}>
                                            {{ $kategori->indikator_kepribadian }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
