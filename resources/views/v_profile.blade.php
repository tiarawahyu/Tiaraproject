@extends('page_template/dashboard_template')
@section('judul_halaman','Profile')
@section('judul_content')
    <h3>Profile</h3>
@endsection
@section('isi_content')
<div class="col-md-9">
    <div class="card">
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <h3>Profile</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <tbody>
                            <tr>
                                @if ($datauser->gender == 1)
                                    <td colspan="2"><img src="{{asset('img/male.png')}}" alt="profil picture" width="25%"></td>
                                @else
                                    <td colspan="2"><img src="{{asset('img/female.png')}}" alt="profil picture" width="25%"></td>
                                @endif                                    
                            </tr>
                            <tr>
                                <td style="width: 13%">Nama</td>
                                <td style="width: 87%">{{ $datauser->nama }}</td>
                            </tr>
                            <tr>
                                <td>NIK / Username</td>
                                <td>{{ $datauser->username }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                @if ($datauser->gender == 1)
                                    <td>Laki-Laki</td>
                                @else
                                    <td>Perempuan</td>
                                @endif
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $datauser->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    &nbsp;
                </div>
            </div>
        </div>
    </div>
</div>

@endsection