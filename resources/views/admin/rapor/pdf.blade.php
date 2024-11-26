<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hasil Belajar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header-data {
            text-align: center;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1,
        .header h2,
        .header h3 {
            margin: 5px;
        }

        .section-title {
            font-weight: bold;
            margin-top: 20px;
        }

        .data-santri {
            margin-top: 10px;
            border-collapse: collapse;
            width: 100%;
        }

        .data-santri td {
            /* border: 1px solid black; */
            font-size: 24px;
            font-family: 'Times New Roman', Times, serif;
            text-transform: uppercase;
            padding: 8px;
            padding-bottom: 50px;
        }

        .data-santri tr {
            padding-bottom: 20px;
            /* border-bottom: 2px solid black; */
        }

        .nilai,
        .ubudiyah {
            margin-top: 10px;
            border-collapse: collapse;
            width: 100%;
        }

        .nilai td,
        .ubudiyah td {
            border: 1px solid black;
            padding: 8px;
        }

        .page-break {
            page-break-before: always;
        }

        .footer {
            margin-top: 40px;
            text-align: right;
        }

        .footer p {
            margin: 5px 0;
        }

        img {
            width: 100px;
            height: auto;
        }

        .table-footer {
            border-collapse: collapse;
            width: 100%;
            /* border: 1px solid black; */
        }

        .header-nilai {
            border-collapse: collapse;
            width: 100%;
        }

        .header-nilai td {
            /* border: 1px solid black; */
            font-size: 14px;
        }

        .table-footer td {
            /* border: 1px solid black; */
            text-align: center;
        }

        .total-nilai {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        .total-nilai td {
            /* border: 1px solid black; */
            padding: 8px;
        }

        .total-nilai tr {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ $logoPath }}" alt="" style="width: 300px;">
        <h1>PONDOK PESANTREN <br> RIBATH DARUTTAUHID</h1>
        <h2>SUTOREJO – SURABAYA – JATIM</h2>
        <br>
        <h3>LAPORAN HASIL BELAJAR</h3>
        {{-- <h3>SEMESTER II {{$rapor->semester}}</h3> --}}
        <h3>SEMESTER {{ \App\Helpers\NumberHelper::toRoman($rapor->semester) }}</h3>
        <h3>TAHUN AJARAN</h3>
        <h3>{{ $rapor->tahun_ajaran }}</h3>
    </div>

    <div class="header-data">
        <div class="section-title">NAMA SANTRI</div>
        <p style="border: 1px solid black; font-size:25px ">{{ $rapor->santri->nama }}</p>
        <br>
        <div class="section-title">KELAS</div>
        <p style="border: 1px solid black; font-size:25px;">{{ $rapor->santri->classroom->nama }}</p>
    </div>

    <div class="page-break"></div>

    <center>
        <h1 style="font-weight: 900">DATA SANTRI</h1>
        <h1 style="font-weight: 900">RIBATH DARUTTAUHID</h1>
    </center>
    <br>
    <br>
    <br>
    <table class="data-santri">
        <tr>
            <td>NAMA SANTRI</td>
            <td>: {{ $rapor->santri->nama }}</td>
        </tr>
        <tr>
            <td>NO INDUK</td>
            <td>: {{ $rapor->santri->nomor_induk }}</td>
        </tr>
        <tr>
            <td>TTL</td>
            <td>: {{ $rapor->santri->tempat_lahir }},
                {{ \Carbon\Carbon::parse($rapor->santri->tanggal_lahir)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td>ALAMAT</td>
            <td>: {{ $rapor->santri->alamat }}</td>
        </tr>
        <tr>
            <td>WALI SANTRI</td>
            <td>: {{ $rapor->santri->nama_wali }}</td>
        </tr>
        <tr>
            <td>TAHUN MASUK</td>
            <td>: {{ $rapor->santri->tahun_masuk }}</td>
        </tr>
    </table>

    <div class="page-break"></div>

    <div class="section-title">NILAI KEPRIBADIAN</div>
    <table class="nilai">
        <tr>
            <td>Indikator Kepribadian</td>
            <td>Sub Indikator</td>
            <td>Nilai</td>
        </tr>
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
                </tr>
            @endforeach
        @endforeach
    </table>

    <div class="page-break"></div>


    <div class="section-title">MATA PELAJARAN</div>
    <table class="header-nilai">
        <td>
            <p>NAMA : {{ $rapor->santri->nama }}</p>
            <p>KELAS : {{ $rapor->santri->classroom->nama }}</p>
        </td>
        <td style="width: 30%;">
            <p>SEMESTER : {{ $rapor->semester }}</p>
            <p>TAHUN AJARAN : {{ $rapor->tahun_ajaran }}</p>
        </td>
    </table>
    <table class="nilai">
        <tr>
            <td>NO</td>
            <td>MATA PELAJARAN</td>
            <td>NILAI ANGKA</td>
            <td>KETERANGAN</td>
        </tr>
        @foreach ($matapelajaran as $detailMapel)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $detailMapel->mapel->nama }}</td>
                <td>{{ $detailMapel->nilai }}</td>
                <td>{{ $detailMapel->keterangan }}</td>
            </tr>
        @endforeach
    </table>
    <div class="section-title">EKSTRAKULIKULER</div>
    <table class="ubudiyah">
        <tr>
            <td>NO</td>
            <td>EKSTRAKURIKULER</td>
            <td>NILAI ANGKA</td>
            <td>KETERANGAN</td>
        </tr>
        @foreach ($ekskul as $detailMapel)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $detailMapel->mapel->nama }}</td>
                <td>{{ $detailMapel->nilai }}</td>
                <td>{{ $detailMapel->keterangan }}</td>
            </tr>
        @endforeach
    </table>
    <div class="section-tittle"></div>
    <table class="total-nilai">
        <tr>
            <td style="width:45%;">JUMLAH NILAI</td>
            <td>: {{ $rapor->jumlah_nilai }}</td>
        </tr>
        <tr>
            <td>RATA-RATA NILAI</td>
            <td>: {{ $rapor->rata_rata_nilai }}</td>
        </tr>
        <tr>
            <td>PERINGKAT</td>
            <td>: {{ $rapor->peringkat }}</td>
        </tr>
    </table>

    <div class="footer">
        <table class="table-footer">
            <tr>
                <td> </td>
                <td style="width: 40%;">
                    <p>Surabaya, {{$tanggalSekarang}}</p>
                    <p>Hormat Kami,</p>
                    <p style="font-style: bold;">KHODIMUL MA’HAD</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p style="font-style: bold;">GUS JAMALUDDIN ALAWI M. Pdi</p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
