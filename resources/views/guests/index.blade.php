@extends('guests.layouts.main')

@section('container')
    <div class="container">
        <h3 class="title text-center pt-4" style="margin-top: 0px !important; margin-bottom: 0px !important; ">Berita</h3>
        <div class="row">
            @foreach ($beritas as $berita)
                <div class="col-md-6">
                    <div class="card card-raised card-background" style="background-image: url('{{ $berita->image }}')">
                        <div class="card-body">
                            <h6 class="card-category text-info">{{ $berita->category->slug }}</h6>
                            <a href="#pablo">
                                <h3 class="card-title">{{ Str::title($berita->title) }}</h3>
                            </a>
                            <p class="card-description">
                                {{ $berita->excerpt }}
                            </p>
                            <a href="/posts/{{ $berita->slug }}" class="btn btn-danger btn-round">
                                <i class="material-icons">format_align_left</i> Lihat Berita
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 text-center">
                <a href="/posts?category=berita" class="btn btn-rose btn-round">Lihat Semua Berita <i
                        class="material-icons">
                        double_arrow
                    </i></a>
            </div>
        </div>

        <h3 class="title text-center" style="margin-bottom: 0px !important; ">Kegiatan</h3>

        <div class="row">
            @foreach ($kegiatans as $kegiatan)
                <div class="col-md-4">
                    <div class="card card-plain card-blog">
                        <div class="card-header card-header-image">
                            <a href="/posts/{{ $kegiatan->slug }}">
                                <img class="img img-raised"
                                    style="min-height: 250px !important; max-height:250px !important;"
                                    src="{{ $kegiatan->image }}">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-info">{{ $kegiatan->category->name }}</h6>
                            <h4 class="card-title">
                                <a href="">{{ Str::title($kegiatan->title) }}</a>
                            </h4>
                            <p class="card-description">
                                {{ $kegiatan->excerpt }}.<a href="/posts/{{ $kegiatan->slug }}"> Read
                                    More </a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 text-center">
                <a href="/posts?category=kegiatan" class="btn btn-rose btn-round">Lihat Semua Kegiatan <i
                        class="material-icons">
                        double_arrow
                    </i></a>
            </div>
        </div>

        <h3 class="title text-center">Organisasi Mahasiswa</h3>
        <div class="row">
            @foreach ($ormawas as $author)
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
            <div class="col-12 text-center mb-5">
                <a href="/ormawa" class="btn btn-rose btn-round">Lihat Semua Ormawa <i class="material-icons">
                        double_arrow
                    </i></a>
            </div>
        </div>
    </div>
@endsection
