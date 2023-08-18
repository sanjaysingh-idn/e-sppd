@extends('layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-start">
                    <a href="{{ route('spd.create') }}" class="btn btn-primary @if(!Auth::user()->spd_id) {{ "" }} @else disabled @endif"><i class="bx bx-plus-circle"></i> Tambah Form Pengajuan</a>
                    <br>
                    <small class="text-danger">
                        @if(Auth::user()->spd_id) {{ "Anda masih memiliki SPD yang sedang berjalan" }} @endif
                    </small>
                </div>
            </div>

            <div class="card-body">
                <table id="table" class="table table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Maksud</th>
                            <th>Status</th>
                            <th>Tujuan</th>
                            <th>Tanggal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($spd))
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($spd as $item)
                        <tr @if ($item->status_spd == 'selesai' || $item->status_spd == 'ditolak')
                            style="visibility: hidden;"
                            @endif>

                            <td>{{ $no++ }}</td>
                            <td>
                                {{ $item->kode_spd }}
                            </td>
                            <td>
                                {{ $item->maksud }}
                            </td>
                            <td class="text-uppercase">
                                @if ($item->status_spd == 'usulan')
                                <span class="badge bg-label-primary me-1">{{ $item->status_spd }}</span>
                                @elseif ($item->status_spd == 'verifikasi')
                                <span class="badge bg-label-success me-1">{{ $item->status_spd }}</span>
                                @elseif ($item->status_spd == 'pelaksanaan')
                                <span class="badge bg-label-warning me-1">{{ $item->status_spd }}</span>
                                @elseif ($item->status_spd == 'laporan')
                                <span class="badge bg-label-info me-1">{{ $item->status_spd }}</span>
                                @elseif ($item->status_spd == 'selesai')
                                <span class="badge bg-label-danger me-1">{{ $item->status_spd }}</span>
                                @endif
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
                                        @if (Auth::user()->role == 'penanggung jawab kegiatan' || Auth::user()->role == 'admin')
                                        @if ($item->status_spd == "usulan")
                                        <div class="col-12 my-1">
                                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalVerifikasi{{ $item->id }}"><i class="bx bx-pen me-1"></i> Verifikasi</button>
                                        </div>
                                        <div class="col-12 mt-1">
                                            <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#modalTolak{{ $item->id }}"><i class="bx bx-x-circle me-1"></i> Tolak</button>
                                        </div>
                                        @endif
                                        @endif
                                        {{-- @if (Auth::user()->role == 'admin')

                                        <button class="btn btn-danger my-2" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}"><i class="bx bx-trash me-1"></i> Delete</button>

                                        @endif --}}
                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'bendahara')
                                        @if ($item->status_spd == 'pelaksanaan')

                                        <button class="btn btn-success " data-bs-toggle="modal" data-bs-target="#modalSelesai{{ $item->id }}"><i class="bx bxs-check-circle me-1"></i> Selesai</button>

                                        @endif
                                        @endif
                                    </div>

                                    @if (Auth::user()->role == 'pejabat pembuat komitmen' || Auth::user()->role == 'admin')
                                    @if ($item->status_spd == "verifikasi")
                                    <div class="col-12 mt-1">
                                        <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalPenugasan{{ $item->id }}"><i class="bx bxs-plane-alt me-1"></i> Penugasan</button>
                                    </div>
                                    <div class="col-12 mt-1">
                                        <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#modalTolak{{ $item->id }}"><i class="bx bx-x-circle me-1"></i> Tolak</button>
                                    </div>
                                    @endif
                                    @endif
                                    @if (Auth::user()->role == 'bendahara')
                                    @if ($item->status_spd == "pelaksanaan")
                                    <div class="col-12 mt-1">
                                        <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#modalTolak{{ $item->id }}"><i class="bx bx-x-circle me-1"></i> Tolak</button>
                                    </div>
                                    @endif
                                    @endif
                                    <hr>
                                    <div class="col-12">
                                        @if ($item->status_spd == "pelaksanaan")
                                        <a href="{{ route('nota', $item->id) }}" class="btn btn-xs btn-primary"><i class="bx bxs-file-jpg me-1"></i> Upload Nota</a>
                                        <button class="btn btn-xs btn-secondary" data-bs-toggle="modal" data-bs-target="#modalTiket{{ $item->id }}"><i class="bx bx-purchase-tag me-1"></i> Tiket</button>
                                        @endif
                                        <a href="{{ route('detail', $item->id) }}" class="btn btn-xs btn-info"><i class="bx bx-info-square me-1"></i> Detail</a>
                                        {{-- @if ($item->status_spd !== "usulan" && $item->status_spd !== "verifikasi")
                                        <button class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#modalPermintaan{{ $item->id }}"><i class="bx bx-paperclip me-1"></i> Permintaan</button>
                                        @endif --}}
                                        @if ($item->status_spd == "pelaksanaan")
                                        <button class="btn btn-xs btn-dark" data-bs-toggle="modal" data-bs-target="#modalBerkas{{ $item->id }}"><i class="bx bx-file me-1"></i> Cetak Berkas</button>
                                        @endif
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

@if (isset($spd))
{{-- Modal Verifikasi --}}
@foreach ($spd as $item)
@if ($item->status_spd == "usulan")
<div class="modal fade" id="modalVerifikasi{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary pb-3">
                <h5 class="modal-title text-white" id="modalVerifikasiTitle">Verifikasi Surat Perjalanan Dinas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <h4>Apakah anda yakin akan memberikan verifikasi kepada SPD dibawah ini :</h4>
                        <ul class="mt-2">
                            <li>
                                <p>Kode SPD : <b>{{ $item->kode_spd }}</b></p>
                            </li>
                            <li>
                                <p>Maksud : <b>{{ $item->maksud }}</b></p>
                            </li>
                            <li>
                                <p>tujuan : <b>{{ $item->r_kota->nama_kota }}</b></p>
                            </li>
                            <li>
                                <p>diinput oleh : <b>{{ $item->input_by }}</b></p>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="col-12">
                        <div class="mb-3">
                            <form action="{{ route('verifikasiSpd', $item->id) }}" method="post">
                                @csrf
                                <label for="mata_anggaran" class="form-label"><b>Pilih Mata Anggaran</b></label>
                                <select class="form-select form-select-lg" name="mata_anggaran" id="mata_anggaran" required>
                                    <option value="" disabled selected>--Pilih Mata Anggaran--</option>
                                    @foreach ($mak as $item)
                                    <option value="{{ $item->id }}">{{ $item->kode_mak }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary"><i class="bx bx-pen"></i> Vefifikasi</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endif
@endforeach
@endif

@if (isset($spd))
{{-- Modal Penugasan--}}
@foreach ($spd as $item)
@if ($item->status_spd == "verifikasi")
<div class="modal fade" id="modalPenugasan{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary pb-3">
                <h5 class="modal-title text-white" id="modalPenugasanTitle">Penugasan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p><strong>Penugasan sekaligus memberikan akses berkas Perjalanan Dinas</strong></p>
                        <p>Apakah anda yakin ingin memberikan Penugasan untuk :</p>
                        <ol>
                            @foreach ($permintaan as $p)
                            <li>{{ $p->nama }} - {{ $p->golongan }}</li>
                            @endforeach
                        </ol>
                        <p>Kode : <strong>{{ $item->kode_spd }}</strong></p>
                        <p>Maksud : <strong>{{ $item->maksud }}</strong></p>
                        <p>Tujuan : <strong>{{ $item->r_kota->nama_kota }}</strong></p>
                    </div>
                    <hr>
                    <div class="col-12">
                        <form action="{{ route('penugasan', $item->id) }}" method="post">
                            @csrf
                            <label for="bendahara" class="form-label"><b>Pilih Bendahara</b></label>
                            <select class="form-select form-select-lg" name="bendahara" id="bendahara" required>
                                <option value="" disabled selected>--Pilih Bendahara--</option>
                                @foreach ($bendahara as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} - <small>{{ $item->golongan->golongan_name }}</small></option>
                                @endforeach
                            </select>
                            <br>
                            <div class="mb-3">
                                <label for="nomor_surat_tugas" class="form-label">Nomor Surat Tugas</label>
                                <input type="nomor_surat_tugas" class="form-control" name="nomor_surat_tugas" id="nomor_surat_tugas" aria-describedby="helpId" placeholder="Terbitkan nomor surat tugas disini" required>
                            </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary"><i class="bx bx-pen"></i> Penugasan</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endif
@endforeach
@endif

@if (isset($spd))
{{-- Modal Selesai--}}
@foreach ($spd as $item)
@if ($item->status_spd == "pelaksanaan")
<div class="modal fade" id="modalSelesai{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary pb-3">
                <h5 class="modal-title text-white" id="modalSelesaiTitle">Selesai SPD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p><strong>SPD Dinyatakan Selesai</strong></p>
                        <p>Apakah anda yakin ingin menyelesaikan spd untuk :</p>
                        <ol>
                            @foreach ($permintaan as $p)
                            <li>{{ $p->nama }} - {{ $p->golongan }}</li>
                            @endforeach
                        </ol>
                        <p>Kode : <strong>{{ $item->kode_spd }}</strong></p>
                        <p>Maksud : <strong>{{ $item->maksud }}</strong></p>
                        <p>Tujuan : <strong>{{ $item->r_kota->nama_kota }}</strong></p>
                    </div>
                    <hr>
                    <div class="col-12">
                        <form action="{{ route('selesai', $item->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="status_spd" value="selesai">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary"><i class="bx bx-pen"></i> Selesai SPD</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endif
@endforeach
@endif

@if (isset($spd))
{{-- Modal Tolak--}}
@foreach ($spd as $item)
<div class="modal fade" id="modalTolak{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger pb-3">
                <h5 class="modal-title text-white" id="modalTolakTitle">Tolak SPD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('spd.tolak', $item->id) }}" method="POST">
                @csrf
                @method('post')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <p><strong>Apakah anda yakin ingin melakukan penolakan terhadap SPD ini?</strong></p>
                            <ol>
                                @foreach ($permintaan as $p)
                                <li>{{ $p->nama }} - {{ $p->golongan }}</li>
                                @endforeach
                            </ol>
                            <p>Kode : <strong>{{ $item->kode_spd }}</strong></p>
                            <p>Maksud : <strong>{{ $item->maksud }}</strong></p>
                            <p>Tujuan : <strong>{{ $item->r_kota->nama_kota }}</strong></p>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">Alasan Penolakan</label>
                                <input type="text" class="form-control mt-2" name="keterangan" value="{{ old('keterangan') }}" maxlength="255" placeholder="Keterangan" required>
                                <small id="helpId" class="form-text text-muted">Masukkan Keterangan penolakan disini</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-danger"><i class="bx bx-x-circle"></i> Tolak Spd</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endif


@if (isset($spd))
{{-- Modal Tiket --}}
@foreach ($spd as $item)
<div class="modal fade" id="modalTiket{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary pb-3">
                <h5 class="modal-title text-white" id="modalTiketTitle">Input Biaya Tiket Pesawat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p><strong>Halaman ini digunakan untuk memperbarui harga tiket pesawat</strong></p>
                        <p>Biaya tiket pesawat saat ini : <strong>Rp. {{ number_format($item->tiket_pesawat) }}</strong></p>
                        <p>Pilih Input berdasar <strong>Standar Biaya</strong> atau <strong>Biaya Manual</strong></p>
                        <p>Upload Nota pada Tombol <strong>Upload Nota</strong></p>
                    </div>
                    <hr>
                    <div class="col-12">
                        <form action="{{ route('tiket_pesawat', $item->id) }}" method="post">
                            @csrf
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input class="btn-check" type="radio" name="options" id="option1" value="1" checked>
                                <label class="btn btn-outline-primary" for="option1">
                                    Standar Biaya
                                </label>
                                <input class="btn-check" type="radio" name="options" id="option2" value="2">
                                <label class="btn btn-outline-primary" for="option2">
                                    Biaya Manual
                                </label>
                            </div>
                            <div class="form-group mt-3" id="selectInput">
                                <label for="select">Pilih Harga Tiket</label>
                                <select class="form-control mt-2" id="select" name="tiket_pesawat">
                                    <option value="" disabled selected>--Pilih Tiket Pesawat--</option>
                                    @foreach ($data_tiket as $item)
                                    <option value="{{ $item->besaran }}">{{ $item->asal }} - <small>{{ $item->tujuan }} : <b>Rp. {{ number_format($item->besaran) }}</b></small></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group d-none mt-3" id="textInput">
                                <label for="text">Biaya Tiket Manual</label>
                                <div class="input-group mt-2">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" name="tiket_pesawat_manual" placeholder="Masukkan biaya tiket">
                                </div>
                            </div>
                            {{-- end form --}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-secondary"><i class="bx bx-purchase-tag"></i> Input Biaya Tiket</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endif

@if (isset($spd))
{{-- Modal Permintaan --}}
@foreach ($spd as $item)
@if ($item->status_spd !== "usulan" && $item->status_spd !== "verifikasi")
<div class="modal fade" id="modalPermintaan{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <a href="{{ route('cetak.permintaan', $item->id) }}" target="_blank" class="btn btn-warning"><i class="bx bx-printer"></i> Cetak Permintaan</a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="head">
                            <div class="row">
                                <div class="col-12 text-center text-uppercase">
                                    <p>NOMINATIF PERJALANAN DINAS</p>
                                    <p>DALAM RANGKA {{ $item->maksud }}</p>
                                    <p>TA. {{ date('Y') }}</p>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <p>Kode Akun : {{ $item->mak->kode_mak }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p class="text-center">PERMINTAAN</p>
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-center align-middle">
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Pangkat/Gol</th>
                                                    <th>Tujuan</th>
                                                    <th>Tanggal</th>
                                                    <th>Lama Perjalanan</th>
                                                    <th>Taxi</th>
                                                    <th>Hotel <br>({{ $item->malam }} Malam)</th>
                                                    <th>Tiket Pesawat</th>
                                                    <th>Uang Harian <br>({{ $item->lama }} Hari)</th>
                                                    <th>Uang Representasi</th>
                                                    <th>Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $no = 1;
                                                @endphp
                                                @foreach ($permintaan as $p)
                                                @if ($p->spd_id == $item->id)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $p->nama }}</td>
                                                    <td>{{ $p->golongan }}</td>
                                                    <td>{{ $item->r_kota->nama_kota }}</td>
                                                    <td>
                                                        {{ date('d F Y', strtotime($item->tanggal_mulai)) }}
                                                        - {{ date('d F Y', strtotime($item->tanggal_pulang)) }}
                                                    </td>
                                                    <td>{{ $item->lama }} hari</td>
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
                                    @if ($item->verifikasi_oleh !== null)
                                    <p class="mb-0 text-white">.</p>
                                    <p class="mb-0 text-capitalize">{{ $item->pj->role }}</p>
                                    <p>{{ $item->pj->jabatan->jabatan_name }}</p>
                                    <br>
                                    <br>
                                    <p class="mb-0 text-decoration-underline">{{ $item->pj->name }}</p>
                                    <p>NIP. {{ $item->pj->nip }}</p>
                                    @endif
                                </div>
                                <div class="col-4">
                                    <p class="mb-0 text-white">.</p>
                                    <p class="mb-0 text-white">.</p>
                                    <p class="text-capitalize">{{ $item->bd->role }}</p>
                                    <br>
                                    <br>
                                    <p class="mb-0 text-decoration-underline">{{ $item->bd->name }}</p>
                                    <p>NIP. {{ $item->bd->nip }}</p>
                                </div>
                                <div class="col-4">
                                    <p class="mb-0">Jakarta, @if ($item->verifikasi_pelaksanaan_pada !== null)
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->verifikasi_pelaksanaan_pada)->locale('id')->isoFormat('D MMMM Y') }}
                                        @endif</p>
                                    <p class="mb-0">A.n. Kuasa Pengguna Anggaran</p>
                                    <p class="text-capitalize">{{ $item->ppk->role }}</p>
                                    <br>
                                    <br>
                                    <p class="mb-0 text-decoration-underline">{{ $item->ppk->name }}</p>
                                    <p>NIP. {{ $item->ppk->nip }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <a href="{{ route('cetak.permintaan', $item->id) }}" target="_blank" class="btn btn-warning"><i class="bx bx-printer"></i> Cetak Permintaan</a>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
@endif

@if (isset($spd))
{{-- Modal Kwitansi --}}
@foreach ($spd as $item)
@if ($item->status_spd == "pelaksanaan")
<div class="modal fade" id="modalBerkas{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark pb-3">
                <h5 class="modal-title text-white" id="modalVerifikasiTitle">Daftar Cetak Berkas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p>Cetak Surat Tugas : <br><a href="{{ route('cetak.suratTugas', $item->id) }}" target="_blank" class="btn btn-dark"><i class="bx bx-file"></i> Cetak Surat Tugas</a></p>
                    </div>
                    <div class="col-12">
                        <p>Cetak Surat Perjalanan Dinas : <br><a href="{{ route('cetak.suratSpd', $item->id) }}" target="_blank" class="btn btn-dark"><i class="bx bx-file"></i> Cetak Surat Perjalanan Dinas</a></p>
                    </div>
                    <div class="col-12">
                        <p>Cetak Kwitansi : <br><a href="{{ route('cetak.kwitansi', $item->id) }}" target="_blank" class="btn btn-dark"><i class="bx bx-file"></i> Cetak Kwitansi</a></p>
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
@endif
@endforeach
@endif

@if (isset($spd))
{{-- Modal Delete --}}
@foreach ($spd as $item)
<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteTitle">Delete Biaya Representasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('spd.destroy', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Apakah anda yakin ingin menghapus data pengajuan</h4>
                                <p><strong>{{ $item->kode_spd }}</strong> dengan maksud <strong>{{ $item->maksud }}</strong> ?</p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-danger"><i class="bx bx-trash"></i> Hapus data</button>
                </div>
            </form>
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

    $(document).ready(function() {
    $('input[name="options"]').click(function() {
    if ($('#option1').is(':checked')) {
    $('#selectInput').removeClass('d-none');
    $('#textInput').addClass('d-none');
    } else {
    $('#selectInput').addClass('d-none');
    $('#textInput').removeClass('d-none');
    }
    });
    });
</script>
@endpush