@extends('guests.layouts.main')

@section('container')
    <div class="container">
        <div class="row ">
            <div class="col-12 text-center">
                <h2 class="h2 ">Organisasi Mahasiswa</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($authors as $author)
                <div class="col-md-3">
                    <div class="card card-profile card-plain">
                        <div class="card-header card-avatar">
                            <a href="ormawa/{{ $author->username }}">
                                <img class="img"
                                    src="{{ is_null($author->ormawa->logo) ? asset('images/logo_ormawa.jpg') : $author->ormawa->logo }}" />
                            </a>
                        </div>
                        <div class="card-body ">
                            <h4 class="card-title">{{ $author->ormawa->nama }}</h4>
                            <p class="card-description">
                                {{ Str::limit(strip_tags($author->ormawa->profil), 100) }}
                            </p>
                        </div>
                        <div class="card-footer justify-content-center">
                            <a href="ormawa/{{ $author->username }}" class="btn  btn-link btn-twitter"><i
                                    class="material-icons">visibility</i> Read More..</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
