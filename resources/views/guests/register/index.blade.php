@extends('guests.layouts.main')
@section('container')
    <div class="page-header header-filter"
        style="background-image: url('../assets/img/bg7.jpg'); background-size: cover; background-position: top center;">
        <div class="container mt-5">
            <div class="row mt-4">
                <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                    <form class="form" method="post" action="/register">
                        @csrf
                        <div class="card card-login card-hidden">
                            <div class="card-header card-header-success text-center">
                                <h4 class="card-title">Register Page</h4>
                            </div>

                            <div class="card-body">
                                @if (session()->has('loginError'))
                                    <div class="alert alert-danger">
                                        <div class="container-fluid">
                                            <div class="alert-icon">
                                                <i class="material-icons">warning</i>
                                            </div>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                            </button>
                                            <b>Alert: </b> {{ session('loginError') }}
                                        </div>
                                    </div>
                                @endif
                                <span class="bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                            name="name" placeholder="Name..." autofocus required
                                            value="{{ old('name') }}">
                                    </div>
                                    @error('name')
                                        <div class="text-center">
                                            <small class="text-danger "> {{ $message }} </small>
                                        </div>
                                    @enderror
                                </span>

                                <span class="bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">email</i>
                                            </span>
                                        </div>
                                        <input type="email" name="email" class="form-control" placeholder="Email..."
                                            value="{{ old('email') }}" autofocus required>
                                    </div>
                                    @error('email')
                                        <div class="text-center">
                                            <small class="text-danger">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </span>

                                <span class="bmd-form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </span>
                                        <input type="password" name="password" placeholder="Password..."
                                            class="form-control">
                                    </div>
                                    @error('password')
                                        <div class="text-center">
                                            <small class="text-danger "> {{ $message }} </small>
                                        </div>
                                    @enderror
                                </span>

                            </div>
                            <div class="card-footer pb-0 justify-content-center">
                                <button type="submit" style="font-weight: 600 !important;"
                                    class="btn btn-rose btn-link btn-lg">Register</button>
                            </div>
                            <div class="footer text-center">
                                <Small>Sudah punya akun ? <a href="/login" class="text-primary">Login Sekarang</a></Small>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
