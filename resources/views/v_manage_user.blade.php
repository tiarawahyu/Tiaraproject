@extends('page_template/dashboard_template')
@section('judul_halaman', 'Manage Pegawai')
@section('judul_content')
    <a class="btn btn-primary btn-sm" href="{{ route('form_add_user') }}">
        <i class="fas fa-plus-square">&nbsp;&nbsp;</i>Add Pegawai
    </a>
@endsection
@section('isi_content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Management Pegawai</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        @foreach ($datauser as $user)
                            <tr>
                                <td style="vertical-align: middle">{{ $count }}</td>
                                <td style="vertical-align: middle">{{ $user->username }}</td>
                                <td style="vertical-align: middle">{{ $user->nama }}</td>
                                <td style="vertical-align: middle">
                                    @if ($user->gender == 1)
                                        Laki-Laki
                                    @else
                                        Perempuan
                                    @endif
                                </td>
                                <td style="vertical-align: middle">{{ $user->email }}</td>
                                <td style="vertical-align: middle">{{ $user->level }}</td>
                                <td style="vertical-align: middle">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info">Action</button>
                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                            data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">:</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu" style="">
                                            <div class="dropdown-item">
                                                <form id="formedit{{ $user->id }}"
                                                    action="{{ route('form_edit_user') }}" method="post"
                                                    style="display: inline">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <a class="btn btn-warning btn-sm" href="javascript:{}"
                                                        onclick="document.getElementById('formedit{{ $user->id }}').submit();">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>
                                                </form>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="dropdown-item">
                                                <form id="detail{{ $user->id }}"
                                                    action="{{ route('detail_pegawai') }}" method="post"
                                                    style="display: inline">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <a class="btn btn-secondary btn-sm" href="javascript:{}"
                                                        onclick="document.getElementById('detail{{ $user->id }}').submit();">
                                                        <i class="fas fa-pencil-alt"></i> Detail
                                                    </a>
                                                </form>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="dropdown-item">
                                                <form action="{{ route('delete_user') }}" method="post"
                                                    style="display: inline">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <a class="btn btn-danger btn-hapus btn-sm">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </a>
                                                </form>
                                            </div>
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
