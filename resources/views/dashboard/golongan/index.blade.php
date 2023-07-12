@extends('layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-xl-4 col-lg-4 col-md-4">
        <div class="card mb-4">
            <div class="card-header align-items-center bg-primary">
                <h4 class="card-action-title text-white mb-0"><i class="bx bx-add-to-queue"></i> Form Tambah Golongan</h4>
            </div>
            <hr class="my-0" />
            <form action="{{ route('golongan.store') }}" method="POST">
                <div class="card-body">
                    <div class="row">
                        @csrf
                        <div class="mb-3 col-md-12">
                            <label for="golongan_name" class="form-label">Nama Golongan</label>
                            <input class="form-control @error('golongan_name') is-invalid @enderror" type="text" id="golongan_name" name="golongan_name" value="{{ old('golongan_name') }}" placeholder="ESELON 1" />
                            @error('golongan_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="golongan_id" class="form-label">Urutan Golongan</label>
                            <input class="form-control @error('golongan_id') is-invalid @enderror" type="number" id="golongan_id" name="golongan_id" value="{{ old('golongan_id') }}" placeholder="1" />
                            @error('golongan_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2"><i class="bx bx-add-to-queue"></i> Add Data</button>
                    </div>
            </form>
        </div>
    </div>

</div>
<div class="col-xl-8 col-lg-8 col-md-8">

    <div class="card card-action mb-4">
        <div class="card-header align-items-center">
            <h4 class="card-action-title mb-0">{{ $title }}</h4>
        </div>
        <hr class="my-0" />
        <div class="card-body">
            <div class="row">
                <div class="table-responsive text-nowrap">
                    <table id="table" class="table table-hover">
                        <caption class="ms-4">
                            Total Golongan : {{ $golongan->count() }}
                        </caption>
                        <thead>
                            <tr>
                                <th>Urutan</th>
                                <th>Nama Golongan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($golongan as $item)
                            <tr>
                                <td>{{ $item->golongan_id }}</td>
                                <td>{{ $item->golongan_name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCenter{{ $item->id }}"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}"><i class="bx bx-trash me-1"></i> Delete</a>
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
    <!--/ Edit Profile -->
</div>
</div>
<!--/ User Profile Content -->
@endsection

@push('modals')

{{-- Modal Edit --}}
@foreach ($golongan as $item)
<div class="modal fade" id="modalCenter{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Edit Golongan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('golongan.update',$item->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="golongan_name" class="form-label">Nama Golongan</label>
                            <input type="text" id="golongan_name" name="golongan_name" class="form-control" value="{{ $item->golongan_name }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="golongan_id" class="form-label">Urutan Golongan</label>
                            <input type="number" id="golongan_id" name="golongan_id" class="form-control" value="{{ $item->golongan_id }}">
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
@foreach ($golongan as $item)
<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteTitle">Delete Golongan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('golongan.destroy', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Apakah anda yakin ingin menghapus data jabatan</h4>
                                <p><strong>{{ $item->golongan_name }}</strong> ?</p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-danger"><i class="bx bx-trash"></i> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endpush