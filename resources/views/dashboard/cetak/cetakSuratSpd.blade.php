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

            body {
                font-size: 14px;
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
                            <div class="col-6 ms-4">
                                <p class="my-0 text-decoration-underline lh-1">Kementerian Negara/Lembaga</p>
                                <p class="my-0 fw-bold lh-1">Kementerian Perdagangan Republik Indonesia</p>
                                <p class="mb-0 mt-2 text-decoration-underline lh-1">Ministry/Institution</p>
                                <p class="my-0 fw-bold lh-1">Ministry of Trade Republic of Indonesia</p>
                            </div>
                            <div class="col-6 lh-1">
                                <p class="my-0"><span class="text-decoration-underline">Lembar Ke</span> &nbsp;&nbsp; : </p>
                                <p class="my-0 fw-bold">Sheet No.</p>
                                <p class="my-0 mt-1"><span class="text-decoration-underline">Kode No</span> &nbsp;&nbsp; : {{ $spd->nomor_surat_tugas }}</p>
                                <p class="my-0 fw-bold">Code No.</p>
                                <p class="my-0 mt-1"><span class="text-decoration-underline">Nomor</span> &nbsp;&nbsp; : {{ $spd->kode_spd }}</p>
                                <p class="my-0 fw-bold">Number</p>
                            </div>
                        </div>
                        <div class="row mt-3 lh-sm">
                            <div class="col-12 text-center">
                                <p class="mb-0"><strong><span class="text-decoration-underline">SURAT PERJALANAN DINAS</span></strong></p>
                                <span class="fst-italic mt-0">LETTER OF OFFICIAL TRAVEL</span>
                            </div>
                        </div>
                        <div class="row lh-sm">
                            <div class="col-12 mt-3">
                                <table class="table" style="font-size: 14px;">
                                    <tbody>
                                        <tr class="align-middle">
                                            <td style="width: 7px;">
                                                1
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0"><span class="text-decoration-underline">Pejabat Pembuat Komitmen</span></p>
                                                <span class="fst-italic mt-0">LETTER OF OFFICIAL TRAVEL</span>
                                            </td>
                                            <td>
                                                DIREKTORAT PERDAGANGAN MELALUI SISTEM ELEKTRONIK DAN PERDAGANGAN JASA
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;">
                                                2
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0"><span class="text-decoration-underline">Nama/NIP Pegawai yang melaksanakan perjalanan dinas</span></p>
                                                <span class="fst-italic mt-0">Name/Employee Register Number of the assigned officer</span>
                                            </td>
                                            <td>
                                                <span>{{ $user_permintaan->name }}</span>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;" class="align-top">
                                                3
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0 ps-1">a. <span class="text-decoration-underline">Pangkat dan Golongan</span></p>
                                                <span class="fst-italic mt-0 ps-3">Official Rank</span>
                                                <p class="mb-0 ps-1">b. <span class="text-decoration-underline">Jabatan/Instansi</span></p>
                                                <span class="fst-italic mt-0 ps-3">Position/Institution</span>
                                                <p class="mb-0 ps-1">c. <span class="text-decoration-underline">Tingkat Biaya Perjalanan Dinas</span></p>
                                                <span class="fst-italic mt-0 ps-3">Level of Official Travel Expense</span>
                                            </td>
                                            <td>
                                                <p>{{ $user_permintaan->golongan->golongan_name }}</p>
                                                <p>{{ $user_permintaan->jabatan->jabatan_name }}</p>
                                                <p>
                                                    @if ($user_permintaan->golongan->golongan_id == 1)
                                                    Tingkat B
                                                    @elseif ($user_permintaan->golongan->golongan_id == 2)
                                                    Tingkat C
                                                    @elseif (in_array($user_permintaan->golongan->golongan_id, [3, 5]))
                                                    Tingkat D
                                                    @elseif (in_array($user_permintaan->golongan->golongan_id, [4, 6]))
                                                    Tingkat E
                                                    @elseif (in_array($user_permintaan->golongan->golongan_id, [7, 8]))
                                                    Tingkat F
                                                    @endif
                                                </p>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;">
                                                4
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0"><span class="text-decoration-underline">Maksud Perjalanan Dinas</span></p>
                                                <span class="fst-italic mt-0">Purpose of Travel</span>
                                            </td>
                                            <td>
                                                {{ $spd->maksud }}
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;">
                                                5
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0"><span class="text-decoration-underline">Alat angkutan yang dipergunakan</span></p>
                                                <span class="fst-italic mt-0">Mode of Transportation</span>
                                            </td>
                                            <td>
                                                <span class="text-capitalize">{{ $spd->jenis_transportasi }}</span>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;" class="align-top">
                                                6
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0 ps-1">a. <span class="text-decoration-underline">Tempat Berangkat</span></p>
                                                <span class="fst-italic mt-0 ps-3">Point of Departure</span>
                                                <p class="mb-0 ps-1">b. <span class="text-decoration-underline">Tempat Tujuan</span></p>
                                                <span class="fst-italic mt-0 ps-3">Point of Destination</span>
                                            </td>
                                            <td>
                                                <p>a. Jakarta</p>
                                                <p>b. <span class="text-capitalize">{{ strtolower($spd->r_kota->nama_kota) }}</span></p>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;" class="align-top">
                                                7
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0 ps-1">a. <span class="text-decoration-underline">Lamanya Perjalanan Dinas</span></p>
                                                <span class="fst-italic mt-0 ps-3">Duration of Official Travel</span>
                                                <p class="mb-0 ps-1">b. <span class="text-decoration-underline">Tanggal Berangkat</span></p>
                                                <span class="fst-italic mt-0 ps-3">Date of Departure</span>
                                                <p class="mb-0 ps-1">c. <span class="text-decoration-underline">Tanggal harus kembali/tiba di tempat baru</span></p>
                                                <span class="fst-italic mt-0 ps-3">End of assignment Date/Start of assianment date</span>
                                            </td>
                                            <td>
                                                <p>a. {{ $spd->lama }} Hari {{ $spd->malam }} Malam</p>
                                                <p>b. {{ date('d F Y', strtotime($spd->tanggal_mulai)) }}</p>
                                                <p>c. {{ date('d F Y', strtotime($spd->tanggal_pulang)) }}</p>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;" class="align-top">
                                                8
                                            </td>
                                            <td style="">
                                                <div class=" row mb-2">
                                                    <div class="col-6">
                                                        <p class="mb-0 ps-1"><span class="text-decoration-underline">Pengikut</span> :</p>
                                                        <span class="fst-italic mt-0 ps-1">Companion</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0 ps-1"><span class="text-decoration-underline">Nama</span> :</p>
                                                        <span class="fst-italic mt-0 ps-1">Name</span>
                                                    </div>
                                                </div>
                                                @php
                                                $no = 1;
                                                @endphp
                                                @foreach ($permintaan as $item)
                                                @if ($item->nama != $user_permintaan->name)
                                                <p class="mb-0 ps-1">{{ $no++ }} <span>{{ $item->nama }} - {{ $item->golongan }}</span></p>
                                                @endif
                                                @endforeach
                                            </td>
                                            <td class="align-top">
                                                <div class="row mb-2">
                                                    <div class="col-6">
                                                        <p class="mb-0 ps-1"><span class="text-decoration-underline">Tanggal Lahir</span> :</p>
                                                        <span class="fst-italic mt-0 ps-1">Date of Birth</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0 ps-1"><span class="text-decoration-underline">Keterangan</span> :</p>
                                                        <span class="fst-italic mt-0 ps-1">None</span>
                                                    </div>
                                                </div>
                                                <p class="ps-1">
                                                    @foreach ($permintaan as $item)
                                                    @if ($item->nama != $user_permintaan->name)
                                                <p class="mb-0 ps-1">
                                                    <span>
                                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $user_permintaan->tgl_lahir)->locale('id')->isoFormat('D MMMM Y') }}
                                                    </span>
                                                </p>
                                                @endif
                                                @endforeach

                                                </p>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;" class="align-top">
                                                9
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0 ps-1"><span class="text-decoration-underline">Pembebanan Anggaran</span> :</p>
                                                <span class="fst-italic mt-0 ps-1">Budget Allocation</span>
                                                <p class="mb-0 ps-1">a. <span class="text-decoration-underline">Instasi</span></p>
                                                <span class="fst-italic mt-0 ps-3">Institution</span>
                                                <p class="mb-0 ps-1"><b></b>b. <span class="text-decoration-underline">Akun</span></p>
                                                <span class="fst-italic mt-0 ps-3">Code of Account</span>
                                            </td>
                                            <td>
                                                <p>DIPA Direktorat Bina Usaha Perdagangan Tahun Anggaran 2023</p>
                                                <p class="mb-0 ps-1">a. <span class="text-decoration-underline">Kementerian Perdagangan</span></p>
                                                <span class="fst-italic mt-0 ps-3">Ministry of Trade</span>
                                                <p class="mb-0 ps-1">b. {{ $spd->mak->kode_mak }}</p>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;" class="align-top">
                                                10
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0 ps-1"><span class="text-decoration-underline">Keterangan Lain-lain</span> :</p>
                                                <span class="fst-italic mt-0 ps-1">Additional Note</span>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;" class="align-top">

                                            </td>
                                            <td></td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0 ps-1"><span class="text-decoration-underline">Dikeluarkan di </span> : Jakarta</p>
                                                <span class="fst-italic mt-0 ps-1">Place of Issuance</span>
                                                <p class="mb-0 ps-1"><span class="text-decoration-underline">Tanggal </span> : {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $spd->verifikasi_pelaksanaan_pada)->locale('id')->isoFormat('D MMMM Y') }}</p>
                                                <span class="fst-italic mt-0 ps-1">Date of Issuance</span>
                                                <p class="mb-0 ps-1 text-decoration-underline text-capitalize">{{ $spd->ppk->role }}</p>
                                                <span class="fst-italic mt-0 ps-1">Authorizing Officer</span>
                                                <br>
                                                <br>
                                                <br>
                                                <p class="mb-0 text-decoration-underline ps-1">{{ $spd->ppk->name }}</p>
                                                <p class="ps-1">NIP. {{ $spd->ppk->nip }}</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="page-break-before: always;">
                <div class="col-12">
                    <div class="head">
                        <div class="row">
                            <div class="col-6 ms-4">
                                <p class="my-0 text-decoration-underline lh-1">Kementerian Negara/Lembaga</p>
                                <p class="my-0 fw-bold lh-1">Kementerian Perdagangan Republik Indonesia</p>
                                <p class="mb-0 mt-2 text-decoration-underline lh-1">Ministry/Institution</p>
                                <p class="my-0 fw-bold lh-1">Ministry of Trade Republic of Indonesia</p>
                            </div>
                            <div class="col-6 lh-1">
                                <p class="my-0"><span class="text-decoration-underline">Lembar Ke</span> &nbsp;&nbsp; : </p>
                                <p class="my-0 fw-bold">Sheet No.</p>
                                <p class="my-0 mt-1"><span class="text-decoration-underline">Kode No</span> &nbsp;&nbsp; : {{ $spd->nomor_surat_tugas }}</p>
                                <p class="my-0 fw-bold">Code No.</p>
                                <p class="my-0 mt-1"><span class="text-decoration-underline">Nomor</span> &nbsp;&nbsp; : {{ $spd->kode_spd }}</p>
                                <p class="my-0 fw-bold">Number</p>
                            </div>
                        </div>
                        <div class="row mt-3 lh-sm">
                            <div class="col-12 text-center">
                                <p class="mb-0"><strong><span class="text-decoration-underline">SURAT PERJALANAN DINAS</span></strong></p>
                                <span class="fst-italic mt-0">LETTER OF OFFICIAL TRAVEL</span>
                            </div>
                        </div>
                        <div class="row lh-sm">
                            <div class="col-12 mt-3">
                                <table class="table" style="font-size: 14px;">
                                    <tbody>
                                        <tr class="align-middle">
                                            <td style="width: 7px;">
                                                1
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0"><span class="text-decoration-underline">Pejabat Pembuat Komitmen</span></p>
                                                <span class="fst-italic mt-0">LETTER OF OFFICIAL TRAVEL</span>
                                            </td>
                                            <td>
                                                DIREKTORAT PERDAGANGAN MELALUI SISTEM ELEKTRONIK DAN PERDAGANGAN JASA
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;">
                                                2
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0"><span class="text-decoration-underline">Nama/NIP Pegawai yang melaksanakan perjalanan dinas</span></p>
                                                <span class="fst-italic mt-0">Name/Employee Register Number of the assigned officer</span>
                                            </td>
                                            <td>
                                                <span>{{ $user_permintaan->name }}</span>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;" class="align-top">
                                                3
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0 ps-1">a. <span class="text-decoration-underline">Pangkat dan Golongan</span></p>
                                                <span class="fst-italic mt-0 ps-3">Official Rank</span>
                                                <p class="mb-0 ps-1">b. <span class="text-decoration-underline">Jabatan/Instansi</span></p>
                                                <span class="fst-italic mt-0 ps-3">Position/Institution</span>
                                                <p class="mb-0 ps-1">c. <span class="text-decoration-underline">Tingkat Biaya Perjalanan Dinas</span></p>
                                                <span class="fst-italic mt-0 ps-3">Level of Official Travel Expense</span>
                                            </td>
                                            <td>
                                                <p>{{ $user_permintaan->golongan->golongan_name }}</p>
                                                <p>{{ $user_permintaan->jabatan->jabatan_name }}</p>
                                                <p>
                                                    @if ($user_permintaan->golongan->golongan_id == 1)
                                                    Tingkat B
                                                    @elseif ($user_permintaan->golongan->golongan_id == 2)
                                                    Tingkat C
                                                    @elseif (in_array($user_permintaan->golongan->golongan_id, [3, 5]))
                                                    Tingkat D
                                                    @elseif (in_array($user_permintaan->golongan->golongan_id, [4, 6]))
                                                    Tingkat E
                                                    @elseif (in_array($user_permintaan->golongan->golongan_id, [7, 8]))
                                                    Tingkat F
                                                    @endif
                                                </p>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;">
                                                4
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0"><span class="text-decoration-underline">Maksud Perjalanan Dinas</span></p>
                                                <span class="fst-italic mt-0">Purpose of Travel</span>
                                            </td>
                                            <td>
                                                {{ $spd->maksud }}
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;">
                                                5
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0"><span class="text-decoration-underline">Alat angkutan yang dipergunakan</span></p>
                                                <span class="fst-italic mt-0">Mode of Transportation</span>
                                            </td>
                                            <td>
                                                <span class="text-capitalize">{{ $spd->jenis_transportasi }}</span>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;" class="align-top">
                                                6
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0 ps-1">a. <span class="text-decoration-underline">Tempat Berangkat</span></p>
                                                <span class="fst-italic mt-0 ps-3">Point of Departure</span>
                                                <p class="mb-0 ps-1">b. <span class="text-decoration-underline">Tempat Tujuan</span></p>
                                                <span class="fst-italic mt-0 ps-3">Point of Destination</span>
                                            </td>
                                            <td>
                                                <p>a. Jakarta</p>
                                                <p>b. <span class="text-capitalize">{{ strtolower($spd->r_kota->nama_kota) }}</span></p>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;" class="align-top">
                                                7
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0 ps-1">a. <span class="text-decoration-underline">Lamanya Perjalanan Dinas</span></p>
                                                <span class="fst-italic mt-0 ps-3">Duration of Official Travel</span>
                                                <p class="mb-0 ps-1">b. <span class="text-decoration-underline">Tanggal Berangkat</span></p>
                                                <span class="fst-italic mt-0 ps-3">Date of Departure</span>
                                                <p class="mb-0 ps-1">c. <span class="text-decoration-underline">Tanggal harus kembali/tiba di tempat baru</span></p>
                                                <span class="fst-italic mt-0 ps-3">End of assignment Date/Start of assianment date</span>
                                            </td>
                                            <td>
                                                <p>a. {{ $spd->lama }} Hari {{ $spd->malam }} Malam</p>
                                                <p>b. {{ date('d F Y', strtotime($spd->tanggal_mulai)) }}</p>
                                                <p>c. {{ date('d F Y', strtotime($spd->tanggal_pulang)) }}</p>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;" class="align-top">
                                                8
                                            </td>
                                            <td style="">
                                                <div class=" row mb-2">
                                                    <div class="col-6">
                                                        <p class="mb-0 ps-1"><span class="text-decoration-underline">Pengikut</span> :</p>
                                                        <span class="fst-italic mt-0 ps-1">Companion</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0 ps-1"><span class="text-decoration-underline">Nama</span> :</p>
                                                        <span class="fst-italic mt-0 ps-1">Name</span>
                                                    </div>
                                                </div>
                                                @php
                                                $no = 1;
                                                @endphp
                                                @foreach ($permintaan as $item)
                                                @if ($item->nama != $user_permintaan->name)
                                                <p class="mb-0 ps-1">{{ $no++ }} <span>{{ $item->nama }} - {{ $item->golongan }}</span></p>
                                                @endif
                                                @endforeach
                                            </td>
                                            <td class="align-top">
                                                <div class="row mb-2">
                                                    <div class="col-6">
                                                        <p class="mb-0 ps-1"><span class="text-decoration-underline">Tanggal Lahir</span> :</p>
                                                        <span class="fst-italic mt-0 ps-1">Date of Birth</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-0 ps-1"><span class="text-decoration-underline">Keterangan</span> :</p>
                                                        <span class="fst-italic mt-0 ps-1">None</span>
                                                    </div>
                                                </div>
                                                <p class="ps-1">
                                                    @foreach ($permintaan as $item)
                                                    @if ($item->nama != $user_permintaan->name)
                                                <p class="mb-0 ps-1">
                                                    <span>
                                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $user_permintaan->tgl_lahir)->locale('id')->isoFormat('D MMMM Y') }}
                                                    </span>
                                                </p>
                                                @endif
                                                @endforeach

                                                </p>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;" class="align-top">
                                                9
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0 ps-1"><span class="text-decoration-underline">Pembebanan Anggaran</span> :</p>
                                                <span class="fst-italic mt-0 ps-1">Budget Allocation</span>
                                                <p class="mb-0 ps-1">a. <span class="text-decoration-underline">Instasi</span></p>
                                                <span class="fst-italic mt-0 ps-3">Institution</span>
                                                <p class="mb-0 ps-1"><b></b>b. <span class="text-decoration-underline">Akun</span></p>
                                                <span class="fst-italic mt-0 ps-3">Code of Account</span>
                                            </td>
                                            <td>
                                                <p>DIPA Direktorat Bina Usaha Perdagangan Tahun Anggaran 2023</p>
                                                <p class="mb-0 ps-1">a. <span class="text-decoration-underline">Kementerian Perdagangan</span></p>
                                                <span class="fst-italic mt-0 ps-3">Ministry of Trade</span>
                                                <p class="mb-0 ps-1">b. {{ $spd->mak->kode_mak }}</p>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;" class="align-top">
                                                10
                                            </td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0 ps-1"><span class="text-decoration-underline">Keterangan Lain-lain</span> :</p>
                                                <span class="fst-italic mt-0 ps-1">Additional Note</span>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td style="width: 7px;" class="align-top">

                                            </td>
                                            <td></td>
                                            <td style="text-align: left; width: 380px;!important">
                                                <p class="mb-0 ps-1"><span class="text-decoration-underline">Dikeluarkan di </span> : Jakarta</p>
                                                <span class="fst-italic mt-0 ps-1">Place of Issuance</span>
                                                <p class="mb-0 ps-1"><span class="text-decoration-underline">Tanggal </span> : {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $spd->verifikasi_pelaksanaan_pada)->locale('id')->isoFormat('D MMMM Y') }}</p>
                                                <span class="fst-italic mt-0 ps-1">Date of Issuance</span>
                                                <p class="mb-0 ps-1 text-decoration-underline text-capitalize">{{ $spd->ppk->role }}</p>
                                                <span class="fst-italic mt-0 ps-1">Authorizing Officer</span>
                                                <br>
                                                <br>
                                                <br>
                                                <p class="mb-0 text-decoration-underline ps-1">{{ $spd->ppk->name }}</p>
                                                <p class="ps-1">NIP. {{ $spd->ppk->nip }}</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border border-3 border-dark" style="page-break-before: always;">
                <div class="col-12">
                    <div class="head">
                        <div class="row">
                            <div class="col-1 ms-2 mt-3">I.</div>
                            <div class="col-5 mt-3">
                                <p class="my-0 text-decoration-underline lh-1">Tiba di</p>
                                <p class="my-0 fst-italic lh-1">Arrival at</p>
                                <p class="my-0 text-decoration-underline lh-1">Pada tanggal</p>
                                <p class="my-0 fst-italic lh-1">Date</p>
                                <p class="my-0 text-decoration-underline lh-1">Kepala Kantor</p>
                                <p class="my-0 fst-italic lh-1">Head of Office</p>
                            </div>
                            <div class="col-1 ms-2 mt-3">II.</div>
                            <div class="col-5 mt-3">
                                <p class="my-0 text-decoration-underline lh-1">Berangkat dari</p>
                                <p class="my-0 fst-italic lh-1">Departure From</p>
                                <p class="my-0 text-decoration-underline lh-1">Ke</p>
                                <p class="my-0 fst-italic lh-1">to</p>
                                <p class="my-0 text-decoration-underline lh-1">Pada tanggal</p>
                                <p class="my-0 fst-italic lh-1">date</p>
                                <p class="my-0 text-decoration-underline lh-1">Kepala Kantor</p>
                                <p class="my-0 fst-italic lh-1">Head of Office</p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-1 ms-2 mt-3">III.</div>
                            <div class="col-5 mt-3">
                                <p class="my-0 text-decoration-underline lh-1">Tiba di</p>
                                <p class="my-0 fst-italic lh-1">Arrival at</p>
                                <p class="my-0 text-decoration-underline lh-1">Pada tanggal</p>
                                <p class="my-0 fst-italic lh-1">Date</p>
                                <p class="my-0 text-decoration-underline lh-1">Kepala Kantor</p>
                                <p class="my-0 fst-italic lh-1">Head of Office</p>
                            </div>
                            <div class="col-1 ms-2 mt-3">IV.</div>
                            <div class="col-5 mt-3">
                                <p class="my-0 text-decoration-underline lh-1">Berangkat dari</p>
                                <p class="my-0 fst-italic lh-1">Departure From</p>
                                <p class="my-0 text-decoration-underline lh-1">Ke</p>
                                <p class="my-0 fst-italic lh-1">to</p>
                                <p class="my-0 text-decoration-underline lh-1">Pada tanggal</p>
                                <p class="my-0 fst-italic lh-1">date</p>
                                <p class="my-0 text-decoration-underline lh-1">Kepala Kantor</p>
                                <p class="my-0 fst-italic lh-1">Head of Office</p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-1 ms-2 mt-3">V.</div>
                            <div class="col-5 mt-3">
                                <p class="my-0 text-decoration-underline lh-1">Tiba di</p>
                                <p class="my-0 fst-italic lh-1">Arrival at</p>
                                <p class="my-0 text-decoration-underline lh-1">Pada tanggal</p>
                                <p class="my-0 fst-italic lh-1">Date</p>
                                <p class="my-0 text-decoration-underline lh-1">Kepala Kantor</p>
                                <p class="my-0 fst-italic lh-1">Head of Office</p>
                            </div>
                            <div class="col-1 ms-2 mt-3">VI.</div>
                            <div class="col-5 mt-3">
                                <p class="my-0 text-decoration-underline lh-1">Berangkat dari</p>
                                <p class="my-0 fst-italic lh-1">Departure From</p>
                                <p class="my-0 text-decoration-underline lh-1">Ke</p>
                                <p class="my-0 fst-italic lh-1">to</p>
                                <p class="my-0 text-decoration-underline lh-1">Pada tanggal</p>
                                <p class="my-0 fst-italic lh-1">date</p>
                                <p class="my-0 text-decoration-underline lh-1">Kepala Kantor</p>
                                <p class="my-0 fst-italic lh-1">Head of Office</p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-1 ms-2 mt-3">VII.</div>
                            <div class="col-5 mt-3">
                                <p class="my-0 text-decoration-underline lh-1">Tiba di Tempat Kedudukan</p>
                                <p class="my-0 fst-italic lh-1">Arrival at Departure Point</p>
                                <p class="my-0 text-decoration-underline lh-1">Pada tanggal</p>
                                <p class="my-0 fst-italic lh-1">Date</p>
                                <p class="my-0 text-decoration-underline lh-1">Pejabat Pembuat Komitmen</p>
                                <p class="my-0 fst-italic lh-1">Authorizing Officer</p>
                            </div>
                            <div class="col-6 mt-3">
                                <p class="my-0 lh-1 text-justify">
                                    Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintahnya dan semata- mata untuk kepentingan jabatan dalam waktu yang sesingkat- singkatnya
                                </p>
                                <p class="my-0 fst-italic text-white lh-1">.</p>
                                <p class="my-0 text-decoration-underline lh-1">Pejabat Pembuat Komitmen</p>
                                <p class="my-0 fst-italic lh-1">Authorizing Officer</p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-1 ms-2 mt-3">

                            </div>
                            <div class="col-5 mt-3">
                                <p class="my-0 lh-1">{{ $spd->ppk->name }}</p>
                                <p class="my-0 lh-1">NIP. {{ $spd->ppk->nip }}</p>
                            </div>
                            <div class="col-6 mt-3">
                                <p class="my-0 lh-1">{{ $spd->ppk->name }}</p>
                                <p class="my-0 lh-1">NIP. {{ $spd->ppk->nip }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>