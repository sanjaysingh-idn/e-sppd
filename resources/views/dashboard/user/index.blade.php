@extends('layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-start">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="bx bx-plus-circle"></i> Tambah Akun</button>
                </div>
            </div>

            <div class="card-body">
                <div class=" text-nowrap">
                    <table id="table" class="table table-hover">
                        <caption class="ms-4">

                        </caption>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nip</th>
                                <th>Golongan</th>
                                <th>Jabatan</th>
                                <th>Role</th>
                                <th>Foto</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($users as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->nip }}</td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $item->golongan->golongan_name ?? 'No Golongan' }}</strong></td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $item->jabatan->jabatan_name ?? 'No jabatan' }}</strong></td>
                                <td>
                                    @if ($item->role == 'admin')
                                    <span class="badge bg-label-primary me-1">{{ $item->role }}</span>
                                    @elseif ($item->role == 'pegawai')
                                    <span class="badge bg-label-success me-1">{{ $item->role }}</span>
                                    @elseif ($item->role == 'penanggung jawab kegiatan')
                                    <span class="badge bg-label-warning me-1">{{ $item->role }}</span>
                                    @elseif ($item->role == 'pejabat pembuat komitmen')
                                    <span class="badge bg-label-info me-1">{{ $item->role }}</span>
                                    @elseif ($item->role == 'bendahara pengeluaran')
                                    <span class="badge bg-label-danger me-1">{{ $item->role }}</span>
                                    @endif
                                </td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="{{ $item->name }}">
                                            @if ($item->image)
                                            <img src="{{ asset('storage/'. $item->image) }}" alt="{{ $item->name }}" class="rounded-circle" />
                                            @else
                                            <img src="{{ asset('storage/profile-image/default-image.png') }}" alt="{{ $item->name }}" class="rounded-circle" />
                                            @endif
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-warning" href="{{ route('user.edit', $item->id, '.edit') }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <button class="btn btn-xs btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}"><i class="bx bx-trash me-1"></i> Delete</button>
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
                <h5 class="modal-title" id="modalAddTitle">Tambah Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="golongan_id" class="form-label">golongan</label>
                            <select id="golongan_id" class="select2 form-select @error('golongan_id') is-invalid @enderror" name="golongan_id" required>
                                <option value="" class="text-capitalize">--Pilih golongan--</option>
                                @foreach ($golongan as $g)
                                <option value="{{ $g->id }}" class="text-capitalize">{{ $g->golongan_name }}</option>
                                @endforeach
                            </select>
                            @error('golongan_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="jabatan_id" class="form-label">jabatan</label>
                            <select id="jabatan_id" class="select2 form-select @error('jabatan_id') is-invalid @enderror" name="jabatan_id" required>
                                <option value="" class="text-capitalize">--Pilih Jabatan--</option>
                                @foreach ($jabatan as $j)
                                <option value="{{ $j->id }}" class="text-capitalize">{{ $j->jabatan_name }}</option>
                                @endforeach
                            </select>
                            @error('jabatan_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}" />
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" />
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="nip" class="form-label">nip</label>
                            <input class="form-control @error('nip') is-invalid @enderror" type="number" id="nip" name="nip" value="{{ old('nip') }}" />
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="contact" class="form-label">No. HP</label>
                            <input class="form-control @error('contact') is-invalid @enderror" type="number" id="contact" name="contact" value="{{ old('contact') }}" />
                            @error('contact')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input class="form-control @error('address') is-invalid @enderror" type="text" id="address" name="address" value="{{ old('address') }}" />
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input class="form-control @error('tempat_lahir') is-invalid @enderror" type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" />
                            @error('tempat_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input class="form-control @error('tgl_lahir') is-invalid @enderror" type="date" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}" />
                            @error('tgl_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="password" class="form-label">password</label>
                            <input class="form-control" type="password" id="password" name="password" />
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="role" class="form-label">role</label>
                            <select id="role" class="select2 form-select @error('role') is-invalid @enderror" name="role" required>
                                <option value="" class="text-capitalize">--Pilih Role--</option>
                                @foreach ($role as $r)
                                <option value="{{ $r }}" class="text-capitalize">{{ $r }}</option>
                                @endforeach
                            </select>
                            @error('role')
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

{{-- Modal Delete --}}
@foreach ($users as $item)
<div class="modal fade" id="modalDelete{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteTitle">Delete User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.destroy', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Apakah anda yakin ingin menghapus data User</h4>
                                <p><strong>{{ $item->nama }}</strong> ?</p>
                                <ul>
                                    <li>Jabatan : {{ $item->jabatan->jabatan_name }}</li>
                                    <li>Golongan : {{ $item->golongan->golongan_name }}</li>
                                    <li>Role : {{ $item->role }}</li>
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
            responsive: true,
        });
    });

    'use strict';
    
    document.addEventListener('DOMContentLoaded', function (e) {
    (function () {
    const deactivateAcc = document.querySelector('#formAccountDeactivation');
    
    // Update/reset user image of account page
    let accountUserImage = document.getElementById('uploadedAvatar');
    const fileInput = document.querySelector('.account-file-input'),
    resetFileInput = document.querySelector('.account-image-reset');
    
    if (accountUserImage) {
    const resetImage = accountUserImage.src;
    fileInput.onchange = () => {
    if (fileInput.files[0]) {
    accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
    }
    };
    resetFileInput.onclick = () => {
    fileInput.value = '';
    accountUserImage.src = resetImage;
    };
    }
    })();
    });
</script>
@endpush