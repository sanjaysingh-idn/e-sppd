@extends('layouts.main')

@section('content')
<div class="row">
    <h2 class="fw-bold"><span class="text-muted fw-light py-5"></span> {{ $title }}</h2>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-start">
                    Halaman untuk mengatur biaya Tiket Pesawat
                </div>
                <div class="add my-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd"><i class="bx bx-plus-circle"></i> Tambah Biaya Tiket Pesawat</button>
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
                                <th>Kota Asal</th>
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
                                <td>
                                    {{ $item->asal }}
                                </td>
                                <td>
                                    {{ $item->tujuan }}
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
                <h5 class="modal-title" id="modalAddTitle">Tambah Biaya Tiket Pesawat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('biayaTiketPesawat.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="asal" class="form-label">Kota Asal</label>
                            <select class="form-select @error('asal') is-invalid @enderror" name="asal" required style="width: 100%">
                                @foreach ($kota as $item)
                                <option value="{{ $item->nama_kota }}" class="text-capitalize">{{ $item->nama_kota }}</option>
                                @endforeach
                            </select>
                            @error('asal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="tujuan" class="form-label">Kota Tujuan</label>
                            <select class="form-select @error('tujuan') is-invalid @enderror" name="tujuan" required style="width: 100%">
                                @foreach ($kota as $item)
                                <option value="{{ $item->nama_kota }}" class="text-capitalize">{{ $item->nama_kota }}</option>
                                @endforeach
                            </select>
                            @error('tujuan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
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
                <h5 class="modal-title" id="modalEditTitle">Edit Biaya Pesawat <strong>{{ $item->asal }}</strong> ke <strong>{{ $item->tujuan }}</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('biayaTiketPesawat.update',$item->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="asal" class="form-label">Kota Asal</label>
                            <input class="form-control @error('asal') is-invalid @enderror" type="text" id="asal" name="asal" value="{{ $item->asal }}" readonly />
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="tujuan" class="form-label">Kota Tujuan</label>
                            <input class="form-control @error('tujuan') is-invalid @enderror" type="text" id="tujuan" name="tujuan" value="{{ $item->tujuan }}" readonly />
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
                <h5 class="modal-title" id="modalDeleteTitle">Delete Biaya Tiket Pesawat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('biayaTiketPesawat.destroy', $item->id) }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Apakah anda yakin ingin menghapus data biaya Tiket Pesawat</h4>
                                <p>dari <strong>{{ $item->asal }}</strong> ke <strong>{{ $item->tujuan }}</strong> ?</p>
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