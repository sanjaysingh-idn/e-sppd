@extends('layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-start">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="bx bx-plus-circle"></i> Tambah Biaya Representasi</button>
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
                                <th>Pangkat</th>
                                <th>Luar Kota</th>
                                <th>Dalam Kota</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($representasi as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->pangkat }}</td>
                                <td>
                                    Rp. {{ number_format($item->luar_kota) }}
                                </td>
                                <td>
                                    Rp. {{ number_format($item->dalam_kota) }}
                                </td>
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
                <h5 class="modal-title" id="modalAddTitle">Tambah Biaya Representasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('representasi.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="pangkat" class="form-label">pangkat</label>
                            <select id="pangkat" class="select2 form-select @error('pangkat') is-invalid @enderror" name="pangkat" required>
                                <option value="" class="text-capitalize">--Pilih golongan--</option>
                                @foreach ($golongan as $g)
                                <option value="{{ $g->golongan_name }}" class="text-capitalize">{{ $g->golongan_name }}</option>
                                @endforeach
                            </select>
                            @error('pangkat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="luar_kota" class="form-label">Luar Kota</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">Rp</span>
                                <input type="number" min="0" class="form-control @error('luar_kota') is-invalid @enderror" name="luar_kota">
                                @error('luar_kota')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="dalam_kota" class="form-label">Dalam Kota</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">Rp</span>
                                <input type="number" min="0" class="form-control @error('dalam_kota') is-invalid @enderror" name="dalam_kota">
                                @error('dalam_kota')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
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
@foreach ($representasi as $item)
<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditTitle">Edit Biaya Representasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('representasi.update',$item->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <label for="pangkat" class="form-label">Pangkat</label>
                            <select id="pangkat" class="select2 form-select @error('pangkat') is-invalid @enderror" name="pangkat" required>
                                @foreach ($golongan as $g)
                                @if (old('pangkat', $item->pangkat) == $g->golongan_name)
                                <option value="{{ $g->golongan_name }}" class="text-capitalize" selected>{{ $g->golongan_name }}</option>
                                @else
                                <option value="{{ $g->golongan_name }}" class="text-capitalize">{{ $g->golongan_name }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('pangkat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
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
                        <div class="col-sm-6 mb-3">
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
@foreach ($representasi as $item)
<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteTitle">Delete Biaya Representasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('representasi.destroy', $item->id) }}" method="POST">
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
        });
    });
</script>
@endpush