@extends('page_template/dashboard_template')
@section('judul_halaman', 'Diklat Kepemimpinan')
@section('judul_content')
@endsection
@section('isi_content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Diklat Teknis</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Diklat</th>
                            <th>Nama Pegawai</th>
                            <th>Unit Kerja</th>
                            <th>JP</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
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
