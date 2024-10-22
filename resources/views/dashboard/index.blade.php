@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="{{ Auth::user()->role == 'siswa' ? 'col-md-12' : 'col-md-6' }}">
            <div class="card" style="min-height: 350px !important;">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">post_add</i>
                    </div>
                    <h4 class="card-title">Ppdb Terbaru</h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NISN</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!is_null($ppdb))
                                            @foreach ($ppdb as $pengajuan1)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $pengajuan1->name }}</td>
                                                    <td class="text-capitalize">{{ $pengajuan1->nisn }}</td>
                                                    <td> {{ $pengajuan1->alamat }} </td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <td colspan="7" class="text-center">Data Not Found</td>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @canany('role', ['admin', 'panitia'])
            <div class="col-md-6">
                <div class="row">
                    @canany('role', ['admin'])
                        <div class="col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon" style="padding: 5px !important;">
                                        <i class="material-icons">person</i>
                                    </div>
                                    <p class="card-category">Admins</p>
                                    <h3 class="card-title">{{ $admin }}</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">person</i>
                                        <a href="/dashboard/admin">Lihat semua..</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcanany
                    <div class="col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon" style="padding: 5px !important;">
                                    <i class="material-icons">group</i>
                                </div>
                                <p class="card-category">Siswa</p>
                                <h3 class="card-title">{{ $siswa }}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">group</i>
                                    <a href="/dashboard/siswa">Lihat semua..</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon" style="padding: 5px !important;">
                                <i class="material-icons">post_add</i>
                            </div>
                            <p class="card-category">Pengajuan</p>
                            <h3 class="card-title">{{ $pengajuan }}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">post_add</i>
                                <a href="/dashboard/pengajuan">Lihat semua..</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                    <div class="col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-primary card-header-icon">
                                <div class="card-icon" style="padding: 5px !important;">
                                    <i class="material-icons">request_quote</i>
                                </div>
                                <p class="card-category">Total Panitia</p>
                                <h3 class="card-title">{{ $panitia }}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">request_quote</i>
                                    <a href="/dashboard/panitia">Lihat semua..</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon" style="padding: 5px !important;">
                                    <i class="material-icons">dashboard_customize</i>
                                </div>
                                <p class="card-category">Total Konten</p>
                                <h3 class="card-title">{{ $post }}</h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">dashboard_customize</i>
                                    <a href="/dashboard/posts">Lihat semua..</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcanany
    </div>
@endsection
