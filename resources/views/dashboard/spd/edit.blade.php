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
                <div class="button-wrapper">
                    <form action="{{ route('spd.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="alert alert-warning" role="alert">
                            <strong>Hiraukan</strong> jika tidak ada surat undangan
                        </div>
                        <div class="">
                            <label for="kode_spd" class="form-label">Surat Undangan</label>
                        </div>
                        <img src="{{ asset('storage/'. $spd->undangan) }}" class="img-thumbnail" width="200" frameborder="0">
                        <img id="preview" width="200" class="img-thumbnail mb-3">
                        <label for="fileInput" class="btn btn-warning me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload Surat Undangan</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" class="account-file-input @error('undangan') is-invalid @enderror" id="fileInput" name="undangan" accept="image/png, image/jpeg" hidden onchange="previewImage()">
                        </label>
                        <button type="button" value="Reset" onclick="resetImage()" class="btn btn-outline-warning account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                        @error('undangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <p class="text-muted mb-0">Format JPG, PNG, JPEG, PDF Ukuran Max 2MB</p>
                </div>
            </div>
        </div>
        <hr class="my-0" />
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-md-5">
                    <label for="kode_spd" class="form-label">kode spd</label>
                    <input class="form-control @error('kode_spd') is-invalid @enderror" type="text" id="kode_spd" name="kode_spd" value="{{ $spd->kode_spd }}" autofocus />
                    @error('kode_spd')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-4">
                    <label for="jenis_perjalanan" class="form-label">jenis perjalanan</label><br>
                    <div class="btn-group" role="group">
                        @foreach ($jenis_perjalanan as $jp)
                        <input type="radio" class="btn-check" name="jenis_perjalanan" value="{{ $jp }}" id="{{ $jp }}" autocomplete="off" {{ ($jp == $spd->jenis_perjalanan ? 'checked' : '')}}>
                        <label class="btn btn-outline-primary text-capitalize" for="{{ $jp }}">{{ $jp }}</label>
                        @endforeach
                    </div>
                    @error('jenis_perjalanan')
                    <br>
                    <div class="text-small text-danger mt-1">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-3">
                    <label for="jenis_transportasi" class="form-label">jenis Transportasi</label><br>
                    <div class="btn-group" role="group">
                        @foreach ($jenis_transportasi as $jt)
                        <input type="radio" class="btn-check" name="jenis_transportasi" value="{{ $jt }}" id="{{ $jt }}" autocomplete="off" {{ ($jt == $spd->jenis_transportasi ? 'checked' : '')}}>
                        <label class="btn btn-outline-warning text-capitalize" for="{{ $jt }}">{{ $jt }}</label>
                        @endforeach
                    </div>
                    @error('jenis_transportasi')
                    <br>
                    <div class="text-small text-danger mt-1">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-12">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="provinsi" class="form-label">provinsi</label>
                            <select id="provinsi" class="form-select @error('provinsi') is-invalid @enderror" name="provinsi" required>

                            </select>
                            @error('provinsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="kota" class="form-label">Kota</label>
                            <select id="kota" class="form-select @error('kota') is-invalid @enderror" name="kota" required>
                                <option value="" class="text-capitalize">--Pilih Kabupaten/Kota--</option>
                            </select>
                            @error('kota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-12">
                    <label for="maksud" class="form-label">Maksud</label>
                    <textarea class="form-control @error('maksud') is-invalid @enderror" type="text" id="maksud" name="maksud" />{{ $spd->maksud }}</textarea>
                    @error('maksud')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3 col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="mb-3 col-sm-6">
                                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                    <input class="form-control @error('tanggal_mulai') is-invalid @enderror" type="date" id="tanggal_mulai" name="tanggal_mulai" min="{{ date('Y-m-d') }}" value="{{ $spd->tanggal_mulai }}" />
                                    @error('tanggal_mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="tanggal_pulang" class="form-label">Tanggal Pulang</label>
                                    <input class="form-control @error('tanggal_pulang') is-invalid @enderror" type="date" id="tanggal_pulang" name="tanggal_pulang" min="{{ date('Y-m-d') }}" value="{{ $spd->tanggal_pulang }}" />
                                    @error('tanggal_pulang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="mb-3 col-sm-6">
                                    <label for="lama" class="form-label">hari</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control @error('lama') is-invalid @enderror" placeholder="2" aria-label="1" name="lama" value="{{ $spd->lama }}">
                                        <span class="input-group-text" id="basic-addon13">hari</span>
                                        @error('lama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label for="malam" class="form-label">malam</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control @error('malam') is-invalid @enderror" placeholder="1" aria-label="1" name="malam" value="{{ $spd->malam }}">
                                        <span class="input-group-text" id="basic-addon13">Malam</span>
                                        @error('malam')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2"><i class="bx bx-send"></i> Kirim</button>
            </div>
            </form>
        </div>
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

    // Dropdown
    $(document).ready(function() {
        $('#provinsi').select2({
            placeholder:'--Pilih Provinsi--',
            ajax : {
                url: "{{ route('selectProv') }}",
                processResults: function(data){
                    // console.log($data)
                    return {
                        results: $.map(data, function(item){
                            return {
                                id: item.id,
                                text: item.nama_provinsi
                            }
                        })
                    }
                }
            }
        });

        $('#provinsi').change(function(){
            let id = $('#provinsi').val();

            $('#kota').select2({
                placeholder:'--Pilih Kabupaten/Kota--',
                ajax : {
                    url: "{{ url('selectCity') }}/"+ id,
                    processResults: function(data){
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.city_id,
                                    text: item.nama_kota
                                }
                            })
                        }
                    }
                }
            });
        })
    });
</script>
@endpush