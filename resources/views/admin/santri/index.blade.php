@extends('layouts.template')
@section('title', 'Santri ')

@section('content')
    <div class="">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-uppercase mb-0">Data Santri</h2>
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">+ Add Santri</button>
        </div>
        <hr />

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table-striped table-bordered table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Nama Wali</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Tahun Masuk</th>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($santris as $santri)
                                <tr>
                                    <td>{{ $santri->id }}</td>
                                    <td>{{ $santri->nomor_induk }}</td>
                                    <td>{{ $santri->nama }}</td>
                                    <td>{{ $santri->nama_wali }}</td>
                                    <td>{{ $santri->tempat_lahir }},
                                        {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d/m/Y') }}</td>
                                    <td>{{ $santri->alamat }}</td>
                                    <td>{{ $santri->tahun_masuk }}</td>
                                    <td>{{ $santri->classroom->nama }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('santri.show', ['santri' => $santri->id]) }}"
                                                style="text-decoration: none; color: inherit;">
                                                <button class="btn btn-outline-info me-2" title="Lihat">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </a>
                                            <button class="btn btn-outline-primary me-2" title="Edit"
                                                data-bs-toggle="modal" data-bs-target="#editModal{{ $santri->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-danger" title="Hapus" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal{{ $santri->id }}">
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

    <!-- Add Modal -->
    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Santri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('santri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">NIS</label>
                            <input type="text" class="form-control" name="nomor_induk" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Wali</label>
                            <input type="text" class="form-control" name="nama_wali" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Masuk</label>
                            <select class="form-control" name="tahun_masuk" required>
                                @php
                                    $currentYear = now()->year;
                                    $startYear = $currentYear - 10;
                                    $endYear = $currentYear + 10;
                                @endphp
                                @for ($year = $startYear; $year <= $endYear; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
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
                        <div class="mb-3">
                            <label for="foto">Upload Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($santris as $santri)
        <div class="modal fade" id="confirmDeleteModal{{ $santri->id }}" tabindex="-1"
            aria-labelledby="confirmDeleteModalLabel{{ $santri->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel{{ $santri->id }}">
                            Konfirmasi Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('santri.destroy', $santri->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($santris as $santri)
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal{{ $santri->id }}" tabindex="-1"
            aria-labelledby="editModalLabel{{ $santri->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $santri->id }}">Edit Santri</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('santri.update', ['santri' => $santri->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">NIS</label>
                                <input type="text" class="form-control" name="nomor_induk"
                                    value="{{ $santri->nomor_induk }}" required>
                                @error('nomor_induk')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $santri->nama }}"
                                    required>
                                @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Wali</label>
                                <input type="text" class="form-control" name="nama_wali"
                                    value="{{ $santri->nama_wali }}" required>
                                @error('nama_wali')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir"
                                    value="{{ $santri->tempat_lahir }}" required>
                                @error('tempat_lahir')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir"
                                    value="{{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('Y-m-d') }}" required>
                                @error('tanggal_lahir')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ $santri->alamat }}"
                                    required>
                                @error('alamat')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Masuk</label>
                                <select class="form-control" name="tahun_masuk" required>
                                    @php
                                        $currentYear = now()->year;
                                        $startYear = $currentYear - 10;
                                        $endYear = $currentYear + 10;
                                    @endphp
                                    @for ($year = $startYear; $year <= $endYear; $year++)
                                        <option value="{{ $year }}"
                                            {{ $year == $santri->tahun_masuk ? 'selected' : '' }}>
                                            {{ $year }}</option>
                                    @endfor
                                </select>
                                @error('tahun_masuk')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <select class="form-control" name="id_classroom" required>
                                    @foreach ($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}"
                                            {{ $classroom->id == $santri->id_classroom ? 'selected' : '' }}>
                                            {{ $classroom->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_classroom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="foto">Upload Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control">
                                <!-- Display current photo -->
                                @if ($santri->foto)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $santri->foto) }}" alt="Foto Santri"
                                            style="max-width: 150px;">
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
