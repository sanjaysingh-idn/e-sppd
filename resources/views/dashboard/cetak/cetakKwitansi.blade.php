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

            .ls-1 {
                letter-spacing: 1px;
            }
        </style>
        <title>{{ $title }}</title>
    </head>

    <body>
        @foreach ($permintaan as $item)
        <div class="container mt-5 border border-2 border-dark p-4" style="page-break-before: always;">
            <div class="row">
                <div class="col-7">

                </div>
                <div class="col-5">
                    <table class="table">
                        <tr>
                            <td>T.A</td>
                            <td>: {{ date('Y') }}</td>
                        </tr>
                        <tr>
                            <td>No. Bukti</td>
                            <td>: </td>
                        </tr>
                        <tr>
                            <td>Mata Anggaran</td>
                            <td>: {{ $spd->mata_anggaran }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase text-decoration-underline"><strong>kwitansi / bukti pembayaran</strong></h2>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3 fst-italic">Sudah terima dari</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    Kuasa Pengguna Anggaran
                    <br>
                    Direktorat Bina Usaha Perdagangan
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3 fst-italic">Jumlah Uang</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    Rp. {{ number_format($item->jumlah) }}
                </div>
            </div>
            <div class="row mt-4 py-3">
                <div class="col-3 fst-italic">Terbilang</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <p class="text-capitalize">{{ terbilang($item->jumlah) }} rupiah</p>
                </div>
            </div>
            <div class="row mt-4 py-3">
                <div class="col-3 fst-italic">Untuk Pembayaran</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    {{ $spd->maksud }}
                </div>
            </div>
            <div class="row my-5">
                <div class="col-4">
                </div>
                <div class="col-4">
                </div>
                <div class="col-4 ps-3">
                    <p class="mb-0">Jakarta, {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $spd->verifikasi_pelaksanaan_pada)->locale('id')->isoFormat('D MMMM Y') }}</p>
                    <p class="mb-5">Penerima Uang,</p>
                    <br>
                    <br>
                    <p class="mb-0 text-decoration-underline">{{ $item->nama }}</p>
                    <p>NIP. {{ $item->nip }}</p>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-5">
                    <p class="mb-0">Setuju dibebankan pada mata anggaran berkenaan,</p>
                    <p class="mb-0">a.n. Kuasa Pengguna Anggaran</p>
                    <p class="mb-4 text-capitalize">{{ $spd->ppk->role }},</p>
                    <br>
                    <br>
                    <p class="mb-0 text-decoration-underline">{{ $spd->ppk->name }}</p>
                    <p>NIP. {{ $spd->ppk->nip }}</p>
                </div>
                <div class="col-3">
                </div>
                <div class="col-4 ps-3">
                    <p class="mb-0">Lunas dibayar tgl :</p>
                    <p class="mb-0 text-capitalize">{{ $spd->bd->role }}</p>
                    <p class="mb-5"></p>
                    <br>
                    <br>
                    <p class="mb-0 text-decoration-underline">{{ $spd->bd->name }}</p>
                    <p>NIP. {{ $spd->bd->nip }}</p>
                </div>
            </div>
        </div>
        <div class="container mt-5" style="page-break-before: always;">
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <h4 class="text-uppercase fw-bold mb-1">Kementerian perdagangan</h4>
                    <h4 class="text-uppercase fw-bold">satuan kerja direktorat bina usaha perdagangan (447749)</h4>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <h3 class="text-uppercase text-decoration-underline fw-bold mb-1">Surat perintah bayar</h3>
                    <h4 class="text-uppercase mb-1">Nomor : {{ $spd->nomor_surat_tugas}}</h4>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <p class="mb-0">Saya yang bertanda tangan di bawah ini selaku Pejabat Pembuat Komitmen memerintahkan Bendahara Pengeluaran agar</p>
                    <p class="mt-0">Melakukan pembayaran sejumlah :</p>
                    <div class="row">
                        <div class="col-1">
                            Rp.
                        </div>
                        <div class="col-1">

                        </div>
                        <div class="col-10">
                            {{ number_format($item->jumlah) }}
                        </div>
                    </div>
                    <p class="text-danger ls-1">( {{ terbilang($item->jumlah) }} rupiah)</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-3 fst-italic">Kepada</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    {{ $item->nama }}
                </div>
            </div>
            <div class="row mt-4 py-3">
                <div class="col-3 fst-italic">Untuk Pembayaran</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    <P>
                        {{ $spd->maksud }} pada {{ \Carbon\Carbon::createFromFormat('Y-m-d', $spd->tanggal_mulai)->locale('id')->isoFormat('D MMMM Y') }}
                        sampai {{ \Carbon\Carbon::createFromFormat('Y-m-d', $spd->tanggal_pulang)->locale('id')->isoFormat('D MMMM Y') }} }}
                    </P>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-5">
                    <p class="mb-0">Atas Dasar</p>
                    <p class="mb-0">1. Kuitansi/bukti pembelian</p>
                    <p class="mb-0">2. Nota/bukti penerimaan barang/jasa/bukti lainnya</p>
                </div>
            </div>
            <div class="row">
                <div class="col-3">Dibebankan pada</div>
                <div class="col-1">:</div>
                <div class="col-8">

                </div>
            </div>
            <div class="row">
                <div class="col-3">Kegiatan, Output, MAK</div>
                <div class="col-1">:</div>
                <div class="col-8">
                    {{ $spd->mata_anggaran }}
                </div>
            </div>
            <div class="row">
                <div class="col-3">Kode</div>
                <div class="col-1">:</div>
                <div class="col-8">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-4">
                    <p class="mb-0">Setuju / lunas dibayar tanggal</p>
                    <p class="mb-0 text-white">.</p>
                    <p>Bendahara Pengeluaran</p>
                    <br>
                    <br>
                    <p class="mb-0 text-decoration-underline">{{ $spd->bd->name }}</p>
                    <p>NIP. {{ $spd->bd->nip }}</p>
                </div>
                <div class="col-4">
                    <p class="mb-0">Diterima Tanggal</p>
                    <p class="mb-0 text-white">.</p>
                    <p>Penerima</p>
                    <br>
                    <br>
                    <p class="mb-0 text-decoration-underline">{{ $item->nama }}</p>
                    <p>NIP. {{ $item->nip }}</p>
                </div>
                <div class="col-4">
                    <p class="mb-0">Jakarta, {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $spd->verifikasi_pelaksanaan_pada)->locale('id')->isoFormat('D MMMM Y') }}</p>
                    <p class="mb-0">A.n. Kuasa Pengguna Anggaran</p>
                    <p class="text-capitalize">{{ $spd->ppk->role }},</p>
                    <br>
                    <br>
                    <p class="mb-0 text-decoration-underline">{{ $spd->ppk->name }}</p>
                    <p>NIP. {{ $spd->ppk->nip }}</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-5">Catatan :</div>
            </div>
            <div class="row">
                <div class="col-3">- Transportasi Udara</div>
                <div class="col-1">Rp.</div>
                <div class="col-2 text-end ps-2">
                    {{ number_format($item->tiket_pesawat) }}
                </div>
                <div class="col-6">

                </div>
            </div>
            <div class="row">
                <div class="col-3">- Uang Harian</div>
                <div class="col-1">Rp.</div>
                <div class="col-2 text-end ps-2">
                    {{ number_format($item->uang_harian) }}
                </div>
                <div class="col-6">

                </div>
            </div>
            <div class="row">
                <div class="col-3">- Penginapan</div>
                <div class="col-1">Rp.</div>
                <div class="col-2 text-end ps-2">
                    {{ number_format($item->biaya_penginapan) }}
                </div>
                <div class="col-6">

                </div>
            </div>
            <div class="row">
                <div class="col-3">- Uang Representasi</div>
                <div class="col-1">Rp.</div>
                <div class="col-2 text-end ps-2">
                    {{ number_format($item->uang_representasi) }}
                </div>
                <div class="col-6">

                </div>
            </div>
            <div class="row">
                <div class="col-3">- Uang Taksi</div>
                <div class="col-1">Rp.</div>
                <div class="col-2 text-end ps-2 border-bottom border-1 border-dark">
                    {{ number_format($item->biaya_taksi) }}
                </div>
                <div class="col-6">

                </div>
            </div>
            <div class="row fw-bold mt-1">
                <div class="col-3"><strong>Jumlah yang diterima</strong></div>
                <div class="col-1">Rp.</div>
                <div class="col-2 text-end">
                    {{ number_format($item->jumlah) }}
                </div>
                <div class="col-6">

                </div>
            </div>
        </div>
        <div class="container mt-5" style="page-break-before: always;">
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <h3 class="text-uppercase text-decoration-underline fw-bold mb-1">RINCIAN BIAYA PERJALANAN DINAS</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-2"></div>
                <div class="col-2">SPPD Nomor</div>
                <div class="col-1">:</div>
                <div class="col-7">{{ $spd->kode_spd }}</div>
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-2">Tanggal</div>
                <div class="col-1">:</div>
                <div class="col-7">{{ date('d F Y') }}</div>
            </div>
            <div class="row mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Rincian Biaya Rill</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>
                                <p>Pesawat</p>
                                <p></p>
                            </td>
                            <td>
                                <p class="text-end">
                                    <span class="float-start">Rp. </span>
                                    {{ number_format($item->tiket_pesawat) }}
                                </p>
                            </td>
                            <td rowspan="5"></td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>
                                <div class="row">
                                    <div class="col-5">
                                        <p>Uang Harian</p>
                                    </div>
                                    <div class="col-3 text-center">
                                        {{ $item->lama }} Hari
                                    </div>
                                    <div class="col-1">
                                        x
                                    </div>
                                    <div class="col-3">
                                        <p class="text-end">
                                            <span class="float-start">Rp. </span>
                                            {{ number_format($item->uang_harian) }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-end">
                                    <span class="float-start">Rp. </span>
                                    {{ number_format($item->jumlah_uang_harian) }}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>
                                <div class="row">
                                    <div class="col-5">
                                        <p>Penginapan</p>
                                    </div>
                                    <div class="col-3 text-center">
                                        {{ $item->malam }} Malam
                                    </div>
                                    <div class="col-1">
                                        x
                                    </div>
                                    <div class="col-3">
                                        <p class="text-end">
                                            <span class="float-start">Rp. </span>
                                            {{ number_format($item->biaya_penginapan) }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-end">
                                    <span class="float-start">Rp. </span>
                                    {{ number_format($item->jumlah_biaya_penginapan) }}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>
                                <div class="row">
                                    <div class="col-5">
                                        <p>Uang Representasi</p>
                                    </div>
                                    <div class="col-3 text-center">
                                        {{ $item->hari }} hari
                                    </div>
                                    <div class="col-1">
                                        x
                                    </div>
                                    <div class="col-3">
                                        <p class="text-end">
                                            <span class="float-start">Rp. </span>
                                            {{ number_format($item->uang_representasi) }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-end">
                                    <span class="float-start">Rp. </span>
                                    {{ number_format($item->jumlah_uang_representasi) }}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>
                                <div class="row">
                                    <div class="col-5">
                                        <p>Uang Taksi</p>
                                    </div>
                                    <div class="col-3 text-center">

                                    </div>
                                    <div class="col-1">

                                    </div>
                                    <div class="col-3">
                                        <p class="text-end">
                                            <span class="float-start">Rp. </span>
                                            0
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-end">
                                    <span class="float-start">Rp. </span>
                                    0
                                </p>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th class="text-center"> J u m l a h</th>
                            <th class="text-center">
                                <p class="text-end">
                                    <span class="float-start">Rp. </span>
                                    {{ number_format($item->jumlah) }}
                                </p>
                            </th>
                            <th class="text-center">

                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <p class="fw-bold fst-italic mt-0 ls-1">Terbilang : {{ terbilang($item->jumlah) }}</p>
            <p class="fw-bold mt-3 text-end me-5">Jakarta, {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $spd->verifikasi_pelaksanaan_pada)->locale('id')->isoFormat('D MMMM Y') }}</p>
            <div class="row mt-5">
                <div class="col-3">
                    <p class="mb-0">Telah Dibayar Sejumlah</p>
                    <p class="text-end me-5 pe-5">
                        <span class="float-start">Rp. </span>
                        21.000.000
                    </p>
                    <p>Bendahara Pengeluaran</p>
                    <br>
                    <br>
                    <p class="mb-0 text-decoration-underline">{{ $spd->bd->name }}</p>
                    <p>NIP. {{ $spd->bd->nip }}</p>
                </div>
                <div class="col-6">

                </div>
                <div class="col-3">
                    <p class="mb-0">Telah menerima uang sebesar</p>
                    <p class="text-end me-5 pe-5">
                        <span class="float-start">Rp. </span>
                        21.000.000
                    </p>
                    <p>Yang Menerima</p>
                    <br>
                    <br>
                    <p class="mb-0 text-decoration-underline">{{ $item->nama }}</p>
                    <p>NIP. {{ $item->nip }}</p>
                </div>
            </div>
            <hr>
            <div class="row mt-4">
                <h3 class="text-uppercase text-center fw-bold mb-1">perhitungan sppd rampung</h3>
            </div>
            <div class="row">
                <div class="col-3">1. Ditetapkan sejumlah</div>
                <div class="col-6"></div>
                <div class="col-3">
                    <p class="text-end me-5 pe-5">
                        <span class="float-start">Rp. </span>
                        21.000.000
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-3">2. Yang telah dibayar semula</div>
                <div class="col-6"></div>
                <div class="col-3 border-bottom border-1 border-dark">
                    <p class="text-end me-5 pe-5">
                        <span class="float-start">Rp. </span>
                        21.000.000
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-3">3. Sisa Kurang/Lebih</div>
                <div class="col-6"></div>
                <div class="col-3">
                    <p class="text-end me-5 pe-5">
                        <span class="float-start">Rp. </span>
                        -
                    </p>
                </div>
            </div>
            <div class="row mt-5 text-center">
                <div class="col-4">

                </div>
                <div class="col-4">

                </div>
                <div class="col-4">
                    <p class="mb-0">Direktur Bina Usaha Perdagangan</p>
                    <p class="mb-0">A.n. Kuasa Pengguna Anggaran</p>
                    <p class="text-capitalize">{{ $spd->ppk->role }},</p>
                    <br>
                    <br>
                    <br>
                    <p class="mb-0 text-decoration-underline">{{ $spd->ppk->name }}</p>
                    <p>NIP. {{ $spd->ppk->nip }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </body>

</html>