@extends('layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-start">
                    Halaman untuk mengatur biaya Transportasi Darat
                </div>
                <div class="add my-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="bx bx-plus-circle"></i> Tambah Biaya Transportasi Darat</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table id="table" class="table table-bordered table-hover">
                        <caption class="ms-4">

                        </caption>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Provinsi</th>
                                <th>Ibu Kota</th>
                                <th>Kota Tujuan</th>
                                <th>Besaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($biaya as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->r_provinsi->nama_provinsi }}</td>
                                <td>
                                    {{ $item->ibu_kota_provinsi }}
                                </td>
                                <td>
                                    {{ $item->kota }}
                                </td>
                                <td>
                                    Rp. {{ number_format($item->besaran) }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-warning p-1 m-2 dropdown-toggle hide-arrow" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">
                                            <i class="bx bx-edit-alt"></i> Edit
                                        </button>
                                        <button type="button" class="btn btn-danger p-1 m-2 dropdown-toggle hide-arrow" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $item->id }}">
                                            <i class="bx bx-trash"></i> Delete
                                        </button>
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
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddTitle">Tambah Biaya Transportasi Darat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('biayaTransportasiDarat.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="nama_provinsi" class="form-label">Pilih provinsi</label>
                            <select id="provinsi" class="form-select @error('nama_provinsi') is-invalid @enderror" name="nama_provinsi" required style="width: 100%">

                            </select>
                            @error('nama_provinsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="ibu_kota_provinsi" class="form-label">Ibu Kota Provinsi</label>
                            <select id="kota" class="form-select @error('ibu_kota_provinsi') is-invalid @enderror" name="ibu_kota_provinsi" required style="width: 100%">
                                <option value="" class="text-capitalize">--Pilih Kabupaten/Kota--</option>
                            </select>
                            @error('ibu_kota_provinsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="kota" class="form-label">Kota Tujuan</label>
                            <select id="kota2" class="form-select @error('kota') is-invalid @enderror" name="kota" required style="width: 100%">
                                <option value="" class="text-capitalize">--Pilih Kabupaten/Kota--</option>
                            </select>
                            @error('kota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="besaran" class="form-label">Besaran</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">Rp</span>
                                <input type="number" min="0" class="form-control @error('besaran') is-invalid @enderror" name="besaran">
                                @error('besaran')
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
@foreach ($biaya as $item)
<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditTitle">Edit Biaya <strong>{{ $item->ibu_kota_provinsi }}</strong> ke <strong>{{ $item->kota }}</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('biayaTransportasiDarat.update',$item->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4 mb-3">
                            <label for="nama_provinsi" class="form-label">Nama Provinsi</label>
                            <input class="form-control @error('nama_provinsi') is-invalid @enderror" type="text" id="nama_provinsi" name="nama_provinsi" value="{{ $item->r_provinsi->nama_provinsi }}" readonly />
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="nama_provinsi" class="form-label">Nama Provinsi</label>
                            <input class="form-control @error('nama_provinsi') is-invalid @enderror" type="text" id="nama_provinsi" name="nama_provinsi" value="{{ $item->ibu_kota_provinsi }}" readonly />
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="kota" class="form-label">Kota Tujuan</label>
                            <input class="form-control @error('kota') is-invalid @enderror" type="text" id="kota" name="kota" value="{{ $item->kota }}" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="besaran" class="form-label">Besaran</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">Rp</span>
                                <input type="number" min="0" class="form-control @error('besaran') is-invalid @enderror" name="besaran" value="{{ $item->besaran }}">
                                @error('besaran')
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
                <h5 class="modal-title" id="modalDeleteTitle">Delete Biaya Transportasi Darat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('biayaTransportasiDarat.destroy', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Apakah anda yakin ingin menghapus data biaya Transportasi Darat</h4>
                                <p>dari <strong>{{ $item->ibu_kota_provinsi }}</strong> ke <strong>{{ $item->kota }}</strong> ?</p>
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

    // Dropdown
    $(document).ready(function() {
        $('#provinsi').select2({
            dropdownParent: $('#modalAdd'),
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
                dropdownParent: $('#modalAdd'),
                placeholder:'--Pilih Kabupaten/Kota--',
                ajax : {
                    url: "{{ url('selectCity') }}/"+ id,
                    processResults: function(data){
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.nama_kota,
                                    text: item.nama_kota
                                }
                            })
                        }
                    }
                }
            });

            $('#kota2').select2({
                dropdownParent: $('#modalAdd'),
                placeholder:'--Pilih Kabupaten/Kota--',
                ajax : {
                    url: "{{ url('selectCity') }}/"+ id,
                    processResults: function(data){
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.nama_kota,
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