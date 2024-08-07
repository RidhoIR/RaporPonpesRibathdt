@extends('layouts.template')

@section('content')
<div class="container">
    <div class="card overflow-hidden radius-10">
        <div class="profile-cover bg-dark position-relative mb-4">
            <div class="user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x">
                <img src="assets/images/avatars/06.png" alt="...">
            </div>
        </div>

        <div class="card-body">
            <div class="mt-5 d-flex align-items-start justify-content-between">
                <div class="">
                    <h3 class="mt-2 mb-0">{{ $rapor->santri->nama }}</h3>
                    <p class="mb-3" style="font-size: 15px">{{ $rapor->santri->nomor_induk }} - {{ $rapor->santri->tahun_masuk }}</p>
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
                                <td>{{ $detailMapel->mapel->keterangan   }}</td>
                                <td>{{ $detailMapel->mapel->type }}</td>
                                <td>{{ $detailMapel->nilai }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editNilaiModal{{ $detailMapel->id }}">
                                        Edit Nilai
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="editNilaiModal{{ $detailMapel->id }}" tabindex="-1" aria-labelledby="editNilaiModalLabel{{ $detailMapel->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('rapor.update.nilai', $rapor->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editNilaiModalLabel{{ $detailMapel->id }}">Edit Nilai</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="nilai{{ $detailMapel->id }}" class="form-label">Nilai</label>
                                                    <input type="number" name="nilai[{{ $detailMapel->id }}]" id="nilai{{ $detailMapel->id }}" value="{{ $detailMapel->nilai }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
</div>
@endsection