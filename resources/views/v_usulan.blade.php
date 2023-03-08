@extends('page_template/dashboard_template')
@section('judul_halaman', 'Usulan Pengembangan Kompetensi')
@section('judul_content')
@endsection
@section('isi_content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Usulan Pengembangan Kompetensi</h3>
            </div>
            {{-- input usulan --}}
            <div class="card-body">
                <form method="post" action="{{ route('process_add_usulan') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Input Usulan</label>
                            <input type="text" name="usulan" class="form-control" value="{{ old('usulan') }}" required>
                        </div>
                        @error('usulan')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-warning" href="{{ route('usulan') }}">Batal</a>
                    </div>
                </form>
            </div>

            {{-- tampil usulan --}}
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Usulan Pengembangan Kompetensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($datausulan as $usulan)
                            <tr>
                                <td style="vertical-align: middle">{{ $count }}</td>
                                <td style="vertical-align: middle">{{ $usulan->usulan }}</td>
                                <td style="vertical-align: middle">
                                    <div class="btn-group">
                                        <div class="dropdown-item">
                                            <form action="{{ route('delete_usulan') }}" method="post"
                                                style="display: inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $usulan->id }}">
                                                <a class="btn btn-danger btn-hapus btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $count++; ?>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Unit Kerja</th>
                            <th>Pendidikan</th>
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

    {{-- sweetalert popup --}}
    @if (session('pesan_status'))
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

    {{-- template sweetalert hapus --}}
    <template id="swal-confirm-template">
        <swal-icon type="warning" color="red"></swal-icon>
        <swal-title><b>WARNING !!</b></swal-title>
        <swal-html>Apakah yakin akan menghapus data user yang dipilih ?</swal-html>
        <swal-button type="confirm" color="red">Ya, hapus</swal-button>
        <swal-button type="cancel">Batal</swal-button>
        <swal-param name="allowEscapeKey" value="false" />
        <swal-param name="customClass" value='{ "popup": "my-popup" }' />
    </template>

    {{-- sweetalert hapus --}}
    <script>
        $('.btn-hapus').on('click', function(event) {
            event.preventDefault();
            let $form = $(this).closest('form');
            $x = Swal.fire({
                position: 'top',
                template: '#swal-confirm-template'
            }).then((result) => {
                if (result.isConfirmed) {
                    $form.submit();
                }
            });
        })
    </script>

    {{-- DataTables --}}
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "bInfo": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection
