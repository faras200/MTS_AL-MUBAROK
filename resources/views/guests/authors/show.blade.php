@extends('guests.layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto mr-auto">
                <div class="profile mt-4 text-center">
                    <div class="avatar">
                        <img src="{{ is_null($author->ormawa->logo) ? asset('images/logo_ormawa.jpg') : $author->ormawa->logo }}"
                            alt="Circle Image" style="max-height: 250px !important"
                            class="img-raised rounded-circle img-fluid">
                    </div>
                    <div class="name">
                        <h3 class="title">{{ $author->ormawa->nama }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="description col-md-10 ml-auto mr-auto text-center">
            <p>{{ $author->ormawa->profil }}</p>
        </div>
        <div class="description col-md-10 ml-auto mr-auto text-center">
            <div class="name">
                <h3 class="title">Visi</h3>
            </div>
            <p>{{ $author->ormawa->visi }}</p>
        </div>
        <div class="description col-md-10 ml-auto mr-auto text-center">
            <div class="name">
                <h3 class="title">Misi</h3>
            </div>
            <p>{{ $author->ormawa->misi }}</p>
        </div>
        <div class="tab-content tab-space">
            <div class="tab-pane active work" id="work">
                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto ">
                        <h3 class="title">Latest Posts</h3>
                        <div class="row collections">
                            @if ($posts->count())
                                @foreach ($posts as $post)
                                    <div class="col-md-4">
                                        <div class="card card-background"
                                            style="background-image: url('{{ $post->image }}')">
                                            <a href="/posts/{{ $post->slug }}"></a>
                                            <div class="card-body">
                                                <label
                                                    class="badge {{ Str::is($post->category->name, 'Kegiatan')
                                                        ? 'badge-info'
                                                        : (Str::is($post->category->name, 'Berita')
                                                            ? 'badge-rose'
                                                            : 'badge-warning') }}  ">{{ $post->category->name }}</label>
                                                <a href="/posts/{{ $post->slug }}">
                                                    <h3 class="card-title">{{ Str::title($post->title) }}</h3>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h4>Post Not Found</h4>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
