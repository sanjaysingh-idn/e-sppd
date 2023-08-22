@extends('layouts.main')

@section('content')
<div class="row">
    {{-- @if ($errors->any())
    @dd($errors){{-- for check error bag --}}
    {{-- <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
    @endforeach
    </ul>
</div>
@endif --}}
<h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
<div class="col-12">
    <div class="card card-action mb-4">
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3"><i class="bx bx-left-arrow-circle"></i> Kembali</a>
            <div class="d-flex align-items-start align-items-sm-center gap-4">

            </div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-12">
                    @if ($spd->status_spd == "pelaksanaan")
                    <a href="{{ route('cetak.permintaan', $spd->id) }}" target="_blank" class="btn btn-warning"><i class="bx bx-printer"></i> Cetak Permintaan</a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <small class="mb-4">Diinput pada : {{ date("d M Y, G:i:s", strtotime($spd->created_at)) }} ({{ $spd->created_at->diffForHumans() }})</small>
                    <br>
                    <small class="mb-4">Diinput oleh : {{ $spd->input_by }}</small>
                    <div class="table-responsive mt-2">
                        <table id="table-modal" class="table table-bordered w-100">
                            <thead class="bg-info">
                                <tr>
                                    <th colspan="2" class="text-white">Detail SPD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="fw-bold">Kode SPD</td>
                                    <td>{{ $spd->kode_spd }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Maksud</td>
                                    <td>{{ $spd->maksud }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Tujuan</td>
                                    <td>{{ $spd->r_provinsi->nama_provinsi }} - {{ $spd->r_kota->nama_kota }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Status SPD</td>
                                    <td class="text-uppercase fw-bold">{{ $spd->status_spd }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Jenis Perjalanan</td>
                                    <td class="text-capitalize">{{ $spd->jenis_perjalanan }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Tanggal Berangkat</td>
                                    <td>{{ date('d F Y', strtotime($spd->tanggal_mulai)) }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Tanggal Pulang</td>
                                    <td>{{ date('d F Y', strtotime($spd->tanggal_pulang)) }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Lama</td>
                                    <td>
                                        {{ $spd->lama }} Hari
                                        <br>
                                        {{ $spd->malam }} Malam
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Undangan</td>
                                    <td>
                                        @if ($spd->undangan)
                                        <img src="{{ asset('storage/'. $spd->undangan) }}" class="img-thumbnail" frameborder="0">
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-4">
                    <p class="text-center fw-bold">DETAIL PERMINTAAN</p>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center align-middle">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Pangkat/Gol</th>
                                    <th>Nip</th>
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
                                @if ($p->spd_id == $spd->id)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->golongan }}</td>
                                    <td>{{ $p->nip }}</td>
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
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="fw-bold">
                                    <td colspan="4">TOTAL</td>
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
        </div>
    </div>
</div>
</div>
@endsection