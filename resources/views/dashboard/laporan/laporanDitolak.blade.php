@extends('layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-start">
                </div>
            </div>

            <div class="card-body">
                <table id="table" class="table table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Maksud</th>
                            <th>Alasan Ditolak</th>
                            <th>Tujuan</th>
                            <th>Tanggal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($laporan))
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($laporan as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                {{ $item->kode_spd }}
                            </td>
                            <td>
                                {{ $item->maksud }}
                            </td>
                            <td>
                                {{ $item->keterangan }}
                            </td>
                            <td class="text-nowrap">
                                <br>
                                Kabupaten : <strong>{{ $item->r_provinsi->nama_provinsi }}</strong>
                                <br>
                                Kota : <strong>{{ $item->r_kota->nama_kota }}</strong>
                            </td>
                            <td>
                                {{ date('d M Y', strtotime($item->tanggal_mulai)) }}
                                -
                                {{ date('d M Y', strtotime($item->tanggal_pulang)) }}
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-xs btn-info" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->id }}"><i class="bx bx-info-square me-1"></i> Detail</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        {{-- <p>SPD BELUM ADA</p> --}}
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--/ Spd Profile Content -->
@endsection

@push('modals')

@if (isset($laporan))
{{-- Modal Detail --}}
@foreach ($laporan as $item)
<div class="modal fade" id="modalDetail{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info pb-3">
                <h5 class="modal-title text-white" id="modalDetailTitle">Detail Surat Perjalanan Dinas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <small class="mb-4">Diinput pada : {{ date("d M Y, G:i:s", strtotime($item->created_at)) }} ({{ $item->created_at->diffForHumans() }})</small>
                        <br>
                        <div class="table-responsive">
                            <table id="table-modal" class="table table-bordered w-100">
                                <thead class="bg-info">
                                    <tr>
                                        <th colspan="2" class="text-white">Detail SPD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-capitalize">
                                        <td class="fw-bold">Ditolak Oleh</td>
                                        <td>{{ $item->r_user->name }} - {{ $item->r_user->role }} - {{ $item->r_user->golongan->golongan_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Kode SPD</td>
                                        <td>{{ $item->kode_spd }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Maksud</td>
                                        <td>{{ $item->maksud }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Diinput oleh</td>
                                        <td>{{ $item->input_by }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Jenis Perjalanan</td>
                                        <td>{{ $item->jenis_perjalanan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Jenis Transportasi</td>
                                        <td>{{ $item->jenis_transportasi }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Tujuan</td>
                                        <td>
                                            Provinsi : {{ $item->r_provinsi->nama_provinsi }}
                                            <br>
                                            Kabupaten/Kota : {{ $item->r_kota->nama_kota }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Alasan Ditolak</td>
                                        <td>{{ $item->keterangan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Jenis Perjalanan</td>
                                        <td>{{ $item->jenis_perjalanan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Tanggal Berangkat</td>
                                        <td>{{ date('d F Y', strtotime($item->tanggal_mulai)) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Tanggal Pulang</td>
                                        <td>{{ date('d F Y', strtotime($item->tanggal_pulang)) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Lama</td>
                                        <td>
                                            {{ $item->lama }} Hari
                                            <br>
                                            {{ $item->malam }} Malam
                                        </td>
                                    </tr>
                                    <hr>
                                    <tr>
                                        <td class="fw-bold">Status Terakhir</td>
                                        <td>{{ $item->status_spd }}</td>
                                    </tr>
                                    @if ($item->verifikasi_pada)
                                    <tr>
                                        <td class="fw-bold">Verifikasi Penanggung Jawab Kegiatan</td>
                                        <td>
                                            <p>Verifikasi Pada : {{ date("d M Y", strtotime($item->verifikasi_pada)) }}</p>
                                            <p>Verifikasi Oleh : {{ $item->verifikasi_oleh }}</p>
                                        </td>
                                    </tr>
                                    @endif
                                    @if ($item->verifikasi_pelaksanaan_pada)
                                    <tr>
                                        <td class="fw-bold">Verifikasi Penanggung Jawab Kegiatan</td>
                                        <td>
                                            <p>Verifikasi Pada : {{ date("d M Y", strtotime($item->verifikasi_pelaksanaan_pada)) }}</p>
                                            <p>Verifikasi Oleh : {{ $item->verifikasi_pelaksanaan_oleh }}</p>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif

@endpush

@push('scripts')
<script>
    $(document).ready(function(){
        $('#table').DataTable({
            // "dom": 'rtip',
            'responsive': true,
        });
    });
</script>
@endpush