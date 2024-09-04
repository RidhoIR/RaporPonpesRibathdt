@extends('layouts.template')

@section('content')
    <div class="">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-uppercase mb-0">Kelas Wustho</h2>
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">+ Tambah Data</button>
        </div>
        <hr />
        <div class="card">
            <div class="card-body">
                <!-- Form untuk filter berdasarkan semester -->
                <form method="GET" action="{{ route('rapor.index.wustho') }}" class="mb-4">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="semester" class="form-label">Semester</label>
                            <select id="semester" name="semester" class="form-select">
                                <option value="">Semua Semester</option>
                                <option value="1" {{ request('semester') == '1' ? 'selected' : '' }}>Semester 1
                                </option>
                                <option value="2" {{ request('semester') == '2' ? 'selected' : '' }}>Semester 2
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3 align-self-end">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
                <table id="example" class="table-striped table-bordered table" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Santri</th>
                            <th>Nama Kelas</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Jumlah Nilai</th>
                            <th>Rata-Rata Nilai</th>
                            <th>Peringkat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rapors as $rapor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rapor->santri->nama }}</td>
                                <td>{{ $rapor->santri->classroom->nama }}</td>
                                <td>{{ $rapor->semester }}</td>
                                <td>{{ $rapor->tahun_ajaran }}</td>
                                <td>{{ $rapor->jumlah_nilai }}</td>
                                <td>{{ $rapor->rata_rata_nilai }}</td>
                                <td>{{ $rapor->peringkat }}</td>
                                <td>
                                    <div class="d-flex justify-content-start">
                                        <button class="btn btn-outline-info me-2"
                                            onclick="window.location.href='{{ route('rapor.show', $rapor->id) }}'">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        {{-- <button class="btn btn-outline-danger me-2" data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal{{ $rapor->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button> --}}
                                        <button class="btn btn-outline-warning me-2" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $rapor->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-outline-dark"
                                            onclick="window.location.href='{{ route('rapor.download', $rapor->id) }}'">
                                            <i class="bi bi-file-pdf"></i>
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

    {{-- Add Modal --}}
    <div class="modal fade @if ($errors->any()) show @endif" id="addModal" tabindex="-1"
        aria-labelledby="addModalLabel" aria-hidden="true" @if ($errors->any()) style="display:block;" @endif>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Rapor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('rapor.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Santri</label>
                            <select class="form-control" name="id_santri" required>
                                <option value="" selected disabled>-- Pilih Santri --</option>
                                @foreach ($santris as $santri)
                                    <option value="{{ $santri->id }}"
                                        {{ old('id_santri') == $santri->id ? 'selected' : '' }}>{{ $santri->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('id_santri'))
                                <span class="text-danger">{{ $errors->first('id_santri') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Semester</label>
                            <select class="form-control" name="semester" required>
                                <option value="1" {{ old('semester') == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('semester') == '2' ? 'selected' : '' }}>2</option>
                            </select>
                            @if ($errors->has('semester'))
                                <span class="text-danger">{{ $errors->first('semester') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Semester</label>
                            <select class="form-control" name="tahun_ajaran" required>
                                <option value="" {{ old('tahun_ajaran') == '' ? 'selected' : '' }}>Pilih Tahun Ajaran
                                </option>
                                <option value="2023/2024" {{ old('tahun_ajaran') == '2023/2024' ? 'selected' : '' }}>
                                    2023/2024
                                </option>
                                <option value="2024/2025" {{ old('tahun_ajaran') == '2024/2025' ? 'selected' : '' }}>
                                    2024/2025
                                </option>
                                <option value="2025/2026" {{ old('tahun_ajaran') == '2025/2026' ? 'selected' : '' }}>
                                    2025/2026
                                </option>
                                <option value="2026/2027" {{ old('tahun_ajaran') == '2026/2027' ? 'selected' : '' }}>
                                    2026/2027
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    @foreach ($rapors as $rapor)
        <div class="modal fade" id="editModal{{ $rapor->id }}" tabindex="-1"
            aria-labelledby="editModalLabel{{ $rapor->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $rapor->id }}">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('rapor.update.rapor', $rapor->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Tahun Ajaran</label>
                                <select class="form-control" name="tahun_ajaran" required>
                                    <option value="" disabled>Pilih Tahun Ajaran</option>
                                    <option value="2023/2024" {{ $rapor->tahun_ajaran == '2023/2024' ? 'selected' : '' }}>
                                        2023/2024</option>
                                    <option value="2024/2025" {{ $rapor->tahun_ajaran == '2024/2025' ? 'selected' : '' }}>
                                        2024/2025</option>
                                    <option value="2025/2026" {{ $rapor->tahun_ajaran == '2025/2026' ? 'selected' : '' }}>
                                        2025/2026</option>
                                    <option value="2026/2027" {{ $rapor->tahun_ajaran == '2026/2027' ? 'selected' : '' }}>
                                        2026/2027</option>
                                </select>
                                @if ($errors->has('tahun_ajaran'))
                                    <span class="text-danger">{{ $errors->first('tahun_ajaran') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
