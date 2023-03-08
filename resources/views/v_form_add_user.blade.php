@extends('page_template/dashboard_template')
@section('judul_halaman', 'Add User')
@section('judul_content')
    <h3>Silakan mengisi form berikut untuk menambah user</h3>
@endsection
@section('isi_content')
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Add User</h3>
            </div>
            <form method="post" action="{{ route('process_add_user') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                    </div>
                    @error('username')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                    </div>
                    @error('nama')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="nip" class="form-control" value="{{ old('nip') }}" required>
                    </div>
                    @error('nip')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}" required>
                    </div>
                    @error('jabatan')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Unit Kerja</label>
                        <input type="text" name="unit_kerja" class="form-control" value="{{ old('unit_kerja') }}"
                            required>
                    </div>
                    @error('unit_kerja')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Pendidikan</label>
                        <input type="text" name="pendidikan" class="form-control" value="{{ old('pendidikan') }}"
                            required>
                    </div>
                    @error('pendidikan')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="gender" class="form-control">
                            <option value="1">Laki-Laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                    @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label>User Level</label>
                        <select name="level" class="custom-select rounded-0">
                            @foreach ($leveluser as $userlevel)
                                <option value="{{ $userlevel->id }}">Level {{ $userlevel->id }} : {{ $userlevel->level }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password <span style="color:red; font-style: italic; font-weight: bold;"> -- default :
                                Dinsosoke!</span> </label>
                        <input type="password" name="password" class="form-control" value="Dinsosoke!"
                            placeholder="Password" required disabled>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" value="Dinsosoke!"
                            placeholder="Confirm Password" required disabled>
                    </div>
                    @error('password')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
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
