@extends('page_template/dashboard_template')
@section('judul_halaman', 'Detail Data Pegawai')
@section('judul_content')
@endsection
@section('isi_content')
    <div class="col-md-6">
        <div class="card card">
            <div class="card-header">
                <h3>Detail Pegawai</h3>
            </div>
            {{-- menampilkan detail data by id --}}
            <table class="table table-hover text-nowrap">
                <tbody>
                    <tr>
                        <td style="width: 13%">Nama </td>
                        <td style="width: 87%">: {{ $datauser[0]->nama }}</td>
                    </tr>
                    <tr>
                        <td style="width: 13%">NIP </td>
                        <td style="width: 87%">: {{ $datauser[0]->nip }}</td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>: {{ $datauser[0]->username }}</td>
                    </tr>
                    <tr>
                        <td style="width: 13%">Jabatan</td>
                        <td style="width: 87%">: {{ $datauser[0]->jabatan }}</td>
                    </tr>
                    <tr>
                        <td style="width: 13%">Unit Kerja</td>
                        <td style="width: 87%">: {{ $datauser[0]->unit_kerja }}</td>
                    </tr>
                    <tr>
                        <td style="width: 13%">Pendidikan</td>
                        <td style="width: 87%">: {{ $datauser[0]->pendidikan }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        @if ($datauser[0]->gender == 1)
                            <td>Laki-Laki</td>
                        @else
                            <td>Perempuan</td>
                        @endif
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: {{ $datauser[0]->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- Jumlah jam --}}
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3>Jumlah Jam Pelajaran (Dalam JP)</h3>
            </div>
            <div class="card-body">
                {{-- isi content --}}
            </div>
            <div class="card-footer">
                &nbsp;
            </div>
        </div>
    </div>

    {{-- table kompetensi --}}
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Daftar Data Pengembangan Kompetensi</h3>
            </div>
            <div class="card-body">
                <div>
                    <a class="btn btn-primary btn-sm" href="{{ route('add_kompetensi') }}">
                        <i class="fas fa-plus-square">&nbsp;&nbsp;</i>Tambah Kompetensi
                    </a>
                </div>
                <br />
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Diklat</th>
                            <th>Jenis</th>
                            <th>JP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>

                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>
            <div class="card-footer">
                &nbsp;
            </div>
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
