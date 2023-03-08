@extends('page_template/dashboard_template')
@section('judul_halaman','Edit Data User')
@section('judul_content')
    <h3>Silakan mengisi form berikut untuk mengganti password</h3>
@endsection
@section('isi_content')
<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            <h3>Form Ganti Password</h3>
        </div>
        <form action="{{route('process_ubah_password')}}" method="POST">
            @csrf
            <input type="hidden" name="iduser" value="{{session()->get('iduser')}}">
            <div class="card-body">
                <div class="form-group">
                    <label>Password Saat ini</label>
                    <input type="password" name="current_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                @error('password')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ubah Password</button>
                <a class="btn btn-warning" href="{{ url()->previous() }}">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script_js')

<!-- SWEET ALERT -->
@if(session('pesan_status'))
    <script>
        Swal.fire({
            position: 'top',
            icon: 'info',
            text: "{!! session('pesan_status') !!}",
            timer: 3500,
            timerProgressBar: true
        })
    </script>
    @endif
@if(session('pesan_error'))
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