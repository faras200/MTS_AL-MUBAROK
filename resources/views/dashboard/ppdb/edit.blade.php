@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-12" style="padding: 0px 0px !important">
            <div class="card ">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">
                            post_add
                        </i>
                    </div>
                    <h4 class="card-title">Edit Data PPDB</h4>
                </div>
                <div class="card-body mt-4">
                    <form method="post" action="/dashboard/ppdb/{{ $ppdb->id }}" class="form-horizontal">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label>Nama Siswa <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name"class="form-control" required autofocus
                                    value="{{ old('name', $ppdb->name) }}">
                                @error('name')
                                    <div class="text-danger"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label>No HP <span class="text-danger">*</span></label>
                                <input type="number" name="hp" id="hp"class="form-control" required
                                    value="{{ old('hp', $ppdb->no_hp) }}">
                                @error('hp')
                                    <div class="text-danger"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label>NISN <span class="text-danger">*</span></label>
                                <input type="number" name="nisn" id="nisn"class="form-control" required
                                    value="{{ old('nisn', $ppdb->nisn) }}">
                                @error('nisn')
                                    <div class="text-danger"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label>No KTP Orang Tua <span class="text-danger">*</span></label>
                                <input type="number" name="ktp" id="ktp"class="form-control" required
                                    value="{{ old('ktp', $ppdb->ktp) }}">
                                @error('ktp')
                                    <div class="text-danger"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="">No KK</label>
                                <input type="number" name="kk" id="kk"class="form-control"
                                    value="{{ old('kk', $ppdb->kk) }}">
                                @error('kk')
                                    <div class="text-danger"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="">No Akte</label>
                                <input type="number" name="akte" id="akte"class="form-control"
                                    value="{{ old('akte', $ppdb->akte) }}">
                                @error('akte')
                                    <div class="text-danger"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class=" col-form-label">Ijazah <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input id="fileijazah" value="{{ old('ijazah', $ppdb->ijazah) }}" required
                                        class="form-control" type="email" name="ijazah" readonly multiple>
                                    <span class="input-group-btn">
                                        <a id="lfm" data-input="fileijazah" data-preview="holder"
                                            class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-file text-white"></i>
                                        </a>
                                    </span>
                                    @error('ijazah')
                                        <div class="text-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class=" col-form-label">Foto Pass <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input id="thumbnail" value="{{ old('image', $ppdb->foto) }}" required
                                        class="form-control" type="email" readonly name="foto">
                                    <span class="input-group-btn">
                                        <a id="foto" data-input="thumbnail" data-preview="holder"
                                            class="btn btn-fab btn-round btn-primary">
                                            <i class="fa fa-picture-o text-white"></i>
                                        </a>
                                    </span>
                                    @error('image')
                                        <div class="text-danger"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="">Alamat <span class="text-danger">*</span></label>
                                <textarea rows="5" name="alamat" id="alamat" required class="form-control">
                                    {{ old('alamat', $ppdb->alamat) }}
                                </textarea>
                                @error('alamat')
                                    <div class="text-danger"> {{ $message }} </div>
                                @enderror
                            </div>

                        </div>

                        <div class="card-footer ">
                            <div class="col-12">
                                <div class="text-right">
                                    <button onclick="history.back()" class="btn btn-grey text-left">Kembali</button>
                                    <button type="submit" formnovalidate="formnovalidate"
                                        class="btn btn-rose">Ubah</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end row -->
        <script>
            var route_prefix = "../../../laravel-filemanager";
            $('#lfm').filemanager('files', {
                prefix: route_prefix
            });
        </script>
    @endsection
