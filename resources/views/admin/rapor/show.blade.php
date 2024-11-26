@extends('layouts.template')
@section('title', 'Rapor ' . $rapor->santri->nama)

@section('content')
    <div class="container">
        <div class="card overflow-hidden radius-10">
            <div class="profile-cover bg-dark position-relative mb-4">
                <div class="user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x">
                    <img src="{{ asset('storage/' . $rapor->santri->foto) }}" alt="...">
                </div>
            </div>
            <div class="card-body">
                <div class="mt-5 d-flex align-items-start justify-content-between">
                    <div class="">
                        <h3 class="mt-2 mb-0">{{ $rapor->santri->nama }}</h3>
                        <p class="mb-3" style="font-size: 15px">{{ $rapor->santri->nomor_induk }} -
                            {{ $rapor->santri->tahun_masuk }}</p>
                        <div class="d-flex gap-1 flex-column justify-content-between" style="font-size: 15px">
                            <div><i class="bi bi-calendar me-2"></i><strong>Tahun Masuk:</strong>
                                <span>{{ $rapor->santri->tahun_masuk }}</span>
                            </div>
                            <div><i class="bi bi-person me-2"></i><strong>Wali:</strong>
                                <span>{{ $rapor->santri->nama_wali }}</span>
                            </div>
                            <div><i class="bi bi-geo-alt me-2"></i><strong>Alamat:</strong>
                                <span>{{ $rapor->santri->alamat }}</span>
                            </div>
                            <div><i class="bi bi-geo me-2"></i><strong>Tempat Lahir:</strong>
                                <span>{{ $rapor->santri->tempat_lahir }}</span>
                            </div>
                            <div><i class="bi bi-calendar2 me-2"></i><strong>Tanggal Lahir:</strong>
                                <span>{{ \Carbon\Carbon::parse($rapor->santri->tanggal_lahir)->format('d/m/Y') }}</span>
                            </div>
                            <div><i class="bi bi-calculator me-2"></i><strong>Total Nilai:</strong>
                                <span>{{ $rapor->jumlah_nilai }}</span>
                            </div>
                            <div><i class="bi bi-bar-chart me-2"></i><strong>Rata-Rata Nilai:</strong>
                                <span>{{ $rapor->rata_rata_nilai }}</span>
                            </div>
                            <div><i class="bi bi-trophy me-2"></i><strong>Peringkat:</strong>
                                <span>{{ $rapor->peringkat }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2>Nilai Mapel</h2>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Mapel</th>
                                <th>Keterangan</th>
                                <th>Type</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rapor->detailMapels as $detailMapel)
                                <tr>
                                    <td>{{ $detailMapel->mapel->nama }}</td>
                                    <td>{{ $detailMapel->keterangan }}</td>
                                    <td>{{ $detailMapel->mapel->type }}</td>
                                    <td>{{ $detailMapel->nilai }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editNilaiModal{{ $detailMapel->id }}">
                                            Edit Nilai
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="editNilaiModal{{ $detailMapel->id }}" tabindex="-1"
                                    aria-labelledby="editNilaiModalLabel{{ $detailMapel->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('rapor.update.nilai', $rapor->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editNilaiModalLabel{{ $detailMapel->id }}">
                                                        Edit Nilai</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="nilai{{ $detailMapel->id }}"
                                                            class="form-label">Nilai</label>
                                                        <input type="number" name="nilai[{{ $detailMapel->id }}]"
                                                            id="nilai{{ $detailMapel->id }}"
                                                            value="{{ $detailMapel->nilai }}" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="keterangan{{ $detailMapel->id }}"
                                                            class="form-label">Keterangan</label>
                                                        <textarea name="keterangan[{{ $detailMapel->id }}]" id="keterangan{{ $detailMapel->id }}" class="form-control">{{ $detailMapel->keterangan }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2>Nilai Kepribadian</h2>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Indikator Kepribadian</th>
                                <th>Sub Indikator</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rapor->detail_kepribadians->groupBy('kepribadian.kategori.id') as $detailKepribadian => $items)
                                @foreach ($items as $index => $detailKepribadian)
                                    <tr>
                                        @if ($index === 0)
                                            <td rowspan="{{ count($items) }}">
                                                {{ $detailKepribadian->kepribadian->kategori->indikator_kepribadian ?? 'Tidak ada kategori' }}
                                            </td>
                                        @endif
                                        <td>{{ $detailKepribadian->kepribadian->sub_indikator }}</td>
                                        <td>{{ $detailKepribadian->nilai }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editKepribadianModal{{ $detailKepribadian->id }}">
                                                Edit Nilai
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal Kepribadian-->
                                    <div class="modal fade" id="editKepribadianModal{{ $detailKepribadian->id }}"
                                        tabindex="-1"
                                        aria-labelledby="editKepribadianModalLabel{{ $detailKepribadian->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('kepribadian.update', $detailKepribadian->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="editNilaiKepribadianLabel{{ $detailKepribadian->id }}">
                                                            Edit Nilai</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nilai:</label>
                                                            <div class="d-flex flex-column gap-2">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="nilai"
                                                                        id="nilaiA{{ $detailKepribadian->id }}"
                                                                        value="A"
                                                                        {{ $detailKepribadian->nilai == 'A' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="nilaiA{{ $detailKepribadian->id }}">A</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="nilai"
                                                                        id="nilaiB{{ $detailKepribadian->id }}"
                                                                        value="B"
                                                                        {{ $detailKepribadian->nilai == 'B' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="nilaiB{{ $detailKepribadian->id }}">B</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="nilai"
                                                                        id="nilaiC{{ $detailKepribadian->id }}"
                                                                        value="C"
                                                                        {{ $detailKepribadian->nilai == 'C' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="nilaiC{{ $detailKepribadian->id }}">C</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="nilai"
                                                                        id="nilaiD{{ $detailKepribadian->id }}"
                                                                        value="D"
                                                                        {{ $detailKepribadian->nilai == 'D' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="nilaiD{{ $detailKepribadian->id }}">D</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="nilai"
                                                                        id="nilaiE{{ $detailKepribadian->id }}"
                                                                        value="E"
                                                                        {{ $detailKepribadian->nilai == 'E' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="nilaiE{{ $detailKepribadian->id }}">E</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
