@extends('layouts.template')
@section('title', $santri->nama . 'Home - ')
@section('content')
    <div class="container">
        <div class="">
            <div class="card overflow-hidden radius-10">
                <div class="profile-cover bg-dark position-relative mb-4">
                    <div class="user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x">
                        <img src="{{ asset('storage/' . $santri->foto) }}" alt="...">
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-5 d-flex align-items-start justify-content-between">
                        <div class="">
                            <h3 class="mt-2 mb-0">{{ $santri->nama }}</h3>
                            <p class="mb-3" style="font-size: 15px">{{ $santri->nomor_induk }} -
                                {{ $santri->tahun_masuk }}</p>
                            <div class="d-flex gap-1 flex-column justify-content-between" style="font-size: 15px">
                                <div><i class="bi bi-calendar me-2" style=""></i><strong>Tahun Masuk:</strong>
                                    <span>{{ $santri->tahun_masuk }}</span>
                                </div>
                                <div><i class="bi bi-person me-2"></i><strong>Wali:</strong>
                                    <span>{{ $santri->nama_wali }}</span>
                                </div>
                                <div><i class="bi bi-geo-alt me-2"></i><strong>Alamat:</strong>
                                    <span>{{ $santri->alamat }}</span>
                                </div>
                                <div><i class="bi bi-geo me-2"></i><strong>Tempat Lahir:</strong>
                                    <span>{{ $santri->alamat }}</span>
                                </div>
                                <div><i class="bi bi-calendar2 me-2"></i><strong>Tanggal Lahir:</strong>
                                    <span> {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-1">
                            {{-- <div><i class="bi bi-calendar"></i><strong>Tahun Masuk:</strong>
                                <span>{{ $santri->tahun_masuk }}</span>
                            </div>
                            <div><i class="bi bi-person"></i><strong>Wali:</strong>
                                <span>{{ $santri->nama_wali }}</span>
                            </div>
                            <div><i class="bi bi-geo-alt"></i><strong>Alamat:</strong>
                                <span>{{ $santri->alamat }}</span>
                            </div>
                            <div><i class="bi bi-geo"></i><strong>Tempat Lahir:</strong>
                                <span>{{ $santri->alamat }}</span>
                            </div>
                            <div><i class="bi bi-calendar2"></i><strong>Tanggal Lahir:</strong>
                                <span> {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->format('d/m/Y') }}</span>
                            </div> --}}

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
                                    <th>Tahun</th>
                                    <th>Semester</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2024-2025</td>
                                    <td>Semester 1</td>
                                    <td>90.0</td>
                                    <td>
                                        <div class="">
                                            <a href="#" style="text-decoration: none; color: inherit;">
                                                <button class="btn btn-outline-info me-2" title="Lihat">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
