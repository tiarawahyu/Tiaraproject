@extends('page_template/dashboard_template')
@section('judul_halaman', 'Add Kompetensi')
@section('judul_content')
    <h3>Silakan mengisi form berikut untuk menambah kompetensi</h3>
@endsection
@section('isi_content')
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Add Kompetensi</h3>
            </div>
            <form method="post" action="{{ route('proses_add_kompetensi') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="number" name="nip" class="form-control" value="{{ old('nip') }}" required>
                    </div>
                    @error('nip')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Nama Pelatihan</label>
                        <input type="text" name="nama_kompetensi" class="form-control"
                            value="{{ old('nama_kompetensi') }}" required>
                    </div>
                    @error('nama_kompetensi')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Jenis Pelatihan</label>
                        <input type="text" name="jenis_pelatihan" class="form-control"
                            value="{{ old('jenis_pelatihan') }}" required>
                    </div>
                    @error('jenis_pelatihan')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Waktu Pelatihan</label>
                        <input type="time" name="waktu" class="form-control" value="{{ old('waktu') }}" required>
                    </div>
                    @error('waktu')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Penyelenggara Pelatihan</label>
                        <input type="text" name="penyelenggara" class="form-control" value="{{ old('penyelenggara') }}"
                            required>
                    </div>
                    @error('penyelenggara')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Jumlah Jam Pelatihan</label>
                        <input type="text" name="jumlah_jam" class="form-control" value="{{ old('jumlah_jam') }}"
                            required>
                    </div>
                    @error('jumlah_jam')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>No Sertifikat Pelatihan</label>
                        <input type="number" name="no_sertifikat" class="form-control" value="{{ old('no_sertifikat') }}"
                            required>
                    </div>
                    @error('no_sertifikat')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-warning" href="{{ route('manageuser') }}">Batal</a>
                    </div>
            </form>
        </div>
    </div>

@endsection
@section('script_js')

    <!-- SWEET ALERT -->
    @if (session('pesan_error'))
        <script>
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: 'Oops...',
                text: "{!! session('pesan_error') !!}"
            })
        </script>
    @endif

@endsection
