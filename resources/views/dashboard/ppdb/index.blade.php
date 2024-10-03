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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <!-- Tabel untuk menampilkan data -->
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>No HP</th>
                                        <th>NISN</th>
                                        <th>No KTP</th>
                                        <th>No KK</th>
                                        <th>No Akte</th>
                                        <th>Ijazah</th>
                                        <th>Foto Pass</th>
                                        <th>Alamat</th>
                                        <th width="10%" align="right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($datas->count() == 0)
                                        <tr>
                                            <td colspan="11" align="center">Tidak Ada Data</td>
                                        </tr>
                                    @endif
                                    @foreach ($datas as $index => $ppdb)
                                        <tr>
                                            <td>{{ $index + 1 }}</td> <!-- Nomor urut -->
                                            <td>{{ $ppdb->name }}</td>
                                            <td>{{ $ppdb->no_hp }}</td>
                                            <td>{{ $ppdb->nisn }}</td>
                                            <td>{{ $ppdb->ktp }}</td>
                                            <td>{{ $ppdb->kk ?? '-' }}</td>
                                            <td>{{ $ppdb->akte ?? '-' }}</td>
                                            <td>
                                                <a target="_blank" href="{{ $ppdb->ijazah }}"><span class="material-icons">
                                                        description
                                                    </span></a>
                                            </td>
                                            <td><img src="{{ $ppdb->foto }}" width="80px" height="100px"> </td>
                                            <td>{{ $ppdb->alamat }}</td>
                                            <td align="right">
                                                <!-- Aksi (Edit dan Hapus) -->
                                                <a href="{{ route('ppdb.edit', $ppdb->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>

                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="confirmationHapusData('/dashboard/ppdb/delete/{{ $ppdb->id }}')">Hapus</button>

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
