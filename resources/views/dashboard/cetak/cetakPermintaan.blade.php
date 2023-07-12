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
        </style>
        <title>{{ $title }}</title>
    </head>

    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="head">
                        <div class="row">
                            <div class="col-12 text-center text-uppercase">
                                <p>NOMINATIF PERJALANAN DINAS</p>
                                <p>DALAM RANGKA {{ $spd->maksud }}</p>
                                <p>TA. {{ date('Y') }}</p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <p>Kode Akun : {{ $spd->mak->kode_mak }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="text-center">PERMINTAAN</p>
                                <div class="">
                                    <table class="table table-bordered table-sm">
                                        <thead>
                                            <tr class="text-center align-middle">
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Pangkat/Gol</th>
                                                <th>Tujuan</th>
                                                <th>Tanggal</th>
                                                <th>Lama Perjalanan</th>
                                                <th>Taxi</th>
                                                <th>Hotel <br>({{ $spd->malam }} Malam)</th>
                                                <th>Tiket Pesawat</th>
                                                <th>Uang Harian <br>({{ $spd->lama }} Hari)</th>
                                                <th>Uang Representasi</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp
                                            @foreach ($permintaan as $p)
                                            <tr class="text-nowrap">
                                                <td class="text-center">{{ $no++ }}</td>
                                                <td>{{ $p->nama }}</td>
                                                <td>{{ $p->golongan }}</td>
                                                <td class="text-center">{{ $spd->r_kota->nama_kota }}</td>
                                                <td>
                                                    {{ date('d F Y', strtotime($spd->tanggal_mulai)) }}
                                                    - {{ date('d F Y', strtotime($spd->tanggal_pulang)) }}
                                                </td>
                                                <td class="text-center">{{ $spd->lama }} hari</td>
                                                <td>
                                                    Rp. {{ number_format($p->biaya_taksi) }}
                                                </td>
                                                <td>
                                                    Rp. {{ number_format($p->jumlah_biaya_penginapan) }}
                                                </td>
                                                <td>
                                                    Rp. {{ number_format($p->tiket_pesawat) }}
                                                </td>
                                                <td>
                                                    Rp. {{ number_format($p->jumlah_uang_harian) }}
                                                </td>
                                                <td>
                                                    Rp. {{ number_format($p->jumlah_uang_representasi) }}
                                                </td>
                                                <td>
                                                    Rp. {{ number_format($p->jumlah) }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="fw-bold text-nowrap">
                                                <td colspan="6">TOTAL</td>
                                                <td>
                                                    Rp. {{ number_format($permintaan->sum('biaya_taksi')) }}
                                                </td>
                                                <td>
                                                    Rp. {{ number_format($permintaan->sum('jumlah_biaya_penginapan')) }}
                                                </td>
                                                <td>
                                                    Rp. {{ number_format($permintaan->sum('tiket_pesawat')) }}
                                                </td>
                                                <td>
                                                    Rp. {{ number_format($permintaan->sum('jumlah_uang_harian')) }}
                                                </td>
                                                <td>
                                                    Rp. {{ number_format($permintaan->sum('jumlah_uang_representasi')) }}
                                                </td>
                                                <td>
                                                    Rp. {{ number_format($permintaan->sum('jumlah')) }}
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-12">
                                <p class="mb-0">Catatan : </p>
                                <p>* Sanggup mempertanggungjawabkan beserta seluruh dokumen paling lambat 5 hari kerja setelah pelaksanaan kegiatan</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="mb-0 text-white">.</p>
                                <p class="mb-0">Penanggung Jawab Kegiatan</p>
                                <p>Ketua Tim Bidang Distribusi Tidak Langsung</p>
                                <br>
                                <br>
                                <p class="mb-0 text-decoration-underline">Drs. Widiantoro Puji W., M.Si</p>
                                <p>NIP. 196305041993031001</p>
                            </div>
                            <div class="col-4">
                                <p class="mb-0 text-white">.</p>
                                <p class="mb-0 text-white">.</p>
                                <p>Bendahara Pengeluaran</p>
                                <br>
                                <br>
                                <p class="mb-0 text-decoration-underline">Resti Gustiawati</p>
                                <p>NIP. 196305041993031001</p>
                            </div>
                            <div class="col-4">
                                <p class="mb-0">Jakarta, {{ date('d F Y') }}</p>
                                <p class="mb-0">A.n. Kuasa Pengguna Anggaran</p>
                                <p>Pejabat Pembuat Komitmen,</p>
                                <br>
                                <br>
                                <p class="mb-0 text-decoration-underline">Erwansyah, S.E., M.Si.</p>
                                <p>NIP. 196305041993031001</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>