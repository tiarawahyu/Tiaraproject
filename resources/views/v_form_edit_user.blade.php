@extends('page_template/dashboard_template')
@section('judul_halaman', 'Edit Data User')
@section('judul_content')
    <h3>Silakan mengisi form berikut untuk update data user</h3>
@endsection
@section('isi_content')
    <div class="col-md-6">
        <div class="card card">
            <div class="card-header">
                <h3>Form Edit User</h3>
            </div>
            <form action="{{ route('process_edit_user') }}" method="POST">
                <input type="hidden" name="iduser" value="{{ $datauser[0]->id }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="{{ $datauser[0]->username }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $datauser[0]->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="number" name="nip" class="form-control" value="{{ $datauser[0]->nip }}" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" value="{{ $datauser[0]->jabatan }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Unit Kerja</label>
                        <input type="text" name="unit_kerja" class="form-control" value="{{ $datauser[0]->unit_kerja }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Pendidikan</label>
                        <input type="text" name="pendidikan" class="form-control" value="{{ $datauser[0]->pendidikan }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" value="{{ $datauser[0]->email }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="gender" class="form-control">
                            <option value="1">Laki-Laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>User Level</label>
                        <select name="level" class="custom-select rounded-0" required>
                            <option value="{{ $datauser[0]->level }}" selected>Level {{ $datauser[0]->level }}</option>
                            <option value="">...</option>
                            @foreach ($leveluser as $userlevel)
                                <option value="{{ $userlevel->id }}">Level {{ $userlevel->id }} : {{ $userlevel->level }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
