@extends('dashboard.layouts.main')

@section('container')
    @can('role', ['admin', 'panitia', 'siswa'])
        <div class="row">

            <div class="col-md-12" style="padding: 0px 0px !important">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">
                                post_add
                            </i>
                        </div>
                        <h4 class="card-title">Ppdb</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar text-center">
                            <a href="/dashboard/ppdb/create" class="btn btn-success px-3">Tambah Data PPDB<i
                                    class="material-icons">add</i></a>
                            @if (session()->has('success'))
                                @php
                                    $p = session('success');
                                @endphp
                                <script>
                                    Swal.fire({
                                        title: 'Berhasil!!',
                                        text: '<?= $p ?>',
                                        icon: 'success',
                                    })
                                </script>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"
                                width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Subjek</th>
                                        <th>Jenis</th>
                                        <th>Status</th>
                                        <th>File</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuans as $pengajuan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pengajuan->subjek }}</td>
                                            <td class="text-capitalize">{{ $pengajuan->jenis }}</td>
                                            <td
                                                class="{{ Str::is($pengajuan->status, 'setuju') ? 'text-success' : (Str::is($pengajuan->status, 'revisi') ? 'text-warning' : (Str::is($pengajuan->status, 'tolak') ? 'text-danger' : 'text-success')) }} text-capitalize">
                                                {{ Str::is($pengajuan->status, 'setuju')
                                                    ? 'Di Setujui'
                                                    : (Str::is($pengajuan->status, 'revisi') ? 'Di' : (Str::is($pengajuan->status, 'tolak') ? 'Di' : 'Sedang di ')) .
                                                        ' ' .
                                                        $pengajuan->status }}
                                            </td>
                                            @php
                                                $files = Str::of($pengajuan->file)->explode(',');
                                            @endphp
                                            <td>
                                                @foreach ($files as $file)
                                                    <a target="_blank" href="{{ $file }}"><span class="material-icons">
                                                            description
                                                        </span></a>
                                                @endforeach
                                            </td>
                                            <td class="text-right">
                                                <a href="/dashboard/ppdb/{{ $pengajuan->id }}/status"
                                                    class="btn btn-link btn-info btn-just-icon edit"><i
                                                        class="material-icons">visibility</i></a>
                                                <a href="/dashboard/ppdb/{{ $pengajuan->id }}/edit"
                                                    class="btn btn-link btn-warning btn-just-icon edit"><i
                                                        class="material-icons">edit</i></a>
                                                @if ($pengajuan->status == 'tolak')
                                                    <button class="btn btn-link btn-danger btn-just-icon remove"
                                                        onclick="confirmationHapusData('/dashboard/ppdb/delete/{{ $pengajuan->id }}?psj={{ $pengajuan->persetujuan->id }}')"><i
                                                            class="material-icons">close</i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
    @endcan
@endsection
