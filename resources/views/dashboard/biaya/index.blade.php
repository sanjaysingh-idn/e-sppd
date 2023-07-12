@extends('layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-start">
                    Halaman untuk mengatur Uang Harian, Biaya Penginapan & Taksi
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-lg text-nowrap">
                    <table id="table" class="table table-bordered table-hover">
                        <caption class="ms-4">
                            Total Provinsi : {{ $biaya->count() }}
                        </caption>
                        <thead>
                            <tr>
                                <th colspan="3" class="text-center"></th>
                                <th colspan="3" class="text-center">Uang Harian</th>
                                <th colspan="4" class="text-center">Penginapan</th>
                                <th colspan="1" class="text-center">Taksi</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th>Provinsi</th>
                                <th>Actions</th>
                                <th>Luar Kota</th>
                                <th>Dalam Kota</th>
                                <th>Diklat</th>
                                <th>Eselon 1</th>
                                <th>Eselon 2</th>
                                <th>Eselon 3 / Gol 4</th>
                                <th>Eselon 4 / Gol 3 / 2 / 1</th>
                                <th>Biaya Taksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($biaya as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_provinsi }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary p-1 m-2 dropdown-toggle hide-arrow" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">
                                            <i class="bx bx-edit-alt"></i> Edit
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    Rp. {{ number_format($item->luar_kota) }}
                                </td>
                                <td>
                                    Rp. {{ number_format($item->dalam_kota) }}
                                </td>
                                <td>
                                    Rp. {{ number_format($item->diklat) }}
                                </td>
                                <td>
                                    Rp. {{ number_format($item->eselon_1) }}
                                </td>
                                <td>
                                    Rp. {{ number_format($item->eselon_2) }}
                                </td>
                                <td>
                                    Rp. {{ number_format($item->eselon_3_golongan_4) }}
                                </td>
                                <td>
                                    Rp. {{ number_format($item->eselon_4_golongan_3) }}
                                </td>
                                <td>
                                    Rp. {{ number_format($item->biaya_taksi) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ User Profile Content -->
@endsection

@push('modals')

{{-- Modal Edit --}}
@foreach ($biaya as $item)
<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditTitle">Edit Biaya Harian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('biaya.update',$item->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="nama_provinsi" class="form-label">Nama Provinsi</label>
                            <input class="form-control @error('nama_provinsi') is-invalid @enderror" type="text" id="nama_provinsi" name="nama_provinsi" value="{{ $item->nama_provinsi }}" readonly />
                            @error('nama_provinsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <hr class="mt-3">
                        <div class="row">
                            <H3><strong>UANG HARIAN</strong></H3>
                            <div class="col-sm-4 mb-3">
                                <label for="luar_kota" class="form-label">Luar Kota</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" min="0" class="form-control @error('luar_kota') is-invalid @enderror" name="luar_kota" value="{{ $item->luar_kota }}">
                                    @error('luar_kota')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="dalam_kota" class="form-label">Dalam Kota</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" min="0" class="form-control @error('dalam_kota') is-invalid @enderror" name="dalam_kota" value="{{ $item->dalam_kota }}">
                                    @error('dalam_kota')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="diklat" class="form-label">Diklat</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" min="0" class="form-control @error('diklat') is-invalid @enderror" name="diklat" value="{{ $item->diklat }}">
                                    @error('diklat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr class="mt-3">
                        <div class="row">
                            <H3><strong>PENGINAPAN</strong></H3>
                            <div class="col-sm-6 mb-3">
                                <label for="eselon_1" class="form-label">Eselon 1</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" min="0" class="form-control @error('eselon_1') is-invalid @enderror" name="eselon_1" value="{{ $item->eselon_1 }}">
                                    @error('eselon_1')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="eselon_2" class="form-label">Eselon 2</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" min="0" class="form-control @error('eselon_2') is-invalid @enderror" name="eselon_2" value="{{ $item->eselon_2 }}">
                                    @error('eselon_2')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="eselon_3_golongan_4" class="form-label">Eselon 3 / Golongan 4</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" min="0" class="form-control @error('eselon_3_golongan_4') is-invalid @enderror" name="eselon_3_golongan_4" value="{{ $item->eselon_3_golongan_4 }}">
                                    @error('eselon_3_golongan_4')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="eselon_4_golongan_3" class="form-label">Eselon 4 / Golongan 3 / 2 / 1</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" min="0" class="form-control @error('eselon_4_golongan_3') is-invalid @enderror" name="eselon_4_golongan_3" value="{{ $item->eselon_4_golongan_3 }}">
                                    @error('eselon_4_golongan_3')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr class="mt-3">
                        <div class="row">
                            <H3><strong>BIAYA TAKSI</strong></H3>
                            <div class="col-sm-6 mb-3">
                                <label for="biaya_taksi" class="form-label">Biaya taksi</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" min="0" class="form-control @error('biaya_taksi') is-invalid @enderror" name="biaya_taksi" value="{{ $item->biaya_taksi }}">
                                    @error('biaya_taksi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-edit-alt"></i> Edit Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- Modal Delete --}}
@foreach ($biaya as $item)
<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteTitle">Delete Biaya Representasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('biaya.destroy', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Apakah anda yakin ingin menghapus data biaya representasi</h4>
                                <p><strong>{{ $item->pangkat }}</strong> ?</p>
                                <ul>
                                    <li>Luar Kota : Rp. {{ number_format($item->luar_kota) }}</li>
                                    <li>Dalam Kota : Rp. {{ number_format($item->dalam_kota) }}</li>
                                    <li>Diklat Kota : Rp. {{ number_format($item->diklat) }}</li>
                                </ul>
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

@endpush

@push('scripts')
<script>
    $(document).ready(function(){
        $('#table').DataTable({
            // "dom": 'rtip',
            "pageLength": 50,
            // "responsive": true,
        });
    });
</script>
@endpush