@extends('layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-xl-4 col-lg-5 col-md-5">
        <!-- About User -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-center mb-4">
                    @if (Auth::user()->image)
                    <img src="{{ asset('storage/'. Auth::user()->image) }}" alt="user-avatar" class="rounded shadow" height="150" width="150" />
                    @else
                    <img src="{{ asset('storage/profile-image/default-image.png') }}" alt="user-avatar" class="rounded shadow" height="150" width="150" />
                    @endif
                </div>
                <small class="text-muted text-uppercase">About</small>
                <ul class="list-unstyled mb-4 mt-3">
                    <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span class="mx-2">Nama:</span> <span class="fw-semibold">{{ Auth::user()->name }}</span></li>
                    <li class="d-flex align-items-center mb-3"><i class="bx bx-briefcase-alt"></i><span class="mx-2">Jabatan:</span> <span class="fw-semibold">{{ Auth::user()->jabatan->jabatan_name }}</span></li>
                    <li class="d-flex align-items-center mb-3"><i class="bx bx-briefcase"></i><span class="mx-2">Golongan:</span> <span class="fw-semibold">{{ Auth::user()->golongan->golongan_name }}</span></li>
                    <li class="d-flex align-items-center mb-3"><i class="bx bx-id-card"></i><span class="mx-2">NIP:</span> <span class="fw-semibold">{{ Auth::user()->nip }}</span></li>
                    <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span class="mx-2">Role:</span> <span class="fw-semibold text-capitalize">{{ Auth::user()->role }}</span></li>
                </ul>
                <small class="text-muted text-uppercase">Contacts</small>
                <ul class="list-unstyled mt-3">
                    <li class="d-flex align-items-center mb-3"><i class="bx bx-phone"></i><span class="mx-2">Kontak:</span> <span class="fw-semibold">{{ Auth::user()->contact }}</span></li>
                    <li class="d-flex align-items-center mb-3"><i class="bx bx-envelope"></i><span class="mx-2">Email:</span> <span class="fw-semibold">{{ Auth::user()->email }}</span></li>
                    <li class="d-flex align-items-center mb-3"><i class="bx bx-home"></i><span class="mx-2">Alamat:</span></li>
                    <span class="fw-semibold">{{ Auth::user()->address }}</span>
                </ul>
            </div>
        </div>
        <!--/ About User -->
    </div>
    <div class="col-xl-8 col-lg-7 col-md-7">
        <!-- Edit Profile -->
        <div class="card card-action mb-4">
            <div class="card-header align-items-center">
                <h4 class="card-action-title mb-0"><i class='bx bx-edit'></i> Edit Profile</h4>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    @if (Auth::user()->image)
                    <img src="{{ asset('storage/'. Auth::user()->image) }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                    @else
                    <img src="{{ asset('storage/profile-image/default-image.png') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                    @endif
                    <div class="button-wrapper">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" class="account-file-input @error('image') is-invalid @enderror" id="upload" name="image" accept="image/png, image/jpeg" hidden>
                            </label>
                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 1MB</p>
                    </div>
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Nama</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ Auth::user()->name }}" />
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" value="{{ Auth::user()->email }}" />
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="nip" class="form-label">nip</label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ Auth::user()->nip }}" />
                        @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="contact" class="form-label">No. HP</label>
                        <input type="number" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ Auth::user()->contact }}" />
                        @error('contact')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ Auth::user()->address }}" />
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="jabatan_id" class="form-label">Jabatan</label>
                        <input class="form-control" type="text" name="jabatan_id" id="jabatan_id" value="{{ Auth::user()->jabatan->jabatan_name }}" readonly />
                        <div class="form-text">Hanya dapat dirubah oleh Admin</div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" class="form-control text-capitalize" id="role" name="role" value="{{ Auth::user()->role }}" readonly />
                        <div class="form-text">Hanya dapat dirubah oleh Admin</div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="golongan" class="form-label">golongan</label>
                        <input type="text" class="form-control text-capitalize" id="golongan" name="golongan" value="{{ Auth::user()->golongan->golongan_name }}" readonly />
                        <div class="form-text">Hanya dapat dirubah oleh Admin</div>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
                </form>
            </div>
        </div>
        <!--/ Edit Profile -->
    </div>
</div>
<!--/ User Profile Content -->
@endsection
@push('scripts')
<script>
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