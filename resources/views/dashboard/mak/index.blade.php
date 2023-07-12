@extends('layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-start">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="bx bx-plus-circle"></i> Tambah Mata Anggaran</button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="table" class="table table-hover">
                        <caption class="ms-4">

                        </caption>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mata Anggaran</th>
                                <th>Keterangan</th>
                                <th>Diinput oleh</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($mak as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->kode_mak }}</td>
                                <td>{{ $item->ket }}</td>
                                <td>{{ $item->input_by }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}"><i class="bx bx-trash me-1"></i> Delete</button>
                                        </div>
                                    </div>
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

{{-- Modal Tambah --}}
<div class="modal fade" id="modalAdd" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddTitle">Tambah Mata Anggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('mataAnggaran.store') }}" method="POST">
                @csrf
                <input type="hidden" name="input_by" value="{{ Auth::user()->name }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="kode_mak" class="form-label">Kode Mak</label>
                            <input class="form-control @error('kode_mak') is-invalid @enderror" type="text" id="kode_mak" name="kode_mak" value="{{ old('kode_mak') }}" />
                            @error('kode_mak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="ket" class="form-label">Keterangan</label>
                            <input class="form-control @error('ket') is-invalid @enderror" type="text" id="ket" name="ket" value="{{ old('ket') }}" />
                            @error('ket')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
@foreach ($mak as $item)
<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditTitle">Edit Mata Anggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('mataAnggaran.update',$item->id) }}" method="POST">
                @csrf
                @method('put')
                <input type="hidden" name="input_by" value="{{ Auth::user()->name }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="kode_mak" class="form-label">Kode Mak</label>
                            <input class="form-control @error('kode_mak') is-invalid @enderror" type="text" id="kode_mak" name="kode_mak" value="{{ $item->kode_mak }}" />
                            @error('kode_mak')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="ket" class="form-label">Keterangan</label>
                            <input class="form-control @error('ket') is-invalid @enderror" type="text" id="ket" name="ket" value="{{ $item->ket }}" />
                            @error('ket')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

{{-- Modal Delete --}}
@foreach ($mak as $item)
<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteTitle">Delete Mata Anggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('mataAnggaran.destroy', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Apakah anda yakin ingin menghapus data mata anggaran</h4>
                                <p><strong>{{ $item->kode_mak }}</strong> ?</p>
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