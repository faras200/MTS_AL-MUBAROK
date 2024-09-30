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
                                        @error('name')
                                            <small class="text-danger ml--5"> {{ $message }} </small>
                                        @enderror
                                    </div>
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
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
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
                                        @error('password')
                                            <small class="text-danger ml--5"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </span>

                            </div>
                            <div class="card-footer pb-0 justify-content-center">
                                <button type="submit" style="font-weight: 600 !important;"
                                    class="btn btn-rose btn-link btn-lg">Register</button>
                            </div>
                            <div class="footer text-center">
                                <Small>I have account ? <a href="/login" class="text-primary">Login Now</a></Small>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
