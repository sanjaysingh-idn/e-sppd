<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ public_path('bootstrap/css/bootstrap.min.css') }}">
        <style>
            .row {
                display: -webkit-box;
                display: -webkit-flex;
                display: flex;
            }

            .row>div {
                -webkit-box-flex: 1;
                -webkit-flex: 1;
            }

            .fs-me {
                font-size: 0.7rem;
            }

            #my-table {
                border-color: white;
                 !important
            }

            #my-table th td {
                border-color: white;
                 !important
            }
        </style>
        <title>{{ $title }}</title>
    </head>

    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="head">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img src="{{ public_path('image/kop-kemendagri.png') }}" alt="" srcset="" class="w-100">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center text-uppercase">
                                <strong>Surat tugas</strong>
                                <br>
                                Nomor : {{ $spd->kode_spd }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table id="my-table" class="table">
                                    <thead>
                                        <tr>
                                            <th class="align-top" style="text-align: left;">Menimbang</th>
                                            <th class="align-top">:</th>
                                            <th class="align-top">a.</th>
                                            <th class="pe-3" style="text-align: justify;">
                                                Bahwa untuk kelancaran pelaksanaan tugas di Lingkungan Direktorat Bina Usaha Perdagangan, perjalanan dinas dalam rangka {{ $spd->maksud }}, perlu menugaskan nama – nama tersebut di bawah ini.
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="align-top"></th>
                                            <th class="align-top"></th>
                                            <th class="align-top">b.</th>
                                            <th class="pe-3" style="text-align: justify;">
                                                Bahwa berdasarkan pertimbangan sebagaimana dimaksud dalam huruf a di atas, maka perlu dibuat Surat Tugas yang ditetapkan oleh Direktur Bina Usaha Perdagangan.
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="align-top" style="text-align: left;">Dasar</th>
                                            <th class="align-top">:</th>
                                            <th class="align-top">1</th>
                                            <th class="pe-3" style="text-align: justify;">
                                                Keputusan Menteri Perdagangan RI Nomor 1594 Tahun 2022 Tentang Penunjukan dan Pengangkatan Kuasa Pengguna Anggaran pada Kementerian Perdagangan Tahun Anggaran 2023.
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="align-top"></th>
                                            <th class="align-top"></th>
                                            <th class="align-top">2</th>
                                            <th class="pe-3" style="text-align: justify;">
                                                Keputusan Menteri Perdagangan RI Nomor 06 Tahun 2023 tentang Pengangkatan Pejabat Pembuat Komitmen, Penguji Tagihan dan Penandatanganan SPM dan Bendahara Pengeluaran Tahun Anggaran 2023.
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="align-top"></th>
                                            <th class="align-top"></th>
                                            <th class="align-top">3</th>
                                            <th class="pe-3" style="text-align: justify;">
                                                Surat Pengesahan Daftar Isian Pelaksanaan Anggaran Petikan (SPDIPA) Direktorat Bina Usaha Perdagangan Tahun Anggaran 2023 SP- DIPA Nomor : 090.02.1.447749/2023 tanggal 30 November 2022.
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="align-top"></th>
                                            <th class="align-top"></th>
                                            <th class="align-top">4</th>
                                            <th class="pe-3" style="text-align: justify;">
                                                Petunjuk Operasional Kegiatan DIPA Direktorat Bina Usaha Perdagangan Tahun 2023
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="text-center text-uppercase">
                                    <strong>Memberi Tugas</strong>
                                </div>
                                <table id="my-table" class="table">
                                    <thead>
                                        <tr>
                                            <th class="align-top" style="text-align: left;">Kepada</th>
                                            <th class="align-top"></th>
                                            <th class="align-top">:</th>
                                            <th class="pe-3" style="text-align: justify;">
                                                Pejabat/Pegawai yang namanya tercantum pada kolom 2 (dua) lampiran surat tugas ini.
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="align-top" style="text-align: left;">Untuk</th>
                                            <th class="align-top"></th>
                                            <th class="align-top">:</th>
                                            <th class="pe-3" style="text-align: justify;">
                                                Melaksanakan perjalanan dinas dalam rangka {{ $spd->maksud }}, segala biaya yang diperlukan dalam pelaksanaan tugas ini dibebankan DIPA Direktorat Bina Usaha Perdagangan Tahun Anggaran 2023 Nomor: 090.02.1.447749/2023 tanggal 30 November 2022
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-12">
                                <p class="mb-0">Demikian surat tugas ini, untuk dapat dilaksanakan dengan sebaik-baiknya dan penuh tanggung jawab.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                            </div>
                            <div class="col-4">
                            </div>
                            <div class="col-4 ps-3">
                                <p class="mb-0">Jakarta, @if ($spd->verifikasi_pelaksanaan_pada !== null)
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $spd->verifikasi_pelaksanaan_pada)->locale('id')->isoFormat('D MMMM Y') }}
                                    @endif
                                </p>
                                <p class="mb-0">A.n. Kuasa Pengguna Anggaran</p>
                                <p>Pejabat Pembuat Komitmen,</p>
                                <br>
                                <br>
                                <p class="mb-0 text-decoration-underline">Erwansyah, S.E., M.Si.</p>
                                <p>NIP. 19740531 200604 1 004</p>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                <p class="mb-1">Tembusan : </p>
                                <ol>
                                    <li>Direktur Jenderal Perdagangan Dalam Negeri (sebagai laporan)</li>
                                    <li>PPK pada Direktorat Bina Usaha Perdagangan;</li>
                                    <li>Yang bersangkutan.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="page-break-before: always;">
                <div class="col-12">
                    <div class="head">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-end me-1">Lampiran Surat Tugas Direktorat Bina Usaha Perdagangan</p>
                                <div class="row">
                                    <div class="col-7"></div>
                                    <div class="col-5 ps-3">
                                        <p>Nomor &nbsp;&nbsp;: {{ $spd->kode_spd }}</p>
                                        <p>Tanggal &nbsp;: {{ date('d F Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-12">
                                <p class="ms-2">Daftar Nama Pejabat/Pegawai yang akan melaksanakan tugas perjalanan dalam rangka {{ $spd->maksud }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>JABATAN</th>
                                            <th>TUJUAN</th>
                                            <th>TGL TUGAS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($permintaan as $p)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $p->nama }}</td>
                                            <td class="text-center">{{ $p->golongan }}</td>
                                            @if ($loop->first)
                                            <td class="align-middle text-center" rowspan="{{ count($permintaan) }}">{{ $spd->r_provinsi->nama_provinsi }}</td>
                                            <td class="align-middle text-center" rowspan="{{ count($permintaan) }}">
                                                {{ date('d F Y', strtotime($spd->tanggal_mulai)) }} -
                                                {{ date('d F Y', strtotime($spd->tanggal_pulang)) }}
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                            </div>
                            <div class="col-4">
                            </div>
                            <div class="col-4 ps-3">
                                <p class="mb-0">Jakarta, {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $spd->verifikasi_pada)->locale('id')->isoFormat('D MMMM Y') }}</p>
                                <p class="mb-0">{{ $spd->pj->jabatan->jabatan_name }}</p>
                                <br>
                                <br>
                                <p class="mb-0 text-decoration-underline">{{ $spd->pj->name }}</p>
                                <p>NIP. {{ $spd->pj->nip }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="page-break-before: always;">
                <div class="col-12">
                    <div class="head">
                        <div class="row my-3">
                            <div class="col-12">
                                <p class="ms-2 text-center fw-bold">
                                    LEMBAR KONTROL
                                    <br>
                                    DIREKTORAT BINA USAHA PERDAGANGAN
                                </p>
                                <p class="ms-2 mb-0 fw-bold">Subbagian Tata Usaha</p>
                                <p class="ms-2"><strong>Perihal</strong> &nbsp;&nbsp;: Surat Tugas {{ $spd->maksud }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <thead>
                                        <tr class="align-middle">
                                            <th rowspan="2"></th>
                                            <th class="py-1">NAMA</th>
                                            <th rowspan="2">PARAF</th>
                                            <th rowspan="2">TANGGAL</th>
                                        </tr>
                                        <tr>
                                            <th class="py-1" style="border: 0;">JABATAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="align-middle text-center">
                                            <td rowspan="2"><strong>DIKONSEP</strong></td>
                                            <td>Teguh Lambert</td>
                                            <td rowspan="2"></td>
                                            <td rowspan="2">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $spd->verifikasi_pelaksanaan_pada)->locale('id')->isoFormat('D MMMM Y') }}</td>
                                        </tr>
                                        <tr class="align-middle text-center">
                                            <td>Fasilitator Perdagangan</td>
                                        </tr>
                                        <tr class="align-middle text-center">
                                            <td rowspan="2"><strong>DIPERIKSA</strong></td>
                                            <td>Santi Widyaningsih</td>
                                            <td rowspan="2"></td>
                                            <td rowspan="2">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $spd->verifikasi_pelaksanaan_pada)->locale('id')->isoFormat('D MMMM Y') }}</td>
                                        </tr>
                                        <tr class="align-middle text-center">
                                            <td>Kepala Sub Bagian Tata Usaha</td>
                                        </tr>
                                        <tr class="align-middle text-center">
                                            <td rowspan="2"><strong>DISETUJUI</strong></td>
                                            <td>Septo Soepriyanto</td>
                                            <td rowspan="2"></td>
                                            <td rowspan="2">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $spd->verifikasi_pelaksanaan_pada)->locale('id')->isoFormat('D MMMM Y') }}</td>
                                        </tr>
                                        <tr class="align-middle text-center">
                                            <td>Direktur Bina Usaha Perdagangan</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>