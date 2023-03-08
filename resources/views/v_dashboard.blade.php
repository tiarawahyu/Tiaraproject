@extends('page_template/dashboard_template')
@section('judul_halaman', 'Dashboard')
@section('judul_content', 'PENGEMBANGAN KOMPETENSI ASN DINAS SOSIAL PROVINSI JAWA TENGAH')
@section('isi_content')
    <!-- ANIMASI Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="an  imation__shake" src="{{ asset('img/logo_jateng.png') }}" alt="AdminLTELogo" height="60"
            width="60">
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Jumlah Aparatur Sipil Negara</h3>
            <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            GRAFIK
            <div style="width: 50%">
                {{-- {!! $userChart->container() !!} --}}
            </div>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer -->
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">PENGEMBANG KOMPETENSI</h3>
            <div class="card-tools">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            GRAFIK
            <div style="width: 50%">
                <div class="card-body">
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="areaChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 438px;"
                            width="438" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer -->
    </div>

@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../plugins/chart.js/Chart.min.js"></script>

    {{-- {!! $usersChart->script() !!}   --}}
@endsection

@section('script_js')

    <!-- SWEET ALERT -->
    @if (session('pesan_info'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            })

            Toast.fire({
                icon: 'info',
                title: "Welcome,<br/> {!! session('pesan_info') !!}",
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

@endsection
