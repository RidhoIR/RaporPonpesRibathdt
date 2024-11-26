@extends('Layouts.template')
@section('title', 'Dashboard')

@section('content')
    <div class="d-flex justify-center justify-content-center flex-column w-100">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-4">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <div>
                                <p class="mb-0 fs-6">Total Santri</p>
                            </div>
                            <div class="ms-auto widget-icon-small text-white bg-gradient-purple">
                                <ion-icon name="people-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <div>
                                <h4 class="mb-0">{{ $totalSantri }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <div>
                                <p class="mb-0 fs-6">Total Kelas</p>
                            </div>
                            <div class="ms-auto widget-icon-small text-white bg-gradient-info">
                                <ion-icon name="home-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <div>
                                <h4 class="mb-0">{{ $totalKelas }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <div>
                                <p class="mb-0 fs-6">Total Mapel</p>
                            </div>
                            <div class="ms-auto widget-icon-small text-white bg-gradient-danger">
                                <ion-icon name="book-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <div>
                                <h4 class="mb-0">{{ $totalMapel }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-start gap-2">
                            <div>
                                <p class="mb-0 fs-6">Total Rapor</p>
                            </div>
                            <div class="ms-auto widget-icon-small text-white bg-gradient-info">
                                <ion-icon name="home-outline"></ion-icon>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <div>
                                <h4 class="mb-0">{{ $totalRapor }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rata-Rata Nilai Semester 1 & 2 -->
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-6 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="align-items-center mb-3 text-center">
                            <h3 class="mb-4 text-center">Rata-Rata Nilai</h3>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 g-3 align-items-center">
                            <!-- Semester 1 -->
                            <div class="col-lg-6 col-xl-6 col-xxl-6 order-2">
                                <div class="">
                                    <div class="mb-4">
                                        <h6 class="mb-0">Semester 1</h6>
                                    </div>
                                    @foreach ($kelasRataRata as $kelas)
                                        @if (isset($kelas['rataRataPerSemester'][1]))
                                            <div class="d-flex align-items-start gap-3 mb-3">
                                                <div class="widget-icon-small rounded bg-light-purple text-purple">
                                                    <ion-icon name="book-outline"></ion-icon>
                                                </div>
                                                <div>
                                                    <p class="mb-1">Kelas {{ $kelas['nama'] }}</p>
                                                    <p class="mb-0 h5">{{ $kelas['rataRataPerSemester'][1] }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <!-- Semester 2 -->
                            <div class="col-lg-6 col-xl-6 col-xxl-6 order-2">
                                <div class="">
                                    <div class="mb-4">
                                        <h6 class="mb-0">Semester 2</h6>
                                    </div>
                                    @foreach ($kelasRataRata as $kelas)
                                        @if (isset($kelas['rataRataPerSemester'][2]))
                                            <div class="d-flex align-items-start gap-3 mb-3">
                                                <div class="widget-icon-small rounded bg-light-purple text-purple">
                                                    <ion-icon name="book-outline"></ion-icon>
                                                </div>
                                                <div>
                                                    <p class="mb-1">Kelas {{ $kelas['nama'] }}</p>
                                                    <p class="mb-0 h5">{{ $kelas['rataRataPerSemester'][2] }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-6 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="align-items-center mb-3 text-center">
                            <h3 class="mb-4 text-center">Jumlah Nilai</h3>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 g-3 align-items-center">
                            <!-- Semester 1 -->
                            <div class="col-lg-6 col-xl-6 col-xxl-6 order-2">
                                <div class="">
                                    <div class="mb-4">
                                        <h6 class="mb-0">Semester 1</h6>
                                    </div>
                                    @foreach ($kelasJumlahNilai as $kelas)
                                        @if (isset($kelas['jumlahPerSemester'][1]))
                                            <div class="d-flex align-items-start gap-3 mb-3">
                                                <div class="widget-icon-small rounded bg-light-purple text-purple">
                                                    <ion-icon name="book-outline"></ion-icon>
                                                </div>
                                                <div>
                                                    <p class="mb-1">Kelas {{ $kelas['nama'] }}</p>
                                                    <p class="mb-0 h5">{{ $kelas['jumlahPerSemester'][1] }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <!-- Semester 2 -->
                            <div class="col-lg-6 col-xl-6 col-xxl-6 order-2">
                                <div class="">
                                    <div class="mb-4">
                                        <h6 class="mb-0">Semester 2</h6>
                                    </div>
                                    @foreach ($kelasJumlahNilai as $kelas)
                                        @if (isset($kelas['jumlahPerSemester'][2]))
                                            <div class="d-flex align-items-start gap-3 mb-3">
                                                <div class="widget-icon-small rounded bg-light-purple text-purple">
                                                    <ion-icon name="book-outline"></ion-icon>
                                                </div>
                                                <div>
                                                    <p class="mb-1">Kelas {{ $kelas['nama'] }}</p>
                                                    <p class="mb-0 h5">{{ $kelas['jumlahPerSemester'][2] }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
