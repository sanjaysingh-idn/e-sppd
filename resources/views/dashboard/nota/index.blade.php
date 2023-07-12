@extends('layouts.main')

@section('content')
<div class="row">
    @if ($errors->any())
    @dd($errors){{-- for check error bag --}}
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h2 class="fw-bold"><span class="text-muted fw-light py-5">{{ $title }}</span> | </h2>
    <div class="row">
        <div class="col mb-3">
            <a href="/spd" class="btn btn-secondary"><i class="bx bx-left-arrow"></i> Kembali</a>
        </div>
    </div>
    <div class="col-12">
        <div class="card card-action mb-4">
            <div class="card-header align-items-center">
                <h4 class="card-action-title mb-0">PERMINTAAN SPD</h4>
            </div>
            <hr>
            <div class="card-body">
                <div class="row text-dark">
                    <div class="col-6">
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama</td>
                                <td>{{ $permintaan->nama }}</td>
                            </tr>
                            <tr>
                                <td>Nip</td>
                                <td>{{ $permintaan->nip }}</td>
                            </tr>
                            <tr>
                                <td>Golongan</td>
                                <td>{{ $permintaan->golongan }}</td>
                            </tr>
                            <tr>
                                <td>Tujuan</td>
                                <td>{{ $permintaan->r_kota->nama_kota }} ({{ $permintaan->r_provinsi->nama_provinsi }})</td>
                            </tr>
                            <tr>
                                <td>Lama</td>
                                <td>{{ $permintaan->lama }} Hari</td>
                            </tr>
                            <tr>
                                <td>Malam</td>
                                <td>{{ $permintaan->malam}} Malam</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <table class="table table-borderless">
                            <tr>
                                <td>Biaya Taksi</td>
                                <td>Rp. {{ number_format($permintaan->biaya_taksi) }}</td>
                            </tr>
                            <tr>
                                <td>Biaya Penginapan</td>
                                <td>Rp. {{ number_format($permintaan->jumlah_biaya_penginapan) }}</td>
                            </tr>
                            <tr>
                                <td>Tiket Pesawat</td>
                                <td>Rp. {{ number_format($permintaan->tiket_pesawat) }}</td>
                            </tr>
                            <tr>
                                <td>Uang Harian</td>
                                <td>Rp. {{ number_format($permintaan->jumlah_uang_harian) }}</td>
                            </tr>
                            <tr>
                                <td>Uang Representasi</td>
                                <td>Rp. {{ number_format($permintaan->jumlah_uang_representasi) }}</td>
                            </tr>
                            <tr class="fw-bold">
                                <td>TOTAL</td>
                                <td>Rp. {{ number_format($permintaan->jumlah) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-5 col-md-5">
        <div class="card mb-4">
            <form action="{{ route('add_nota') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" value="{{ $permintaan->id }}" name="permintaan_id" hidden>
                <div class="card-body">
                    <div class="label">
                        <label for="kode_spd" class="form-label">Foto Nota</label>
                    </div>
                    <img id="preview" width="200" class="img-thumbnail mb-3">
                    <label for="fileInput" class="btn btn-warning me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Upload Foto Nota</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input type="file" class="account-file-input @error('foto_nota') is-invalid @enderror" id="fileInput" name="foto_nota" accept="image/png, image/jpeg" hidden onchange="previewImage()">
                    </label>
                    <button type="button" value="Reset" onclick="resetImage()" class="btn btn-outline-warning account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>
                    @error('foto_nota')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <p class="text-muted mb-0">Format JPG, PNG, JPEG, PDF Ukuran Max 2MB</p>s
                    <hr>
                    <label for="ket_nota" class="form-label">Keterangan Nota</label>
                    <input class="form-control @error('ket_nota') is-invalid @enderror" type="text" id="ket_nota" name="ket_nota" value="{{ old('ket_nota') }}" autofocus required />
                    @error('ket_nota')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary me-2">Simpan Nota</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-xl-8 col-lg-7 col-md-7">
        <div class="card card-action mb-4">
            <div class="card-header align-items-center">
                <h4 class="card-action-title mb-0"><i class='bx bxs-file-image'></i>Daftar Nota</h4>
            </div>
            <div class="card-body">
                @foreach ($nota as $item)
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->ket_nota }}</h5>
                            <h6 class="card-subtitle text-muted">{{ $item->created_at }}</h6>
                        </div>
                        <img class="img-fluid" src="{{ asset('storage/'. $item->foto_nota) }}" alt="Card image cap">
                    </div>
                </div>
                @endforeach
            </div>
            <hr class="my-0" />
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    function previewImage() {
        // Get the preview image element and the file input element
        var preview = document.getElementById("preview");
        var fileInput = document.getElementById("fileInput");
    
        // Check if a file was selected
        if (fileInput.files && fileInput.files[0]) {
        // Create a new FileReader object
        var reader = new FileReader();
    
        // Set the onload function for the reader
        reader.onload = function(e) {
        // Set the src attribute of the preview image to the result of the reader
        preview.setAttribute("src", e.target.result);
        };
    
        // Read the selected file as a data URL
        reader.readAsDataURL(fileInput.files[0]);
        } else {
            // If no file was selected, clear the preview image
            preview.setAttribute("src", "");
            }
        }
    
    function resetImage() {
        // Get the preview image element and the file input element
        var preview = document.getElementById("preview");
        var fileInput = document.getElementById("fileInput");
    
        // Clear the file input value and the preview image
        fileInput.value = "";
        preview.setAttribute("src", "");
    }
</script>
@endpush